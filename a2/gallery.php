<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Skill Gallery</title>

  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Ysabeau+SC:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="icon" href="assets/skills/favicon.ico">
  <link rel="stylesheet" href="./assets/css/style.css"> <!-- FIXED -->
</head>
<body>


  
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html" title="Home">
        <img src="assets/skills/favicon.ico" alt="SkillSwap Logo" width="30">
      </a>



      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-white" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="skills.html">All Skills</a></li>
        <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="gallery.html">Gallery</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="add.html">Add Skill</a></li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search skills..." aria-label="Search">
        <button class="btn btn-light" type="submit"><span class="material-icons">search</span></button>
      </form>
    </div>
  </nav>

  <main class="container my-5">
    <h1 class="mb-4">Skill Gallery</h1>

    <div class="gallery">
      <div class="gallery-item"><img src="assets/skills/1.png" alt="Beginner Guitar Lessons" onclick="openModal(this.src)"><p>Beginner Guitar Lessons</p></div>
      <div class="gallery-item"><img src="assets/skills/2.png" alt="Intermediate Fingerstyle" onclick="openModal(this.src)"><p>Intermediate Fingerstyle</p></div>
      <div class="gallery-item"><img src="assets/skills/3.png" alt="Artisan Bread Baking" onclick="openModal(this.src)"><p>Artisan Bread Baking</p></div>
      <div class="gallery-item"><img src="assets/skills/4.png" alt="French Pastry Making" onclick="openModal(this.src)"><p>French Pastry Making</p></div>
      <div class="gallery-item"><img src="assets/skills/5.png" alt="Watercolor Basics" onclick="openModal(this.src)"><p>Watercolor Basics</p></div>
      <div class="gallery-item"><img src="assets/skills/6.png" alt="Digital Illustration with Procreate" onclick="openModal(this.src)"><p>Digital Illustration with Procreate</p></div>
      <div class="gallery-item"><img src="assets/skills/7.png" alt="Morning Vinyasa Flow" onclick="openModal(this.src)"><p>Morning Vinyasa Flow</p></div>
      <div class="gallery-item"><img src="assets/skills/8.png" alt="Intro to PHP &amp; MySQL" onclick="openModal(this.src)"><p>Intro to PHP &amp; MySQL</p></div>
    </div>
  </main>

  <div id="modal" class="modal-overlay" onclick="closeModal()">
    <div class="modal-content" onclick="event.stopPropagation()">
      <img id="modal-img" alt="Preview">
      <button class="close-btn" type="button" onclick="closeModal()">Close</button>
    </div>
  </div>

  <footer class="site-footer">&copy; 2023 SkillSwap. All rights reserved.</footer>

  <script>
    function openModal(src) {
      const modal = document.getElementById("modal");
      const img = document.getElementById("modal-img");
      img.src = src;
      modal.classList.add("show");
    }
    function closeModal() {
      document.getElementById("modal").classList.remove("show");
    }
  </script>
</body>
</html>
