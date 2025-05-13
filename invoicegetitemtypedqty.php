<?php

include("includes/db.php");

$return_arr = array();
$id = $_POST["id"];

$sql = "SELECT * FROM invoice_item where inovice_item_id='$id'";
$result = mysqli_query($Con, $sql);
$row = mysqli_fetch_array($result);
$qty = $row["item_qty"];
$itemname = $row["item_name"];

$sql1 = "SELECT * FROM item where item_name='$itemname'";
$result1 = mysqli_query($Con, $sql1);
$row1 = mysqli_fetch_array($result1);
$currentqty = $row1["item_qty"];

$orginalitemqty = $currentqty + $qty;
$return_arr[] = array("qty" => $orginalitemqty);


echo json_encode($return_arr);



