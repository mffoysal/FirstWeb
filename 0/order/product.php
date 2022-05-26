<style>
	body{
		background: linear-gradient(to right, hsl(150, 100%, 50%), hsl(175, 100%, 50%));
	}
</style>

<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">PRODUCTS Setting</h1>
	<div class="row">
		<div class="col-md-12">
		<a class="pull-left btn btn-warning" style="text-decoration:none" href="product.php"><span class="glyphicon glyphicon-list-alt"></span> All Category</a>
			<select id="catList" class="btn btn-default">
			<option><a href="product.php">All Category</a></option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['catname'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Product</a>
			<a href="#addproduct1" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Details</a>
			<a href="#addproduct2" data-toggle="modal" class="pull-right btn btn-warning"><span class="glyphicon glyphicon-list-alt"></span> Details</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Photo</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					// if(isset($_GET['category'])){
					// 	$ca = $_GET['category'];
					// }
						
					// 	// $where = "WHERE product.categoryid = $catid";
						
					// }
					
					if(isset($_GET['category'])){
						$catid = $_GET['category'];
						$sql="SELECT * FROM shopping where categoryname='".$catid."' ";
					}
					else {
						$sql="SELECT * FROM shopping ";
					}
					
					
					
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['img'])){echo "upload/noimage.jpg";} else{echo $row['img'];} ?>"><img src="<?php if(empty($row['img'])){echo "upload/noimage.jpg";} else{echo $row['img'];} ?>" height="30px" width="40px"></a></td>
							<td><?php echo $row['title']; ?></td>
							<td>&#2547; <?php echo number_format($row['price'], 2); ?></td>
							<td>
								<a href="#editproduct<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deleteproduct<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('product_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modal.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'product.php';
			}
			else
			{
				window.location = 'product.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>