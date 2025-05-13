

<?php
//if (!isset($_SESSION['admin_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">GRN</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-industry"></i>  Grn Details

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Add Suppliers

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                <div class='row'>
                    <div class='col-md-12'>
                        <div class="ui-widget">
                            <label for="supname">Supplier Name: </label>
                            <input id="supname">
                            &nbsp;&nbsp;
                            <label for="suptp">Supplier Telephone: </label>
                            <input id="suptp">
                            &nbsp;&nbsp;
                            <label for="supaddress">Supplier Address: </label>
                            <input id="supaddress">
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

                    <i class="fa fa-money fa-fw" ></i> Add GRN Items

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->

                <table>
                    <tr>
                        <td width='50%'>GRN ID:&nbsp;&nbsp;&nbsp</td>
                        <td width='50%'><b><div id="grnid"></div></b></td>
                    </tr>
                </table> 
                <br>


                <div class="table-responsive" ><!-- table-responsive Starts -->

                    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->



                        <span id="grnitemresult"></span>
                        <div id="grnitemdata"></div>          




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
                        <input type="button" value="Print Grn" class="btn btn-primary form-control" onclick="printgrn();">
                    </div>


                </div>






            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-12 Ends -->
</div>

<?php
    include("includes/footer.php");
    ?>

<script>

    $(function() {
        var availableTags = [];
        $.ajax({
            url: "grngetsupname.php",
            method: "POST",
            dataType: "JSON",
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    availableTags.push(response[i].supname);
                }

            }
        });
        $("#supname").autocomplete({
            source: availableTags,
            select: insertsupplier
        });
    });
    $(document).on('keydown', '.itemname', function() {

        var availableTags = [];
        $.ajax({
            url: "grngetitemname.php",
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
            source: availableTags

        });
    });
    function insertsupplier(event, ui) {

        // var supname = $('#supname').val();
        var supname = ui.item.value;

        $.ajax({
            url: "grnsupplierselect.php",
            method: "POST",
            data: {supname: supname},
            dataType: "JSON",
            success: function(data)
            {
                $("#suptp").val(data.suptp);
                $("#supaddress").val(data.supaddress);
            }
        });
    }



    $(document).on('keyup', '.paidamount', function() {
        var netamount = $('#netamount').val();
        var paidamount = $('#paidamount').val();

        var balance = paidamount - netamount;
        if (balance < 0) {
            balance = 0;
        }
        $("#balance").val(balance.toFixed(2));

    });
          getgrnid();
        function getgrnid() {
            $.ajax({
                url: "grnidselector.php",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    document.getElementById('grnid').innerHTML = data[0].grnid;
                    fetch_data();
                }
            });
        }
        function printgrn() {
            var suppliername = $('#supname').val();
            var netamount = $('#netamount').val();
            var paidamount = $('#paidamount').val();
            var grnid = $('#grnid').text();

            if (suppliername == '')
            {
                swal("Attention!", "Enter supplier Name...", "warning");
                return false;
            }
             if (netamount == 0)
            {
                swal("Attention!", "Enter Grn Items...", "warning");
                return false;
            }

            $.ajax({
                url: "grnprintbutton.php",
                method: "POST",
                data: {grnid: grnid, suppliername: suppliername, netamount: netamount, paidamount: paidamount},
                dataType: "text",
                success: function(data) {    
                    
                    swal(data);
                    swal("Successfull!", "You inserted Grn!", "success");
                    setTimeout(function(){ location.reload(); }, 3000);
                }
            });


        }
      

        function fetch_data()
        {
            var grnid = $('#grnid').text();
            $.ajax({
                url: "grnitemselect.php",
                method: "POST",
                data: {grnid: grnid},
                dataType: "text",
                success: function(data) {
                    $('#grnitemdata').html(data);
                    getnetamount();
                }
            });
        }

        function getnetamount() {

            var grnid = $('#grnid').text();

            $.ajax({
                url: "grngetnetamount.php",
                method: "POST",
                data: {grnid: grnid},
                dataType: 'json',
                success: function(data) {
                    $("#netamount").val(data.toFixed(2));
                }
            });


        }


        $(document).on('click', '#btn_add', function() {
            var itemname = $('#itemname').text();
            var itemqty = $('#itemqty').text();
            var price = $('#price').text();
            var grnid = $('#grnid').text();
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
                swal("Attention!", "Enter Buying Price...", "warning");
                return false;
            }

            $.ajax({
                url: "grniteminsert.php",
                method: "POST",
                data: {itemname: itemname, itemqty: itemqty, price: price, grnid: grnid},
                dataType: "text",
                success: function(data)
                {
                    $('#grnitemresult').html("<div class='alert alert-success'>" + data + "</div>");
                    fetch_data();
                }
            })
        });
        function edit_data(id, text, column_name)
        {

            $.ajax({
                url: "grnitemedit.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function(data) {

                    $('#grnitemresult').html("<div class='alert alert-success'>" + data + "</div>");
                    fetch_data();
                }
            });
        }
        $(document).on('click', '.itemname1', function() {
            swal("Attention!", "Don't change the Item Name, you can delete and re Enter the row...", "warning");
        });
        $(document).on('blur', '.itemqty1', function() {
            var id = $(this).data("id2");
            var itemqty = $(this).text();
            edit_data(id, itemqty, "qty");
        });
        $(document).on('blur', '.price1', function() {
            var id = $(this).data("id3");
            var price = $(this).text();
            edit_data(id, price, "buy_price");
        });
        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id5");
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
            url: "grnitemdelete.php",
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
    

</script>



<?php
//} ?>