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
		$insert_students =$con->query("INSERT INTO quiz_students set user_id = '".$id."', level_section='".$level_section."' ");
		if($insert_students){
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
		$update_students =$con->query("UPDATE quiz_students set level_section='".$level_section."' where id = '".$id."' ");
		if($update_students){
			echo json_encode(array('status'=>1));
		}
	}
}