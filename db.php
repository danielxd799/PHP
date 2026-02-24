<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_hodina";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>  