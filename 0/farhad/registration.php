<?php
session_start();
include('php/config.php');

    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $pass=$_POST['password'];
        $image =$_POST['image'];

        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"php/images/".$new_img_name)){
                        $ran_id = rand(time(), 100000000);
                        $refer = strtoupper(bin2hex(random_bytes(3)));
                        $status = "Active now";
                        $encrypt_pass = ($pass);
                        $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, name, phone, pass, img, status, referral_code)
                        VALUES ({$ran_id}, '{$name}', '{$phone}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$refer}')");
                        if($insert_query){
                            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE phone = '{$phone}'");
                            if(mysqli_num_rows($select_sql2) > 0){
                                $result = mysqli_fetch_assoc($select_sql2);
                                $_SESSION['unique_id'] = $result['unique_id'];
                                $remsg= "success";
                                header("location:users.php");
                            }else{
                                echo "This email address not Exist!";
                            }
                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }
                }else{
                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }else{
                echo "Please upload an image file - jpeg, png, jpg";
            }
        }



    }

?>