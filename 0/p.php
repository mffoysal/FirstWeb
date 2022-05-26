
<?php

session_start();

if(isset($_SESSION['unique_id'])){
    $_SESSION['visitor_id']=$_SESSION['unique_id'];
}else{
    $_SESSION['visitor_id'] = '787579833';
}


include('db.php');
if(isset($_REQUEST['p_id'])){
    $_SESSION['p_id']=$_REQUEST['p_id'];
  $postId=$_SESSION['p_id'];

}else{
    $postId='';
}
if(isset($_REQUEST['com_id'])){
    $_SESSION['com_id']=$_REQUEST['com_id'];
    $commentId=$_SESSION['com_id'];
}else{
    $commentId='';
}
if(isset($_REQUEST['to'])){
    $_SESSION['to']=$_REQUEST['to'];
    $toId=$_SESSION['to'];
}else{
    $toId='';
}



$immm="SELECT * FROM post WHERE id=$postId";
    
$imgsss=mysqli_query($con,$immm);
$tit=mysqli_fetch_assoc($imgsss);
$iiim=$tit['img'];

if(mysqli_num_rows($imgsss)>0){
    $nn=$tit['unique_id'];
    $sn="SELECT * FROM users WHERE unique_id=$nn";
    
    $imgss=mysqli_query($con,$sn);
    $ti=mysqli_fetch_assoc($imgss);
    $nametitle=$ti['name'];
  	$iiim = $ti['img'];

}else{
    $nametitle="User";
    $nn='';
}

if($tit['img']==''){
	$iim=$iiim;
}else{
	$iim=$tit['img'];
}

if(isset($tit['header'])){

  if($tit['header']==''){
    $iimv=$ti['bio'];
  }else{
    $iimv=$tit['header'];
  }

}else{
  $iimv="";
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$iimv?>--<?=$nametitle?>-EdULearn</title>
  	<link rel="shortcut icon" href="image/<?=$iim?>" type="image/x-icon" />

        <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="../jquery-3.4.1.js"></script> -->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
 
    <!-- <script src="ck/ckeditor.js"></script> -->
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <script src="jquery-3.5.1.min.js"></script>
    <!-- swap -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- swap -->
    

<style>
.fotter-section nav{

  width: 25px;
  transition: all 0.3s linear;

}
.fotter-section nav div{
  height: 40px;
  position:relative;
}
.fotter-section nav div .a{

  display: block;
  height: 100%;
  width: 100%;
  line-height: 20px;

  transition: all .3s linear;
   
  
}
/* .fotter-section nav div:nth-child(1) .a{
  background: #3b5998;
} */
/* .fotter-section nav div:nth-child(2) .a{
  background: #00acee;
}
.fotter-section nav div:nth-child(3) .a{
  background: #cd486b;
}
.fotter-section nav div:nth-child(4) .a{
  background: #0077b5;
}
 
.fotter-section nav div:nth-child(5) .a{
  background: #ff0000;
} */
.fotter-section nav div .a i{
  position:absolute;
  margin-top: 6px;
  font-size: 25px;
   
}
.fotter-section  div .a span{
  display: none;
  font-weight: bold;
  font-size:40px;

  letter-spacing: 1px;
  text-transform: uppercase;
}
.fotter-section .a:hover {
  z-index:1;
  width: 500px;
}
.fotter-section  div:hover .a span{
  padding-left: 20%;
  display: block;
}


.tophead{
    font-family:'Poppins', sans-serif;
    margin:0;
    padding:0;
    outline: none;
    border: none;
    text-decoration:none;
    text-transform:capitalize;
    scroll-behavior:smooth;
    top: 3px;
    left:0;
    right:0;
    height: 70px;
    z-index: 1000;

}

.topheader .topnav{
    display:flex;
    background:cyan;

}
.topheader .topnav a{
    flex:1;
    text-align:center;
    font-size: 14px;
    line-height:50px;
    text-decoration:none;
    color:white;
    text-transform:capitalize;
    font-family:'Poppins', sans-serif;


} 
.topheader .topnav a span{
    padding-left:5px;


}
.topheader .topnav a:hover{
    filter:brightness(.7);
    color:black;

}
.topheader .topnav a:nth-child(1){
    background: #e74c3c;
}

.topheader .topnav a:nth-child(2){
    background: #27ae60;
}

.topheader .topnav a:nth-child(3){
    background: #2980b9;
}

.topheader .topnav a:nth-child(4){
    background: #8e44ad;
}

.topheader .topnav a:nth-child(5){
    background: #f39c12;
}

.topcontainer{
    /* display:flex; */

}


#postUser, #postOthers, #signUp, #logIn{
  display:none;
}

/* age calculator */

.containerAge
{

    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 50px 30px;
}
.containerAge *
{
    outline: none;
    border: none;   
}
.containerAge .inputs-wrapper
{
    background-color: #fff;
    padding: 30px 25px;
    box-shadow: 0 15px 25px rgba(0,0,0,0.3);
    border-radius: 8px;
    margin-bottom: 50px;
}
.inputs-wrapper input,
.inputs-wrapper button
{
    background: #0a6cf1;
    border-radius: 5px;
    color: #fff;
    font-weight: 500;
    height: 50px;
}
.inputs-wrapper input
{
    width: 60%;
    padding: 0 20px;
    font-size: 14px;
    color: #fff;
}
.inputs-wrapper button
{
    width: 30%;
    float: right;
    padding: 0 20px;
    cursor: pointer;
}
.output
{
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.output div
{
    width: 100px;
    height: 100px;
    color: #0a6cf1;
    background: #fff;
    box-shadow: 0 15px 25px rgba(0,0,0,0.3);
    display: grid;
    place-items: center;
    border-radius: 50%;
    padding: 20px 0;
}
.output div span
{
    font-size: 30px;
    font-weight: 500;
}
.output div p
{
    font-size: 14px;
    color: #707070;
    font-weight: 400;
}


@media(max-width:400px){
    .topname{
        display: none;
    }
}

/* video */

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
*

.material-icons
{
    user-select: none;
    -webkit-user-select: none;
    cursor: pointer;
}

#section
{
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 51px);
    width: 100%;
    padding: 1.7%;
}
.containerVideo
{
    position: relative;
    justify-content: center;
    align-items: center;
}

/* Video player Styling */
.containerVideo #video_player
{
    position: relative;
    width: 700px;
    height: 100%;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 5px rgba(255,255,255,0.24);
}
.containerVideo #video_player #main-video
{
    position: relative;
    width: 100%;
    height: 100%;
    outline: none;
}
#video_player .progressAreaTime
{
    position: absolute;
    left: var(--x);
    transform: translateX(-50%);
    bottom: 60px;
    min-width: 60px;
    text-align: center;
    white-space: nowrap;
    padding: 5px 10px;
    color: #fff;
    font-size: 14px;
    background: #002333;
    border-radius: 5px;
    z-index: 1;
    display: none;
}
#video_player .progressAreaTime::before
{
    content: '';
    position: absolute;
    bottom: -40%;
    left: 50%;
    transform: translate(-50%,-50%) rotate(45deg);
    background: #002333;
    width: 15px;
    height: 15px;
    z-index: -1;
}

.containerVideo #video_player .controls
{
    position: absolute;
    bottom: 0;
    left: 0;
    height: 50px;
    width: 100%;
    background: rgb(0 0 0 / 71%);
    box-shadow: 0 0 40px 10px rgb(0 0 0 / 25%);
    z-index: 3;
    transform: translateY(180%);
    transition: 0.3s;
}
.containerVideo #video_player .controls.active
{
    transform: translateY(0);
}
#video_player .controls .progress-area
{
    width: 100%;
    height: 5px;
    margin: auto;
    background: #f0f0f0;
    cursor: pointer;
}
.controls .progress-area .progress-bar
{
    position: relative;
    width: 0%;
    background: rgb(255,174,0);
    height: inherit;
    border-radius: inherit;
    cursor: pointer;
}
.controls .progress-area .progress-bar::before
{
    content: '';
    position: absolute;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    right: -5px;
    top: 50%;
    transform: translateY(-50%);
    background: rgb(255,174,0);
}
.controls .controls-list
{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: nowrap;
    width: 97%;
    height: 46px;
    margin: 0 auto;
}
.controls .controls-list .controls-left,
.controls .controls-list .controls-right
{
    display: flex;
    justify-content: center;
    align-items: center;
}
.controls .controls-left .timer
{
    display: inline-block;
    font-size: 14px;
    white-space: nowrap;
    color: #fff;
    margin-left: 5px;
    text-align: center;
}
.controls .icon
{
    display: inline-flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
    margin-left: 8px;
    margin-right: 5px;
}
.controls .icon .material-icons
{
    font-size: 26px;
    color: #fff;
    cursor: pointer;
}
.controls .icon .material-icons.fast-rewind:active
{
    transition: 0.2s;
    transform: rotate(-45deg);
}
.controls .icon .material-icons.fast-forward:active
{
    transition: 0.2s;
    transform: rotate(45deg);
}
.controls .icon .volume_range
{
    -webkit-appearance: none;
    appearance: none;
    width: 0px;
    height: 3px;
    background: #fff;
    color: #fff;
    cursor: pointer;
    outline: none;
    border: none;
    transition: 0.4s;

}
.controls .icon .volume_range::-webkit-slider-thumb
{
    -webkit-appearance: none;
    appearance: none;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: none;
    outline: none;
    background: #fff;
    color: #fff;
    opacity: 0;
    transition: 0.3s;
}
.controls .icon:hover .volume_range
{
    display: inline-block;
    width: 60px;
}
.controls .icon:hover .volume_range::-webkit-slider-thumb
{
    opacity: 1;
    pointer-events: auto;
    transition: 0.5s;
}
.controls-right .icon .auto-play
{
    width: 30px;
    height: 10px;
    border-radius: 20px;
    position: relative;
    margin-right: 8px !important;
    background: #b6b6b6;
}
.controls-right .icon .auto-play::before
{
    content: '\e034';
    position: absolute;
    left: -5px;
    top: 50%;
    transform: translateY(-50%);
    width: 17px;
    height: 17px;
    line-height: 17px;
    font-size: 14px;
    background: #727272;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border-radius: 50%;
    font-family: "Material Icons";
}
.controls-right .icon .auto-play.active::before
{
    content: '\e037';
    left: 15px;
    font-family: "Material Icons";
}
.controls-right .icon .material-icons.settingsBtn
{
    font-size: 24px;
    transition: 0.3s;
}
.controls-right .icon .settingsBtn.active
{
    transform: rotate(45deg);
}

#video_player #settings
{
    position: absolute;
    right: 25px;
    bottom: 62px;
    background: rgb(28 28 28 / 90%);
    width: 200px;
    height: 250px;
    color: #fff;
    overflow-y: scroll;
    z-index: 20;
    display: none;
}
#video_player #settings.active
{
    display: block;
}
#video_player #settings .playback span
{
    font-size: 14px;
    font-weight: 300;
    padding: 15px 30px;
    display: block;
    border-bottom: 1px solid rgb(83, 83, 83);
}
#video_player #settings .playback ul
{
    position: relative;
}
#video_player #settings .playback ul li
{
    position: relative;
    width: 100%;
    cursor: pointer;
    text-align: left;
    padding: 12px 33px;
    display: block;
    font-size: 14px;
}
#video_player #settings .playback ul li:hover
{
    background: rgba(28, 28, 28, 0.9);
}

#video_player #settings .playback ul li.active::before
{
    content: '\e876';
    font-family: "Material Icons";
    position: absolute;
    left: 7px;
    top: 50%;
    transform: translateY(-50%);
    padding-right: 10px;
    font-size: 18px;
}

#video_player #settings::-webkit-scrollbar
{
    width: 8px;
    background: transparent;
}
#video_player #settings::-webkit-scrollbar-thumb
{
    height: 20px;
    border: 2px solid transparent;
    background: rgba(83, 83, 83, 0.9);
    border-radius: 20px;
}

.footerf
{
    padding: 15px 23px;
    background: #1b1b1a;
    text-align: center;
    color: #fff;
    font-size: 14px;
}
.footerf a
{
    color: crimson;
    text-decoration: none;
}
.footerf a:hover
{
    text-decoration: underline;
}

@media(max-width: 400px){
    .containerVideo
    {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .controls .icon
    {
        margin-left: 5px;
        margin-right: 5px;
        font-size: 24px;
    }
    .volume,.volume_range,.picture_in_picutre
    {
        display: none;
    }
}

#load_videos:hover{
    margin-bottom: 100px;
}


.msg{
        background: cyan;
        position: fixed;
        bottom: 5%;
        right:10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size:32px;
        color:#1f1f1f;
        opacity:1;
        transition:all 0.5s;
        /* transition:all 10s; */
        animation-name: mff;
        animation-duration: 10s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
    }
    #msg:hover{
        bottom:60px;
        pointer-events:auto;
        color: yellow;
        background-color: red;
        transform: rotate(-360deg);
        opacity: 0.8;

    }
  
#sob{
    background-color: #212F3C;

}
#sob:hover{
    background-color: #042C32;
}
</style>



    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <script src="../bootstrap.budle.min.js"></script> -->



</head>
<body id="sob" class="bg- text-light">



<input type="hidden" value="<?=$postId?>" id="postid">
<input type="hidden" value="<?=$commentId?>" id="comid">
<input type="hidden" value="<?=$toId?>" id="toid">
<input type="hidden" value="<?=$nn?>" id="postuId">


<div class="topheader">
    <header class="tophead">
        <nav class="topnav">
            <a href="#main" class="btttnu-1"  id="HtmlBtn"><i class="bi bi-house-fill"><span class="topname">Home</span> <i class="bi bi-share"></i></i></a>
            <a href="#user" class="btttnu-2"><i class="bi bi-pencil-fill"><span class="topname">User</span></i></a>
            <a href="#others" class="btttnu-3"><i class="bi bi-bell"><span class="topname">Others</span></i></a>
            <a href="#signup" class="btttnu-4"><i class="bi bi-plus-square"><span class="topname">SIgnUp</span><i class="bi bi-person-plus-fill"></i></i></a>
            <a href="#login" class="btttnu-5"><i class="bi bi-box-arrow-in-right"><span class="topname">Login</span></i></a>

        </nav>
    </header>
</div>
<div class="container text-center">
<span style="font-size:10px" id="notice" class="text-center text-info">উপরের প্লাস / SignUp বাটনে ক্লিল করে আপনার আইপি লোকেশন দেখুন। ধন্যবাদ!</span>
</div>

<div class="container topcontainer">
    <section id="mainHome" class="section msssgu-1">




    


<div style="margin-top:35px" class="container mt-3" id="load_videos" >


<!-- sample post -->
<?php


$postiid=$_SESSION['p_id'];

        require_once 'db.php';

        $select = "SELECT * FROM post WHERE id=$postiid";
        $query = mysqli_query($con, $select);
        if(mysqli_num_rows($query) == 1){
            $datarow=mysqli_fetch_assoc($query);

            $im="SELECT * FROM users WHERE unique_id='".$datarow["unique_id"]."'";
    
            $imgs=mysqli_query($con,$im);
            $img=mysqli_fetch_assoc($imgs);
          
        

            ?>



                <section class="container4 mt-2 mb-3 position-relative">
                      <div class="card">
                        <div class="card-image">
                          <?php
                            if($datarow['img']!=""){
                              $imgd=$datarow['img'];
                              echo '<img src="image/'.$imgd.'" class="cardimg" width="100%" height="100%" alt="">';
                            }else{
                              $imgd=$img['img'];
                            }
                              
                          ?>
                            
                        </div>
                        <div class="card-text">
                        <h6 class="text-dark"><?=$datarow['header']; ?></h6>
                          <span class="date"><?=$datarow['time']; ?></span>

                          <div style="border-radius:5px; color:white" class="text-info p-1 bg-dark shadow-lg text-justify text-start border-top"><?=$datarow['text']; ?></div>
                        </div>
                        <div class="card-stats">

                          <a style="text-decoration:none" href="javascript:void(0)">
                          
                          <div class="stat" onclick="love_updatee('<?=$datarow['id']?>')"> 
                            <div style="font-size:12px" class="value" id="love_loope_<?=$datarow['id']?>"> <?=$datarow['love_count']?></div>
                            <span style="font-size:19px; color:red;" class="bi bi-heart-fill"></span>

                            <div class="type"><sup style="font-size:18px"></sup><span style="font-size:18px" class="bi bi-hand-thumbs-upp"></span>   <span style="font-size:18px" class="bi bi-hand-thumbs-downn"></span><sub style="font-size:18px"></sub></div>
                          </div>

                          </a>
                          <div style="border-radius:10px; height: 50px;" class="stat load border-start border-end border-top"  data-bs-toggle="collapse" data-bs-target="#comment_section<?=$datarow['id']?>" aria-controls="comment_section<?=$datarow['id']?>" aria-expanded="false" aria-label="Toggle navigation"> 
                            <div style="font-size:13px" class="value"><?=$datarow['com_count']?><i style="font-size:20px" class="bi bi-chat-left-text text-info"></i></div>
                          </div>

                          <div class="stat" data-bs-toggle="modal" data-bs-target="#sett<?=$datarow['id']?>">

                            <div class="type"><div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden">Loading...</span>
</div></div>
                          </div>
                        </div>
                      </div> 
                              
                                  <img style="top: -10px; right: -10px; border:3px solid #fff; border-radius: 50%;" src="image/<?=$img['img']?>"  width="100px" height="100px" class="position-absolute" id="profile-post-img" alt="">
                                  
                                  <div style="bottom: 20px; left: -10px; border-radius:5px;" class="fotter-section position-absolute">
                                  <nav>
                              
                                  <div class=""><span class="a"><i style="color:" class="bi bi-share text-warning"></i><span style="color:" class="text-primary shadow-lg">ShareIt<span style="font-size:20px; color:red;" class="bi bi-share"></span> </span></span></div>

                                  <div class=""><span class="a"><i style="color:" class="bi bi-chat-left text-info"></i><span style="color:" class="text-info shadow-lg"><?=$datarow['com_count']?> <span style="font-size:20px; color:teal;" class="bi bi-chat-left-text"></span> </span></span></div>

                                  <div class=""><span class="a"><i style="color:" class="bi bi-hand-thumbs-down text-danger" onclick="dislike_updatee('<?=$datarow['id']?>')" id="dislike_loope_<?=$datarow['id']?>"></i><span style="color:"style="color:" class="text-danger shadow-lg"><?=$datarow['dislike_count']?> <span style="font-size:20px; color:black;" class="bi bi-hand-thumbs-down"></span> </span></span></div>

                                  <div class=""><span class="a"><i style="color:" class="bi bi-hand-thumbs-up text-warning" onclick="like_updatee('<?=$datarow['id']?>')" id="like_loope_<?=$datarow['id']?>"></i><span style="color:" class="text-warning shadow-lg"><?=$datarow['like_count']?> <span style="font-size:20px; color:yellow;" class="bi bi-hand-thumbs-up"></span> </span></span></div>

                                  <div class=""  ><span class="a"><i style="color:red" class="bi bi-heart text" onclick="love_update('<?=$datarow['id']?>')" id="love_loop_<?=$datarow['id']?>"></i><span style="color:red;" class="text shadow-lg" ><?=$datarow['love_count']?> <span style="font-size:20px; color:red;" class="bi bi-heart-fill"></span> </span></span></div>
                              
                            </nav>
                           </div>

                      </span>
          
                </section>





            <?php

        }
        else{
            

            echo "<tr><td colspan='4'><h1>Sorry Post Not Found</h1></td></tr>";


        }





?>


<!-- sample post -->


<h1><?=$postId.', '.$commentId.', '.$toId?></h1>

</div>


<div class="modal fade" id="commentcollaps" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-secondary" id="staticBackdropLabel">Type Your Comment below the Textarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark">
      
      
<div style="border:0px dotted black; border-radius:6px" class="container main-comment mt-2 mb-2" id="">
<code id="error_status2" class="text-center shadow-lg"></code>
    <div class="row">
        <div style="border:1px dotted black; border-radius:6px" class="">
        <div class="comment form-floating p-2">
            <textarea name="" id="" cols="30" rows="10" id="comMsg" class="form-control comment_box3 bg-dark text-info"></textarea>
            <label for="comment_box3" class="form-floating comment_label text-light"><i class="bi bi-chat-left-text"></i></label>
        </div>
        </div>
        <!-- <div id="sendbtn3" class="p-2 text-center">
            <button style="background:black" id="#sendbtn3" type="button" class="btn btn-danger text-center float-end text-warning" id=""><i class="bi bi-chat-right-text-fill"> Send</i></button>
        </div> -->
    </div>

</div>


      </div>
      <div class="modal-footer bg-info">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <div id="sendbtn3" class="p-2 text-center">
            <button style="background:black" id="#sendbtn3" type="button" class="btn btn-danger text-center float-end text-warning" id=""><i class="bi bi-chat-right-text-fill"> Send</i></button>
        </div>
      </div>
    </div>
  </div>
</div>


<hr>

<div class="container mb-5 comment-content mt-5" id="comment-container">
    <!-- <div class="reply_box border p-2 mb-2">
            <h6 class="border-bottom d-inline username">Farhad Foysal</h6>
            <p class="para">Lorem ipsum dolor sit.</p>
            <button class="badge btn btn-warning reply_btn">Reply</button>
            <button class="badge btn btn-danger view_reply_btn">View Reply</button>
            <div class="ml-4 reply_section">

            </div>
    </div> -->
</div>







    
    </section>



    
    <section id="postUser" class="section msssgu-2">


    <section id="section" class="">
        <div class="container containerVideo">
            <div id="video_player">
                <video src="<?=$iimv?>" id="main-video"></video>
                <div class="progressAreaTime">0:00</div>
                <div class="controls">
                    <div class="progress-area">
                        <div class="progress-bar">
                            <span></span>
                        </div>
                    </div>
                    <div class="controls-list">
                        <div class="controls-left">
                            <span class="icon">
                                <i class="material-icons fast-rewind">replay_10</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons play_pause">play_arrow</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons fast-forward">forward_10</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons volume">volume_up</i>
                                <input type="range" min="0" max="100" class="volume_range">
                            </span>
                            <div class="timer">
                                <span class="current">0:00</span> / <span class="duration">0:00</span>
                            </div>
                        </div>
                        <div class="controls-right">
                            <span class="icon">
                                <i class="material-icons auto-play"></i>
                            </span>
                            <span class="icon">
                                <i class="material-icons settingsBtn">settings</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons picture_in_picutre">picture_in_picture_alt</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons fullscreen">fullscreen</i>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="settings">
                    <div class="playback">
                        <span>Playback Speed</span>
                        <ul>
                            <li data-speed="0.25">0.25</li>
                            <li data-speed="0.5">0.5</li>
                            <li data-speed="0.75">0.75</li>
                            <li data-speed="1"  class="active">Normal</li>
                            <li data-speed="1.25">1.25</li>
                            <li data-speed="1.5">1.5</li>
                            <li data-speed="1.75">1.75</li>
                            <li data-speed="2">2</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    </section>



    <section id="postOthers" class="section msssgu-3">


    <div class="container containerAge">
        <div class="inputs-wrapper">
            <h4 class="text-center text-info">Calculate Your Age</h4>
            <input type="date" name="date" id="date-input">
            <button onclick="ageCalculate()">Age</button>
        </div>
        <div class="output">
            <div>
                <span id="year">-</span>
                <p>Year</p>
            </div>
            <div>
                <span id="month">-</span>
                <p>Month</p>
            </div>
            <div>
                <span id="day">-</span>
                <p>Day</p>
            </div>
        </div>
    </div>


    </section>
    <section id="signUp" class="section msssgu-4">


    <?php

        @$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
        @$http_forwarded_ip = $_SERVER['HTTP_FORWARDED_FOR'];

        if(!empty($http_client_ip)){
            $ipaddress = $http_client_ip;
        }else if(!empty($http_forwarded_ip)){
            $ipaddress = $http_forwarded_ip;
        }else {
            $remote_addr = $_SERVER['REMOTE_ADDR'];
            // $remote_addr = "103.158.159.57";
            $ipaddress = $remote_addr;
        }



        $data_ip = file_get_contents("http://ip-api.com/json/{$ipaddress}?fields=status,message,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,currency,isp,org,as,mobile,query");
        $json = json_decode($data_ip, true);
    ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Assalamualaikum!</strong> আপনার আইপি দেখে নিন-ঠিকানা সহ...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <div class="container">

                        <div class="row">

                        <div class="col-md-6">

                        <h3>Ip Finding</h3>
                        <div style="border-radius:6px; border: 2px solid white;" class="container shadow-lg border border-light">
                            <img src="https://cache.ip-api.com/<?=$json['lon']?>,<?=$json['lat']?>,10" class="w-100" alt="ipLocation">
                        </div>


                        </div>

                        <div class="col-md-6">

                                <div class="content form-control bg-dark">


                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['query'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['country'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['countryCode'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['region'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['regionName'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['city'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['district'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['zip'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['lat'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['lon'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['timezone'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['currency'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['isp'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['org'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['as'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?= $json['mobile'] ?>"> <label for="" class="text-light">#</label> </div>    
                                    <div class="form-floating mb-1 bg-secondary"><input type="text" class="form-control form-floating text-light bg-dark" value="<?php  ?>"> <label for="" class="text-light">#</label> </div>    

                                </div>
                

                        </div>
                       

                        </div>

                    </div>



            </div>




    </section>
    <section id="logIn" class="section  msssgu-5">Login


    </section>

</div>


<!-- copy link -->

<input style="width:5px; height:1px"  type="text" value="http://mffoysal.xyz/p.php?p_id=<?=$postId?>&com_id=<?=$commentId?>&to=<?=$toId?>" id="HtmlCode" readonly>

<!-- copy link -->

<?php
    $agentUser = $_SERVER['HTTP_USER_AGENT'];
?>
 <section>
     <form action="" method="POST" id="form-visitor" enctype="multipart/form-data">
            <input type="hidden" name="lat" value="<?= $json['lat'] ?>">
            <input type="hidden" name="lon" value="<?= $json['lon'] ?>">
            <input type="hidden" name="agentIp" value="<?=$ipaddress?>">
            <input type="hidden" name="agent" value="<?=$agentUser?>">
            <div class="browser" ><input type="hidden" name="browser" id="browser"></div>
            <div class="version" ><input type="hidden" name="version" id="version"></div>
            <div class="layout" ><input type="hidden" name="layout" id="layout"></div>
            <div class="os" ><input type="hidden" name="os" id="os"></div>
            <div class="description" ><input type="hidden" name="description" id="description"></div>

     </form>
 <section>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/platform/1.3.6/platform.min.js"></script>
 
    <script>
     document.getElementById('browser').value = platform.name;
     document.getElementById('version').value = platform.version;
     document.getElementById('layout').value = platform.layout;
     document.getElementById('os').value = platform.os;
     document.getElementById('description').value = platform.description;
    </script>
<script>
  $(document).ready(function(){
    // $('#getdisplaydata1').click(function(){
      getInsertvisitor();
      function getInsertvisitor(){

        var visitor = new FormData($('#form-visitor')[0]);

      $.ajax({
        url:'visitor.php',
        type:'post',
        // data: $('#formdata').serialize(),
        data: visitor,
        async: false,
        cache: false,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success:function(responsedata){
          $('#notice').html(responsedata);
        }
      });
    }
    // });
  });
</script>


<!-- <script type="text/javascript" src="asset/custom.js"></script>   -->
<script type='text/javascript'>



$(document).ready(function(){
    var pid = $('#postid').val();
    var cid = $('#comid').val();
    var toid = $('#toid').val();

    $('#load_videos').load('getdata7.php');



    $('#load_videos').ready(function(){

        $.ajax({
              url:'getdata7.php',
              type:'post',
              data: {
                pId: pid,
                cId: cid,
                toId: toid,
                postp: true,
              },
              success: function(response){
                $('#load_videos').html(response);



              }
            });


    });




})

  
function love_update(id){
      
      jQuery.ajax({
        url:'update_love_upost.php',
        type:'post',
        data:'type=love&id='+id,
        success:function(result){
          var cur_count=jQuery('#love_loop_'+id).html();
          cur_count++;
          jQuery('#love_loop_'+id).html(cur_count);
          $('#load_videos').load('getdata7.php');
        }
      })
    }

    function love_updatee(id){
      
      jQuery.ajax({
        url:'update_love_upost.php',
        type:'post',
        data:'type=love&id='+id,
        success:function(result){
          var cur_count=jQuery('#love_loope_'+id).html();
          cur_count++;
          jQuery('#love_loope_'+id).html(cur_count);

        }
      })
    }


    function like_updatee(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=like&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loope_'+id).html();
         cur_count++;
         jQuery('#like_loope_'+id).html(cur_count);
         $('#load_videos').load('getdata7.php');
       }
     })
   }


   function dislike_updatee(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=dislike&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loope_'+id).html();
         cur_count++;
         jQuery('#dislike_loope_'+id).html(cur_count);
         $('#load_videos').load('getdata7.php');
       }
     })
   }




  
  function love_update_com(id){
      
      jQuery.ajax({
        url:'update_love_upost2.php',
        type:'post',
        data:'type=love&id='+id,
        success:function(result){
          var cur_count=jQuery('#love_loop_com_'+id).html();
          cur_count++;
          jQuery('#love_loop_com_'+id).html(cur_count);
        }
      })
    }

    function like_update_com(id){
     
     jQuery.ajax({
       url:'update_love_upost2.php',
       type:'post',
       data:'type=like&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loop_com_'+id).html();
         cur_count++;
         jQuery('#like_loop_com_'+id).html(cur_count);
       }
     })
   }


   function dislike_update_com(id){
     
     jQuery.ajax({
       url:'update_love_upost2.php',
       type:'post',
       data:'type=dislike&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loop_com_'+id).html();
         cur_count++;
         jQuery('#dislike_loop_com_'+id).html(cur_count);
       }
     })
   }


</script>


<script type="text/javascript">

    $(document).ready(function(){
        $('.btttnu-1').click(function(){
            $('.msssgu-2').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-2').click(function(){
            $('.msssgu-1').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-3').click(function(){
            $('.msssgu-1').css('display','none');
            $('.msssgu-2').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-4').click(function(){
            $('.msssgu-2').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-1').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-5').click(function(){
            $('.msssgu-1').css('display','none');
            $('.msssgu-2').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','block'); 
        });
    });
</script>



<!-- swap -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>



<script type="text/javascript" src="asset/custom.js"></script>
<!-- <script type="text/javascript" src="user.js"></script> -->
<!-- swap -->
<script>
    //   setInterval(function(){
        
    //     load_comment();
        
    // },1000)
      
    const months = [31,28,31,30,31,30,31,31,30,31,30,31];

function ageCalculate() {
    let today = new Date();
    let inputDate = new Date(document.getElementById('date-input').value);
    let birthYear, birthMonth, birthDay;
    let birthDetails = {
        year: inputDate.getFullYear(),
        month: inputDate.getMonth()+1,
        date: inputDate.getDate(),
    } 

    let currentYear = today.getFullYear();
    let currentMonth = today.getMonth()+1;
    let currentDate = today.getDate();

    leapChecker(currentYear);

    if (birthDetails.year > currentYear ||
        (birthDetails.month > currentMonth && birthDetails.year == currentYear) ||
        (birthDetails.date > currentDate && birthDetails.month == currentMonth && birthDetails.year == currentYear))
    {
        alert('Not Born yet');
        displayResult("-","-","-");
        return;
    }

    birthYear = currentYear - birthDetails.year;

    if (currentMonth >= birthDetails.month) {
        birthMonth = currentMonth - birthDetails.month;
    }else{
        birthYear--;
        birthMonth = 12 + currentMonth - birthDetails.month;
    }


    if (currentDate >= birthDetails.date) {
        birthDay = currentDate - birthDetails.date; 
    }else{
        birthMonth--;
        let Day = months[currentMonth - 2];
        birthDay = Day + currentDate - birthDetails.date;
        if (birthMonth < 0) {
            birthMonth = 11;
            birthYear--;
        }
    }

    displayResult(birthYear, birthMonth, birthDay);


    function displayResult(bYear, bMonth, bDay) {
        document.getElementById('year').textContent = bYear;
        document.getElementById('month').textContent = bMonth;
        document.getElementById('day').textContent = bDay;
    }

}
function leapChecker(year) {
    if(year % 4 == 0 || (year % 100 == 0 && year % 400 == 0)){
        months[1] = 29;
    }else{
        months[1] = 28;
    }
}



// video



// let's select all required tags or elements
const video_player = document.querySelector('#video_player'),
mainVideo = video_player.querySelector('#main-video'),
progressAreaTime = video_player.querySelector('.progressAreaTime'),
controls = video_player.querySelector('.controls'),
progressArea = video_player.querySelector('.progress-area'),
progress_Bar = video_player.querySelector('.progress-bar'),
fast_rewind = video_player.querySelector('.fast-rewind'),
play_pause = video_player.querySelector('.play_pause'),
fast_forward = video_player.querySelector('.fast-forward'),
volume = video_player.querySelector('.volume'),
volume_range = video_player.querySelector('.volume_range'),
current = video_player.querySelector('.current'),
totalDuration = video_player.querySelector('.duration'),
auto_play = video_player.querySelector('.auto-play'),
settingsBtn = video_player.querySelector('.settingsBtn'),
picture_in_picutre = video_player.querySelector('.picture_in_picutre'),
fullscreen = video_player.querySelector('.fullscreen'),
settings = video_player.querySelector('#settings'),
playback = video_player.querySelectorAll('.playback li');



// Play video function
function playVideo() {
    play_pause.innerHTML = "pause";
    play_pause.title = "pause";
    video_player.classList.add('paused')
    mainVideo.play();
}

// Pause video function
function pauseVideo() {
    play_pause.innerHTML = "play_arrow";
    play_pause.title = "play";
    video_player.classList.remove('paused')
    mainVideo.pause();
}

play_pause.addEventListener('click',()=>{
    const isVideoPaused = video_player.classList.contains('paused');
    isVideoPaused ? pauseVideo() : playVideo();
})

mainVideo.addEventListener('play',()=>{
    playVideo();
})

mainVideo.addEventListener('pause',()=>{
    pauseVideo();
})

// fast_rewind video function
fast_rewind.addEventListener('click',()=>{
    mainVideo.currentTime -= 10;
})

// fast_forward video function
fast_forward.addEventListener('click',()=>{
    mainVideo.currentTime += 10;
})


// Load video duration
mainVideo.addEventListener("loadeddata",(e)=>{
    let videoDuration = e.target.duration;
    let totalMin = Math.floor(videoDuration / 60);
    let totalSec = Math.floor(videoDuration % 60);

    // if seconds are less then 10 then add 0 at the begning
    totalSec < 10 ? totalSec = "0"+totalSec : totalSec;
    totalDuration.innerHTML = `${totalMin} : ${totalSec}`;
})

// Current video duration
mainVideo.addEventListener('timeupdate',(e)=>{
    let currentVideoTime = e.target.currentTime;
    let currentMin = Math.floor(currentVideoTime / 60);
    let currentSec = Math.floor(currentVideoTime % 60);
   // if seconds are less then 10 then add 0 at the begning
    currentSec < 10 ? currentSec = "0"+currentSec : currentSec; 
    current.innerHTML = `${currentMin} : ${currentSec}`;

    let videoDuration = e.target.duration
    // progressBar width change
    let progressWidth = (currentVideoTime / videoDuration) * 100;
    progress_Bar.style.width = `${progressWidth}%`;
})

// let's update playing video current time on according to the progress bar width

progressArea.addEventListener('click',(e)=>{
    let videoDuration = mainVideo.duration;
    let progressWidthval = progressArea.clientWidth;
    let ClickOffsetX = e.offsetX;
    mainVideo.currentTime = (ClickOffsetX / progressWidthval) * videoDuration;
})

// change volume
function changeVolume() {
    mainVideo.volume = volume_range.value / 100;
    if (volume_range.value == 0) {
        volume.innerHTML = "volume_off";
    }else if(volume_range.value < 40){
        volume.innerHTML = "volume_down";
    }else{
        volume.innerHTML = "volume_up";
    }

}

function muteVolume() {
    if (volume_range.value == 0) {
        volume_range.value = 80;
        mainVideo.volume = 0.8;
        volume.innerHTML = "volume_up";
    }else{
        volume_range.value = 0;
        mainVideo.volume = 0;
        volume.innerHTML = "volume_off";
    }
}


volume_range.addEventListener('change',()=>{
    changeVolume();
})

volume.addEventListener('click',()=>{
    muteVolume();
})


// Update progress area time and display block on mouse move
progressArea.addEventListener('mousemove',(e)=>{
    let progressWidthval = progressArea.clientWidth;
    let x = e.offsetX;
    progressAreaTime.style.setProperty('--x',`${x}px`);
    progressAreaTime.style.display = "block";
    let videoDuration = mainVideo.duration;
    let progressTime = Math.floor((x/progressWidthval)*videoDuration);
    let currentMin = Math.floor(progressTime / 60);
    let currentSec = Math.floor(progressTime % 60);
   // if seconds are less then 10 then add 0 at the begning
    currentSec < 10 ? currentSec = "0"+currentSec : currentSec; 
    progressAreaTime.innerHTML = `${currentMin} : ${currentSec}`;

})

progressArea.addEventListener('mouseleave',()=>{
    progressAreaTime.style.display = "none";
})



// Auto play
auto_play.addEventListener('click',()=>{
    auto_play.classList.toggle('active')
    if(auto_play.classList.contains('active')){
        auto_play.title = "Autoplay is on";
    }else{
        auto_play.title = "Autoplay is off";
    }
});

mainVideo.addEventListener("ended",()=>{
    if (auto_play.classList.contains('active')) {
        playVideo();
    }else{
        play_pause.innerHTML = "replay";
        play_pause.title = "Replay";
    }
});

// Picture in picture

picture_in_picutre.addEventListener('click',()=>{
    mainVideo.requestPictureInPicture();
})


// Full screen function

fullscreen.addEventListener('click',()=>{
    if (!video_player.classList.contains('openFullScreen')) {
        video_player.classList.add('openFullScreen');
        fullscreen.innerHTML = "fullscreen_exit";
        video_player.requestFullscreen();
    }else{
        video_player.classList.remove('openFullScreen');
        fullscreen.innerHTML = "fullscreen";
        document.exitFullscreen();
    }
});


// Open settings
settingsBtn.addEventListener('click',()=>{
    settings.classList.toggle('active');
    settingsBtn.classList.toggle('active');
})

// Playback Rate

playback.forEach((event)=>{
    event.addEventListener('click',()=>{
        removeActiveClasses();
        event.classList.add('active');
        let speed = event.getAttribute('data-speed');
        mainVideo.playbackRate = speed;
    })
})



function removeActiveClasses() {
    playback.forEach(event => {
        event.classList.remove('active')
    });
}


// Store video duration and video path in local storage

window.addEventListener('unload',()=>{
    let setDuration = localStorage.setItem('duration',`${mainVideo.currentTime}`);
    let setSrc = localStorage.setItem('src',`${mainVideo.getAttribute('src')}`);
})

window.addEventListener('load',()=>{
    let getDuration = localStorage.getItem('duration');
    let getSrc = localStorage.getItem('src');
    if (getSrc) {
        mainVideo.src = getSrc;
        mainVideo.currentTime = getDuration;
    }
})


mainVideo.addEventListener('contextmenu',(e)=>{
    e.preventDefault();
})


// Hide and show controls on Mouse move
video_player.addEventListener('mouseover',()=>{
    controls.classList.add('active');
})

video_player.addEventListener('mouseleave',()=>{
    if (video_player.classList.contains('paused')) {
        if (settingsBtn.classList.contains('active')) {
            controls.classList.add('active');
        }else{
            controls.classList.remove('active')
        }
    }else{
        controls.classList.add('active')
    }
})

if (video_player.classList.contains('paused')) {
    if (settingsBtn.classList.contains('active')) {
        controls.classList.add('active');
    }else{
        controls.classList.remove('active')
    }
}else{
    controls.classList.add('active')
}

// Hide and show controls on mobile touch
video_player.addEventListener('touchstart',()=>{
    controls.classList.add('active');
    setTimeout(() => {
        controls.classList.remove('active')
    }, 8000);
})

video_player.addEventListener('touchmove',()=>{
    if (video_player.classList.contains('paused')) {
        controls.classList.remove('active')
    }else{
        controls.classList.add('active')
    }
})


</script>

<script src="jsnav/bootstrap.bundle.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert.min.js"></script>
</body>
</html>





<!-- <input type="text" class="reply-msgg from-control my-2" placeholder="Reply">
<div class="text-end">
    <button class="badge btn btn-warning text-dark reply_btn">Reply</button>
    <button class="badge btn btn-danger cancel_btn">Cancel</button>
</div> -->




<!-- <div class="text-boxes">
        <div class="text-box htmlBox">
            <div class="topic">HTML Code</div>
            <textarea readonly id="HtmlCode">


            </textarea>
            <button id="HtmlBtn">Copy Code</button>
        </div>
        <div class="text-box htmlBox">
            <div class="topic">CSS Code</div>
            <textarea readonly id="CSSCode">
              

            </textarea>
            <button id="CSSBtn">Copy Code</button>
        </div>
    </div>
    <script>
        const HtmlBtn = document.getElementById('HtmlBtn');
        const HtmlCode = document.getElementById('HtmlCode');
        HtmlBtn.addEventListener('click',()=>{
            HtmlCode.select();
            document.execCommand('copy');
            HtmlBtn.innerHTML = "Code Copied"
        });
        
        const CSSBtn = document.getElementById('CSSBtn');
        const CSSCode = document.getElementById('CSSCode');
        CSSBtn.addEventListener('click',()=>{
            CSSCode.select();
            document.execCommand('copy');
            CSSBtn.innerHTML = "Code Copied"
        })
    </script>
 -->
 <script>
        const HtmlBtn = document.getElementById('HtmlBtn');
        const HtmlCode = document.getElementById('HtmlCode');
        const HtmlNotice = document.getElementById('notice');
        HtmlBtn.addEventListener('click',()=>{
            HtmlCode.select();
            document.execCommand('copy');
            HtmlNotice.innerHTML = "ধন্যবাদ! আপনি হোম বাটনে ক্লিক করেছেন! লিংক সিলেক্ট হয়েছে! শেয়ার করুন!"
        });
        

    </script>
 
