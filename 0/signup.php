<?php 
    include('db.php');

    $qry = "SELECT user FROM users order by user desc";
    $rslt = mysqli_query($con,$qry);
    $row = mysqli_fetch_array($rslt);

    $lastnumber = $row['user'];

    if(empty($lastnumber)){
        $number = "User-F-0000001";
    }else{
        $idd = str_replace("User-F-","",$lastnumber);
        $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
        $number = 'User-F-' .$id;
    }

// $con = new mysqli("localhost","root","","farhad");
// mysqli_set_charset($con,'latin');
// $select = "SELECT * FROM upazilas WHERE id='1' ";
// $result = mysqli_query($con,$select);
// $row = mysqli_fetch_array($result);
// $count = mysqli_num_rows($result);


// if($count == 1){
//     echo $row['bn_name'];
// }

// mysqli_query("SET NAMES utf8mb4")
// mysqli_connect("localhost","root","");
// mysqli_select_db('bn');
// mysqli_query('SET CHARACTER SET utf8mb4');
// mysqli_query("SET SESSION collation_connection ='utf8mb4_general_ci'")

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Sign Up Form</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">
    <style>
        body{
            margin: 0px;
            padding:0px;
            /* background-image: url(image/bg.jpg); */
            background-size: 500px;
            background-position: right bottom 200px;
            background-repeat: no-repeat;
            height: 100vh;
        }
        *{
            margin: 0px;
            padding: 0px;
            font-family: system-ui;
        }

        .container{
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .clearfix{
            clear: both;
        }
        .logo{
            width: 30%;
            float: left;
        }
        .logo h1{
            color: white;
            padding-top: 10px;

        }
        .menu{
            width: 70%;
            float: left;
        }
        .menu ul{
            float: right;
        }
        .menu ul li{
            list-style: none;
            float: left;
            padding: 20px;
        }
        .menu ul li a{
            text-decoration: none;
            color: white;
        }
        header{
            background-color: #0254b7;
            
        }
        .form-1, .form-2, .form-3, .form-4, .form-5 h3{
            color: #0254b7;
        }
        .form-5 h5{
            color: cyan;

        }
        .form-1, .form-2, .form-3, .form-4, .form-5{
            padding-top: 25px;
        }
        .input-1{
            padding: 10px;
            margin-top: 15px;
            width: 60%;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            margin-right: 30px;
        }
        .input-1:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-2{
            padding: 10px;
            margin-top: 15px;
            width: 60%;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            margin-right: 30px;
        }
        .input-2:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-3{
            padding: 10px;
            margin-top: 15px;
            width: 60%;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            margin-right: 30px;
        }
        .input-3:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-4{
            padding: 10px;
            margin-top: 15px;
            width: 60%;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            margin-right: 30px;
        }
        .input-4:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-5{
            padding: 10px;
            margin-top: 15px;
            width: 60%;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            margin-right: 30px;
        }
        .input-5:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-6{
            padding: 10px;
            margin-top: 15px;
            width: 60%;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            margin-right: 30px;
        }
        .input-6:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-7, .input-8, .input-9, .input-10, .input-11, .input-12{
            padding: 10px;
            margin-top: 15px;
            width: 60%;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            margin-right: 30px;
        }
        .input-7:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-8:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-9:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-10:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-11:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }
        .input-12:focus{
            border-bottom: 2px solid #0254b7;
            color: blue;
        }

        .error{
            border-bottom: 3px solid red;
        }
        .conti-1, .conti-2, .conti-3, .conti-4 .save{
            padding: 10px 30px;
            margin-top: 25px;
            font-size: 16px;
            background: #0254b7;
            color: white;
            /* border: none; */
                            
            opacity: 0.3;
            cursor: not-allowed;
        }
        
        .pregress_bar{
            position: absolute;
            bottom: 0px;
            /* left: 7% */

        }
        .bot-icon-1, .bot-icon-2, .bot-icon-3, .bot-icon-4, .bot-icon-5{
            font-size: 35px!important;
            color: #c7c7c7;

        }
        .step-1, .step-2, .step-3, .step-4{
            position: relative;
            float: left;
            width: 255px;

        }
        .line-1, .line-2, .line-3, .line-4, .line-5{
            height: 5px;
            width: 230px;
            /* position: absolute; */
            background: #c7c7c7;
            /* top: 50%;
            margin-right: 5px;
            left: 40px; */
        }
        .form-2, .form-3, .form-4, .form-5{
            display: none;
        }
        .check{
            /* zoom: 1.8; */
            position: absolute;
        }
        label{
            margin-left: 10px;
            margin-right: 45px;
            margin-bottom: -15px;
            padding-left:20px;
        }


    </style>
</head>
<body>
    
    <header>
        <div class="container">

            <div class="logo">
                <h1>EdUlearn</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="#">About</a></li> -->
                    <!-- <li><a href="#">Service</a></li> -->
                    <!-- <li><a href="#">Blog</a></li> -->
                    <!-- <li><a href="#">Contact</a></li> -->
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>  



<div class="row">
<div class="col-md-6">    
    



<form action="sign.php" id="form-data" method="POST">
<div class="form-1">
    <div class="container">
    
        <!-- <div class="row"> -->
        <!-- <div class="col-md-4">     -->
        <input type="text" readonly class="form-control w-25" value="<?php echo $number; ?>" name="user" >
            <h3><i class="bi bi-person-circle">&nbsp; What's Your Name?</i></h3>
            
            <div class="form-floating">
            <input type="text" class="input-1 form-control form-floating" placeholder="Please Type Your Name.." name="name">
            <label class="" for="">Name</label>
            </div>
            <br>
            <h3><i class="bi bi-telephone-plus">&nbsp; Type Your Number</i></h3>
            <div class="form-floating">
            <input type="tel" class="input-2 form-control form-floating" disabled="true" placeholder="Please Type Your Phone Num.." name="phone">
            <label class="" for="">Phone</label>
            </div>
            <div class="clearfix"></div>
            <div class="">
                <br>
            <button type="button" class="btn btn-outline-warning conti-1" disabled="true">Continue &nbsp;<i class="bi bi-plus"></i></button>
        </div>
        <!-- </div>     -->
        <!-- </div> -->
    </div>
</div>
<div class="form-2">
    <div class="container">
        <!-- <div class="row"> -->
        <!-- <div class="col-md-4"> -->
            <h3><i class="bi bi-building">&nbsp; Select Your Division</i></h3>
            <div class="form-floating">
            <select id="division" name="division" class="input-3 form-control">
                <option value="">Select Your Division</option>
                <?php
                    $queryd = mysqli_query($con,"SELECT * FROM divisions");
                    while($rowd=mysqli_fetch_array($queryd)){
                        ?>
                            <option value="<?php echo $rowd['id'] ?>"><?php echo $rowd['bn_name'] ?></option>
                        <?php
                    }
                ?>
                <!-- <option value="Chattagram">Chattagram</option>
                <option value="Rajshahi">Rajshahi</option> -->
            </select>
            <label class="" for="">District</label>
            </div>
            <br>    
            <h3><i class="bi bi-house-fill">&nbsp; Select Your City</i></h3>
            <div class="form-floating">
            <select id="district" name="district" disabled="true" class="input-4 form-control">
                <!-- <option value="">Select Your District</option>
                <option value="Coxsbazar">Cox'sBazar</option>
                <option value="">Chattagram</option>
                <option value="">Dhaka</option> -->
            </select>
            <label class="" for="">District</label>
            </div>
            <br>
            <h3><i  class="bi bi-house">&nbsp; Select Your Upazila</i></h3>
            <div class="form-floating">
            <select id="upazila" name="upazila" class="input-5 form-control" disabled="true">
                <!-- <option value="">Select Your Upazila</option>
                <option value="Coxsbazar">Cox'sBazar</option>
                <option value="">Chattagram</option>
                <option value="">Dhaka</option> -->
            </select>
            <label class="" for="">Upazila</label>
            </div>
            <div class="clearfix"></div>
            <div class="">
                <br>
            <button type="button" class="btn btn-outline-warning conti-2" disabled="true">Next &nbsp;<i class="bi bi-plus"></i></button>
            </div>
        <!-- </div>     -->
        <!-- </div> -->
    </div>
</div>

<div class="form-3">
    <div class="container">
        <!-- <div class="row"> -->
        <!-- <div class="col-md-4">     -->
            <h3><i class="bi bi-house-door-fill">&nbsp; Select Your Union</i></h3>
            <div class="form-floating">
            <select id="union" name="union" class="input-6 form-control">
                <!-- <option value="">Select Your Union</option>
                <option value="islampur">Islampur</option>
                <option value="">Chattagram</option>
                <option value="">Dhaka</option> -->
            </select>
            <label class="" for="">Union</label>
            </div>
            <br>
            <h3><i class="bi bi-house-door">&nbsp; Select Your Word NO</i></h3>
            <div class="form-floating">
            <select name="word" class="input-7 form-control" disabled="true" id="">
                <option value="">Select Word</option>
                <option value="w-1">Word-1</option>
                <option value="w-2">Word-2</option>
                <option value="w-3">Word-3</option>
                <option value="w-4">Word-4</option>
                <option value="w-5">Word-5</option>
                <option value="w-6">Word-6</option>
                <option value="w-7">Word-7</option>
                <option value="w-8">Word-8</option>
                <option value="w-9">Word-9</option>

            </select>
            <label class="" for="">Word</label>
            </div>
            <br>
            <h3><i class="bi bi-house">&nbsp;Your Village | House NO</i></h3>
            <div class="form-floating">
            <input type="text" class="input-8 form-control form-floating" disabled="true" placeholder="Please Type Your Name.." name="village">
            <label class="" for="">Village|House</label>
            </div>
            <div class="clearfix"></div>
            <div class="">
                <br>
            <button type="button" class="btn btn-outline-warning conti-3" disabled="true">Next &nbsp;<i class="bi bi-plus"></i></button>

            </div>
        <!-- </div>     -->
        <!-- </div> -->
    </div>
</div>
<div class="form-4">
    <div class="container">
        <!-- <div class="row"> -->
        <!-- <div class="col-md-4">     -->
            <h3><i class="bi bi-list-check">&nbsp; Select Account Type</i></h3>
            <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input check input-9 check" id="check-1" value="student" name="actype">
            <label class="" for="check-1">Student | User</label>
            </div>
            
            <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input check input-9 check" id="check-2" value="mentor" name="actype">
            <label class="" for="check-2">Mentor | Teacher</label>
            </div>
            <br>
            <h3><i class="bi bi-eye-slash">&nbsp; Type a New Password</i></h3>
            <div class="form-floating">
            <input type="password" class="input-11 form-control form-floating" disabled="true" placeholder="Please Type Your Phone Num.." name="pass">
            <label class="" for="">Password</label>
            </div>
            <br>
            <h3><i class="bi bi-envelope-fill">&nbsp; Type Your Email</i></h3>
            <div class="form-floating">
            <input type="email" class="input-12 form-control form-floating" disabled="true" placeholder="Please Type Your Phone Num.." name="email">
            <label class="" for="">Email</label>
            </div>
            <div class="clearfix"></div>
            <div class="">
                <br>
            <button type="button" class="btn btn-outline-warning conti-4" disabled="true">Sumbit Part &nbsp;<i class="bi bi-"></i></button>
            </div>
        <!-- </div>     -->
        <!-- </div> -->
    </div>
</div>
<div class="form-5">
    <div class="container">
        <!-- <div class="row"> -->
        <!-- <div class="col-md-4">     -->
        <div class="result text-center bg-warning"><h5 class="text-center" id="result"></h5></div>
            <h5><i class="bi bi-person">&nbsp; Thanks.. আপনি প্রয়োজনীয় তথ্য যোগ করেছেন... <br> অনলাইন প্রক্রিয়া সম্পন্ন করতে <code>Submit</code> বাটনে ক্লিক করুন।। Please Press the Submit Button For  Your Online Application | Profile... </i></h5>
            
            <button type="submit" id="sbumit" name="save" class="btn btn-outline-danger save"> SUBMiT &nbsp;<i class="bi bi-plus"></i></button>
            <!-- <input type="submit" class="btn btn-danger" name="submit" value="SUBMiT" id=""> -->
            <!-- </div> -->
        <!-- </div>     -->
        </div>
    <!-- </div> -->
</div>



</form>

<div class="container">
<div class="progress_bar">
    <div class="container">
        <div class="step-1">
        <i class="bi bi-bag-fill bot-icon-1"></i>
        <div class="line-1"></div>
        </div>
        <div class="step-2">
        <i class="bi bi-bag-fill bot-icon-2"></i>
        <div class="line-2"></div>
        </div>
        <div class="step-3">
        <i class="bi bi-bag-fill bot-icon-3"></i>
        <div class="line-3"></div>
        </div>
        <div class="step-4">
        <i class="bi bi-bag-fill bot-icon-4"></i>
        <div class="line-4"></div>
        </div>
        <div class="step-5">
        <i class="bi bi-bag-fill bot-icon-5"></i>
        <div class="line-5"></div>
        </div>
    </div>
</div>

<div class="col-md-6">

</div>
</div>
</div>
</div>

<script src="jsnav/bootstrap.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('.input-1').keyup(function(){
            if($(this).val()==''){
                $(this).addClass("error");
                $('.conti-1').css('background-color','white');
            }else{
                $(this).removeClass("error");
                $('.conti-1').css('opacity','1');
                $('.conti-1').css('cursor','pointer');
                $('.conti-1').css('background-color','red');
                // $('.conti-1').css('opacity','1');
                // $('.conti-1').css('opacity','1');
            }
        });
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.input-1').keyup(function(){
            if($(this).val()==''){
                $(this).addClass("error");
                $('.conti-1').prop('disabled', true);
                $('.input-2').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-1').css('opacity','1');
                $('.conti-1').css('cursor','pointer');
                $('.input-2').prop('disabled',false);
                // $('.conti-1').prop('disabled', false);
            }
        });
        $('.input-2').keyup(function(){
            if($(this).val()==''){
                $(this).addClass("error");
                $('.conti-1').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-1').css('opacity','1');
                $('.conti-1').css('cursor','pointer');
                $('.conti-1').prop('disabled', false);
            }
        });
// step 2 start 
        $('.input-3').click(function(){
            if($(this).prop("selected")==''){
                $(this).addClass("error");
                $('.conti-2').prop('disabled', true);
                $('.input-4').prop('disabled', true);
                $('.input-5').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-2').css('opacity','1');
                $('.conti-2').css('cursor','pointer');
                // $('.conti-2').prop('disabled', false);
                $('.input-4').prop('disabled', false);
              // $('.input-5').prop('disabled', false);
            }
        });
        $('.input-4').click(function(){
            if($(this).prop("selected")==''){
                $(this).addClass("error");  
                $('.input-5').prop('disabled', true);
            }else{
                    $('.input-5').prop('disabled', false);
                    $(this).removeClass("error");
                }
        });
        $('.input-5').click(function(){
            if($(this).prop("selected")==''){
                $(this).addClass("error");
                $('.conti-2').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-2').css('opacity','1');
                $('.conti-2').css('cursor','pointer');
                $('.conti-2').prop('disabled', false);
            }
        });
        // step 3 start
        $('.input-6').click(function(){
            if($(this).prop("selected")==''){
                $(this).addClass("error");
                $('.conti-3').prop('disabled', true);
                $('.input-7').prop('disabled', true);
                $('.input-8').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-3').css('opacity','1');
                $('.conti-3').css('cursor','pointer');
                // $('.conti-3').prop('disabled', false);
                $('.input-7').prop('disabled', false);
              // $('.input-8').prop('disabled', false);
            }
        });
        $('.input-7').click(function(){
            if($(this).prop("selected")==''){
                $(this).addClass("error");
                // $('.conti-3').prop('disabled', true);
                // $('.input-7').prop('disabled', true);
                $('.input-8').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-3').css('opacity','1');
                $('.conti-3').css('cursor','pointer');
                // $('.conti-3').prop('disabled', false);
                $('.input-8').prop('disabled', false);
              // $('.input-8').prop('disabled', false);
            }
        });
        
        $('.input-8').keyup(function(){
            if($(this).val()==''){
                $(this).addClass("error");
                $('.conti-3').prop('disabled', true);
                // $('.input-8').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-3').css('opacity','1');
                $('.conti-3').css('cursor','pointer');
                // $('.input-8').prop('disabled',false);
                $('.conti-3').prop('disabled', false);
            }
        });
        // step 4 start

        $('.input-9').click(function(){
            if($(this).prop("checked")==true){
                $(this).removeClass("error");
                $('.conti-4').css('opacity','1');
                $('.conti-4').css('cursor','pointer');
                $('.input-11').prop('disabled', false);
                // $('.input-12').prop('disabled', true);
            }else{
                $(this).addClass("error");
                $('.conti-4').prop('disabled', true);
                $('.input-11').prop('disabled', true);
                // $('.input-12').prop('disabled', true);
            }
        });
        $('.input-11').keyup(function(){
            if($(this).val()==''){
                $(this).addClass("error");
                $('.conti-4').prop('disabled', true);
                $('.input-12').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-4').css('opacity','1');
                $('.conti-4').css('cursor','pointer');
                $('.input-12').prop('disabled',false);
                // $('.conti-4').prop('disabled', false);
            }
        });
        $('.input-12').keyup(function(){
            if($(this).val()==''){
                $(this).addClass("error");
                $('.conti-4').prop('disabled', true);
                // $('.input-12').prop('disabled', true);
            }else{
                $(this).removeClass("error");
                $('.conti-4').css('opacity','1');
                $('.conti-4').css('cursor','pointer');
                // $('.input-12').prop('disabled',false);
                $('.conti-4').prop('disabled', false);
            }
        });




    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('.conti-1').click(function(){
            $('.form-1').css('display','none');
            $('.form-2').css('display','block');
            $('.bot-icon-1').css('color','#0254b7');
            $('.bot-icon-1').css('color','#0254b7');
            $('.line-1').css('background','#0254b7');

            
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.conti-2').click(function(){
            $('.form-2').css('display','none');
            $('.form-3').css('display','block');
            $('.bot-icon-2').css('color','#0254b7');
            $('.bot-icon-2').css('color','#0254b7');
            $('.line-2').css('background','#0254b7');

            
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.conti-3').click(function(){
            $('.form-3').css('display','none');
            $('.form-4').css('display','block');
            $('.bot-icon-3').css('color','#0254b7');
            $('.bot-icon-3').css('color','#0254b7');
            $('.line-3').css('background','#0254b7');

            
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.conti-4').click(function(){
            $('.form-4').css('display','none');
            $('.form-5').css('display','block');
            $('.bot-icon-4').css('color','#0254b7');
            $('.bot-icon-5').css('color','#0254b7');
            $('.line-4').css('background','#0254b7');
            $('.line-5').css('background','#0254b7');
            $('.submit').prop('disabled', false);
            
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#save").click(function(){
            $.ajax({
                method:"POST",
                url:"sign.php",
                data: $("#form-data").serialize(),
                success:function(response){
                    $("#result").show();
                    $("#result").html(response);

                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#division").change(function(){
            var divisionId=$(this).val();
            $.ajax({
                method:"POST",
                url:"action.php",
                data:{idd:divisionId},
                // dataType:"html",
                success:function(data){
                    $("#district").html(data);
                }
            });
        });
        $("#district").change(function(){
            var districtId=$(this).val();
            $.ajax({
                method:"POST",
                url:"action.php",
                data:{iddi:districtId},
                // dataType:"html",
                success:function(data){
                    $("#upazila").html(data);
                }
            });
        });
        $(".input-5").change(function(){
            var upazila=$(this).val();
            $.ajax({
                method:"POST",
                url:"action.php",
                data:{thana:upazila},
                // dataType:"html",
                success:function(data){
                    $(".input-6").html(data);
                }
            });
        });
    });
</script>
<script src="jsnav/bootstrap.bundle.js"></script>
<script src="jquery-3.5.1.min.js"></script>
</body>
</html>