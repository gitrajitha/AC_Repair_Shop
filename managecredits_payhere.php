<?php

include("includes/db.php");

$creditpaidamount = $_POST["paidamount"];
$creditpaidamount++;
$creditpaidamount--;
$id = $_POST["id"];

$splited_val = explode("-", $id);

$splited_cusname = $splited_val[0];
$splited_cusno = $splited_val[1];

$sql1 = "select * from invoice i inner join repair_product_details r on i.repair_product_id = r.id inner join customer c on c.cus_id = r.customer_id where net_amount > paid_amount and c.customer_name = '$splited_cusname' and c.customer_contact_no = '$splited_cusno' ";
$result1 = mysqli_query($Con, $sql1);

while ($row1 = mysqli_fetch_array($result1)) {

    $invoiceid = $row1["invoice_id"];
    $netamount1 = $row1["net_amount"];
    $paidamount1 = $row1["paid_amount"];
    $paybleamount = $netamount1 - $paidamount1;

    $remainpaidamount = $creditpaidamount - $paybleamount;

    if ($remainpaidamount <= 0) {
        $paidamount1+= $creditpaidamount;

        $query1 = "update invoice set paid_amount = '$paidamount1'  where invoice_id='$invoiceid'";
        $query2 = "insert into income(description,amount,date) values ('credit payment for $invoiceid from $splited_cusname' ,'$creditpaidamount',NOW())";
        $query3 = "insert into credit_details(invoice_id,customer_name,paid_amount,date) values ('$invoiceid','$splited_cusname','$creditpaidamount',NOW())";
        mysqli_query($Con, $query1);
        mysqli_query($Con, $query2);
        mysqli_query($Con, $query3);

        $creditpaidamount = 0;
        break;
    } else {
        $paidamount1 = $netamount1;
        $creditpaidamount = $remainpaidamount;
        $query1 = "update invoice set paid_amount = '$paidamount1'  where invoice_id='$invoiceid'";
        $query2 = "insert into income(description,amount,date) values ('credit payment for $invoiceid from $splited_cusname' ,'$paybleamount',NOW())";
        $query3 = "insert into credit_details(invoice_id,customer_name,paid_amount,date) values ('$invoiceid','$splited_cusname','$paybleamount',NOW())";
        mysqli_query($Con, $query1);
        mysqli_query($Con, $query2);
        mysqli_query($Con, $query3);
    }
}




echo "Successfull"
?>




