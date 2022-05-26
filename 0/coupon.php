<?php
include('db.php');
    // $con = new mysqli('localhost', 'root', '', 'foysal') or die(mysqli_error($co->error));
    $coupon=get_safe_value($con,$_POST['coupon']);
    $res=mysqli_query($con,"SELECT * FROM invoice WHERE coupon='$coupon' && status='Enable'");
    $count=mysqli_num_rows($res);
    if($count>0){
        $coupon_details=mysqli_fetch_assoc($res);
        $coupon_value=$coupon_details['coupon_value'];

    }
    else{
        echo "not found";
    }

?>