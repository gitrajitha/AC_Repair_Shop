<?php
session_start();

include("includes/db.php");


if(!isset($_SESSION['username'])){
    
  

echo "<script>window.open('../main/Login/login.php','_self')</script>";

}
else {
?>





<!DOCTYPE html>
<html>

    <head>

        <title>Ac Shop</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">
       <link rel="stylesheet" href="css/animate.min.css">

        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="js/sweetalert.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>



    </head>

    <body>


        <div id="wrapper"><!-- wrapper Starts -->

            <?php include("includes/sidebar.php"); ?>

            <div id="page-wrapper"><!-- page-wrapper Starts -->

                <div class="container-fluid"><!-- container-fluid Starts -->

                    <?php
                    if (isset($_GET['overview'])) {

                        include("dashboard.php");
                    }

                    if (isset($_GET['invoice'])) {

                        include("invoice.php");
                    }

                    if (isset($_GET['grn'])) {

                        include("grn.php");
                    }

                    if (isset($_GET['managestock'])) {

                        include("managestock.php");
                    }

                    if (isset($_GET['managedebits'])) {

                        include("managedebits.php");
                    }

                    if (isset($_GET['viewcustomers'])) {

                        include("viewcustomers.php");
                    }

                    if (isset($_GET['managecredits'])) {

                        include("managecredits.php");
                    }

                    if (isset($_GET['supplier'])) {

                        include("supplier.php");
                    }
                    if (isset($_GET['income_expense'])) {

                        include("income_expense.php");
                    }
                     if (isset($_GET['addusers'])) {

                        include("add_users.php");
                    }
                     if (isset($_GET['viewusers'])) {

                        include("view_users.php");
                    }
                    ?>

                </div><!-- container-fluid Ends -->

            </div><!-- page-wrapper Ends -->

        </div><!-- wrapper Ends -->


        <!-- Modal -->
        <div class="modal fade" id="modallowqty" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center" id="index_modaltitle"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body"><!--panel-body starts-->
                            <div id="notifyqty_modalcontent"

                        </div><!--panel-body Ends-->
                    </div>

                </div>

            </div>
        </div> 


        <script src="js/bootstrap.min.js"></script>


 
</body>


</html>

<?php //}  ?>

<script>



   setInterval(getdataindex(), 1000*60);


    $("#notifyqty").click(function() {

        $.ajax({
            url: "index_getmodalcontent.php",
            method: "POST",
            dataType: "text",
            success: function(data) {

                $('#notifyqty_modalcontent').html(data);
                $('#index_modaltitle').text("Low Qty Level Exceeded Items");
                $("#modallowqty").modal("show");
            }
        });
    });
    function getdataindex() {

        $.ajax({
            url: "index_getdata.php",
            method: "POST",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                if (data[0].lowqtyitem == 0) {
                    document.getElementById("low_qty").style.display = "none";
                } else {
                    document.getElementById("low_qty").style.display = "block";
                    document.getElementById("low_qty").innerHTML = data[0].lowqtyitem;
                }
                if(data[0].usertype =="Admin"){
                    document.getElementById("totcustomers").innerHTML = data[0].customercount;
                document.getElementById("totproducts").innerHTML = data[0].itemqty;
                document.getElementById("totsuppliers").innerHTML = data[0].suppliercount;
                }else{
                
                document.getElementById("totsuppliers").innerHTML = data[0].suppliercount;
                }
                




            }
        });
    }

    setInterval(gettimeandate, 1000);

    function gettimeandate() {
       var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var date = yyyy + '-' + mm + '-' + dd;
        
        var today = new Date();
        var time = String(today.getHours()).padStart(2, '0') + ":" + String(today.getMinutes()).padStart(2, '0') + ":" + String(today.getSeconds()).padStart(2, '0');
        document.getElementById("gettodaydate").innerHTML = date;
        document.getElementById("gettodaytime").innerHTML = time;
    }



</script>

<?php } ?>