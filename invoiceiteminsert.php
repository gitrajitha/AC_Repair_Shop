<?php

include("includes/db.php");


$itemname = $_POST["itemname"];
$itemqty = $_POST["itemqty"];
$price = $_POST["price"];
$discount =$_POST["discount"];
$invoiceid = $_POST["invoiceid"];

$sql = "SELECT * FROM item where item_name='$itemname'";
$result = mysqli_query($Con, $sql);
$rows = mysqli_num_rows($result);

if ($rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $itemid = $row["item_id"];

        $currentitemqty = $row["item_qty"];
        $orginalitemqty = $currentitemqty - $itemqty;

        $sqlupdateitem = "UPDATE item SET item_qty ='$orginalitemqty'   WHERE item_id='$itemid'";
       $rr = mysqli_query($Con, $sqlupdateitem);
    }
    $sqlinsert = "INSERT INTO invoice_item(item_name,item_price,item_qty,discount,invoice_id) VALUES('$itemname','$price','$itemqty','$discount','$invoiceid' )";
    if (mysqli_query($Con, $sqlinsert)) {
        echo "Data Inserted";
    }
}
?>