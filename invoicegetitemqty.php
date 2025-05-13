<?php

include("includes/db.php");

$return_arr = array();
$itemname = $_POST["itemname"];

 $sql = "SELECT item_qty FROM item where item_name='$itemname'";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     $qty = $row["item_qty"];     
     
     $return_arr[] = array("qty" => $qty);
 }
 
echo json_encode($return_arr);



