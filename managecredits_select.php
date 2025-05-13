<?php
include("includes/db.php");


$output = '';  
 $sql = "select cus_id,customer_name,customer_contact_no,sum(net_amount) as net_amount, sum(paid_amount) as paid_amount from invoice i inner join repair_product_details r on i.repair_product_id = r.id inner join customer c on c.cus_id = r.customer_id where net_amount > paid_amount group by customer_name,customer_contact_no";  
 $result = mysqli_query($Con, $sql); 
 $i =1;
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="30%">Customer Name</th>  
                     <th width="30%">Contact Number</th>  
                     <th width="20%">Total Credits</th>  
                     <th width="10%">Pay Here</th>  
                </tr>'; 
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  	  
      while($row = mysqli_fetch_array($result))  
      {  
          $totcredits = $row["net_amount"] - $row["paid_amount"];
          $id = $row["customer_name"].'-'.$row["customer_contact_no"];
           $output .= '  
                <tr>  
                     <td>'.$i.'</td>  
                     <td class="name" data-id1="'.$id.'" >'.$row["customer_name"].'</td>  
                     <td class="conno" data-id2="'.$id.'" >'.$row["customer_contact_no"].'</td>  
                     <td  style = "color:red;" class="credit" data-id3="'.$id.'">Rs.'.$totcredits.'.00</td>  
                     <td><button type="button" name="view_btn" data-id4="'.$id.'" class="btn btn-xs btn-warning btn_view">PAY</button></td>  
                </tr>  
           ';  
           $i++;
      }  
    
 }  
 
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>



