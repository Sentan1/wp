<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<?php
// Instructor id via query or fallback
$instructorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$instructor = null;
if ($instructorId > 0) {
  $sql = "SELECT user_id, username, email FROM users WHERE user_id = ?";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, 'i', $instructorId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $instructor = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);
  }
}
$skills = [];
if ($instructorId > 0) {
  $sql = "SELECT skill_id, title, rate, image_path FROM skills WHERE user_id = ? ORDER BY created_at DESC";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, 'i', $instructorId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) { $skills[] = $row; }
    mysqli_stmt_close($stmt);
  }
}
?>
<main class="container my-5">
  <?php if (!$instructor): ?>
    <div class="alert alert-info">Select an instructor to view their profile.</div>
  <?php else: ?>
    <h1 class="page-title mb-3"><?php echo htmlspecialchars($instructor['username']); ?></h1>
    <p class="text-muted mb-4">Contact: <?php echo htmlspecialchars($instructor['email']); ?></p>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php foreach ($skills as $s): ?>
        <div class="col">
          <div class="card border-0 text-center">
            <img src="<?php echo htmlspecialchars($s['image_path']); ?>" class="card-img-top skill-img" alt="<?php echo htmlspecialchars($s['title']); ?>">
            <div class="card-body">
              <h6 class="card-title"><?php echo htmlspecialchars($s['title']); ?></h6>
              <p class="card-text">Rate: $<?php echo number_format((float)$s['rate'], 2); ?>/hr</p>
              <a href="details.php?id=<?php echo (int)$s['skill_id']; ?>" class="btn btn-sm btn-primary rounded-pill" style="background-color:#cd4f07; border:none;">View Details</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</main>
<?php include 'includes/footer.inc'; ?>
