
<?php

include("includes/db.php");

$sql = "DELETE FROM item WHERE item_id = '".$_POST["id"]."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>