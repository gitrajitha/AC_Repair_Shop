
<?php

include("includes/db.php");

$type = $_POST["type"];
$productname = $_POST["productname"];
$productno = $_POST["productno"];
$cusname = $_POST["cusname"];
$cno = $_POST["cno"];

$sql = "insert into customer(customer_name,customer_contact_no) values ('$cusname','$cno') ";
mysqli_query($Con, $sql);

$sql1 = "SELECT MAX(cus_id) as cus_id FROM customer";
$result1 = mysqli_query($Con, $sql1);
$row = mysqli_fetch_array($result1);
$cusid = $row["cus_id"];

$sql2 = "insert into repair_product_details(product_type,product_description,product_no,customer_id) values ('$type','$productname','$productno','$cusid')";
if(mysqli_query($Con, $sql2)){
    echo "successfully inserted the customer";
}


?>