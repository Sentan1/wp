<?php include 'includes/db_connect.inc'; ?>
<?php if (empty($_SESSION['user_id'])) { add_flash('danger','Please login to edit.'); header('Location: login.php'); exit; } ?>
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
  add_flash('danger','You do not have permission to edit this skill.');
  header('Location: details.php?id=' . $skillId);
  exit;
}
?>
<main class="container my-5">
  <h1 class="page-title mb-4">Edit Skill</h1>
  <form method="post" action="process_edit.php" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="skill_id" value="<?php echo (int)$skill['skill_id']; ?>">
    <div class="mb-3">
      <label for="title" class="form-label">Title *</label>
      <input type="text" class="form-control" id="title" name="title" required value="<?php echo htmlspecialchars($skill['title']); ?>">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description *</label>
      <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($skill['description']); ?></textarea>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category *</label>
      <input type="text" class="form-control" id="category" name="category" required value="<?php echo htmlspecialchars($skill['category']); ?>">
    </div>
    <div class="mb-3">
      <label for="level" class="form-label">Level *</label>
      <select class="form-select" id="level" name="level" required>
        <?php $levels = ['beginner','intermediate','expert']; foreach ($levels as $lvl): ?>
          <option value="<?php echo $lvl; ?>" <?php echo $skill['level'] === $lvl ? 'selected' : ''; ?>><?php echo ucfirst($lvl); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="rate" class="form-label">Rate per Hour ($) *</label>
      <input type="number" step="0.01" class="form-control" id="rate" name="rate" required value="<?php echo htmlspecialchars($skill['rate']); ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Current Image</label><br>
      <img src="<?php echo htmlspecialchars($skill['image_path']); ?>" alt="Current" style="max-width:200px;">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Replace Image (optional)</label>
      <input class="form-control" type="file" id="image" name="image" accept="image/*" data-validate-image>
      <div class="error-message mt-2">Only image files are allowed (JPG, PNG, GIF, WEBP).</div>
    </div>
    <button type="submit" class="btn submit-btn">Save Changes</button>
  </form>
</main>
<?php include 'includes/footer.inc'; ?>
