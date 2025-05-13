<?php
include("includes/db.php");


$output = '';  
 $sql = "select supplier_name,supplier_telephoneno,sum(grn_netamount) as net_amount, sum(grn_paidamount) as paid_amount from suppliers s inner join grn g on s.supplier_id = g.supplier_id where grn_netamount > grn_paidamount group by supplier_name, supplier_telephoneno";
 $result = mysqli_query($Con, $sql); 
 $i =1;
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="30%">Supplier Name</th>  
                     <th width="30%">Contact Number</th>  
                     <th width="20%">Total Debits</th>  
                     <th width="10%">Pay Here</th>  
                </tr>'; 
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  	  
      while($row = mysqli_fetch_array($result))  
      {  
          $totcredits = $row["net_amount"] - $row["paid_amount"];
          $id = $row["supplier_name"].'|'.$row["supplier_telephoneno"];
           $output .= '  
                <tr>  
                     <td>'.$i.'</td>  
                     <td class="name" data-id1="'.$id.'" >'.$row["supplier_name"].'</td>  
                     <td class="conno" data-id2="'.$id.'" >'.$row["supplier_telephoneno"].'</td>  
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



