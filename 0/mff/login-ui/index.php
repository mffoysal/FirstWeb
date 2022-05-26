<!DOCTYPE html>
<html lang="en">
<head>
	<title>English|IcT|Bangla|GK EdU Quiz|Exam✔✘</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="login-ui/image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="login-ui/css/util.css">
	<link rel="stylesheet" type="text/css" href="login-ui/css/main.css">
	<style>
	 body{
			background: linear-gradient(to right, hsl(800, 100%, 50%), hsl(155, 100%, 50%));
	 }
	</style>
</head>
<body style="background: linear-gradient(to right, hsl(800, 100%, 50%), hsl(155, 100%, 50%));">

<?php
$value='';
if(isset($_REQUEST['value'])){
	$value=$_REQUEST['value'];
}

?>	
	<div style="background: linear-gradient(to right, hsl(800, 100%, 50%), hsl(155, 100%, 50%));" class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(login-ui/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						 ফোন ✆ নম্বর দিয়ে দাখিল করুন...
					</span>
				</div><div class="bg-success text-light">
<marquee><h6 class=" text-dange"><b>আসসালামুআলাইকুম, আপনি যদি টিউটর হয়ে থাকেন তাহলে আপনিও ছোট ভাই-বোন দের কাছ থেকে এই প্রজেক্ট এ অনলাইন পরীক্ষা নিতে পারেন। ✉(Only Msg or WhatsApp)০১৫৮৫৮৫৫০৭৫[ফরহাদ ফয়সাল ~ওয়েব ডেভেলপার এবং গ্রাফিক ডিজাইনার] </b></h6></marquee></div>
				<form method="post" action="query/loginExe.php" id="examineeLoginFr" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Phone is required">
						<span class="label-input100">ফোনঃ✆</span>
						<input class="input100" type="tel" name="username" placeholder="সঠিক ✆ নম্বর দিন। ঠিক এই নম্বর দিয়ে বিস্তারিত ফলাফল দেখতে পারবেন">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Name is required">
						<span class="label-input100">নাম লিখুন</span>
						<input class="input100" type="text" name="pass" placeholder="আপনার যা মন চায় লিখুন Or Nickname">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Name is required">
						<span class="label-input100">কোর্স আইডি</span>
						<input class="input100" type="tel" name="course" value="<?=$value?>" placeholder="কোর্স আইডি দিন অথবা সংগ্রহ করুন।">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn" align="right">
						<button type="submit" name="login" class="login100-form-btn">
							দাখিল
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="login-ui/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login-ui/vendor/animsition/js/animsition.min.js"></script>
	<script src="login-ui/vendor/bootstrap/js/popper.js"></script>
	<script src="login-ui/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login-ui/vendor/select2/select2.min.js"></script>
	<script src="login-ui/vendor/daterangepicker/moment.min.js"></script>
	<script src="login-ui/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="login-ui/vendor/countdowntime/countdowntime.js"></script>
	<script src="login-ui/js/main.js"></script>

</body>
</html>