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
					<li><a href="sales.php">Sales</a></li>
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
    <title>Invoice Details</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">



</head>
<body>
    <?php
        $errorp='';
        if(isset($_REQUEST['error'])){
            $errorp = $_REQUEST['error'];
        }        
    ?>
<h3 class="text-center shadow-lg p-1 bg light m-auto"><?php echo $errorp; ?></h3>
<div class="container text-center w-50">
        <form action="shopping.php" method="POST">
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
<?php
include('shop.php');
?>
<div class="container-fluid">

<div class="container-fluid table-responsive" style="margin-top:0px;">
      <table class="table m-auto table-danger table-hover table-striped table-borderd border-danger">
      <thead class="table-warning">
			<tr>
				<th>Customer name</th>
				<th>Phone</th>
				<th>Invoice No</th>
				<th style="display:;">Address</th>
				<th style="display:;">Item</th>
				<th style="display:;">Item name</th>
				<th style="display:;">Item price</th>
				<th style="display:;">SubTotal</th>
				<th style="display:;">Coupon</th>
				<th style="display:;">P:Method</th>
				<th style="display:;">P:Number</th>
				<th style="display:;">P:Trx</th>
				<th style="display:;">Status</th>
				<th style="display:;">Date</th>
				<th style="display:;">email</th>
				<th style="display:;">Msg</th>
				<th style="display:;">Cus:Service</th>
			</tr>
		</thead>
		<tbody>

        <?php 
            $data = invoice();

            while($row = mysqli_fetch_assoc($data)){
                invoiceDetails($row['pro_id'],$row['name'],$row['phone'],$row['district'],$row['address'],$row['house'],$row['cart_item'],$row['item'],$row['total_item'],$row['price_sum'],$row['coupon'],$row['subtotal'],$row['payment_method'],$row['payment_number'],$row['payment_trx'],$row['msg'],$row['email'],$row['datetime'],$row['customer_service'],$row['delivery_confirm']);
            }

        ?>
        </tbody>
        <tfoot class="table-dark">
        
        </tfoot>
	  </table>
   </div>
    
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
		$('.table').DataTable();
  });
  </script>
</body>
</html>