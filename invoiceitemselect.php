
<?php

include("includes/db.php");


$output = '';

$invoiceid = $_POST["invoiceid"];
$sql = "SELECT * FROM invoice_item where invoice_id='$invoiceid'";
$result = mysqli_query($Con, $sql);
$i = 1;
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" autocomplete="on">  
                <tr>  
                     <th width="5%">No:</th>  
                     <th width="20%">Item Name</th>  
                     <th width="20%">Unit Price (Rs.)</th>  
                     <th width="15%">Item Qty</th>  
                     <th width="15%">Discount (Rs.)</th>  
                     <th width="20%">Total Price (Rs.)</th>  
                     <th width="5%">Delete</th>  
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $totalamount = $row["item_qty"] * $row["item_price"];
        $discount = $row["discount"];
        $netamount = $totalamount - $discount;
        
        $output .= '  
                <tr>  
                     <td>' . $i . '</td>  
                     <td class="itemname1" data-id1="' . $row["inovice_item_id"] . '" contenteditable>' . $row["item_name"] . '</td>  
                     <td class="price1" data-id2="' . $row["inovice_item_id"] . '" >' . $row["item_price"] . '</td>  
                     <td class="itemqty1" data-id3="' . $row["inovice_item_id"] . '" contenteditable>' . $row["item_qty"] . '</td>  
                     <td class="discount1" data-id4="' . $row["inovice_item_id"] . '" contenteditable>' . $row["discount"] . '</td>  
                     <td class="nettotal1" data-id5="' . $row["inovice_item_id"] . '" >' . $netamount . '</td>  
                     <td><button type="button" name="delete_btn" data-id6="' . $row["inovice_item_id"] . '" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';
        $i++;
    }
    $output .= '  
           <tr>  
                <td></td>  
                <td class="itemname" id="itemname" contenteditable></td>  
                <td id="price" ></td>  
                <td class="itemqty" id="itemqty" contenteditable></td>  
                <td id="discount" contenteditable></td>  
                <td id="nettotal" </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr> 
      ';
} else {
    $output .= '
	   <tr>  
                <td></td>  
                <td class="itemname" id="itemname" contenteditable></td>  
                <td id="price" ></td>  
                <td class="itemqty" id="itemqty" contenteditable></td>  
                <td id="discount" contenteditable></td>  
                <td id="nettotal" </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr> 
      ';
}
$output .= '</table>  
      </div>';
echo $output;
?>



