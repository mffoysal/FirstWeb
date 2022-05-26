<?php
include('../db.php');


if(isset($_REQUEST['delete_id'])){
    if($_REQUEST['delete_id']!='0'){
            $id=$_REQUEST['delete_id'];
            $exam=$_REQUEST['exam'];

            $con->query("DELETE FROM exam_answers WHERE axmne_id='$id' AND exam_id='$exam' ") or die($con->error());

            $con->query("DELETE FROM exam_attempt WHERE exmne_id='$id' AND exam_id='$exam' ")or die($con->error());

            header('location:result.php?success=Delete '.$id.' Result!');

    }else{
        header('location:result.php?success=Error '.$id.' Result!');

    }
}else{
    header('location:result.php');
}


?>