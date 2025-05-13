

<?php
//if (!isset($_SESSION['admin_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Invoice</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-industry"></i>  Invoice Details

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Add Customer

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                <div class='row'>
                    <div class='col-md-12'>
                        <div class="ui-widget">

                            <table>
                                <tr>
                                    <td> <label for="type">Repairing Type:</label>      </td>
                                    <td>
                                        <select  name="type" id="type1" style="width: 175px" required>
                                            <option>Select Type</option>
                                            <option>Vehicle</option>
                                            <option>Refrigerator(Fridge)</option>
                                            <option>Air Condition(AC)</option>                                        
                                        </select>
                                    </td>

                                    <td><label for="productno">Product No: </label></td>
                                    <td>
                                        <input id="productno1" class="productno1">
                                        &nbsp;&nbsp;
                                    </td>

                                    <td> <label for="productdes">Product Description: </label></td>
                                    <td>
                                        <input id="productdes1" class="productdes1">
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: white">nnnn</td>
                                </tr>
                                <tr>
                                    <td> <label for="cusname">Customer Name: </label></td>
                                    <td>
                                        <input id="cusname1" class="cusname1">
                                        &nbsp;&nbsp; 
                                    </td>
                                    <td><label for="cusno">Contact No: </label></td>
                                    <td>
                                        <input id="cusno1" class="cusno1">
                                        &nbsp;&nbsp;
                                    </td>
                                    <td></td>
                                    <td><button id="addnewcustomer" style="width: 175px" class="btn btn-success">Add New Customer</button></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>





            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-12 Ends -->
</div>

<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Add Invoice Items

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                <table>
                    <tr>
                        <td width='50%'>Invoice ID:&nbsp;&nbsp;&nbsp</td>
                        <td width='50%'><b><div id="invoiceid"></div></b></td>
                    </tr>
                </table> 
                <br>


                <div class="table-responsive" ><!-- table-responsive Starts -->

                    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->



                        <span id="result"></span>
                        <div id="invoiceitemdata"></div>          




                    </table><!-- table table-bordered table-hover table-striped Ends -->

                </div><!-- table-responsive Ends -->




            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-12 Ends -->
</div>


<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Add Services

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                
                <div class="table-responsive" ><!-- table-responsive Starts -->

                    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->



                        <span id="serviceresult"></span>
                        <div id="invoiceservicedata"></div>          




                    </table><!-- table table-bordered table-hover table-striped Ends -->

                </div><!-- table-responsive Ends -->




            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-12 Ends -->
</div>


<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Cash Manage

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->             

                <div class='row'>
                    <div class='col-md-12'>
                        <div class="ui-widget">
                            <div class="col-md-4">
                                <label style="font-size: 20px; font-weight: normal" for="netamount">Net Amount: </label>&nbsp;&nbsp;
                                <b style="font-size: 20px">Rs.</b><input id="netamount" readonly style="font-size: 20px; font-weight: bold; border: none;" size='5'>

                            </div>
                            <div class="col-md-4">
                                &nbsp;&nbsp;
                                <label style="font-size: 20px; font-weight: normal" for="paidamount">Paid Amount: </label>&nbsp;&nbsp;
                                <input  style="font-size: 20px; font-weight: bold;" size="5" id="paidamount" class="paidamount">

                            </div>
                            <div class="col-md-4">
                                &nbsp;&nbsp;
                                <label for="balance" style="font-size: 20px; font-weight: normal">Balance: </label>
                                <b style="font-size: 20px">Rs.</b><input readonly style="font-size: 20px; font-weight: bold; border: none" size="5" id="balance">

                            </div>
                        </div>

                    </div><br><br><br>
                    <div class="col-md-3"></div>
                    <div  style="content: center" class="col-md-6">
                        <input type="button" value="Print Invoice" class="btn btn-primary form-control" onclick="printinvoice();">
                    </div>


                </div>






            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-12 Ends -->
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Customer</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body"><!--panel-body starts-->

                    <form id="insert_form" class="form-horizontal" method="POST" ><!-- form-horizantal starts-->



                        <div class="form-group"><!--form-group starts-->

                            <label class="col-md-4 control-label">Repairing Product Type</label>

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

                            <label class="col-md-4 control-label">Repairing Product Name</label>

                            <div class="col-md-6"><!--col-md-6 starts-->

                                <input type="text" name="productname" id="productname" class="form-control" required>

                            </div><!--col-md-6 Ends-->

                        </div><!--form-group Ends-->


                        <div class="form-group"><!--form-group starts-->

                            <label class="col-md-4 control-label">Product No</label>

                            <div class="col-md-6"><!--col-md-6 starts-->

                                <input type="text" name="productno" id="productno" class="form-control productnoclass" required>

                            </div><!--col-md-6 Ends-->

                        </div><!--form-group Ends-->
                        <center>
                            <label style="color: red; display:none"  id="productno_validation" ></label>
                        </center>

                        <div class="form-group"><!--form-group starts-->

                            <label class="col-md-4 control-label">Customer Name</label>

                            <div class="col-md-6"><!--col-md-6 starts-->

                                <input type="text" name="cusname" id="cusname" class="form-control" required >

                            </div><!--col-md-6 Ends-->

                        </div><!--form-group Ends-->


                        <div class="form-group"><!--form-group starts-->

                            <label class="col-md-4 control-label">Contact Number</label>

                            <div class="col-md-6"><!--col-md-6 starts-->

                                <input type="text" name="cno" id="cno" class="form-control" maxlength="10" required  >

                            </div><!--col-md-6 Ends-->

                        </div><!--form-group Ends-->


                        <div class="form-group" ><!-- form-group Starts -->



                            <div class="col-md-12" >

                                <button type="button" id="addcustomer" class="btn btn-primary form-control">Add Customer</button>

                            </div>

                        </div><!-- form-group Ends -->                       

                    </form><!-- form-horizantal Ends-->

                </div><!--panel-body Ends-->
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            </div>
        </div>

    </div>
</div> 
<?php
    include("includes/footer.php");
    ?>

<script>

    $("#addnewcustomer").click(function() {
        $("#myModal").modal("show");
    });



    $(document).on('keydown', '.itemname', function() {

        var availableTags = [];
        $.ajax({
            url: "invoicegetitemname.php",
            method: "POST",
            dataType: "JSON",
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    availableTags.push(response[i].itemname);
                }

            }
        });
        // Initialize jQuery UI autocomplete
        $('#itemname').autocomplete({
            source: availableTags,
            select: setprice

        });
    });
    function setprice(event, ui) {

        // var supname = $('#supname').val();
        var itemname = ui.item.value;
        $.ajax({
            url: "invoiceunitpriceselect.php",
            method: "POST",
            data: {itemname: itemname},
            dataType: "JSON",
            success: function(data)
            {
                document.getElementById('price').innerHTML = data[0].price;

            }
        });
    }
    $(document).on('blur', '.itemqty', function() {
        var itemname = $("#itemname").text();
        var itemqty = $(this).text();
        $.ajax({
            url: "invoicegetitemqty.php",
            method: "POST",
            data: {itemname: itemname},
            dataType: "Json",
            success: function(data)
            {
                var actualqty = data[0].qty;
                var buyingqty = itemqty;
                actualqty++;
                actualqty--;
                buyingqty++;
                buyingqty--
                if (buyingqty > actualqty)
                {
                    swal("Attention!", "You are exceeding the stock limit maximum qty is ' " + data[0].qty + " ' ", "warning");
                   document.getElementById("itemqty").innerHTML = actualqty;
                }
            }
        })
    });


    $(document).on('keyup', '.paidamount', function() {
        var netamount = $('#netamount').val();
        var paidamount = $('#paidamount').val();
        var balance = paidamount - netamount;
        if (balance < 0) {
            balance = 0;
        }
        $("#balance").val(balance.toFixed(2));
    });
    getinvoiceid();
    function getinvoiceid() {
        $.ajax({
            url: "invoiceidselector.php",
            method: "POST",
            dataType: "json",
            success: function(data) {

                document.getElementById('invoiceid').innerHTML = data[0].invoiceid;
                fetch_data();
                fetch_service_data();
            }
        });
    }
    function printinvoice() {
        var productno = $('#productno1').val();
        var netamount = $('#netamount').val();
        var paidamount = $('#paidamount').val();
        var invoiceid = $('#invoiceid').text();
        if (productno == '')
        {
            swal("Attention!", "Fill Customer Details...", "warning");
            return false;
        }else if(netamount == 0){
             swal("Attention!", "Add items to invoice...", "warning");
            return false;
        }
        $.ajax({
            url: "invoice_printbutton.php",
            method: "POST",
            data: {invoiceid: invoiceid, productno: productno, netamount: netamount, paidamount: paidamount},
            dataType: "text",
            success: function(data) {

                swal(data);
                swal("Successfull!", "You inserted Invoice!", "success");
                setTimeout(function() {
                    location.reload();
                }, 3000);
            }
        });
    }


    function fetch_data()
    {
        var invoiceid = $('#invoiceid').text();
        $.ajax({
            url: "invoiceitemselect.php",
            method: "POST",
            data: {invoiceid: invoiceid},
            dataType: "text",
            success: function(data) {

                $('#invoiceitemdata').html(data);
                getnetamount();
            }
        });
    }
    
     function fetch_service_data()
    {
        var invoiceid = $('#invoiceid').text();
        $.ajax({
            url: "invoice_serviceselect.php",
            method: "POST",
            data: {invoiceid: invoiceid},
            dataType: "text",
            success: function(data) {

                $('#invoiceservicedata').html(data);
                getnetamount();
            }
        });
    }

    function getnetamount() {

         var invoiceid = $('#invoiceid').text();
        $.ajax({
            url: "invoice_getnetamount.php",
            method: "POST",
            data: {invoiceid: invoiceid},
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $("#netamount").val(data.toFixed(2));
            }
        });
    }


    $(document).on('click', '#btn_add', function() {
        var itemname = $('#itemname').text();
        var itemqty = $('#itemqty').text();
        var price = $('#price').text();
        var discount = $('#discount').text();
        var invoiceid = $('#invoiceid').text();
        if (itemname === '')
        {
            swal("Attention!", "Enter Item Name...", "warning");
            return false;
        }
        if (itemqty == '')
        {
            swal("Attention!", "Enter Item Qty...", "warning");
            return false;
        }
        if (price == '')
        {
            swal("Attention!", "Enter Item Name...", "warning");
            return false;
        }
        if(discount == ''){
            discount = 0;
        }

        $.ajax({
            url: "invoiceiteminsert.php",
            method: "POST",
            data: {itemname: itemname, itemqty: itemqty, price: price, discount:discount, invoiceid: invoiceid},
            dataType: "text",
            success: function(data)
            {
                $('#result').html("<div class='alert alert-success'>" + data + "</div>");
                fetch_data();
            }
        })
    });
    
    
    
    $(document).on('click', '#btn_service_add', function() {
        var servicename = $('#servicename').text();
        var serviceprice = $('#serviceprice').text();
        var employeename = $('#serviceemp').text();
         var invoiceid = $('#invoiceid').text();
       
        if (servicename === '')
        {
            swal("Attention!", "Enter Service Name...", "warning");
            return false;
        }
        if (serviceprice == '')
        {
            swal("Attention!", "Enter price..", "warning");
            return false;
        }
        if (employeename == '')
        {
            swal("Attention!", "Enter Employer Name...", "warning");
            return false;
        }
        

        $.ajax({
            url: "invoice_serviceinsert.php",
            method: "POST",
            data: {servicename: servicename, serviceprice: serviceprice, employeename: employeename, invoiceid: invoiceid},
            dataType: "text",
            success: function(data)
            {
                $('#serviceresult').html("<div class='alert alert-success'>" + data + "</div>");
                fetch_service_data();
            }
        })
    });
    
    
    
    function edit_data(id, text, column_name)
    {

        $.ajax({
            url: "invoiceitemedit.php",
            method: "POST",
            data: {id: id, text: text, column_name: column_name},
            dataType: "text",
            success: function(data) {

                $('#result').html("<div class='alert alert-success'>" + data + "</div>");
                fetch_data();
            }
        });
    }
    $(document).on('click', '.itemname1', function() {
        swal("Attention!", "Don't change the Item Name, you can delete and re Enter the row...", "warning");
    });
    $(document).on('blur', '.itemqty1', function() {
        var id = $(this).data("id3");
        var itemqty = $(this).text();
        console.log(itemqty);
      $.ajax({
            url: "invoicegetitemtypedqty.php",
            method: "POST",
            data: {id: id},
            dataType: "Json",
            success: function(data)
            {
                var actualqty = data[0].qty;
                var buyingqty = itemqty;
                actualqty++;
                actualqty--;
                buyingqty++;
                buyingqty--
                if (buyingqty > actualqty)
                {
                    
                    swal("Attention!", "You are exceeding the stock limit maximum qty is ' " + data[0].qty + " ' ", "warning");
                  edit_data(id,actualqty,"item_qty");
                }else{
                    edit_data(id,buyingqty,"item_qty");
                }
            }
        });
    });
    $(document).on('blur', '.discount1', function() {
        var id = $(this).data("id4");
        var price = $(this).text();
        edit_data(id, price, "discount");
    });
    
    
     $(document).on('blur', '.servicename1', function() {
        var id = $(this).data("id1");
        var val = $(this).text();
        edit_service_data(id, val, "service_name");
    });
    
     $(document).on('blur', '.serviceprice1', function() {
        var id = $(this).data("id2");
        var val = $(this).text();
        edit_service_data(id, val, "price");
    });
     $(document).on('blur', '.serviceemp1', function() {
        var id = $(this).data("id3");
        var val = $(this).text();
        edit_service_data(id, val, "employer");
    });
    
     function edit_service_data(id, text, column_name)
    {

        $.ajax({
            url: "invoice_serviceedit.php",
            method: "POST",
            data: {id: id, text: text, column_name: column_name},
            dataType: "text",
            success: function(data) {

                $('#serviceresult').html("<div class='alert alert-success'>" + data + "</div>");
                fetch_service_data();
            }
        });
    }
    $(document).on('click', '.btn_delete', function() {
        var id = $(this).data("id6");
        ///////
            swal({
            title: "Are you sure?",
                    text: "Once deleted you will not be able to recover the data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
            $.ajax({
            url: "invoiceitemdelete.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function(data) {
                    swal("Poof! data has been deleted!", {
                    icon: "success",
                    });
                            fetch_data();
                    }
            });
            } else {
            swal("Information....", "Your data are safe", "info");
            }
            });
        ///////
    });
    
    $(document).on('click', '.btn_service_delete', function() {
        var id = $(this).data("id4");
        ///////
            swal({
            title: "Are you sure?",
                    text: "Once deleted you will not be able to recover the data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
            $.ajax({
            url: "invoice_servicedelete.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function(data) {
                    swal("Poof! data has been deleted!", {
                    icon: "success",
                    });
                            fetch_service_data();
                    }
            });
            } else {
            swal("Information....", "Your data are safe", "info");
            }
            });
        ///////
    });
    
    
    var allproductdetails = [];
    $(document).on('keydown', '.productno1', function() {
        var typeval = $('#type1').val();

        if (typeval === 'Select Type')
        {
            swal("Attention!", "Please Select The Reparing Type...", "warning");
            return false;
        }
        allproductdetails = [];
        var availableTags = [];
        $.ajax({
            url: "viewcustomersgetalldetails.php",
            method: "POST",
            data: {typeval: typeval},
            dataType: "JSON",
            success: function(response) {
                allproductdetails = response;
                console.log(allproductdetails);
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    availableTags.push(response[i].productno);
                }

            }
        });

        // Initialize jQuery UI autocomplete
        $('#productno1').autocomplete({
            source: availableTags,
            select: setvalues_productno


        });
    });

    function setvalues_productno(event, ui) {
        var val = ui.item.value;
        for (var i = 0; i < allproductdetails.length; i++) {
            if (allproductdetails[i].productno == val) {
                var productdes = allproductdetails[i].productdes;
                var cusname = allproductdetails[i].cusname;
                var contactno = allproductdetails[i].contactno;

                $("#productdes1").val(productdes);
                $("#cusname1").val(cusname);
                $("#cusno1").val(contactno);
            }
        }

    }

    $(document).on('keydown', '.productdes1', function() {
        var typeval = $('#type1').val();

        if (typeval === 'Select Type')
        {
            swal("Attention!", "Please Select The Reparing Type...", "warning");
            return false;
        }
        allproductdetails = [];
        var availableTags = [];
        $.ajax({
            url: "viewcustomersgetalldetails.php",
            method: "POST",
            data: {typeval: typeval},
            dataType: "JSON",
            success: function(response) {
                allproductdetails = response;
                console.log(allproductdetails);
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    availableTags.push(response[i].productdes);
                }

            }
        });

        // Initialize jQuery UI autocomplete
        $('#productdes1').autocomplete({
            source: availableTags,
            select: setvalues_productdes


        });
    });

    function setvalues_productdes(event, ui) {
        var val = ui.item.value;
        for (var i = 0; i < allproductdetails.length; i++) {
            if (allproductdetails[i].productdes == val) {
                var productno = allproductdetails[i].productno;
                var cusname = allproductdetails[i].cusname;
                var contactno = allproductdetails[i].contactno;

                $("#productno1").val(productno);
                $("#cusname1").val(cusname);
                $("#cusno1").val(contactno);
            }
        }

    }

    $(document).on('keydown', '.cusname1', function() {
        var typeval = $('#type1').val();

        if (typeval === 'Select Type')
        {
            swal("Attention!", "Please Select The Reparing Type...", "warning");
            return false;
        }
        allproductdetails = [];
        var availableTags = [];
        $.ajax({
            url: "viewcustomersgetalldetails.php",
            method: "POST",
            data: {typeval: typeval},
            dataType: "JSON",
            success: function(response) {
                allproductdetails = response;
                console.log(allproductdetails);
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    availableTags.push(response[i].cusname);
                }

            }
        });

        // Initialize jQuery UI autocomplete
        $('#cusname1').autocomplete({
            source: availableTags,
            select: setvalues_cusname


        });
    });


    function setvalues_cusname(event, ui) {
        var val = ui.item.value;
        for (var i = 0; i < allproductdetails.length; i++) {
            if (allproductdetails[i].cusname == val) {
                var productdes = allproductdetails[i].productdes;
                var productno = allproductdetails[i].productno;
                var contactno = allproductdetails[i].contactno;

                $("#productdes1").val(productdes);
                $("#productno1").val(productno);
                $("#cusno1").val(contactno);
            }
        }

    }


    $(document).on('keydown', '.cusno1', function() {
        var typeval = $('#type1').val();

        if (typeval === 'Select Type')
        {
            swal("Attention!", "Please Select The Reparing Type...", "warning");
            return false;
        }
        allproductdetails = [];
        var availableTags = [];
        $.ajax({
            url: "viewcustomersgetalldetails.php",
            method: "POST",
            data: {typeval: typeval},
            dataType: "JSON",
            success: function(response) {
                allproductdetails = response;
                console.log(allproductdetails);
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    availableTags.push(response[i].contactno);
                }

            }
        });

        // Initialize jQuery UI autocomplete
        $('#cusno1').autocomplete({
            source: availableTags,
            select: setvalues_contactno


        });
    });

    function setvalues_contactno(event, ui) {
        var val = ui.item.value;
        for (var i = 0; i < allproductdetails.length; i++) {
            if (allproductdetails[i].contactno == val) {
                var productdes = allproductdetails[i].productdes;
                var cusname = allproductdetails[i].cusname;
                var productno = allproductdetails[i].productno;

                $("#productdes1").val(productdes);
                $("#cusname1").val(cusname);
                $("#productno1").val(productno);
            }
        }

    }



// modal javascript and jquery functions starts
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
                $("#productdes1").val(productname);
                $("#cusname1").val(cusname);
                $("#productno1").val(productno);
                $("#cusno1").val(cno);
                $("#type1").val(type);

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


// modal javascript and jquery functions Ends


</script>



<?php
//} ?>