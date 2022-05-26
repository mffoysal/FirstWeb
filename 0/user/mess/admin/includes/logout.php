<?php session_start(); ?>
<?php

$_SESSION['name'] = null;
$_SESSION['mem_email'] = null;
$_SESSION['pass'] = null;
$_SESSION['unique_id'] = null;

header('Location: ../../login.php');


?>