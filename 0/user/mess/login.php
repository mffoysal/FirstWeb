<?php  include "includes/config.php"; ?>
<?php session_start();


if(isset($_SESSION['unique_id'])){
 header('location: admin/index.php');   
}

$_SESSION['name'] = null;
$_SESSION['phone'] = null;
$_SESSION['pass'] = null;
$_SESSION['unique_id'] = null;





?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <?php

if(isset($_POST['login']) && $_POST['randcheck'] == $_SESSION['rand']){
      $uname =  $_POST['username'];
      $upass = $_POST['password'];
       $_POST['randcheck'];
   $query = "SELECT * FROM users WHERE name = '{$uname}' ";
    $select_query = mysqli_query($connection,$query);
    if(!$select_query){
        die('connection problem' . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_query)){
        $member_name = $row['name'];
        $member_email = $row['phone'];
        $member_pass = $row['pass'];
        $member_id = $row['unique_id'];
        $member_role = $row['actype'];
        if(password_verify($upass,$member_pass) && $uname === $member_name){
        $_SESSION['name'] = $member_name;
        $_SESSION['phone'] = $member_email;
        $_SESSION['pass'] = $member_pass;
        $_SESSION['unique_id'] = $member_id;
        $_SESSION['actype'] = $member_role;
            header('Location: ./admin');
         
        }
        else{
            echo "<h3>Please Enter correct Password</h3>";
            //header("Location: login.php");
        }
    }
    
}





?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
			
                <div class="form-wrap">
                <h3 style="text-align:center;">Login</h3>
                   <br>
                    <form role="form" action="login.php" method="post" id="login-form" autocomplete="off">
					<?php
					$rand = rand();
					$_SESSION['rand'] = $rand;
					
					?>
					<input type="hidden" name="randcheck" value="<?php echo $rand;?>">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="login" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                    </form>
                  <br>
                    <h5 style="text-align:center;">IF you dont have account <a href="index.php">Register</a>First Already Have accrount please <a href="login.php">login</a></h5>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
