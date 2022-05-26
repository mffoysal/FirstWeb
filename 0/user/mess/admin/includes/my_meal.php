<?php
    
    $memId =  $_SESSION['unique_id'];
    $messid =  $_SESSION['mess_id'];
    

?>
<h1 class="page-header">
    Login as 
    <small><?php echo $_SESSION['name'];?></small>
    <?php $today = date("Y-m-d");?>
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">ড্যাশবোর্ড</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> আমার মিল তালিকাঃ
    </li>
</ol>

<form method="post">

  
  <table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-info table-hover table-striped table-borderd border-warning ">
      <thead style="background:gree" class="bg-primary">
          <th>
              তারিখ
          </th>
          <th>
              নাম
          </th>
          <th>
              সকাল
          </th>
          <th>
              দুপুর
          </th>
          <th>
              রাত
          </th>
          <th>
              মোট
          </th>
          
      </thead>
      <tbody>
              <?php
    $first_day = date('Y-m-01'); 
    $last_day  = date('Y-m-t');
           $query3 = "SELECT * FROM meal_table WHERE meal_date >= '{$first_day}' and meal_date <= '{$last_day}' and mess_id='{$messid}' and mid=$memId";
                $all_select = mysqli_query($connection,$query3);
                $total_morning=0;
                $total_launch=0;
                $total_dinner=0;
                $total_day=0;
                $PTotal=0;
                $all= 0;
                while($nrow = mysqli_fetch_assoc($all_select)){
                    $pMor = $nrow['breakfast'];
                    $plau = $nrow['launch'];
                    $pdin = $nrow['dinner'];
                    $pdat = $nrow['meal_date'];
                    $pname = $nrow['member_name'];
                    $total_morning+= $pMor;
                    $total_launch+= $plau;
                    $total_dinner+= $pdin;
                    $PTotal = $pMor + $plau + $pdin;
                    $total_day+=1;
                    $all+= $PTotal;
                    
                    echo "<tr>";
                    echo "<td>$pdat</td>";
                    echo "<td>$pname</td>";
                    echo "<td>$pMor</td>";
                    echo "<td>$plau</td>";
                    echo "<td>$pdin</td>";
                    echo "<td>$PTotal</td>";
                    echo "</tr>";
                    
          
                }
          ?>
      </tbody>
      <thead>
          <thead style="background:gree" class="bg-primary">
              <tr>
                  <th>মোট দিন (<?php echo $total_day;?>)</th>
                  <th>
                      Of
                  </th>
                  <th>
                      <?php echo $total_morning;?>
                  </th>
                  <th>
                      <?php echo $total_launch;?>
                  </th>
                  <th>
                      <?php echo $total_dinner;?>
                  </th>
                  <th>
                      <?php echo $all;?>
                  </th>
              </tr>
          </thead>
      </thead>
  </table>
  
  
</form>


<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2021 Developed By  Farhad Foysal</h5>
                </div>
            </div>
        </footer>