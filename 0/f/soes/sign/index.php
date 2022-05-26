<?php
    // $error = array();

    // if(empty($name)){
    //     $nameError = "Please enter your name";
    //     array_push($error,$nameError);
    // }
    // if(empty($student_name)){
    //     $stnameError = "Please enter your full name";
    //     array_push($error,$stnameError);
    // }
    // if(empty($email)){
    //     $emailError = "Please enter your email";
    //     array_push($error,$emailError);
    // }
    // if(empty($student_email_id)){
    //     $stemailError = "Please confirm your email";
    //     array_push($error,$stemailError);
    // }
    // if(empty($password)){
    //     $passError = "Please enter new password";
    //     array_push($error,$passError);
    // }
    // if(empty($student_password)){
    //     $stpassError = "Please confirm your password";
    //     array_push($error,$stpassError);
    // }
    // if(empty($student_dob)){
    //     $stdobError = "Please set your DAte of birth";
    //     array_push($error,$stdobError);
    // }
    // if(empty($tel)){
    //     $telError = "Please enter your Phone number";
    //     array_push($error,$telError);
    // }
    // if(empty($student_address)){
    //     $staddressError = "Please enter your address";
    //     array_push($error,$staddressError);
    // }
    // if(empty($pic)){
    //     $picError = "Plsese upload your Picture";
    //     array_push($error,$picError);
    // }
    // if($password != $student_password){
    //     $passmatch = "Password and Confirm password doesn't match!";
    //     array_push($error,$passmatch);
    // }
    // if($email != $student_email_id){
    //     $emailmatch = "Email and Confirm Email doesn't match!";
    //     array_push($error,$emailmatch);
    // }

    // if(count($error) == 0){
        
        
        
    //     }
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLearn Sign up</title>
    <link rel="stylesheet" href="foysal.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
</head>
<body>
    <?php require_once 'mf.php'; ?>


    <?php

    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        
        <?php
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>

    </div>
    <?php endif ?>


    <?php     
            function pre_r( $array ){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }    
    ?>

        
        <div>
        <h1>EdULearn M|F FOYs@L</h1>
        <div style="margin-left: 5px" class="typing">
            Assalamualaikum ! <span class="typed">Welcome to our Edulearn Registration Form.</span></div><div class="crow">|</div> 
            
        </div> <br><br>
            <div style="margin-left: 5px" class="typing">
            Hello ! <span class="typed">রেজিঃ সম্পন্ন হলে Go To Login বাটনে ক্লিক করে লগিন করুন.</span></div><div class="crow">|</div> 
            
        </div>
        <br><br>


    </div>


    <div class="container">
        <div class="row justify-content-center">
        <h1>EdULearn Addmission Form</h1>
        <form action="">
        <div class="search_form mf">
           
                         
            <label for="search">সঠিক তথ্য দিয়ে সহযোগিতা করুন</label><input id="search" class="mff"  type="search" value="" placeholder="Search Here">
            <input id="search-btn" type="submit" value="Search"><button style="background: black; color: red; height: 40px" value=""><a style="text-decoration: none; color: white" href="../../login.php">GO to Login Page</a></button>
        
            <h1 class="h">নিচের ফরমটি পূরণ করুন</h1><br><br>


        </div>
        </form>

        

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>" >

            <div style="border-radius: 5px;"> 
                <div class="form-group">
                    <label for="reg_id">YOUR ID</label>
                    <input type="" style="color: yellow; background: teal" class="form-control" name="reg_id" type="text" value="<?php echo $number ?>" readonly>
                </div>
                <div class="form-group">
                <!-- <span id="check-username"></span> -->
                <label for="name">Enter User Name । সংক্ষিপ্ত নাম দিন</label>
                <h4 id=""><span id="check-username"></span></h4>
                <input id="name" class="form-control" onInput="checkUsername()" type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter user name">
                <h3 id=""><span id="check-username"></span></h3>
                <p>
                    <?php
                    if(isset($nameError)){
                        echo $nameError;
                    }
                    ?>
                    </p>
                </div>
                <div class="form-group">
                <label for="student_neme">Enter Full Name । আপনার নাম লিখুন</label><input id="student_name" class="form-control"  type="text" name="student_name" value="<?php echo $student_name; ?>" placeholder="Enter your full name">
                <p>
                    <?php
                    if(isset($stnameError)){
                        echo $stnameError;
                    }
                    ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="email">Enter your Email । একটি ইমেইল দিন</label><input id="email" class="form-control"  type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
                    <p>
                    <?php
                    if(isset($emailError)){
                        echo $emailError;
                    }
                    if(isset($emailmatch)){
                        echo $emailmatch;
                    }
                    ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="student_email_id">Confrm your Email । উপরের ইমেইল আবার লিখুন</label><input id="student_email_id" class="form-control"  type="email" name="student_email_id" value="<?php echo $student_email_id; ?>" placeholder="Confirm your email">
                    <p>
                    <?php
                    if(isset($stemailError)){
                        echo $stemailError;
                    }
                    if(isset($emailmatch)){
                        echo $emailmatch;
                    }
                    ?>
                    </p>
                </div>
                <div class="form-group">
                <label for="password">Enter your Password । পাসওয়ার্ড দিন</label><input id="password" class="form-control"  type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter your password">
                <p>
                <?php
                    if(isset($passError)){
                        echo $passError;
                    }
                    if(isset($passmatch)){
                        echo $passmatch;
                    }
                ?>
                </p>
                </div>
                <div class="form-group">
                <label for="student_password">Confirm your Password । পাসওয়ার্ড আবার লিখুন</label><input id="Student_password" class="form-control"  type="password" name="student_password" value="<?php echo $student_password; ?>" placeholder="Confirm your password">
                <p>
                <?php
                    if(isset($stpassError)){
                        echo $stpassError;
                    }
                    if(isset($passmatch)){
                        echo $passmatch;
                    }
                ?>
                </p>
                </div>
                <div class="form-group">
                <label>Gender । লিঙ্গ নির্বাচন করুন</label>
									<select name="student_gender" id="student_gender" class="form-control">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
                </div>
                    
                
            <h2>Select your Course । কোর্স নির্বাচন করুন</h2>
            <div class="form-group">
                <label id="gender" value="Gdmf" for="gdmf">GD~MF</label><input id="gdmf" class="form-control gender"  type="radio" name="gender" value="gdmf <?php echo $gender; ?>" placeholder="">
            
                <label id="gender" value="Webmf" for="webmf">WEB~MF</label><input id="webmf" class="form-control gender"  type="radio" name="gender" value="webmf <?php echo $gender; ?>" placeholder="">
            
                <label id="gender" value="Other" for="other">Other</label><input id="other" class="form-control gender"  type="radio" name="gender" value="other <?php echo $gender; ?>" placeholder="">
            </div>
                
            <h2>Educational Achivement । শিক্ষাগত যোগ্যতা সিলেক্ট করুন</h2>
            <div class="form-group">
                <label id="edu" for="ssc">SSC</label><input id="ssc" class="form-control edu"  type="checkbox" name="education1" value="ssc">
                <label id="edu" for="hsc">HSC</label><input id="hsc" class="form-control edu"  type="checkbox" name="education2" value="hsc">
                <label id="edu" for="hons">Hons.</label><input id="hons" class="form-control edu"  type="checkbox" name="education3" value="hons.">
            </div>
                
            <div class="form-group">
            <label for="address">Select Your District । জেলা </label>
                <select class="form-control" name="district" id="address">
                    <option value="Coxsbazar">Cox'sBazar</option>    
                    <option value="chattagram">Chattagram</option>
                    <option value="dhaka">Dhaka</option>
                    <option value="khulna">Khulna</option>
                    <option value="rajshahi">Rajshahi</option>
                    <option value="barishal">Barishal</option>
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="msg">Your Messege</label><textarea id="msg" class="form-control" name="msg" value="<?php echo $msg; ?>" placeholder="Enter your messege" ></textarea>
            </div>
                
            <div class="form-group">
                <label for="tel">Mobile । আপনার ফোন নম্বর দিন</label><input id="tel" class="form-control" name="tel" type="tel" value="<?php echo $tel; ?>" placeholder="">
                <p>
                <?php
                    if(isset($telError)){
                        echo $telError;
                    }
                ?>
            </p>
            </div>
            <div class="form-group">
                <label for="student_address">YOur Address । ঠিকানা লিখুন</label><input id="student_address" class="form-control" name="student_address" type="text" value="<?php echo $student_address; ?>" placeholder="Enter your Address">
                <p>
                <?php
                    if(isset($staddressError)){
                        echo $staddressError;
                    }
                ?>
            </p>
            </div>
            <div class="form-group">
                <label for="range">Select your IQ Skill</label><input id="range" class="form-control" name="iq" type="range" value="<?php echo $iq; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="student_dob">Date Of Birth । জন্ম তারিখ</label><input id="student_dob" class="form-control" name="student_dob" type="datetime-local" value="<?php echo $student_dob; ?>" placeholder="">
                <p>
                <?php
                    if(isset($stdobError)){
                        echo $stdobError;
                    }
                ?>
            </p>
            </div>
            
            <div class="form-group">
            <label for="">Upload Your Profile Picture আপনার প্রোফাইল ছবি</label><input id="" class="form-control" name="pic" value="" type="file" value="<?php echo $student_image; ?>" placeholder="">
            <p>
                <?php
                    if(isset($picError)){
                        echo $picError;
                    }
                    
                ?>
            </p>
            </div>
                
            <div class="form-group">

                <div class="sub">
                        <input  type="reset" class="btn btn-info d-inline" value="। Reset Data । " placeholder="">
                        <?php
                        if ($update == true):
                        ?>   
                        <input type="submit" class="btn btn-info" name="update" value="Update">
                        <?php else: ?>
                        <input type="submit" class="btn btn-primary d-inline" name="save" value="Send Data । সেন্ড আস"><br>
                        <?php endif; ?> 
                        
                </div>
            </div>       
            
    
            </div>
           
        </form>
        </div>
        
         
    </div>





    


    <!-- <script src="./js/bootstrap.bundle.js"></script> -->
    <!-- <script src="js/app.js"></script> -->
    <script src="jquery-3.6.0.min.js"></script>
    <script>
        function checkUsername(){

            jQuery.ajax({
                url: "check_availability.php",
                data: 'name=' +$("#name").val(),
                type: "POST",
                success: function (data){
                    $("#check-username").html(data);
                },
                error: function (){}
            });
        }
    </script>
</body>
</html>