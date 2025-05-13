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
        <title>View Customers</title>






    </head>

    <body>

        <div class="row"><!--row starts-->

            <div class="col-lg-12"><!--col-lg-12 starts-->

                <ol class="breadcrumb"><!--breadcrumb starts-->

                    <li class="active">
                        <i class="fa fa-dashboard"></i>Customers/Add Customers
                    </li>

                </ol><!--breadcrumb Ends-->

            </div><!--col-lg-12 Ends-->

        </div><!--row Ends-->

        <div class="row"><!--2 row starts-->

            <div class="col-lg-12"><!--col-lg-12 starts-->

                <div class="panel panel-default"><!--panel panel-default starts-->

                    <div class="panel-heading"><!--panel-heading starts-->

                        <h3 class="panel-title">

                            <i class="fa fa-money fa-fw"></i>Add Customers

                        </h3>

                    </div><!--panel-heading Ends-->

                    <div class="panel-body"><!--panel-body starts-->

                        <form id="insert_form" class="form-horizontal" method="POST" ><!-- form-horizantal starts-->



                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Repairing Product Type</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <select  name="type" id="type" class="form-control" required>

                                        <option>Select Type</option>
                                        <option>Vehicle</option>
                                        <option>Refrigerator(Fridge)</option>
                                        <option>Air Condition(AC)</option>                                         

                                    </select>

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->
                            <center>
                                <label style="color: red; display:none"  id="type_validation" ></label>
                            </center>

                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Repairing Product Name</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="text" name="productname" id="productname" class="form-control" required>

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->


                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Product No</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="text" name="productno" id="productno" class="form-control productnoclass" required>

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->
                            <center>
                                <label style="color: red; display:none"  id="productno_validation" ></label>
                            </center>

                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Customer Name</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="text" name="cusname" id="cusname" class="form-control" required >

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->


                            <div class="form-group"><!--form-group starts-->

                                <label class="col-md-3 control-label">Contact Number</label>

                                <div class="col-md-6"><!--col-md-6 starts-->

                                    <input type="text" name="cno" id="cno" class="form-control" maxlength="10" required  >

                                </div><!--col-md-6 Ends-->

                            </div><!--form-group Ends-->


                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-3 control-label" ></label>

                                <div class="col-md-6" >

                                    <button type="button" id="addcustomer" class="btn btn-primary form-control">Add Customer</button>

                                </div>

                            </div><!-- form-group Ends -->                       

                        </form><!-- form-horizantal Ends-->

                    </div><!--panel-body Ends-->

                </div><!--panel panel-default Ends-->

            </div><!--col-lg-12 Ends-->

        </div><!--2 row Ends-->
        <div class='row'>
            <div class='col-md-12'>
                <div class="ui-widget">  
                    <div class="col-md-3">
                        <input style="font-size: 17px;" type="text" id="myInput1" onkeyup="myFunction(1)" placeholder="Search by Product No.." title="Type in a name">
                        &nbsp;&nbsp;  
                    </div>
                    <div class="col-md-3">
                        <input style="font-size: 17px;" type="text" id="myInput2" onkeyup="myFunction(2)" placeholder="Search by Product Type.." title="Type in a name">
                        &nbsp;&nbsp;  
                    </div>
                    <div class="col-md-3">
                        <input style="font-size: 17px;" type="text" id="myInput4" onkeyup="myFunction(4)" placeholder="Search by Customer Name.." title="Type in a name">
                        &nbsp;&nbsp;  
                    </div>
                    <div class="col-md-3">
                        <input style="font-size: 17px;" type="text" id="myInput5" onkeyup="myFunction(5)" placeholder="Search by Contact No.." title="Type in a name">
                    </div>
                </div>
            </div>
        </div>



        <div class="row" ><!-- 3 row Starts -->

            <div class="col-lg-12" ><!-- col-lg-12 Starts -->

                <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

                    <div class="panel-heading" ><!-- panel-heading Starts -->

                        <h3 class="panel-title" ><!-- panel-title Starts -->

                            <i class="fa fa-money fa-fw" ></i> View Customers

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

                            <div id="modalcontent"></div>
                            
                        </div><!--panel-body Ends-->
                    </div>
                   
                </div>

            </div>
        </div> 
        




        <?php //}  ?>


        <script>

            $(document).on('click', '#addcustomer', function() {


                var type = $('#type').val();
                var productname = $('#productname').val();
                var productno = $('#productno').val();
                var productnovalidation = $('#productno_validation').text();
                var cusname = $('#cusname').val();
                var cno = $('#cno').val();



                if (type == "Select Type") {

                    document.getElementById('type_validation').style = "inline";
                    document.getElementById('type_validation').style.color = "red";
                    document.getElementById('type_validation').innerHTML = "Please fill the Product Type";
                    return false;
                } else if (productno == "" || productnovalidation != "Not Available") {
                    swal("Attention!", "Product No is already in the system or you haven't mention it", "warning");
                    return false;
                } else if (cusname == "") {
                    swal("Attention!", "Please fill the customer name", "warning")
                    return false;

                } else if (cno == "" || cno.length != 10) {
                    swal("Attention!", "customer contact no is not valid, contact no should have 10 elements", "warning");
                    return false;
                }
                $.ajax({
                    url: "viewcustomers_insertdata.php",
                    method: "POST",
                    data: {type: type, productname: productname, productno: productno, cusname: cusname, cno: cno},
                    dataType: "text",
                    success: function(data) {
                        swal(data);
                        swal("Successfull!", "You inserted customer!", "success");
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }
                });


            });

            function getkeydownavaialbility(event, ui) {

                var productno = ui.item.value;
                $.ajax({
                    url: "viewcustomersgetproductno.php",
                    method: "POST",
                    data: {productno: productno},
                    dataType: "text",
                    success: function(data) {
                        document.getElementById('productno_validation').style = "inline";
                        if (data === "Not Available") {

                            document.getElementById('productno_validation').style.color = "green";
                            document.getElementById('productno_validation').innerHTML = data;

                        } else {

                            document.getElementById('productno_validation').style.color = "red";
                            document.getElementById('productno_validation').innerHTML = data;
                        }

                    }
                });
            }
            function getavaialbility() {

                var productno = $('#productno').val();
                var newproductno = productno.toUpperCase();

                $('#productno').val(newproductno);

                $.ajax({
                    url: "viewcustomersgetproductno.php",
                    method: "POST",
                    data: {productno: productno},
                    dataType: "text",
                    success: function(data) {
                        document.getElementById('productno_validation').style = "inline";
                        if (data === "Not Available") {

                            document.getElementById('productno_validation').style.color = "green";
                            document.getElementById('productno_validation').innerHTML = data;

                        } else {

                            document.getElementById('productno_validation').style.color = "red";
                            document.getElementById('productno_validation').innerHTML = data;
                        }

                    }
                });

            }
            document.getElementById("productno").addEventListener('keydown', function(event)
            {
                // if the keyCode is 32 ( space key was pressed )
                if (event.keyCode === 32) {
                    // prevent default behaviour
                    event.preventDefault();
                    swal("Attention!", "Space is not allow for the product no", "warning")
                    return false;
                }
            });


            $(document).on('keyup', '.productnoclass', function() {
                getavaialbility();
            });

            $(document).on('keydown', '.productnoclass', function() {

                var availableTags = [];
                $.ajax({
                    url: "viewcustomersgetproductnolist.php",
                    method: "POST",
                    dataType: "JSON",
                    success: function(response) {
                        var len = response.length;
                        for (var i = 0; i < len; i++) {
                            availableTags.push(response[i].productno);
                        }

                    }
                });
                // Initialize jQuery UI autocomplete
                $('#productno').autocomplete({
                    source: availableTags,
                    select: getkeydownavaialbility


                });
            });

            fetch_data();
            function fetch_data() {

                $.ajax({
                    url: "viewcustormerselect.php",
                    method: "POST",
                    success: function(data) {

                        $('#live_data').html(data);

                    }
                });
            }

            function myFunction(id) {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput" + id);
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[id];
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

            $(document).on('click', '.btn_view', function() {
                var id = $(this).data("id6");
                
                $.ajax({
                    url: "viewcustomer_getmodalcontent.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function(data) {
console.log(data);
                       $('#modalcontent').html(data);
                        $("#myModal").modal("show");
                    }
                });         
               
            });

            $(document).on('blur', '.productdescription', function() {
                var id = $(this).data("id3");
                var val = $(this).text();
                edit_data(id, val, "product_description");
            });

            $(document).on('blur', '.customername', function() {
                var id = $(this).data("id4");
                var val = $(this).text();
                edit_data(id, val, "customer_name");
            });
            $(document).on('blur', '.contactnumber', function() {
                var id = $(this).data("id5");
                var val = $(this).text();
                edit_data(id, val, "customer_contact_no");
            });
            $(document).on('blur', '.productno', function() {
                var id = $(this).data("id1");
                var val = $(this).text();
                edit_data(id, val, "product_no");
            });
            function edit_data(id, text, column_name)
            {

                $.ajax({
                    url: "viewcustomer_edit.php",
                    method: "POST",
                    data: {id: id, text: text, column_name: column_name},
                    dataType: "text",
                    success: function(data) {

                        $('#result').html("<div class='alert alert-success'>" + data + "</div>");
                        fetch_service_data();
                    }
                });
            }


        </script>
    </body>
</html>
