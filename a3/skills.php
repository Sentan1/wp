<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<div class="container my-5">
  <h1 style="color:#cd4f07; font-weight: normal;">All Skills</h1>
  <?php
  $skills = [];
  $sql = "SELECT skill_id, title, category, level, rate FROM skills ORDER BY created_at DESC";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) { $skills[] = $row; }
    mysqli_stmt_close($stmt);
  }
  ?>
  <div class="row align-items-start">
    <div class="col-md-4">
      <img src="assets/images/skills/skills_banner.png" class="img-fluid" alt="Skills Overview">
    </div>
    <div class="col-md-8">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Level</th>
            <th>Rate ($/hr)</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($skills as $s): ?>
            <tr>
              <td class="link-custom"><a href="details.php?id=<?php echo (int)$s['skill_id']; ?>"><?php echo htmlspecialchars($s['title']); ?></a></td>
              <td><?php echo htmlspecialchars($s['category']); ?></td>
              <td><?php echo htmlspecialchars(ucfirst($s['level'])); ?></td>
              <td><?php echo number_format((float)$s['rate'], 2); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'includes/footer.inc'; ?>
