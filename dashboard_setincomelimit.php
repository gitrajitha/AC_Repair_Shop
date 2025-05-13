

<?php

include("includes/db.php");
$incomelimit = $_POST["incomelimit"];

$sql = "update set_limits set limitvalue= '$incomelimit' where description = 'income limit'";  
$r =  mysqli_query($Con, $sql);
echo $r;
 ?>