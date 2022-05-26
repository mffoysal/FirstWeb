<?php
include('../db.php');
if(isset($_POST['addtutor'])){
    $toid=$_POST['tutorid'];
    $fromid=$_POST['stdid'];
    $postid=$_POST['postid'];
    if(isset($_POST['stdid'])){
        $status="Pending";
        $con->query("INSERT INTO student_request(std_id, tutor_id, status, post_id) VALUES('$fromid','$toid','$status','$postid')") or die($con->error);

        $con->query("UPDATE tutor SET status='$status' WHERE post_id='$postid' ");
        header('location:studentpost.php?success=ধন্যবাদ! আপনার রিকুয়েস্ট পাঠানো হয়েছে. আগামী ১২ ঘন্টার মধ্যে টিউটরের সাথে ফোনে যোগাযোগ করুন।>>>');
    }else{
        header('location:studentpost.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }
}
?>

<?php

if(isset($_POST['addmentor'])){
    $toid=$_POST['tutorid'];
    $fromid=$_POST['stdid'];
    $postid=$_POST['postid'];
    if(isset($_POST['stdid'])){
        $status="Pending";
        $con->query("INSERT INTO student_request(std_id, tutor_id, status, post_id) VALUES('$fromid','$toid','$status','$postid')") or die($con->error);

        $con->query("UPDATE tutor SET status='$status' WHERE post_id='$postid' ");
        header('location:studentpost.php?success=ধন্যবাদ! আপনার রিকুয়েস্ট পাঠানো হয়েছে. আগামী ১২ ঘন্টার মধ্যে টিউটরের সাথে ফোনে যোগাযোগ করুন।>>>');
    }else{
        header('location:studentpost.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }
}
?>



<?php
if(isset($_POST['acceptstd'])){
    if(isset($_POST['updaterequest'])){
        $statusr="Confirm";
        $idr=$_POST['updaterequest'];

        $fromfid=$_POST['fromid'];
        $tofid=$_POST['toid'];
        $postid=$_POST['postid'];

        $con->query("UPDATE student_request_post SET status='$statusr'  WHERE post_id='$postid'");

        $con->query("UPDATE student_request SET status='$statusr'  WHERE post_id='$postid'");

        // $con->query("INSERT INTO activated(tutor_id, std_id, post_id, status) VALUES('$fromfid','$tofid','$postid','$statusr')");
        // $con->query("INSERT INTO fnd(from_id, to_id, status) VALUES('$tofid','$fromfid','$statusr')");

        header('location:studentpost.php?success=ধন্যবাদ! আপনার রিকুয়েস্ট Accept হয়েছে>>>');
    }else{
        header('location:studentpost.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }
}
?>


<?php
if(isset($_POST['deletepost'])){
    if(isset($_POST['postid'])){
        
        $idpost=$_POST['postid'];
        $id=$_POST['id'];
 
        $con->query("DELETE FROM student_request_post WHERE unique_id='$id' AND post_id='$idpost'") or die($con->error());

        if($_POST['dpostimg']!=''){
            $imgoold=$_POST['dpostimg'];
            unlink("../image/".$imgoold);
        }

        header('location:myrequest.php?success=ধন্যবাদ! '.$idpost.' আপনার Post Delete হয়েছে>>>');
    }else{
        header('location:myrequest.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }
}
?>


<?php
if(isset($_POST['hidepost'])){
    if(isset($_POST['upostid'])){
        $statusr="Hide";
        $idr=$_POST['idup'];

        // $fromfid=$_POST['fromid'];
        // $tofid=$_POST['toid'];
        $postid=$_POST['upostid'];

        $con->query("UPDATE student_request_post SET status='$statusr'  WHERE post_id='$postid'");

        // $con->query("UPDATE tutor_request SET status='$statusr'  WHERE post_id='$postid'");

        // $con->query("INSERT INTO activated(tutor_id, std_id, post_id, status) VALUES('$fromfid','$tofid','$postid','$statusr')");
        // $con->query("INSERT INTO fnd(from_id, to_id, status) VALUES('$tofid','$fromfid','$statusr')");

        header('location:myrequest.php?success=ধন্যবাদ! - '.$postid.' আপনার POST Update হয়েছে>>>');
    }else{
        header('location:myrequest.php?success=দুঃখিত! আবার চেষ্টা করুন...');
    }
}
?>




<?php

$tel='';
$address="";

if(isset($_POST['addmentorpost'])){
    $id=$_POST['myid'];
    $class=$_POST['class'];
    $sub=$_POST['sub'];
    $address=$_POST['address'];
    $status="Available";
    $tel=$_POST['phone'];
    // $new_img_name="";
    // echo $tel;

    if($_FILES['fimg']['name']==''){

        $postid = strtoupper(bin2hex(random_bytes(3)));   

        $con->query("INSERT INTO student_request_post(unique_id, class, sub, status, phone, address, post_id) VALUES('$id','$class','$sub','$status','$tel','$address','$postid')") or die($con->error);

        header('location:myrequest.php?success=ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...>>>');
            


    }
    else{

        $img_name = $_FILES['fimg']['name'];
        $img_type = $_FILES['fimg']['type'];
        $tmp_name = $_FILES['fimg']['tmp_name'];
        
        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if(in_array($img_ext, $extensions) === true){
            $types = ["image/jpeg", "image/jpg", "image/png"];
            if(in_array($img_type, $types) === true){
                $time = time();
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name,"../image/".$new_img_name)){

                    $postid = strtoupper(bin2hex(random_bytes(3)));   

                    $con->query("INSERT INTO student_request_post(unique_id, class, sub, status, phone, address, img, post_id) VALUES('$id','$class','$sub','$status','$tel','$address','$new_img_name','$postid')") or die($con->error);
                   
                    // $con->query("UPDATE users SET img='$new_img_name' WHERE phone='$tel'");

                    // if(isset($_SESSION['img'])){
                    //     $deletepic =$_SESSION['img'];
                    //     unlink("image/".$deletepic);
                    // }
                    
                    header('location:myrequest.php?success=ধন্যবাদ! - '.$new_img_name.' আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...>>>');
                    
                }else{

                    header('location:myrequest.php?success=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...>>>');
                    
                }
    
            }else{
                header('location:myrequest.php?success=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...>>>');
            }

                
        }else{
            header('location:myrequest.php?success=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...>>>');
        }
        // save





     
        
    }
        

}

?>