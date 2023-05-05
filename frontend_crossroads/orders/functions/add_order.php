<?php
  // connect
  $user = 'root';
  $password = '';
  $database = 'crossroads';
  $servername='localhost:3306';
  $conn = new mysqli($servername, $user, $password, $database);
  // Check connection
  if ($conn->connect_error) {
    die('Connect Error (' .
    $conn->connect_errno . ') '.
    $conn->connect_error);
  }
  session_start();
  
  if($_SESSION['is_admin'])
    $buyerID = $_POST["buyerID"];
  else
    $buyerID = $_SESSION['account_id'];
  $deliveryDate = $_POST["deliveryDate"];
  $addressID = $_POST["addressID"];
  $sql = "insert into orders (account_id, delivery_date, address_id) 
          values ('$buyerID', '$deliveryDate', '$addressID')";
  $conn->query($sql);
  $conn->close();
  header("location: http://localhost/crossroads/orders/scheduling.php?id=-1");
?>