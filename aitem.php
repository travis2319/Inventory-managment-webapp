<?php
include("connection.php");
include("function.php");

//$emp_data = check_emp($conn);


$emp_id  = $_POST['emp_id'];
//echo $emp_id;

// Retrieve username and password from form
$invetory_id  = rand(1000, 9999);
$invetory_address = $_POST['invetory_address'];
$item_id =    $_POST['item_id'];
$storage_no = $_POST['storage_no'];
$qty = $_POST['qty'];
$sdate = date("Y-m-d");
$item_name =  $_POST['item_name'];
$price =  $_POST['price'];


$sql = "SELECT * FROM item WHERE item_id='$item_id'";
$result = $conn->query($sql);
  
if ($result->num_rows > 0) {
   // echo "Item already exists. If you want to update item please go to UPDATE.";
    $sql1 ="UPDATE item SET price = '$price' WHERE item_id = '$item_id'";
    $sql2 = "INSERT INTO inventory (invetory_id,invetory_address,item_id,storage_no,qty,sdate,emp_id) VALUES ('$invetory_id','$invetory_address','$item_id','$storage_no','$qty','$sdate','$emp_id')";

    if ($conn->query($sql2) === TRUE && $conn->query($sql1) === TRUE){
        
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Insert new user into the database
    $sql1 = "INSERT INTO item (item_id,item_name,price) VALUES ('$item_id','$item_name','$price')";
    $sql2 = "INSERT INTO inventory (invetory_id,invetory_address,item_id,storage_no,qty,sdate,emp_id) VALUES ('$invetory_id','$invetory_address','$item_id','$storage_no','$qty','$sdate','$emp_id')";
    
    if ($conn->query($sql2) === TRUE && $conn->query($sql1) === TRUE){
        
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>


