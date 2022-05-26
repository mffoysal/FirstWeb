<?php


session_start();

if(isset($_SESSION['username'])){
	$_SESSION['username']=$_SESSION['username'];
}
if (!isset($_SESSION['username'])) {
	header('location:../login.php');
}

if(empty($_SESSION['username'])){
    $_SESSION['username'] ='';
}
if(empty($_SESSION['id'])){
    header('location:../login.php');
	$_SESSION['id'] ='';
}	
if(empty($_SESSION['pass'])){
    header('location:../login.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<title>MF EdULearn~FMNF</title>
	<!----magnific popup css file for work section -->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

	<!----owlcarousel css file for our team section -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">


	<!----Linking google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

	<!----font-awsome start-->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

	<!----font-awsome ends-->

		<!----css file link-->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	   <!----favicon setting-->
	<link rel="shortcut icon" type="text/css" href="img/mylogo.png">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap/bootstrap-3.3.7/dist/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="jquery/jquery-3.1.1.min.js"></script>

	<!----magnific popup js file for work section -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

	<!----owlcarousel js file for our team section -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

	<!----------email notification-------->







  <link rel="stylesheet" href="assets/tether/tether.min.css">
 
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
 





	<style type="text/css">
	
	.servicebody
	{
		

	}


	html
	{
		scroll-behavior: smooth;

	}


	
		
		.bgcolor
		{
			background: rgba(0,0,0,0.1);


		}

		/* body
		{
				background: #FC354C; 
background: -webkit-linear-gradient(to right, #0ABFBC, #FC354C); 
background: linear-gradient(to right, #0ABFBC, #FC354C); 
		color: white;
		}

		.navbar
		{
			background: #C04848;  
background: -webkit-linear-gradient(to right, #480048, #C04848);  
background: linear-gradient(to right, #480048, #C04848); 

		}
	 */


	</style>

</head>
<body onload="myfunction()">
		   <!---preloader starts	----->

		   <div id="loading"></div>

		   <!---preloader Ends	----->


			<!---Navigation Starts	----->

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<!------Responsive Button---->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>


				</button>

				<h1 style="color: white;margin-top: 10px;" id="myhead">EdULearn~</h1>
			</div>
			<div class="collapse navbar-collapse" id="navi">
                 <!------Navigation menus starts---->
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="../login.php">Main/HOME</a></li>
					<li> <a href="../login.php">HOME</a></li>
					<li> <a href="#myservice_section">প্রোগ্রাম/ক্লাস</a></li>
					<li> <a href="#work">গ্যালারি/নোটিশ বোর্ড</a></li>
					<li> <a href="#our-members">মেন্টর</a></li>
					<li> <a href="#myfaq">জরুরী নোটিশ</a></li>
					<li style="background-color: black; border-radius: 30px"> <a class="" href="soes/">MCQ | ID:<?php echo $_SESSION['id'] ?></a></li>
					<li> <a href="logout.php" id="our-location" class="btn-success" ><?php echo $_SESSION['username'];   ?>~Exit</a></li>
				</ul>
	                 <!------Navigation menus ends---->
			</div>
		</div>
	</nav>
			<!---Navigation Ends	----->

			<!---Slider Section starts	------->
			<section class="slider text-center" id="slider">
				<div class="slider-overlay">
					<div class="slider-content">
						<div class="icons">

							<i class="fa fa-apple"></i>
							<i class="fa fa-android"></i>
							<i class="fa fa-windows"></i>
						</div>
						<br>
						<div class="text">ওয়েলকাম~<?php echo $_SESSION['username'];   ?>~ আপনার দিন জীবন সুন্দর কাটুক      <!-- jquery typed effect -->
							
						</div>
							<div class="cta-div">
								<a href="" class="btn1">এফএমএনএফ</a>
								<a href="#myservice_section" class="btn2">প্রোগ্রামস । ক্লাস~TODAY</a>
							</div>
							<br><br>
							<div class="social-networks">
								<a href="https://www.facebook.com/Unique-Developer-282626055790378/?modal=admin_todo_tour" class="fa fa-facebook"></a>
								<a href="https://twitter.com/SunilYa35862617" class="fa fa-twitter"></a>
								<a href="https://www.instagram.com/unique_developer" class="fa fa-instagram"></a>
								<a href="" class="fa fa-reddit"></a>
								<a href="https://www.linkedin.com/in/sunil-yadav-70b3bb181/" class="fa fa-linkedin"></a>
								<a href="" class="fa fa-cog"></a>
							</div>
					</div>
				</div>
			</section>

			<!---Slider Section ends------->

			<!---Login Start------->

			<div class="modal fade modal-dialog-centered" id="mymodal">
				<div class="modal-dialog ">
					<div class="modal-content">
						<h3 id="login-heading">লগিন</h3>
						
					<div class="modal-body" >
						<div class="left-box">
						<form method="POST" action="validation.php">
							<div class="form-group">
								<label><i class="fa fa-user fa-2x"></i>Username।ইউজার নাম :</label>
								<input type="text" name="name" class="form-control">

								<label><i class="fa fa-lock fa-2x"></i>Password।পাসওয়ার্ড :</label>
								<input type="password" name="password" class="form-control">
								<button id="btn-login" type="submit">দাখিল করুন</button>
								
							</div>
							<div class="register">
								<h2>&copy;Don't have an account?&nbsp<span id="create-account"><a href="signup.html">Create</span></a> </h2>
							</div>
							
						</form>
					</div>
					<div class="right-box">
						<span class="signinwith">Sign in With <br> Social Networks</span>

						<button class="social facebook">Facebook</button>
						<button class="social twitter">twitter</button>
						<button class="social google">gmail</button>
					</div>
						
					</div>
					
						
				</div>
			</div>
		</div>

         <!---Login Ends------->

         <!---Our Services Section Start------->

         <br><br>
         <div class="container-fluid servicebody" id="myservice_section">
         <div class="service-are" id="service">
         	<div class="row">
         		<div class="col-xs-12">
         			<div class="section-title text-center">
         				<h2><b>আপনার কোর্সসমূহ</b></h2>
         				<p>
         					নিচের এন্রোলকৃত কোর্স এ আপনি ভিজিট করতে পারবেন। <br>কার্ড এর মাঝখানে বোল্ড লেখার উপর ক্লিক করে দাখিল করুন।
         				</p>
         			</div>
         		</div>
         	</div>
         	<div class="row">
         		<div class="col-md-4 col-sm-6 col-xs-12" style="background-color: gray">
					 <div class="service-wrap text-center" style="background-color: white">
         				<div class="service-icon">
         					<i class="fa fa-leaf"></i>
         				</div>
         				<h3><a href="programmingdemo.php">প্রোগ্রামস/ক্লাস লেসন~ PROGRAMMING</a></h3>
         				<p>
         					Here you will find all the lecture tutorials related to programming languages 
         					like JAVA,PYTHON,ANDROID etc
         				</p>
         			</div>
         		</div>

         		<div class="col-md-4 col-sm-6 col-xs-12" style="background-color: cyan">
         			<div class="service-wrap text-center" style="background-color: white">
         				<div class="service-icon">
         					<i class="fa fa-laptop"></i>
         				</div>
         				<h3><a href="video tutorials\java\display_video_courses.php">ভিডিও । VIDEO TUTORIALS</a></h3>
         				<p>
         					Here you will find all the videos tutorials related to programming languages 
         					like JAVA,PYTHON,ANDROID etc
         				</p>
         			</div>
         		</div>

         		<div class="col-md-4 col-sm-6 col-xs-12 " style="background-color: gray">
         			<div class="service-wrap text-center" style="background-color: white">
         				<div class="service-icon">
         					<i class="fa fa-laptop"></i>
         				</div>
         				<h3><a href="online_quize/quizhome.php">কুইজ প্র্যাকটিস</a></h3>   <!--  exercise/exercise.php -->
         				<p>
         					Here you will find problem programs for practice and their implementation also which will improve your coding skill
         				</p>
         			</div>
         		</div>
<!-- 
         		<div class="col-md-4 col-sm-6 col-xs-12">
         			<div class="service-wrap text-center">
         				<div class="service-icon">
         					<i class="fa fa-laptop"></i>
         				</div>
         				<h3><a href="">WEB DESIGN</a></h3>
         				<p>
         					this is our serices theses are the services provided by us <br>this are the services provided by us
         				</p>
         			</div>
         		</div>
 -->
         		<!-- <div class="col-md-4 col-sm-6 col-xs-12">
         			<div class="service-wrap text-center">
         				<div class="service-icon">
         					<i class="fa fa-laptop"></i>
         				</div>
         				<h3><a href="">COMPUTER SCIENCE</a></h3>
         				<p>
         					this is our serices theses are the services provided by us <br>this are the services provided by us
         				</p>
         			</div>
         		</div>
 -->
         		<!-- <div class="col-md-4 col-sm-6 col-xs-12">
         			<div class="service-wrap text-center">
         				<div class="service-icon">
         					<i class="fa fa-user"></i>
         				</div>
         				<h3><a href="">TECH NEWS</a></h3>
         				<p>
         					this is our serices theses are the services provided by us <br>this are the services provided by us
         				</p>
         			</div>
         		</div> -->
         	</div>
         </div>
     </div>

			<!---Our Services Section Ends------->

			<!---Emailnotification Section Start------->



			<!---Emailnotification Section Start------->


			<!---Our Services Section Ends------->

			<?php
				function image(){
					// $co = new mysqli('localhost','root','','foysal');
					include('../db.php');
					$co = $con;
					$que = "SELECT * FROM img WHERE status='1'";
					$result2 = mysqli_query($co,$que);
					// $row2 = mysqli_fetch_assoc($result2);
					$num2 = mysqli_num_rows($result2);

					if($num2>0){
						return $result2;
					}
				}
			?>
			

			<section class="work" id="work"><br>
				<h2 id="work-heading" class="text-center text-primary" style="font-weight: bold;"> আমাদের কাজ । OUR WORK</h2>
				<p class="text-center text-primary">join us to improve your works join us to improve your works</p>
				<div class="container-fluid">
					<!---first row start-->
					<div class="row no-gutters">
					
					<?php

						$data = image();

						while($row2 = mysqli_fetch_assoc($data)){
							img($row2['image'], $row2['title']);
						}

					?>
					<?php
					function img($image,$title){
						$imgshow = " 
						<div class=\"col-md-3 col-sm-3 col-xs-3\">
						<div class=\"img-wrapper\">
						<a href=\"soes/sign/$image\" title=\"$title\">
							<img src=\"soes/sign/$image\" class=\"img-responsive\">
						</a>
						
						</div>
					
						</div>";
					echo $imgshow;
					};
					?>

					


					
					<!---first row ends-->


					<!-------second row starts  --->
					
					
					
					
					<!---second row ends-->
					
				</div>
				


			</section>

			<!---Our Services Section Ends------->

			<!-- introduction video section starts -->

		<!-- 	<br><br><br><br>

		<section class="header7 cid-rjrjygOfd1" id="header7-3">

    
		    <div class="container">
		        <div class="media-container-row">

		            <div class="media-content align-right">
		                <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">
		                    Intro with Video
		                </h1>
		                <div class="mbr-section-text mbr-white pb-3">
		                    <p class="mbr-text mbr-fonts-style display-5">
		                        Intro with background color, paddings and a video on the right. Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.
		                    </p>
		                </div>
		                <div class="mbr-section-btn">
		                        <a class="btn btn-md btn-primary display-4" href="https://mobirise.co">LEARN MORE</a>
		                        <a class="btn btn-md btn-white-outline display-4" href="https://mobirise.co">LIVE DEMO</a>
		                </div>
		            </div>

		            <div class="mbr-figure" style="width: 100%;"><iframe class="mbr-embedded-video" src="https://www.youtube.com/embed/uNCr7NdOJgw?rel=0&amp;amp;showinfo=0&amp;autoplay=0&amp;loop=0" width="1280" height="720" frameborder="0" allowfullscreen></iframe></div>

		        </div>
    	</div>
		</section> -->


  

			<!-- introduction video section ends -->








			<!---Our Team Section Start------->
			<br><br><br>
			<div class="container text-center" id="our-members">
				<h2><b>MEMBERS</b></h2>
				<p>
					These are our excellent member .you can contact anyone anytime <br> and all are experts and well experience
				</p>
			</div>


			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="team-memebers" class="owl-carousel owl-theme">
							
							<?php
								$data2 = image();

								while($row3 = mysqli_fetch_assoc($data2)){
									mem($row3['d_image'],$row3['d_name'],$row3['d_position'],$row3['fb'],$row3['twit'],$row3['google']);
								}
							?>

							<?php 
								function mem($d_image,$d_name,$position,$fb,$twit,$google){
									$member = "
									<div class=\"team-member text-center\">
									<img src=\"soes/sign/$d_image\" class=\"img-responsive\">
									<div class=\"team-member-info text-center\">
										<h4 class=\"team-member-name\">$d_name</h4>
										<h4 class=\"team-member-designation\">$position</h4>
										<ul class=\"social-list\">
											<li><a href=\"$fb\" class=\"social-icon icon-gray\"><i class=\"fa fa-facebook\"></i></a></li>
											<li><a href=\"$twit\" class=\"social-icon icon-gray\"><i class=\"fa fa-twitter\"></i></a></li>
											<li><a href=\"$google\" class=\"social-icon icon-gray\"><i class=\"fa fa-google-plus\"></i></a></li>
										</ul>
									</div>
								</div>";
								echo $member;
								}
							?>


							


							<div class="team-member text-center">
								<img src="img/fm.png" class="img-responsive">
								<div class="team-member-info text-center">
									<h4 class="team-member-name">MF FOYs@L</h4>
									<h4 class="team-member-designation">Sr. Developer</h4>
									<ul class="social-list">
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>


							<div class="team-member text-center">
								<img src="img/fm1.jpg" class="img-responsive">
								<div class="team-member-info text-center">
									<h4 class="team-member-name">Abu Mostakim Tahsin</h4>
									<h4 class="team-member-designation">Jr. Developer</h4>
									<ul class="social-list">
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>


							<div class="team-member text-center">
								<img src="img/fm2.jpg" class="img-responsive">
								<div class="team-member-info text-center">
									<h4 class="team-member-name">Najifa</h4>
									<h4 class="team-member-designation">Sr. Developer</h4>
									<ul class="social-list">
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>


							<div class="team-member text-center">
								<img src="img/sunil2.jpg" class="img-responsive">
								<div class="team-member-info text-center">
									<h4 class="team-member-name">Farhad Foysal</h4>
									<h4 class="team-member-designation">ceo</h4>
									<ul class="social-list">
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-facebook"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-twitter"></i></a></li>
										<li><a href="" class="social-icon icon-gray"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>







						</div>
					</div>
				</div>
			</div>



			<!---Our Team Section Ends------->
<!-- =============================================================================================================================== -->




<!-- =============================================================================================================================== -->
			<!---FAQs Section Start------->

			<br><br><br>
			<section class="faq" id="myfaq">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center text-primary">
							<h2><b>GENERAL FAQs</b></h2>
							<div class="sub-heading">
								<p>
									you can ask the regarding the issues.we will <br>solve that together for sure
								</p>
								
							</div>
						</div>	

					</div>
				</div> <br><br><br>
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<div class="panel-group" id="accordian">


								<?php 

								//   $con=mysqli_connect('localhost','root');
								// 	   if (!$con) {
								// 	   	die('connection failed'.mysqli_connect_error());
								// 	   }

								// 	mysqli_select_db($con,'mff');
								include('../db.php');

									$sql="select * from faq";
									$result=mysqli_query($con,$sql);
									while ($row=mysqli_fetch_array($result))
									{
					?>

								<div class="panel panel-default">
									<div class="panel-heading" id="headingOne">
										<h4 class="panel-title">
											<a href="#<?php echo $row['id']; ?>" data-toggle="collapse" class="collapse" data-parent="#accordian"><?php echo $row['faq_title']; ?></a>
										</h4>
									</div>
									<div id="<?php echo $row['id']; ?>" class="panel-collapse collapse " aria-labelledby="headingOne">
										<div class="panel-body">
											<p>
												<?php echo $row['faq_description']; ?>
											</p>
										</div>
									</div>
								</div>

							<?php } ?>



								<div class="panel panel-default">
									<div class="panel-heading" id="headingTwo">
										<h4 class="panel-title">
											<a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-parent="#accordian">How does it works ?</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" aria-labelledby="headingTwo">
										<div class="panel-body">
											<p>
												EdULearn`FMNF is an online E-learning website <br>
												here you can learn programming languages,Tech News and improve your coding skill	
											</p>
										</div>
									</div>
								</div>




								
							</div>
						</div>

						<div class="freeimage" id="meimg">
							<div class="col-md-2 col-md-offset">
								<img src="img/faq1.png">
							</div>
						</div>

					</div>
				</div>
				

			</section>


			<!---FAQs Section Ends------->


			<!---Contact us Section Start------->


<!------ Include the above in your HEAD tag ---------->

<div class="row text-center" style="margin:30px">
	<h2><b>CONTACT US</b></h2><br><br>
	<center>
	<div class="card" style="width: 30rem;">
  <div class="card-body border-info">
   
   <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">message</label>
    <input type="password" class="form-control"  placeholder="enter your message">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div></center>
</div>

    



			<!---Contact us Section Ends------->




 			<!---footer Section Start	----->



 			<!---footer Section Ends	----->



  			<!---This is script section------->

<script type="text/javascript">
	
	var preloader=document.getElementById('loading');
	function myfunction()
	 {
		preloader.style.display='none';
	}


	function addButton() {
		var body=document.getElementsByTagName('body')[0];
		var myfaq1=document.getElementById('myfaq');
		var btn=document.createElement('button');
		btn.innerHTML='sunil';
		myfaq1.appendChild(btn);
		body.appendChild(myfaq);
	}



</script>

<script src="js/jquery.ripples-min.js" type="text/javascript"></script>
<script src="js/typed.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>






<!--   <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script> -->

</body>
</html>