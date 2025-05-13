

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Flintec | Login in to Visual Display</title>
        <!-- meta tags -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
              Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
        <!-- /meta tags -->
        <!-- custom style sheet -->
        <link href="style.css" rel="stylesheet" type="text/css" />
        <!-- /custom style sheet -->
        <!-- fontawesome css -->

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <script src="../js/sweetalert.js"></script>

    </head>


    <body>

        <br><br>
        <div style="margin-top:8%"></div>
        <div class="w3l-login-form">
            <h2 style="color:white">Snow Ball Auto AC</h2>
            <form id="submitForm">


                <div class="w3l-form-group">
                    <label>Username:</label>
                    <div class="group">
                        <i class="fa fa-user"></i>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username*" />

                    </div>
                </div>
                <div class="w3l-form-group">
                    <label>Password:</label>
                    <div class="group">
                        <i class="fa fa-lock"></i>
                        <input class="form-control" type="password" name="Password" id="logPssword" placeholder="Password*" />

                    </div>
                </div>

                <button id="login" type="button" >Login</button>

            </form>
        </div>



        <script>



            $(document).on('click', "#login", function() {

                var username = $("#username").val();
                var password = $("#logPssword").val();

                $.ajax({
                    type: "post",
                    url: "login_validate.php",
                    datatype: "json",
                    data: {username: username, password: password},
                    success: function(result) {

                        console.log(result);
                        if (result == 0) {
                            $("#submitForm")[0].reset();
                            swal("Attention!", "Invalid username or password", "warning");
                            return false;
                        }
                        else if (result == 1) {
                            $("#submitForm")[0].reset();
                            
                            swal("Attention!", "Your Account has been deleted by admin", "warning");
                            return false;

                        }
                        else if (result == 2) {
                            swal("Successfull!", "Your are logging to the system!", "success");
                            setTimeout(location.replace("../index.php?overview"),5000);

                        }

                    }
                });
            });


        </script>


    </body>

</html>