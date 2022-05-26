<?php

include('config.php');

    $table = "users";
    // if(!empty($_POST['phone'])){
    //     $query = "SELECT * FROM users WHERE phone='".$_POST["phone"]."'";
    //     $result = mysqli_query($conn,$query);
    //     $count = mysqli_num_rows($result);
    //     if($count > 0){
    //         echo "<span style=''>এটি ইতিমধ্যে অন্য জনের নামে আছে ! । (অন্য নম্বর দিন) | Sorry user already exists.</span>";
    //     } else{
    //         echo "<span style='color:black'>এই নম্বর দিয়ে আপনি একাউন্ট খুলতে পারবেন ।। User available for Registration.</span>";
    //     }
    // }
?>

<?php
    if(filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT )){
        echo "<span style='color:black'>Your number is valid.</span>";

        if(!empty($_POST['phone'])){
            $query = "SELECT * FROM users WHERE phone='".$_POST["phone"]."'";
            $result = mysqli_query($conn,$query);
            $count = mysqli_num_rows($result);
            if($count > 0){
                echo "<span style=''>এটি ইতিমধ্যে অন্য জনের নামে আছে ! । (অন্য নম্বর দিন) | Sorry user already exists.</span>";
            } else{
                echo "<span style='color:black'>এই নম্বর দিয়ে আপনি একাউন্ট খুলতে পারবেন ।। User available for Registration.</span>";
            }
        }

    }else{
        echo "<span style=''>Please write a valid Phone number.</span>";
    }
?>