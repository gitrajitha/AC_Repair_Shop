<?php

include("includes/db.php");
$username = $_POST["username"];

$sql = "SELECT * FROM users where username='$username'";
$result = mysqli_query($Con, $sql);
$rows = mysqli_num_rows($result);


if ($rows >0) {
    echo 'Available';
}else{
    
    echo 'Not Available';
}
?>