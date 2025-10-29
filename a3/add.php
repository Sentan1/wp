<?php include 'includes/db_connect.inc'; ?>
<?php if (empty($_SESSION['user_id'])) { add_flash('danger','Please login to add a skill.'); header('Location: login.php'); exit; } ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<main class="container my-5">
  <h1 class="page-title mb-4">Add New Skill</h1>
  <form method="post" action="process_add.php" enctype="multipart/form-data" novalidate>
    <div class="mb-3">
      <label for="title" class="form-label">Title *</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description *</label>
      <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category *</label>
      <input type="text" class="form-control" id="category" name="category" required>
    </div>
    <div class="mb-3">
      <label for="level" class="form-label">Level *</label>
      <select class="form-select" id="level" name="level" required>
        <option value="">Please select</option>
        <option value="beginner">Beginner</option>
        <option value="intermediate">Intermediate</option>
        <option value="expert">Expert</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="rate" class="form-label">Rate per Hour ($) *</label>
      <input type="number" step="0.01" class="form-control" id="rate" name="rate" required>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Skill Image *</label>
      <input class="form-control" type="file" id="image" name="image" accept="image/*" data-validate-image required>
      <div class="error-message mt-2">Only image files are allowed (JPG, PNG, GIF, WEBP).</div>
    </div>
    <button type="submit" class="btn submit-btn">Submit</button>
  </form>
</main>
<?php include 'includes/footer.inc'; ?>
