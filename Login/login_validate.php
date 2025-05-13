<?php
session_start();
include("../includes/db.php");

$username = $_POST["username"];
$password = $_POST["password"];

$output;

$sql1 = "select * from users where username='$username' and password='$password'";
$result1 = mysqli_query($Con, $sql1);
$rowcount = mysqli_num_rows($result1);
while ($row = mysqli_fetch_array($result1)) {
    $usertype = $row["usertype"];
    $isdeleted = $row["deleteuser"];
    if ($isdeleted == '1') {
        $output = 1;
    } else {
        $_SESSION['username']=$username;
        $_SESSION['type']=$usertype;
        $output = 2;
    }
}

if ($rowcount == 0) {
    $output = 0;
}


echo json_encode($output);
