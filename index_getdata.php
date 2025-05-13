<?php
session_start();
include("includes/db.php");

$usertype = $_SESSION['type'];

$sql1 = "select count(item_id) as count from item";
$result1 = mysqli_query($Con, $sql1);
$row1_count =  mysqli_fetch_array($result1);
$itemqty = $row1_count["count"];

$sql2 = "select count(item_id) as count from item where item_qty <= low_qty_level";
$result2 = mysqli_query($Con, $sql2);
$row2_count =  mysqli_fetch_array($result2);
$lowitemqty = $row2_count["count"];

$sql3 = "select count(cus_id) as count from customer";
$result3 = mysqli_query($Con, $sql3);
$row3_count =  mysqli_fetch_array($result3);
$cusqty = $row3_count["count"];

$sql4 = "select count(supplier_id) as count from suppliers";
$result4 = mysqli_query($Con, $sql4);
$row4_count =  mysqli_fetch_array($result4);
$supqty = $row4_count["count"];

$return_arr = array();
$return_arr[] = array("usertype"=> $usertype,"itemqty"=> $itemqty, "lowqtyitem" => $lowitemqty, "customercount" => $cusqty, "suppliercount"=> $supqty);

echo json_encode($return_arr);