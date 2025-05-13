
<link href="css/tabstylenew.css" rel="stylesheet">
<?php
//if (!isset($_SESSION['admin_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Manage Income/Expense</h1>

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-industry"></i>  View Today Income/Expense

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->




<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i>Income/Expense Details

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body"><!--panel-body starts-->
                <button class="tablink" onclick="openPage('About', this, 'green')" id="defaultOpen">Manage Income</button>
                <button class="tablink" onclick="openPage('News', this, 'crimson')" >Manage Expense</button>

                <div id="About" class="tabcontent">

                    <center>
                        <table>
                            <tr>
                                <td><label style="font-size: 20px;" for="income_amount">Today Total Income:&nbsp;&nbsp;&nbsp;</label></td>
                                <td>  <label style="font-size: 20px; color: forestgreen"id="income_amount"></label></td>
                            </tr>
                        </table>
                    </center>



                    <div id="income_data"></div>

                </div>


                <div id="News" class="tabcontent">
 <center>
                        <table>
                            <tr>
                                <td><label style="font-size: 20px;" for="expense_amount">Today Total Expenses:&nbsp;&nbsp;&nbsp;</label></td>
                                <td>  <label style="font-size: 20px; color: crimson"id="expense_amount"></label></td>
                            </tr>
                        </table>
                    </center>
                    

                    <div id="expense_data"></div>

                </div>



            </div><!--panel-body Ends-->

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-12 Ends -->
</div>






<script>

    fetch_data1();
    fetch_data2();



    function gettodayincome() {
        var todaydate = gettodaydate();

        $.ajax({
            url: "income_expense_todaycashflow.php",
            data: {date: todaydate},
            method: "POST",
            dataType: "Json",
            success: function(data) {
                $('#income_amount').text("Rs." + data[0].inamount + ".00");
                $('#expense_amount').text("Rs." + data[0].examount + ".00");

            }
        });
    }



    function gettodaydate()
    {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var todaydate = yyyy + '-' + mm + '-' + dd;
        return todaydate;
    }

    function fetch_data1()
    {

        var todaydate = gettodaydate();
        console.log(todaydate);
        $.ajax({
            url: "income_expense_incomeselect.php",
            data: {date: todaydate},
            method: "POST",
            success: function(data) {
                $('#income_data').html(data);
                gettodayincome();
            }
        });
    }

    function fetch_data2()
    {

        var todaydate = gettodaydate();
        $.ajax({
            url: "income_expense_expenseselect.php",
            data: {date: todaydate},
            method: "POST",
            success: function(data) {
                $('#expense_data').html(data);
                gettodayincome();
            }
        });
    }

    $(document).on('click', '#btn_add1', function() {
        var description = $('#description').text();
        var amount = $('#amount').text();

        if (description == '')
        {
            swal("Attention!", "Enter Description Name...", "warning");
            return false;
        }
        if (amount == '')
        {
            swal("Attention!", "Enter Income Amount...", "warning");
            return false;
        }


        $.ajax({
            url: "income_expense_incomeinsert.php",
            method: "POST",
            data: {description: description, amount: amount},
            dataType: "text",
            success: function(data)
            {
                console.log(data);
                swal(data);
                swal("Successfull!", "You inserted cash Flow!", "success");
                fetch_data1();
            }
        })
    });

    $(document).on('click', '#btn_add2', function() {
        var description = $('#description1').text();
        var amount = $('#amount1').text();

        if (description == '')
        {
            swal("Attention!", "Enter Description Name...", "warning");
            return false;
        }
        if (amount == '')
        {
            swal("Attention!", "Enter Income Amount...", "warning");
            return false;
        }


        $.ajax({
            url: "income_expense_expenseinsert.php",
            method: "POST",
            data: {description: description, amount: amount},
            dataType: "text",
            success: function(data)
            {
                console.log(data);
                swal(data);
                swal("Successfull!", "You inserted expense Flow!", "success");
                fetch_data2();
            }
        })
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




</script>



<?php
//} ?>