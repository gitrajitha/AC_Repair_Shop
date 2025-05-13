
<?php

include("includes/db.php");

$return_arr = array();

$date = $_POST["date"];
 $sql = "SELECT amount FROM income where date(date) = '$date'";  
 $result = mysqli_query($Con, $sql); 
 $amount = 0;$amount2 = 0;
 while($row = mysqli_fetch_array($result)){     
  $amount += $row["amount"];    
 }
 
 
  $query = "SELECT amount FROM expenses where date(date) = '$date'";  
 $result1 = mysqli_query($Con, $query); 
 $amount2 = 0;
 while($row1 = mysqli_fetch_array($result1)){     
  $amount2 += $row1["amount"];    
 }
  $return_arr[] = array("inamount" => $amount, "examount" => $amount2);
 
echo json_encode($return_arr);