
<?php
session_start();
include('db.php');

if(isset($_SESSION['phone'])){
    $phone=$_SESSION['phone'];
}    

    if(isset($_POST['upprosave'])){
        $new_img_name="";
                
        $id=$_POST['upproid'];
        $name =$_POST['upproname'];
        $phone =$_POST['upprophone'];
        $division =$_POST['upprodivision'];
        $district =$_POST['upprodistrict'];
        $upazila =$_POST['upproupazila'];
        $union =$_POST['upprounion'];
        $word =$_POST['upproword'];
        $village =$_POST['upprovillage'];
        $email =$_POST['upproemail'];
       
        if(isset($_FILES['upproimg']['name'])){

            $img_name = $_FILES['upproimg']['name'];
            $img_type = $_FILES['upproimg']['type'];
            $tmp_name = $_FILES['upproimg']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"image/".$new_img_name)){

                        $con->query("UPDATE users SET img='$new_img_name', name='$name', email='$email', phone='$phone', division='$division', district='$district', upazila='$upazila', unions='$union', word='$word', village='$village'  WHERE unique_id='$id'");

                        $con->query("UPDATE student_soes SET  student_name='$name', email='$email', username='$phone',  student_address='$district',  address='$union', msg='$word', village='$village'  WHERE unique_id='$id'");
                        
                        if(isset($_SESSION['img'])){
                            $deletepic =$_SESSION['img'];
                            unlink("image/".$deletepic);     
                        }
                        
                        
                        
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                header("location:student.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                            }else if($_SESSION['role']=='admin'){
                                header("location:admin.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                            }else {
                                header("location:teacher.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
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

            $con->query("UPDATE users SET  name='$name', email='$email', phone='$phone', division='$division', district='$district', upazila='$upazila', unions='$union', word='$word', village='$village'  WHERE unique_id='$id'");

            $con->query("UPDATE student_soes SET  student_name='$name', email='$email', username='$phone',  student_address='$district',  address='$union', msg='$word', village='$village'  WHERE unique_id='$id'");
            
            
            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    header("location:student.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                }else if($_SESSION['role']=='admin'){
                    header("location:admin.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                }else {
                    header("location:teacher.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                }

            }
            
        }
            

    }
?>


<!-- 
$id=$_POST['uproid'];
        $name =$_POST['upproname'];
        $phone =$_POST['upprophone'];
        $division =$_POST['upprodivision'];
        $district =$_POST['upprodistrict'];
        $upazila =$_POST['upproupazila'];
        $union =$_POST['upprounion'];
        $word =$_POST['upproword'];
        $village =$_POST['upprovillage'];
        $email =$_POST['upproemail'];



        $con->query("UPDATE users SET img='$new_img_name', name='$name', email='$email', phone='$phone', division='$division', district='$district', upazila='$upazila', unions='$union', word='$word', village='$village'  WHERE unique_id='$id'");

// $con->query("UPDATE student_soes SET  student_name='$name', email='$email', username='$phone',  student_address='$district',  address='$union', msg='$word', village='$village'  WHERE unique_id='$id'");

if(isset($_SESSION['img'])){
    $deletepic =$_SESSION['img'];
    unlink("image/".$deletepic);     


        $con->query("UPDATE users SET  name='$name', email='$email', phone='$phone', division='$division', district='$district', upazila='$upazila', unions='$union', word='$word', village='$village'  WHERE unique_id='$id'");

// $con->query("UPDATE student_soes SET  student_name='$name', email='$email', username='$phone',  student_address='$district',  address='$union', msg='$word', village='$village'  WHERE unique_id='$id'");


            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    header("location:student.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                }else if($_SESSION['role']=='admin'){
                    header("location:admin.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                }else {
                    header("location:teacher.php?successmsg=ধন্যবাদ! আপনার প্রোফাইল আপডেট সফল হয়েছে...");
                }

            } -->