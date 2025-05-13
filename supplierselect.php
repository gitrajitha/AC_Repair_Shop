<?php
include("includes/db.php");


$output = '';  
 $sql = "SELECT * FROM suppliers ORDER BY supplier_id Asc";  
 $result = mysqli_query($Con, $sql); 
 $i =1;
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="20%">Supplier Name</th>  
                     <th width="20%">Telephone Number</th>  
                     <th width="40%">Supplier Address</th>  
                     <th width="10%">Delete</th>  
                </tr>'; 
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$i.'</td>  
                     <td class="supname" data-id1="'.$row["supplier_id"].'" contenteditable>'.$row["supplier_name"].'</td>  
                     <td class="suptp" data-id2="'.$row["supplier_id"].'" contenteditable>'.$row["supplier_telephoneno"].'</td>  
                     <td class="supaddress" data-id3="'.$row["supplier_id"].'" contenteditable>'.$row["suppler_address"].'</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["supplier_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
           $i++;
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="supname" contenteditable></td>  
                <td id="suptp" contenteditable></td>  
                <td id="supaddress" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
                <td></td>  
                <td id="supname" contenteditable></td>  
                <td id="suptp" contenteditable></td>  
                <td id="supaddress" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>



