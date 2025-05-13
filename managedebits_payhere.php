<?php

include("includes/db.php");

$creditpaidamount = $_POST["paidamount"];
$creditpaidamount++;
$creditpaidamount--;
$id = $_POST["id"];

$splited_val = explode("|", $id);

$splited_cusname = $splited_val[0];
$splited_cusno = $splited_val[1];

$sql1 = "Select * from suppliers s inner join grn g on s.supplier_id = g.supplier_id where grn_netamount > grn_paidamount and supplier_name='$splited_cusname' and supplier_telephoneno='$splited_cusno'";

$result1 = mysqli_query($Con, $sql1);

while ($row1 = mysqli_fetch_array($result1)) {

    $invoiceid = $row1["grn_id"];
    $netamount1 = $row1["grn_netamount"];
    $paidamount1 = $row1["grn_paidamount"];
    $paybleamount = $netamount1 - $paidamount1;

    $remainpaidamount = $creditpaidamount - $paybleamount;

    if ($remainpaidamount <= 0) {
        $paidamount1+= $creditpaidamount;

        $query1 = "update grn set grn_paidamount = '$paidamount1'  where grn_id='$invoiceid'";
        $query2 = "insert into expenses(description,amount,date) values ('debit payment to $invoiceid to $splited_cusname' ,'$creditpaidamount',NOW())";
        $query3 = "insert into debit_details(grn_id,supplier_name,paid_amount,date) values ('$invoiceid','$splited_cusname','$creditpaidamount',NOW())";
       $r = mysqli_query($Con, $query1);
        mysqli_query($Con, $query2);
        mysqli_query($Con, $query3);

        $creditpaidamount = 0;
        break;
    } else {
        $paidamount1 = $netamount1;
        $creditpaidamount = $remainpaidamount;
        
        $query1 = "update grn set grn_paidamount = '$paidamount1'  where grn_id='$invoiceid'";
        $query2 = "insert into expenses(description,amount,date) values ('debit payment to $invoiceid to $splited_cusname' ,'$paybleamount',NOW())";
        $query3 = "insert into debit_details(grn_id,supplier_name,paid_amount,date) values ('$invoiceid','$splited_cusname','$paybleamount',NOW())";
        mysqli_query($Con, $query1);
        mysqli_query($Con, $query2);
        mysqli_query($Con, $query3);
    }
}




echo $r;
?>




