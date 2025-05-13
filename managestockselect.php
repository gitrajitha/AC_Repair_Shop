<?php

include("includes/db.php");


$output = '';
$sql = "SELECT * FROM item ORDER BY item_id Asc";
$result = mysqli_query($Con, $sql);
$i = 1;
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="30%">Item Name</th>  
                     <th width="10%">Stock Qty</th>  
                     <th width="10%">Buy Price(Rs)</th>  
                     <th width="10%">Selling Price(Rs)</th>  
                     <th width="10%">Max Discount(Rs)</th>  
                     <th width="10%">Notify Qty Level</th>  
                     <th width="10%">Delete</th>  
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {

    while ($row = mysqli_fetch_array($result)) {

        $maxdiscount = $row["selling_price"] - $row["buying_price"];
        if($maxdiscount<0){
            $maxdiscount =0;
        }
        $output .= '  
                <tr>  
                     <td>' . $i . '</td>  
                     <td class="itemname" data-id1="' . $row["item_id"] . '" contenteditable>' . $row["item_name"] . '</td>  
                     <td class="itemqty" data-id2="' . $row["item_id"] . '" contenteditable>' . $row["item_qty"] . '</td>  
                     <td class="buyprice" data-id3="' . $row["item_id"] . '" >' . $row["buying_price"] . '</td>  
                     <td class="sellingprice" data-id4="' . $row["item_id"] . '" contenteditable>' . $row["selling_price"] . '</td>  
                     <td class="maxdiscount" data-id5="' . $row["item_id"] . '" >' . $maxdiscount . '</td>  
                     <td class="lowqty" data-id6="' . $row["item_id"] . '" contenteditable >' . $row["low_qty_level"] . '</td>  
                     <td><button type="button" name="delete_btn" data-id7="' . $row["item_id"] . '" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';
        $i++;
    }
    $output .= '  
           <tr>  
                <td></td>  
                <td id="itemname" contenteditable></td>  
                <td id="itemqty" contenteditable></td>  
                <td id="buyprice" contenteditable></td>  
                <td id="sellingprice" contenteditable></td>  
                <td id="maxdiscount"></td>  
                <td id="lowqty" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';
} else {
    $output .= '        
           <tr>  
                <td></td>  
                <td id="itemname" contenteditable></td>  
                <td id="itemqty" contenteditable></td>  
                <td id="buyprice" contenteditable></td>  
                <td id="sellingprice" contenteditable></td>  
                <td id="maxdiscount"></td>  
                <td id="lowqty" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';
}
$output .= '</table>  
      </div>';
echo $output;
?>



