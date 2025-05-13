
<?php

include("includes/db.php");

$return_arr = array();

$date1 = $_POST["date1"];
$date2 = $_POST["date2"];
 $sql = "SELECT amount FROM income where date(date) between '$date1' and '$date2'";  
 $result = mysqli_query($Con, $sql); 
 $amount = 0;$amount2 = 0;
 while($row = mysqli_fetch_array($result)){     
  $amount += $row["amount"];    
 }
 
 
  $query = "SELECT amount FROM expenses where date(date) between '$date1' and '$date2'";  
 $result1 = mysqli_query($Con, $query); 
 $amount2 = 0;
 while($row1 = mysqli_fetch_array($result1)){     
  $amount2 += $row1["amount"];    
 }
  $return_arr[] = array("inamount" => $amount, "examount" => $amount2);
 
echo json_encode($return_arr);