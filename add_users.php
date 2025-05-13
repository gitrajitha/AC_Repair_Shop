<?php
//if(!isset($_SESSION['username'])){
//
//echo "<script>window.open('login.php','_self')</script>";
//
//} else {
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Add Users</title>






    </head>

    <body>

        <div class="row"><!-- 1 row Starts -->

            <div class="col-lg-12"><!-- col-lg-12 Starts -->

                <h1 class="page-header">Add User</h1>

                <ol class="breadcrumb"><!-- breadcrumb Starts -->

                    <li class="active">

                        <i class="fa fa-industry"></i>  User Details

                    </li>

                </ol><!-- breadcrumb Ends -->

            </div><!-- col-lg-12 Ends -->

        </div><!-- 1 row Ends -->


        <div class="row"><!--2 row starts-->

            <div class="col-lg-12"><!--col-lg-12 starts-->

                <div class="panel panel-default"><!--panel panel-default starts-->

                    <div class="panel-heading"><!--panel-heading starts-->

                        <h3 class="panel-title">

                            <i class="fa fa-money fa-fw"></i>Add Users

                        </h3>

                    </div><!--panel-heading Ends-->

                    <div class="panel-body"><!--panel-body starts-->

                        <form id="insert_form" class="form-horizontal" method="POST" ><!-- form-horizantal starts-->



                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">First Name</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="text" name="fname" id="fname" class="form-control" required>

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->


                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Last Name</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="text" name="lname" id="lname" class="form-control " required>

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->


                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Username</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="text" name="username" id="username" class="form-control usernamematch" required >

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->
                            <center>
                                <label style="color: red; display:none"  id="username_validation" ></label>
                            </center>

                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">User Type</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <select  name="type" id="type" class="form-control" required>

                                        <option>Select Type</option>
                                        <option> Admin </option>
                                        <option>Other</option>


                                    </select>

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->
                            <center>
                                <label style="color: red; display:none"  id="type_validation" ></label>
                            </center>

                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Password</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="password" name="pw" id="pw" class="form-control" required  >

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->

                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label"> Confirm Password</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="password" name="cpw" id="cpw" class="form-control passwordmatch" required  >

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->
                            <center>
                                <label style="color: red; display:none"  id="password_validation" ></label>
                            </center>

                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-3 control-label" ></label>

                                <div class="col-md-6" >

                                    <button type="button" id="adduser" class="btn btn-primary form-control">Add User</button>

                                </div>

                            </div><!-- form-group Ends -->                       

                        </form><!-- form-horizantal Ends-->

                    </div><!--panel-body Ends-->

                </div><!--panel panel-default Ends-->

            </div><!--col-lg-12 Ends-->

        </div><!--2 row Ends-->


        <?php //}  ?>


        <script>

            $(document).on('click', '#adduser', function() {


                var type = $('#type').val();
                var username = $('#username').val();
                var password = $('#pw').val();
                var confirmpassword = $('#cpw').val();
                var fname = $('#fname').val();
                var lname = $('#lname').val();


                var uservalidation = $('#username_validation').text();
                var passwordvalidation = $('#password_validation').text();

                if (fname == "") {
                    swal("Attention!", "Please fill the First Name", "warning")
                    return false;


                } else if (lname == "") {
                    swal("Attention!", "Please fill the Last Name", "warning")
                    return false;

                } else if (username == "") {
                    swal("Attention!", "Please fill the username", "warning")
                    return false;


                } else if (type == "Select Type") {

                    document.getElementById('type_validation').style = "inline";
                    document.getElementById('type_validation').style.color = "red";
                    document.getElementById('type_validation').innerHTML = "Please fill the User Type";
                    return false;

                } else if (password == "") {
                    swal("Attention!", "Please fill the password", "warning")
                    return false;

                } else if (confirmpassword == "") {
                    swal("Attention!", "Please confirm your password", "warning")
                    return false;
                } else if (uservalidation === "Username is alredy taken") {
                    swal("Attention!", "Your username is alredy taken please select another one", "warning")
                    return false;
                } else if (passwordvalidation == "Password Mismatched!") {
                    swal("Attention!", "Your password is mismatching with confirm password", "warning")
                    return false;
                } else if (password != confirmpassword) {
                    swal("Attention!", "Your password is mismatching with confirm password", "warning")
                    return false;
                }


                $.ajax({
                    url: "add_users_insertdata.php",
                    method: "POST",
                    data: {fname: fname, lname: lname, username: username, type: type, password: password},
                    dataType: "text",
                    success: function(data) {
                        swal(data);
                        swal("Successfull!", "You inserted user!", "success");
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                        
                    }
                });


            });

            $(document).on('keyup', '.passwordmatch', function() {
                passwordmatching();
            });
            $(document).on('keyup', '.usernamematch', function() {
                getavaialbility();
            });


            function getavaialbility() {

                var username = $('#username').val();

                $.ajax({
                    url: "add_user_checkavailability.php",
                    method: "POST",
                    data: {username: username},
                    dataType: "text",
                    success: function(data) {

                        if (data === "Not Available") {

                            document.getElementById('username_validation').style.display = "none";
                            document.getElementById('username_validation').innerHTML = "";

                        } else {
                            document.getElementById('username_validation').style = "inline";
                            document.getElementById('username_validation').style.color = "red";
                            document.getElementById('username_validation').innerHTML = "Username is alredy taken";
                        }

                    }
                });

            }


            function passwordmatching() {

                var pw = $('#pw').val();
                var cpw = $('#cpw').val();
                var cpwlength = cpw.length;
                var pwlength = pw.length;
                for (var i = 0; i < cpwlength; i++) {
                    if (pw[i] != cpw[i]) {
                        document.getElementById("password_validation").style.display = "block";
                        document.getElementById("password_validation").style.color = "red";
                        document.getElementById("password_validation").innerHTML = "Password Mismatched!";
                    } else {
                        if (cpwlength == pwlength) {
                            if (pw == cpw) {
                                document.getElementById("password_validation").style.display = "block";
                                document.getElementById("password_validation").style.color = "green";
                                document.getElementById("password_validation").innerHTML = "Password Matched!";

                            }
                        } else {
                            document.getElementById("password_validation").style.display = "none";

                        }
                    }
                }




            }



        </script>
    </body>
</html>
