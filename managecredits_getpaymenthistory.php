<?php
include("includes/db.php");

$id = $_POST["id"];

$splited_val = explode("-", $id);
$splited_cusname = $splited_val[0];
$splited_cusno = $splited_val[1];


$output = '';  
 $sql = "SELECT * FROM credit_details where customer_name = '$splited_cusname'";  
 $result = mysqli_query($Con, $sql); 
 $i =1;
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="30%">Invoice Id</th>  
                     <th width="30%">Amount Paid</th>  
                     <th width="30%">Date</th>  
                     
                </tr>'; 
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$i.'</td>  
                     <td>'.$row["invoice_id"].'</td>  
                     <td>Rs.'.$row["paid_amount"].'.00</td>  
                     <td>'.$row["date"].'</td>  
                </tr>  
           ';  
           $i++;
      }  
    
 }  
 
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>



