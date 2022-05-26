<?php

$conn = new mysqli('localhost', 'root', '', 'foysal');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>