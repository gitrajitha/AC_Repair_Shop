

<?php

include("includes/db.php");


$id = $_POST["id"];

$splited_val = explode("|", $id);
$splited_cusname = $splited_val[0];
$splited_cusno = $splited_val[1];

$sql = "Select sum(grn_netamount) as net_amount, sum(grn_paidamount) as paid_amount from suppliers s inner join grn g on s.supplier_id = g.supplier_id where grn_netamount > grn_paidamount and supplier_name='$splited_cusname' and supplier_telephoneno='$splited_cusno'";

$result = mysqli_query($Con, $sql);

$netamount = 0; $paidamount = 0; $creditamount = 0;
while ($row = mysqli_fetch_array($result)) {

    $netamount += $row["net_amount"];
    $paidamount += $row["paid_amount"];
    
}
$creditamount = ($netamount - $paidamount);




echo json_encode($creditamount);



