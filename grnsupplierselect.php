
<?php

include("includes/db.php");



 $sql = "SELECT * FROM suppliers where supplier_name='".$_POST["supname"]."'";  
 $result = mysqli_query($Con, $sql); 
 $row = mysqli_fetch_array($result);
 $grnOutput['supname'] = $row["supplier_name"];
 $grnOutput['suptp'] = $row["supplier_telephoneno"];
 $grnOutput['supaddress'] = $row["suppler_address"];
 
echo json_encode( $grnOutput);