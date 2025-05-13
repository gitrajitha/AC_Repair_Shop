<?php
include("includes/db.php");


$output = '';  
 $sql = "SELECT id,product_no,product_type,product_description,customer_name,customer_contact_no FROM customer c inner join repair_product_details r on c.cus_id = r.customer_id";  
 $result = mysqli_query($Con, $sql); 
 $i =1;
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="5%">No:</th>  
                     <th width="15%">Product No</th>  
                     <th width="15%">Product Type</th>  
                     <th width="20%">Product Description</th>  
                     <th width="25%">Customer Name</th>  
                     <th width="10%">Contact Details</th>  
                     <th width="5%">View Details</th>  
                  
                </tr>'; 
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	 
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$i.'</td>  
                     <td class="productno" data-id1="'.$row["id"].'" contenteditable>'.$row["product_no"].'</td>  
                     <td class="producttype" data-id2="'.$row["id"].'" >'.$row["product_type"].'</td>  
                     <td class="productdescription" data-id3="'.$row["id"].'" contenteditable>'.$row["product_description"].'</td>  
                     <td class="customername" data-id4="'.$row["id"].'" contenteditable>'.$row["customer_name"].'</td>  
                     <td class="contactnumber" data-id5="'.$row["id"].'" contenteditable>'.$row["customer_contact_no"].'</td>  
                     <td><button type="button" name="view_btn" data-id6="'.$row["id"].'" class="btn btn-xs btn-info btn_view">VIEW</button></td>  
                </tr>  
           ';  
           $i++;
      }  
      
 }  
 
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>



