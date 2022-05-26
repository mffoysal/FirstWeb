<?php include "functions.php";?>
    <?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper" style="    background: linear-gradient(to right, hsl(175, 100%, 50%), hsl(145, 100%, 50%));">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" id="printarea">
                        
                        <br>
                        <br>
                        <button id="printbtn" style="float:right;">
                            Print
                        </button>
                       
<?php
if(isset($_POST['halfsubmit'])){
   $mealtype = $_POST['meltype'];
    $fromMonth = $_POST['fromMonth'];
   $toMonth = $_POST['toMonth'];
}

?>
<h2>সকালের খাবার(Breakfast) অর্ধেক মিল হিসেবে গণনা করুন</h2>
<br>
<form action="" method="post">
       <div class="row">
           <div class="col-md-3">
              <label>সকালের মিলের ধরণ</label>
               <select name="meltype" class="form-control">
      <option value="1">সকালের মিলের ধরণ সিলেক্ট</option>
       <option value=".5">Half Meal</option>
       <option value="1">Full Meal</option>
   </select>
           </div>
           <div class="col-md-3">
               <label>From (মাস হতে)</label>
              
               <input type="text" class="form-control datepicker"  placeholder="Check In" name="fromMonth">

           </div>
           <div class="col-md-3">
               <label>To (মাস পর্যন্ত)</label>
               <input type="text" class="form-control datepicker"  placeholder="Check In" name="toMonth">
           </div>
           <div class="col-md-3">
              <div><label>দেখুন</label></div>
               <button type="submit" class="btn btn-primary" name="halfsubmit">
               দাখিলঃ
           </button>
           </div>
       </div>
       <br>
    <?php
    if(!empty($fromMonth) && !empty($fromMonth) && !empty($toMonth)){
     
        ?>
        <table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-info table-hover table-striped table-borderd border-warning ">
    <thead style="background:" class="bg-primary">
          <th>
              নাম
          </th>
          <th>
              সকাল
          </th>
          <th>
              দুপর
          </th>
          <th>
              রাত
          </th>
          <th>
              মোট
          </th>
          <th>
              মোট খরচ
          </th>
      </thead>
      <tbody>
         <?php 
            $messid=$_SESSION['mess_id'];
                $query = "SELECT * FROM `users` WHERE mess_id='{$messid}' ";
                $user  = mysqli_query($connection,$query);
                $useCount =mysqli_num_rows($user);
                while($mem = mysqli_fetch_assoc($user)){
                    
            
              ?>
          <tr>
              <td><?php echo $mem['name']?></td>
              <?php
                    
                 
                $meal = "SELECT SUM(`breakfast`) as brak, SUM(`launch`) as lunch,  SUM(`dinner`) as dinner FROM `meal_table`  WHERE `mid` = '".$mem['unique_id']."' AND mess_id='{$messid}' AND meal_date >= '{$fromMonth}' AND meal_date <= '{$toMonth}'";
                    
                $tmeal = mysqli_query($connection,$meal);
                    
                    
                    while($me = mysqli_fetch_assoc($tmeal)){
                        if(!empty($mealtype)){
                           $rbreak = $me['brak']; 
                            $rbreak = $rbreak * $mealtype;
                        }
                        else{
                           $rbreak = $me['brak'];  
                        }
                        
                        $rlunch = $me['lunch'];
                        $rdinner = $me['dinner'];
                        @$tmorn+=$rbreak;
                        @$tlaun+=$rlunch;
                        @$tdin+=$rdinner;
                        @$all+= $rbreak+$me['lunch']+$me['dinner'];
              ?>
                  <td><?php echo $rbreak;?></td>
                  <td><?php echo $rlunch;?></td>
                  <td><?php echo $rdinner;?></td>
                  <td>
                    <?php echo $rbreak+$rlunch+$rdinner;?>
                   
             </td>
             <td>
                 <?php
                 $meal = "SELECT SUM(`amount`) as umoney FROM `mess_expense`  WHERE `mid` = '".$mem['unique_id']."' AND mess_id='{$messid}' AND expense_date >= '{$fromMonth}' AND expense_date <= '{$toMonth}' ";
                $money  = mysqli_query($connection,$meal);
                $tmem = mysqli_fetch_assoc($money);
                        $memtotalc = $tmem['umoney'];
                        echo $tmem['umoney'];
                       
                 ?>
             </td>
              <?php }?>
          </tr>
          
          <?php }?>
            <tr>
             <th>
                 মোটঃ
             </th>
              <th>
              <?php echo $tmorn?>
          </th>
          <th>
              <?php echo $tlaun?>
          </th>
                <th>
              <?php echo $tdin?>
          </th>
          <th>
              <?php echo $all;?>
          </th>
          <th>
              <?php
              
                $messid=$_SESSION['mess_id'];

                 $meal = "SELECT SUM(`amount`) as umoney FROM `mess_expense` WHERE  expense_date >= '{$fromMonth}' AND expense_date <= '{$toMonth}' AND mess_id='{$messid}' ";
                $money  = mysqli_query($connection,$meal);
                $tmem = mysqli_fetch_assoc($money);
                        $tmessexp = $tmem['umoney'];
              echo $tmessexp;
              
                 ?>
          </th>
          </tr>
      </tbody>
      <thead>
         
      </thead>
</table>


<table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-danger table-hover table-striped table-borderd border-warning ">
   <thead style="background:" class="bg-primary">
       <tr>
           <th>
               মোট মিল
           </th>
           <th>
               <?php echo $all;?>
           </th>
       </tr>
       <tr>
           <th>
               মোট সদস্য
           </th>
           <th>
                <?php echo $useCount;?>
           </th>
       </tr>
       <tr>
           <th>
               মিল প্রতি খরচ
           </th>
           <th>
              <?php
    
                    $ppMrate = $tmessexp /$all;
               
                echo $ppMrate;
               ?>
           </th>
       </tr>
   </thead>
</table>
<table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-danger table-hover table-striped table-borderd border-warning ">
   <thead style="background:yellow" class="bg-primar">
        <th>
        সদস্য
    </th>
    <th>
        সদস্যের খরচ
    </th>
    <th>
        মিলের খরচ
    </th>
    <th>
    <span style="color:red">বাকী</span>/<span style="color:green">পাওনা</span>
    </th>
   </thead>
   <tbody>
       <?php
       $messid=$_SESSION['mess_id'];
       $query = "SELECT * From users WHERE mess_id='{$messid}' ";
       $member_query = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($member_query)){
           
           ?>
           <tr>
          <td><?php echo $row['name'];?></td>
            <?php
          
                 $smeal = "SELECT SUM(`amount`) as umoney FROM `mess_expense`  WHERE `mid` = '".$row['unique_id']."' AND expense_date >= '{$fromMonth}' AND expense_date <= '{$toMonth}' AND mess_id='{$messid}' ";
                $money  = mysqli_query($connection,$smeal);
                $tmem = mysqli_fetch_assoc($money);
                        $memtotalc = $tmem['umoney'];
                       $rm =  $tmem['umoney'];
                        echo "<td>$rm</td>";
          
                       
                 ?>
                 <?php
                $fromMonth;
                $toMonth;
              
                $meal = "SELECT SUM(`breakfast`) as brak, SUM(`launch`) as lunch,  SUM(`dinner`) as dinner FROM `meal_table`  WHERE `mid` = '".$row['unique_id']."' AND meal_date >= '{$fromMonth}' AND meal_date <= '{$toMonth}' AND mess_id='{$messid}' ";
                    
                $tmeal = mysqli_query($connection,$meal);
                    
                    
                   $me = mysqli_fetch_assoc($tmeal);
                        if(!empty($mealtype)){
                           $rbreak = $me['brak']; 
                            $rbreak = $rbreak * $mealtype;
                             $rbreak;
                        }
                        else{
                            $rbreak = $me['brak'];  
                        }
                        
                        $rlunch = $me['lunch'];
                        $rdinner = $me['dinner'];
                        @$tmorn+=$rbreak;
                        @$tlaun+=$rlunch;
                        @$tdin+=$rdinner;
                        @$all= $rbreak+$me['lunch']+$me['dinner'];
          
                        $exp_meal = $all * $ppMrate;
                    echo "<td>$exp_meal</td>";
           if($rm > $exp_meal){
               $tres = $rm - $exp_meal;
               
               echo "<th class='text-success'>$tres</th>";
           }
           else if($rm == $exp_meal){
              
           }
           else{
               $tres = $rm - $exp_meal;
             
               echo "<th class='text-danger'> $tres</th>";
           }
               
               ?>
          </tr>
        <?php  
       }
       ?>
   </tbody>
</table>
        
        <?php
}
    else{
}
    ?>
</form>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php";?>