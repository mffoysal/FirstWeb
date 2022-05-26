<?php
	include('conn.php');
if(isset($_POST['save'])){
	$pname=$_POST['pro_id'];
	$price=$_POST['o_price'];
	$details1=$_POST['details1'];
	$details2 =$_POST['details2'];
	$ftitle =$_POST['ftitle'];
	$f1 =$_POST['f1'];
	$f2 =$_POST['f2'];
	$f3 =$_POST['f3'];
	$f4 =$_POST['f4'];
	$f5 =$_POST['f5'];
	$pic_title =$_POST['pic_title'];
	$d_title =$_POST['d_title'];
	$status =$_POST['status'];


	$error = array();

	if(count($error) == 0){
	$conn->query("INSERT INTO details_product(details1, details2, footer_title, footer1, footer2, footer3, footer4, footer5, pro_id, pic_title, orginal_price, d_title, status) VAlUES('$details1', '$details2', '$ftitle', '$f1', '$f2', '$f3', '$f4', '$f5', '$pname', '$pic_title', '$price', '$d_title','$status')") or die($conn->error);
	
	header('location:product.php');

	}
}


?>