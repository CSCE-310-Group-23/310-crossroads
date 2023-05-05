<?php
  include '../../connect.php';
  start_session();

  $orderID = $_POST["orderID"];
  $buyerID = $_POST["buyerID"];
  $deliveryDate = $_POST["deliveryDate"];
  $addressID = $_POST["addressID"];
  $sql = "insert into orders (order_id, account_id, delivery_date, address_id) 
          values ('$orderID', '$buyerID', '$deliveryDate', '$addressID')";
  $conn->query($sql);
  $conn->close();
  header("location: http://localhost/crossroads/scheduling.php");
?>