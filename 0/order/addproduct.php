<?php
	include('conn.php');

	if(isset($_POST['save'])){
	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$theader =$_POST['theader'];
	$toffer =$_POST['toffer'];
	$dcard =$_POST['dcard'];
	$cardlink =$_POST['cardlink'];
	$notify =$_POST['notify'];
	$footer =$_POST['footer'];
	$avail =$_POST['avail'];
	$avail_color =$_POST['avail_color'];
	$status =$_POST['status_color'];
	$h_color =$_POST['card_h_color'];
	$body_color =$_POST['card_body_color'];
	$b_color =$_POST['card_b_color'];
	// $ =$_POST[''];
	// $ =$_POST[''];
	// $ =$_POST[''];
	// $ =$_POST[''];
	


	
	

	$error = array();

	if(count($error) == 0){

		$fileinfo=PATHINFO($_FILES["photo"]["name"]);
	
	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"../image/" . $newFilename);
	$location="/" . $newFilename;
	}

	$fileinfo2=PATHINFO($_FILES["photo2"]["name"]);
	
	if(empty($fileinfo2['filename'])){
		$location2="";
	}
	else{
	$newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];
	move_uploaded_file($_FILES["photo2"]["tmp_name"],"../image/" . $newFilename2);
	$location2="/" . $newFilename2;
	}

	$fileinfo3=PATHINFO($_FILES["photo3"]["name"]);

	if(empty($fileinfo3['filename'])){
		$location3="";
	}
	else{
	$newFilename3=$fileinfo3['filename'] ."_". time() . "." . $fileinfo3['extension'];
	move_uploaded_file($_FILES["photo3"]["tmp_name"],"../image/" . $newFilename3);
	$location3="/" . $newFilename3;
	}

	$fileinfo4=PATHINFO($_FILES["photo4"]["name"]);

	if(empty($fileinfo4['filename'])){
		$location4="";
	}
	else{
	$newFilename4=$fileinfo4['filename'] ."_". time() . "." . $fileinfo4['extension'];
	move_uploaded_file($_FILES["photo4"]["tmp_name"],"../image/" . $newFilename4);
	$location4="/" . $newFilename4;
	}


		$conn->query("INSERT INTO shopping (title, categoryname, price, img, img2, img3, img4, header, details, link, footer, h_f_color, body_off_color, off_value, details_value, acive_color, a_not_a, category, stylebc ) VALUES('$pname', '$category', '$price', '$location', '$location2', '$location3', '$location4', '$theader', '$dcard', '$cardlink', '$footer', '$h_color', '$body_color', '$toffer', '$notify', '$avail_color', '$avail', '$status','$b_color')") or die($conn->error);
	

	header('location:product.php');

	}
}

?>