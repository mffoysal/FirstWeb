<?php

//student_dashboard.php

include('admin/soes.php');

$object = new soes();

if(!$object->is_student_login())
{
	header("location:".$object->base_url."");
}

include('header.php');

?>

				
		    

<?php

include('footer.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EdULearn~Online Exame</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
			<div class="container m-auto text-center bg-light shadow-lg">
				<button class="btn btn-dark text-light m-auto text-center"><a style="text-decoration:none" href="exam.php"> ...এক্সাম System | Click Here... </a></button>
				<div class="row">
					<div class="col-md-6 shadow-lg p-3 mb-5">

					<a class="btn btn-warning text-center m-auto" href="#">এডুলার্ন</a>

				  	<button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">Details~1</button>
				  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  			</button>
		  			<div class="collapse navbar-collapse" id="navbar1">
		    		<ul class="navbar-nav mr-auto">
		      		<li class="nav-item active">
		        		<a class="btn-primary mb-3 nav-link btn " href="student_dashboard.php">এক্সাম । হোম</a>
		        		<a class="btn-primary mb-3 nav-link" href="../index.php">এডুলার্ন হোম</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="btn-primary mb-3 nav-link" href="exam.php">Exam/এক্সাম</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="btn-primary mb-3 nav-link" href="logout.php">Logout</a>
		      		</li>
		    		</ul>
		  		</div>
					
					</div>
					<div class="col-md-6">
					<a class="btn btn-warning text-center m-auto" href="#">এডুলার্ন</a>
					<button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">Details~1</button>
				  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  			</button>
		  			<div class="collapse navbar-collapse" id="navbar2">
		    		<ul class="navbar-nav mr-auto">
		      		<li class="nav-item active">
		        		<a class="btn-primary mb-3 nav-link btn " href="student_dashboard.php">এক্সাম । হোম2</a>
		        		<a class="btn-primary mb-3 nav-link" href="../index.php">এডুলার্ন হোম2</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="btn-primary mb-3 nav-link" href="exam.php">Exam/এক্সাম2</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="btn-primary mb-3 nav-link" href="logout.php">Logout</a>
		      		</li>
		    		</ul>
		  		
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					
					</div>
					<div class="col-md-6">
					
					</div>
				</div>
			</div>
</body>
</html>


<script>

$(document).ready(function(){

	

});

</script>