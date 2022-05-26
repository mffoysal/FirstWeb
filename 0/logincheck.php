<?php

include('db.php');

    if(filter_var($_POST['login'], FILTER_SANITIZE_NUMBER_INT )){
        echo "<span style='color:black'>আসসালামু আলাইকুম.</span>";

        if(!empty($_POST['login'])){
            $query = "SELECT * FROM users WHERE phone='".$_POST["login"]."'";
            $result = mysqli_query($con,$query);
            $count = mysqli_num_rows($result);
            if($count > 0){
                echo "<span style='color:black'>ধন্যবাদ ... আপনি সঠিক তথ্য দিয়েছেন ।। লগিন এক্টিভিটি ইমেইল করা হবে...মেইল চেক করুন</span>";
            } else{
                echo "<span style=''> সঠিক তথ্য দিন!!! | Sorry! user not found.</span>";
            }
        }

    }else{
        echo "<span style=''>সঠিক তথ্য দিয়ে লগিন সম্পন্ন করুন....</span>";
    }
?>