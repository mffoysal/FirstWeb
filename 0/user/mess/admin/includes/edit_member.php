
 <?php
 if(isset($_GET['mem_id'])){
		 $the_member = $_GET['mem_id']; 
 }
 $query = "SELECT * FROM users WHERE unique_id='{$the_member}'";
$select_member = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_member)){
	$db_username = $row['name'];
	 $db_email = $row['phone'];
	 $db_password = $row['pass'];
	  $db_role = $row['actype'];
	
}

if(isset($_POST['submit_reg']) && $_POST['randcheck'] == $_SESSION['rand']){
    $uname =  strtolower($_POST['username']);
    $uemail = strtolower($_POST['email']);
    $upass = strtolower($_POST['password']);
	$urole = strtolower($_POST['userrole']);
    if(!empty($uname) && !empty($uemail) && !empty($upass) &&  !empty($urole)){

		
		$query ="UPDATE users SET ";
	   $query .="name = '{$uname }', ";
	   $query .="phone = '{$uemail }', ";
	   $query .="pass = '{$upass }', ";
	   $query .="actype = '{$urole }' ";
	   $query .= "WHERE unique_id = {$the_member} ";
   
        $register_query = mysqli_query($connection,$query);
        if(!$register_query){
            die('cannot connect' . mysqli_error($connection));
        }
        else{
            echo "<h6>Successfully Created</h6>";
			
        }
    }
    else{
        echo "<h6>Sorry Failed</h6>";
		
    }
}


?>
    
 
    <!-- Page Content -->
    
    
<section id="login">
    <div class="">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
               
                   <h3 style="text-align:center;padding-bottom:20px;">Edit Member</h3>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
					<?php
					$rand = rand();
					$_SESSION['rand'] = $rand;
					?>
						<input type="hidden" name="randcheck" value="<?php echo $rand;?>">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $db_username;?>" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="tel" name="email" value="<?php echo $db_email;?>" id="email" class="form-control" placeholder="Phone">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" value="<?php echo $db_password;?>" id="key" class="form-control" placeholder="Password">
                        </div>
                
                      
						<select class="form-control" name="userrole" id="exampleFormControlSelect1">
						<?php
						
						 if($db_role = 'mentor'){
							  echo "<option value='mentor'>mentor</option>";
							 echo "<option value='subscriber'>Subscriber</option>";
							 
						 }
						 else{
							 echo "<option value='subscriber'>Subscriber</option>";
							  echo "<option value='mentor'>mentor</option>";
							   
						 }
						
						?>
							  
							  
							</select>
							<br>
							<input type="submit" name="submit_reg" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Update">
                    </form>
                    <br>
                    <h4>IF you Already Have accrount please <a href="../login.php">login</a></h4>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2021 Developed By Farhad Foysal</h5>
                </div>
            </div>
        </footer>