<?php

include("includes/db.php");


$output = '';
$sql = "select * from item where item_qty <= low_qty_level";
$result = mysqli_query($Con, $sql);


$i = 1;

$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="50%">Item Name</th>  
                     <th width="20%">Low Qty Level</th>  
                     <th width="20%">Current Qty</th>  
                    
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {
   
    while ($row = mysqli_fetch_array($result)) {

        
        
         $output .= '  
                <tr>  
                     <td>' . $i. '</td>  
                     <td>' . $row["item_name"] . '</td>  
                     <td>' . $row["low_qty_level"] . '</td>  
                     <td>' . $row["item_qty"] . '</td>  
                     
                     
                </tr>  
           ';
         $i++;
    }
   
}

$output .= '</table>  
  
      </div>';



echo $output;
?>


