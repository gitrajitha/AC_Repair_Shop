<?php

include("includes/db.php");


$servicename = $_POST["servicename"];
$serviceprice = $_POST["serviceprice"];
$employeename = $_POST["employeename"];
$invoiceid = $_POST["invoiceid"];


    $sqlinsert = "INSERT INTO service_item(service_name,price,employer,invoice_id) VALUES('$servicename','$serviceprice','$employeename','$invoiceid' )";
    if (mysqli_query($Con, $sqlinsert)) {
        echo "Data Inserted";
    }
?>