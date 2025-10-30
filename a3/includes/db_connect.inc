<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Detect environment and configure database access
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $servername = 'localhost';
  $username = 'root';
  $password = 'Huh???2006';
  $dbname = 's4169598'; // On localhost you may use skillswap DB schema from Canvas
} else {
  $servername = 'talsprddb02.int.its.rmit.edu.au';
  $username = 's4169598'; // Jacob 5 user is exactly your student ID
  $password = 'Huh???2006';
  $dbname = 's4169598'; // DB name is exactly your student ID
}

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die('Database connection failed: ' . mysqli_connect_error());
}

// Ensure UTF-8
mysqli_set_charset($conn, 'utf8mb4');

// Helper to push flash message
function add_flash($type, $message) {
  if (!isset($_SESSION['flash'])) {
    $_SESSION['flash'] = [];
  }
  if (!isset($_SESSION['flash'][$type])) {
    $_SESSION['flash'][$type] = [];
  }
  $_SESSION['flash'][$type][] = $message;
}

?>
