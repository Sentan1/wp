<?php ?>
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" title="Home">
      <img src="assets/images/skills/favicon.ico" alt="SkillSwap Logo" width="32" height="32">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="skills.php">All Skills</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo !empty($_SESSION['user_id']) ? 'instructor.php?id='.(int)$_SESSION['user_id'] : 'instructor.php'; ?>">Instructor</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="add.php">Add Skill</a></li>
      </ul>
      <form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" type="search" name="q" placeholder="Search skills..." aria-label="Search">
        <button class="btn btn-light" type="submit" aria-label="Search"><span class="material-icons">search</span></button>
      </form>
      <ul class="navbar-nav ms-3">
        <?php if (!empty($_SESSION['user_id'])): ?>
          <li class="nav-item"><span class="nav-link">Hi, <?php echo htmlspecialchars($_SESSION['username']); ?></span></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
