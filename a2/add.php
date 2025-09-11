<html lang="en">

<div><!--This is the formating section i guess. not really the css but the skeleton of html-->


  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Skill Gallery</title>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Ysabeau+SC:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
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
    <div class="container my-4">
        <h1 class="page-titles">Add New Skill</h1>
        <form class="add-skill-form">




          <div class="mb-3">
            <label for="title" class="form-label">Title *</label>
            <input type="text" class="form-control" id="title" placeholder="Enter skill title">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description *</label>
            <textarea class="form-control" id="description" rows="4" placeholder="Enter Description"></textarea>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category *</label>
            <input type="text" class="form-control" id="category" placeholder="Enter skill category">
          </div>
          <div class="mb-3">
            <label for="rate" class="form-label">Rate per Hour ($) *</label>
            <input type="number" class="form-control" id="rate" placeholder="Enter rate per hour">
          </div>

          <div class="mb-3">
            <label for="level" class="form-label">Level *</label>
            <select class="form-select" id="level">
              <option selected>Please select</option>
              <option value="beginner">Beginner</option>
              <option value="intermediate">Intermediate</option>
              <option value="advanced">Advanced</option>
            </select>
          </div>



          <div class="mb-3">
            <label for="image" class="form-label">Skill Image *</label>
            <input class="form-control" type="file" id="image">
            <div class="error-message mt-2">Only image files are allowed (JPG, PNG, GIF, WEBP).</div>
          </div>
          <button type="submit" class="btn submit-btn">Submit</button>
        </form>
      </div>
    
 
      <footer>
        &copy; 2023 SkillSwap. All rights reserved.
      </footer>
    </body>
    
    </html>