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

  // session_start();

  $query = "SELECT * FROM orders
              LEFT JOIN address_label 
                ON address_label.account_id=orders.account_id 
              AND address_label.address_id=orders.address_id
              LEFT JOIN account
                ON account.account_id=orders.account_id";
  if(!$_SESSION['is_admin']) {
    echo "<h1>" . $_SESSION['account_fname'] . " " . $_SESSION['account_lname'] . "'s Orders";
    $query = $query . ' WHERE orders.account_id=' . $_SESSION['account_id'];
  }
  else {
    echo "<h1>All Orders [ADMIN VIEW]</h1>";
  }
  $query = $query . " ORDER BY order_id ASC";

  echo $_SESSION['account_id'];

  // build table
  echo "<table border='1'>
    <tr>
      <th>Order ID</th>";
  if($_SESSION['is_admin'] || $_SESSION['account_type'] == 1)
    echo  "<th>Buyer's Account ID</th>
      <th>Buyer's Name</th>
      <th>Buyer's Email</th>";
  echo "<th>Delivery Date</th>";
  echo "<th>Address ID</th>";
  echo "<th>Address Label</th>
    </tr>
  ";
  $result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    if($row['order_id'] == $_GET['id']) {
      echo '<form action="http://localhost/crossroads/orders/functions/update_order.php" method="POST">';
      //
      echo 	"<td>" . $row['order_id'] . "</td>";
      if($_SESSION['is_admin']) {
        echo '<td><input type="number" name="buyerID" value="'.$row['account_id'].'"></td>';
        echo '<td> <em style="color:darkgreen;">updating...</em>
              </td>';
        echo '<td> <em style="color:darkgreen;">updating...</em> </td>';
      }
      echo '<td><input type="date" min="2023-05-05" name="deliveryDate" value="'.$row['delivery_date'].'"></td>';
      echo '<td><input type="number" name="addressID" value="'.$row['address_id'].'"></td>';
      echo '<td> <em style="color:darkgreen;">updating...</em> </td>';
      //
      echo '<td><button type="submit">Save</button></td>';
      echo '<input type="hidden" name="id" value="'.$row['order_id'].'">';
      echo '</form>';
    }
    else {
      //
      echo 	"<td>" . $row['order_id'] . "</td>";
      if($_SESSION['is_admin']) {
        echo 	"<td>" . $row['account_id'] . "</td>";
        echo 	"<td>" . $row['account_fname'] . " " 
                      . $row['account_lname'] . "</td>";
        echo 	"<td>" . $row['account_email'] . "</td>";
      }
      echo 	"<td>" . $row['delivery_date'] . "</td>";
      echo 	"<td>" . $row['address_id'] . "</td>";
      echo 	"<td>" . $row['address_title'] . "</td>";
      //
      echo 	'<td><a href="http://localhost/crossroads/orders/scheduling.php?id=' . $row['order_id'] . '" role="button">Update</a></td>';
    }
    echo 	'<td><a href="http://localhost/crossroads/orders/functions/delete_order.php?id=' . $row['order_id'] . '" role="button">Delete</a></td>';
    echo "</tr>";
  }
  echo "</table>";
  $conn->close();
?>