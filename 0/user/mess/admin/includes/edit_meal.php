<?php

if(isset($_GET['mem_id'])){
  $the_member = $_GET['mem_id'];
  $the_date = $_GET['meal_dt'];
  $messid=$_SESSION['mess_id'];
}
$query = "SELECT * FROM meal_table WHERE mid='{$the_member}' AND meal_date='{$the_date}' AND mess_id='{$messid}'";
$select_member = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_member)){
    $clun = $row['launch'];
    $cmor = $row['breakfast'];
    $cdin = $row['dinner'];
    $cdate = $row['meal_date'];
    $cname = $row['member_name'];
}
if(isset($_POST['updatemeal'])){
   $morning =  $_POST['morning'];
   $launch = $_POST['lunch'];
   $dinner = $_POST['dinner'];
   $mealdate = $_POST['todate'];
 
   $query ="UPDATE meal_table SET ";
   $query .="meal_date = '{$mealdate }', ";
   $query .="breakfast = '{$morning }', ";
   $query .="launch = '{$launch }', ";
   $query .="dinner = '{$dinner }' ";
   $query .= "WHERE mid = {$the_member} ";
   
   $connection_query = mysqli_query($connection,$query);
   if(!$connection_query){
       die('connection failed' . mysqli_error($connection));
   }
   else{
       echo "<h3>Updated</h3>";
       }
   
}




?>
<h1 class="page-header">
    Login as 
    <small><?php echo $_SESSION['name'];?></small>
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">ড্যাশবোর্ড</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> মিল পরিবর্তন
    </li>
</ol>

<form method="post">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">সকাল</label>
    <div class="col-sm-10">
      <div class="form-group">
    
        <select class="form-control" name="morning" id="exampleFormControlSelect1">
          <option value="<?php echo $cmor;?>"><?php echo $cmor;?></option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">দুপুর</label>
    <div class="col-sm-10">
      <div class="form-group">
      
        <select class="form-control" name="lunch" id="exampleFormControlSelect2">
          <option value="<?php echo $clun;?>"><?php echo $clun;?></option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">রাত</label>
    <div class="col-sm-10">
      <div class="form-group">
       
        <select class="form-control" name="dinner" id="exampleFormControlSelect3">
          <option value="<?php echo $cdin;?>"><?php echo $cdin;?></option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">রাত</label>
    <div class="col-sm-10">
      <div class="form-group">
     
     <?php
          
          
          $list=array();
$month = 12;
$year = 2018;
$today = date("Y-m-d");
$totalDay = date('t');
$curm = date('m', strtotime('-1'));
$cury = date('Y', strtotime('-1'));
$curd = date('d', strtotime('-1'));
          
for($d=1; $d<=$totalDay; $d++)
{
    $time=mktime(12, 0, 0, $curm, $d, $cury);          
    if (date('m', $time)==$curm)       
        $list[]=date('Y-m-d', $time);
   
}     
          ?>
          
<select class="form-control" name="todate" > 
   <option value="<?php echo $cdate;?>"><?php echo $cdate;?></option>
   <option value="<?php echo $today;?>">For Today</option>
    <?php foreach($list as $key => $value){ ?>
      
       <option value="<?php echo $value;?>"><?php echo $value;?></option>
    <?php } ?>
</select>

        
      </div>
    </div>
  </div>
  <div class="form-group row">
    
    <div class="col-sm-10 col-sm-offset-2">
      <button class="btn btn-primary" type="submit" name="updatemeal">
          Update
      </button>
    </div>
  </div>
  
</form>

<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2021 Developed By Farhad Foysal</h5>
                </div>
            </div>
        </footer>
