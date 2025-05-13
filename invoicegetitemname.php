<?php

include("includes/db.php");

$return_arr = array();


 $sql = "SELECT item_name FROM item";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     $itemname = $row["item_name"];     
     
     $return_arr[] = array("itemname" => $itemname);
 }
 
echo json_encode($return_arr);



