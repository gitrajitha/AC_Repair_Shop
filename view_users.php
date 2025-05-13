

<?php
//if (!isset($_SESSION['admin_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">User Details</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-industry"></i>  Update/Delete User

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<input class="col-md-12" style="font-size: 20px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for user's first names.." title="Type in a name">
<br><br>


<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> View Users

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                <div class="table-responsive" ><!-- table-responsive Starts -->

                    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->



                        <span id="result"></span>
                        <div id="live_data"></div>          




                    </table><!-- table table-bordered table-hover table-striped Ends -->

                </div><!-- table-responsive Ends -->




            </div><!-- panel-body Ends -->

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-12 Ends -->
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 90%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Customer Details</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body"><!--panel-body starts-->

                    <form id="insert_form" class="form-horizontal" method="POST" ><!-- form-horizantal starts-->
                        <div class="form-group"><!--form-group starts-->

                            <label style="color: red; display:none"  id="userid" ></label>

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

                                <button type="button" id="changepw" class="btn btn-primary form-control">Change Password</button>

                            </div>

                        </div><!-- form-group Ends -->                       


                    </form><!-- form-horizantal Ends-->

                </div><!--panel-body Ends-->
            </div>

        </div>

    </div>
</div> 

<div  hidden="" id="usertypeviewuser"><?php echo $_SESSION['type'] ?></div>
<?php
$username = $_SESSION['username'];
$sql = "SELECT * FROM users where username = '$username'";
$result = mysqli_query($Con, $sql);
$row = mysqli_fetch_array($result);
$id = $row['id'];
?><div  hidden="" id="usertypeviewuserid"><?php echo $id ?></div>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    $(document).ready(function() {
        function fetch_data()
        {
            $.ajax({
                url: "view_user_select.php",
                method: "POST",
                success: function(data) {
                    //console.log(data);
                    $('#live_data').html(data);

                }
            });
        }
        fetch_data();



        function edit_data(id, text, column_name)
        {
            $.ajax({
                url: "view_user_edit.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function(data) {
                    //alert(data);
                    $('#result').html("<div class='alert alert-success'>" + data + "</div>");
                }
            });
        }
        $(document).on('blur', '.usertypetable', function() {
            var id = $(this).data("id4");
            var selectid = "usertype" + id;
            var val = $("#usertypeviewuser").text();
            if (val == "Other") {
                swal("Attention!", "You are not allowed to change the userType", "warning")
                fetch_data();
                return false;
            } else {
                var sel = document.getElementById(selectid).value;
                edit_data(id, sel, "usertype");
            }


        });

        $(document).on('blur', '.fname', function() {
            var id = $(this).data("id1");
            var val = $(this).text();
            edit_data(id, val, "fname");
        });
        $(document).on('blur', '.lname', function() {
            var id = $(this).data("id2");
            var val = $(this).text();
            edit_data(id, val, "lname");
        });
        $(document).on('blur', '.username', function() {
            var id = $(this).data("id3");
            var val = $(this).text();
            var valid = $("#usertypeviewuserid").text();
            if (id != valid) {
                swal("Attention!", "You cannot change another one's username", "warning")
                fetch_data();
                return false;
            } else {
                $.ajax({
                    url: "add_user_checkavailability.php",
                    method: "POST",
                    data: {username: val},
                    dataType: "text",
                    success: function(data) {

                        if (data === "Not Available") {
                            edit_data(id, val, "username");
                        } else {
                            swal("Attention!", "Your username is alredy taken please select another one", "warning")
                            fetch_data();
                            return false;
                        }

                    }
                });
            }
        });

        $(document).on('click', '.btn_changepw', function() {

            var id = $(this).data("id6");
             var valid = $("#usertypeviewuserid").text();
            if (id != valid) {
                swal("Attention!", "You cannot change another one's Password", "warning")
                fetch_data();
                return false;
            }else{
                document.getElementById('userid').innerHTML = id;
            $("#myModal").modal("show");
            }
            

        });
        $(document).on('keyup', '.passwordmatch', function() {
            passwordmatching();
        });

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


        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id5");
             var val = $("#usertypeviewuser").text();
            if (val == "Other") {
                swal("Attention!", "You are not allowed to delete users", "warning")
                fetch_data();
                return false;
            } else{
               swal({
            title: "Are you sure?",
                    text: "Once deleted user will not be able to log to the system!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
            })
                    .then((willDelete) => {
                    if (willDelete) {
                    $.ajax({
                    url: "view_user_delete.php",
                            method: "POST",
                            data: {id: id},
                            dataType: "text",
                            success: function(data) {
                                swal("Poof! User has been deleted!", {
                                    icon: "success",
                                });
                                fetch_data();
                            }
                    });
                    } else {
                    swal("Information....", "user is safe", "info");
                    }
                }); 
            }
            
        });
    });

    $(document).on('click', '#changepw', function() {


        var id = $('#userid').text();
        console.log(id);
        var password = $('#pw').val();
        var confirmpassword = $('#cpw').val();
        var passwordvalidation = $('#password_validation').text();

        if (password == "") {
            swal("Attention!", "Please fill the password", "warning")
            return false;

        } else if (confirmpassword == "") {
            swal("Attention!", "Please confirm your password", "warning")
            return false;
        } else if (passwordvalidation == "Password Mismatched!") {
            swal("Attention!", "Your password is mismatching with confirm password", "warning")
            return false;
        } else if (password != confirmpassword) {
            swal("Attention!", "Your password is mismatching with confirm password", "warning")
            return false;
        }


        $.ajax({
            url: "view_user_updatepassword.php",
            method: "POST",
            data: {password: password, id: id},
            dataType: "text",
            success: function(data) {
                swal(data);
                swal("Successfull!", "You succssfully change your password!", "success");
                setTimeout(function() {
                    location.reload();
                }, 3000);

            }
        });


    });


</script>



<?php
//} ?>