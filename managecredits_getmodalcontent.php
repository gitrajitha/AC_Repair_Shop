<?php

include("includes/db.php");

$id = $_POST["id"];

$splited_val = explode("-", $id);

$splited_cusname = $splited_val[0];
$splited_cusno = $splited_val[1];

$output = '';
$sql = "select r.product_no,r.product_description,sum(net_amount) as tot_net_amount,sum(paid_amount) as tot_paid_amount from invoice i inner join repair_product_details r on i.repair_product_id = r.id inner join customer c on c.cus_id = r.customer_id where net_amount > paid_amount and c.customer_name = '$splited_cusname' and c.customer_contact_no = '$splited_cusno'  group by r.product_no,r.product_description";
$result = mysqli_query($Con, $sql);


$output .= ' 
<div class="col-md-12">
   
<div class="col-md-6" style="text-align:center">
Customer Name: <b id="getcusname">' . $splited_cusname . '</b>
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
                     <th width="20%">Product No:</th>  
                     <th width="20%">Product Description</th>  
                     <th width="20%">Total Net Amount</th>  
                     <th width="20%">Total Paid Amount</th>  
                     <th width="20%">Total Credits</th>  
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {
    $creditamount = 0;
    $netamount = 0;
    $paidamount = 0;
    while ($row = mysqli_fetch_array($result)) {

        $netamount = $row["tot_net_amount"];
        $paidamount = $row["tot_paid_amount"];
        $creditamount = ($netamount - $paidamount);

        $productno = $row["product_no"];
        $productdescription = $row["product_description"];
        
         $output .= '  
                <tr>  
                     <td>' . $productno . '</td>  
                     <td>' . $productdescription . '</td>  
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

$sql1 = "select * from invoice i inner join repair_product_details r on i.repair_product_id = r.id inner join customer c on c.cus_id = r.customer_id where net_amount > paid_amount and c.customer_name = '$splited_cusname' and c.customer_contact_no = '$splited_cusno' ";
$result1 = mysqli_query($Con, $sql1);

while ($row1 = mysqli_fetch_array($result1)) {

    $invoiceid = $row1["invoice_id"];
    $date = $row1["invoice_date"];
    $netamount1 = $row1["net_amount"];
    $paidamount1 = $row1["paid_amount"];
    $discount1 = $row1["discount"];


    $output .= '
    
<div class="col-md-12">
   
<div class="col-md-4" style="text-align:center">
Invoice Id: <b>' . $invoiceid . '</b>
</div>
<div class="col-md-4" style="text-align:center">
Invoice Placement Date:  <b>' . $date . '</b>
</div>
<div class="col-md-4" style="text-align:center">
Product No:  <b>' . $row1["product_no"] . '</b>
</div>

</div>  

      ';

    $output .= '  
        <br>
        <h3>Invoice Details</h3>
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%"> No:</th>  
                     <th width="30%">Item Name</th>  
                     <th width="15%">Unit Price(Rs.)</th>  
                     <th width="10%">Item Qty</th>  
                     <th width="20%">Discount(Rs.)</th>  
                     <th width="20%">Total Price (Rs.)</th>  
                </tr>';

    $sql2 = "select * from invoice_item where invoice_id = '$invoiceid'";
    $result2 = mysqli_query($Con, $sql2);
    $i = 1;
    while ($row2 = mysqli_fetch_array($result2)) {

        $discountprice = $row2["discount"];
        $netamountprice = $row2["item_qty"] * $row2["item_price"];
        $totalprice = $netamountprice - $discountprice;

        $output .= '  
                <tr>  
                     <td>' . $i . '</td>  
                     <td>' . $row2["item_name"] . '</td>  
                     <td>' . $row2["item_price"] . '</td>  
                     <td>' . $row2["item_qty"] . '</td>  
                     <td>' . $row2["discount"] . '</td>  
                     <td>' . $totalprice . '</td>  
                     
                         
                 </tr>  
           ';
        $i++;
    }


    $output .= '</table>  
      </div>';



//services table starts
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%"> No:</th>  
                     <th width="40%">Service Name</th>  
                     <th width="25%"> Price(Rs.)</th>  
                     <th width="25%">Done By</th>                       
                </tr>';


    $sql3 = "select * from service_item where invoice_id = '$invoiceid'";
    $result3 = mysqli_query($Con, $sql3);
    $x = 1;
    while ($row3 = mysqli_fetch_array($result3)) {



        $output .= '  
                <tr>  
                     <td>' . $x . '</td>  
                     <td>' . $row3["service_name"] . '</td>  
                     <td>' . $row3["price"] . '</td>  
                     <td>' . $row3["employer"] . '</td>               
                     
                         
                 </tr>  
           ';
        $x++;
    }




    $output .= '</table>  
      </div>';

//services table ends

    if ($netamount1 > $paidamount1) {
        $creditamount1 = $netamount1 - $paidamount1;
    } else {
        $creditamount1 = 0;
    }


    $output .= '
    
<div class="col-md-12">
   
<div class="col-md-3">
Net Amount: <b>Rs.' . $netamount1 . '.00</b>
</div>
<div class="col-md-3">
Paid Amount: <b>Rs.' . $paidamount1 . '.00</b>
</div>
<div class="col-md-3">
Discount: <b> Rs.' . $discount1 . '.00</b>
</div>
<div class="col-md-3">
Crdit Amount: <b>Rs. ' . $creditamount1 . '.00</b>
</div>
 <hr  style = "height: 5px; background-color: black">
</div>    

      ';
}




echo $output;
?>


