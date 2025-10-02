<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>

<div class="container my-5">

<h1 style="color:#cd4f07; font-weight: normal;">SkillSwap</h1>
<p class="text-muted">Browse the latest skills shared by our community.</p>

<div id="skillCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../a1/assets/skills/8.png" class="d-block w-100" alt="French Pastry Making">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
        <h5 class="text-white">French Pastry Making</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../a1/assets/skills/1.png" class="d-block w-100" alt="Intro to PHP & MySQL">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
        <h5 class="text-white">Intro to PHP & MySQL</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../a1/assets/skills/6.png" class="d-block w-100" alt="Fingerstyle Guitar">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
        <h5 class="text-white">Intermediate Fingerstyle</h5>
      </div>
    </div>
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
  <div class="col">
    <div class="card border-0 text-center">
      <img src="../a1/assets/skills/1.png" class="card-img-top skill-img" alt="PHP">
      <div class="card-body">
        <h6 class="card-title">Intro to PHP & MySQL</h6>
        <p class="card-text">Rate: $55.00/hr</p>
        <a href="details.php?id=1" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-0 text-center">
      <img src="../a1/assets/skills/6.png" class="card-img-top skill-img" alt="Guitar">
      <div class="card-body">
        <h6 class="card-title">Intermediate Fingerstyle</h6>
        <p class="card-text">Rate: $45.00/hr</p>
        <a href="details.php?id=2" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-0 text-center">
      <img src="../a1/assets/skills/7.png" class="card-img-top skill-img" alt="Bread">
      <div class="card-body">
        <h6 class="card-title">Artisan Bread Baking</h6>
        <p class="card-text">Rate: $25.00/hr</p>
        <a href="details.php?id=3" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-0 text-center">
      <img src="../a1/assets/skills/8.png" class="card-img-top skill-img" alt="Pastry">
      <div class="card-body">
        <h6 class="card-title">French Pastry Making</h6>
        <p class="card-text">Rate: $30.00/hr</p>
        <a href="details.php?id=4" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
</div>

</div>

<?php include 'includes/footer.inc'; ?>