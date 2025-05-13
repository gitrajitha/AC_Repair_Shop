<?php

include("includes/db.php");

$return_arr = array();


 $sql = "SELECT supplier_name FROM suppliers";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     $supname = $row["supplier_name"];     
     
     $return_arr[] = array("supname" => $supname);
 }
 
echo json_encode($return_arr);



