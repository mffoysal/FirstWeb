<?php 
	include('db.php');
	session_start();

if(isset($_POST['melogin'])){
	if(isset($_POST['username'])){

		$usernamee=$_POST['username'];
        $username = $usernamee;

		$query="SELECT * FROM all_student WHERE phoneId='$username' OR std_id='$username' OR phone='$username'";

        $queryr=mysqli_query($con,$query);
 

		if (mysqli_num_rows($queryr)>0){

			$row=mysqli_fetch_assoc($queryr);
			$_SESSION['user']=$row['std_id']; 
			$_SESSION['user_phone']=$row['phone']; 
            echo 1;
		}
		else{
            echo $username;
			?>
  				<span>Login Failed. User not Found.</span> 
  			<?php 
		}
	}
}


	
if(isset($_POST['mesignup'])){


	if(isset($_POST['susername'])){
		$username=$_POST['susername'];
		$phone=$_POST['phone'];
		$classNum=$_POST['classnumber'];
		$mentorId=$_POST['mentorId'];
        if(isset($_POST['roll'])){
			$roll=$_POST['roll'];
			$class=$_POST['class'];
			$sec=$_POST['sec'];
		}else{
			$roll='';
			$class='';
			$sec='';
		}


		$phonee=$mentorId.''.$phone;
		$query="SELECT * FROM all_student WHERE std_id='$phonee'";

		$queryr=mysqli_query($con,$query);
 
		if (mysqli_num_rows($queryr)>0){
			?>
  				<span>Username already exist.</span>
  			<?php 
		}

		elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$classNum)){
			?>
  				<span style="font-size:11px;">Invalid Class Number. Space & Special Characters not allowed.</span>
  			<?php 
		}
		elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$phone)){
			?>
  				<span style="font-size:11px;">Invalid Phone. Space & Special Characters not allowed.</span>
  			<?php 
		}
		else{
			
			$ran_id = rand(time(), 100000000);
			$referr = strtoupper(bin2hex(random_bytes(1)));
			$std_id=$mentorId.''.$phone;

			$phoneId=$phone.''.$referr;

			$con->query("INSERT INTO all_student (std_name, phone, p_of_class, unique_id, std_id, phoneId, roll, class, sec) values ('$username', '$phone', '$classNum', '$mentorId', '$std_id', '$phoneId', '$roll', '$class', '$sec')");
            
			echo $phoneId;
			?>
  				<span> ~ Sign up Successful.</span>
  			<?php 
		}
	}


}

?>

