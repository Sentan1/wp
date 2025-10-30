<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<?php
$q = trim($_GET['q'] ?? '');
$category = trim($_GET['category'] ?? '');
$results = [];

$base = "SELECT skill_id, title, description, category, level, rate, image_path FROM skills WHERE 1=1";
$params = [];
$types = '';
if ($q !== '') {
  $base .= " AND (title LIKE ? OR description LIKE ?)";
  $like = '%' . $q . '%';
  $params[] = &$like; $params[] = &$like; $types .= 'ss';
}
if ($category !== '') {
  $base .= " AND category = ?";
  $params[] = &$category; $types .= 's';
}
$base .= " ORDER BY created_at DESC";

if ($stmt = mysqli_prepare($conn, $base)) {
  if ($types !== '') {
    array_unshift($params, $types);
    call_user_func_array('mysqli_stmt_bind_param', array_merge([$stmt], $params));
  }
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  while ($row = mysqli_fetch_assoc($res)) { $results[] = $row; }
  mysqli_stmt_close($stmt);
}
?>
<main class="container my-5">
  <h1 class="page-title mb-3">Search</h1>
  <form class="row g-2 mb-4" method="get" action="search.php">
    <div class="col-md-6"><input type="text" class="form-control" name="q" placeholder="Search..." value="<?php echo htmlspecialchars($q); ?>"></div>
    <div class="col-md-4"><input type="text" class="form-control" name="category" placeholder="Category" value="<?php echo htmlspecialchars($category); ?>"></div>
    <div class="col-md-2"><button class="btn submit-btn w-100" type="submit">Search</button></div>
  </form>
  <?php if ($q === '' && $category === ''): ?>
    <p class="text-muted">Enter a query to search skills.</p>
  <?php endif; ?>
  <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($results as $s): ?>
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
</main>
<?php include 'includes/footer.inc'; ?>
