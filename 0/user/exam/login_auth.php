<?php 
	include '../../db.php';
	session_start();

	extract($_POST);
	$type = '';
	$qry = $con->query("SELECT * FROM users where phone='$username' and pass = '$password' $type ");
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $val){
			if($k != 'pass')
			$_SESSION[''.$k] = $val;
		}
		echo 1;
	}else{
		echo 2;
	}
?>