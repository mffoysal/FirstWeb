<h3 style="text-align:center;padding-bottom:20px;">সদস্যদের চলতি মাসের খরচ</h3>
                           <table style="border:1px solid black; border-radius:1%;" class="table m-auto bg-info table-hover table-striped table-borderd border-warning ">
                            <thead style="background:gree" class="bg-primary">
                                <th>
                                    নাম
                                </th>
                                <th>
                                    সদস্য আইডি
                                </th>
                                <th>
                                    পরিমান(টাকা)
                                </th>
                                <th>
                                    তারিখ
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
                            </thead>
                            <tbody>
                                
                <?php
                 $first_day = date('Y-m-01'); 
                 $last_day  = date('Y-m-t');
                 $messid=$_SESSION['mess_id'];
                                
                $query = "SELECT * FROM mess_expense WHERE expense_date >= '{$first_day}' and expense_date <= '{$last_day}' and mess_id='{$messid}' ";
                $expense_select = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($expense_select)){
                    $post_mid = $row['mid'];
                    $exdate = $row['expense_date'];
                    echo "<tr>";
                    echo "<td>".$row['member_name']."</td>";
                    echo "<td>".$row['mid']."</td>";
                    echo "<td>".$row['amount']."</td>";
                    echo "<td>".$row['expense_date']."</td>";
                    if(isset($_SESSION['actype'])){
                                    $mem_role = $_SESSION['actype'];
                                    if($mem_role == 'mentor'){
                                        ?>
                                        
                                      <td><a href='expenses.php?source=edit_expenses&mem_id=<?php echo $post_mid;?>&ex_date=<?php echo $exdate;?>'>Edit</a></td>
                                        
                                        <?php
                                    }
                                }
                    
                    echo "</tr>";
                }
                ?>
                                
                            </tbody>
                        </table>