
<?php
session_start();
include('db.php');

if(isset($_SESSION['phone'])){
    $phone=$_SESSION['phone'];
}    

    if(isset($_POST['photosave'])){
        $id=$_POST['unid'];
        $posth=$_POST['coverheader'];
        // $data=$_POST['crpost'];
        $status="Enable";
        $tel=$phone;
        $new_img_name="";
        $table="image";
        // echo $tel;

        if(!isset($_FILES['coverimage']['name'])){

               
            $con->query("INSERT INTO $table(unique_id, image, status, img_title) VALUES('$id','$new_img_name','$status','$posth')") or die($con->error);

            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    header("location:student.php?successmsg=ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...");
                }else if($_SESSION['role']=='admin'){
                    header("location:admin.php?successmsg=ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...");
                }else {
                    header("location:teacher.php?successmsg=ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...");
                }

            }
                


        }else{

            $img_name = $_FILES['coverimage']['name'];
            $img_type = $_FILES['coverimage']['type'];
            $tmp_name = $_FILES['coverimage']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"image/".$new_img_name)){

                        $con->query("INSERT INTO $table(unique_id, image, status, img_title) VALUES('$id','$new_img_name','$status','$posth')") or die($con->error);
                        // $con->query("UPDATE users SET img='$new_img_name' WHERE phone='$tel'");

                        // if(isset($_SESSION['img'])){
                        //     $deletepic =$_SESSION['img'];
                        //     unlink("image/".$deletepic);
                        // }
                        
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                header("location:student.php?successmsg=ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...");
                            }else if($_SESSION['role']=='admin'){
                                header("location:admin.php?successmsg=ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...");
                            }else {
                                header("location:teacher.php?successmsg=ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...");
                            }
    
                        }
                        
                        
                    }else{
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                header("location:student.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                            }else if($_SESSION['role']=='admin'){
                                header("location:admin.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                            }else {
                                header("location:teacher.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                            }
            
                        }
                        
                    }
        
                }else{
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role']=='student'){
                            header("location:student.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                        }else if($_SESSION['role']=='admin'){
                            header("location:admin.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                        }else {
                            header("location:teacher.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                        }
        
                    }
                }
                    
            }else{
                if(isset($_SESSION['role'])){
                    if($_SESSION['role']=='student'){
                        header("location:student.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                    }else if($_SESSION['role']=='admin'){
                        header("location:admin.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                    }else {
                        header("location:teacher.php?successmsg=দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...");
                    }
    
                }
            }
            // save





         
            
        }
            

    }
?>

