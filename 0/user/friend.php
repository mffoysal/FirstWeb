<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location:../login.php');
  }

  $s="";
  if(isset($_REQUEST['success'])){
    $s=$_REQUEST['success'];
  }

 
  include('../db.php');
      // $search="BREAKFAT";
      if(isset($_REQUEST['search'])){
          $search = $_REQUEST['search'];
          // $search = preg_replace("#[^0-9a-z]#i","",$search);
         
      }
  ?>
  

<?php
include('../db.php');

            
?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="stylesta.css"> -->
    <script src="../ck/ckeditor.js"></script>
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">

    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="../jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="../bootstrap.min.css">
    <!-- <script src="bootstrap.budle.js"></script> -->
    <style>
      *{
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}
/* body{
  font-family: montserrat;
} */
.nav1{
  /* background: #0082e6; */
  background-color: #ffe53b;
   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);
  height: 80px;
  width: 100%;
}
label.logo{
  color: white;
  font-size: 35px;
  line-height: 80px;
  padding: 0 100px;
  font-weight: bold;
}
.nav1 ul{
  float: right;
  margin-right: 20px;
}
.nav1 ul li{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
.nav1 ul li a{
  color: white;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-decoration:none;
  text-transform: uppercase;
}
a.active,a:hover{
  background: #1b9bff;
  transition: .5s;
}
.checkbtn{
  font-size: 30px;
  color: white;
  float: right;
  line-height: 80px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}
#check{
  display: none;
}
@media (max-width: 952px){
  label.logo{
    font-size: 30px;
    padding: 0 0px;
    margin-left: 10px;
  }
  .nav1 ul li a{
    font-size: 16px;
  }
}
@media (max-width: 858px){
  .checkbtn{
    display: block;
  }
  .nav1 ul{
    position: fixed;
    width: 100%;
    height: 100vh;
    /* background: #2c3e50; */
    background-color: #ffe53b;
   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  .nav1 ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  .nav1 ul li a{
    font-size: 20px;
  }
  a:hover,a.active{
    background: none;
    color: #0082e6;
  }
  #check:checked ~ ul{
    left: 0;
  }
}
/* section{
  background: url(bg1.jpg) no-repeat;
  background-size: cover;
  height: calc(100vh - 80px);
} */




.notifi-item {
	display: flex;
	border-bottom: 1px solid #eee;
  border-radius: 10% ;
	padding: 15px 5px;
	margin-bottom: 15px;
	cursor: pointer;
  background-color: black;
  margin-top:5px;
  height:170px;

}
.notifi-item:hover {
	background-color: #eee;
}
.notifi-item img {
	display: block;
	width: 100px;
  margin-right: 10px;

	border-radius: 50%;
}
.notifi-item .text h4 {
	color: #777;
	font-size: 16px;
	margin-top: 10px;
}
.notifi-item .text p {
	color: #aaa;
	font-size: 12px;
}


.msg{
        background: cyan;
        position: fixed;
        bottom: 5%;
        left:10px;
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

    </style>
  </head>
  <body class="bg-dark">
    
<!-- nav -->
<nav class="nav1">
      <input type="checkbox" id="check">
      <label style="margin-right:8px" for="check" class="checkbtn">
        <i class="bi bi-list"></i>
      </label>
      <label style="margin-left:-10px" class="logo">
      <span style="margin-right:-15px" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#allsetting" aria-controls="allsetting" aria-expanded="false" aria-label="Toggle navigation">
                          <img style="border-radius:50%; margin-top:-15px" src="<?php 
                          if(isset($_SESSION['img'])){
                            echo "../image/".$_SESSION['img'];
                          }else{
                            echo "img/avatar3.png";
                          }
                          ?>" width="50px" height="50px" alt="">
                       </span>EdUFriend</label>
      <ul>
        <li><?php if(isset($_SESSION['name'])){
          echo '<a style="" class="active" href="../login.php">'.$_SESSION['name'].'</a>';
          // echo $_SESSION['name']; 
        }else{
          echo '<a style="" class="active" href="index.php">Home</a>';
        } ?></li>

        <li><a href="../login.php">Your Dashboard</a></li>
        <li><a href="#" ><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#yourpost">Your POST</button></a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </nav>



                  <!-- <nav style="width:80px; border-radius:50%" class="navbar navbar-dark w-15 bg-info"> -->
                    <!-- <div class=""> -->
                      <!-- <span class="navbar-toggler w-15" data-bs-toggle="collapse" data-bs-target="#allsetting" aria-controls="allsetting" aria-expanded="false" aria-label="Toggle navigation">
                          <img style="border-radius:50%" src="img/avatar3.png" width="50px" height="50px" alt="">
                       </span>
                      -->
                    <!-- </div> -->
                  <!-- </nav> -->
                  <div class="collapse" id="allsetting">
                    <div class="bg-dark p-4">

                    <span class="text-muted">Student Part</span>

                   
                    <span class="text-muted">Teacher Part</span>

                    <a href="mentorpost.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">মেন্টর পোষ্ট</button></a>
                    <a href="tutoraccept.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">স্টুডেন্ট রিকোয়েস্ট</button></a>
                    <a href="my_student.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">ছাত্র-ছাত্রী</button></a>

                      <span class="text-muted">Student & Teacher Part</span>
                    </div>
                    </div>







    <!-- <div class="container"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#post">MY POST</button></div> -->
    <div class="container text-center m-auto">
    <!-- <h6 style="margin:0 auto" class="bg-dark m-auto text-warning"><?=$s;?></h6> -->
    </div>
 
<div style="border: 0px solid black; border-radius:10px" class="container text-center mt-5 border-primary  rounded shadow-lg m-auto">



<h6 style="margin:0 auto" class="bg-dark m-auto text-warning"><?=$s;?></h6>

       <div class="row">
         <div style="border: 2px solid black; border-radius:10px" class="col-md-2 border">

                <div class="col mt-2">
                    <a href="request.php"><button type="button" class="btn btn-outline-success mt-2 w-100">Request</button></a>
                    <a href="index.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">All Users</button></a>

                    <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                      <button class="btn btn-outline-danger navbar-toggler w-100" type="button" data-bs-toggle="collapse" data-bs-target="#allusersetting" aria-controls="allusersetting" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                  </nav>
                  <div class="collapse" id="allusersetting">
                    <div class="bg-dark p-4">
                    <a href="mess.php"><button type="button" class="btn btn-outline-info mt-2 w-100"> Mess</button></a>
                    <a href="course.php"><button type="button" class="btn btn-outline-info mt-2 w-100">My Course</button></a>
                    <a href="tutor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">ALL TuTor</button></a>
                    <a href="mentor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">Tutor Post</button></a>
                    <span class="text-muted">Student Part</span>

                    <a href="myrequest.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">My Request</button></a>
                    <a href="allstudent.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">ALL Student</button></a>
                    <a href="studentpost.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">Student Post</button></a>

                    <span class="text-muted">Teacher Part</span>

                    <a href="mentorpost.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">মেন্টর পোষ্ট</button></a>
                    <a href="tutoraccept.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">স্টুডেন্ট রিকোয়েস্ট</button></a>
                    <a href="my_student.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">ছাত্র-ছাত্রী</button></a>

                      <span class="text-muted">Student & Teacher Part</span>
                    </div>
                    </div>





                </div>
            
         </div>
         <div style="border: 2px solid black; border-radius:10px" class="col border-danger">
            <div class="row">

                  <!--             
                  <div style="border: 1px solid black; border-radious:10px" class="col-md-6 border-info">                              
                    <div class="notifi-item">
                      <img style="padding-top:0px" class="d-inline" src="../image/<?= $row['img']?>" alt="img">
                      <div class="text">
                        <h4><?= $row['name']?></h4>
                        <p>@<?= $row['district'].', '.$row['upazila'].', '.$row['unions']?></p>
                      </div>
                      <div class="text text-center m-auto">
                        <button type="button" class="btn btn-outline-info d-block w-100">PROFILE</button>
                        <button type="button" class="btn btn-outline-primary d-block w-100">ADD</button>
                      </div>
                    </div>    
                    </div> -->

            <!-- <div style="border: 1px solid black; border-radious:10px" class="col-md-6 border-info">         
                    <div class="notifi-item">
                      <img style="padding-top:0px" class="d-inline" src="img/avatar2.png" alt="img">
                      <div class="text">
                        <h4>Elias Abdurrahman</h4>
                        <p>@lorem ipsum dolor sit amet</p>
                      </div>
                      <div class="text text-center m-auto">
                        <button type="button" class="btn btn-outline-info d-block w-100">PROFILE</button>
                        <button type="button" class="btn btn-outline-primary d-block w-100">ADD</button>
                      </div>
                    </div>         
            </div> -->

            <?php
            if(isset($_SESSION['unique_id'])){
                  $from_id=$_SESSION['unique_id'];
              }else{
                $from_id="";
              }
                //   $queryfriend = "SELECT * FROM friends WHERE from_id='$from_id' AND status='Confirm'";
                //   $queryfresult= mysqli_query($con,$queryfriend);
                //   $queryfriendrow=mysqli_fetch_assoc($queryfresult);
                //   if(mysqli_num_rows($queryfresult)>0){
                //       $rowfriend=$queryfriendrow['to_id'];
                //   }else{
                //       $rowfriend="837706146";
                //   }

                  $queryuser2="SELECT * FROM fnd WHERE  status='Confirm' AND from_id='$from_id'";
                  $queryuresult2=mysqli_query($con,$queryuser2);
                  $cont2 = mysqli_num_rows($queryuresult2);
                 
                  

                  while($row2 =mysqli_fetch_assoc($queryuresult2)):
                    ?>
                        <?php
                            $fq="SELECT * FROM users WHERE unique_id='$row2[to_id]'";
                            $fqr=mysqli_query($con,$fq);
                            $rowf=mysqli_fetch_assoc($fqr);
                        ?>
                    <div style="border: 1px solid black; border-radious:10px" class="col-md-6 border-info">
                                
                    <div class="notifi-item">
                      <?php if($rowf['img']!=''){
                        echo '<img style="padding-top:0px" class="d-inline" src="../image/'.$rowf['img'].'" alt="img">';
                      }else{
                        echo '<img style="padding-top:0px" class="d-inline" src="img/avatar2.png" alt="img">';
                      } ?>
                      <div class="text">

                      <?php if($rowf['name']!=''){
                        echo "<h4>".$rowf['name']."</h4>";
                      }else{
                        echo "<h4>Username</h4>";
                      } ?>

                      <?php if($rowf['district']==''){
                        $row['district'] ="userDistrict";
                      } ?>
                      <?php if($rowf['upazila']==''){
                        $row['upazila'] ="Upazila";
                      } ?>
                      <?php if($rowf['unions']==''){
                        $row['unions'] ="Union";
                      } ?>
                       

                        <p>@<?= $rowf['district'].', '.$rowf['upazila'].', '.$rowf['unions']?></p>
                        <!-- <span class="text-center text-danger"><a style="text-decoration:none; color;red" href="user.php?unique_id=<?=$row2['to_id']?>">PROFILE DETAILS</a></span> -->
                        <span class="text-center text-danger"><a style="text-decoration:none; color;red" class='text-warning' href="user.php?unique_id=<?=$row2['to_id']?>">PROFILE <span class="text-uppercase text-danger"><?=$rowf['actype']?></span></a></span>
                      
                      </div>
                      <div class="text text-center m-auto">
                      <button type="button" class="btn btn-outline-info d-block w-100">PROFILE</button>
                    <?php
                      if(isset($_SESSION['unique_id'])){
                       echo '<a style="text-decoration:none" href="../farhad/chat.php?user_id='.$row2['to_id'].'"><button type="submit" name="addfriend" class="btn btn-outline-primary d-block w-100"><span class="bi bi-messenger"> Friend</span></button></a>';
                      }
                      ?>
                
                      </div>
                    </div>    

                    </div>

                  <?php
                  endwhile;
                  ?>





            </div>
         </div>
       </div>
</div>


      <!-- post -->
<?php
$res_message=mysqli_query($con,"select users.name,messages.msg,messages.incoming_msg_id from messages,users where messages.status=0 and messages.outgoing_msg_id='$_SESSION[unique_id]' and users.unique_id=messages.incoming_msg_id");
$unread_count=mysqli_num_rows($res_message);

$sql_user="select unique_id,name from users order by name asc";
$res_user=mysqli_query($con,$sql_user);
?>

<div id="" class="text-center"> 
<button id="msg" class="msg" type="button" data-bs-toggle="modal" data-bs-target="#contactmsg">
    <span class="bi bi-messenger position-relative"></span>
    <span id="notifications_counter" style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle bg-danger"><?=$unread_count?></span>
<span class="visually-hidden">U</span></span>
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="contactmsg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Contact Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="border: 0px solid black; border-radius:10px" class="container text-center mt-2 border-primary  rounded shadow-lg m-auto">
                  <div class="row">

                         <img src="" class="card-img" alt="">
                         <?php if($unread_count>0){
                                while($row_message=mysqli_fetch_assoc($res_message)){?>
                    <div class="col-md-6">
                      <div class="card">
                                  <div class="card-header bg-warning"><strong><?php echo $row_message['name']?></strong></div>

                                  <div class="card-body"> <p><?php echo $row_message['msg']?></p></div>
                      </div>
                      <div class="card-footer bg-dark">
                                 <a style="text-decoration:none" href="../farhad/chat.php?user_id=<?=$row_message['incoming_msg_id']?>"><button class="btn btn-outline-info"><span class="bi bi-messenger"></span> Reply</button></a>
                      </div>
                    </div>
                              <?php } } ?>
                         

                  </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<script>
      $(document).ready(function () {
          $('#msg').click(function () {
              jQuery.ajax({
				url:'update_message_status.php',
				success:function(){
					$('#contactmsg').fadeToggle('fast', 'linear');
					$('#notifications_counter').fadeOut('slow');
				}
			  })
              return false;
          });
          $(document).click(function () {
              // $('#contactmsg').fadeIn('slow'); 
          });
      });
   </script>

<!-- Modal -->

  </body>
</html>
