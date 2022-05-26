<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="bootstrap.min.css">

    <style>
        .msg-2{
            display: none;
        }
        .msg-3{
            display: none;
        }
    </style>
</head>
<body onload="startTime()">
    
<div class="container">

<div class="modal fade" id="contactmsg" aria-labelledby="detailsaria">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                
                            <div class="modal-header">
                                   
                                    <ul class="nav nav-tabs nav-fill text-center">
                                        <li style="margin-right:px; margin-left:px" class="nav-item active"><span class="btn btn-info bi bi-messenger"></span><button type="button" id="btn-1" class="btn btn-outline-info"> Messenger</button></li>
                                        <li style="margin-right:px; margin-left:px;" class="nav-item active"><span class="btn btn-warning bi bi-messenger"></span><button type="button" id="btn-2" class="btn btn-outline-primary"> New A/C</button></li>
                                        <li style="margin-right:px; margin-left:px;" class="nav-item active"><span class="btn btn-primary bi bi-messenger"></span><button type="button" id="btn-3" class="btn btn-outline-info"> Group </button></li>
                                        <!-- <li class="nav-item"><a class="nav-link"  href="index.php?cat=LUNCH"><span class="bi bi-bookmarks-fill"> LUNCH</a></li> -->
                                        <!-- <li class="nav-item"><a class="nav-link"  href="index.php?cat=AFFTERNOON"><span class="bi bi-bookmarks-fill"> AFFTERNOON~TEA</a></li> -->
                                        <!-- <li class="nav-item"><a class="nav-link"  href="index.php?cat=DINNER"><span class="bi bi-bookmarks-fill"> DINNER</a></li> -->
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">

                                <div style="text-align: justify" class="jumbotron shadow-lg text-justify p-3">

                                        <!-- body -->

                                                                                            
                                                    <div class="row text-center msg-1">
                                                        <h3>Online Messenger</h3>
                                                                                                
                                                                                                                
                                                           <!-- <code><div class="error-text"></div></code>                                                        -->
                                                            <section class="form login w-75 m-auto text-center">
                                                            <header>Realtime Chat With Your Friends Like Messenger</header>
                                                            <form action="#" method="POST" class="login-form" enctype="multipart/form-data" autocomplete="off">
                                                                <code><div class="error-text errorone bg-warning"></div></code>
                                                                <div class="field input form-floating">
                                                                
                                                                <input type="text" name="phone" class="form-control form-floating" placeholder="Enter your email" required>
                                                                <label>Phone number</label>
                                                                </div>
                                                                <div class="field input form-floating">
                                                                
                                                                <input type="password" name="password" class="form-control form-floating password" placeholder="Enter your password" required>
                                                                <label>Password</label>
                                                                <i class="bi bi-eye eye1"></i>
                                                                </div>
                                                                <div class="field button">
                                                                <input type="submit" class="btn btn-outline-warning form-control submitone" name="submit" value="Continue to Chat">
                                                                </div>
                                                            </form>
                                                            <div class="link">Not yet signed up? <a href="farhad/index.php">Signup now</a></div>
                                                            </section>
                                                            <script src="javascript/pass-show-hide.js"></script>  
                                               
                                                    </div>    
                                                                                                   
                                                        <!-- <form action="messenger.php">
                                                            <div class="text-center d-inline form-floating">
                                                            <div class="form-floating">
                                                                <input class="form-control w-50 form-floating" type="text" value="" name="msg-data">
                                                                <label for=""><span class="bi bi-person"></span> নাম লিখুন অথবা নম্বর দিন</label>
                                                            </div>
                                                            <span>অ্যান্ড</span>
                                                            <div class="form-floating">
                                                                <input class="form-control w-50 form-floating" type="tel" value="" name="msg-data">
                                                                <label for=""><span class="bi bi-phone"></span> পাসওয়ার্ড দিন</label>
                                                            </div>
                                                            </div>
                                                            <div class="">
                                                            <button type="sbumit" class="btn btn-outline-warning w-25 d-inline" name="msg-send" >দাখিল</button>
                                                            </div>
                                                        </form> -->
                                                    
                                                    
                                                    <div class="row text-center msg-2">
                                                        <h6>Online Messenter New Account Registration Page</h6>
                                                        <div class="text-center m-auto w-75">
                                                        <code><div id="errortwo" class="error-text text-center bg-warning"></div></code>
                                                        <section class="form signup">
                                                        
                                                        <form action="farhad/registration.php" method="POST" class="signup-form" enctype="multipart/form-data" autocomplete="off">
                                                            <code><div id="errorone" class="error-text errortwo bg-warning"></div></code>
                                                            
                                                            <code><div id="errorthree" class="error-text  bg-warning"></div></code>
                                                            <div class="name-details">
                                                            <!-- <div class="field input">
                                                                <label>First Name</label>
                                                                <input type="text" name="fname" placeholder="First name" required>
                                                            </div> -->
                                                            <div class="field input form-floating">
                                                                
                                                                <input type="text" class="form-control form-floating" name="name" placeholder="Your name">
                                                                <label>Name</label>
                                                            </div>
                                                            </div>
                                                            <div class="field input form-floating">
                                                            
                                                            <input type="text" name="phone" id="phone2" class="form-control form-floating" onInput="checkphone()" placeholder="Enter your number">
                                                            <label>Phone</label>
                                                            </div>
                                                            <div class="field input form-floating">
                                                            
                                                            <input type="password" name="password" class="form-control form-floating pass" placeholder="Enter new password">
                                                            <label>Password</label>
                                                            <i class="bi bi-eye eye-slash"></i>
                                                            </div>
                                                            <div class="field image form-control">
                                                            <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="img"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                                            <input style="display:none" type="file" onchange="getImage(this.value)" name="image" class="form-control" id="img" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                                                            <div style="color:red" class="btn btn-outline-info" id="display-image"></div>
                                                            </div>
                                                            <br>
                                                            <div class="field button">
                                                            <input type="submit" class="btn btn-info submittwo" name="submit" value="Continue to Chat">
                                                            </div>
                                                        </form>
                                                        <div class="link">Already signed up? <a href="login.php">Login now</a></div>
                                                        </section>

                                                        <script>
                                                                function getImage(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#display-image').html(newimg);
                                                                }
                                                        </script>
                                                        </div>    
                                                        <!-- <form action="messenger.php">
                                                            <div class="text-center d-inline form-floating">
                                                            <div class="form-floating">
                                                                <input class="form-control w-50 form-floating" type="text" value="" name="msg-data">
                                                                <label for=""><span class="bi bi-person"></span> নাম লিখুন অথবা</label>
                                                            </div>
                                                            <span>Or</span>
                                                            <div class="form-floating">
                                                                <input class="form-control w-50 form-floating" type="tel" value="" name="msg-data">
                                                                <label for=""><span class="bi bi-phone"></span> নম্বর দিন</label>
                                                            </div>
                                                            </div>
                                                            <div class="">
                                                            <button type="sbumit" class="btn btn-outline-warning w-25 d-inline" name="msg-send" >দাখিল</button>
                                                            </div>
                                                        </form> -->
                                                        <script src="javascript/pass-signup.js"></script>
                                                    </div>
                                                    

                                                    


                                                    <div style="margin: 0 auto" class="row text-center w-75 msg-3">
                                                        <h3>Group Text</h3>
                                                        <form action="index1.php" method="post">
                                                            <div class="text-center m-auto">
                                                            <div style="margin: 0 auto" class="form-floating"> 
                                                                <input class="form-control form-floating" type="text" value="" name="name" required>
                                                                <label for=""><span class="bi bi-person-circle"></span> নাম লিখুন অথবা <span class="bi bi-telephone-fill"></span> নম্বর দিন</label>
                                                            </div>
                                                            <!-- <span>অথবা...</span>
                                                            <div class="form-floating">
                                                                <input class="form-control w-50 form-floating" type="tel" value="" id="name" name="phone">
                                                                <label for=""><span class="bi bi-phone"></span> নম্বর দিন</label>
                                                            </div> -->
                                                            </div>
                                                            </br>
                                                            <div class="">
                                                            <button type="sbumit" class="btn btn-outline-warning form-control w-25 d-inline" id="enter" name="enter" >দাখিল</button>
                                                            </div>
                                                        </form>
                                                    </div>



                                        <!-- body -->

                                </div>

                            </div>
                                    <div class="modal-footer">
                                    <div id="clockdate">
					<div class="clockdate-wrapper">
						<div id="clock"></div>
						<div id="date"><?php echo date('l, F j, Y'); ?></div>
					</div>
				</div>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">&times; Close</button>
                                        <button class="btn btn-primary">More</button>
                                    </div>
            </div>
        </div>
</div>

</div>

<script src="javascript/login.js"></script>  
<script src="javascript/signup.js"></script>
<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/pass-signup.js"></script>           




<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-1').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-2').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-3').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','block'); 
        });
    });
</script>
<script>
        function checkphone(){

            jQuery.ajax({
                url: "php/checksignup_phone.php",
                data: 'phone=' +$("#phone2").val(),
                type: "POST",
                success: function (data){
                    $("#errortwo").html(data);
                },
                error: function (){}
            });
        }
    </script>




<script src="navbarclock.js"></script>
</body>
</html>