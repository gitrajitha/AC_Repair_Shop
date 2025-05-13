<?php

include("includes/db.php");
$invoiceid = $_POST["invoiceid"];
$productno = $_POST["productno"];
$netamount = $_POST["netamount"];
$paidamount = $_POST["paidamount"];

$query = "SELECT discount from invoice_item where invoice_id = '$invoiceid'";
$queryresult = mysqli_query($Con, $query);
$totaldiscount = 0;
while($queryrow = mysqli_fetch_array($queryresult)){
    $totaldiscount += $queryrow["discount"];
    
}

$sql = "SELECT * FROM repair_product_details where product_no ='$productno'";
$result = mysqli_query($Con, $sql);
$row = mysqli_fetch_array($result);
$id = $row['id'];

$sql1 = "UPDATE invoice SET invoice_date= NOW(), net_amount = '$netamount', paid_amount='$paidamount', repair_product_id='$id' ,discount = '$totaldiscount' WHERE invoice_id='$invoiceid'";
mysqli_query($Con, $sql1);



        $lastinvoiceid = $invoiceid;
        $numberinvoiceid = substr($lastinvoiceid,3);
        $newnumber = $numberinvoiceid+1;
        $newinvoiceid = 'INV'.$newnumber;

$sql3 = "INSERT INTO invoice(invoice_id,invoice_date,net_amount,paid_amount,discount) VALUES('$newinvoiceid', NOW(),'0','0','0')";
mysqli_query($Con, $sql3);

if($paidamount > $netamount){
    $expenseamount = $netamount;
}else if($paidamount == NULL){
    $expenseamount = 0;
}else{
    $expenseamount = $paidamount;
}



$sql4 = "insert into income(description,amount,date) values ('Payment from $invoiceid','$expenseamount',NOW())";
mysqli_query($Con, $sql4);
    
     echo "Data Inserted";
   

echo $newgrnid;


?>

