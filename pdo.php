<?php
// Database attributes
$server = "127.0.0.1";
$username = "rahul";
$password = "pass123";
$db = "test";

// Checking if it works
try{
  $pdo = new PDO("mysql:host=$server;port=3306;dbname=$db", "$username", "$password");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo("Internal error");
  error_log("pdo.php, SQL error=".$e->getMessage());
  return;
}
?>
