<?php
include("includes/db.php");

$date1 = $_POST["date1"];
$date2 = $_POST["date2"];
$output = '';  
 $sql = "select * from income WHERE date(date) between '$date1' and '$date2' order by date desc"; 
 $result = mysqli_query($Con, $sql); 
 $i =1;
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="50%">Description</th>  
                     <th width="20%">Amount</th>                         
                     <th width="20%">Date</th>  
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



