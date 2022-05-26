<!DOCTYPE html>
<html lang="en">
<head>
	</head>
	<?php include('header.php') ?>
	<?php include('auth.php') ?>
	<?php include('../../db.php') ?>
	<title>Student List</title>
</head>
<body>
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
		<div class="col-md-12 alert alert-primary">Student List</div>
		<button class="btn btn-primary bt-sm" id="new_student"><i class="fa fa-plus"></i>	Add New</button>
		<br>
		<br>
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered" id='table'>
					<colgroup>
						<col width="10%">
						<col width="40%">
						<col width="30%">
						<col width="20%">
					</colgroup>
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Subject</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$qry = $con->query("SELECT s.*,u.name from quiz_students s left join users u  on s.user_id = u.unique_id order by u.name asc ");
					$i = 1;
					if($qry->num_rows > 0){
						while($row= $qry->fetch_assoc()){
						?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['level_section'] ?></td>
						<td>
							<center>
							 <button class="btn btn-sm btn-outline-primary edit_student" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-edit"></i> Edit</button>
							<button class="btn btn-sm btn-outline-danger remove_student" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-trash"></i> Delete</button>
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
	<div class="modal fade" id="manage_student" tabindex="-1" role="dialog" >
				<div class="modal-dialog modal-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" id="myModallabel">Add New student</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<form id='student-frm'>
							<div class ="modal-body">
								<div id="msg"></div>
								<div class="form-group">
									<label>Name</label>
									<input type="hidden" name="id" />
									<input type="hidden" name="uid" />
									<input type="hidden" name="user_type" value = 'student' />
									<input type="text" name="name" required="required" class="form-control" />
								</div>
								<div class="form-group">
									<label>Level-Section</label>
									<input type="text" name ="level_section" required="" class="form-control" />
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name ="username" required="" class="form-control" />
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" required="required" class="form-control" />
								</div>
							</div>
							<div class="modal-footer">
								<button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
</body>
<script>
	$(document).ready(function(){
		$('#table').DataTable();
		$('#new_student').click(function(){
			$('#msg').html('')
			$('#manage_student .modal-title').html('Add New student')
			$('#manage_student #student-frm').get(0).reset()
			$('#manage_student').modal('show')
		})
		$('.edit_student').click(function(){
			var id = $(this).attr('data-id')
			$.ajax({
				url:'./get_student.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						$('[name="id"]').val(resp.id)
						$('[name="uid"]').val(resp.uid)
						$('[name="name"]').val(resp.name)
						$('[name="level_section"]').val(resp.level_section)
						$('[name="username"]').val(resp.username)
						$('[name="password"]').val(resp.password)
						$('#manage_student .modal-title').html('Edit Student')
						$('#manage_student').modal('show')

					}
				}
			})

		})
		$('.remove_student').click(function(){
			var id = $(this).attr('data-id')
			var conf = confirm('Are you sure to delete this data.');
			if(conf == true){
				$.ajax({
				url:'./delete_student.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(resp == true)
						location.reload()
				}
			})
			}
		})
		$('#student-frm').submit(function(e){
			e.preventDefault();
			$('#student-frm [name="submit"]').attr('disabled',true)
			$('#student-frm [name="submit"]').html('Saving...')
			$('#msg').html('')

			$.ajax({
				url:'./save_student.php',
				method:'POST',
				data:$(this).serialize(),
				error:err=>{
					console.log(err)
					alert('An error occured')
					$('#student-frm [name="submit"]').removeAttr('disabled')
					$('#student-frm [name="submit"]').html('Save')
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



</html>