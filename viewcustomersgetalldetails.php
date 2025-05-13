<?php

include("includes/db.php");

$return_arr = array();
$typeval = $_POST['typeval'];

 $sql = "SELECT * FROM repair_product_details r inner join customer c on c.cus_id = r.customer_id where product_type='$typeval' ";  
 $result = mysqli_query($Con, $sql); 
 while($row = mysqli_fetch_array($result)){     
     $productno = $row["product_no"];     
     $productdes = $row["product_description"];
     $cusname = $row["customer_name"];
     $contactno = $row["customer_contact_no"];
     
     $return_arr[] = array("productno" => $productno,"productdes"=> $productdes, "cusname"=> $cusname, "contactno"=> $contactno);
 }
 
echo json_encode($return_arr);



