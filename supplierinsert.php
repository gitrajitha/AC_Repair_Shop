

<?php

include("includes/db.php");

$sql = "INSERT INTO suppliers(supplier_name,supplier_telephoneno,suppler_address) VALUES('".$_POST["supname"]."', '".$_POST["suptp"]."','".$_POST["supaddress"]."' )";  
if(mysqli_query($Con, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>