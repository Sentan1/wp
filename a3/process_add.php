<?php
include 'includes/db_connect.inc';
if (empty($_SESSION['user_id'])) { add_flash('danger','Please login first.'); header('Location: login.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: add.php'); exit; }

$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$category = trim($_POST['category'] ?? '');
$level = trim($_POST['level'] ?? '');
$rate = trim($_POST['rate'] ?? '');

if ($title === '' || $description === '' || $category === '' || $level === '' || $rate === '' || empty($_FILES['image'])) {
  add_flash('danger', 'All fields are required.');
  header('Location: add.php');
  exit;
}

// Validate and store image
$allowed = ['jpg','jpeg','png','gif','webp'];
$uploadDir = __DIR__ . '/assets/images/skills/';
if (!is_dir($uploadDir)) { @mkdir($uploadDir, 0777, true); }
$origName = $_FILES['image']['name'] ?? '';
$tmp = $_FILES['image']['tmp_name'] ?? '';
$ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
if (!in_array($ext, $allowed, true)) {
  add_flash('danger', 'Invalid image type.');
  header('Location: add.php');
  exit;
}
$cleanBase = preg_replace('/[^a-z0-9\-]+/i', '-', pathinfo($origName, PATHINFO_FILENAME));
$uniqueName = $cleanBase . '-' . uniqid() . '.' . $ext;
$destPath = $uploadDir . $uniqueName;
if (!move_uploaded_file($tmp, $destPath)) {
  add_flash('danger', 'Failed to upload image.');
  header('Location: add.php');
  exit;
}
$imagePathForDb = 'assets/images/skills/' . $uniqueName;

$sql = "INSERT INTO skills (title, description, category, level, rate_per_hr, image_path, user_id, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
if ($stmt = mysqli_prepare($conn, $sql)) {
  $rateNum = (float)$rate;
  $userId = (int)$_SESSION['user_id'];
  // Normalize level capitalization to match ENUM
  $level = ucfirst(strtolower($level));
  mysqli_stmt_bind_param($stmt, 'ssssdsi', $title, $description, $category, $level, $rateNum, $imagePathForDb, $userId);
  if (mysqli_stmt_execute($stmt)) {
    add_flash('success', 'Skill added successfully.');
    header('Location: gallery.php');
    exit;
  } else {
    @unlink($destPath);
    add_flash('danger', 'Failed to add skill: ' . mysqli_error($conn));
    header('Location: add.php');
    exit;
  }
  mysqli_stmt_close($stmt);
} else {
  @unlink($destPath);
  add_flash('danger', 'Failed to prepare query: ' . mysqli_error($conn));
  header('Location: add.php');
  exit;
}
