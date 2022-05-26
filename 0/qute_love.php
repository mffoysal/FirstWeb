<?php
include('db.php');

$type=$_POST['type'];
$id=$_POST['id'];

if($type=='likeq'){
    $sql="UPDATE qute SET like_count=like_count+1 WHERE id=$id ";
}else{
    $sql="UPDATE qute SET dislike_count=dislike_count+1 WHERE id=$id ";
}

$rowt=mysqli_query($con,$sql);
?>