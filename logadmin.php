<?php

include("connection.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST["admin_id"];
    $password = $_POST["password"];

    // Add your authentication logic here
    $sql = "SELECT * FROM admin WHERE admin_id='$admin_id' AND password='$password'";
    $result = $conn->query($sql);

   if ($result->num_rows == 1) {
    $_SESSION['admin_id'] = $admin_id;
   header("Location: ad_orderlist.php");
exit;// Redirect to welcome page on successful login
   }
    else {
        echo "Invalid username or password.";
    }
}
?>