

<?php

include("includes/db.php");


$id = $_POST["id"];

$splited_val = explode("-", $id);
$splited_cusname = $splited_val[0];
$splited_cusno = $splited_val[1];

$sql = "select r.product_no,r.product_description,sum(net_amount) as tot_net_amount,sum(paid_amount) as tot_paid_amount from invoice i inner join repair_product_details r on i.repair_product_id = r.id inner join customer c on c.cus_id = r.customer_id where net_amount > paid_amount and c.customer_name = '$splited_cusname' and c.customer_contact_no = '$splited_cusno'  group by r.product_no,r.product_description";
$result = mysqli_query($Con, $sql);

$netamount = 0; $paidamount = 0; $creditamount = 0;
while ($row = mysqli_fetch_array($result)) {

    $netamount += $row["tot_net_amount"];
    $paidamount += $row["tot_paid_amount"];
    
}
$creditamount = ($netamount - $paidamount);




echo json_encode($creditamount);



