<?php

include("includes/db.php");
$productno = $_POST["productno"];

$sql = "SELECT * FROM repair_product_details where product_no='$productno'";
$result = mysqli_query($Con, $sql);
$rows = mysqli_num_rows($result);


if ($rows >0) {
    echo 'Available in the system';
}else{
    
    echo 'Not Available';
}
?>
