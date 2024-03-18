<?php

include("connection.php");
include("function.php");

 $emp_data = check_emp($conn);
 $emp_id = $emp_data['emp_id'];


$order_id  = isset($_GET['data']) ? urldecode($_GET['data']) : "No data received.";

?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Dashboard </title>
      <link rel="stylesheet" href="styles.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="styles.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
        <header class="header">
            <div class="logo">
              <a href="#">Inventory Managment</a>
              <!-- <div class="search_box">
                <input type="text" placeholder="Search EasyPay">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
              </div> -->
            </div>
        
            <div class="header-icons">
              <div class="account">
                <img src="./man.png" alt="">
                <h4><?php  echo $emp_data['name']; ?></h4>
              </div>
            </div>
          </header>
      <div class="container">
        <nav>
          <ul>
            <li><a href="#" class="logo">  
              <span class="nav-item">DashBoard</span>
            </a></li>
            <li><a href="dashboard.php">
              <!-- <i class="fas fa-home"></i> -->
              <span class="nav-item">Show Inventory</span>
            </a></li>
            <li><a href="showemp.php">
              <!-- <i class="fas fa-user"></i> -->
              <span class="nav-item">Show Employee</span>
            </a></li>
            
            <li><a href="showorder.php">
              <!-- <i class="fas fa-cog"></i> -->
              <span class="nav-item">Show Orders</span>
            </a></li>
            <li><a href="logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
          </ul>
        </nav>
    
        <section class="main">
          
       <!-- <table>
        <thead>
          <th>sr no</th>
          <th>name</th>
          <th>quantity</th>
        </thead>
        <tbody>
          <tr>
            1
          </tr>
          <tr>
            travis
          </tr>
          <tr>
            5
          </tr>
        </tbody>
       </table> -->
       <table>
        <tr>
          <th>Order Line ID</th>
          <th>Order ID</th>
          <th>Item ID</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
        <?php order_line_detail1($conn,$order_id); ?>
      </table>
      <div id="piechart"></div>
             
          </section>
        </section>
      </div>
      

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </body>
    </html></span>