<?php
include('../../../db.php');
// $con = new mysqli('localhost','root','','mff') or die(mysqli_error($con->error));
$table = 'img';
if(isset($_POST['submit'])){
    $g_file = $_POST["g_file"];
    $g_title = $_POST["g_name"];
    $d_name = $_POST["name"];
    $d_file = $_POST["d_file"];
    $d_position = $_POST["d_position"];
    $fb = $_POST["fb"];
    $twit = $_POST["twit"];
    $google = $_POST["google"];
    $status = $_POST["status"];

    $img_dir = 'images/'.$_FILES['g_file']['name'];
    
    move_uploaded_file($_FILES['g_file']['tmp_name'], $img_dir);
    
    $image_dir = 'images/'.$_FILES['d_file']['name'];
    
    move_uploaded_file($_FILES['d_file']['tmp_name'], $image_dir); 

    $con->query("INSERT INTO $table (image,title,d_image,d_name,d_position,fb,twit,google,status) VALUES('$img_dir','$g_title','$image_dir','$d_name','$d_position','$fb','$twit','$google','$status')") or die($con->error);
    header('location: img.php');

}





?>