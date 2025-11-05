<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<?php
// Fetch latest 4 skills for carousel and grid
$skills = [];
$sql = "SELECT skill_id, title, rate, image_path FROM skills ORDER BY created_at DESC LIMIT 4";
if ($stmt = mysqli_prepare($conn, $sql)) {
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while ($row = mysqli_fetch_assoc($result)) { $skills[] = $row; }
  mysqli_stmt_close($stmt);
}
$defaultImg = 'assets/images/skills/1.png';
?>
<div class="container my-5">
  <h1 style="color:#cd4f07; font-weight: normal;">SkillSwap</h1>
  <p class="text-muted">Browse the latest skills shared by our community.</p>

  <div id="skillCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php if ($skills): ?>
        <?php foreach ($skills as $i => $s): $img = !empty($s['image_path']) ? $s['image_path'] : $defaultImg; ?>
          <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
            <img src="<?php echo htmlspecialchars($img); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($s['title']); ?>">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
              <h5 class="text-white"><?php echo htmlspecialchars($s['title']); ?></h5>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="carousel-item active">
          <img src="assets/images/skills/8.png" class="d-block w-100" alt="Intro to PHP & MySQL">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
            <h5 class="text-white">Intro to PHP & MySQL</h5>
          </div>
        </div>


        <div class="carousel-item">
          <img src="assets/images/skills/1.png" class="d-block w-100" alt="Beginner Guitar Lessons">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
            <h5 class="text-white">Beginner Guitar Lessons</h5>
          </div>
        </div>

        
        <div class="carousel-item">
          <img src="assets/images/skills/6.png" class="d-block w-100" alt="Digital Illustration with Procreate">
          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
            <h5 class="text-white">Digital Illustration with Procreate</h5>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#skillCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#skillCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php if ($skills): ?>
      <?php foreach ($skills as $s): $img = !empty($s['image_path']) ? $s['image_path'] : $defaultImg; ?>
        <div class="col">
          <div class="card border-0 text-center">
            <img src="<?php echo htmlspecialchars($img); ?>" class="card-img-top skill-img" alt="<?php echo htmlspecialchars($s['title']); ?>">
            <div class="card-body">
              <h6 class="card-title"><?php echo htmlspecialchars($s['title']); ?></h6>
              <p class="card-text">Rate: $<?php echo number_format((float)$s['rate'], 2); ?>/hr</p>
              <a href="details.php?id=<?php echo (int)$s['skill_id']; ?>" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col">
        <div class="card border-0 text-center">
          <img src="assets/images/skills/1.png" class="card-img-top skill-img" alt="Beginner Guitar Lessons">
          <div class="card-body">
            <h6 class="card-title">Beginner Guitar Lessons</h6>
            <p class="card-text">Rate: $30.00/hr</p>
            <a href="details.php?id=1" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card border-0 text-center">
          <img src="assets/images/skills/6.png" class="card-img-top skill-img" alt="Digital Illustration with Procreate">
          <div class="card-body">
            <h6 class="card-title">Digital Illustration with Procreate</h6>
            <p class="card-text">Rate: $40.00/hr</p>
            <a href="details.php?id=6" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card border-0 text-center">
          <img src="assets/images/skills/7.png" class="card-img-top skill-img" alt="Morning Vinyasa Flow">
          <div class="card-body">
            <h6 class="card-title">Morning Vinyasa Flow</h6>
            <p class="card-text">Rate: $35.00/hr</p>
            <a href="details.php?id=7" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card border-0 text-center">
          <img src="assets/images/skills/8.png" class="card-img-top skill-img" alt="Intro to PHP & MySQL">
          <div class="card-body">
            <h6 class="card-title">Intro to PHP & MySQL</h6>
            <p class="card-text">Rate: $55.00/hr</p>
            <a href="details.php?id=8" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php include 'includes/footer.inc'; ?>
