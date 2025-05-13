<?php

include("includes/db.php");

$id = $_POST["id"];

$splited_val = explode("|", $id);

$splited_cusname = $splited_val[0];
$splited_cusno = $splited_val[1];

$output = '';
$sql = "Select sum(grn_netamount) as net_amount, sum(grn_paidamount) as paid_amount from suppliers s inner join grn g on s.supplier_id = g.supplier_id where grn_netamount > grn_paidamount and supplier_name='$splited_cusname' and supplier_telephoneno='$splited_cusno'";
$result = mysqli_query($Con, $sql);


$output .= ' 
<div class="col-md-12">
   
<div class="col-md-6" style="text-align:center">
Supplier Name: <b id="getcusname">' . $splited_cusname . '</b>
</div>
<div class="col-md-6" style="text-align:center">
Contact No:  <b id="getcusno">' . $splited_cusno . '</b>
</div>

</div>
<br><br>
';

$i = 1;

$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                       
                     <th width="20%">Total Net Amount</th>  
                     <th width="20%">Total Paid Amount</th>  
                     <th width="20%">Total Debits</th>  
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {
    $creditamount = 0;
    $netamount = 0;
    $paidamount = 0;
    while ($row = mysqli_fetch_array($result)) {

        $netamount = $row["net_amount"];
        $paidamount = $row["paid_amount"];
        $creditamount = ($netamount - $paidamount);

        
        
         $output .= '  
                <tr>                     
                     <td>Rs.' . $netamount . '.00</td>  
                     <td>Rs.' . $paidamount . '.00</td>  
                     <td>Rs.' . $creditamount . '.00</td>  
                     
                </tr>  
           ';
    }
   
}

$output .= '</table>  
    <hr  style = "height: 5px; background-color: black">
      </div>';

$sql1 = "Select * from suppliers s inner join grn g on s.supplier_id = g.supplier_id where grn_netamount > grn_paidamount and supplier_name='$splited_cusname' and supplier_telephoneno='$splited_cusno'";
$result1 = mysqli_query($Con, $sql1);

while ($row1 = mysqli_fetch_array($result1)) {

    $invoiceid = $row1["grn_id"];
    $date = $row1["grn_date"];
    $netamount1 = $row1["grn_netamount"];
    $paidamount1 = $row1["grn_paidamount"];
  


    $output .= '
    
<div class="col-md-12">
   
<div class="col-md-6" style="text-align:center">
Grn Id: <b>' . $invoiceid . '</b>
</div>
<div class="col-md-6" style="text-align:center">
Grn Placement Date:  <b>' . $date . '</b>
</div>


</div>  

      ';

    $output .= '  
        <br>
        <h3>Grn Details</h3>
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%"> No:</th>  
                     <th width="30%">Item Name</th>  
                     <th width="15%">Buy Price(Rs.)</th>  
                     <th width="10%">Item Qty</th>                       
                     <th width="20%">Total Price (Rs.)</th>  
                </tr>';

    $sql2 = "select * from grn_item where grn_id = '$invoiceid'";
    $result2 = mysqli_query($Con, $sql2);
    $i = 1;
    while ($row2 = mysqli_fetch_array($result2)) {

        
        $netamountprice = $row2["qty"] * $row2["buy_price"];
       

        $output .= '  
                <tr>  
                     <td>' . $i . '</td>  
                     <td>' . $row2["item_name"] . '</td>  
                     <td>' . $row2["buy_price"] . '</td>  
                     <td>' . $row2["qty"] . '</td>                   
                     <td>' . $netamountprice . '</td>                    
                         
                 </tr>  
           ';
        $i++;
    }


    $output .= '</table>  
      </div>';




    if ($netamount1 > $paidamount1) {
        $creditamount1 = $netamount1 - $paidamount1;
    } else {
        $creditamount1 = 0;
    }


    $output .= '
    
<div class="col-md-12">
   
<div class="col-md-4">
Net Amount: <b>Rs.' . $netamount1 . '.00</b>
</div>
<div class="col-md-4">
Paid Amount: <b>Rs.' . $paidamount1 . '.00</b>
</div>

<div class="col-md-4">
Debit Amount: <b>Rs. ' . $creditamount1 . '.00</b>
</div>
 <hr  style = "height: 5px; background-color: black">
</div>    

      ';
}




echo $output;
?>


