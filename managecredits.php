
<link href="css/tabstyle.css" rel="stylesheet">
<?php
//if (!isset($_SESSION['admin_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Manage Customer Credits</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-industry"></i>  View Customer Credits

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<input class="col-md-12" style="font-size: 20px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for customer names.." title="Type in a name">
<br><br>


<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i>Customer's Details

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
                    <button class="tablink" onclick="openPage('About', this, 'gray')">Credited Customer Details</button>
                    <button class="tablink" onclick="openPage('News', this, 'green')" id="defaultOpen">Pay here</button>

                    <div id="About" class="tabcontent">
                        <div id="modalcontent"></div>

                    </div>


                    <div id="News" class="tabcontent">
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class="ui-widget">
                                    <div class="col-md-4">
                                        <label for="totcredit">Total Credit Amount: </label><br>
                                        <input id="totcredit" readonly style="color:black">

                                    </div>
                                    <div class="col-md-4">
                                        <label for="payment">Payment: </label><br>
                                        <input class="payement" id="payment" style="color:black">
                                        &nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-4">
                                        <label for="balance">Balance: </label><br>
                                        <input id="balance" readonly style="color:black">
                                    </div>



                                </div>

                            </div>
                        </div>
                        <br><br>
                        <center>
                            <div class="row center-block">
                                <button id='dopayment'   style="width: 60%" class='btn btn-info dopayment' >PAY HERE</button>

                            </div>    

                        </center>
                        <br>
                        
                        <h3>Payment History</h3>
                        <br>

                                <div id="payment_history"></div>

                    </div>



                </div><!--panel-body Ends-->
            </div>

        </div>

    </div>
</div> 




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
                url: "managecredits_select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);

                }
            });
        }
        fetch_data();

        $(document).on('click', '#btn_add', function() {
            var supname = $('#supname').text();
            var suptp = $('#suptp').text();
            var supaddress = $('#supaddress').text();

            if (supname == '')
            {
                swal("Attention!", "Enter Supplier Name...", "warning");
                return false;
            }
            if (suptp == '')
            {
                swal("Attention!", "Enter Supplier Telephone No...", "warning");
                return false;
            }
            if (supaddress == '')
            {
                swal("Attention!", "Enter Supplier Address...", "warning");
                return false;
            }

            $.ajax({
                url: "supplierinsert.php",
                method: "POST",
                data: {supname: supname, suptp: suptp, supaddress: supaddress},
                dataType: "text",
                success: function(data)
                {
                    swal(data);
                    swal("Successfull!", "You inserted supplier!", "success");
                    fetch_data();
                }
            })
        });

        function edit_data(id, text, column_name)
        {
            $.ajax({
                url: "supplieredit.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function(data) {
                    //alert(data);
                    $('#result').html("<div class='alert alert-success'>" + data + "</div>");
                }
            });
        }
        $(document).on('blur', '.supname', function() {
            var id = $(this).data("id1");
            var supname = $(this).text();
            edit_data(id, supname, "supplier_name");
        });
        $(document).on('blur', '.suptp', function() {
            var id = $(this).data("id2");
            var suptp = $(this).text();
            edit_data(id, suptp, "supplier_telephoneno");
        });
        $(document).on('blur', '.supaddress', function() {
            var id = $(this).data("id3");
            var supaddress = $(this).text();
            edit_data(id, supaddress, "suppler_address");
        });

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id4");
            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    url: "supplierdelete.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function(data) {
                        swal(data);

                        fetch_data();
                    }
                });
            }
        });

    });
//javascripts for the tabs
    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
    }

// Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    //javascript for the tabs in the modal end here  



    $(document).on('click', '.btn_view', function() {
        var id = $(this).data("id4");
        window.golbalvarible = id;
        getnetamount(id);
        getpayementhistory(id);
        $.ajax({
            url: "managecredits_getmodalcontent.php",
            method: "POST",
            data: {id: id},
            dataType: "text",
            success: function(data) {

                $('#modalcontent').html(data);
                $("#myModal").modal("show");

            }
        });
    });

    function getnetamount(id) {

        $.ajax({
            url: "managecredits_getnetamount.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function(data) {
               
                document.getElementById("totcredit").value = "Rs." + data.toFixed(2);


            }
        });
    }
    
     function getpayementhistory(id) {

        $.ajax({
            url: "managecredits_getpaymenthistory.php",
            method: "POST",
            data: {id: id},
            dataType: "text",
            success: function(data) {
               console.log(data);
                 $('#payment_history').html(data);


            }
        });
    }


    $(document).on('keyup', '.payement', function() {
        var netamount = $('#totcredit').val();
        var paidamount = $('#payment').val();
        var str = netamount.split(".");
        netamount = str[1];

        var balance = paidamount - netamount;

        if (balance < 0) {
            balance = 0;
        }

        $("#balance").val(balance.toFixed(2));


    });

    $(document).on('click', '.dopayment', function() {

        var getcusname = $('#getcusname').text();
        var getcusno = $('#getcusno').text();
        var id = getcusname+"-"+getcusno;
    

      var netamount = $('#totcredit').val();
        var paidamount = $('#payment').val();
        var str = netamount.split(".");
        netamount = str[1];
        
        paidamount++;
        paidamount--;
        netamount++;
        netamount--
        if(paidamount <= netamount){
            //paidamount = paidamount;
            
        }else{
            paidamount = netamount;
        }
        
        
        
          $.ajax({
            url: "managecredits_payhere.php",
            method: "POST",
            data: {paidamount: paidamount,id:id},
            dataType: "text",
            success: function(data) {
                console.log(data);
                 swal(data);
                    swal("Successfull!", "Payment Successfull!", "success");
                     setTimeout(function(){ location.reload(); }, 3000);

            }
        });
    });


</script>



<?php
//} ?>