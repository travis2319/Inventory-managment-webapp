<?php
include("connection.php");
include("function.php");

$emp_data = check_emp($conn);
$emp_id = $emp_data['emp_id'];

//$emp_id  = isset($_GET['data']) ? urldecode($_GET['data']) : "No data received.";
//echo $emp_id;
$invetory_id  = isset($_GET['data']) ? urldecode($_GET['data']) : "No data received.";
$item_id  = isset($_GET['data1']) ? urldecode($_GET['data1']) : "No data received.";


    // Insert new user into the database

    $sql1 = "DELETE FROM inventory WHERE invetory_id = '$invetory_id'";
$result1 = mysqli_query($conn, $sql1);

// Delete from the item table

// Check if both deletions were successful
if ($result1) {
    header("Location: dashboard.php");
} else {
    echo "Error executing deletions: " . mysqli_error($conn);
}
?>