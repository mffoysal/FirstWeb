
<?php
session_start();
include('db.php');

if(isset($_SESSION['phone'])){
    $phone=$_SESSION['phone'];
}    

    if(isset($_POST['updatepost'])){
        $new_img_name="";
        $tel=$_POST['unid'];
        $imgold=$_POST['unidimg'];
        $h=$_POST['uph'];
        $data=$_POST['updata'];
        // echo $tel;

        if(isset($_FILES['upimg']['name'])){

            $img_name = $_FILES['upimg']['name'];
            $img_type = $_FILES['upimg']['type'];
            $tmp_name = $_FILES['upimg']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"image/".$new_img_name)){

                        $con->query("UPDATE post SET img='$new_img_name', text='$data', header='$h' WHERE id='$tel'");

                        
                            unlink("image/".$imgold);
                        
                        
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                header("location:student.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল ছবি আপডেট সফল হয়েছে...");
                            }else if($_SESSION['role']=='admin'){
                                header("location:admin.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল ছবি আপডেট সফল হয়েছে...");
                            }else {
                                header("location:teacher.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল ছবি আপডেট সফল হয়েছে...");
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
                


        }else{

            $con->query("UPDATE post SET img='$new_img_name', text='$data', header='$h' WHERE id='$tel'");

            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    header("location:student.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল ছবি আপডেট সফল হয়েছে...");
                }else if($_SESSION['role']=='admin'){
                    header("location:admin.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল ছবি আপডেট সফল হয়েছে...");
                }else {
                    header("location:teacher.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল ছবি আপডেট সফল হয়েছে...");
                }

            }
            
        }
            

    }
?>

<?php


if(isset($_POST['dpic'])){
    $did=$_POST['dpicid'];
    $imgoold=$_POST['dpicimg'];

    $con->query("DELETE FROM image WHERE id=$did");
    unlink("image/".$imgoold);

    if(isset($_SESSION['role'])){
        if($_SESSION['role']=='student'){
            header("location:student.php?successmsg=ধন্যবাদ! আপনার POST ছবি DELETE সফল হয়েছে...");
        }else if($_SESSION['role']=='admin'){
            header("location:admin.php?successmsg=ধন্যবাদ! আপনার POST ছবি DELETE সফল হয়েছে...");
        }else {
            header("location:teacher.php?successmsg=ধন্যবাদ! আপনার POST ছবি DELETE সফল হয়েছে...");
        }

    }

}
// else{
//     if(isset($_SESSION['role'])){
//         if($_SESSION['role']=='student'){
//             header("location:student.php?successmsg=দুঃখিত! ...");
//         }else if($_SESSION['role']=='admin'){
//             header("location:admin.php?successmsg=দুঃখিত! ...");
//         }else {
//             header("location:teacher.php?successmsg=দুঃখিত! ...");
//         }

//     }
// }


?>
<?php


if(isset($_POST['deletepost'])){
    $did=$_POST['did'];
    $imgoold=$_POST['imgold'];

    $con->query("DELETE FROM post WHERE id=$did");
    unlink("image/".$imgoold);

    if(isset($_SESSION['role'])){
        if($_SESSION['role']=='student'){
            header("location:student.php?successmsg=ধন্যবাদ! আপনার POST ছবি DELETE সফল হয়েছে...");
        }else if($_SESSION['role']=='admin'){
            header("location:admin.php?successmsg=ধন্যবাদ! আপনার POST ছবি DELETE সফল হয়েছে...");
        }else {
            header("location:teacher.php?successmsg=ধন্যবাদ! আপনার POST ছবি DELETE সফল হয়েছে...");
        }

    }

}
// else{
//     if(isset($_SESSION['role'])){
//         if($_SESSION['role']=='student'){
//             header("location:student.php?successmsg=দুঃখিত! ...");
//         }else if($_SESSION['role']=='admin'){
//             header("location:admin.php?successmsg=দুঃখিত! ...");
//         }else {
//             header("location:teacher.php?successmsg=দুঃখিত! ...");
//         }

//     }
// }


?>