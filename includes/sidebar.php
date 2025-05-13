<?php
if (!isset($_SESSION['username'])) {

    echo "<script>window.open('../main/Login/login.php','_self')</script>";
} else {
    $usertype = $_SESSION['type'];
    ?>


    <nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

        <div class="navbar-header" ><!-- navbar-header Starts -->

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


                <span class="sr-only" >Toggle Navigation</span>

                <span class="icon-bar" ></span>

                <span class="icon-bar" ></span>

                <span class="icon-bar" ></span>


            </button><!-- navbar-ex1-collapse Ends -->

            <a style="color: #99ff99" class="navbar-brand" href="index.php?overview" >SNOW-BALL AUTO AC</a>


        </div><!-- navbar-header Ends -->

        <ul class="nav navbar-nav" style="text-align: center">
            <li><a style="color: #222222" href="#">date</a></li>
            <li><a style="color: #222222" href="#">date</a></li>
            <li><a style="color: #222222" href="#">date</a></li>
            <li><a style="color: #222222" href="#">date</a></li>
            <li><a style="color: #222222" href="#">date</a></li>
            <li><a style="font-size: 20px" href="#">DATE:</a></li>
            <li class="active"><a  style="font-size: 20px" id="gettodaydate" href="#"></a></li>
            <li><a style="color: #222222" href="#">date</a></li>
            <li><a style="font-size: 20px" href="#">Time:</a></li>
            <li class="active"><a  style="font-size: 20px" id="gettodaytime" href="#"></a></li>
        </ul>
        <ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

            <a href="#" class="notification" id="notifyqty" >
                <span>Notifications</span>
                <span class="badge" id="low_qty">0</span>
            </a>

            <li class="dropdown" ><!-- dropdown Starts -->

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

                    <i class="fa fa-user" ></i>&nbsp;
                    <?php echo $_SESSION['username']; ?> 

                    <b class="caret"></b>

                </a><!-- dropdown-toggle Ends -->

                <ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

                    <li><!-- li Starts -->

                        <a href="index.php?viewusers">

                            <i class="fa fa-fw fa-user" ></i> Profile


                        </a>

                    </li><!-- li Ends -->
 <?php if ($usertype == "Admin") { ?>
                    <li><!-- li Starts -->

                        <a href="index.php?managestock" >

                            <i class="fa fa-fw fa-cart-plus" ></i> Total Items 

                            <span class="badge" id="totproducts">  </span>

                        </a>

                    </li><!-- li Ends -->

                    <li><!-- li Starts -->

                        <a href="index.php?viewcustomers" >

                            <i class="fa fa-fw fa-address-card-o" ></i> Customers

                            <span class="badge" id="totcustomers">  </span>

                        </a>

                    </li><!-- li Ends -->
 <?php }?>
                    <li><!-- li Starts -->

                        <a href="index.php?supplier" >

                            <i class="fa fa-fw fa-address-book" ></i> Suppliers

                            <span class="badge" id="totsuppliers">   </span>

                        </a>

                    </li><!-- li Ends -->

                    <li class="divider"></li>

                    <li><!-- li Starts -->

                        <a href="logout.php">

                            <i class="fa fa-fw fa-power-off"> </i> Log Out

                        </a>

                    </li><!-- li Ends -->

                </ul><!-- dropdown-menu Ends -->




            </li><!-- dropdown Ends -->


        </ul><!-- nav navbar-right top-nav Ends -->



        <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

            <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->


                <br><br> 

                <li><!-- li Starts -->

                    <a href="index.php?overview">

                        <i class="fa fa-fw fa-dashboard"></i> DASHBOARD

                    </a>

                </li><!-- li Ends -->


                <li><!-- li Starts -->

                    <a href="index.php?invoice">

                        <i class="fa fa-fw fa-money"></i> INVOICE

                    </a>

                </li><!-- li Ends -->


                <li><!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#stock">

                        <i class="fa fa-fw fa-cart-plus"></i> STOCK

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="stock" class="collapse">

                        <li>
                            <a href="index.php?grn"> GRN </a>
                        </li>
                        <?php if ($usertype == "Admin") { ?>
                            <li>
                                <a href="index.php?managestock"> MANAGE STOCK </a>
                            </li>

                            <li>
                                <a href="index.php?managedebits"> MANAGE DEBITS </a>
                            </li>
                        <?php } ?>
                    </ul>

                </li><!-- li Ends -->


                <li><!-- li Starts -->
                    <?php if ($usertype == "Admin") { ?>
                        <a href="#" data-toggle="collapse" data-target="#customers">

                            <i class="fa fa-fw fa-address-card-o"></i> CUSTOMERS

                            <i class="fa fa-fw fa-caret-down"></i>


                        </a>
                    <?php } ?>
                    <ul id="customers" class="collapse">

                        <li>
                            <a href="index.php?viewcustomers"> VIEW CUSTOMERS </a>
                        </li>

                        <li>
                            <a href="index.php?managecredits"> MANAGE CUSTOMER'S CREDITS </a>
                        </li>

                    </ul>

                </li><!-- li Ends -->

                <li><!-- li Starts -->

                    <a href="index.php?supplier">

                        <i class="fa fa-fw fa-address-book"></i> VIEW SUPPLIER 

                    </a>

                </li><!-- li Ends -->


                <li><!-- li Starts -->
                    <?php if ($usertype == "Admin") { ?>

                        <a href="index.php?income_expense">

                            <i class="fa fa-fw fa-industry"></i> MANAGE INCOME/EXPENSES 

                        </a>
                    <?php } ?>
                </li><!-- li Ends -->


                <li><!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#users">

                        <i class="fa fa-fw fa-users"></i> MANAGE USERS

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="users" class="collapse">
                        <?php if ($usertype == "Admin") { ?>
                            <li>                           

                                <a href="index.php?addusers"> ADD USERS </a>

                            </li>
                        <?php } ?>
                        <li>
                            <a href="index.php?viewusers"> VIEW USERS </a>
                        </li>

                    </ul>

                </li><!-- li Ends -->


                <li><!-- li Starts -->

                    <a href="logout.php">

                        <i class="fa fa-fw fa-power-off"></i> Log Out

                    </a>

                </li><!-- li Ends -->

            </ul><!-- nav navbar-nav side-nav Ends -->

        </div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

    </nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>
