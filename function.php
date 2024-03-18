<?php 

function check_emp($conn)
{

	if(isset($_SESSION['emp_id']))
	{

		$emp_id = $_SESSION['emp_id'];
		$query = "select * from employee where emp_id = '$emp_id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$emp_data = mysqli_fetch_assoc($result);
			return $emp_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}


function check_inven($conn)
{

	if(isset($_SESSION['emp_id']))
	{
	
        $str = ""; 
		$query = "select item_id,storage_no,qty,sdate,invetory_address,invetory_id from inventory";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
            
            while ($row = mysqli_fetch_array($result)) {          
            $item_id = $row['item_id'];
            $storage_no = $row['storage_no'];
            $qty = $row['qty'];
            $sdate = $row['sdate'];
            $invetory_address = $row['invetory_address'];
            $invetory_id = $row['invetory_id'];
			$str .= "<tr>

          				<td><a href='itemdetail.php?data=$item_id'>$item_id</a></td>
          				<td> $storage_no </td>
          				<td> $qty </td>
          				<td> $sdate </td>
          				<td><a href='up.php?data=$invetory_id'>Update</a></td>
          				<td> <a href='delete.php?data=$invetory_id&data1=$item_id'>Delete</a></td>
        			</tr>";
			}
			echo $str;
		}
		
	}
    
}


function itemD($conn,$item_id)
{

        $str = ""; 
		$query = "select * from item where item_id = '$item_id'";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$item_data = mysqli_fetch_assoc($result);
			$item_id = $item_data['item_id'];
			$item_name = $item_data['item_name'];
			$price = $item_data['price'];
			$str = "<tr>
          				<td>$item_id </td>
          				<td>$item_name </td>
          				<td>$price </td>
        			</tr>";
		}
	    echo $str;
}

function display_emps($conn)
{

	if(isset($_SESSION['emp_id']))
	{
        $str = ""; 
		$query = "select emp_id,name,dob,address from employee";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
            
            while ($row = mysqli_fetch_array($result)) {          
            $emp_id = $row['emp_id'];
            $name = $row['name'];
            $dob = $row['dob'];
            $address = $row['address'];

			$str .= "<tr>

          				<td>$emp_id</td>
          				<td> $name </td>
          				<td> $dob </td>
          				<td> $address <td>
        			</tr>";
			}
			echo $str;
		}
		
	}
    
}

function get_inven_info($conn,$invetory_id)
{
       
		$query = "select * from inventory where invetory_id = '$invetory_id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$inven_data = mysqli_fetch_assoc($result);
			return $inven_data;
		}

	//redirect to login
	header("Location: up.php");
	die;

}

function check_admin($conn)
{

	if(isset($_SESSION['admin_id']))
	{

		$admin_id = $_SESSION['admin_id'];
		$query = "select * from admin where admin_id = '$admin_id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$admin_data = mysqli_fetch_assoc($result);
			return $admin_data;
		}
	}

	//redirect to login
	header("Location: logadmin.php");
	die;

}


function option_item($conn)
{
    $sql = "SELECT item_id, item_name FROM item";
   $result = $conn->query($sql);

// Check if there are rows in the result
      if ($result->num_rows > 0) {
      $options = "";
      while ($row = $result->fetch_assoc()) {

        $options .= "<option value='" . $row['item_id'] . "'>" . $row['item_name'] . "</option>";
       }
       
       return $options;
      }
       
}

function item_price($conn,$item_id)
{
		$sql = "select price from item where item_id = '$item_id' limit 1";

		$result = $conn->query($sql);
		if($result && mysqli_num_rows($result) > 0)
		{
			$row = $result->fetch_assoc();
			//$price = mysqli_fetch_assoc($result);
			//return $price;
			return $row['price'];
		}

}

function display_oder($conn)
{

	if(isset($_SESSION['admin_id']))
	{
	
        $str = ""; 
		$query = "select * from orderd";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
            
            while ($row = mysqli_fetch_array($result)) {          
            $order_id = $row['order_id'];
            $total_price = $row['total_price'];
            $admin_id = $row['admin_id'];
            $order_date = $row['order_date'];
			$str .= "<tr>

          				<td><a href='orderdetail.php?data=$order_id'>$order_id</a></td>
          				<td> $total_price </td>
          				<td> $admin_id </td>
          				<td> $order_date <td>
        			</tr>";
			}
			echo $str;
		}
		
	}
    
}

function display_oder1($conn)
{

	if(isset($_SESSION['emp_id']))
	{
	
        $str = ""; 
		$query = "select * from orderd";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
            
            while ($row = mysqli_fetch_array($result)) {          
            $order_id = $row['order_id'];
            $total_price = $row['total_price'];
            $admin_id = $row['admin_id'];
            $order_date = $row['order_date'];
			$str .= "<tr>

          				<td><a href='showOdetail.php?data=$order_id'>$order_id</a></td>
          				<td> $total_price </td>
          				<td> $admin_id </td>
          				<td> $order_date <td>
        			</tr>";
			}
			echo $str;
		}
		
	}
    
}


function order_line_detail($conn,$order_id)
{

	   $str = ""; 
		$query = "select * from order_line where order_id = '$order_id'";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
            
            while ($row = mysqli_fetch_array($result)) {          
            $order_line_id = $row['order_line_id'];
            $order_id = $row['order_id'];
            $item_id = $row['item_id'];
            $qty = $row['qty'];
            $price = $row['price'];
			$str .= "<tr>

          				<td>$order_line_id</td>
          				<td>$order_id</td>
          				<td><a href='oITD.php?data=$item_id'>$item_id</a></td>
          				<td> $qty <td>
          				<td> $price <td>
        			</tr>";
			}
			echo $str;
		}
}
function order_line_detail1($conn,$order_id)
{

	   $str = ""; 
		$query = "select * from order_line where order_id = '$order_id'";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
            
            while ($row = mysqli_fetch_array($result)) {          
            $order_line_id = $row['order_line_id'];
            $order_id = $row['order_id'];
            $item_id = $row['item_id'];
            $qty = $row['qty'];
            $price = $row['price'];
			$str .= "<tr>
          				<td>$order_line_id</td>
          				<td>$order_id</td>
          				<td><a href='itemdetail.php?data=$item_id'>$item_id</a></td>
          				<td> $qty </td>
          				<td> $price </td>
        			</tr>";
			}
			echo $str;
		}
}
function loadTeachingClasses($con)
{
	$checkTeaching = true;
	$user_data=check_login($con);
	$teacher = $user_data['user_name'];
	$str = ""; //String to return 
	$data_query = mysqli_query($con,"SELECT * FROM createclass where teacher = '$teacher'");

	if (mysqli_num_rows($data_query) > 0) {
		while ($row = mysqli_fetch_array($data_query)) {
			$class_id = $row['class_id'];
			$class_name = $row['class_name'];
			$semester = $row['semester'];
			$teacher = $row['teacher'];
			$code = $row['class_code'];

			$delete_teachingClass = "<a href='delete.php?class_code=$code'><input type='button' id='delete_class_btn' value='Remove'></a>";
			$str .= "<div class='classBox'>
	
								<a href = 'classroom.php?class_code=$code'>  <h3>$class_name </h3></a> 
								Semster: $semester<br>
								Teacher: $teacher
								<br>
								<p> $delete_teachingClass </p>
				        </div> ";
		}
		echo $str;
		

	}

}

?>