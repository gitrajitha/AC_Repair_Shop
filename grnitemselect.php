<?php

include("includes/db.php");


$output = '';

$grnid = $_POST["grnid"];
$sql = "SELECT * FROM grn_item where grn_id='$grnid'";
$result = mysqli_query($Con, $sql);
$i = 1;
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" autocomplete="on">  
                <tr>  
                     <th width="5%">Item Id:</th>  
                     <th width="30%">Item Name</th>  
                     <th width="20%">Item Qty</th>  
                     <th width="20%">Unit Price</th>  
                     <th width="20%">Total Price</th>  
                     <th width="5%">Delete</th>  
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $netamount = $row["qty"] * $row["buy_price"];
        $output .= '  
                <tr>  
                     <td>' . $i . '</td>  
                     <td class="itemname1" data-id1="' . $row["grn_item_id"] . '" contenteditable>' . $row["item_name"] . '</td>  
                     <td class="itemqty1" data-id2="' . $row["grn_item_id"] . '" contenteditable>' . $row["qty"] . '</td>  
                     <td class="price1" data-id3="' . $row["grn_item_id"] . '" contenteditable>' . $row["buy_price"] . '</td>  
                     <td class="nettotal1" data-id4="' . $row["grn_item_id"] . '" >' . $netamount . '</td>  
                     <td><button type="button" name="delete_btn" data-id5="' . $row["grn_item_id"] . '" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';
        $i++;
    }
    $output .= '  
           	<tr>  
                <td></td>  
                <td class="itemname" id="itemname" contenteditable></td>  
                <td id="itemqty" contenteditable></td>  
                <td id="price" contenteditable></td>  
                <td id="nettotal" </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr> 
      ';
} else {
    $output .= '
	   <tr>  
                <td></td>  
                <td class="itemname" id="itemname" contenteditable></td>  
                <td id="itemqty" contenteditable></td>  
                <td id="price" contenteditable></td>  
                <td id="nettotal" </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';
}
$output .= '</table>  
      </div>';
echo $output;
?>



