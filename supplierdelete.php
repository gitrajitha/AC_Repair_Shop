
<?php

include("includes/db.php");

$sql = "DELETE FROM suppliers WHERE supplier_id = '".$_POST["id"]."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>