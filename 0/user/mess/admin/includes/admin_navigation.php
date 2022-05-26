<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="images/avatar.png" alt="">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./meal.php?source=my_meal"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="../../mess.php"><i class="fa fa-fw fa-envelope"></i> EduMess</a>
                        </li>
                        <li>
                            <a href="../../../login.php"><i class="fa fa-fw fa-gear"></i> Main Dashboard</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="./includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div style="background: linear-gradient(to right, hsl(600, 100%, 50%), hsl(55, 90%, 60%));" class="collapse navbar-collapse navbar-ex1-collapse">
            <!-- <div style="background-color: #ffe53b;
   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);" class="collapse navbar-collapse navbar-ex1-collapse"> -->
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> ড্যাশবোর্ড</a>
                    </li>
                    <li>
                        <a href="expenses.php"><i class="fa fa-fw fa-table"></i> খরচ</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> মিল হিসাব <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="./meal.php">সবার মিল দেখুন</a>
                            </li>
                            <li>
                                <a href="./meal.php?source=add_meal">Add Your Meal</a>
                            </li>
                            <li>
                                <a href="./meal.php?source=my_meal">আমার মিল হিসাব</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i> Members <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="./members.php">সদস্যগণ</a>
                            </li>
                            <?php
                                if(isset($_SESSION['actype'])){
                                    $mem_role = $_SESSION['actype'];
                                    if($mem_role == 'mentor'){
                                        ?>
                                        
                                       <li>
                                <a href="./members.php?source=add_member">নতুন সদস্য যোগ</a>
                            </li>
                                        
                                        <?php
                                    }
                                }
                            ?>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="summery.php"><i class="fa fa-fw fa-desktop"></i> মিল বিবরণ</a>
                    </li>
                    <li>
                        <a href="query.php"><i class="fa fa-fw fa-wrench"></i> কুয়েরি কুরুন</a>
                    </li>
<!--
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
-->
<!--
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>