<?php  
	include("includes/db.php");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE customer c inner join repair_product_details r on c.cus_id = r.customer_id SET ".$column_name."='".$text."' WHERE id='".$id."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'Successfully Data Updated';  
	}  
 ?>
