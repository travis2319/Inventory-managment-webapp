<?php

include("connection.php");
include("function.php");

 $emp_data = check_emp($conn);
 $emp_id = $emp_data['emp_id'];




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
         
              <a href="ADDITEM1.php?data=<?php echo urlencode($emp_id); ?>" > <i class="fas fa-bell"> ADD iteam</i> </a> 
              <div class="account">
                <img src="./man.png" alt="">
                <h4><?php  echo $emp_data['name']; ?>  </h4>
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
          <th>Iteam ID</th>
          <th>Storage Number</th>
          <th>Quantity</th>
          <th>Date</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
        <?php check_inven($conn); ?>


      </table>
      <div id="piechart"></div>
             
          </section>
        </section>
      </div>
      

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Electronics', 8],
  ['Furniture', 2],
  ['wephons', 4],
  ['Textile', 2],
  ['Raw material', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script> -->
    </body>
    </html></span>