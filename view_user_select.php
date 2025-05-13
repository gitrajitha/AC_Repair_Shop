<?php
session_start();
include("includes/db.php");
    $usertype = $_SESSION['type'];
    $username = $_SESSION['username'];
    
    if($usertype != "Admin"){
        $sql = "SELECT * FROM users where deleteuser !='1' and username='$username' ORDER BY id Asc";
    }else{
        $sql = "SELECT * FROM users where deleteuser !='1' ORDER BY id Asc";
    }

$output = '';

$result = mysqli_query($Con, $sql);
$i = 1;
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="myTable">  
                <tr>  
                     <th width="10%">No:</th>  
                     <th width="15%">First Name</th>  
                     <th width="15%">Last Name</th>  
                     <th width="20%">Usename</th>  
                     <th width="20%">UserType</th>  
                     <th width="10%">Change Password</th>  
                     <th  width="10%"><center>Delete</center></th>  
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $usertype = $row["usertype"];
        $userid = $row["id"];



        $output .= '  
                <tr>  
                     <td>' . $i . '</td>  
                     <td class="fname" data-id1="' . $row["id"] . '" contenteditable>' . $row["fname"] . '</td>  
                     <td class="lname" data-id2="' . $row["id"] . '" contenteditable>' . $row["lname"] . '</td>  
                     <td class="username" data-id3="' . $row["id"] . '" contenteditable>' . $row["username"] . '</td>  
                     <td  contenteditable><select class="usertypetable" id="usertype' . $userid . '" data-id4="' . $row["id"] . '">
                           <option value = "' . $usertype . '" selected>' . $usertype . '</option>';


        $sql1 = "SELECT name FROM userypes where name !='$usertype'";
        $result1 = mysqli_query($Con, $sql1);
        while ($row1 = mysqli_fetch_array($result1)) {
            $output .= '  <option value = "' . $row1["name"] . '" >' . $row1["name"] . '</option>';
        }
        $output .= '  
        </td>
         <td><button type = "button" name = "delete_btn" data-id6 = "' . $row["id"] . '" class = "btn btn-xs btn-warning btn_changepw">Change</button></td>

        <td><center><button type = "button" name = "delete_btn" data-id5 = "' . $row["id"] . '" class = "btn btn-xs btn-danger btn_delete">x</button></center></td>
        </tr>
        ';
        $i++;
    }
}

$output .= '</table>
        </div>';
echo $output;
?>



