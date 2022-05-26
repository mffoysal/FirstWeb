<?php
    session_start();

    if(!isset($_SESSION['phone']) || $_SESSION['role']!="student"){
        header("location:login.php");
    }
?>

<h1>Hello : <?= $_SESSION['phone'] ?></h1>
<h2>You are : <?= $_SESSION['role'] ?></h2>
<a href="logout.php">LogoUT</a>