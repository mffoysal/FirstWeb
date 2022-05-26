<style>
                *{
            margin: 0px;
            padding: 0px;
            font-family: system-ui;
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
    </style>
    <style>
	body{
		background: linear-gradient(to right, hsl(150, 100%, 50%), hsl(175, 100%, 50%));
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
					<li><a href="order.php">Order Here</a></li>
					<li><a href="../index.php">Main</a></li>
                    <!-- <li><a href="#">Service</a></li> -->
                    <!-- <li><a href="#">Blog</a></li> -->
                    <!-- <li><a href="#">Contact</a></li> -->
                    
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </header>  


<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">ORDER</h1>
	<form method="POST" action="purchase.php">


		<div class="row">
			<div class="col-md-3">
				<label for="customer">Type Your Name & Phone Number</label>
				<input id="customer" type="text" name="customer" class="form-control" placeholder="[exm: farhad|01585855075]" required>
			</div>
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Order Save</button>
			</div>
		</div>


		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php 
					$sql="select * from shopping left join category on category.catname=shopping.categoryname order by shopping.id asc, title asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['id']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td class="text-right">&#2547; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
</html>