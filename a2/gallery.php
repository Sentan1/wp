<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>

<main class="container my-5">
  <h1 class="mb-4">Skill Gallery</h1>

  <div class="gallery">
    <div class="gallery-item">
      <a href="details.php?id=1" data-image-modal="assets/images/skills/1.png">
        <img src="assets/images/skills/1.png" alt="Beginner Guitar Lessons">
      </a>
      <p>Beginner Guitar Lessons</p>
    </div>
    <div class="gallery-item">
      <a href="details.php?id=2" data-image-modal="assets/images/skills/2.png">
        <img src="assets/images/skills/2.png" alt="Intermediate Fingerstyle">
      </a>
      <p>Intermediate Fingerstyle</p>
    </div>
    <div class="gallery-item">
      <a href="details.php?id=3" data-image-modal="assets/images/skills/3.png">
        <img src="assets/images/skills/3.png" alt="Artisan Bread Baking">
      </a>
      <p>Artisan Bread Baking</p>
    </div>
    <div class="gallery-item">
      <a href="details.php?id=4" data-image-modal="assets/images/skills/4.png">
        <img src="assets/images/skills/4.png" alt="French Pastry Making">
      </a>
      <p>French Pastry Making</p>
    </div>
    <div class="gallery-item">
      <a href="details.php?id=5" data-image-modal="assets/images/skills/5.png">
        <img src="assets/images/skills/5.png" alt="Watercolor Basics">
      </a>
      <p>Watercolor Basics</p>
    </div>
    <div class="gallery-item">
      <a href="details.php?id=6" data-image-modal="assets/images/skills/6.png">
        <img src="assets/images/skills/6.png" alt="Digital Illustration with Procreate">
      </a>
      <p>Digital Illustration with Procreate</p>
    </div>
    <div class="gallery-item">
      <a href="details.php?id=7" data-image-modal="assets/images/skills/7.png">
        <img src="assets/images/skills/7.png" alt="Morning Vinyasa Flow">
      </a>
      <p>Morning Vinyasa Flow</p>
    </div>
    <div class="gallery-item">
      <a href="details.php?id=8" data-image-modal="assets/images/skills/8.png">
        <img src="assets/images/skills/8.png" alt="Intro to PHP &amp; MySQL">
      </a>
      <p>Intro to PHP &amp; MySQL</p>
    </div>
  </div>
</main>

<!-- Bootstrap Modal for image preview -->
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
