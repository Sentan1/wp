<!DOCTYPE html>
<html lang="en">

<div><!--This is the formating section i guess. not really the css but the skeleton of html-->


  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Ysabeau+SC:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">
  <style>
    body { font-family: 'Ysabeau SC', sans-serif; background-color: #fff5f8; color: #333333; }
    h1, h2, h3 { font-family: 'Libre Baskerville', serif; }
    .skill-img { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; }
    footer { background-color: #cd4f07; color: white; text-align: center; padding: 1rem; margin-top: 3rem; }
  </style>
  </head>
</div>



<body>
<div><!-- This is the navigation bar-->
  <nav class="navbar navbar-expand-lg" style="background-color: #cd4f07;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">
      <img src="assets/skills/favicon.ico" alt="SkillSwap Logo" width="30">
    </a>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item"><a class="nav-link text-white" href="index.html">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="skills.html">All Skills</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="gallery.html">Gallery</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="add.html">Add Skill</a></li>
    </ul>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search skills..." aria-label="Search">
      <button class="btn btn-light" type="submit"><span class="material-icons">search</span></button>
    </form>
  </div>
  </nav>
</div>
<div class="container my-5"><!-- ALL thee required things for the page. -->

<h1 style="color:#cd4f07; font-weight: normal;">SkillSwap</h1>
<p class="text-muted">Browse the latest skills shared by our community.</p>

<div id="skillCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/skills/8.png" class="d-block w-100" alt="French Pastry Making">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
        <h5 class="text-white">French Pastry Making</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/skills/1.png" class="d-block w-100" alt="Intro to PHP & MySQL">
      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
        <h5 class="text-white">Intro to PHP & MySQL</h5>
      </div>
    </div>


    <!-- AAi was used to find that the carousel item was actually a thing. I was about to just recreate the images and edit them with the banner descrption. -->
    
    <div class="carousel-item">


      <img src="assets/skills/6.png" class="d-block w-100" alt="Fingerstyle Guitar">
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
      <img src="assets\skills\1.png" class="card-img-top skill-img" alt="PHP">
      <div class="card-body">
        <h6 class="card-title">Intro to PHP & MySQL</h6>
        <p class="card-text">Rate: $55.00/hr</p>
        <a href="#" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-0 text-center">
      <img src="assets\skills\6.png" class="card-img-top skill-img" alt="Guitar">
      <div class="card-body">
        <h6 class="card-title">Intermediate Fingerstyle</h6>
        <p class="card-text">Rate: $45.00/hr</p>
        <a href="#" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-0 text-center">
      <img src="assets\skills\7.png" class="card-img-top skill-img" alt="Bread">
      <div class="card-body">
        <h6 class="card-title">Artisan Bread Baking</h6>
        <p class="card-text">Rate: $25.00/hr</p>
        <a href="#" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card border-0 text-center">
      <img src="assets\skills\8.png" class="card-img-top skill-img" alt="Pastry">
      <div class="card-body">
        <h6 class="card-title">French Pastry Making</h6>
        <p class="card-text">Rate: $30.00/hr</p>
        <a href="#" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
      </div>
    </div>
  </div>
</div>


</div>
<footer>&copy; 2025 SkillSwap. All rights reserved.</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>