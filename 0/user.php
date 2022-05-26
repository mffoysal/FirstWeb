


<?php
session_start();

if(isset($_SESSION['unique_id'])){
  $_SESSION['visitor_id']=$_SESSION['unique_id'];
}else{
  $_SESSION['visitor_id'] = '787579833';
}


include('db.php');
if(isset($_REQUEST['unique_id'])){
  $idu=$_REQUEST['unique_id'];

  $usqli= "SELECT * FROM users WHERE unique_id='$idu'";
  $usql=mysqli_query($con,$usqli);
  $unum=mysqli_num_rows($usql);
  $urow=mysqli_fetch_assoc($usql);
  
  if($unum<1){
    header('location:index.php');
  }
}
?>
<input type="text" id="farhadf" value="<?=$idu?>" hidden>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$urow['name']?>--Profile</title>
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
  <!-- <link rel="stylesheet" href="stylec.css" /> -->
  <link rel="stylesheet" href="user.css">
    <!-- swap -->

    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <script src="../bootstrap.budle.min.js"></script> -->

    <style>
      #msg-2{
    display: none;
}
#msg-3{
    display: none;
}
#msg-4{
    display: none;
}
#msg-5{
    display: none;
}

#mg-2{
    display: none;
}
#mg-3{
    display: none;
}
#mg-4{
    display: none;
}
#mg-5{
    display: none;
}

#mssg-2{
    display: none;
}
#mssg-3{
    display: none;
}
#mssg-4{
    display: none;
}
#mssg-5{
    display: none;
}

#msssg-2{
    display: none;
}
#msssg-3{
    display: none;
}
#msssg-4{
    display: none;
}
#msssg-5{
    display: none;
}
    </style>
    
  </head>
  <body class="bg-dark" style="background-color: #e40046">
  <!-- <body style="background-color: #e40046"> -->
  <!-- <body style="background-color: rgba(288, 0, 70, .9)"> -->

  <div class="container">
<div class="count">
      <div class="count-down">
          <div class="box">
            <h3 id="day">000</h3>
            <span>Day</span>
          </div>
          <div class="box">
            <h3 id="hour">00</h3>
            <span>Hour</span>
          </div>
          <div class="box">
            <h3 id="minute">00</h3>
            <span>Minute</span>
          </div>
          <div class="box">
            <h3 id="second">00</h3>
            <span>Second</span>
          </div>
      </div>
    </div>
</div>

<div class="container content">
  <h2><?=$urow['name']; ?></h2>
  <h2><?=$urow['name']; ?></h2>
</div>


<div class="container">
  <div class="profile-header">
    <div class="profile-img">
      <img src="image/<?=$urow['img']?>" width="200" alt="">
    </div>
    <div class="profile-nav-info">
      <h3 class="user-name"><?=$urow['name']; ?></h3>
      <div class="address">
        <p class="state">#<?= $urow['division'].', '.$urow['district'].', '.$urow['upazila'].', '.$urow['unions'] ?></p>
        <span class="country">BD</span>
      </div>
    </div>
    <div class="profile-option">
      <div class="notification">
        <i class="bi bi-bell-fill
"></i>
        <span class="alert-message">1</span>
      </div>
    </div>
  </div>
  <div class="main-bd">



    <div class="left-side">
      <div class="profile-side">
        <p class="mobile-number"><i class="bi bi-telephone-plus-fill">
          <?= $urow['phone'] ?>
        </i></p>
        <p class="user-mail"><i class="bi bi-envelope">
        <?= $urow['email'] ?>
        </i></p>
        <h3>Bio<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden">Loading...</span>
</div></h3>
        <div class="user-bio bio">  <?= $urow['bio'] ?>  <br><br>!</div>
     
     

        <div class="profile-btn">
            <a href="#"><button class="chatbtn"><i class="bi bi-chat-dots-fill">Chat</i></button></a>
            <button class="createbtn"><i class="bi bi-person-plus-fill">+Add</i></button>
          </div>
          <div class="user-rating">4.5
          
          <div class="rate">
            <div class="stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>

            </div>
            <span class="no-user"><span><?=$urow['referral_point'] ?></span>&nbsp;&nbsp;reviews/referral point</span>
          </div>
          </div>

     
      </div>
          
      <div class="container mt-2 bg-light text-dark">
        <div class="row">
          <div class="col-md">

                                     <div class="accordion-item">
                                        <h2 style="" class="accordion-header" id="flush-headingOne">
                                        <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Friend List<span>......</span><h6 class="text-center" id="total1" ></h6>
                                        </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                          <div class="accordion-body">

                                                <!--  -->
                                                      <div class="accordion-item">
                                                          <h2 class="accordion-header" id="flush-headingThree">
                                                          <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                              Friend List<span>......</span><h6 class="text-center" id="total2" ></h6>
                                                          </button>
                                                          </h2>
                                                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                                                            <div class="accordion-body">

                                                                  <!--  -->
                                                                  
                                                                  <!--  -->

                                                            </div>
                                                          </div>
                                                      </div>
                                                <!--  -->

                                          </div>
                                        </div>
                                     </div>





          </div>
        </div>
      </div>


    </div>




    <div class="right-side">
      <div class="nav">
        <ul>
          <li onclick="tabs(0)" class="user-post active">POsTs</li>
          <li onclick="tabs(1)" id="u_about" class="user-review">AbOuT</li>
          <li onclick="tabs(2)" class="user-setting">S & T</li>
          <li onclick="tabs(3)" id="video1btn" class="user-video">EdULearn</li>
        </ul>
      </div>
      <div class="profile-body bg-secondary text-light">

        <div class="profile-posts tab">

        <header class="header2">
              <nav class="navbar">
                      <a class="btttn-1" href="#home" id="getdisplaydata1"><i class="bi bi-house-fill">.<span class="sp1">Home</span></i></a>
                      <a class="btttn-2" href="#about" id="qutebtn"><i class="bi bi-chat-right-quote-fill">.<span class="sp2">Qute</span></i></a>
                      <a class="btttn-3" href="#gallery" id="gallerybtn"><i class="bi bi-grid-3x3-gap-fill">.<span class="sp3">Gallery</span></i></a>
                      <a class="btttn-4" href="#portfolio"><i class="bi bi-play-btn-fill">.<span class="sp4">Videos</span></i></a>
                      <a class="btttn-5" href="#contact"><i class="bi bi-phone">.<span class="sp5">User</span></i></a>
              </nav>
          </header>

          <div id="msssg-1" class="containe msssg-1">
                <h1>POSTS</h1>


              <div id="response1" class="container-fluid">

 
              </div>

                <!-- <section class="container4 mt-2 mb-3 position-relative">
                      <div class="card">
                        <div class="card-image">
                            <img src="../image/<?=$urow['img']?>" class="cardimg" width="100%" height="100%" alt="">
                        </div>
                        <div class="card-text">
                        <h2 class="text-dark"><?=$urow['name']; ?></h2>
                          <span class="date">4 days ago</span>

                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit esse pariatur repudiandae neque sapiente optio quaerat nemo eum odit earum! Lorem ipsum dolor sit amet consectetur, Ducimus, repudiandae temporibus omnis illum maxime quod deserunt eligendi dolor</p>
                        </div>
                        <div class="card-stats">
                          <div class="stat"> 
                            <div class="value">4<sup>m</sup></div>
                            <div class="type">read</div>
                          </div>
                          <div class="stat border">
                            <div class="value">5123</div>
                            <div class="type">views</div>
                          </div>
                          <div class="stat">
                            <div class="value">32</div>
                            <div class="type">comments</div>
                          </div>
                        </div>
                      </div> 
                      
                           <img style="top: -10px; right: -10px; border:3px solid #fff; border-radius: 50%;" src="../image/<?=$urow['img']?>"  width="100px" height="100px" class="position-absolute" id="profile-post-img" alt="">
                      </span>
          
                </section> -->




<!-- 
                <section class="container3">
                  <div class="testimonial">
                    <div class="avatar">
                      <img src="image/<?=$urow['img']?>" alt="">
                    </div>
                    <div class="body">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolor! Pariatur optio ipsa saepe quo repudiandae ut eligendi asperiores delectus.</p>
                    </div>
                    <div class="footer">
                      <h1>MF Foysal</h1>
                      <p>CEO EdULearn</p>
                    
                    </div>
                  </div>
                </section> -->






          </div>
          <div id="msssg-2" class="container msssg-2">
                <h1>QUTE</h1>

                <div id="gallery_data">

                </div>

                  
                <!-- <section class="container3">
                  <div class="testimonial">
                    <div class="avatar">
                      <img src="image/<?=$urow['img']?>" alt="">
                    </div>
                    <div class="body">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolor! Pariatur optio ipsa saepe quo repudiandae ut eligendi asperiores delectus.</p>
                    </div>
                    <div class="footer">
                      <h1>MF Foysal</h1>
                      <p>CEO EdULearn</p>
                    
                    </div>
                  </div>
                </section> -->

          </div>
          <div id="msssg-3" class="container msssg-3">
                <h1>GALLERY</h1>


                <div class="container vid">
                        <div class="row">
                          <div class="col-md-8 mb-3">
                            <div class="feature-img">
                            <img src="image/logo.png" alt="">
                            <p class="titleimg">ASSalamualaikum</p>
                            </div>
                            
                          </div>
                          <div  class="col-md-4 picvid">
                                                                    
                                          <?php
                                            include('db.php');


                                            $data="SELECT * FROM image WHERE image!='' AND status='Enable' AND unique_id='$idu' ORDER BY id DESC";
                                            $im="SELECT * FROM users WHERE unique_id='$idu'";
                                            

                                            $sqldata=mysqli_query($con,$data);

                                            $imgs=mysqli_query($con,$im);
                                            $img=mysqli_fetch_assoc($imgs);
                                          


                                            if(mysqli_num_rows($sqldata)>0){
                                                while  ($datarow=mysqli_fetch_assoc($sqldata)){
                                                    ?>
                                              
                                                                    <div class="small-img-row">
                                                                      <div class="small-img smallimg <?=$datarow['active']?>">

                                                                      <img src="image/<?=$datarow['image']?>" alt="">
                                                                      <p class="titleimg"><?=$datarow['img_title']?></p>
                                                                      </div>

                                                                    </div>
                                                                    
                                        <?php
                                                }
                                            }

                                        ?>
                          </div>

                        </div>
                </div>
  

<!-- 
                <div class="container vid">
                        <div class="row">
                          <div class="col-md-8 mb-3">
                            <div class="feature-img">
                            <img src="image/logo.png" alt="">
                            <p class="titleimg">ASSalamualaikum</p>
                            </div>
                            
                          </div>
                          <div class="col-md-4 picvid">
                            <div class="small-img-row">
                              <div class="small-img smallimg active">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Lorem ipsum dolorfff sit amet consectetur</p>
                              </div>
                              
                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>

 
                          </div>
                        </div>
                </div>
 -->


          </div>
          <div id="msssg-4" class="container msssg-4">
                <h1>Videos</h1>




                <div class="vlist mt-2">
                     <div class="containerac">

                        <div class="main-video34">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list34">
                          
<?php
    include('db.php');


    $data34="SELECT * FROM videos_demo WHERE album='P' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im34="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata34=mysqli_query($con,$data34);

    $imgs34=mysqli_query($con,$im34);
    $img34=mysqli_fetch_assoc($imgs34);
  
    if(mysqli_num_rows($sqldata34)>0){
        while  ($datarow34=mysqli_fetch_assoc($sqldata34)){
            ?>
                 
                            <div class="vid34 <?=$datarow3['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<<?=$datarow34['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow34['std_show']?>views <?=$datarow34['time']?></code> <?=$datarow34['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                    
                        </div>

                      

                     </div>                                                     
                    </div>
            






          </div>
          <div id="msssg-5" class="container msssg-5">
                <h1>User</h1>
          </div>
            
        </div>
        




        <div class="profile-review tab">
        <header class="header2">
              <nav class="navbar">
                      <a class="bttn-1" href="#home"><i class="bi bi-file-earmark-person-fill">.<span class="sp1">#CV</span></i></a>
                      <a class="bttn-2" href="#about"><i class="bi bi-person-check-fill">.<span class="sp2">#Friends</span></i></a>
                      <a class="bttn-3" href="#gallery"><i class="bi bi-bag-plus
">.<span class="sp3">#Courses</span></i></a>
                      <a class="bttn-4" href="#portfolio"><i class="bi bi-question-circle-fill">.<span class="sp4">#Q&A</span></i></a>
                      <a class="bttn-5" href="#contact"><i class="bi bi-telephone">.<span class="sp5">#Contact</span></i></a>
              </nav>
          </header>

          <div id="mg-1" class="container mg-1">
                <h1>#CV</h1>

                <div class="container-fluid bg-light">
                  <div class="row bg-light text-dark">
                    <div class="col-md-8 mt-2 mb-1 pt-3">
                          <div class="container">
                            <h5>CURRICULUM VITAE</h5>
                            <h4 style="text-transform:capitalize"><?=$urow['name']?></h4>
                            <h6> <span style="font-weight:bolder" class="">Contact NO</span> <code style="margin-left:1px; margin-right:7px">:</code>   +88<?=$urow['phone'] ?></h6>
                            <h6>  <span style="font-weight:bolder" class="">E-mail</span>   <code style="margin-left:40px;margin-right:7px">:</code>   <?=$urow['email'] ?></h6>
                            <!-- <h6> <span style="font-weight:bolder;" class="">Address</span>   <code style="margin-left:28px">:</code> Madrasha Pada, W-1, Islampur Union, Napitkhali, Sadar, Cox'sBazar</h6> -->
                            <div style="" class="row"><div style="font-weight:bolder" class="col-3">Address<code style="margin-left:32px; margin-right: ;">:</code></div><div class="col"><?=$urow['village'].', '.$urow['word'].', '.$urow['unions'].', '.$urow['upazila'].', '.$urow['district'].', '.$urow['division'] ?></div></div>
                          </div>
                    </div>
                    <div class="col-md-4 mt-2 mb-1">
                          <img style="border:2px solid black; border-radius:4px" src="image/ImagePic.jpg" width="180px" height="200px" alt="">
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-primary">
                        <h5 class="bg-primary text-light"># CAREER OBJECTIVE</h5>
                        <div style="margin-left:3px; margin-right: 3px; text-align:justify" class="text-cente p-2">
                          <div class="div"><?=$urow['c_objective']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-success">
                        <h5 class="bg-success text-light"># CAREER SUMMARY</h5>
                        <div style="margin-left:3px; margin-right: 3px; text-align:justify" class="text-cente p-2">
                          <div class="div"><?=$urow['c_summary']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-secondary">
                        <h5 class="bg-secondary text-light"># EXPERIENCE</h5>
                        <div id="u_exp" style="margin-left:3px; margin-right: 3px;" class="text-cente">
                              <div class="container mb-2 mt-2">

                                <h4 style="border-bottom:2px solid #42f551" class="">1. COMPANY ONE</h4>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Position<code style="margin-left:31px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Location<code style="margin-left:27px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Duration<code style="margin-left:25px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div></br>
                                <h5 style="margin-left:15px" class="">Achievement:</h5>
                                <div style="border:2px solid #42f551; margin-left:15px; font-weight:bolder" class="p-2">
                                  farha;d Lorem, ipsum dolor. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ex quas ut soluta, est mollitia quaerat nesciunt tempore excepturi minima rerum perspiciatis illum beatae sint? Voluptate illo eius facere dicta?
                                </div>


                              </div>

                              <div class="container mb-2 mt-2">

                                <h4 style="border-bottom:2px solid #42f551" class="">2. COMPANY ONE</h4>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Position<code style="margin-left:31px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Location<code style="margin-left:27px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Duration<code style="margin-left:25px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div></br>
                                <h5 style="margin-left:15px" class="">Achievement:</h5>
                                <div style="border:2px solid #42f551; margin-left:15px; font-weight:bolder" class="p-2">
                                  farha;d Lorem, ipsum dolor. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ex quas ut soluta, est mollitia quaerat nesciunt tempore excepturi minima rerum perspiciatis illum beatae sint? Voluptate illo eius facere dicta?
                                </div>


                              </div>

                              <div class="container mb-2 mt-2">

                                <h4 style="border-bottom:2px solid #42f551" class="">3. COMPANY ONE</h4>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Position<code style="margin-left:31px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Location<code style="margin-left:27px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Duration<code style="margin-left:25px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div></br>
                                <h5 style="margin-left:15px" class="">Achievement:</h5>
                                <div style="border:2px solid #42f551; margin-left:15px; font-weight:bolder" class="p-2">
                                  farha;d Lorem, ipsum dolor. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ex quas ut soluta, est mollitia quaerat nesciunt tempore excepturi minima rerum perspiciatis illum beatae sint? Voluptate illo eius facere dicta?
                                </div>


                              </div>
                          
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid #42f551" class="border-primar">
                        <h5 style="background:#42f551" class="bg-primar text-light"># EDUCATIONAL QUALIFICATION</h5>
                        <div id="u_edu" style="margin-left:3px; margin-right: 3px;" class="text-cente">
                          

                            <div class="container mb-2 mt-2">

                              <h4 style="border:2px solid #42f551" class="text-center">2. COMPANY ONE</h4>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">University<code style="margin-left:34px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">East Delta University</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Subject<code style="margin-left:53px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Board<code style="margin-left:62px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Passing Year<code style="margin-left:15px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Result<code style="margin-left:61px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger</div></div></br>
                              


                            </div>

                          

                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-primary">
                        <h5 class="bg-primary text-light"># SPECIAL QUALIFICATION EXPERIENCE</h5>
                        <div style="margin-left:3px; margin-right: 3px;  text-align:justify" class="text-cente p-2">
                          <div class="div"><?=$urow['s_q']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid #e40046" class="border-primar">
                        <h5 style="background:#e40046" class="bg-primar text-light"># PERSONAL INFORMATION</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          
                        

                                                    
                            
                        <div class="containe mb-2 mt-2">


                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Father's Name<code style="margin-left:62px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['f_name']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Mother's Name<code style="margin-left:53px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['m_name']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Date Of Birth<code style="margin-left:70px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['dob']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Marital Status<code style="margin-left:64px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['m_status']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Religion<code style="margin-left:106px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['religion']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Parmanent Address<code style="margin-left:22px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['p_address']?></div></div></br>



                        </div>




                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-success">
                        <h5 class="bg-success text-light"># COMPUTER SKILL</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="div">
                          <?=$urow['com_skill']?>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid #42f551" class="border-primar">
                        <h5 style="background:#42f551" class="bg-primar text-light"># LANGUAGE PROFICIANCE</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="div"><?=$urow['lang_skill']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-primary">
                        <h5 class="bg-primary text-light"># HOBBIES & INTEREST</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="div"><?=$urow['h_int']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-secondary">
                        <h5 class="bg-secondary text-light"># REFERENCE</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="container">

                            <div id="u_ref" class="row">

                              <div style="border-right:1px solid black" class="col-md text-center">
                                <?=$urow['ref1']?>
                                <h5 style="font-weight:bolder">#Farhad Foysal</h5>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                              </div>
                              <div style="border-left:1px solid black" class="col-md text-center">
                              <?=$urow['ref2']?>
                                <h5 style="font-weight:bolder">#Farhad Foysal</h5>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-3">
                      <div style="border:1px solid #42f551" class="border-primar">
                        <h5 style="background:#42f551" class="bg-primar text-light"># DECLARATION & SIGNATURE</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <h6>I am <span style="text-transform:capitalize" class=""><?=$urow['name']?></span> here declared that all the above information about me is true.</h6>
                          <br>
                          <br>
                          <br>
                          <br>
                            <div class="row">
                              <div class="col-4 text-center">
                                <img src="image/ImagePic.jpg<?=$urow['signature']?>" width="220px" height="80px" alt="">  
                              <h5 style="border-top:3px solid black">Signature</h5></div>
                              <div class="col-6"></div>
                            </div>

                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- <div class="row"></div>
                  <div class="row"></div>
                  <div class="row"></div>
                  <div class="row"></div> -->
                </div>



          </div>
          <div id="mg-2" class="container mg-2">
                <h1>#Friends</h1>
          </div>
          <div id="mg-3" class="container mg-3">
                <h1>#Courses</h1>
          </div>
          <div id="mg-4" class="container mg-4">
                <h1>#Q&A</h1>
          </div>
          <div id="mg-5" class="container mg-5">
                <h1>#Contact</h1>
          </div>



       
        </div>
        
        <div class="profile-settings tab">

        <header class="header2">
              <nav class="navbar">
                      <a class="bn-1" href="#home"><i class="bi bi-signpost
">.<span class="sp1">#T~POST</span></i></a>
                      <a class="bn-2" href="#about"><i class="bi bi-signpost-2">.<span class="sp2">#S~POST</span></i></a>
                      <a class="bn-3" href="#gallery"><i class="bi bi-pen">.<span class="sp3">Student</span></i></a>
                      <a class="bn-4" href="#portfolio"><i class="bi bi-pencil-fill
">.<span class="sp4">Mentor</span></i></a>
                      <a class="bn-5" href="#contact"><i class="bi bi-folder2-open">.<span class="sp5">Contact</span></i></a>
              </nav>
          </header>

          <div id="mssg-1" class="container mssg-1">
                <h1>#TUTOR POST</h1>
          </div>
          <div id="mssg-2" class="container mssg-2">
                <h1>#Student Post</h1>
          </div>
          <div id="mssg-3" class="container mssg-3">
                <h1>Student</h1>
          </div>
          <div id="mssg-4" class="container mssg-4">
                <h1>Mentor</h1>
          </div>
          <div id="mssg-5" class="container mssg-5">
                <h1>Contact</h1>
          </div>

        <h1>S&T</h1>
            
        </div>

        <div class="profile-videos tab">
          <header class="header2">
              <nav class="navbar">
                      <a class="btn-1" href="#home"><i class="bi bi-pause-circle-fill">.<span class="sp1">#A</span></i></a>
                      <a class="btn-2" href="#about"><i class="bi bi-play-fill
">.<span class="sp2">#B</span></i></a>
                      <a class="btn-3" href="#gallery"><i class="bi bi-play-circle
">.<span class="sp3">#C</span></i></a>
                      <a class="btn-4" href="#portfolio"><i class="bi bi-bell-fill">.<span class="sp4">#Notice</span></i></a>
                      <a class="btn-5" href="#contact"><i class="bi bi-cloud-download-fill">.<span class="sp5">#Download</span></i></a>
              </nav>
          </header>

          <div id="msg-1" class="container msg-1">
 


                    <div class="vlist mt-2">
                     <div class="container2">

                 
                      

                        <!-- <iframe width="100%" height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe> -->

                        <div class="main-video">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list">
                          
<?php
    include('db.php');


    $data2="SELECT * FROM videos_demo WHERE album='SH' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im2="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata2=mysqli_query($con,$data2);

    $imgs2=mysqli_query($con,$im2);
    $img2=mysqli_fetch_assoc($imgs2);
  
    if(mysqli_num_rows($sqldata2)>0){
        while  ($datarow2=mysqli_fetch_assoc($sqldata2)){
            ?>
                 
                            <div class="vid2 <?=$datarow2['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<?=$datarow2['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow2['std_show']?>views <?=$datarow2['time']?></code> <?=$datarow2['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                          <!-- <div class="vid2 active">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>    
                          </div> -->
                          <!-- <div class="vid2">
                                    <iframe width="100%" class="vide"  class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/xP09I3LKjQU?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 2 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 3 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/chaGhpMN980?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 4 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 5 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/pQeHyom613Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 6 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 7 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/pQeHyom613Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 8 Assalamualaikum</h3>    
                          </div> -->
                        </div>

                      

                     </div>                                                     
                    </div>
            



          </div>
          <div id="msg-2" class="container msg-2">
                <h1>A</h1>

                                      
 


                    <div class="vlist mt-2">
                     <div class="containera">

                        <div class="main-video3">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list3">
                          
<?php
    include('db.php');


    $data3="SELECT * FROM videos_demo WHERE album='SA' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im3="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata3=mysqli_query($con,$data3);

    $imgs3=mysqli_query($con,$im3);
    $img3=mysqli_fetch_assoc($imgs3);
  
    if(mysqli_num_rows($sqldata3)>0){
        while  ($datarow3=mysqli_fetch_assoc($sqldata3)){
            ?>
                 
                            <div class="vid3 <?=$datarow3['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<?=$datarow3['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow3['std_show']?>views <?=$datarow3['time']?></code> <?=$datarow3['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                    
                        </div>

                      

                     </div>                                                     
                    </div>
            



          </div>
          <div id="msg-3" class="container msg-3">
                <h1>B</h1>



                <div class="vlist mt-2">
                     <div class="containerab">

                        <div class="main-video33">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list33">
                          
<?php
    include('db.php');


    $data33="SELECT * FROM videos_demo WHERE album='SB' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im33="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata33=mysqli_query($con,$data33);

    $imgs33=mysqli_query($con,$im33);
    $img33=mysqli_fetch_assoc($imgs33);
  
    if(mysqli_num_rows($sqldata33)>0){
        while  ($datarow33=mysqli_fetch_assoc($sqldata33)){
            ?>
                 
                            <div class="vid33 <?=$datarow3['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<?=$datarow33['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow33['std_show']?>views <?=$datarow33['time']?></code> <?=$datarow33['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                    
                        </div>

                      

                     </div>                                                     
                    </div>
            




          </div>
          <div id="msg-4" class="container msg-4">
                <h1>C</h1>
          </div>
          <div id="msg-5" class="container msg-5">
                <h1>D</h1>
          </div>
          <!-- <div class="container">
            <section id="home" class="section">Home</section>
            <section id="about" class="section">About</section>
            <section id="gallery" class="section">Gallery</section>
            <section id="portfolio" class="section">Portfolio</section>
            <section id="contact" class="section">Contact</section>
          </div> -->
        
        </div>

      </div>
    </div>
  </div>
</div>







  <div class="container mt-3">

<div class="row">
<div class="col-md-6">
          <div class="container-fluid  bg-light">

          </div>
      </div>
      <div class="col-md-3">

      </div>
      <div class="col-md-3">

      </div>

</div>
    

  </div>


    

<script>
    $date = "jan 27, 2022 00:00:00";
    const date=$date;
  let countDate = new Date(date).getTime();

function countDown(){
    let now = new Date().getTime();
    gap = countDate - now;

    let second = 1000;
    let minute =  second * 60;
    let hour = minute * 60;
    let day = hour * 24;

    let d = Math.floor(gap / (day));
    let h = Math.floor((gap % (day)) / (hour));
    let m = Math.floor((gap % (hour)) / (minute));
    let s = Math.floor((gap % (minute)) / (second));
    
    document.getElementById('day').innerText = d;
    document.getElementById('hour').innerText = h;
    document.getElementById('minute').innerText = m;
    document.getElementById('second').innerText = s;
    
}

setInterval(function(){
    countDown();
},1000)
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-1').click(function(){
            $('.msssg-2').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-2').click(function(){
            $('.msssg-1').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-3').click(function(){
            $('.msssg-1').css('display','none');
            $('.msssg-2').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-4').click(function(){
            $('.msssg-2').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-1').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-5').click(function(){
            $('.msssg-1').css('display','none');
            $('.msssg-2').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','block'); 
        });
    });
</script>


  <script type="text/javascript">
    $(document).ready(function(){
        $('.btn-1').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-2').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-3').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-4').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-1').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-5').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','block'); 
        });
    });
</script>




<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-1').click(function(){
            $('.mssg-2').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-2').click(function(){
            $('.mssg-1').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-3').click(function(){
            $('.mssg-1').css('display','none');
            $('.mssg-2').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-4').click(function(){
            $('.mssg-2').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-1').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-5').click(function(){
            $('.mssg-1').css('display','none');
            $('.mssg-2').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','block'); 
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-1').click(function(){
            $('.mg-2').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-2').click(function(){
            $('.mg-1').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-3').click(function(){
            $('.mg-1').css('display','none');
            $('.mg-2').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-4').click(function(){
            $('.mg-2').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-1').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-5').click(function(){
            $('.mg-1').css('display','none');
            $('.mg-2').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','block'); 
        });
    });
</script>


<script>
  let listVideo = document.querySelectorAll('.video-list .vid2');
  let mainVideo = document.querySelector('.main-video iframe');
  let title = document.querySelector('.main-video .title');
  
  listVideo.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo.forEach(vid2 => vid2.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src = iframe.children[0].getAttribute('src');
        mainVideo.src = src;
        let text = iframe.children[1].innerHTML;
        title.innerHTML = text;
      }
    };
  });
</script>


<!-- video a -->

<script>
  let listVideo3 = document.querySelectorAll('.video-list3 .vid3');
  let mainVideo3 = document.querySelector('.main-video3 iframe');
  let title3 = document.querySelector('.main-video3 .title');
  
  listVideo3.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo3.forEach(vid3 => vid3.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src3 = iframe.children[0].getAttribute('src');
        mainVideo3.src = src3;
        let text3 = iframe.children[1].innerHTML;
        title3.innerHTML = text3;
      }
    };
  });
</script>

<!-- video ab -->

<script>
  let listVideo33 = document.querySelectorAll('.video-list33 .vid33');
  let mainVideo33 = document.querySelector('.main-video33 iframe');
  let title33 = document.querySelector('.main-video33 .title');
  
  listVideo33.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo33.forEach(vid33 => vid33.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src33 = iframe.children[0].getAttribute('src');
        mainVideo33.src = src33;
        let text33 = iframe.children[1].innerHTML;
        title33.innerHTML = text33;
      }
    };
  });
</script>

<!-- video ac -->

<script>
  let listVideo34 = document.querySelectorAll('.video-list34 .vid34');
  let mainVideo34 = document.querySelector('.main-video34 iframe');
  let title34 = document.querySelector('.main-video34 .title');
  
  listVideo34.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo34.forEach(vid34 => vid34.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src34 = iframe.children[0].getAttribute('src');
        mainVideo34.src = src34;
        let text34 = iframe.children[1].innerHTML;
        title34.innerHTML = text34;
      }
    };
  });
</script>

<!-- pic gallery -->


<script>
  let listImage = document.querySelectorAll('.smallimg');
  let mainImage = document.querySelector('.feature-img img');
  let TitleImg = document.querySelector('.feature-img .titleimg');
  
  listImage.forEach(img =>{
    img.onclick = () =>{
      listImage.forEach(smallimg => smallimg.classList.remove('active'));
      img.classList.add('active');
      if(img.classList.contains('active')){
        let srcf = img.children[0].getAttribute('src');
        mainImage.src = srcf;
        let textf = img.children[1].innerHTML;
        TitleImg.innerHTML = textf;
      }
    };
  });
</script>


<!-- get data from database -->


<script>
  $(document).ready(function(){
    $('#getdisplaydata1').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata1.php',
        data: 'farhad=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#response1').html(responsedata);
        }
      });
    // }
    });
  });
</script>
<script>
  $(document).ready(function(){
    // $('#getdisplaydata1').click(function(){
      getdisplaydata1();
      function getdisplaydata1(){
      $.ajax({
        url:'getdata1.php',
        data: 'farhad=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#response1').html(responsedata);
        }
      });
    }
    // });
  });
</script>
<script>
  $(document).ready(function(){
    $(document).on('click','.load1',function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata1.php',
        data: 'farhad=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#response1').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('#qutebtn').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata2.php',
        data: 'farhad2=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#gallery_data').html(responsedata);
        }
      });
    // }
    });
  });
</script>
<!-- video -->

<script>
  $(document).ready(function(){
    $('#video1btn').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata3.php',
        data: 'farhad3=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#video1_data').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<!-- user #cv -->

<script>
  $(document).ready(function(){
    $('#u_about').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata4.php',
        data: 'farhad4=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#u_exp').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('#u_about').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata5.php',
        data: 'farhad5=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#u_edu').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<script>
  
  function love_update(id){
      
      jQuery.ajax({
        url:'update_love_upost.php',
        type:'post',
        data:'type=love&id='+id,
        success:function(result){
          var cur_count=jQuery('#love_loop_'+id).html();
          cur_count++;
          jQuery('#love_loop_'+id).html(cur_count);
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

    function like_update(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=like&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loop_'+id).html();
         cur_count++;
         jQuery('#like_loop_'+id).html(cur_count);
       }
     })
   }


   function dislike_update(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=dislike&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loop_'+id).html();
         cur_count++;
         jQuery('#dislike_loop_'+id).html(cur_count);
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
       }
     })
   }

</script>



<!-- comment love like dislike update javascrit -->


<script>
  
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



<!-- comment javascript end  -->




<script>
  $(document).ready(function(){
    $(document).on('click','.add_comment_btn', function(){

      var post_id = $(this).attr('id');

      var msg = $('#cmnt_text'+post_id).val();

      var uid = $('#farhadf').val();


      if($.trim(msg).length == 0){
        error_msg = alert("Please type comment!");
        $('#error_status').text(error_msg);
      }else{
        error_msg = "";
        $('#error_status').text(error_msg);
      }
      if(error_msg != ''){
        return false;
      }else{
        $.ajax({
              url:'getdata6.php',
              type:'post',
              data: {
                comment_msg: msg,
                post_id: post_id,
                uuid: uid,
                posta: true,
              },
              success: function(response){
                $('#error_status').html(response);
                alert(response); 

              }
            });
      }



    });
  });
</script>

<script>
  $(document).ready(function(){
    $(document).on('click', '.comment_view_main', function(){
      var post_iid = $(this).attr('id');

      $.ajax({
              url:'getdata6.php',
              type:'post',
              data: {
                post_iid: post_iid,
                postaa: true,
              },
              success:function(responsedata){
                $('#loadComment'+post_iid).html(responsedata);
              }
            });


    })
  });
</script>


<script>

function like_updateq(id){
     
     jQuery.ajax({
       url:'qute_love.php',
       type:'post',
       data:'type=likeq&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loopq_'+id).html();
         cur_count++;
         jQuery('#like_loopq_'+id).html(cur_count);
       }
     })
   }


   function dislike_updateq(id){
     
     jQuery.ajax({
       url:'qute_love.php',
       type:'post',
       data:'type=dislikeq&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loopq_'+id).html();
         cur_count++;
         jQuery('#dislike_loopq_'+id).html(cur_count);
       }
     })
   }


</script>  



<!-- swap -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="user.js"></script>
<!-- swap -->


<script src="jsnav/bootstrap.bundle.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert.min.js"></script>
  </body>
</html>
