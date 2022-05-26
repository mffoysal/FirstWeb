<?php
include('db.php');
    // $mysqli = new mysqli("localhost","root","","foysal");
    $table = "invoice";
    if(!empty($_POST['tel'])){
        $query = "SELECT * FROM invoice WHERE phone='".$_POST["tel"]."'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if($count > 0){
            echo "<span style='color:black'>এই নম্বর দিয়ে ইতিমধ্যে আমাদের ডাটাবেজ এ তথ্য আছে ! বাকি তথ্য না লিখলেও চলবে...(প্রয়োজন হলে লিখতে পারেন) | user already exists.</span>";
        } else{
            echo "<span style='color:red'>এই নম্বর দিয়ে পূর্বের কোন তথ্য পাওয়া যায় নি! দয়া করে সমস্ত তখ্য দিয়ে ফরম পূরণ করুন ।। User not available for Place Order</span>";
        }
    }
?>