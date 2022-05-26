<?php
  session_start();

?>
<?php
include('../db.php');

            
          ?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Responsive Navbar</title>
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
    padding-left: 50px;
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
    /* background: #2c3e50; */
    background-color: #ffe53b;
   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);
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
        <li><?php if(isset($_SESSION['name'])){
          echo '<a style="" class="active" href="../login.php">'.$_SESSION['name'].'</a>';
          // echo $_SESSION['name']; 
        }else{
          echo '<a style="" class="active" href="index.php">Home</a>';
        } ?></li>

        <li><a href="login.php">Your Dashboard</a></li>
        <li><a href="#" ><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#yourpost">Your POST</button></a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </nav>
<!-- nav -->


    <!-- <div class="container"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#post">MY POST</button></div> -->
<div style="border: 2px solid black; border-radious:10px" class="container text-center mt-5 border-warning  rounded shadow-lg m-auto">
       <div class="row">
         <div class="col">
           <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum beatae illo consequuntur natus enim reprehenderit qui soluta ullam nobis iure?</p>
         </div>
         <div class="col">
           <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum beatae illo consequuntur natus enim reprehenderit qui soluta ullam nobis iure?</p>
         </div>
       </div>
</div>


      <!-- post -->


  </body>
</html>
