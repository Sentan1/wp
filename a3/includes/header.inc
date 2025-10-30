<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SkillSwap</title>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Ysabeau+SC:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="assets/images/skills/favicon.ico">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php if (!empty($_SESSION['flash'])): ?>
  <div class="container mt-3">
    <?php foreach ($_SESSION['flash'] as $type => $messages): ?>
      <?php foreach ((array)$messages as $msg): ?>
        <div class="alert alert-<?php echo htmlspecialchars($type); ?>" role="alert"><?php echo htmlspecialchars($msg); ?></div>
      <?php endforeach; ?>
    <?php endforeach; unset($_SESSION['flash']); ?>
  </div>
<?php endif; ?>
