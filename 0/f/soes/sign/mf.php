<?php

include('../../../db.php');
    // $con = new mysqli('localhost', 'root', '', 'foysal') or die(mysqli_error($con->error));
    $tbl = "student_soes";

    $qry = "SELECT reg_id FROM $tbl order by reg_id desc";
    $rslt = mysqli_query($con,$qry);
    $roww = mysqli_fetch_array($rslt);

    $lastnumber = $roww['reg_id'];

    
    if(empty($lastnumber)){
        $number = "MF-GD-0000001";
    }else{
        
        $iddd = str_replace("MF-GD-","",$lastnumber);
        $idd = str_pad($iddd + 1, 7,0, STR_PAD_LEFT);
        $number = 'MF-GD-' .$idd;
    }

?>


<!-- Save setting -->
<?php

session_start();

// $con = new mysqli('localhost', 'root', '', 'mff') or die(mysqli_error($con->error));
$table = 'student_soes';

// file



$id = 0;
$update = false;
$status ='';
$name = '';
$student_name = '';
$email = '';
$student_email_id = '';
$password = '';
$student_password = '';
$gender = '';
$student_gender = '';
$education1 = '';
$education2 = '';
$education3 = '';
$student_address = '';
$district = '';
$msg = '';
$tel = '';
$iq = '';
$student_dob = '';
$pic = '';


if (isset($_POST['save'])){
    $name = $_POST["name"];
    $reg_id = $_POST["reg_id"];
    $student_name = $_POST["student_name"];
    $email = $_POST["email"];
    $student_email_id = $_POST["student_email_id"];
    $password = $_POST["password"];
    $student_password = $_POST["student_password"];
    $student_dob = $_POST["student_dob"];
    $tel = $_POST["tel"];
    $student_address = $_POST["student_address"];
    if(isset($_POST['gender'])){
        $gender = $_POST["gender"];
    }
    $student_gender = $_POST["student_gender"];
    if(isset($_POST['education1'])){
        $education1 = $_POST["education1"];
    }
    if(isset($_POST['education2'])){
        $education2 = $_POST["education2"];
    }
    if(isset($_POST['education3'])){
        $education3 = $_POST["education3"];    
    }
    $district = $_POST["district"];
    $msg = $_POST["msg"];
    $iq = $_POST["iq"];
    // $pic = $_POST["pic"];

    $error = array();

    $n = "SELECT * FROM $table WHERE username='$name'";
    $nn = mysqli_query($con,$n);
    $e = "SELECT * FROM $table WHERE email='$email'";
    $ee = mysqli_query($con,$e);

    if(empty($name)){
        $nameError = "Please enter your name";
        array_push($error,$nameError);
    } else if (mysqli_num_rows($nn) > 0 ) {
        $nameError = "User name already Used!!!";
        array_push($error,$nameError);
    }
    if(empty($student_name)){
        $stnameError = "Please enter your full name";
        array_push($error,$stnameError);
    } 
    if(empty($email)){
        $emailError = "Please enter your email";
        array_push($error,$emailError);
    } else if (mysqli_num_rows($ee) > 0 ) {
        $emailError = "Your email already Used!!!";
        array_push($error,$emailError);
    }
    if(empty($student_email_id)){
        $stemailError = "Please confirm your email";
        array_push($error,$stemailError);
    } 
    if(empty($password)){
        $passError = "Please enter new password";
        array_push($error,$passError);
    } 
    if(empty($student_password)){
        $stpassError = "Please confirm your password";
        array_push($error,$stpassError);
    } 
    if(empty($student_dob)){
        $stdobError = "Please set your DAte of birth";
        array_push($error,$stdobError);
    } 
    if(empty($tel)){
        $telError = "Please enter your Phone number";
        array_push($error,$telError);
    } 
    if(empty($student_address)){
        $staddressError = "Please enter your address";
        array_push($error,$staddressError);
    } 
     
    // if(empty($student_gender)){
    //     $stgenderError = "Please enter your ...";
    //     array_push($error,$stgenderError);
    // } 
    
    
    // if(empty($msg)){
    //     $msgError = "Please enter your ...";
    //     array_push($error,$msgError);
    // }
    if(empty($iq)){
        $iqError = "Please enter your ...";
        array_push($error,$iqError);
    }                                
    if($password != $student_password){
        $passmatch = "Password and Confirm password doesn't match!";
        array_push($error,$passmatch);
    } else{
        $matchpass = "Password and con password are same. thanks";
    }
    if($email != $student_email_id){
        $emailmatch = "Email and Confirm Email doesn't match!";
        array_push($error,$emailmatch);
    } else{
        $matchemail = "Email and con email are same. thanks";
    }
    
    
    // // $pic = $_POST["pic"];
    // // $img_dir = $_POST['student_image'];

    if (isset($_FILES['pic'])){
        // pre_r($_FILES);
    
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The upoaded file exceeds the upload_max_filsize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML from ',
            3 => 'THe uploaded file was only partially uploaded',
            4 => 'NO file was uploaded',
            6 => 'MIssing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
    
        );
    
        $ext_error = false;
        // a list of extensions that we allow to be uploaded
        $extensions = array('jpg', 'jpeg', 'gif', 'png' );
        $file_ext = explode('.',$_FILES['pic']['name']);
    
        $picture = $file_ext[0];
        // pic name uppercase
        $picture = preg_replace("!-!", "", $picture);
        $picture = ucwords($picture);
    
        // $pic;die;
    
        $file_ext = end($file_ext);
    
        if (!in_array($file_ext, $extensions)){
            $ext_error = true;
        }
    
        // if the error of the upload is not equal to 0
    
        if ($_FILES['pic']['error']){
            echo $phpFileUploadErrors[$_FILES['pic']['error']];
        }
    
        elseif ($ext_error){
            echo "Invalid file extension!";
        }
    
        else {
            echo "Success! Image has been uploaded";
        }
    
        $img_dir = 'images/'.$_FILES['pic']['name'];
    
        move_uploaded_file($_FILES['pic']['tmp_name'], $img_dir); 
    
        // $sql = "INSERT IGNORE INTO $table(pic, student_image) VALUES('$picture', '$img_dir')";
        // $con->query($sql) or die($con->error);
        
        
        // 'images/'.$_FILES['userfile']['name']
    
        // pre_r($file_ext);
    }
    
    // end file

    if(count($error) == 0){
        
    $con->query("INSERT INTO $table(reg_id,username, password, email, student_name, student_address, student_email_id, student_password, student_gender, gender, education1, education2, education3, address, msg, tel, iq, student_dob, pic, student_image) VALUES('$reg_id','$name',  '$password', '$email', '$student_name', '$student_address', '$student_email_id', '$student_password', '$student_gender', '$gender', '$education1', '$education2', '$education3', '$district', '$msg', '$tel', '$iq', '$student_dob', '$picture', '$img_dir')") or
    die($con->error);
    
    // $con = new mysqli('localhost', 'root', '', 'mff') or die(mysqli_error($con->error));
    $tbl = "student_soes";

    $qry = "SELECT reg_id FROM $tbl order by reg_id desc";
    $rslt = mysqli_query($con,$qry);
    $roww = mysqli_fetch_array($rslt);

    $lastnumber = $roww['reg_id'];

    if(empty($lastnumber)){
        $number = "MF-GD-0000001";
    }else{
        $iddd = str_replace("MF-GD-","",$lastnumber);
        $idd = str_pad($iddd + 1, 7,0, STR_PAD_LEFT);
        $number = 'MF-GD-' .$idd;
    }

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";
    

    require('../../../vendor/autoload.php');

    $html='<div style="margin: 0 auto; background-image: url(f.jpg); background-repeat: no repeat; background-position: center; background-size: cover ">';               
    $html.='<h1 style="margin: 0 auto; text-align:center">...||| EduLearn |||...</h1>';
    $html.='<h3 style="margin: 0 auto; text-align:center">GRAPHIC design & WEB development</h3>';
    $html.='<h3 style="margin: 0 auto; text-align:center">.Registration Form.</h3>';
    $html.='<h1>                                                                               </h1>';
    $html.='<h1>                                                                               </h1>';
    $html.='<h1>                                                                               </h1>';

    $html.='<h3 style="color: yellow; margin-left:30px; margin-right:30px; background: green; border: 2px solid blue">     Reg ID : '.$reg_id.' </h3>';
    $html.='<h2 style="color:cyan; background: blue; margin-right:30px; margin-left:30px">Name : ' .$name. '</h2>';               
    $html.='<h2 style="margin-left:30px; margin-right:30px; background: cyan; color:red; border: 2px solid blue">Password : '.$password.'</h2>';
    $html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow">Full Name : ' .$student_name. '</h2>'; 
    $html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow" >Your email: '.$email.'</h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; background:red; color:yellow" >Gender: '.$student_gender.'</h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:blue" >Your Course: '.$gender.' </h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:cyan" >DOB: ' .$student_dob. ' </h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >District: '.$district.'</h2>'; 
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Address: '.$student_address.'</h2>'; 
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Address: '.$tel.'</h2>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
     
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h2 style="color:green; margin: 0 auto; text-align:center" >     EdULearn~~> Farhad Foysal</h2>'; 
    $html.='<h1>                                                                               </h1>'; 
    
    $html.='<h2 style="color:green; margin: 0 auto; text-align:center" >     EduA: Islampur, Natun Office, Coxsbazar</h2>'; 
    $html.='<h1>                                                                               </h1>'; 
    
    $html.='<h2 style="color:green; margin: 0 auto; text-align:center" >     Phone: 01585855075</h2>';
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='<h1>                                                                               </h1>'; 
    $html.='</div>';            
    

    $mpdf=new \Mpdf\Mpdf() ;
    $mpdf->WriteHTML($html);
    $file='EdULearn01585855075FarhadFoysal/' .time().'.pdf';
    $mpdf->output($file, 'D');

    header('location:login.php');



    }
    

    // header("location: index.php");

}
        

// delete setting 

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $con->query("DELETE FROM student_soes WHERE student_id=$id") or die($con->error());

      
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

// edit record

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $con->query("SELECT * FROM student_soes WHERE student_id=$id") or die($con->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $status = $row['student_status'];
        $name = $row['username'];
        $student_name = $row['student_name'];
        $email = $row['email'];
        $student_email_id = $row['student_email_id'];
        $password = $row['password'];
        $student_password = $row['student_password'];
        $gender = $row['gender'];
        $student_gender = $row['student_gender'];
        $education1 = $row['education1'];
        $education2 = $row['education2'];
        $education3 = $row['education3'];
        $district = $row['address'];
        $student_address = $row['student_address'];
        $msg = $row['msg'];
        $tel = $row['tel'];
        $iq = $row['iq'];
        $student_dob = $row['student_dob'];
        $pic = $row['pic'];
       
        
    }
       
}

// update setting

if (isset($_POST['update'])){
    $id = $_POST['student_id'];
    $status = $_POST["status"];
    $name = $_POST["name"];
    $student_name = $_POST["student_name"];
    $email = $_POST["email"];
    $student_email_id = $_POST["student_email_id"];
    $password = $_POST["password"];
    $student_password = $_POST["student_password"];
    $student_dob = $_POST["student_dob"];
    $tel = $_POST["tel"];
    $student_address = $_POST["student_address"];
    $con->query("UPDATE student_soes SET student_status='$status', student_name='$student_name', tel='$tel', student_dob='$student_dob', password='$password', student_password='$student_password', address='$address' WHERE username='$name'") or 
        die($con->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: admin.php');
    
}


// if (isset($_FILES['pic'])){
// move_uploaded_file($_FILES['pic']['tmp_name'], 'images/'.
// $_FILES['pic']['name']);
// }
?>
<script src="sweetalert.min.ljs"></script>

