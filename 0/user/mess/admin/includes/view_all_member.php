<br>
<br>
   <table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-info table-hover table-striped table-borderd border-warning ">
    <thead style="background:gree" class="bg-primary">
        <th>
            নাম
        </th>
        <th>
            সদস্য আইডি
        </th>
        <th>
            সদস্য নম্বর
        </th>
        <th>
            একাউন্ট টাইপ
        </th>
        <?php
                                if(isset($_SESSION['actype'])){
                                    $mem_role = $_SESSION['actype'];
                                    if($mem_role == 'mentor'){
                                        ?>
                                        
                                        <th>
                                            Delete
                                        </th>
										<th>
											Edit
										</th>
                                        
                                        <?php
                                    }
                                }
                            ?>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users WHERE mess_id='$_SESSION[mess_id]' ";
        $select_member = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_member)){
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['unique_id']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['actype']."</td>";
            if(isset($_SESSION['actype'])){
                                    $mem_role = $_SESSION['actype'];
                                    if($mem_role == 'mentor'){
                                        ?>
                                        
                                        <td><a onClick="return confirm('are you sure want to delete?');" href="members.php?delete=<?php echo $row['unique_id'];?>">Delete</a></td>
										<td><a href="members.php?source=edit_member&mem_id=<?php echo $row['unique_id'];?>">Edit</a></td>
                                        
                                        <?php
                                    }
                                }
            echo "</tr>";
        }
        ?>
        <?php
        if(isset($_GET['delete'])){
                $the_post_id = $_GET['delete'];
                $query = "DELETE FROM users WHERE unique_id = {$the_post_id} ";
                $delete_query = mysqli_query($connection,$query);
                confirmQuery($delete_query);
                header("Location: members.php");
            }
        
        ?>
    </tbody>
</table>


<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2021 Developed By Farhad Foysal</h5>
                </div>
            </div>
        </footer>