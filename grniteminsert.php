<?php

include("includes/db.php");


$itemname = $_POST["itemname"];
$itemqty = $_POST["itemqty"];
$price = $_POST["price"];
$grnid = $_POST["grnid"];

$sql = "SELECT * FROM item where item_name='$itemname'";
$result = mysqli_query($Con, $sql);
$rows = mysqli_num_rows($result);

if ($rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $itemid = $row["item_id"];

        $currentitemqty = $row["item_qty"];
        $orginalitemqty = $itemqty + $currentitemqty;

        $sqlupdateitem = "UPDATE item SET item_qty ='" . $orginalitemqty . "',buying_price ='$price'   WHERE item_id='$itemid'";
        mysqli_query($Con, $sqlupdateitem);
    }
    $sqlinsert = "INSERT INTO grn_item(item_name,qty,buy_price,grn_id) VALUES('$itemname', '$itemqty','$price','$grnid' )";
    if (mysqli_query($Con, $sqlinsert)) {
        echo 'Data Inserted';
    }
} else {

    $sqliteminsert = "INSERT INTO item(item_name,item_qty,buying_price) VALUES('$itemname', '$itemqty','$price')";
    mysqli_query($Con, $sqliteminsert);




    $sqlinsert = "INSERT INTO grn_item(item_name,qty,buy_price,grn_id) VALUES('$itemname', '$itemqty','$price','$grnid' )";
    if (mysqli_query($Con, $sqlinsert)) {
        echo 'Data Inserted';
    }
}
?>