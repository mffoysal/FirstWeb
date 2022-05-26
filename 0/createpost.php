<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location:login.php');
  }

?>
<?php
include('db.php');
          $iddd=$_SESSION['unique_id'];
            $querypost = "SELECT * FROM post WHERE unique_id='$iddd' ";
            $resultp = mysqli_query($con,$querypost);
            // $countpost = mysqli_num_rows($resultpost);
            
          ?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Responsive Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="icon/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="stylesta.css"> -->
    <script src="ck/ckeditor.js"></script>
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="f/admin/ckeditor/ckeditor.js"></script>
    <script src="ck/ckeditor.js"></script>
    <script src="jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="bootstrap.min.css">
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
nav{
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
nav ul{
  float: right;
  margin-right: 20px;
}
nav ul li{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
nav ul li a{
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
  nav ul li a{
    font-size: 16px;
  }
}
@media (max-width: 858px){
  .checkbtn{
    display: block;
  }
  ul{
    position: fixed;
    width: 100%;
    height: 100vh;
    background: #2c3e50;
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  nav ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  nav ul li a{
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

    </style>
  </head>
  <body>
    
<!-- nav -->
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="bi bi-list"></i>
      </label>
      <label class="logo">EdULearn</label>
      <ul>
        <li><a style="" class="active" href="login.php"><?=$_SESSION['name']?></a></li>

        <li><a href="login.php">Your Dashboard</a></li>
        <li><a href="#" ><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#yourpost">Your POST</button></a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </nav>
<!-- nav -->


    <!-- <div class="container"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#post">MY POST</button></div> -->
      <div style="border: 2px solid black; border-radious:10px" class="container text-center mt-5 border-warning  rounded shadow-lg m-auto">
        <form action="postaction.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="unid" value="<?= $_SESSION['unique_id']?>">
          
        <div class="form-control">
        <label for="">Create a new post</label>
      <textarea id="createpost" name="crpost" class="ckeditor form-control" contentwirteble="true" row="" placeholder="What's on your mind, Edulearner?"  required></textarea>
      
      </div>
      <div class="field image form-control">
                                                            <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imga"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                                            <input style="display:none" type="file" onchange="getImg(this.value)" name="postimage" class="form-control" id="imga" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                                            <div style="color:red" class="btn btn-outline-info" id="displayimage"></div>
                                                            </div>
                                                            <br>
                                                            <div class="field button">
                                                            <div class="form-floating">
                                                            <input type="text" class="form-control"  name="posth" value="<?= $_SESSION['name']?> Type-Header">
                                                            <label for="">POst Subject</label>
                                                            </div>
                                                            <br>
                                                            <input type="submit" class="btn btn-info submittwo" name="postsave" value="Create Post">
      </div>      
      

            <script>
              CKEDITOR.replace('createpost', {
                // height:300,
                extraPlugin:'filebrowser',
                filebrowserBrowsUrl:'brows.php',
                filebrowserUploadMethod:"form",
                filebrowserUploadUrl:"upload.php",
              });
            </script>
            <script>
                                                                function getImg(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#displayimage').html(newimg);
                                                                }
            </script>
      </div>
    

      

      <!-- post -->

      <div class="modal fade" id="yourpost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Your Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-secondary">
        <div class="container bg-secondary m-auto">
              <div class="text-center m-auto">
          <?php 
            while($rowpost=mysqli_fetch_array($resultp)):
              ?>

                <div class="col-md">
                    <div class="bg-transparent mt-2 shadow-lg text-center p-3 mb-5 bg-body rounded h-100">
                      <div class="card bg-transparent border-danger text-white h-100">
                        <div class="card-header bg-info"><p><?=$rowpost['header']?></p></div>
                        <?php
                          if($rowpost['img']!=''){
                            echo '<img style="height: 225px" class="card-img text-dark" src="image/'.$rowpost["img"].'" alt="">';
                          }
                        ?>
                        <div style="background:gray" class="card-body">
                            <h5><?= $rowpost['text']?></h5>
                        </div>
                        <div class="card-footer bg-success">
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#postup<?=$rowpost['id']?>"><span class="muted"><?= $rowpost['time']?> | Update | Delete</span></button>
                        </div>
                      </div>
                    </div>
                </div>

                <!-- Modal -->
<div class="modal fade" id="postup<?=$rowpost['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">UPADETE YOUR POST</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="updatepost.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="did" class="form-control" value="<?=$rowpost['id']?>">   
        <input type="hidden" name="imgold" class="form-control" value="<?=$rowpost['img']?>">   
        <input type="submit" class="btn btn-danger" name="deletepost" value="Delete This Post">   

      </form>
      <form action="updatepost.php" method="POST" enctype="multipart/form-data">
      <div class="field image form-control">
                        <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="img3"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                        <input style="display:none" type="file" onchange="getImageup(this.value)" name="upimg" class="form-control" id="img3" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                        <div style="color:red" class="btn btn-outline-info" id="display-image3"></div>
                        </div>
        
        <script>
                                                                function getImageup(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#display-image3').html(newimg);
                                                                }
                                                        </script>
              <input type="hidden" name="unid" value="<?=$rowpost['id']?>">
              <input type="hidden" name="unidimg" value="<?=$rowpost['img']?>">
              <div class="form-floating">
              <input type="text" class="form-control" name="uph" value="<?=$rowpost['header']?>">  
              <label for="">Update Header</label>
              </div>
              <br>
              <textarea id="uppost" type="text" name="updata" class="ckeditor form-control" value="<?=$rowpost['text']?>"> </textarea>
              <input name="updatepost" class="btn btn-warning" type="submit" value="Update">

              <script>
              CKEDITOR.replace('uppost', {
                height:300,
                filebrowserUploadUrl:"upload.php",
              });
            </script>
              
     
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatepost" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


           <?php endwhile ?>
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>


      <!-- post -->


  </body>
</html>
