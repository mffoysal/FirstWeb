<?php 

include '../../db.php';

extract($_POST);

if(empty($id)){
	$data=  " title='".$title."'";
	$data .=  ", user_id='".$user_id."'";
	$data .=  ", qpoints='".$qpoints."'";
	$insert_user = $con->query('INSERT INTO quiz_list set  '.$data);

	if($insert_user){
			echo json_encode(array('status'=>1,'id'=>$con->insert_id));
		
	}
}else{
	$data=  " title='".$title."'";
	$data .=  ", user_id='".$user_id."'";
	$data .=  ", qpoints='".$qpoints."'";
	$update = $con->query('UPDATE quiz_list set  '.$data.' where id= '.$id);

	if($update){
			echo json_encode(array('status'=>1,'id'=>$id));
		
	}
}