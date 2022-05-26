<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <script src="jsnav/bootstrap.bundle.js"></script> -->
   
    <style>
            .to-top{
        background: cyan;
        position: fixed;
        bottom: 16px;
        right:32px;
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
        bottom: 10%;
        left:32px;
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

.navbar:hover{
    background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%)); 
}
    /* msg end */

    </style>
</head>
<body onload="myFunction()">
    <nav class="navbar navbar-expand-md navbar-light bg-info sticky-top">
        <div class="container-fluid">
           
        <a class="navbar-brand" href="order/"> <img class="rounded-circle" src="image/bg.jpg" alt="" width="40" height="40"> EDULEARN</a>
    <a style="text-decoration:none" href="login.php"><button class="btn btn-outline-dark"><span class="bi bi-door-open-fill"></span> Login</button></a>
    <span></span>
    <!-- <a style="text-decoration:none" href="signup.php"><button class="btn btn-outline-light m-2"><span class="bi bi-plus-square-fill"></span> Sign Up</button></a> -->
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu">
            <span class="navbar-toggler-icon" ></span>
        </button>
        
        <div class="collapse navbar-collapse" id="main_menu" >
        <ul class="navbar-nav ms-auto">
        <a style="text-decoration:none" href="signup.php"><button class="btn btn-outline-light m-2"><span class="bi bi-plus-square-fill"></span> SignUp</button></a>
            <li class="nav-item"><a class="nav-link active" href="index.php"><button type="button" class="btn btn-outline-dark">Home</button></a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"  href=""><button type="button" class="btn btn-outline-dark">CATEGORY-IT</button></a>
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
            <li class="nav-item"><a class="nav-link"  href=""><button class="btn btn-outline-dark">Gallary</button></a></li>
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
            <li class="nav-item"><a class="nav-link"  href=""><button type="button" class="btn btn-outline-dark">Contact</button></a></li>
        </ul>
        </div>
        <a style="text-decoration:none" href="new.php"><button class="btn btn-outline-light m-2"><span class="bi bi-plus-square-fill"></span> A/C</button></a>
        <form action="index.php" method="POST" class="d-flex">
            <input type="search" placeholder="Start typing for..." name="search" class="form-control me-2">
            <button type="submit" class="btn btn-danger"><span class="bi bi-search"></span></button>
        </form>
        </div>
    
    </nav>
    

   
<div class="to-top"> 
    <a href="" ><span class="bi bi-arrow-up-circle-fill"></span> </a>
</div>

<div id="" class="text-center">
<button type="button" id="msg" class="msg" data-bs-toggle="modal" data-bs-target="#contactmsg" class="rounded-circle">
     
    <span class="bi bi-messenger position-relative"></span>
    <span style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle bg-danger">1</span>
<span class="visually-hidden">0</span></span>
</button>
</div>
<?php 
include("msg.php");
?>
    
    <div id="loader">

    <?php 
    include('preloader.php');    
    ?>
    
    </div>
    


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
    
    <script>
    var preloader = document.getElementById('loader');
    function myFunction(){
        preloader.style.display = 'none';
    }
    </script>
    <!-- <script src="jquery-3.4.1.min.js"></script> -->
    <script src="jsnav/bootstrap.bundle.js"></script>
     
</body>
</html>