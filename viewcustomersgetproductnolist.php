<?php

include("includes/db.php");

$return_arr = array();


 $sql = "SELECT product_no FROM repair_product_details";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     $productno = $row["product_no"];     
     
     $return_arr[] = array("productno" => $productno);
 }
 
echo json_encode($return_arr);



