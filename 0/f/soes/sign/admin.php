<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MF practice</title>
    <link rel="stylesheet" href="farhad.css">
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



    <div class="container1">
    <?php
        include('../../../db.php');
        // $con = new mysqli('localhost', 'root', '', 'foysal') or
        //     die(mysqli_error($con));
        $table = "student_soes";    
        $result = $con->query("SELECT * FROM student_soes") or die($con_error);    
        // pre_r($result);
    ?>
    
    <div class="row justify-content-center">
        <table>
            <thead>
                <tr>
                    <th class="th">ID</th>
                    <th class="th">NAME</th>
                    <th class="th">E-mail</th>
                    <th class="th">Password</th>
                    <th class="th">Gender</th>
                    <th class="th">Edu-SSC</th>
                    <th class="th">Edu-HSC</th>
                    <th class="th">Edu-hons.</th>
                    <th class="th">Division</th>
                    <th class="th">Message</th>
                    <th class="th">Mobile</th>
                    <th class="th">STATUS</th>
                    <th class="th">IQ</th>
                    <th class="th">Date</th>
                    <th class="th"> Picture</th>
                    <th colspan="2" class="th">Action</th>
                </tr>
            </thead>

            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="th"><?php echo $row['student_id']; ?></td>
                        <td class="th"><?php echo $row['username']; ?></td>
                        <td class="th"><?php echo $row['email']; ?></td>
                        <td class="th"><?php echo $row['password']; ?></td>
                        <td class="th"><?php echo $row['gender']; ?></td>
                        <td class="th"><?php echo $row['education1']; ?></td>
                        <td class="th"><?php echo $row['education2']; ?></td>
                        <td class="th"><?php echo $row['education3']; ?></td>
                        <td class="th"><?php echo $row['address']; ?></td>
                        <td class="th"><?php echo $row['msg']; ?></td>
                        <td class="th"><?php echo $row['tel']; ?></td>
                        <td class="th"><?php echo $row['student_status']; ?></td>
                        <td class="th"><?php echo $row['iq']; ?></td>
                        <td class="th"><?php echo $row['student_dob']; ?></td>
                        <td class="th"><?php echo $row['pic']; ?></td>
                        <td class="th">
                            <a href="admin.php?edit=<?php echo $row['student_id']; ?> " class="btn btn-info">Edit</a><br>
                            <a href="mf.php?delete=<?php echo $row['student_id']; ?> " class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                    <?php endwhile; ?>

        </table>


    </div>
        
        
        
    <?php     
            function pre_r( $array ){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }    
    ?>
    </div>
    <div class="container">
        <div class="row justify-content-center">
        <h1>MF FOYs@L Form</h1>
        <form action="">
        <div class="search_form">
           
                         
            <label for="search">Search Here</label><input id="search" class=""  type="search" value="" placeholder="Search Here">
            <input id="search-btn" type="submit" value="Search">
        

        </div>
        </form>

        

        <form action="mf.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>" >

            <div style="border-radius: 5px;"> 
                <div class="form-group">
                <label for="status">Status</label><input id="status" class="form-control"  type="text" name="status" value="<?php echo $status; ?>" placeholder="Enter 1 or 0">
                </div>
                <div class="form-group">
                <label for="name">Enter User Name</label><input id="name" class="form-control"  type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter user name">
                </div>
                <div class="form-group">
                <label for="student_neme">Enter Full Name</label><input id="student_name" class="form-control"  type="text" name="student_name" value="<?php echo $student_name; ?>" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Enter your Email</label><input id="email" class="form-control"  type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="student_email_id">Confrm your Email</label><input id="student_email_id" class="form-control"  type="email" name="student_email_id" value="<?php echo $student_email_id; ?>" placeholder="Confirm your email">
                </div>
                <div class="form-group">
                <label for="password">Enter your Password</label><input id="password" class="form-control"  type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter your password">
                </div>
                <div class="form-group">
                <label for="student_password">Confirm your Password</label><input id="Student_password" class="form-control"  type="password" name="student_password" value="<?php echo $student_password; ?>" placeholder="Confirm your password">
                </div>
                <div class="form-group">
                <label>Gender</label>
									<select name="student_gender" id="student_gender" class="form-control">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
                </div>
                    
                
            <h2>Select your Course</h2>
            <div class="form-group">
                <label id="gender" value="Gdmf" for="gdmf">GD~MF</label><input id="gdmf" class="form-control gender"  type="radio" name="gender" value="gdmf <?php echo $gender; ?>" placeholder="">
            
                <label id="gender" value="Webmf" for="webmf">WEB~MF</label><input id="webmf" class="form-control gender"  type="radio" name="gender" value="webmf <?php echo $gender; ?>" placeholder="">
            
                <label id="gender" value="Other" for="other">Other</label><input id="other" class="form-control gender"  type="radio" name="gender" value="other <?php echo $gender; ?>" placeholder="">
            </div>
                
            <h2>Educational Achivement</h2>
            <div class="form-group">
                <label id="edu" for="ssc">SSC</label><input id="ssc" class="form-control edu"  type="checkbox" name="education1" value="ssc">
                <label id="edu" for="hsc">HSC</label><input id="hsc" class="form-control edu"  type="checkbox" name="education2" value="hsc">
                <label id="edu" for="hons">Hons.</label><input id="hons" class="form-control edu"  type="checkbox" name="education3" value="hons.">
            </div>
                
            <div class="form-group">
            <label for="address">Select Your District</label>
                <select class="form-control" name="district" id="address">
                    <option value="Cox's Bazar">Cox'sBazar</option>    
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
                <label for="tel">Mobile</label><input id="tel" class="form-control" name="tel" type="tel" value="<?php echo $tel; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="student_address">YOur Address</label><input id="student_address" class="form-control" name="student_address" type="text" value="<?php echo $student_address; ?>" placeholder="Enter your Address">
            </div>
            <div class="form-group">
                <label for="range">Select your IQ Skill</label><input id="range" class="form-control" name="iq" type="range" value="<?php echo $iq; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="student_dob">Date Of Birth</label><input id="student_dob" class="form-control" name="student_dob" type="datetime-local" value="<?php echo $student_dob; ?>" placeholder="">
            </div>
            
            <div class="form-group">
            <label for="">Upload Your Profile Picture</label><input id="" class="form-control" name="pic" value="" type="file" value="<?php echo $student_image; ?>" placeholder="">
            </div>
                
            <div class="form-group">

                <div class="sub">
                        <input  type="reset" class="btn btn-info" value="Reset Data" placeholder="">
                        <?php
                        if ($update == true):
                        ?>   
                        <input type="submit" class="btn btn-info" name="update" value="Update">
                        <?php else: ?>
                        <input type="submit" class="btn btn-primary" name="save" value="Send Data"><br>
                        <?php endif; ?> 
                        
                </div>
            </div>       
            
    
            </div>
           
        </form>
        </div>
        
         
    </div>  


    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/app.js"></script>
</body>
</html>