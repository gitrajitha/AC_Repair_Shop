<?php


include("includes/db.php");

$description = $_POST["description"];
$amount = $_POST["amount"];


$sql = "insert into income(description,amount,date) values ('$description','$amount',NOW())";
if(mysqli_query($Con, $sql)){
    
     echo "Data Inserted";
   
}