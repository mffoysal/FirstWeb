<br>
<br>
    <table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-info table-hover table-striped table-borderd border-warning ">

    <thead style="background:gree" class="bg-primary">
       <tr>
            <th>ID</th>
        <th>
            Date
        </th>
        <th>
            Member
        </th>
        <th>
            Morning
        </th>
        <th>
            Launch
        </th>
        <th>
            Dinner
        </th>
        <?php
                                if(isset($_SESSION['actype'])){
                                    $mem_role = $_SESSION['actype'];
                                    if($mem_role == 'mentor'){
                                        ?>
                                        
                                        <th>
                                            Edit
                                        </th>
                                        
                                        <?php
                                    }
                                }
                            ?>
       </tr>
    </thead>


    <tbody>
        <?php
        $first_day = date('Y-m-01'); 
        $last_day  = date('Y-m-t');
        $messid=$_SESSION['mess_id'];

        $query = "SELECT * FROM meal_table WHERE meal_date >= '{$first_day}' AND meal_date <= '{$last_day}' AND mess_id='{$messid}' ";
        $select_query = mysqli_query($connection,$query);
        while($row= mysqli_fetch_assoc($select_query)){
            $post_id = $row['id']; 
            $post_name = $row['member_name']; 
            $post_date = $row['meal_date']; 
            $post_breakfast = $row['breakfast']; 
            $post_launch = $row['launch']; 
            $post_breakfast = $row['breakfast']; 
            $post_dinner = $row['dinner']; 
            $post_mid = $row['mid'];
       
            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_date</td>";
            echo "<td>$post_name</td>";
            echo "<td>$post_breakfast</td>";
            echo "<td>$post_launch</td>";
            echo "<td>$post_dinner</td>";
             if(isset($_SESSION['actype'])){
                                    $mem_role = $_SESSION['actype'];
                                    if($mem_role == 'mentor'){
                                        ?>
                                        
                                      <td><a href='meal.php?source=edit_meal&mem_id=<?php echo $post_mid;?>&meal_dt=<?php echo $post_date;?>'>Edit</a></td>
                                        
                                        <?php
                                    }
                                }
           
            echo "</tr>";
        }
        
        ?>
    </tbody>
    
</table>
<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2021 Developed By  Farhad Foysal</h5>
                </div>
            </div>
        </footer>
