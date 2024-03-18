<?php
include("connection.php");

// Retrieve username and password from form
$emp_id =  $_POST['emp_id'];
$password = $_POST['password'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];

// Check if username exists
$sql = "SELECT * FROM employee WHERE emp_id='$emp_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username already exists. Please choose a different username.";
} else {
    // Insert new user into the database
    $sql = "INSERT INTO employee (emp_id,password,name,dob,address) VALUES ('$emp_id','$password','$name','$dob','$address')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
