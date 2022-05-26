<?php
	include('conn.php');

	$id=$_GET['product'];

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['price'];

	$sql="select * from shopping where id='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['img'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["img"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}

	$sql="update shopping set title='$pname', categoryname='$category', price='$price', img='$location' where id='$id'";
	$conn->query($sql);

	header('location:product.php');
?>
<!-- edit details -->
<?php
		// include('conn.php');

	$id2=$_GET['details'];

	$pro_id=$_POST['pro_id'];
	$f_title=$_POST['footer_title'];
	$price=$_POST['orginal_price'];
	$dpic_t =$_POST['pic_title'];
	$d_title =$_POST['d_title'];
	$status =$_POST['status'];
	$d1 =$_POST['details1'];
	$d2 =$_POST['details2'];
	$df1 =$_POST['f1'];
	$df2 =$_POST['f2'];
	$df3 =$_POST['f3'];
	$df4 =$_POST['f4'];
	$df5 =$_POST['f5'];
echo $df1;
echo $id2;
	$sql="select * from details_product where id='$id2'";
	$query=$conn->query($sql);
    $row1=$query->fetch_array();
    
    echo $row1['d_title'];

	 

	$sql2="UPDATE details_product SET pro_id='$pro_id', footer_title='$f_title', orginal_price='$price', pic_title='$dpic_t', d_title='$d_title', status='$status', details1='$d1', details2='$d2', footer1='$df1', footer2='$df2', footer3='$df3', footer4='$df4', footer5='$df5' WHERE id='$id2'";
	$conn->query($sql2);

	header('location:product.php');
?>
