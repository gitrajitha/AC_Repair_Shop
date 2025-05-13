
<?php

include("includes/db.php");


$sql = "UPDATE users set deleteuser='1' where id = '".$_POST["id"]."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>