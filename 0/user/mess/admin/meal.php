<?php include "functions.php";?>
    <?php include "includes/admin_header.php";?>

    <div id="wrapper" style="background:gree" class="bg-">

        <?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper" style="    background: linear-gradient(to right, hsl(175, 100%, 50%), hsl(155, 100%, 50%));" class="bg-primar">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <?php
                        
                        if(isset($_GET['source'])){
                           $source =  $_GET['source'];

                        }
                        else{
                            $source = '';
                        }
                                switch ($source) {
                                case 'add_meal':
                                    include "includes/add_meal.php";
                                       
                                    break;
                                        
                                case 'my_meal':
                                    include "includes/my_meal.php";
                                       
                                    break;
                                        
                                    case 'edit_meal':
                                    include "includes/edit_meal.php";
                                       
                                    break;
                                     
                                
                                default:
                                    include "includes/view_all_meal.php";
                                    break;
                            }

                        
                        ?>
                        
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