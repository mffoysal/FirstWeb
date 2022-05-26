<style>
                *{
            margin: 0px;
            padding: 0px;
            font-family: system-ui;
        }
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
            width: 95%;
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
        #seab{
        display:none;
        background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%));
        }
        #sea:hover #seab{
            display:inline;
        }       

    </style>
<header>
        <div class="container">

            <div class="logo">
                <!-- <h1>EdUlearn</h1> -->
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
					<li><a href="product.php">Product</a></li>
					<li><a href="../index.php">Main</a></li>
                    <!-- <li><a href="#">Service</a></li> -->
                    <!-- <li><a href="#">Blog</a></li> -->
                    <!-- <li><a href="#">Contact</a></li> -->
                    
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>      


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon Setting</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<?php require_once 'mf.php'; ?>


<?php

if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>

</div>
<?php endif ?>


<div class="container text-center w-50">
    <div class="row justify-content-center">
    <h1>MF FOYs@L Form</h1>
    

    

    <form action="mf.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>" >

        <div style="border-radius: 5px;"> 
            <div class="form-group form-floating">
            <input id="status" class="form-control"  type="text" name="ad_name" value="<?php echo $name; ?>" placeholder="Enter Name of coupon">
            <label for="status">Name of Coupon</label>    
            </div>
            <div class="form-group form-floating">
            <input id="name" class="form-control"  type="text" name="coupon" value="<?php echo $coupon; ?>" placeholder="Enter a coupon">
            <label for="name">Coupon</label>
            </div>
            <div class="form-group form-floating">
            <input id="student_name" class="form-control"  type="text" name="coupon_value" value="<?php echo $coupon_value; ?>" placeholder="Enter coupon value">
            <label for="student_neme">Coupon Value</label>    
            </div>
            <div class="form-group form-floating">
            <input id="email" class="form-control"  type="text" name="min_price" value="<?php echo $min_price; ?>" placeholder="Enter min price">
            <label for="email">MIN Price</label>
            </div>
            <div class="form-group form-floating">
                                <select name="status" id="student_gender" class="form-control">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
            <label>Coupon Status</label>
            </div>
            
        <div class="form-group">

            <div class="sub">
                    <input  type="reset" class="btn btn-warning" value="Reset Data" placeholder="">
                    <?php
                    if ($update == true):
                    ?>   
                    <input type="submit" class="btn btn-warning" name="update" value="Update">
                    <?php else: ?>
                    <input type="submit" class="btn btn-primary" name="save" value="Send Data"><br>
                    <?php endif; ?> 
                    
            </div>
        </div>       
        

        </div>
       
    </form>
    </div>
    
     
</div>  



<div class="container">
<?php
    include('../db.php');
    // $con = new mysqli('localhost', 'root', '', 'foysal') or
    //     die(mysqli_error($con));
    $table = "student_soes";    
    $result = $con->query("SELECT * FROM coupon") or die($con_error);    
    // pre_r($result);
?>

<div class="row justify-content-center">
<table class="table m-auto table-danger table-hover table-striped table-borderd border-danger">
      <thead class="table-warning">
            <tr>
                <th class="th">Coupon Name</th>
                <th class="th">Coupon</th>
                <th class="th">Coupon Value</th>
                <th class="th">Min Price</th>
                <th class="th">Status</th>
                <th colspan="2" class="th">Action</th>
            </tr>
        </thead>

        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="th"><?php echo $row['ad_name']; ?></td>
                    <td class="th"><?php echo $row['coupon']; ?></td>
                    <td class="th"><?php echo $row['coupon_value']; ?></td>
                    <td class="th"><?php echo $row['min_price']; ?></td>
                    <td class="th"><?php echo $row['status']; ?></td>
                    <td class="th">
                        <a style="" class="btn btn-warning w-50" href="coupon.php?edit=<?php echo $row['id']; ?> " class="btn btn-warning w-50">Edit</a><br>
                        <a class="btn btn-danger w-50" href="mf.php?delete=<?php echo $row['id']; ?> " class="btn btn-danger w-50">Delete</a>

                    </td>
                </tr>
                <?php endwhile; ?>

    </table>


</div>
    
    
    
<?php     
        function pre_r( $array ){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }    
?>
</div>


<!-- <script src="js/bootstrap.bundle.js"></script> -->
<!-- <script src="js/app.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
		$('.table').DataTable();
  });
  </script>
</html>