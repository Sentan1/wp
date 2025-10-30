<?php include 'includes/db_connect.inc'; ?>
<?php if (empty($_SESSION['user_id'])) { add_flash('danger','Please login to delete.'); header('Location: login.php'); exit; } ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<?php
$skillId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$skill = null;
if ($skillId > 0) {
  $sql = "SELECT * FROM skills WHERE skill_id = ?";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, 'i', $skillId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $skill = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
  }
}
if (!$skill || (int)$skill['user_id'] !== (int)$_SESSION['user_id']) {
  add_flash('danger','You do not have permission to delete this skill.');
  header('Location: details.php?id=' . $skillId);
  exit;
}
?>
<main class="container my-5">
  <h1 class="page-title mb-4">Delete Skill</h1>
  <div class="alert alert-warning">Are you sure you want to delete "<?php echo htmlspecialchars($skill['title']); ?>"?</div>
  <form method="post" action="process_delete.php">
    <input type="hidden" name="skill_id" value="<?php echo (int)$skill['skill_id']; ?>">
    <a href="details.php?id=<?php echo (int)$skill['skill_id']; ?>" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-danger" data-confirm="delete">Yes, delete</button>
  </form>
</main>
<?php include 'includes/footer.inc'; ?>
