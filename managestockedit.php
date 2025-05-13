<?php  
	include("includes/db.php");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE item SET ".$column_name."='".$text."' WHERE item_id='".$id."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'Successfully Data Updated';  
	}  
 ?>
