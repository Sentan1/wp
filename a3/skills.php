<?php include 'includes/db_connect.inc'; ?>
<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>
<div class="container my-5">
  <h1 style="color:#cd4f07; font-weight: normal;">All Skills</h1>
  <?php
  $skills = [];
  $sql = "SELECT skill_id, title, category, level, rate_per_hr AS rate FROM skills ORDER BY created_at DESC";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) { $skills[] = $row; }
    mysqli_stmt_close($stmt);
  }
  ?>
  <div class="row align-items-start">
    <div class="col-md-4">
      <img src="./assets/images/skills_banner.png" class="img-fluid" alt="Skills Overview">
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
          <?php if (!empty($skills)): ?>
            <?php foreach ($skills as $s): ?>
              <tr>
                <td class="link-custom"><a href="details.php?id=<?php echo (int)$s['skill_id']; ?>"><?php echo htmlspecialchars($s['title']); ?></a></td>
                <td><?php echo htmlspecialchars($s['category']); ?></td>
                <td><?php echo htmlspecialchars(ucfirst($s['level'])); ?></td>
                <td><?php echo number_format((float)$s['rate'], 2); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td><a href="details.php?id=1">Beginner Guitar Lessons</a></td><td>Music</td><td>Beginner</td><td>30.00</td></tr>
            <tr><td><a href="details.php?id=2">Intermediate Fingerstyle</a></td><td>Music</td><td>Intermediate</td><td>45.00</td></tr>
            <tr><td><a href="details.php?id=3">Artisan Bread Baking</a></td><td>Cooking</td><td>Beginner</td><td>25.00</td></tr>
            <tr><td><a href="details.php?id=4">French Pastry Making</a></td><td>Cooking</td><td>Expert</td><td>50.00</td></tr>
            <tr><td><a href="details.php?id=5">Watercolor Basics</a></td><td>Art</td><td>Beginner</td><td>20.00</td></tr>
            <tr><td><a href="details.php?id=6">Digital Illustration with Procreate</a></td><td>Art</td><td>Intermediate</td><td>40.00</td></tr>
            <tr><td><a href="details.php?id=7">Morning Vinyasa Flow</a></td><td>Wellness</td><td>Intermediate</td><td>35.00</td></tr>
            <tr><td><a href="details.php?id=8">Intro to PHP & MySQL</a></td><td>Programming</td><td>Expert</td><td>55.00</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'includes/footer.inc'; ?>
