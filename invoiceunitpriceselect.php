<?php

include("includes/db.php");

$return_arr = array();
$itemname = $_POST["itemname"];

 $sql = "SELECT selling_price FROM item where item_name='$itemname'";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     $price = $row["selling_price"];     
     
     $return_arr[] = array("price" => $price);
 }
 
echo json_encode($return_arr);



