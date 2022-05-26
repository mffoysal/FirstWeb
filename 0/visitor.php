
<?php
session_start();
include('db.php');

if(isset($_SESSION['visitor_id'])){
    $unique=$_SESSION['visitor_id'];
}  

date_default_timezone_set("Asia/Dhaka");

$time1 = date("d-m-Y h:i:sa");

if(isset($_POST['agentIp'])){
    $time=$time1;
    $id=$unique;
    $ip = $_POST['agentIp'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];

    $agent = $_POST['agent'];

    $browser = $_POST['browser'];
    $os = $_POST['os'];
    $version = $_POST['version'];
    $layout = $_POST['layout'];
    $description2=$browser.','.$os.','.$version.','.$layout;

    $description1 = $_POST['description'];

               
    $con->query("INSERT INTO visitor(unique_id, ip, time, description1, description2, browser, lat, lon) VALUES('$id','$ip','$time','$agent','$description1','$description2','$lat','$lon')") or die($con->error);

    echo "Hey! Your Browser Data Inserted! Thank You!...";

}else{
    echo "";
}

?>