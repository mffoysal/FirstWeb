<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="sign/farhad.css">
</head>
<body>

<?php

//index.php

include('admin/soes.php');

$object = new soes();

if($object->is_student_login())
{
	header("location:".$object->base_url."student_dashboard.php");
}

include('header.php');

if(empty($_SESSION['username'])){
    $_SESSION['username'] ='';
}
if(empty($_SESSION['id'])){
    $_SESSION['id'] ='';
}
if(empty($_SESSION['pass'])){
    $_SESSION['pass'] ='';
}

?>
                

		      	<h3 class="text-center">Welcome... <?php echo $_SESSION['username'] ?>| Your ID : <?php echo $_SESSION['id'] ?></h3>
		      	<p class="text-center"><button class="btn btn-danger text-center m-auto"> <a style="text-decoration:none" href="../index.php">Main Home</a></button> Or | আপনি যদি সিস্টেম কর্তৃক অটোমেটিক লগইন করা না হোন, প্লিজ click for <a href="login.php"><button class="btn btn-primary">Login</button></a></p>
		      	<div class="container">
			      	<div class="card mt-4 mb-4">
			      		<div class="card-header">নোটিশ</div>
			      		<div class="card-body">
			      		<?php
			      		$object->query = "
			      		SELECT * FROM exam_soes 
			      		WHERE exam_result_datetime != '0000-00-00 00:00:00' 
			      		ORDER BY exam_result_datetime ASC
			      		";

			      		$object->execute();

			      		if($object->row_count() > 0)
			      		{
			      			$result = $object->statement_result();
			      			foreach($result as $row)
			      			{
			      				if(time() < strtotime($row["exam_result_datetime"]))
			      				{
			      					echo '<p><b>'.$row["exam_title"].' </b>exam of <b>'.$object->Get_class_name($row["exam_class_id"]).'</b> will publish on '.$row["exam_result_datetime"].'</p>';
			      				}
			      			}
			      		}
			      		else
			      		{
			      			echo '<p>No News Found</p>';
			      		}



			      		?>
			      		</div>
			      	</div>
			      </div>
		    

<?php

include('footer.php');

?>


    


        
        
        
    <?php     
            function pre_r( $array ){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }    
    ?>
    </div>


</body>
</html>