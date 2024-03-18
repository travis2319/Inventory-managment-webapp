<?php
include("connection.php");
include("function.php");

//$emp_data = check_emp($conn);

$emp_id  = $_POST['emp_id'];

// Retrieve username and password from form
$invetory_address = $_POST['invetory_address'];
$storage_no = $_POST['storage_no'];
$qty = $_POST['qty'];

// Assuming you have a database connection established

// Assuming you have retrieved or set the values of $invetory_address, $item_id, $storage_no, and $qty
$invetory_id = $_POST['invetory_id']; // Assuming you have a form field with name="inventory_id"

$sql = "SELECT COUNT(*) AS count FROM inventory WHERE invetory_id = '$invetory_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count < 0) {
        echo "Inventory ID does not  exists.";
    }
    else {
    // Inventory ID doesn't exist, proceed with the update
    $update_query = "UPDATE inventory 
                     SET invetory_address = '$invetory_address', 
                         storage_no = '$storage_no', 
                         qty = '$qty' 
                     WHERE invetory_id = '$invetory_id'";

    if ($conn->query($update_query) === TRUE) {
        echo "Record updated successfully";
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
} 
?>