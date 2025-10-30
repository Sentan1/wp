<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<main class="container my-5">
  <h1 class="page-title mb-4">Login</h1>
  <form method="post" action="process_login.php" novalidate>
    <div class="mb-3">
      <label for="username" class="form-label">Username or Email</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn submit-btn">Login</button>
  </form>
</main>
<?php include 'includes/footer.inc'; ?>
