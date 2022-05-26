<?php
include('../db.php');
if(isset($_POST['addfriend'])){
    $toid=$_POST['tofriend'];
    $fromid=$_POST['fromfriend'];
    $address=$_POST['address'];
    $image=$_POST['image'];
    $name=$_POST['name'];
    if(isset($_POST['tofriend'])){
        $status="Pending";
        $con->query("INSERT INTO friends(from_id, to_id, status, image, address, name) VALUES('$fromid','$toid','$status','$image','$address','$name')") or die($con->error);
        header('location:index.php?success=ধন্যবাদ! আপনার রিকুয়েস্ট পাঠানো হয়েছে>>>');
    }else{
        header('location:index.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }
}
?>


<?php
if(isset($_POST['addmess'])){
    if(isset($_POST['messid'])){
    $me=$_POST['me'];
    $mess=$_POST['messid'];

    
    $con->query("UPDATE users SET mess_id='$mess' WHERE unique_id='$me'");
    header('location:mess.php?success=ধন্যবাদ! আপনার রিকুয়েস্ট Accept হয়েছে>>>');
    }else{
        header('location:mess.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }

}
?>

<?php
if(isset($_POST['createmess'])){
    if(isset($_POST['me2'])){
    $me=$_POST['me2'];
    $mess=$_POST['mess'];
    $status2='Available';
    
    $con->query("INSERT INTO mess(mess_name, tutor_id, status) VALUES('$mess','$me','$status2')");


    header('location:mess.php?success=ধন্যবাদ! আপনার mess create হয়েছে>>>');
    }else{
        header('location:mess.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }

}
?>


<?php
if(isset($_POST['acceptfriend'])){
    if(isset($_POST['updaterequest'])){
        $statusr="Confirm";
        $idr=$_POST['updaterequest'];
        $upname=$_POST['updatename'];
        $upimg=$_POST['updateimage'];
        $upad=$_POST['updateaddress'];
        $fromfid=$_POST['fromid'];
        $tofid=$_POST['toid'];

        $con->query("UPDATE friends SET status='$statusr', image='$upimg', name='$upname', address='$upad' WHERE id='$idr'");

        $con->query("INSERT INTO fnd(from_id, to_id, status) VALUES('$fromfid','$tofid','$statusr')");
        $con->query("INSERT INTO fnd(from_id, to_id, status) VALUES('$tofid','$fromfid','$statusr')");

        header('location:request.php?success=ধন্যবাদ! আপনার রিকুয়েস্ট Accept হয়েছে>>>');
    }else{
        header('location:index.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }
}
?>