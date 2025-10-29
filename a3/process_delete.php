<?php
include 'includes/db_connect.inc';
if (empty($_SESSION['user_id'])) { add_flash('danger','Please login first.'); header('Location: login.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$skillId = (int)($_POST['skill_id'] ?? 0);

// Verify ownership and get image path
$sql = "SELECT user_id, image_path FROM skills WHERE skill_id = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
  mysqli_stmt_bind_param($stmt, 'i', $skillId);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);
  if (!$row || (int)$row['user_id'] !== (int)$_SESSION['user_id']) {
    add_flash('danger','Not authorized.');
    header('Location: details.php?id='.$skillId);
    exit;
  }

  // Delete record
  $sql = "DELETE FROM skills WHERE skill_id = ?";
  if ($del = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($del, 'i', $skillId);
    if (mysqli_stmt_execute($del)) {
      // Remove image file
      $full = __DIR__ . '/' . $row['image_path'];
      if (is_file($full)) { @unlink($full); }
      add_flash('success','Skill deleted.');
      header('Location: skills.php');
      exit;
    }
  }
}
add_flash('danger','Failed to delete skill.');
header('Location: details.php?id='.$skillId);
exit;
