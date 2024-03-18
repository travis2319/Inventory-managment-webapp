<?php

include("connection.php");
include("function.php");

 $admin_data = check_admin($conn);
 $admin_id = $admin_data['admin_id'];




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
                <h4><?php  echo $admin_data['admin_id']; ?>  </h4>
              </div>
            </div>
          </header>
      <div class="container">
       <nav>
          <ul>
            <li><a href="#" class="logo">
              
              <span class="nav-item">DashBoard</span>
            </a></li>
            <li><a href="ad_orderlist.php">
              <!-- <i class="fas fa-home"></i> -->
              <span class="nav-item">Show Inventory</span>
            </a></li>
            <li><a href="placeorder.php">
              <!-- <i class="fas fa-user"></i> -->
              <span class="nav-item">Place Order</span>
            </a></li>
            
            <li><a href="">
              <!-- <i class="fas fa-cog"></i> -->
              <span class="nav-item"></span>
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
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the number of orders from the form
    $numOrders = isset($_POST['num_orders']) ? intval($_POST['num_orders']) : 0;

    // Loop through each order and retrieve data
    
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="num_orders">Number of Orders:</label>
    <input type="number" name="num_orders" id="num_orders" autocomplete="off">
   <input type="submit" value="Submit">
   </form>
    <hr>
    
    <?php
     $option = option_item($conn);
    // Generate form fields based on the number of orders
    if (isset($numOrders) && $numOrders > 0) {
        echo "<form method='post' action='OP.php'>";
        for ($i = 1; $i <= $numOrders; $i++) {
          echo "<form method='post' action=''>";
           echo "<label for='item_id[]'>Item Name for Order $i:</label>";
            echo"<select id='item_id[]' name='item_id[]'>";
            echo $option;
            echo"</select>";
            echo "<label for='quantity[]'>Quantity for Order $i:</label>";
            echo "<input type='number' name='quantity[]' required min='1'><br><br>";
        }
        echo "<input type='hidden' name='admin_id' id='admin_id'  value='$admin_id' >";
        echo "<input type='hidden' name='num_orders' id='num_orders' value='$numOrders' >";
        echo"<input type='submit' value='Submit'>";
        echo "</form>";
    }
    ?>
     
</form>

</body>
</html>

    </form>
      <div id="piechart"></div>
             
          </section>
        </section>
      </div>
      

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </body>
    </html></span>