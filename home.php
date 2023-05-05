<!-- PHP code to query account data -->
<?php 
    include 'connect.php';
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
		  <title>CR - Home</title>
      <!-- CSS FOR STYLING THE PAGE -->
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <?php require_once(__DIR__.'/navbar.html'); ?>
      <section>
          <h1>Test - [Display Account Data]</h1>
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