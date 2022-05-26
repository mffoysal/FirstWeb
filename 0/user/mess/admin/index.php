<?php include "includes/admin_header.php";?>
<?php include "includes/admin_navigation.php";?>
    <div id="wrapper">
        

        <div id="page-wrapper" style="    background: linear-gradient(to right, hsl(175, 100%, 50%), hsl(155, 100%, 50%));">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Loged in as 
                           
                            <small><?php echo $_SESSION['name'];?></small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">ড্যাশবোর্ড</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> ড্যাশবোর্ড
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                       <h3 style="text-align:center;padding-bottom:20px;">প্রতিদিনের মিল বোর্ড</h3>
                       
                        <table style="border:1px solid black; border-radius:0%;" class="table m-auto bg-info table-hover table-striped table-borderd border-warning ">
            <thead style="background:gree" class="bg-primary">
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
                $today = date("Y-m-d");
                $messid=$_SESSION['mess_id'];
                $query = "SELECT * FROM meal_table WHERE meal_date='$today' AND mess_id='{$messid}' ";
                $select_query = mysqli_query($connection,$query);
                $total_morning=0;
                $total_launch=0;
                $total_dinner=0;
                $all= 0;
                while($row = mysqli_fetch_assoc($select_query)){
                    $name= $row['member_name'];
                    $mMorning=  $row['breakfast'];
                    $mLaunch= $row['launch'];
                    $mDinner= $row['dinner'];
                    $PTotal = $mMorning + $mLaunch + $mDinner;
                    @$total_morning+= $mMorning;
                    @$total_launch+= $mLaunch;
                    @$total_dinner+= $mDinner;
                    @$all+= $PTotal;
                    
                    
                  
                  
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$mMorning</td>";
                    echo "<td>$mLaunch</td>";
                    echo "<td>$mDinner</td>";
                    echo "<td>$PTotal</td>";
                    echo "</tr>";

                }
  
               

                ?>
            </tbody>
            <thead style="background:gree" class="bg-primary">
                <th>
                    মোটঃ
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
                    <?php echo @$all;?>
                </th>
            </thead>
        </table>
        
        
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        <footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2021 Developed By  Farhad Foysal</h5>
                </div>
            </div>
        </footer>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php";?>