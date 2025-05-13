<?php
include("includes/db.php");

$todaydate = $_POST["date"];
$output = '';  
 $sql = "select * from expenses WHERE date(date) ='$todaydate'";  
 $result = mysqli_query($Con, $sql); 
 $i =1;
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="60%">Description</th>  
                     <th width="20%">Amount</th>                         
                     <th width="10%">Add</th>  
                </tr>'; 
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$i.'</td>  
                     <td>'.$row["description"].'</td>  
                     <td>'.$row["amount"].'</td>  
                     <td></td>  
                </tr>  
           ';  
           $i++;
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="description1" contenteditable></td>  
                <td id="amount1" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add2" class="btn btn-xs btn-danger">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
	   <tr>  
                <td></td>  
                <td id="description1" contenteditable></td>  
                <td id="amount1" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add2" class="btn btn-xs btn-danger">+</button></td>  
           </tr> 
      ';
 }  
 $output .= '</table>  
      </div>'; 
 
 

 echo $output;  
 ?>



