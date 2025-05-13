<?php

include("includes/db.php");

$return_arr = array();


$sql = "SELECT * FROM invoice";
$result = mysqli_query($Con, $sql);
$rows = mysqli_num_rows($result);


if ($rows > 0) {
    $sql = "SELECT invoice_id FROM invoice where repair_product_id='0';";
    $result = mysqli_query($Con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $invoiceid = $row["invoice_id"];

        $return_arr[] = array("invoiceid" => $invoiceid);
    }
} else {
    $sql = "INSERT INTO invoice(invoice_id,net_amount,paid_amount,discount,invoice_date,repair_product_id) VALUES('INV1','0','0','0', NOW(),'0')";
    mysqli_query($Con, $sql);
    $sql = "SELECT invoice_id FROM invoice ORDER BY invoice_id DESC LIMIT 1;";
    $result = mysqli_query($Con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $invoiceid = $row["invoice_id"];

        $return_arr[] = array("invoiceid" => $invoiceid);
    }
}



echo json_encode($return_arr);



