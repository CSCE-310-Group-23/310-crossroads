<!-- 
	@AUTHOR Ryan Kafka
    Used to view the orders in the database.
    Creates the table that the users/admins see on the Order-Scheduling page using 
    SQL queries to populate.
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

  // create query to build table from
  //   JOIN #1 --> used to incorporate address label/title associated with the address ID and account ID
  //   JOIN #2 --> used to incorporate the buyer's name and email (for viewing in admin view)
  $query = "SELECT * FROM orders
              LEFT JOIN address_label 
                ON address_label.account_id=orders.account_id 
                AND address_label.address_id=orders.address_id
              LEFT JOIN account
                ON account.account_id=orders.account_id";

  // check if currently logged in user is an admin
  if(!$_SESSION['is_admin']) {
    // denote what user is being viewed
    echo "<h1>" . ($_SESSION['account_fname']) . " " . $_SESSION['account_lname'] . "'s Orders";
    // limit SQL results to only contain information about the user currently logged-in
    $query = $query . ' WHERE orders.account_id=' . $_SESSION['account_id'];
  }
  else {
    // denote that Admin can view all orders in database
    echo "<h1>All Orders [ADMIN VIEW]</h1>";
  }
  // order query resutls by Order ID for clarity
  $query = $query . " ORDER BY order_id ASC";

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
  // get result of SQL query
  $result = mysqli_query($conn,$query);
  // build table from SQL query's result
  while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    // allow update of row selected by 'update' button by using update_order.php functionality
    if (isset($_GET['id']) && $row['order_id'] == $_GET['id']) {
      echo '<form action="http://localhost/310-crossroads-main/orders/functions/update_order.php" method="POST">';
 
      echo 	"<td>" . $row['order_id'] . "</td>";
      if($_SESSION['is_admin']) {
        echo '<td><select name="buyerID">';
        // create dropdown of account IDs to update from
        $query = "SELECT account_id, account_email FROM account";
        $result3 = mysqli_query($conn, $query);
        while ($row3 = mysqli_fetch_assoc($result3)) {
          echo '<option value="' . $row3['account_id'] . '"';
          if ($row3['account_id'] == $row['account_id']) {
            echo ' selected';
          }
          echo '>' . $row3['account_id'] . ' - ' . $row3['account_email'] . '</option>';
        }
        echo '</select></td>';
        echo '<td> <em style="color:darkgreen;">updating...</em>
              </td>';
        echo '<td> <em style="color:darkgreen;">updating...</em> </td>';
      }
      echo '<td><input type="date" min="2023-05-05" name="deliveryDate" value="'.$row['delivery_date'].'"></td>';
//      echo '<td><input type="number" name="addressID" value="'.$row['address_id'].'"></td>';
      echo '<td><select name="addressID">';
      $query = "SELECT account_id, address_id, address_title FROM address_label";
      if (!$_SESSION['is_admin']) {
        $query = $query . ' WHERE account_id=' . $_SESSION['account_id']. ';';
      } else {
        $query = $query . ';';
      }
      $result3 = mysqli_query($conn, $query);
      while ($row3 = mysqli_fetch_assoc($result3)) {
        echo '<option value="' . $row3['address_id'] . '"';
        if ($row3['address_id'] == $row['address_id']) {
          echo ' selected';
        }
        echo '>' . $row3['address_id'] . ' - ' . $row3['address_title'] . '</option>';
      }
      echo '</select></td>';

      // change text that will be updated after the changeable values are submitted
      //    must base this information off the new IDs given
      echo '<td> <em style="color:darkgreen;">updating...</em> </td>';
      // allow saving (submission) of input to finalize the new values
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
      echo 	'<td><a href="http://localhost/310-crossroads-main/orders/scheduling.php?id=' . $row['order_id'] . '" role="button">Update</a></td>';
    }
    echo 	'<td><a href="http://localhost/310-crossroads-main/orders/functions/delete_order.php?id=' . $row['order_id'] . '" role="button">Delete</a></td>';
    echo "</tr>";
  }
  echo "</table>";
  $conn->close();
?>