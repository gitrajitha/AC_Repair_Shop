
<?php

include("includes/db.php");

$sql = "DELETE FROM service_item WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>