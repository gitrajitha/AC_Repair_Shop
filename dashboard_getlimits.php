<?php

include("includes/db.php");

$return_arr = array();


 $query = "SELECT * FROM set_limits  where description = 'expense limit'";  
 $result1 = mysqli_query($Con, $query);  
 $row1 = mysqli_fetch_array($result1);    
 $expenselimit = $row1["limitvalue"];
 
 $query1 = "SELECT * FROM set_limits  where description = 'income limit'";  
 $result2 = mysqli_query($Con, $query1);  
 $row2 = mysqli_fetch_array($result2);    
 $incomelimit = $row2["limitvalue"];
 
$return_arr[] = array("incomelimit" => $incomelimit, "expenselimit" => $expenselimit);
echo json_encode($return_arr);



?>