

<?php

include("includes/db.php");
$incomelimit = $_POST["expenselimit"];

$sql = "update set_limits set limitvalue= '$incomelimit' where description = 'expense limit'";  
$r =  mysqli_query($Con, $sql);
echo $r;
 ?>