<?php
include 'includes/db_connect.inc';
if (empty($_SESSION['user_id'])) { add_flash('danger','Please login first.'); header('Location: login.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$skillId = (int)($_POST['skill_id'] ?? 0);
$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$category = trim($_POST['category'] ?? '');
$level = trim($_POST['level'] ?? '');
$rate = (float)($_POST['rate'] ?? 0);

// Verify ownership
$sql = "SELECT user_id, image_path FROM skills WHERE skill_id = ?";
if (!($stmt = mysqli_prepare($conn, $sql))) { add_flash('danger','Unexpected error.'); header('Location: index.php'); exit; }
mysqli_stmt_bind_param($stmt, 'i', $skillId);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);
if (!$row || (int)$row['user_id'] !== (int)$_SESSION['user_id']) { add_flash('danger','Not authorized.'); header('Location: details.php?id='.$skillId); exit; }

$newImagePath = $row['image_path'];
if (!empty($_FILES['image']['name'])) {
  $allowed = ['jpg','jpeg','png','gif','webp'];
  $uploadDir = __DIR__ . '/assets/images/skills/';
  if (!is_dir($uploadDir)) { @mkdir($uploadDir, 0777, true); }
  $origName = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
  if (!in_array($ext, $allowed, true)) { add_flash('danger','Invalid image type.'); header('Location: edit.php?id='.$skillId); exit; }
  $cleanBase = preg_replace('/[^a-z0-9\-]+/i', '-', pathinfo($origName, PATHINFO_FILENAME));
  $uniqueName = $cleanBase . '-' . uniqid() . '.' . $ext;
  $destPath = $uploadDir . $uniqueName;
  if (!move_uploaded_file($tmp, $destPath)) { add_flash('danger','Failed to upload image.'); header('Location: edit.php?id='.$skillId); exit; }
  $newImagePath = 'assets/images/skills/' . $uniqueName;
  // Remove old file
  $oldFull = __DIR__ . '/' . $row['image_path'];
  if (is_file($oldFull)) { @unlink($oldFull); }
}

$sql = "UPDATE skills SET title=?, description=?, category=?, level=?, rate=?, image_path=? WHERE skill_id=?";
if ($stmt = mysqli_prepare($conn, $sql)) {
  mysqli_stmt_bind_param($stmt, 'ssssdsi', $title, $description, $category, $level, $rate, $newImagePath, $skillId);
  if (mysqli_stmt_execute($stmt)) {
    add_flash('success','Skill updated.');
    header('Location: details.php?id='.$skillId);
    exit;
  }
}
add_flash('danger','Failed to update skill.');
header('Location: edit.php?id='.$skillId);
exit;
