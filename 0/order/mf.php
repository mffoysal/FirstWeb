<?php

include('../db.php');
    // $con = new mysqli('localhost', 'root', '', 'foysal') or die(mysqli_error($con->error));
    $tbl = "coupon";


?>


<!-- Save setting -->
<?php

session_start();

// $con = new mysqli('localhost', 'root', '', 'mff') or die(mysqli_error($con->error));
$table = 'coupon';

// file



$id = 0;
$update = false;
$coupon ='';
$name = '';
$coupon_value = '';
$min_price = '';
$status = '';



if (isset($_POST['save'])){
    $coupon = $_POST["coupon"];
    $coupon_value = $_POST["coupon_value"];
    $name = $_POST["ad_name"];
    $min_price = $_POST["min_price"];
    $status = $_POST["status"];

    $error = array();

    $n = "SELECT * FROM $table WHERE coupon='$coupon'";
    $nn = mysqli_query($con,$n);
    $e = "SELECT * FROM $table WHERE coupon_value='$coupon_value'";
    $ee = mysqli_query($con,$e);

    if(empty($coupon)){
        $couponError = "Please enter a coupon";
        array_push($error,$couponError);
    } else if (mysqli_num_rows($nn) > 0 ) {
        $couponError = "coupon already Used!!!";
        array_push($error,$couponError);
    }
    if(empty($min_price)){
        $priceError = "Please enter min price";
        array_push($error,$priceError);
    }
    if(empty($coupon_value)){
        $valueError = "Please enter coupon value";
        array_push($error,$valueError);
    } 
    
     

    if(count($error) == 0){
        
    $con->query("INSERT INTO $table(status, coupon, coupon_value, min_price, ad_name) VALUES('$status','$coupon','$coupon_value','$min_price','$name')") or
    die($con->error);
    
    // $con = new mysqli('localhost', 'root', '', 'mff') or die(mysqli_error($con->error));

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";
    

    require('../vendor/autoload.php');

    $html='<div style="margin: 0 auto; background-image: url(f.jpg); background-repeat: no repeat; background-position: center; background-size: cover ">';               
    $html.='<h1 style="margin: 0 auto; text-align:center">...||| EduLearn |||...</h1>';
    $html.='<h3 style="margin: 0 auto; text-align:center">GRAPHIC design & WEB development</h3>';
    $html.='<h3 style="margin: 0 auto; text-align:center">.Registration Form.</h3>';
    $html.='<h1>                                                                               </h1>';
    $html.='<h1>                                                                               </h1>';
    $html.='<h1>                                                                               </h1>';

    $html.='<h3 style="color: yellow; margin-left:30px; margin-right:30px; background: green; border: 2px solid blue">     Reg ID :  </h3>';
    $html.='<h2 style="color:cyan; background: blue; margin-right:30px; margin-left:30px">Name : </h2>';               
    $html.='<h2 style="margin-left:30px; margin-right:30px; background: cyan; color:red; border: 2px solid blue">Password : </h2>';
    $html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow">Full Name : </h2>'; 
    $html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow" >Your email:</h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; background:red; color:yellow" >Gender: </h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:blue" >Your Course:  </h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:cyan" >DOB:  </h2>';             
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >District: </h2>'; 
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Address: </h2>'; 
    $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Address: </h2>'; 
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
    $con->query("DELETE FROM coupon WHERE id=$id") or die($con->error());

      
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

// edit record

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $con->query("SELECT * FROM coupon WHERE id=$id") or die($con->error());
    $count= mysqli_num_rows($result);
    if ($count==1){
        $row = $result->fetch_array();
        $status = $row['status'];
        $name = $row['ad_name'];
        $coupon = $row['coupon'];
        $coupon_value = $row['coupon_value'];
        $min_price = $row['min_price'];
     
    }
       
}

// update setting

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $status = $_POST["status"];
    $name = $_POST["ad_name"];
    $coupon = $_POST["coupon"];
    $coupon_value = $_POST["coupon_value"];
    $min_price = $_POST["min_price"];
   
    $con->query("UPDATE coupon SET status='$status', ad_name='$name', coupon='$coupon', coupon_value='$coupon_value', min_price='$min_price' WHERE id='$id'") or 
        die($con->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: coupon.php');
    
}


?>
<script src="sweetalert.min.ljs"></script>

