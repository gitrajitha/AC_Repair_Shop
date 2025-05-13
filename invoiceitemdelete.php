
<?php

include("includes/db.php");
$invoice_item_id = $_POST["id"];

$sql1 = "SELECT * from invoice_item where inovice_item_id='$invoice_item_id' ";
$result1 = mysqli_query($Con, $sql1);

$row1 = mysqli_fetch_array($result1);

$itemname = $row1['item_name'];
$invoiceitemqty = $row1['item_qty'];

$sql2 = "SELECT * from item where item_name='$itemname' ";
$result2 = mysqli_query($Con, $sql2);

$row2 = mysqli_fetch_array($result2);
$currentitemqty = $row2['item_qty'];

$orginalitemqty = $currentitemqty+ $invoiceitemqty;

$sql3 = "UPDATE item set item_qty='$orginalitemqty' where item_name='$itemname'";
mysqli_query($Con, $sql3);



$sql4 = "DELETE FROM invoice_item WHERE inovice_item_id = '" . $_POST["id"] . "'";
if (mysqli_query($Con, $sql4)) {
    echo 'Data Deleted';
}
?>