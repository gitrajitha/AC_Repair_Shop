<?php

include("includes/db.php");
$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];

if ($column_name == 'item_qty') {

    $sql = "SELECT * FROM invoice_item where inovice_item_id='$id'";
    $result = mysqli_query($Con, $sql);
    $row = mysqli_fetch_array($result);
    $lastupdatedqty = $row['item_qty'];
    $itemname = $row['item_name'];

    $sql1 = "SELECT item_qty from item where item_name='$itemname' ";
    $result1 = mysqli_query($Con, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $currnetitemqty = $row1['item_qty'];
    $orginalitemqty = ($currnetitemqty + $lastupdatedqty) - $text;

    $sql2 = "UPDATE item set item_qty='$orginalitemqty' where item_name='$itemname'";
    mysqli_query($Con, $sql2);
}

$sql = "UPDATE invoice_item SET " . $column_name . "='" . $text . "' WHERE inovice_item_id='" . $id . "'";
if (mysqli_query($Con, $sql)) {
    echo 'Successfully Data Updated';
}
?>
