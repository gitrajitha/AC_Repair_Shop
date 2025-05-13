<?php

include("includes/db.php");

$return_arr = array();

$date1 = $_POST["date1"];
$date2 = $_POST["date2"];

$sql = "SELECT * FROM expenses where date(date) between '$date1' and '$date2'";
$result = mysqli_query($Con, $sql);
$amount = 0;

while ($row = mysqli_fetch_array($result)) {
    $amount += $row["amount"];
}
$query = "SELECT * FROM set_limits  where description = 'expense limit'";
$result1 = mysqli_query($Con, $query);
$row1 = mysqli_fetch_array($result1);
$expenselimit = $row1["limitvalue"];

$query2 = "select datediff('$date2', '$date1') as datedifferent ";
$result2 = mysqli_query($Con, $query2);
$row2 = mysqli_fetch_array($result2);
$count = $row2['datedifferent'];
$count++;

if ($count < 0) {
    $count = 1;
}

$newexpenselimit = $expenselimit * $count;



$return_arr[] = array("amount" => $amount, "expenselimit" => $newexpenselimit);
echo json_encode($return_arr);
?>