
<?php
session_start();
    $img_dir='';

include('db.php');
     if(isset($_POST['referral_code'])){
        $refercode=$_POST['referral_code'];
        $query = "SELECT * FROM users WHERE referral_code='$refercode'";
        $result=mysqli_query($con,$query);
        $count =mysqli_num_rows($result);    
        if($count==1){
                $row2=mysqli_fetch_assoc($result);
                $code=$row2['phone'];
                // echo $code;
                $point=$row2['referral_point']+10;
                // echo $point;
                $con->query("UPDATE users SET referral_point='$point' WHERE phone='$code'") or
                die($con->error);
            }
            else{
                header('location:refer.php?error=দুঃখিত! আপনার দেয়া রেফারেল কোড সঠিক নয়...');
                exit();
            }
     }

    if(isset($_POST['user'])){
        $user = $_POST['user'];
    }else{
        $user = '';
    }

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name = '';
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone = '';
    }
    if(isset($_POST['division'])){
        $division = $_POST['division'];
    }else{
        $division = '';
    }
    if(isset($_POST['district'])){
        $district = $_POST['district'];
    }else{
        $district = '';
    }
    if(isset($_POST['upazila'])){
        $upazila = $_POST['upazila'];
    }else{
        $upazila = '';
    }
    if(isset($_POST['union'])){
        $union = $_POST['union'];
    }else{
        $union = '';
    }
    if(isset($_POST['word'])){
        $word = $_POST['word'];
    }else{
        $word = '';
    }
    if(isset($_POST['village'])){
        $village = $_POST['village'];
    }else{
        $village = '';
    }
    if(isset($_POST['pass'])){
        $pass = $_POST['pass'];
    }else{
        $pass = '';
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email = '';
    }
    if(isset($_POST['actype'])){
        $acType = $_POST['actype'];
    }else{
        $acType = '';
    }
    if(isset($_FILES['pic'])){
        
    }else{
        
    }

$querydiv ="SELECT * FROM divisions WHERE id='$division' ";
$resultdiv =mysqli_query($con,$querydiv);
$rowdiv = mysqli_fetch_assoc($resultdiv);
$countdiv = mysqli_num_rows($resultdiv);

if($countdiv == 1){
    $divisionq = $rowdiv['bn_name'];
}else{
    $divisionq='';
}

$querydis ="SELECT * FROM districts WHERE id='$district' ";
$resultdis =mysqli_query($con,$querydis);
$rowdis = mysqli_fetch_assoc($resultdis);
$countdis = mysqli_num_rows($resultdis);

if($countdis == 1){
    $districtq = $rowdis['bn_name'];
}else{
    $districtq='';
}

$queryup ="SELECT * FROM upazilas WHERE id='$upazila' ";
$resultup =mysqli_query($con,$queryup);
$rowup = mysqli_fetch_assoc($resultup);
$countup = mysqli_num_rows($resultup);

if($countup == 1){
    $upazilaq = $rowup['bn_name'];
}else{
    $upazilaq='';
}

$ran_id = rand(time(), 100000000);

$queryun ="SELECT * FROM unions WHERE bn_name='$union' ";
$resultun =mysqli_query($con,$queryun);
$rowun = mysqli_fetch_assoc($resultun);
$countun = mysqli_num_rows($resultun);

if($countun == 1){
    $unionq = $rowun['bn_name'];
}else{
    $unionq='';
}

$verify="Yes";  
// referral start




$refer = strtoupper(bin2hex(random_bytes(3)));



// referral end










$con->query("INSERT INTO users(name, email, phone, division, district, upazila, unions, word, village, pass, actype, user, unique_id, img, referral_code, referrer, referral_point) VALUES('$name','$email','$phone','$divisionq','$districtq','$upazilaq','$unionq','$word','$village','$pass','$acType','$user','$ran_id','$img_dir','$refercode','$refer',0)") or die($con->error);


$con->query("INSERT INTO student_soes(student_name, email, tel, username, student_address, msg, address, password, actype, reg_id, unique_id, student_image, student_email_verified, student_password) VALUES('$name','$email','$phone','$phone','$districtq','$upazilaq','$unionq','$pass','$acType','$user','$ran_id','$img_dir','$verify','$pass')") or die($con->error);



                        // $qry = "SELECT user FROM users order by user desc";
                        // $rslt = mysqli_query($con,$qry);
                        // $row = mysqli_fetch_array($rslt);

                        // $lastnumber = $row['user'];

                        // if(empty($lastnumber)){
                        //     $number = "User-F-0000001";
                        // }else{
                        //     $idd = str_replace("User-F-","",$lastnumber);
                        //     $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
                        //     $number = 'User-F-' .$id;
                        // }


// pdf



?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submition Completed</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
         *{
            margin: 0px;
            padding: 0px;
            font-family: system-ui;
        }

        .container{
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .clearfix{
            clear: both;
        }
        .logo{
            width: 30%;
            float: left;
        }
        .logo h1{
            color: white;
            padding-top: 10px;

        }
        .menu{
            width: 70%;
            float: left;
        }
        .menu ul{
            float: right;
        }
        .menu ul li{
            list-style: none;
            float: left;
            padding: 20px;
        }
        .menu ul li a{
            text-decoration: none;
            color: white;
        }
        header{
            background-color: #0254b7;
        }
    </style>

</head>
<body>

<!-- <header>
        <div class="container">

            <div class="logo">
                <h1 style="" class="">EdUlearn</h1>
            </div>
            <div class="menu">
                <ul>
                    <li>

                    </li>
                    <li><a href="index.php">Home</a></li>
                    <<li><a href="#">About</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="index.php">Login</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>   -->

<?php 
include('navbar.php');
?>
<form action="pdf.php" method="POST">
<input type="text" class="form-control d-inline w-25" value="<?php echo $phone ?>" name="phone" readonly>
<button class="btn btn-info m-auto text-center d-inline" style="color:yellow" type="submit" name="down" >Download Recipt</button>
</form>

<?php
    if(isset($_POST['name'])){
        $success = 'অভিনন্দন!!! আপনার অ্যাপ্লিকেশন সম্পন্ন হয়েছে...';
        $eng = 'Your application is successfully submitted!';
    }
    else{
        $success = '';
        $eng = '';
    }
?>
<div class="result text-center m-auto bg-warning"><h5 class="text-center" id="result">
<h3><?php 
    echo $success;
?>
<br>
<code> <?php echo $eng ; ?> </code>
</h3>

<h5>
<?php
    echo 'Name : '.$name.'<br>';
    echo 'Phone : '.$phone.'<br>';
    echo 'Division : '.$divisionq.'<br>';
    echo 'District : '.$districtq.'<br>';
    echo 'Upazila : '.$upazilaq.'<br>';
    echo 'Union : '.$unionq.'<br>';
    echo 'Word : '.$word.'<br>';
    echo 'Village : '.$village.'<br>';
    echo 'Password : '.$pass.'<br>';
    echo 'Email : '.$email.'<br>';
?>
</h5>
<form action="pdf.php" method="POST">
<input type="hidden" class="form-control d-inline w-25" value="<?php echo $phone ?>" name="phone" readonly>
<button class="btn btn-success m-auto text-center d-inline" style="color:yellow" type="submit" name="down" >Download</button>
</form>

</div>

<?php 
include("msg.php");
?>
    

<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-1').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-2').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','block'); 
        });
    });
</script>
</body>
</html>