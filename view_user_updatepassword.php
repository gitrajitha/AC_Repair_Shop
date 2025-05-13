<?php  
	include("includes/db.php");
	
	$pw = $_POST["password"];  
        $id = $_POST["id"];
	
	$sql = "UPDATE users SET password='$pw' WHERE id='".$id."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'successfully Data Updated';  
	}  
 ?>

