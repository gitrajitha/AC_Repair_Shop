<?php

include("includes/db.php");

$return_arr = array();


$sql = "SELECT * FROM grn";
$result = mysqli_query($Con, $sql);
$rows = mysqli_num_rows($result);


if ($rows > 0) {
    $sql = "SELECT grn_id FROM grn where supplier_id='0';";
    $result = mysqli_query($Con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $grnid = $row["grn_id"];

        $return_arr[] = array("grnid" => $grnid);
    }
} else {
    $sql = "INSERT INTO Grn(grn_id,grn_date,grn_netamount,grn_paidamount) VALUES('GRN1', NOW(),'0','0' )";
    mysqli_query($Con, $sql);
    $sql = "SELECT grn_id FROM grn ORDER BY grn_id DESC LIMIT 1;";
    $result = mysqli_query($Con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $grnid = $row["grn_id"];

        $return_arr[] = array("grnid" => $grnid);
    }
}



echo json_encode($return_arr);



