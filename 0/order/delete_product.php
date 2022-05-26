<?php
	include('conn.php');

	$id = $_GET['product'];

	$sql="delete from shopping where id='$id'";
	$conn->query($sql);

	header('location:product.php');
?>
