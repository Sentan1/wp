<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<?php
$skillId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$skill = null;
if ($skillId > 0) {
  $sql = "SELECT s.*, u.username FROM skills s LEFT JOIN users u ON s.user_id = u.user_id WHERE s.skill_id = ?";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, 'i', $skillId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) === 1) { $skill = mysqli_fetch_assoc($result); }
    mysqli_stmt_close($stmt);
  }
}
?>
<main class="container my-5">
  <?php if (!$skill): ?>
    <div class="alert alert-warning" role="alert">Skill not found.</div>
  <?php else: ?>
    <div class="row g-4">
      <div class="col-md-5">
        <a href="#" data-image-modal="<?php echo htmlspecialchars($skill['image_path']); ?>">
          <img src="<?php echo htmlspecialchars($skill['image_path']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($skill['title']); ?>">
        </a>
      </div>
      <div class="col-md-7">
        <h1 class="mb-3" style="color:#cd4f07; font-weight: 400;"><?php echo htmlspecialchars($skill['title']); ?></h1>
        <div class="mb-2"><strong>Category:</strong> <?php echo htmlspecialchars($skill['category']); ?></div>
        <div class="mb-2"><strong>Level:</strong> <?php echo htmlspecialchars(ucfirst($skill['level'])); ?></div>
        <div class="mb-2"><strong>Rate:</strong> $<?php echo number_format((float)$skill['rate'], 2); ?>/hr</div>
        <div class="mb-3"><strong>Instructor:</strong> <?php echo htmlspecialchars($skill['username'] ?? 'Unknown'); ?></div>
        <p><?php echo nl2br(htmlspecialchars($skill['description'])); ?></p>
        <a class="btn btn-secondary" href="skills.php">Back to Skills</a>
        <?php if (!empty($_SESSION['user_id']) && (int)$_SESSION['user_id'] === (int)$skill['user_id']): ?>
          <a class="btn btn-primary" href="edit.php?id=<?php echo (int)$skill['skill_id']; ?>">Edit</a>
          <a class="btn btn-danger" href="delete.php?id=<?php echo (int)$skill['skill_id']; ?>">Delete</a>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</main>
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        <img class="modal-img" src="" alt="Preview">
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.inc'; ?>
