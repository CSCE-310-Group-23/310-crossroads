<?php
  // connect
  $user = 'root';
  $password = '';
  $database = 'crossroads';
  $servername='localhost:3306';
  $mysqli = new mysqli($servername, $user, $password, $database);
  // Check connection
  if ($mysqli->connect_error) {
      die('Connect Error (' .
      $mysqli->connect_errno . ') '.
      $mysqli->connect_error);
  }

  //start_session();

  if($_SESSION['is_admin']) {
    echo "<h1>All Orders</h1>";
    // $query = "SELECT * FROM orders";
    $query = "SELECT * 
            FROM orders
          JOIN address_label 
            ON address_label.account_id=orders.account_id 
          AND address_label.address_id=orders.address_id
          JOIN account
            ON account.account_id=orders.account_id
          ORDER BY order_id ASC
          ";
    // build table
    echo "<table border='1'>
      <tr>
        <th>Order ID</th>
        <th>Buyer's Account ID</th>
        <th>Buyer's Name</th>
        <th>Buyer's Email</th>
        <th>Delivery Date</th>
        <th>Address ID</th>
        <th>Address Label</th>
      </tr>
    ";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo 	"<td>" . $row['order_id'] . "</td>";
      echo 	"<td>" . $row['account_id'] . "</td>";
      echo 	"<td>" . $row['account_fname'] . " " 
                  . $row['account_lname'] . "</td>";
      echo 	"<td>" . $row['account_email'] . "</td>";
      echo 	"<td>" . $row['delivery_date'] . "</td>";
      echo 	"<td>" . $row['address_id'] . "</td>";
      echo 	"<td>" . $row['address_title'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else {
    echo "<h1>" . $_SESSION['account_fname'] . " " . $_SESSION['account_lname'] . "'s Orders";
    $query = "SELECT * FROM orders WHERE account_id='" . $_SESSION['account_id'] . "'";
  }
?>