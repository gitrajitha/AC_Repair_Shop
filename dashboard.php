
<link href="css/tabstylenew.css" rel="stylesheet">
<?php

    $usertype = $_SESSION['type'];
    
    if($usertype == "Admin"){
    ?>



<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Dashboard</h1>



    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-success" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->
                    <i class="fa fa-money fa-fw" ></i> Select Date Range Here
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    From:<input type="date"id="date1">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    To:<input type="date" id="date2">

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-6 Ends -->

</div>




<div class="row" ><!-- 3 row Starts -->

    <div class="col-lg-6" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Income Percentage by Income Target

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->               

                <canvas id="chart_3" width="400" height="250"></canvas>            

                <br>
                <label for="incomelimit">Set Target Income for a day: </label> &nbsp;&nbsp;
                <input id="incomelimit" >

            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-6 Ends -->


    <div class="col-lg-6" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Expense Percentage by Expense Target

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->


                <canvas id="chart_4" width="400" height="250"></canvas>  
                <br>
                <label for="expenselimit">Set Target Expense for a day: </label> &nbsp;&nbsp;
                <input id="expenselimit" >
            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-6 Ends -->


</div>
<div class="row">
    <div class="col-lg-12" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Income vs Expense

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->
                <button id="getfulldetails" class="btn btn-info pull-right">view detail report</button>

                <canvas id="chart_5" width="400" height="250"></canvas>  

            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-6 Ends -->
    
    
    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 90%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Income Vs Expenses Full Report</h4>
            </div>
            <div class="modal-body">
                <button class="tablink" onclick="openPage('About', this, 'green')" id="defaultOpen"> Income</button>
                <button class="tablink" onclick="openPage('News', this, 'crimson')" > Expenses</button>

                <div id="About" class="tabcontent">

                    <center>
                        <table>
                            <tr>
                                <td><label style="font-size: 20px;" for="income_amount"> Total Income:&nbsp;&nbsp;&nbsp;</label></td>
                                <td>  <label style="font-size: 20px; color: forestgreen"id="income_amount"></label></td>
                                <td width="10%"> </td>
                                <td>  <label style="font-size: 20px; color: darkgray">Date Range:</label></td>
                                <td width="1%"> </td>
                                <td>  <label style="font-size: 20px; color: gray"id="daterange1"></label></td>
                                <td width="1%"> </td>
                                <td>  <label style="font-size: 20px;color: gray ">To</label></td>
                                <td width="1%"> </td>
                                <td>  <label style="font-size: 20px; color: gray"id="daterange2"></label></td>
                            </tr>
                        </table>
                    </center>



                    <div id="income_data"></div>

                </div>


                <div id="News" class="tabcontent">
 <center>
                        <table>
                            <tr>
                                <td><label style="font-size: 20px;" for="expense_amount"> Total Expenses:&nbsp;&nbsp;&nbsp;</label></td>
                                <td>  <label style="font-size: 20px; color: crimson"id="expense_amount"></label></td>
                                 <td width="10%"> </td>
                                <td>  <label style="font-size: 20px; color: darkgray">Date Range:</label></td>
                                <td width="1%"> </td>
                                <td>  <label style="font-size: 20px; color: gray"id="daterange3"></label></td>
                                <td width="1%"> </td>
                                <td>  <label style="font-size: 20px; color: gray">To</label></td>
                                <td width="1%"> </td>
                                <td>  <label style="font-size: 20px; color: gray"id="daterange4"></label></td>
                           
                            </tr>
                        </table>
                    </center>
                    

                    <div id="expense_data"></div>

                </div>


                </div><!--panel-body Ends-->
            </div>

        </div>

    </div>
</div> 

</div>
<?php
    include("includes/footer.php");
    ?>

<script>

    var incomedata = [];
    var incomelimit;
    var expensedata = [];
    var expenselimit;
    var setofdates = [];
    var newincomevalues = [];
    var expensevalues = [];


    getlimitdata();
    function getlimitdata() {
        $.ajax({
            url: "dashboard_getlimits.php",
            method: "POST",
            dataType: "json",
            success: function(response) {

                $("#incomelimit").val(response[0].incomelimit);
                $("#expenselimit").val(response[0].expenselimit);
                gettodaydate();
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

        document.getElementById('date1').value = todaydate;
        document.getElementById('date2').value = todaydate;
        getincomedata();
        getexpensedata();
        getsetofdata();

    }

    function getsetofdata() {

        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;

        $.ajax({
            url: "dashboard_getdateset.php",
            method: "POST",
            data: {date1: date1, date2: date2},
            dataType: "json",
            success: function(data) {
                setofdates = [];
                for (var i = 0; i < data.length; i++) {
                    setofdates.push(data[i]);
                }
                   expenseval();
                 
            }
        });
     
    }

    function getincomedata() {

        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;


        $.ajax({
            url: "dashboard_getincomenetamount.php",
            method: "POST",
            data: {date1: date1, date2: date2},
            dataType: "json",
            success: function(response) {


                var incomeamount = response[0].amount;
                incomelimit = response[0].incomelimit;
                var data2;
                if (incomelimit > incomeamount) {
                    data2 = incomelimit - incomeamount;
                } else {
                    data2 = 0;
                }
                incomedata = [];
                incomedata.push(incomeamount);
                incomedata.push(data2);
                getincomegraph();
            }
        });
    }

    function getexpensedata() {
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;
        $.ajax({
            url: "dashboard_getexpensenetamount.php",
            method: "POST",
            data: {date1: date1, date2: date2},
            dataType: "JSON",
            success: function(response) {
                var amount = response[0].amount;
                expenselimit = response[0].expenselimit;
                var data2;
                if (expenselimit > amount) {
                    data2 = expenselimit - amount;
                } else {
                    data2 = 0;
                }
                expensedata = [];
                expensedata.push(amount);
                expensedata.push(data2);
                getexpensegraph();

            }
        });
    }


    function incomevalue() {

        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;

        $.ajax({
            url: "dashboard_getincomeval.php",
            method: "POST",
            data: {date1: date1, date2: date2},
            dataType: "json",
            success: function(data) {
                //console.log(data);
                newincomevalues = [];
                for (var i = 0; i < data.length; i++) {
                    newincomevalues.push(data[i]);
                }
                newincomevalues.push(0);
               incomevsexpensegraph();
            }
        });


    }



    function expenseval() {
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;

        $.ajax({
            url: "dashboard_expenseval.php",
            method: "POST",
            data: {date1: date1, date2: date2},
            dataType: "json",
            success: function(data) {
                expensevalues = [];
                for (var i = 0; i < data.length; i++) {
                    expensevalues.push(data[i]);
                }
                 incomevalue();
            }
        });

    }


    $("#date1").change(function() {
        getincomedata();
        getexpensedata();
        getsetofdata();
    });
    $("#date2").change(function() {
        getincomedata();
        getexpensedata();
        getsetofdata();
    });

    $("#incomelimit").blur(function() {
        var incomelimit = document.getElementById("incomelimit").value;
        $.ajax({
            url: "dashboard_setincomelimit.php",
            method: "POST",
            data: {incomelimit: incomelimit},
            dataType: "text",
            success: function(response) {
                swal("Successfull!", "You updated the income limit!", "success");
                getincomedata();
                getexpensedata();
            }
        });

    });

    $("#expenselimit").blur(function() {
        var expenselimit = document.getElementById("expenselimit").value;
        $.ajax({
            url: "dashboard_setexpenselimit.php",
            method: "POST",
            data: {expenselimit: expenselimit},
            dataType: "text",
            success: function(response) {
                swal("Successfull!", "You updated the expense limit!", "success");
                getincomedata();
                getexpensedata();
            }
        });

    });



    function getincomegraph() {
        var ctx = document.getElementById('chart_3').getContext('2d');
        if (window.bar1 != undefined)
            window.bar1.destroy();


        window.bar1 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Acheived", "to Achieved"],
                datasets: [
                    {
                        backgroundColor: ["forestgreen", "#f0eeef"],
                        //========== Data for Chart JS ==============
                        data: incomedata,
                        //===========================================
                        label: ["Actual", "Planned"],
                        borderWidth: 0,
                    }
                ]
            },
            options: {
                cutoutPercentage: 80,
                elements: {
                    center: {
                        text: [(incomedata[0] / incomelimit * 100).toFixed(2)] + "%",
                        color: '#666666', //Default black
                        fontStyle: 'Helvetica', //Default Arial
                        FontSize: 1,
                        sidePadding: 1 //Default 20 (as a percentage)

                    }
                }
            }

        });


    }
    function getexpensegraph() {
        var ctx = document.getElementById('chart_4').getContext('2d');
        if (window.bar2 != undefined)
            window.bar2.destroy();


        window.bar2 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["expended", "remaining"],
                datasets: [
                    {
                        backgroundColor: ["crimson", "#f0eeef"],
                        //========== Data for Chart JS ==============
                        data: expensedata,
                        //===========================================
                        label: ["Actual", "Planned"],
                        borderWidth: 0,
                    }
                ]
            },
            options: {
                cutoutPercentage: 80,
                elements: {
                    center: {
                        text: [(expensedata[0] / expenselimit * 100).toFixed(2)] + "%",
                        color: '#666666', //Default black
                        fontStyle: 'Helvetica', //Default Arial
                        FontSize: 1,
                        sidePadding: 1 //Default 20 (as a percentage)

                    }
                }
            }

        });
    }


    function incomevsexpensegraph() {
        console.log(setofdates);
        console.log(newincomevalues);
        console.log(expensevalues);
        var ctx = document.getElementById('chart_5').getContext('2d');
        if (window.bar3 != undefined)
            window.bar3.destroy();

        window.bar3 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: setofdates,
                datasets: [{
                        label: "Income",
                        type: "bar",
                        backgroundColor: "forestgreen",
                        data: newincomevalues
                    },{
                        label: "Expenses",
                        type: "bar",
                        backgroundColor: "crimson",
                        data: expensevalues
                    }
                ]
            },
            options: {
                title: {
                    display: false,
                    text: 'Planned vs Actual values'
                },
            }
        });
    }
    
    ///functions for modal starts here
    
      $(document).on('click', '#getfulldetails', function() {
     
     
fetch_data1();
fetch_data2();
                
                $("#myModal").modal("show");

    });
    
    
     function gettodayincome() {
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;
        
        document.getElementById("daterange1").innerHTML = date1;
        document.getElementById("daterange2").innerHTML = date2;
        document.getElementById("daterange3").innerHTML = date1;
        document.getElementById("daterange4").innerHTML = date2;

        $.ajax({
            url: "dashboard_modal_todaycashflow.php",
            data: {date1: date1, date2:date2},
            method: "POST",
            dataType: "Json",
            success: function(data) {
                $('#income_amount').text("Rs." + data[0].inamount + ".00");
                $('#expense_amount').text("Rs." + data[0].examount + ".00");

            }
        });
    }
    
     function fetch_data1()
    {

       var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;

        $.ajax({
            url: "dashboard_modal_incomeselect.php",
            data: {date1: date1, date2:date2},
            method: "POST",
            success: function(data) {
                $('#income_data').html(data);
                gettodayincome();
            }
        });
    }

    function fetch_data2()
    {

         var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById('date2').value;
        $.ajax({
            url: "dashboard_modal_expenseselect.php",
           data: {date1: date1, date2:date2},
            method: "POST",
            success: function(data) {
                $('#expense_data').html(data);
                gettodayincome();
            }
        });
    }
    
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

    
    
    
    ///functions for modal end here


    Chart.pluginService.register({
        beforeDraw: function(chart) {
            if (chart.config.options.elements.center) {
                //Get ctx from string
                var ctx = chart.chart.ctx;

                //Get options from the center object in options
                var centerConfig = chart.config.options.elements.center;
                var fontStyle = centerConfig.fontStyle || 'Arial';
                var txt = centerConfig.text;
                var color = centerConfig.color || '#000';
                var sidePadding = centerConfig.sidePadding || 20;
                var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
                //Start with a base font of 30px
                ctx.font = "30px " + fontStyle;

                //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
                var stringWidth = ctx.measureText(txt).width;
                var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

                // Find out how much the font can grow in width.
                var widthRatio = elementWidth / stringWidth;
                var newFontSize = Math.floor(15 * widthRatio);
                var elementHeight = (chart.innerRadius * 2);

                // Pick a new font size so it will not be larger than the height of label.
                var fontSizeToUse = Math.min(newFontSize, elementHeight);

                //Set font settings to draw it correctly.
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
                var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
                ctx.font = fontSizeToUse + "px " + fontStyle;
                ctx.fillStyle = color;

                //Draw text in center
                ctx.fillText(txt, centerX, centerY);
            }
        }
    });
    


</script>

    <?php }else{ ?>      
 
       



<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12" style="background-color: white"><!-- col-lg-12 Starts -->

        <h1 class="page-header">Dashboard</h1>

        

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

 


<div class="row" style="background-color: white" ><!-- 3 row Starts -->

    <div class="col-lg-12"  ><!-- col-lg-12 Starts -->
        <div class="col-lg-3"></div>
        <div  class="col-lg-6 col-md-6 wow bounceInDown border transf" data-wow-delay='1s'>
                        <h1 style=" color: forestgreen">SNOW BALL AUTO AC</h1>
                        <h3 style=" color: Black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REPAIRING</h3>
                       
                        
                    </div>

        <div class="col-lg-4 wow slideInLeft" data-wow-delay='1s'>
                                <div class="texiimge1">
                                    <a href="images/fridge.jpg" data-lightbox="gallery"><img src="images/fridge.jpg" width="300" height="198" alt=""></a>
                                    <h2>REFRIGERATORS</h2>

                                </div>
                            </div>
                            <div class="col-lg-4 wow slideInUp" data-wow-delay='0.5s'>    
                                <div class="texiimge2">
                                    <a href="images/benz.jpg"><img src="images/benz.jpg" width="300" height="198" alt=""></a>
                                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;VEHICLES</h2>

                                </div>
                            </div>

                            <div class="col-lg-4 wow slideInRight" data-wow-delay='1s' >
                                <div class="texiimge2">
                                    <a href="images/ac.jpg"><img src="images/ac.jpg" width="300" height="198" alt=""></a>
                                    <h2>AIR CONDITIONS</h2>

                                </div>

    </div><!-- col-lg-12 Ends -->
</div>
</div>
 
<br>   <br>
    <div class="row" ><!-- 3 row Starts -->
  
    <div class="col-lg-6" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Income Percentage by Income Target

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->               

                <canvas id="chart_6" width="400" height="250"></canvas>            

               
            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-6 Ends -->


    <div class="col-lg-6" ><!-- col-lg-12 Starts -->

        <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

            <div class="panel-heading" ><!-- panel-heading Starts -->

                <h3 class="panel-title" ><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw" ></i> Expense Percentage by Expense Target

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body" ><!-- panel-body Starts -->


                <canvas id="chart_7" width="400" height="250"></canvas>  
               
            </div><!-- panel-body Ends -->



        </div><!-- panel panel-primary Ends -->

    </div><!-- col-lg-6 Ends -->


</div>

<?php
    include("includes/footer.php");
    ?>


         <script src="js/wow.min.js"></script>
         <script>new WOW().init(); </script>
         
         <script>
            
        var ctx = document.getElementById('chart_6').getContext('2d');
        if (window.bar4 != undefined)
            window.bar4.destroy();


        window.bar4 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Acheived", "to Achieved"],
                datasets: [
                    {
                        backgroundColor: ["forestgreen", "#f0eeef"],
                        //========== Data for Chart JS ==============
                        data: [60,40],
                        //===========================================
                        label: ["Actual", "Planned"],
                        borderWidth: 0,
                    }
                ]
            },
            options: {
                cutoutPercentage: 80,
                elements: {
                    center: {
                        text: [(61.5 / 100 * 100).toFixed(2)] + "%",
                        color: '#666666', //Default black
                        fontStyle: 'Helvetica', //Default Arial
                        FontSize: 1,
                        sidePadding: 1 //Default 20 (as a percentage)

                    }
                }
            }

        });


    
  
        var ctx = document.getElementById('chart_7').getContext('2d');
        if (window.bar5 != undefined)
            window.bar5.destroy();


        window.bar5 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["expended", "remaining"],
                datasets: [
                    {
                        backgroundColor: ["crimson", "#f0eeef"],
                        //========== Data for Chart JS ==============
                        data: [90,10],
                        //===========================================
                        label: ["Actual", "Planned"],
                        borderWidth: 0,
                    }
                ]
            },
            options: {
                cutoutPercentage: 80,
                elements: {
                    center: {
                        text: [(92.5 / 100 * 100).toFixed(2)] + "%",
                        color: '#666666', //Default black
                        fontStyle: 'Helvetica', //Default Arial
                        FontSize: 1,
                        sidePadding: 1 //Default 20 (as a percentage)

                    }
                }
            }

        });
    
         Chart.pluginService.register({
        beforeDraw: function(chart) {
            if (chart.config.options.elements.center) {
                //Get ctx from string
                var ctx = chart.chart.ctx;

                //Get options from the center object in options
                var centerConfig = chart.config.options.elements.center;
                var fontStyle = centerConfig.fontStyle || 'Arial';
                var txt = centerConfig.text;
                var color = centerConfig.color || '#000';
                var sidePadding = centerConfig.sidePadding || 20;
                var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
                //Start with a base font of 30px
                ctx.font = "30px " + fontStyle;

                //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
                var stringWidth = ctx.measureText(txt).width;
                var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

                // Find out how much the font can grow in width.
                var widthRatio = elementWidth / stringWidth;
                var newFontSize = Math.floor(15 * widthRatio);
                var elementHeight = (chart.innerRadius * 2);

                // Pick a new font size so it will not be larger than the height of label.
                var fontSizeToUse = Math.min(newFontSize, elementHeight);

                //Set font settings to draw it correctly.
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
                var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
                ctx.font = fontSizeToUse + "px " + fontStyle;
                ctx.fillStyle = color;

                //Draw text in center
                ctx.fillText(txt, centerX, centerY);
            }
        }
    });

         
         </script>
                         
        
  

       

            



                 
                          
         
                
         



    <?php } ?>