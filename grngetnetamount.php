<?php

include("includes/db.php");



$grnid = $_POST["grnid"];
$netamount = 0;
 $sql = "SELECT * FROM grn_item where grn_id='$grnid'";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     
     $netamount += ($row["qty"]*$row["buy_price"]);   
    
 }
 
 
  
echo json_encode($netamount);



