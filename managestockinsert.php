

<?php

include("includes/db.php");

$itemname = $_POST["itemname"];
$itemqty = $_POST["itemqty"];
$buyprice =$_POST["buyprice"];
$sellingprice =$_POST["sellingprice"];
$lowqty =$_POST["lowqty"];


$sql = "INSERT INTO item(item_name,item_qty,buying_price,selling_price,low_qty_level) VALUES('$itemname', '$itemqty','$buyprice','$sellingprice','$lowqty' )";  
if(mysqli_query($Con, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>