<?php

include('db.php');
    // $mysqli = new mysqli("localhost","root","","foysal");
   
    if(!empty($_POST['phone'])){
        $query = "SELECT * FROM users WHERE phone='".$_POST["phone"]."' AND status='Active now' ";
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