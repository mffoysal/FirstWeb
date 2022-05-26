<style>
                *{
            margin: 0px;
            padding: 0px;
            font-family: system-ui;
		}
		.content{
            background: linear-gradient(to right, hsl(100, 100%, 50%), hsl(175, 100%, 50%));
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
<body onload="myFunction()">
<?php include('navbar.php'); ?>
<link rel="stylesheet" href="bounc.css">
<style>
	.panel-body img{
	    width: 100%;
	    height: 23rem;
	    object-fit: cover;
	}
	#loader{
		
	}
</style>
<div class="content">

<div class="container">
	
	<h3 class="page-header text-center">EdUlearn MENU</h3>
	<ul class="nav nav-tabs">
		<?php
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$frow=$fquery->fetch_array();
			?>
				<li class="active"><a style="color:black" data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
			<?php

			$sql="select * from category order by categoryid asc";
			$nquery=$conn->query($sql);
			$num=$nquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $num";
			$query=$conn->query($sql);
			while($row=$query->fetch_array()){
				?>
				<li><a style="color:red" data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
				<?php
			}
		?>
	</ul>

	<div class="tab-content">
		<?php
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$ftrow=$fquery->fetch_array();
			?>
				<div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
					
					<?php

						$sql="select * from shopping where categoryname='".$ftrow['catname']."'";
						$pfquery=$conn->query($sql);
						$inc=4;
						while($pfrow=$pfquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $pfrow['title']; ?></b>
										</div>
										<div class="panel-body">
											<img src="../image<?php if(empty($pfrow['img'])){echo "upload/noimage.jpg";} else{echo $pfrow['img'];} ?>" height="225px;" width="100%">
										</div>
										<div class="panel-footer text-center">
											&#2547; <?php echo number_format($pfrow['price'], 2); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
			<?php

			$sql="select * from category order by categoryid asc";
			$tquery=$conn->query($sql);
			$tnum=$tquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $tnum";
			$cquery=$conn->query($sql);
			while($trow=$cquery->fetch_array()){
				?>
				<div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
					<?php

						$sql="select * from shopping where categoryname='".$trow['catname']."'";
						$pquery=$conn->query($sql);
						$inc=4;
						while($prow=$pquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $prow['title']; ?></b>
										</div>
										<div class="panel-body">
											<img src="../image<?php if($prow['img']==''){echo "upload/noimage.jpg";} else{echo $prow['img'];} ?>" height="" width="">
										</div>
										<div class="panel-footer text-center">
											&#2547; <?php echo number_format($prow['price'], 2); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
				<?php
			}
		?>
	</div>
</div>



<div id="loader">

			<?php include('../bounctxt.html'); ?>

</div>
</div>
<script>
    var preloader = document.getElementById('loader');
    function myFunction(){
        preloader.style.display = 'none';
    }
</script>
</body>
</html>