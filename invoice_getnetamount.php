<?php

include("includes/db.php");



$invoiceid = $_POST["invoiceid"];
$netamount = 0;
 $sql = "SELECT * FROM invoice_item where invoice_id='$invoiceid'";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     
     $netamount += ($row["item_qty"]*$row["item_price"]) - $row["discount"];   
    
 }
 
  $sql1 = "SELECT * FROM service_item where invoice_id='$invoiceid'";  
 $result1 = mysqli_query($Con, $sql1); 
 while($row1 = mysqli_fetch_array($result1)){     
     
     $netamount += $row1["price"];   
    
 }
 
 
  
echo json_encode($netamount);



