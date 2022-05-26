<?php include "functions.php";?>
    <?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper" style="    background: linear-gradient(to right, hsl(175, 100%, 50%), hsl(145, 100%, 50%));">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" id="printarea">
                         <button id="printbtn" style="float:right;">
                            Print
                        </button>
                         

<?php
if(isset($_POST['halfsubmit'])){
   $mealtype = $_POST['meltype'];
}

?>
<h3>সকালের খাবার(Breakfast) অর্ধেক অথবা ফুল মিল হিসেবে গণনা করুন</h3>
<br>
<form action="" method="post">
       <div class="container-fluid">
           <div class="row">
           <div class="col-sd-4">
               <select name="meltype" class="form-control">
      <option value="1">সকালের মিলের ধরণ সিলেক্ট</option>
       <option value=".5">Half Meal</option>
       <option value="1">Full Meal</option>
   </select>
          <br>
           </div>
           <div class="col-sd-4">
               <button type="submit" class="btn btn-primary" name="halfsubmit">
               দাখিল
           </button>
           <br>
           </div>
       </div>
       </div>
       <br>
    <table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-info table-hover table-striped table-borderd border-warning ">
    <thead style="background:gree" class="bg-primary">
          <th>
              নামঃ
          </th>
          <th>
              সকালঃ
          </th>
          <th>
              দুপুরঃ
          </th>
          <th>
              রাতঃ
          </th>
          <th>
              মোটঃ
          </th>
          <th>
              মোট খরচঃ
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
                  
                    
                 $first_day = date('Y-m-01'); 
                $last_day  = date('Y-m-t');
                $meal = "SELECT SUM(`breakfast`) as brak, SUM(`launch`) as lunch,  SUM(`dinner`) as dinner FROM `meal_table`  WHERE `mid` = '".$mem['unique_id']."' AND mess_id='{$messid}' AND meal_date >= '{$first_day}' AND meal_date <= '{$last_day}'";
                    
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
                 $meal = "SELECT SUM(`amount`) as umoney FROM `mess_expense`  WHERE `mid` = '".$mem['unique_id']."' AND mess_id='{$messid}' AND expense_date >= '{$first_day}' AND expense_date <= '{$last_day}' ";
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
              
                 $meal = "SELECT SUM(`amount`) as umoney FROM `mess_expense` WHERE  expense_date >= '{$first_day}' AND expense_date <= '{$last_day}' AND mess_id='{$messid}' ";
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


<table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-warning table-hover table-striped table-borderd border-warning ">
   <thead style="background:" class="bg-primary">
       <tr>
           <th>
               মোট মিলঃ
           </th>
           <th>
               <?php echo $all;?>
           </th>
       </tr>
       <tr>
           <th>
               মোট সদস্যঃ
           </th>
           <th>
                <?php echo $useCount;?>
           </th>
       </tr>
       <tr>
           <th>
               মিল প্রতি খরচঃ
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
        সদস্যঃ
    </th>
    <th>
        সসস্যের খরচ
    </th>
    <th>
        মিলের জন্য খরচ
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
           $first_day = date('Y-m-01'); 
                $last_day  = date('Y-m-t');
                 $smeal = "SELECT SUM(`amount`) as umoney FROM `mess_expense`  WHERE `mid` = '".$row['unique_id']."' AND mess_id='{$messid}' AND expense_date >= '{$first_day}' AND expense_date <= '{$last_day}' ";
                $money  = mysqli_query($connection,$smeal);
                $tmem = mysqli_fetch_assoc($money);
                        $memtotalc = $tmem['umoney'];
                       $rm =  $tmem['umoney'];
                        echo "<td>$rm</td>";
          
                       
                 ?>
                 <?php
               
                $first_day = date('Y-m-01'); 
                $last_day  = date('Y-m-t');
                $meal = "SELECT SUM(`breakfast`) as brak, SUM(`launch`) as lunch,  SUM(`dinner`) as dinner FROM `meal_table`  WHERE `mid` = '".$row['unique_id']."' AND mess_id='{$messid}' AND meal_date >= '{$first_day}' AND meal_date <= '{$last_day}'";
                    
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
           
           else if($exp_meal > $rm){
               $tres = $rm - $exp_meal;
             
               echo "<th class='text-danger'> $tres</th>";
           }
           else{
                $tres = $rm - $exp_meal;
             
               echo "<th class='text-primary'> $tres</th>";
           }
               
               ?>
          </tr>
        <?php  
       }
       ?>
   </tbody>
</table>
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