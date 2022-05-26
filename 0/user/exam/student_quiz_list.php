
<!DOCTYPE html>
<html lang="en">
<head>
	</head>
	<?php include('header.php') ?>
	<?php include('auth.php') ?>
	<?php include('../../db.php') ?>
	<title>My Quiz List</title>
</head>
<body>
	<?php include('nav_bar.php') ?>





		

	<div style="border: 0px solid black; border-radious:10px" class="container  mt-5 border-primary  rounded shadow-lg m-auto">



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
		<div class="col-md-12 alert alert-primary">My Quiz List</div>
		<br>
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered" id='table'>
					<colgroup>
						<col width="10%">
						<col width="30%">
						<col width="20%">
						<col width="20%">
						<col width="20%">
					</colgroup>
					<thead>
						<tr>
							<th>#</th>
							<th>Quiz</th>
							<th>Score</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$qry = $con->query("SELECT * from  quiz_list where id in  (SELECT quiz_id FROM quiz_student_list where user_id ='".$_SESSION['unique_id']."' ) order by title asc ");
					$i = 1;
					if($qry->num_rows > 0){
						while($row= $qry->fetch_assoc()){
							$status = $con->query("SELECT * from history where quiz_id = '".$row['id']."' and user_id ='".$_SESSION['unique_id']."' ");
							$hist = $status->fetch_array();
						?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $row['title'] ?></td>
						<td><?php echo $status->num_rows > 0 ? $hist['score'].'/'.$hist['total_score'] : 'N/A' ?></td>
						<td><?php echo $status->num_rows > 0 ? 'Taken' : 'Pending' ?></td>
						<td>
							<center>
							 	<?php if($status->num_rows <= 0): ?>
							 	<a class="btn btn-sm btn-outline-primary" href="./answer_sheet.php?id=<?php echo $row['id']?>"><i class="fa fa-pencil"></i> Take Quiz</a>
								<?php else: ?>
								<a class="btn btn-sm btn-outline-primary" href="./view_answer.php?id=<?php echo $row['id']?>"><i class="fa fa-eye"></i> View</a>
							<?php endif; ?>
							</center>
						</td>
					</tr>
					<?php
					}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$('#table').DataTable();
		$('#new_faculty').click(function(){
			$('#msg').html('')
			$('#manage_faculty .modal-title').html('Add New Faculty')
			$('#manage_faculty #faculty-frm').get(0).reset()
			$('#manage_faculty').modal('show')
		})
		$('.edit_faculty').click(function(){
			var id = $(this).attr('data-id')
			$.ajax({
				url:'./get_faculty.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						$('[name="id"]').val(resp.id)
						$('[name="uid"]').val(resp.uid)
						$('[name="name"]').val(resp.name)
						$('[name="subject"]').val(resp.subject)
						$('[name="username"]').val(resp.username)
						$('[name="password"]').val(resp.password)
						$('#manage_faculty .modal-title').html('Edit Faculty')
						$('#manage_faculty').modal('show')

					}
				}
			})

		})
		$('.remove_faculty').click(function(){
			var id = $(this).attr('data-id')
			var conf = confirm('Are you sure to delete this data.');
			if(conf == true){
				$.ajax({
				url:'./delete_faculty.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(resp == true)
						location.reload()
				}
			})
			}
		})
		$('#faculty-frm').submit(function(e){
			e.preventDefault();
			$('#faculty-frm [name="submit"]').attr('disabled',true)
			$('#faculty-frm [name="submit"]').html('Saving...')
			$('#msg').html('')

			$.ajax({
				url:'./save_faculty.php',
				method:'POST',
				data:$(this).serialize(),
				error:err=>{
					console.log(err)
					alert('An error occured')
					$('#faculty-frm [name="submit"]').removeAttr('disabled')
					$('#faculty-frm [name="submit"]').html('Save')
				},
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						if(resp.status == 1){
							alert('Data successfully saved');
							location.reload()
						}else{
						$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')

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