<style>
  body{
    background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%));
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
        .header{
            background-color: #0254b7;
            
        }
</style>

<?php

?>

<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  // if(!isset($_SESSION['phone'])){
  //   header("location: login.php");
  // }
?>
<?php include_once "header.php"; ?>
<body style="background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%));">
  <div class="wrapper">
  <header class="header">
        <div class="container">

            <div class="logo">
                <h1>EdUlearn</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <!-- <li><a href="#">About</a></li> -->
                    <!-- <li><a href="#">Service</a></li> -->
                    <!-- <li><a href="#">Blog</a></li> -->
                    <!-- <li><a href="#">Contact</a></li> -->
                    <li><a href="../login.php">Back Dashbord</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>  
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['name']; ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
    <!-- <header class="header">
        <div class="container">

            <div class="logo">
                <h1>EdUlearn</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li> -->
                    <!-- <li><a href="#">About</a></li> -->
                    <!-- <li><a href="#">Service</a></li> -->
                    <!-- <li><a href="#">Blog</a></li> -->
                    <!-- <li><a href="#">Contact</a></li> -->
                    <!-- <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>   -->
  </div>

  <script src="javascript/users.js"></script>


</body>
</html>
