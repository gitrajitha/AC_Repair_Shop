
<?php

include("includes/db.php");

$type = $_POST["type"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["username"];
$password = $_POST["password"];


$sql = "insert into users(fname,lname,username,usertype,password) values ('$fname','$lname','$username','$type','$password') ";
if(mysqli_query($Con, $sql)){
    echo "successful";
}


?>