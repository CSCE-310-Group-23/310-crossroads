<!-- 
	@AUTHOR Ryan Kafka
    Used to edit/update the orders in the database
    Users can edit/update their associated orders, Admins can update ALL orders.
-->
<?php
  // connect to database
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
  
  // check if user is an admin to determine what buyer account ID will be 
  // (or if it can be selected by the user)
  if($_SESSION['is_admin'])
    $buyerID = $_POST["buyerID"]; // take buyer ID as input from a form
  else
    $buyerID = $_SESSION['account_id']; // set buyer ID to the user currently logged in
  
  // set values for delivery date and address ID
  $deliveryDate = $_POST["deliveryDate"];
  $addressID = $_POST["addressID"];
  // insert the new order into the list
  $sql = "insert into orders (account_id, delivery_date, address_id) 
          values ('$buyerID', '$deliveryDate', '$addressID')";
  $conn->query($sql);
  // close the connection
  $conn->close();
  // return to the main scheduling page
  header("location: http://localhost/310-crossroads-main/orders/scheduling.php?id=-1");
?>