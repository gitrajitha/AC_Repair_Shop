
<?php

include("includes/db.php");


$output = '';

$invoiceid = $_POST["invoiceid"];
$sql = "SELECT * FROM service_item where invoice_id='$invoiceid'";
$result = mysqli_query($Con, $sql);
$i = 1;
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" autocomplete="on">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="40%">Service Name</th>  
                     <th width="20%"> Price (Rs.)</th>  
                     <th width="15%">Done By</th>                       
                     <th width="15%">Delete</th>  
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {

    while ($row = mysqli_fetch_array($result)) {
       
        
        $output .= '  
                <tr>  
                     <td>' . $i . '</td>  
                     <td class="servicename1" data-id1="' . $row["id"] . '" contenteditable>' . $row["service_name"] . '</td>  
                     <td class="serviceprice1" data-id2="' . $row["id"] . '" contenteditable>' . $row["price"] . '</td>  
                     <td class="serviceemp1" data-id3="' . $row["id"] . '" contenteditable>' . $row["employer"] . '</td>  
                     <td><button type="button" name="delete_btn1" data-id4="' . $row["id"] . '" class="btn btn-xs btn-danger btn_service_delete">x</button></td>  
                </tr>  
           ';
        $i++;
    }
    $output .= '  
           <tr>  
                <td></td>  
                <td id="servicename" contenteditable></td>  
                <td id="serviceprice" contenteditable></td>  
                <td id="serviceemp" contenteditable></td>  
                <td><button type="button" name="btn_service_add" id="btn_service_add" class="btn btn-xs btn-success">+</button></td>  
           </tr> 
      ';
} else {
    $output .= '
	   <tr>  
                <td></td>  
                <td id="servicename" contenteditable></td>  
                <td id="serviceprice" contenteditable></td>  
                <td id="serviceemp" contenteditable></td>  
                <td><button type="button" name="btn_service_add" id="btn_service_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';
}
$output .= '</table>  
      </div>';
echo $output;
?>



