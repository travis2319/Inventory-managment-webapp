<?php
include("connection.php");
include("function.php");

//$emp_data = check_emp($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
$order_id = rand(1000, 9999);
$order_date = date('Y-m-d');
$admin_id =  $_POST['admin_id'];
$num_orders =  $_POST['num_orders'];
   
    // Retrieve the posted array
    $IID = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    // Display the received values
   


// Combine the two arrays into an associative array
$combinedArray = array_combine($IID, $quantity);

// Check if arrays have the same length
if ($combinedArray !== false) {
    // Iterate over the combined array using foreach

    $total_price= 0;
   foreach ($combinedArray as $item_id => $qty) {
    $price = item_price($conn,$item_id);
    $price *= $qty;
    $total_price +=  $price; 
    }

} 

}

   $sql = "INSERT INTO orderd (order_id,total_price,admin_id,order_date) VALUES ('$order_id','$total_price','$admin_id','$order_date')";
    
    if ($conn->query($sql) === TRUE){ 
        $i =1;
    foreach ($combinedArray as $item_id => $qty) {
    $price1 = item_price($conn,$item_id);
    $order_line_id = $order_id.$i;
    $sql1 = "INSERT INTO order_line (order_line_id,order_id,item_id,qty,price) VALUES ('$order_line_id','$order_id','$item_id','$qty','$price1')";
   $sql2 = "UPDATE inventory SET qty = qty - '$qty' WHERE item_id = '$item_id'";
    $i+=1; 
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE){ 
        header("Location: ad_orderlist.php");
        }  
    else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
   
// Insert new user into the database
    
/*
$sql = "SELECT * FROM item WHERE item_name='$item_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Item already exists. If you want to update item please go to UPDATE.";
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
*/

?>
 
    
  
