<?php

include("includes/db.php");

$return_arr = array();

$date1 = $_POST["date1"];
$date2 = $_POST["date2"];

 $sql = "SELECT * FROM income where date(date) between '$date1' and '$date2'";  
 $result = mysqli_query($Con, $sql); 
 $amount = 0;
 
 while($row = mysqli_fetch_array($result)){     
     $amount += $row["amount"];         
 }
 $query = "SELECT * FROM set_limits  where description = 'income limit'";  
 $result1 = mysqli_query($Con, $query); 
 $incomelimit;
 
 while($row1 = mysqli_fetch_array($result1)){     
   
     $incomelimit = $row1["limitvalue"];
 }
 
 
 $query2 = "select datediff('$date2', '$date1') as datedifferent ";
 $result2 = mysqli_query($Con, $query2);  
$row2 = mysqli_fetch_array($result2);    
$count = $row2['datedifferent'];
$count++;

if($count<0){
    $count = 1;
}

$newincomelimit = $incomelimit *$count;
 
$return_arr[] = array("amount" => $amount, "incomelimit" => $newincomelimit);
echo json_encode($return_arr);



?>