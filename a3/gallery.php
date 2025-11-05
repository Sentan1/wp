<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<main class="container my-5">
  <h1 class="mb-4">Skill Gallery</h1>
  <?php
  $skills = [];
  $cats = [];
  $sql = "SELECT skill_id, title, image_path, category FROM skills ORDER BY created_at DESC";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) { $skills[] = $row; $cats[$row['category']] = true; }
    mysqli_stmt_close($stmt);
  }
  $categories = array_keys($cats);
  $defaultImg = 'assets/images/skills/3.png';
  ?>
  <?php if (!empty($skills)): ?>
    <div class="mb-3 category-filter">
      <div class="btn-group" role="group" aria-label="Category filter">
        <button type="button" class="btn btn-outline-secondary active" data-filter-category="all">All</button>
        <?php foreach ($categories as $c): ?>
          <button type="button" class="btn btn-outline-secondary" data-filter-category="<?php echo htmlspecialchars($c); ?>"><?php echo htmlspecialchars($c); ?></button>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="gallery">
      <?php foreach ($skills as $s):
        $img = !empty($s['image_path']) ? $s['image_path'] : $defaultImg;
        // Normalize to paths under a3/assets/... for server portability
        if (strpos($img, 'http://') !== 0 && strpos($img, 'https://') !== 0) {
          $img = ltrim($img, '/');
          if (strpos($img, 'a3/') === 0) { $img = substr($img, 3); }
          if (strpos($img, 'assets/') !== 0) {
            if (strpos($img, 'images/') === 0) {
              $img = 'assets/' . $img; // e.g., images/skills/3.png -> assets/images/skills/3.png
            } else if (strpos($img, '/') === false) {
              $img = 'assets/images/skills/' . $img; // e.g., 3.png -> assets/images/skills/3.png
            } else {
              // fallback: assume already relative into assets
              $img = 'assets/' . $img;
            }
          }
        }
      ?>
        <div class="gallery-item" data-category="<?php echo htmlspecialchars($s['category']); ?>">
          <a href="details.php?id=<?php echo (int)$s['skill_id']; ?>" data-image-modal="<?php echo htmlspecialchars($img); ?>">
            <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($s['title']); ?>">
          </a>
          <p><?php echo htmlspecialchars($s['title']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-info">
      <p>No skills available in the gallery yet. <a href="add.php">Add a skill</a> to get started!</p>
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
