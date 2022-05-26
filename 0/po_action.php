
<?php
session_start();
include('db.php');
if(isset($_POST['po_msg'])){
$_SESSION['mssg'] = $_POST['po_msg'];
}
if(isset($_SESSION['phone'])){
    $phone=$_SESSION['phone'];
}    

    if(isset($_POST['unid'])){
        $id=$_POST['unid'];
        $posth=$_POST['posth'];
        $data1=$_POST['crpost-1'];
        // $data2=$_SESSION['mssg'];
        $data2=$_POST['crpost'];
        // $data3=$_POST['crpost'];

        $data=$data1.' '.$data2;
        // $data=$data1.' '.$data2.' '.$data3;
        $status="Enable";
        $tel=$phone;
        $new_img_name="";
        // echo $tel;

        if($_FILES['files']['name']==''){

               
            $con->query("INSERT INTO post(unique_id, text, img, status, header) VALUES('$id','$data','$new_img_name','$status','$posth')") or die($con->error);

            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }else if($_SESSION['role']=='admin'){
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }else {
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }

            }
                


        }else{

            $img_name = $_FILES['files']['name'];
            $img_type = $_FILES['files']['type'];
            $tmp_name = $_FILES['files']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"image/".$new_img_name)){

                        $con->query("INSERT INTO post(unique_id, text, img, status, header) VALUES('$id','$data','$new_img_name','$status','$posth')") or die($con->error);
                        // $con->query("UPDATE users SET img='$new_img_name' WHERE phone='$tel'");

                        // if(isset($_SESSION['img'])){
                        //     $deletepic =$_SESSION['img'];
                        //     unlink("image/".$deletepic);
                        // }
                        
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else if($_SESSION['role']=='admin'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else {
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }
    
                        }
                        
                        
                    }else{
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else if($_SESSION['role']=='admin'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else {
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }
            
                        }
                        
                    }
        
                }else{
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role']=='student'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else if($_SESSION['role']=='admin'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else {
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }
        
                    }
                }
                    
            }else{
                if(isset($_SESSION['role'])){
                    if($_SESSION['role']=='student'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else if($_SESSION['role']=='admin'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else {
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }
    
                }
            }
            // save





         
            
        }
            

    }


    // qute insert


    
    if(isset($_POST['unidq'])){
        $id=$_POST['unidq'];
        $poname1=$_POST['ponameq'];
        $polocation1=$_POST['polocationq'];

        $data=$_POST['crpostq'];

        $s = "SELECT * FROM users WHERE unique_id='$id'";
        $sq=mysqli_query($con,$s);
        $sqs=mysqli_fetch_assoc($sq);
        $userName=$sqs['name'];
        $userLocation=$sqs['unions'].', '.$sqs['upazila'].', '.$sqs['district'];

        if($poname1==''){
            $poname=$userName;
        }else{
            $poname=$poname1;

        }
        
        if($polocation1==''){
            $polocation=$userLocation;
        }else{

            $polocation=$polocation1;
        }

        $status="q1";
        $tel=$phone;
        $new_img_name="";
        // echo $tel;

        if($_FILES['filesq']['name']==''){

               
            $con->query("INSERT INTO qute(unique_id, text, img, status, name, address) VALUES('$id','$data','$new_img_name','$status','$poname', '$polocation')") or die($con->error);

            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }else if($_SESSION['role']=='admin'){
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }else {
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }

            }
                


        }else{

            $img_name = $_FILES['filesq']['name'];
            $img_type = $_FILES['filesq']['type'];
            $tmp_name = $_FILES['filesq']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"image/".$new_img_name)){

                        $con->query("INSERT INTO qute(unique_id, text, img, status, name, address) VALUES('$id','$data','$new_img_name','$status','$poname', '$polocation')") or die($con->error);
                        // $con->query("UPDATE users SET img='$new_img_name' WHERE phone='$tel'");

                        // if(isset($_SESSION['img'])){
                        //     $deletepic =$_SESSION['img'];
                        //     unlink("image/".$deletepic);
                        // }
                        
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else if($_SESSION['role']=='admin'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else {
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }
    
                        }
                        
                        
                    }else{
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else if($_SESSION['role']=='admin'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else {
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }
            
                        }
                        
                    }
        
                }else{
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role']=='student'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else if($_SESSION['role']=='admin'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else {
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }
        
                    }
                }
                    
            }else{
                if(isset($_SESSION['role'])){
                    if($_SESSION['role']=='student'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else if($_SESSION['role']=='admin'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else {
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }
    
                }
            }
            // save





         
            
        }
            

    }


    if(isset($_POST['unidvc'])){
        $id=$_POST['unidvc'];
        $data=$_POST['crpostvc'];
        $link=$_POST['linkvc'];

        $album='P';
        $secure='S';
        if($_POST['linkvc'] != ''){

            $con->query("INSERT INTO videos_demo(unique_id, v_name, link, album, secure) VALUES('$id','$data','$link','$album','$secure')") or die($con->error);

            echo "Your video link added! Thank you";
        }else{


            echo "Sorry! link didn't add";

        }
    }
    // v2
    if(isset($_POST['unidvac'])){
        $id=$_POST['unidvac'];
        $data=$_POST['crpostvac'];
        $link=$_POST['linkvac'];

        $album='SA';
        $secure='S';
        if($_POST['linkvac'] != ''){

            $con->query("INSERT INTO videos_demo(unique_id, v_name, link, album, secure) VALUES('$id','$data','$link','$album','$secure')") or die($con->error);

            echo "Your video link added! Thank you";
        }else{


            echo "Sorry! link didn't add";

        }
    }
// v3
if(isset($_POST['unidvbc'])){
    $id=$_POST['unidvbc'];
    $data=$_POST['crpostvbc'];
    $link=$_POST['linkvbc'];

    $album='SB';
    $secure='S';
    if($_POST['linkvbc'] != ''){

        $con->query("INSERT INTO videos_demo(unique_id, v_name, link, album, secure) VALUES('$id','$data','$link','$album','$secure')") or die($con->error);

        echo "Your video link added! Thank you";
    }else{


        echo "Sorry! link didn't add";

    }
}
// v4
if(isset($_POST['unidvcc'])){
    $id=$_POST['unidvcc'];
    $data=$_POST['crpostvcc'];
    $link=$_POST['linkvcc'];

    $album='SC';
    $secure='S';
    if($_POST['linkvcc'] != ''){

        $con->query("INSERT INTO videos_demo(unique_id, v_name, link, album, secure) VALUES('$id','$data','$link','$album','$secure')") or die($con->error);

        echo "Your video link added! Thank you";
    }else{


        echo "Sorry! link didn't add";

    }
}
    // cover photo insert

    
    if(isset($_POST['unidc'])){
        $id=$_POST['unidc'];

        $data=$_POST['crpostc'];

        $status="Enable";
        $imgmode='1';

        $tel=$phone;
        $new_img_name="";
        // echo $tel;

        if($_FILES['filesc']['name']==''){

               
            $con->query("INSERT INTO image(unique_id, img_title, image, status, img) VALUES('$id','$data','$new_img_name','$status','$imgmode')") or die($con->error);

            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }else if($_SESSION['role']=='admin'){
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }else {
                    echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                }

            }
                


        }else{

            $img_name = $_FILES['filesc']['name'];
            $img_type = $_FILES['filesc']['type'];
            $tmp_name = $_FILES['filesc']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"image/".$new_img_name)){

                        $con->query("INSERT INTO image(unique_id, img_title, image, status, img) VALUES('$id','$data','$new_img_name','$status','$imgmode')") or die($con->error);
                        // $con->query("UPDATE users SET img='$new_img_name' WHERE phone='$tel'");

                        // if(isset($_SESSION['img'])){
                        //     $deletepic =$_SESSION['img'];
                        //     unlink("image/".$deletepic);
                        // }
                        
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else if($_SESSION['role']=='admin'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else {
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }
    
                        }
                        
                        
                    }else{
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else if($_SESSION['role']=='admin'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else {
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }
            
                        }
                        
                    }
        
                }else{
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role']=='student'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else if($_SESSION['role']=='admin'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else {
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }
        
                    }
                }
                    
            }else{
                if(isset($_SESSION['role'])){
                    if($_SESSION['role']=='student'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else if($_SESSION['role']=='admin'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else {
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }
    
                }
            }
            // save





         
            
        }
            

    }



    // update details
    if(isset($_POST['upproid'])){
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
        if($_POST['upproid']!=''){

            
            $con->query("UPDATE users SET  name='$name', email='$email', phone='$phone', division='$division', district='$district', upazila='$upazila', unions='$union', word='$word', village='$village'  WHERE unique_id='$id'");

            $con->query("UPDATE student_soes SET  student_name='$name', email='$email', username='$phone',  student_address='$district',  address='$union', msg='$word', village='$village'  WHERE unique_id='$id'");
            
            echo "Update Successfully! please refresh this page";


        }else{
           echo "Sorry Something wrong";
        }


    }

    if(isset($_POST['upproidbio'])){
        $id=$_POST['upproidbio'];
        $namebio =$_POST['upbio'];
            
        if($_POST['upproidbio']!=''){
            
            $con->query("UPDATE users SET  bio='$namebio' WHERE unique_id='$id'");

          
            echo "Update Successfully! please refresh this page";


        }else{
           echo "Sorry Something wrong";
        }


    }


    if(isset($_POST['upproidpic'])){

        $tel=$_POST['upproidpic'];
        // echo $tel;

        if(isset($_FILES['updateimage'])){

            $img_name = $_FILES['updateimage']['name'];
            $img_type = $_FILES['updateimage']['type'];
            $tmp_name = $_FILES['updateimage']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"image/".$new_img_name)){

                        $con->query("UPDATE users SET img='$new_img_name' WHERE unique_id='$tel'");

                        if(isset($_SESSION['img'])){
                            $deletepic =$_SESSION['img'];
                            unlink("image/".$deletepic);
                        }

                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else if($_SESSION['role']=='admin'){
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }else {
                                echo "ধন্যবাদ! আপনার নতুন একটি পোষ্ট  সংরক্ষণ করা হয়েছে...";
                            }
    
                        }
                        
                        
                    }else{
                        if(isset($_SESSION['role'])){
                            if($_SESSION['role']=='student'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else if($_SESSION['role']=='admin'){
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }else {
                                echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                            }
            
                        }
                        
                    }
        
                }else{
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role']=='student'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else if($_SESSION['role']=='admin'){
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }else {
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                        }
        
                    }
                }
                    
            }else{
                if(isset($_SESSION['role'])){
                    if($_SESSION['role']=='student'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else if($_SESSION['role']=='admin'){
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }else {
                        echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    }
    
                }
            }
                


        }else{
            if(isset($_SESSION['role'])){
                if($_SESSION['role']=='student'){
                    echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                }else if($_SESSION['role']=='admin'){
                    echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                }else {
                    echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                }

            }
            
        }
            

    }

?>

