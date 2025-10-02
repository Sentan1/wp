<?php
// Single MySQLi procedural connection for localhost (XAMPP) and Jacob 5
// Usage: include this file and use $conn

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$serverName = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
$isJacob5 = strpos($serverName, 'talsprddb02.int.its.rmit.edu.au') !== false || getenv('JACOB5') === '1';

if ($isJacob5) {
  // Jacob 5 connection — replace placeholders with actual values
  $dbHost = 'talsprddb02.int.its.rmit.edu.au';
  $dbUser = 'your_student_id';
  $dbPass = 'your_password';
  $dbName = 'your_student_id';
} else {
  // Localhost (XAMPP)
  $dbHost = 'localhost';
  $dbUser = 'root';
  $dbPass = '';
  $dbName = 'skillswap';
}

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
  die('Database connection failed: ' . mysqli_connect_error());
}

// Enable UTF-8
mysqli_set_charset($conn, 'utf8mb4');
?>

