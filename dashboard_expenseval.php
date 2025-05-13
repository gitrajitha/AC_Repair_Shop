<?php

include("includes/db.php");

$return_arr = array();

$date1 = $_POST["date1"];
$date2 = $_POST["date2"];

$sql = "select * from 
(select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
where selected_date between '$date1' and '$date2'";
$result = mysqli_query($Con, $sql);


while ($row = mysqli_fetch_array($result)) {

    $date = $row["selected_date"];
    $sql1 = "SELECT sum(amount) as amount FROM expenses where date(date) = '$date' ";
    $result1 = mysqli_query($Con, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $amount = $row1["amount"];
    if ($amount == NULL) {
        $amount = 0;
    }

    array_push($return_arr, $amount);
}


echo json_encode($return_arr);





