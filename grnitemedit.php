<?php  
	include("includes/db.php");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
        
        if($column_name =='qty'){
            
            $sql = "SELECT * FROM grn_item where grn_item_id='$id'";  
            $result = mysqli_query($Con, $sql); 
            while($row = mysqli_fetch_array($result)){
                $lastupdatedqty= $row['qty'];
                $itemname = $row['item_name'];
                
                $sql1 = "SELECT item_qty from item where item_name='$itemname' ";
                $result1 = mysqli_query($Con, $sql1); 
              while($row1 = mysqli_fetch_array($result1)){
                  $currnetitemqty = $row1['item_qty'];
                  $orginalitemqty = ($currnetitemqty-$lastupdatedqty)+$text;
                  
                  $sql2 = "UPDATE item set item_qty='$orginalitemqty' where item_name='$itemname'";
                  mysqli_query($Con, $sql2);
              }
                
            }
        }if($column_name == 'buy_price'){
            $sql = "SELECT * FROM grn_item where grn_item_id='$id'";  
            $result = mysqli_query($Con, $sql); 
            while($row = mysqli_fetch_array($result)){              
                $itemname = $row['item_name'];
            $sql2 = "UPDATE item set buying_price='$text' where item_name='$itemname'";
                  mysqli_query($Con, $sql2);
            }
        }
        
	$sql = "UPDATE grn_item SET ".$column_name."='".$text."' WHERE grn_item_id='".$id."'";  
	if(mysqli_query($Con, $sql))  
	{  
		echo 'Successfully Data Updated';  
	}  
        
        
 ?>
