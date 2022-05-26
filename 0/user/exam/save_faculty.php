<?php 

include '../../db.php';

extract($_POST);

if(empty($id)){
	$data=  " name='".$name."'";
	$data .=  ", phone='".$username."'";
	$data .=  ", actype='".$user_type."'";
	$data .=  ", pass='".$password."'";
	$chk = $con->query("SELECT * FROM users where phone = '".$username."' ")->num_rows;
	if($chk > 0){
			echo json_encode(array('status'=>2,'msg'=>'Username already exist'));
			exit;
	}
	$insert_user = $con->query('INSERT INTO users set  '.$data);

	if($insert_user){
		$id = $con->insert_id;
		$insert_faculty =$con->query("INSERT INTO faculty set user_id = '".$id."', subject='".$subject."' ");
		if($insert_faculty){
			echo json_encode(array('status'=>1));
		}
	}
}else{
	$data=  " name='".$name."'";
	$data .=  ", phone='".$username."'";
	$data .=  ", actype='".$user_type."'";
	$data .=  ", pass='".$password."'";
	$chk = $con->query("SELECT * FROM users where phone = '".$username."' and unique_id !='".$uid."' ")->num_rows;
	if($chk > 0){
			echo json_encode(array('status'=>2,'msg'=>'Username already exist'));
			exit;
	}
	$update_user = $con->query('UPDATE users set  '.$data.' where unique_id ='.$uid);

	if($update_user){
		$update_faculty =$con->query("UPDATE faculty set subject='".$subject."' where id = '".$id."' ");
		if($update_faculty){
			echo json_encode(array('status'=>1));
		}
	}
}