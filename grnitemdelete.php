
<?php

include("includes/db.php");
$grn_item_id = $_POST["id"];

$sql1 = "SELECT * from grn_item where grn_item_id='$grn_item_id' ";
$result1 = mysqli_query($Con, $sql1);

$row1 = mysqli_fetch_array($result1);

$itemname = $row1['item_name'];
$grnitemqty = $row1['qty'];

$sql2 = "SELECT * from item where item_name='$itemname' ";
$result2 = mysqli_query($Con, $sql2);

$row2 = mysqli_fetch_array($result2);
$currentitemqty = $row2['item_qty'];

$orginalitemqty = $currentitemqty- $grnitemqty;

$sql3 = "UPDATE item set item_qty='$orginalitemqty' where item_name='$itemname'";
mysqli_query($Con, $sql3);



$sql4 = "DELETE FROM grn_item WHERE grn_item_id = '" . $_POST["id"] . "'";
if (mysqli_query($Con, $sql4)) {
    echo 'Data Deleted';
}
?>