<?php include "../includes/config.php";?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php

if(!isset($_SESSION['unique_id'])){
    header('Location: login.php');
}
else{
    if(isset($_SESSION['unique_id'])){
       
    }
}
include('../../../db.php');
$messid=$_SESSION['mess_id'];
$messsql="SELECT * FROM mess WHERE mess_id='$_SESSION[mess_id]'";
$messsqlresult=mysqli_query($con,$messsql);
$messcount=mysqli_num_rows($messsqlresult);
if($messcount!=1){
    header('Location: ../../mess.php?success=আপনি কোন মেস এ অন্তর্ভুক্ত হন নি...');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EdULearn Mess Managemnt</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>