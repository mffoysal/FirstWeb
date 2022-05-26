<?php
include('../../../db.php');
    // $con = new mysqli("localhost","root","","foysal");
    $table = "student_soes";
    if(!empty($_POST['name'])){
        $query = "SELECT * FROM student_soes WHERE username='".$_POST["name"]."'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if($count > 0){
            echo "<span style='color:black'>এটি ইতিমধ্যে অন্য জনের নামে আছে ! । (অন্য নাম লিখুন) | Sorry user already exists.</span>";
        } else{
            echo "<span style='color:yellow'>এই নামে আপনি একাউন্ট খুলতে পারবেন ।। User available for Registration.</span>";
        }
    }
?>