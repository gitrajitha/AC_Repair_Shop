

<?php
//if (!isset($_SESSION['admin_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Manage Stock</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-industry"></i>  Search/Insert/Update/Delete Items

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<input class="col-md-12" style="font-size: 20px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Item names.." title="Type in a name">
<br><br>


<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Mange Items

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
                url: "managestockselect.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);

                }
            });
        }
        fetch_data();

        $(document).on('click', '#btn_add', function() {
            var itemname = $('#itemname').text();
            var itemqty = $('#itemqty').text();
            var buyprice = $('#buyprice').text();
            var sellingprice = $('#sellingprice').text();
            var lowqty = $('#lowqty').text();

            if (itemname === '')
            {
                swal("Attention!", "Enter Item Name...", "warning");
                return false;
            }
            if (itemqty === '')
            {
                swal("Attention!", "Enter Item Qty...", "warning");
                return false;
            }
            if (buyprice === '')
            {
                swal("Attention!", "Enter Buy Price of the item...", "warning");
                return false;
            }
            if (sellingprice === '')
            {
                swal("Attention!", "Enter Selling Price of the item...", "warning");
                return false;
            }
            if (lowqty === '')
            {
                swal("Attention!", "You forget to mention the low qty level...", "warning");
                return false;
            }


            $.ajax({
                url: "managestockinsert.php",
                method: "POST",
                data: {itemname: itemname, itemqty: itemqty, buyprice: buyprice, sellingprice: sellingprice, lowqty: lowqty},
                dataType: "text",
                success: function(data)
                {
                    swal(data);
                    swal("Successfull!", "You inserted Item successfully!", "success");
                    fetch_data();
                }
            })
        });

        function edit_data(id, text, column_name)
        {
            $.ajax({
                url: "managestockedit.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function(data) {
                    //alert(data);
                    $('#result').html("<div class='alert alert-success'>" + data + "</div>");
                    fetch_data();
                }
            });
        }
        $(document).on('blur', '.itemname', function() {
            var id = $(this).data("id1");
            var itemname = $(this).text();
            edit_data(id, itemname, "item_name");
        });
        $(document).on('blur', '.itemqty', function() {
            var id = $(this).data("id2");
            var itemqty = $(this).text();
            edit_data(id, itemqty, "item_qty");
        });
        $(document).on('blur', '.buyprice', function() {
            var id = $(this).data("id3");
            var buyprice = $(this).text();
            edit_data(id, buyprice, "buying_price");
        });
        $(document).on('blur', '.sellingprice', function() {
            var id = $(this).data("id4");
            var sellingprice = $(this).text();
            edit_data(id, sellingprice, "selling_price");
        });
        $(document).on('blur', '.lowqty', function() {
            var id = $(this).data("id6");
            var lowqty = $(this).text();
            edit_data(id, lowqty, "low_qty_level");
        });

        $(document).on('click', '.btn_delete', function() {
             var id = $(this).data("id7");
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
            url: "managestockdelete.php",
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
    
 });
</script>



<?php
//} ?>