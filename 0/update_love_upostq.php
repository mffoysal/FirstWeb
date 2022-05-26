<?php
include('db.php');

$type=$_POST['type'];
$id=$_POST['id'];

if($type=='like'){
    $sql="UPDATE qute SET like_count=like_count+1 WHERE id=$id ";
}else if($type=='love'){
    $sql="UPDATE qute SET love_count=love_count+1 WHERE id=$id ";
}
else{
    $sql="UPDATE qute SET dislike_count=dislike_count+1, like_count=like_count-1 WHERE id=$id ";
}

$rowt=mysqli_query($con,$sql);
?>