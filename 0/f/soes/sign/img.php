<?php

// if(isset($_POST['submit'])){
//     $g_file = $_POST['g_file'];
//     $g_title = $_POST['g_name'];
//     $d_name = $_POST['name'];
//     $d_file = $_POST['d_file'];
//     $d_position = $_POST['d_position'];
//     $fb = $_POST['fb'];
//     $twit = $_POST['twit'];
//     $google = $_POST['google'];
//     $status = $_POST['status'];

//     $img_dir = 'images/'.$_FILES['g_file']['name'];
    
//     move_uploaded_file($_FILES['g_file']['tmp_name'], $img_dir);
    
//     $image_dir = 'images/'.$_FILES['d_file']['name'];
    
//     move_uploaded_file($_FILES['d_file']['tmp_name'], $image_dir); 
    
// }

// $con = new mysqli('localhost','root','','mff') or die(mysqli_error($con->error));

// $con->query("INSERT INTO img(image,title,d_image,d_name,d_position,fb,twit,google,status) VALUES('$img_dir','$g_title','$image_dir','$d_name','$d_position','$fb','$twit','$google','$status')") or die($con->error);



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Gallary Upload</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

        

    </style>
</head>
<body>
<?php
    require 'img_proccess.php';
?>

    <div class="container text-center mt-5">
    <a href="admin.php"><button class="btn btn-danger text-center m-auto" >ADmin</button></a>
    
    </div>
    
    <div class="container shadow-lg mt-5 bg-light">
        <form action="" method="POST" enctype="multipart/form-data">
        
            

            
            <div class="row form-floating shadow-lg">
            <div class="col-md-4 form-floating shadow-lg">

            <div class="form-floating">
                <input type="text" class="form-control text-center" id="g_title" name="g_name" value="">
                <label for="g_title">Gallary Title</label>
            </div>
            <div class="form-floating">
                <input type="file" class="form-control text-center" id="g_file" name="g_file" value="">
                <label for="g_file">Gallary Picture</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control text-center" id="name" name="d_name" value="">
                <label for="d_name">|Dev Name|</label>
            </div>
            
            </div>
            <div class="col-md-4 form-floating shadow-lg">

            <div class="form-floating">
                <input type="file" class="form-control text-center" id="d_file" name="d_file" value="">
                <label for="d_file">Dev Picture</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control text-center" id="d_position" name="d_position" value="">
                <label for="d_position">Dev Position</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control text-center" id="fb" name="fb" value="">
                <label for="fb">Facebook</label>
            </div>

            </div>
            <div class="col-md-4 form-floating shadow-lg">

            <div class="form-floating">
                <input type="text" class="form-control text-center" id="twit" name="twit" value="">
                <label for="twit">Twiter</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control text-center" id="google" name="google" value="">
                <label for="google">Google</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control text-center" id="status" name="status" value="">
                <label for="status">SATUS: 1|0</label>
            </div>

            
            </div>
            </div>
            <div class="container mt-2 text-center">
            <button type="submit" class="btn btn-warning text-center" name="submit" >Submit</button>
            </div>
            
        </div>
        </form>

    </div>



    
</body>
</html>