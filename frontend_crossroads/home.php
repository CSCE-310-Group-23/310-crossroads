<!--<?php
  echo "\r\n Hello World!";
  echo "<br>";
  echo "lol";
?>-->




<!-- PHP code to establish connection with the localserver -->
<?php
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
?>
<!-- PHP code to query account data -->
<?php 
  // Query Account Data from Database
  $sql = " SELECT * FROM account ORDER BY account_id DESC ";
  $result = $mysqli->query($sql);
  $mysqli->close(); 
?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <link rel="icon" type="image/x-icon? href="images/csce310-crossroads-o1-1.svg">
		  <title>Crossroads - Home</title>
      <!-- CSS FOR STYLING THE PAGE -->
      <style>
          table {
              margin: 0 auto;
              font-size: large;
              border: 1px solid black;
          }
  
          h1 {
              text-align: center;
              color: #006600;
              font-size: xx-large;
              font-family: 'Gill Sans', 'Gill Sans MT',
              ' Calibri', 'Trebuchet MS', 'sans-serif';
          }
  
          td {
              background-color: #E4F5D4;
              border: 1px solid black;
          }
  
          th,
          td {
              font-weight: bold;
              border: 1px solid black;
              padding: 10px;
              text-align: center;
          }
  
          td {
              font-weight: lighter;
          }
      </style>
  </head>
  <body>
      <?php require_once(__DIR__.'/navbar.html'); ?>
      <section>
          <h1>Test - Account</h1>
          <!-- TABLE CONSTRUCTION -->
          <table>
              <tr>
                  <th>AccountID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Account Type</th>
              </tr>
              <!-- PHP CODE TO FETCH DATA FROM ROWS -->
              <?php
                  // LOOP TILL END OF DATA
                  while($rows=$result->fetch_assoc())
                  {
              ?>
              <tr>
                  <!-- FETCHING DATA FROM EACH
                      ROW OF EVERY COLUMN -->
                  <td><?php echo $rows['account_id'];?></td>
                  <td><?php echo $rows['account_fname'];?></td>
                  <td><?php echo $rows['account_lname'];?></td>
                  <td><?php echo $rows['account_email'];?></td>
                  <td><?php echo $rows['account_type'];?></td>
              </tr>
              <?php
                  }
              ?>
          </table>
      </section>
  </body>
</html>