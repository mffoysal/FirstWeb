<?php

include('conn.php');


if(isset($_POST['addcourse'])){
    if(isset($_POST['courseid'])){
    $me=$_POST['me'];
    $mess=$_POST['courseid'];

    
    $conn->query("UPDATE users SET exmne_course='$mess' WHERE unique_id='$me'");
    header('location:home.php?success=ধন্যবাদ! আপনার রিকুয়েস্ট Accept হয়েছে>>>');
    }else{
        header('location:home.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }

}
?>