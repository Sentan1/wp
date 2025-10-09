<?php
//Check what server you are accessing
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
  ini_set('display_errors', 1); 
  error_reporting(E_ALL);
  $servername = "localhost";
  $username = "root";
  $password = "Huh???2006";
  $dbname = "s4169598";
} else {
  $servername = "talsprddb02.int.its.rmit.edu.au";
  $username = "s4169598";
  $password = "Huh???2006";
  $dbname = "s4169598";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>