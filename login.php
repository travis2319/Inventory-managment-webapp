<?php

include("connection.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST["emp_id"];
    $password = $_POST["password"];

    // Add your authentication logic here
    $sql = "SELECT * FROM employee WHERE emp_id='$emp_id' AND password='$password'";
    $result = $conn->query($sql);

   if ($result->num_rows == 1) {
    $_SESSION['emp_id'] = $emp_id;
   header("Location: dashboard.php");
exit;// Redirect to welcome page on successful login
   }
    else {
        echo "Invalid username or password.";
    }
}
?>
