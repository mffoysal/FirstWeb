<?php

include('db.php');
    // $mysqli = new mysqli("localhost","root","","foysal");
    $table = "invoice";
    if(!empty($_POST['coupon'])){
        $query = "SELECT * FROM coupon WHERE coupon='".$_POST["coupon"]."' AND status='1' ";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if($count > 0){
            echo "<span style='color:black'>আপনি সঠিক কুপন দিয়েছেন! ধন্যবাদ. পেমেন্ট মেথড দেখুন(বিকাশ/নগদ)সিলেক্ট করে (বিকাশ/নগদ) নম্বর আর Trx ID দিন।.</span>";
            echo "<script>$('.hi').prop('disabled',false);</script>";
        } else{
            echo "<span style='color:red'>আপনার কুপন সঠিক নয়! দয়া করে সঠিক কুপনটি লিখুন.| Coupon is invalid.</span>";
            echo "<script>$('.hi').prop('disabled',true);</script>";
        }
    }
?>