<?php
    session_start();

    if(!isset($_SESSION['phone']) || $_SESSION['role']!="admin"){
        header("location:login.php");
    }
?>

<h1>Hello : <?= $_SESSION['phone'] ?></h1>
<h2>You are : <?= $_SESSION['role'] ?></h2>
<a href="logout.php">LOGoUT</a>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MF practice</title>
    <link rel="stylesheet" href="f.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
</head>
<body>





    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/app.js"></script>
</body>
</html>