
<!DOCTYPE html>
<html lang="en">
<head>
	</head>
	<?php include('header.php') ?>
	<?php include('auth.php') ?>
	<?php include('../../db.php') ?>
	<?php 
	$quiz = $con->query("SELECT * FROM quiz_list where id =".$_GET['id']." order by RAND()")->fetch_array();
	?>
	<title><?php echo $quiz['title'] ?> | Answer Sheet</title>
</head>
<body>
	<style>
		li.answer{
			cursor: pointer;
		}
		li.answer:hover{
			background: #00c4ff3d;
		}
		li.answer input:checked{
			background: #00c4ff3d;
		}
	</style>
	<?php include('nav_bar.php') ?>




		

	<div style="border: 0px solid black; border-radious:10px" class="container mt-5 border-primary  rounded shadow-lg m-auto">



<h6 style="margin:0 auto" class="bg-dark m-auto text-warning"><?=$s;?></h6>

       <div class="row">
         <div style="border: 2px solid black; border-radious:10px" class="col-md-2 border">

                <div class="col mt-2">
                    <!-- <a href="request.php"><button type="button" class="btn btn-outline-success mt-2 w-100">Request</button></a>
                    <a href="index.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">All Users</button></a>
 -->
                        <div id="sidebarr" class="bg-light">
								<div id="">
									<a href="home.php" class="text-dark">
                                    <button class="btn btn-outline-info w-100">Home</button>  
									</a>
								</div>
								<?php if($_SESSION['actype'] != 'student'): ?>
								<?php if($_SESSION['actype'] == "admin"): ?>
								<div id="">
									<a href="faculty.php" class=" text-dark">
                                    <button class="btn btn-outline-info w-100">Faculty List</button>  
									</a>
								</div>
							<?php endif; ?>
								<div id="">
									<a href="student.php" class="text-dark">
											<button class="btn btn-outline-info w-100">Student List</button> 
									</a>
								</div>
								<div id="">
									<a href="quiz.php" class="text-dark">
                                    <button class="btn btn-outline-info w-100">Quiz List</button>  
									</a>
								</div>
								<div id="">
									<a href="history.php" class="text-dark">
                                    <button class="btn btn-outline-info w-100">Quiz Records</button>  
									</a>
								</div>
								<?php else: ?>
								<div id="">
									<a href="student_quiz_list.php" class="text-dark">
                                    <button class="btn btn-outline-info w-100">Quiz List</button>  
									</a>
								</div>
							<?php endif; ?>

							</div>
							<script>
								$(document).ready(function(){
									var loc = window.location.href;
									loc.split('{/}')
									$('#sidebarr a').each(function(){
									// console.log(loc.substr(loc.lastIndexOf("/") + 1),$(this).attr('href'))
										if($(this).attr('href') == loc.substr(loc.lastIndexOf("/") + 1)){
											$(this).addClass('active')
										}
									})
								})
								
							</script>


<!-- 
                    <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                      <button class="btn btn-outline-danger navbar-toggler w-100" type="button" data-bs-toggle="collapse" data-bs-target="#allusersetting" aria-controls="allusersetting" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                  </nav>
                  <div class="collapse" id="allusersetting">
                    <div class="bg-dark p-4">

                    <a href="course.php"><button type="button" class="btn btn-outline-info mt-2 w-100">My Course</button></a>
                    <a href="tutor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">ALL TuTor</button></a>
                    <a href="mentor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">Tutor Post</button></a>
                    <span class="text-muted">Student Part</span>

                    <a href="myrequest.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">My Request</button></a>
                    <a href="allstudent.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">ALL Student</button></a>
                    <a href="studentpost.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">Student Post</button></a>

                    <span class="text-muted">Teacher Part</span>

                    <a href="mentorpost.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">মেন্টর পোষ্ট</button></a>
                    <a href="tutoraccept.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">স্টুডেন্ট রিকোয়েস্ট</button></a>
                    <a href="my_student.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">ছাত্র-ছাত্রী</button></a>

                      <span class="text-muted">Student & Teacher Part</span>
                    </div>
                    </div> -->





                </div>
            
         </div>
         <div style="border: 2px solid black; border-radious:10px" class="col border-danger">
            <div class="row">

                 

			
	
	<div class="">
		<div class="col-md-12 alert alert-primary"><?php echo $quiz['title'] ?> | <?php echo $quiz['qpoints'] .' Points Each Question' ?></div>
		<br>
		<div class="card">
			<div class="card-body">
				<form action="" id="answer-sheet">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['unique_id'] ?>">
					<input type="hidden" name="quiz_id" value="<?php echo $quiz['id'] ?>">
					<input type="hidden" name="qpoints" value="<?php echo $quiz['qpoints'] ?>">
					<?php
					$question = $con->query("SELECT * FROM quizquestions where qid = '".$quiz['id']."' order by order_by asc ");
					$i = 1 ;
					while($row =$question->fetch_assoc()){
						$opt = $con->query("SELECT * FROM question_opt where question_id = '".$row['id']."' order by RAND() ");
					?>

				<ul class="q-items list-group mt-4 mb-4">
					<li class="q-field list-group-item">
						<strong><?php echo ($i++). '. '; ?> <?php echo $row['question'] ?></strong>
						<input type="hidden" name="question_id[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">
						<br>
						<ul class='list-group mt-4 mb-4'>
						<?php while($orow = $opt->fetch_assoc()){ ?>

							<li class="answer list-group-item">
								<label><input type="radio" name="option_id[<?php echo $row['id'] ?>]" value="<?php echo $orow['id'] ?>"> <?php echo $orow['option_txt'] ?></label>
							</li>
						<?php } ?>

						</ul>

					</li>
				</ul>

				<?php } ?>
				<button class="btn btn-block btn-primary">Submit</button>
				</form>
			</div>	
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$('.answer').each(function(){
		$(this).click(function(){
			$(this).find('input[type="radio"]').prop('checked',true)
			$(this).css('background','#00c4ff3d')
			$(this).siblings('li').css('background','white')
		})


		})
		$('#answer-sheet').submit(function(e){
			e.preventDefault()
			$('#answer-sheet [type="submit"]').attr('disabled',true)
			$('#answer-sheet [type="submit"]').html('Saving...')
			$.ajax({
				url:'submit_answer.php',
				method:'POST',
				data:$(this).serialize(),
				error:err=>console.log(err),
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
					if(resp.status == 1){
						alert('You completed the quiz your score is '+resp.score)
						location.replace('view_answer.php?id=<?php echo $_GET['id'] ?>')
					}
					}
				}
			})
		})
		
	})
</script>
	






            </div>
         </div>
       </div>
</div>


      <!-- post -->










</html>