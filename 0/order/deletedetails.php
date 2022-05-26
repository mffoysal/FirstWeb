<?php
	include('conn.php');	

	$id2 = $_GET['details'];

	$sql2="delete from details_product where id='$id2'";
	$conn->query($sql2);

	header('location:product.php');
?>