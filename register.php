<?php 
session_start();
//Connect to DB
$connection = mysqli_connect("localhost", "root", "", "CS_310_final_project");

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 
//Registration
if (isset($_POST['reg_user'])) {
 
    $account_fname = mysqli_real_escape_string($connection, $_POST['account_fname']);
    $account_lname = mysqli_real_escape_string($connection, $_POST['account_lname']);
    $account_email = mysqli_real_escape_string($connection, $_POST['account_email']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

    //Email already into system?
    $emailmatch = "SELECT * FROM account WHERE account_email='$account_email' LIMIT 1";
    $result = mysqli_query($connection, $emailmatch);
    $account = mysqli_fetch_assoc($result);

    if ($account['account_email'] === $account_email) {
        $_SESSION['message'] = "Email already exists!";
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    else if ($password_1 != $password_2) {
        $_SESSION['message'] = "Passwords do not match!";
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
    else {
      $max_id_query = mysqli_query($connection, "SELECT max(account_id) FROM account");
      $max_id = mysqli_fetch_array($max_id_query)[0];
      $max_id++;
      $query = "INSERT INTO account (account_id, account_fname, account_lname, account_email, account_password,account_type) 
              VALUES('$max_id', '$account_fname', '$account_lname', '$account_email', '$password_1','2')";
      mysqli_query($connection, $query);
      $_SESSION['account_email'] = $account_email;
      $_SESSION['success'] = "You are now logged in";
      // added by Ryan to track session variable for user info
      $_SESSION['account_id'] = $max_id;
      $_SESSION['account_password'] = $password_1;
      $_SESSION['account_fname'] = $account_fname;
      $_SESSION['account_lname'] = $account_lname;
      $_SESSION['account_type'] = 2;
      // end ryan
      header('location: home.php');
      echo $_SESSION['success'];
      unset($_SESSION['success']);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="account_fname">
  	</div>
      <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="account_lname">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="account_email">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>