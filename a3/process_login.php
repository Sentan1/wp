<?php
include 'includes/db_connect.inc';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: login.php');
  exit;
}

$identifier = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($identifier === '' || $password === '') {
  add_flash('danger', 'All fields are required.');
  header('Location: login.php');
  exit;
}

$sql = "SELECT user_id, username, password_hash FROM users WHERE username = ? OR email = ? LIMIT 1";
if ($stmt = mysqli_prepare($conn, $sql)) {
  mysqli_stmt_bind_param($stmt, 'ss', $identifier, $identifier);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password_hash'])) {
      $_SESSION['user_id'] = (int)$row['user_id'];
      $_SESSION['username'] = $row['username'];
      add_flash('success', 'Logged in successfully.');
      header('Location: index.php');
      exit;
    }
  }
  mysqli_stmt_close($stmt);
}
add_flash('danger', 'Invalid credentials.');
header('Location: login.php');
exit;
