<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softparty";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$msg="<i class='bi bi-check-circle'></i> Connection OK";
} catch(PDOException $e) {
  echo "<i class='bi bi-x-circle'></i> Connection failed: " . $e->getMessage();
}
?>