<!-- 
	@AUTHOR Ryan Kafka
    Used to delete existing orders from the database
    Users can delete only their associated orders, Admins can delete ANY order.
-->
<?php
	// connect
	$user = 'root';
	$password = '';
	$database = 'CS_310_final_project';
	$servername='localhost:3306';
	$conn = new mysqli($servername, $user, $password, $database);
	// Check connection
	if ($conn->connect_error) {
	  die('Connect Error (' .
	  $conn->connect_errno . ') '.
	  $conn->connect_error);
	}
	// resume session
	session_start();

	$id = $_GET['id'];
	// must delete associated item_list first as it uses Order as a key
	$sql = "DELETE FROM item_list WHERE order_id=$id";
	$conn->query($sql);
	// delete order based off its unique id
	$sql = "DELETE FROM orders WHERE order_id=$id";
	$conn->query($sql);
	// close connection
	$conn->close();
	// reload main order-scheduling page
	header("location: http://localhost/310-crossroads-main/orders/scheduling.php?id=-1");
?>