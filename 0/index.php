
<!--  -->
<?php
session_start();
include('db.php');
$errorp='';
if(isset($_REQUEST['error'])){
    $errorp = $_REQUEST['error'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDuLearn | Ecom Online </title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="css/bounc.css"> -->
    <link rel="stylesheet" href="css/bounc.js">
    <!-- <link rel="stylesheet" href="js/bootstrap.bundle.min.js"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
    
    

    
    <style>

    html {
         scroll-behavior: smooth;
    }
        .body{
    background: ghostwhite;
    margin: 0;
    box-sizing: border-box;
    }
    .navmain{
        background-color: #ffe53b;
   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);
    }
    #seab{
        display:none;
        background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%));
    }
    #sea:hover #seab{
        display:inline;
        border: 3px solid white;   
    }
    #loader{
        /* display: ; */
    }
    #content{
       /* display:none; */
    }
    /* start scroll */

    .to-top{
        background: cyan;
        position: fixed;
        bottom: 16px;
        right:10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size:32px;
        color:#1f1f1f;
        opacity:0;
        pointer-events: none;
        transition:all 0.4s;
    }
    .to-top.active {
        bottom:35px;
        pointer-events:auto;
        opacity:1;

    }

    /* scroll end */

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
    #content{
        /* background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%)); */
        /* background-color: #ffe53b; */
   /* background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%); */
   /* background: linear-gradient(to right, hsl(120, 100%, 50%), hsl(190, 88%, 68%)); */

   background: linear-gradient(to right, hsla(190, 90%, 93%, 0.808), hsla(790, 73%, 93%, 0.808));
   /* background: linear-gradient(to right, hsla(190, 33%, 93%, 0.808), hsla(190, 33%, 93%, 0.808)); */

    }

    #content:hover{
        background: ghostwhite;
    }
   
    @keyframes mff{
    0%{

    } 25%{
        border-color: chartreuse;
        bottom: 10%;

    }
    30%{
        bottom: 13%;
    } 35%{
        bottom: 16%;
    }
    40%{
        bottom: 20%;
    }
    45%{
        bottom: 23%;
    }
    50%{
        transform: rotate(-180deg);
        background-color: teal;
        border-radius: 30%;
        bottom: 26%;
    }
    60%{
        bottom: 30%;
    }
    70%{
        transform: rotate(80deg);
        background-color: violet;
        border-radius: 15%;
        opacity: 0.8;
        bottom: 33%;
    }
    75%{
        border-color: darkblue;
        bottom: 36%;
    }
    80%{
        bottom: 39%;
    }
    85%{
        bottom: 42%;
    }
    90%{
        border-color: teal;
       bottom: 45%
    }    
    100%{
        border-radius: 50%;
        

    }
}

    /* msg end */

    /* start preload */

    /* end pre load */

    .navbar:hover{
        background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%));
    }

    </style>

    
</head>
<body style="padding:5px" class="index" onload="myFunction()">

    <!-- nav bar start -->


        
<nav class="navbar navbar-expand-md navbar-light bg-warning sticky navmain">
    <div class="container-fluid">
       
    <a class="navbar-brand" href="javascript:void()"><span ></span> <img class="rounded-circle" src="
    <?php
    if(isset($_SESSION['img'])){
        echo 'image/'.$_SESSION['img'];
    }else {
        echo 'image/bg.jpg';
    }
    ?>" alt="" width="40" height="40"> EDULEARN</a>
    <a style="text-decoration:none" href="login.php"><button class="btn btn-outline-dark"><span class="bi bi-door-ope-fill"></span>Login</button></a>
    <a style="text-decoration:none" href="new.php"><button class="btn btn-outline-light m-2"><span class="bi bi-plus-squar-fill"></span>SignUP</button></a>

    <span></span>
    <!-- <a style="text-decoration:none" href="signup.php"><button class="btn btn-outline-light m-2"><span class="bi bi-plus-square-fill"></span>A/C2</button></a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu">
        <span class="navbar-toggler-icon" ></span>
    </button>
    
    <div class="collapse navbar-collapse" id="main_menu" >
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a style="text-decoration:none" href="signup.php"><button class="btn btn-outline-light m-2"><span class="bi bi-plus-squar-fill"></span>SignUP</button></a></li>
            <li class="nav-item"><a class="nav-link active" href="index.php"><button type="button" class="btn btn-outline-dark">Home</button></a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"  href=""><button type="button" class="btn btn-outline-dark">CATEGORY</button></a>
                    <ul class="dropdown-menu">

                        <!-- category id -->

                        <?php
        
                                    // $con = new mysqli('localhost', 'root', '', 'foysal');

                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    } 


                                        $sql="select * from category order by categoryid asc limit 1";
                                        $fquery=$con->query($sql);
                                        $frow=$fquery->fetch_array();
                                        ?>
                                            <li class="active"><a style="color:red" class="dropdown-item"  href="index.php?cat=<?php echo $frow['catname'] ?>"><span class="btn btn-secondary"><span class="btn btn-info bi bi-bookmark-heart-fill"></span> <span class="btn btn-primary"><?php echo $frow['catname'] ?></span></a></li>
                                        <?php

                                        $sql="select * from category order by categoryid asc";
                                        $nquery=$con->query($sql);
                                        $num=$nquery->num_rows-1;

                                        $sql="select * from category order by categoryid asc limit 1, $num";
                                        $query=$con->query($sql);
                                        while($row=$query->fetch_array()){
                                            ?>
                                            <li class=""><a class="dropdown-item"  href="index.php?cat=<?php echo $row['catname'] ?>"><span class="btn btn-info"><span class="btn btn-danger bi bi-bookmarks-fill"></span> <span class="btn btn-warning"><?php echo $row['catname'] ?></span></a></li>
                                            <?php
                                        }
                                        
                                        if(isset($_REQUEST['cat'])){
                                            $_SESSION['cate'] = $_REQUEST['cat'];
                                        }
                                    ?>

                        <!-- category id -->

                        <!-- <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li> -->
                    </ul>
            </li>
            <li class="nav-item"><a class="nav-link"  href="clock/about.html"><button type="button" class="btn btn-outline-dark">About</button></a></li>
            <li class="nav-item"><a class="nav-link"  href=""><button type="button" class="btn btn-outline-dark">Gallery</button></a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"  href=""><button type="button" class="btn btn-outline-dark">MENU-খাবার</button></a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="clock/calculator.html">CALCULATOR</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="clock/clock.html">Time</a></li>
                        <li><a class="dropdown-item" href="">2</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">3</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">3</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">3</a></li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"  href=""><button type="button" class="btn btn-outline-dark">Service</button></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="clock/calculator.html">CALCULATOR</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="clock/clock.html">Time</a></li>
                        <li><a class="dropdown-item" href="">2</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">3</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">3</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">3</a></li>
                        <li><hr class="dropdown-divider"></li>
                  
                    </ul>
            </li>
            <!-- <li class="nav-item"><a class="nav-link"  href=""><button type="button" class="btn btn-outline-dark">Contact</button></a></li> -->
        </ul>
    </div>
    <form action="index.php" method="POST" class="d-flex pull-right">
        <input type="search" placeholder="Start typing for..." name="search" class="form-control me-2">
        <button type="submit" class="btn btn-danger"><span class="bi bi-search"></span></button>
    </form>
    </div>

</nav>



    <!-- nav bar end -->






<!-- star preloader -->


<h3 class="text-center shadow-lg p-1 bg light m-auto"><?php echo $errorp; ?></h3>
<div id="loader">

<?php include('preloader.php');?>

</div>


<!-- end preloader -->

<div class="" id="content">



<div class="">

    

    <?php 

// session_start();
require 'mf.php';
require 'product.php';
include('cardmodal.php');


// include('cardmodal.php');

if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        foreach($_SESSION['Cart'] as $k => $item){
            if($item['id'] == $_GET['id']){
                unset($_SESSION['Cart'][$k]);
                echo '<script>alert("প্রোডকাক্ট পছন্দ তালিকা থেকে ডিলেট করতে চাচ্ছেন?!!!")</script>';
                echo '<script>location.replace("index.php")</script>';                
            }
        }
    }
}

if(isset($_GET['action'])){
    if($_GET['action'] =="clearall"){
        unset($_SESSION['Cart']);
        echo '<script>alert("আপনি পছন্দ তালিকা ডিলেট করতে চাচ্ছেন?!!!")</script>';
        echo '<script>location.replace("index.php")</script>';
    }
}

?>

<h3 class="text-center shadow-lg p-1 mb-2 mt-2 rounded-pill bg-light sticky w-75 m-auto sticky">নির্বাচিত পণ্য|<span class="bi bi-cart-check-fill"></span> : <span style="border: 1px solid white; border-radius:50%" class='bg-white w-25 text-danger'> <button type="button" class="btn btn-info position-relative rounded-pill" data-bs-toggle="modal" data-bs-target="#cart"><span class="bi bi-bag-plus-fill"></span> : <span class="badge bg-dark"><?php   

if(isset(($_SESSION['Cart']))){
echo count($_SESSION['Cart']);

// echo '<script>alert("Item Already Added")</script>';
// echo '<script>window.location="index.php"</script>';
}

?></span> </span> View Cart <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"><?php if(isset(($_SESSION['Cart']))){
    echo count($_SESSION['Cart']);
    } ?></span>
<span class="visually-hidden">U</span></button> | <button type="button" class="btn btn-success position-relative rounded-pill" data-bs-toggle="modal" data-bs-target="#cart3"><span class="bi bi-cart-check"></span> অর্ডার করুন  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"><?php if(isset(($_SESSION['Cart']))){
    echo count($_SESSION['Cart']);
    } ?></span>
<span class="visually-hidden">U</span> </button> | <a href="index.php?action=clearall"><button class="btn btn-danger rounded-circle"><span class="bi bi-trash"></span> Clear</button></a></h3>

<!-- category start -->
<div class="text-center"> 
<h1 class="head1 text-center"><span style="font-size:15px; color:red" class="text-center">আপনার প্রয়োজনীয় প্রোডাক্ট ক্যাটাগরি অনুযায়ী</span> <span class="bi bi-menu-button-wide-fill"></span> MENU <span style="font-size:15px; color:red">থেকে বেচে নিন এবং সহজে অর্ডার করুন</span>...</h1> 
<!-- <h1 class="page-header text-center"><span style="font-size:15px; color:red">আপনার প্রয়োজনীয় প্রোডাক্ট ক্যাটাগরি অনুযায়ী</span> <span class="bi bi-menu-button-wide-fill"></span> MENU <span style="font-size:15px; color:red">থেকে বেচে নিন এবং সহজে অর্ডার করুন</span></h1> -->
</div>	
    <div class="container text-center w-50">
        <form action="index.php" method="POST">
        <div style="border: 1px solid black; border-radius: 5px" id="sea" class="row text-center">
            <div style="display:inline" class="col text-center form-control d-inline">

                <input style="display:inline; color: brown;" id="" type="text" name="search" class="form-control d-inline form-floating" value="<?php  ?>" placeholder="সার্চ করুন">
            
                <!-- <label for="">Search</label> -->
            </div>    
            <div id="seab" style="background-color:" class="col form-control">
                <button style="display:inline; background-color:; text-align:center; width: 70px" type="submit" class="btn btn-outline-primary d-inline form-control" name="" ><span class="bi bi-search"></span></button>
            </div>    
            
        </div>
        </form>
    </div>

    <!-- <ul class="nav nav-tabs nav-fill"> -->
        <?php
        
        // $con = new mysqli('localhost', 'root', '', 'foysal');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } 


			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$con->query($sql);
			$frow=$fquery->fetch_array();
			?>
				<!-- <li class="nav-item active"><a style="color:red" class="nav-link"  href="index.php?cat=<?php echo $frow['catname'] ?>"><span class="btn btn-info bi bi-bookmark-heart-fill"></span> <?php echo $frow['catname'] ?></a></li> -->
			<?php

			$sql="select * from category order by categoryid asc";
			$nquery=$con->query($sql);
			$num=$nquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $num";
			$query=$con->query($sql);
			while($row=$query->fetch_array()){
				?>
				<!-- <li class="nav-item"><a class="nav-link"  href="index.php?cat=<?php echo $row['catname'] ?>"><span class="bi bi-bookmarks-fill"> <?php echo $row['catname'] ?></a></li> -->
				<?php
            }
            
            if(isset($_REQUEST['cat'])){
                $_SESSION['cate'] = $_REQUEST['cat'];
            }
		?>
    <!-- </ul> -->
    

<!-- test -->


<ul class="nav nav-tabs nav-fill">
       
			<li class="nav-item active"><a style="color:red" class="nav-link"  href="index.php?cat=BREAKFAST"><span class="btn btn-info bi bi-bookmark-heart-fill"></span> BREAKFAST</a></li>
		
            <li class="nav-item"><a class="nav-link"  href="index.php?cat=LUNCH"><span class="bi bi-bookmarks-fill"> LUNCH</a></li>
            <li class="nav-item"><a class="nav-link"  href="index.php?cat=AFFTERNOON"><span class="bi bi-bookmarks-fill"> AFFTERNOON~TEA</a></li>
			<li class="nav-item"><a class="nav-link"  href="index.php?cat=DINNER"><span class="bi bi-bookmarks-fill"> DINNER</a></li>
			<li class="nav-item"><a class="nav-link"  href="index.php?cat=IT"><span class="bi bi-bookmarks-fill"> IT</a></li>
            <!-- <li class="nav-item"><a class="nav-link"  href=""><span class="bi bi-bookmarks-fill"> EDUMF</a> -->
            
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"  href=""><span class="bi bi-list"> ক্যাটাগরি</a>
                    <ul class="dropdown-menu">

                        <!-- category id -->

                        <?php
        
                                    // $con = new mysqli('localhost', 'root', '', 'foysal');

                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    } 


                                        $sql="select * from category order by categoryid asc limit 1";
                                        $fquery=$con->query($sql);
                                        $frow=$fquery->fetch_array();
                                        ?>
                                            <li class="active"><a style="color:red" class="dropdown-item"  href="index.php?cat=<?php echo $frow['catname'] ?>"><span class="btn btn-secondary"><span class="btn btn-info bi bi-bookmark-heart-fill"></span> <span class="btn btn-primary"><?php echo $frow['catname'] ?></span></a></li>
                                        <?php

                                        $sql="select * from category order by categoryid asc";
                                        $nquery=$con->query($sql);
                                        $num=$nquery->num_rows-1;

                                        $sql="select * from category order by categoryid asc limit 1, $num";
                                        $query=$con->query($sql);
                                        while($row=$query->fetch_array()){
                                            ?>
                                            <li class=""><a class="dropdown-item"  href="index.php?cat=<?php echo $row['catname'] ?>"><span class="btn btn-info"><span class="btn btn-danger bi bi-bookmarks-fill"></span> <span class="btn btn-warning"><?php echo $row['catname'] ?></span></a></li>
                                            <?php
                                        }
                                        
                                        if(isset($_REQUEST['cat'])){
                                            $_SESSION['cate'] = $_REQUEST['cat'];
                                        }
                                    ?>

                        <!-- category id -->

                        <!-- <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>dropdown</li> -->
                    </ul>
            </li>

            </li>
		
	</ul>


<!-- test -->








<div class="container">
<nav aria-label="Page nvigation">
    <ul class="pagination">
        <li class=""><a href="" class="page-link  prev" ><span aria-hidden="true">&laquo;</span></a></li>
        <?php for($i=1;$i<=$pagi;$i++){
            $class='';
            if($current_page==$i){
                ?>
            <li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i?></a></li>
        <?php
        }else{
        ?>
        <li class="page-item"><a href="?start=<?php echo $i ?>" class="page-link"><?php echo $i?></a></li>
        <?php } ?>
        <?php }?>
        <li class=""><a href="" class="page-link  next" ><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
</nav>
</div>
<!-- animation text start-->
    <div class="head2div text-center"> 
    
        <h2 class="head2 text-center">হে আল্লাহ , আমাদেরকে দেখিয়ে দিন স্পষ্ট সোজা পথ ...............................................</h2>
    </div>
<!-- animation text end -->
<!-- category end -->

<div class="container">
    <div class="row">

        <?php 
            $data = phone();

            while($row = mysqli_fetch_assoc($data)){
                product($row['h_f_color'],$row['header'],$row['img'],$row['stylebc'],$row['body_off_color'],$row['title'],$row['details'],$row['link'],$row['details_value'],$row['price'],$row['time'],$row['id'],$row['footer'],$row['a_not_a'],$row['acive_color'],$row['off_value'],$row['img2'],$row['img3'],$row['img4']);
            }

            
            // product('image/gdsf.jpg','Xiomi Note 10 pro(M)','farhad foysal farid ahmed rojina..','30000');
            // product('image/','Xiomi Note 10 pro(M)','farhad foysal farid ahmed rojina..','30000');

        ?>

    </div>
</div>

<div class="container">
<nav aria-label="Page nvigation">
    <ul class="pagination">
        <li class=""><a href="" class="page-link  prev" ><span aria-hidden="true">&laquo;</span></a></li>
        <?php for($i=1;$i<=$pagi;$i++){
            $class='';
            if($current_page==$i){
                $class='active';
            }
            ?>
        <li class="page-item <?php echo $class ?>"><a href="?start=<?php echo $i ?>" class="page-link"><?php echo $i?></a></li>
        <?php }?>
        <li class=""><a href="" class="page-link  next" ><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
</nav>    

</div>



<div class="table-responsive">
<table class="table w-75 m-auto table-light table-hover table-striped table-borderd border-danger">
    <thead class="table-primary">
        <tr>
        <th>ITEM ID</th>
        <th>ITEM NAME</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
        <th>ACTION</th>
        <th>TOTAL</th>
        </tr>
    </thead>
        <?php if(isset($_SESSION['Cart'])) : ?>
            <?php foreach($_SESSION['Cart'] as $k=> $item) : ?>
    <tbody class="table-striped">
        <tr>
        <td><?php echo $item['id']; ?></td>
        <td><?php echo $item['name'].' * ['.$item['qnt'].']'; ?></td>
        <td><?php echo '৳  '.number_format($item['price'], 2).'/=    *    ['.$item['qnt'].']'; ?></td>
        <td><?php echo $item['qnt'].'টি'; ?></td>
        <td><a href="index.php?action=delete&id=<?php echo $item['id']; ?>"><span id="dlt" onclick="dlt()" class="btn btn-danger">Delete</span></a></td>
        <td><?php echo '৳'.number_format($item['qnt'] * $item['price'], 2).'/='; ?></td>
        </tr>
    </tbody>    
            <?php endforeach;?>
            <?php endif?>
    <tfoot class="table-dark">
        <tr>
        <td align="left">নির্বাচিতঃ <span class='btn btn-danger'><?php if(isset($_SESSION['Cart'])){
                echo count($_SESSION['Cart']);}?></span>
        </td>
        <td> &copy;MF CART: <span class="btn btn-info"><?php if(isset($_SESSION['Cart'])){
            $total = 0;
            foreach($_SESSION['Cart'] as $m=> $mf){
                echo '('.$mf['id'].')'.$mf['name'].''.'*['.$mf['qnt'].'], ' ;
            }
        } ?></span></td>
        <td>TOTAL : <span class="btn btn-success"><?php if(isset($_SESSION['Cart'])){
            foreach($_SESSION['Cart'] as $m=> $mf){
                echo number_format($mf['qnt'] * $mf['price'], 2).'৳  +';
            }
        } ?></span>
        </td>
        <?php if(empty($_SESSION['Cart'])){
            $total = 0;
            $qntotal = 0;
        }?>
        <?php if(isset($_SESSION['Cart'])){
            $total = 0;
            $qntotal = 0;
            foreach($_SESSION['Cart'] as $k=> $item){
                $total = $total + ($item['qnt'] * $item['price']);
                $qntotal = $qntotal +$item['qnt'];
                
            }
        }?>
        <td>মোটঃ <span class='btn btn-primary'><?php echo number_format($qntotal).'টি';?></span></td>
        <td colspan="3" align="right">মোটঃ<span class='btn btn-warning text-dark'><?php echo number_format($total, 2).'৳';?></span>টাকা৳</td>
    </tr>
    </tfoot>
</table>
</div>


</div>





</div>


<!-- preloader start -->




<script>

    Let text = document.querySelector(".num");
    Let load = document.querySelector(".load");

    Let numToText = 1;

    Let time = setInterval(function(){
        numToText += 1;
        text.textContent = numToText + "%";

        if(numToText === 100) {
            clearInterval(time);
            load.style.fillOpacity = 1;
            text.style.fill = "#fff";
            text.style.fontSize = "30px";
            text.textContent = "Completed";
            text.textLength = "105";
        }
    },200);
</script>


<!-- preloader end -->


<!-- scroll button start -->


<div class="to-top"> 
    <a href="#" ><span class="bi bi-arrow-up-circle-fill"></span> </a>
</div>

<div id="" class="text-center"> 
<button id="msg" class="msg" type="button" data-bs-toggle="modal" data-bs-target="#contactmsg">
    <span class="bi bi-messenger position-relative"></span>
    <span style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle bg-danger"><?php if(isset(($_SESSION['Cart']))){
    echo count($_SESSION['Cart']);
    } ?></span>
<span class="visually-hidden">U</span></span>
</button>
</div>

<?php 
include("msg.php");
?>
<!-- scroll button end -->


<!-- <script src="farhad/javascript/login.js"></script> -->
<!-- <script src="farhad/javascript/pass-show-hide.js"></script> -->


    <script src="jsnav/bootstrap.bundle.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert.min.js"></script>
    <script>
        // $('#dlt').on(click, function(e){
        //     e.preventDefault();
        //     const href = $(this).attr('href')

        //     swal({
        //         title: 'Are you sure?',
        //         text: 'Record will be deleted!',
        //         type: 'warning',
        //         buttons: true,
        //         dangerMode: true,
        //     })
        // }) 
        function dlt(){
            swal({
                title: "Delete Item!!!",
                icon: "warning",
                text: "Your Product delete from cart!",
                button: false,
                timer: 3000,
             })
        }
        
    </script>
    <script>
function mffoysal(){
            swal({
                title: "Add Item!!!",
                icon: "success",
                text: "Add this item to cart!",
                button: false,
                timer: 3000,

             })
        }
</script>
<script type="text/javascript">

	// $(document).ready(function(){
	// 	$("#detail").on('change', function(){
	// 		if($(this).val() == 0)
	// 		{
	// 			window.location = 'product.php';
	// 		}
	// 		else
	// 		{
	// 			window.location = 'product.php?category='+$(this).val();
	// 		}
	// 	});
	// });

</script>    
<script src="jquery-3.4.1.min.js"></script>
<script src="sweetalert.min.js"></script>

<script>
    var preloader = document.getElementById('loader');
    function myFunction(){
        preloader.style.display = 'none';
    }
</script>

<script>
    var preload = document.getElementById('loader');
    var content = document.getElementById('content');
    window.onload=function() {
            
            preload.style.display = 'none';
            content.style.display = 'block';
    }
</script>

<script>
    $(window).on('load',function(){
        $('#loader').fadeOut(1000);
        $('#content').fadeIn(1000);
    });
</script>

<script>
    const toTop = document.querySelector(".to-top");

    window.addEventListener("scroll", () => {
        if(window.pageYOffset > 100) {
            toTop.classList.add("active");
        }else{
            toTop.classList.remove("active");
        }
    })
</script>
</body>
</html>