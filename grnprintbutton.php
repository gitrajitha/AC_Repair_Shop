<?php

include("includes/db.php");
$grnid = $_POST["grnid"];
$suppliername = $_POST["suppliername"];
$netamount = $_POST["netamount"];
$paidamount = $_POST["paidamount"];

$sql = "SELECT * FROM suppliers where supplier_name ='$suppliername'";
$result = mysqli_query($Con, $sql);
$row = mysqli_fetch_array($result);
$supplier_id = $row['supplier_id'];

$sql1 = "UPDATE grn SET grn_date= NOW(), grn_netamount = '$netamount', grn_paidamount='$paidamount', supplier_id='$supplier_id' WHERE grn_id='$grnid'";
mysqli_query($Con, $sql1);



        $lastgrnid = $grnid;
        $numbergrnid = substr($lastgrnid,3);
        $newnumber = $numbergrnid+1;
        $newgrnid = 'GRN'.$newnumber;

$sql3 = "INSERT INTO grn(grn_id,grn_date,grn_netamount,grn_paidamount) VALUES('$newgrnid', NOW(),'0','0')";
mysqli_query($Con, $sql3);

if($paidamount > $netamount){
    $expenseamount = $netamount;
}else if($paidamount == NULL){
    $expenseamount = 0;
}else{
    $expenseamount = $paidamount;
}

$sql4 = "insert into expenses(description,amount,date) values ('paid for the $grnid','$expenseamount',NOW())";
mysqli_query($Con, $sql4);
echo $newgrnid;


?>

