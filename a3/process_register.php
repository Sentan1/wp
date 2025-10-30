<?php
include 'includes/db_connect.inc';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: register.php');
  exit;
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $email === '' || $password === '') {
  add_flash('danger', 'All fields are required.');
  header('Location: register.php');
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  add_flash('danger', 'Please enter a valid email address.');
  header('Location: register.php');
  exit;
}

// Check if user exists
$sql = "SELECT user_id FROM users WHERE username = ? OR email = ? LIMIT 1";
if (!($stmt = mysqli_prepare($conn, $sql))) {
  add_flash('danger', 'Registration error (prepare check-existing): ' . mysqli_error($conn));
  header('Location: register.php');
  exit;
}
mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
if (!mysqli_stmt_execute($stmt)) {
  add_flash('danger', 'Registration error (execute check-existing): ' . mysqli_error($conn));
  mysqli_stmt_close($stmt);
  header('Location: register.php');
  exit;
}
mysqli_stmt_store_result($stmt);
if (mysqli_stmt_num_rows($stmt) > 0) {
  mysqli_stmt_close($stmt);
  add_flash('danger', 'Username or email already exists.');
  header('Location: register.php');
  exit;
}
mysqli_stmt_close($stmt);

$hash = password($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username, email, password, created_at) VALUES (?, ?, ?, NOW())";
if (!($stmt = mysqli_prepare($conn, $sql))) {
  add_flash('danger', 'Registration error (prepare insert): ' . mysqli_error($conn));
  header('Location: register.php');
  exit;
}
mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hash);
if (mysqli_stmt_execute($stmt)) {
  add_flash('success', 'Registration successful. You can now log in.');
  header('Location: login.php');
  exit;
} else {
  add_flash('danger', 'Registration failed: ' . mysqli_error($conn));
  header('Location: register.php');
  exit;
}
