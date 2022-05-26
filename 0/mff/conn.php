<?php 

$host = "192.168.0.100";
$user = "mffoysal_f";
$pass = "Mffoysal369725";
$db   = "mffoysal_f";
$conn = null;

try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  
}


 ?>