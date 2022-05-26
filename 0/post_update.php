<?php
include('db.php');




if(isset($_POST['deletepost'])){
    $id=$_POST['id'];
    $sql="DELETE FROM post  WHERE id=$id ";
    $rowt=mysqli_query($con,$sql);
    echo "Post Deleted!!!!";
}


if(isset($_POST['deletequte'])){
    $id=$_POST['id'];
    $sql="DELETE FROM qute  WHERE id=$id ";
    $rowt=mysqli_query($con,$sql);
    echo "Qute Deleted!!!!";
}

?>