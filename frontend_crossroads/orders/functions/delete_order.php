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
	session_start();

	$id = $_GET['id'];
	$sql = "DELETE FROM orders WHERE order_id=$id";
	$conn->query($sql);
	$conn->close();
	header("location: http://localhost/crossroads/orders/scheduling.php?id=-1");
?>