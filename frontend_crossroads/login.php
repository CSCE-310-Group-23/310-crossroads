<?php 
session_start();

//Connect to DB
$connection = mysqli_connect("localhost", "root", "", "crossroads");

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 

//Login
if (isset($_POST['login_user'])) {
    $account_email = mysqli_real_escape_string($connection, $_POST['account_email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
  
    if (empty($account_email)) {
        $_SESSION['message'] = "You did not enter an email!";
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    else if (empty($password)) {
        $_SESSION['message'] = "You did not enter a password!";
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    else{
        $query = "SELECT * FROM account WHERE account_email='$account_email' AND account_password='$password'";

        $results = mysqli_query($connection, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['account_email'] = $account_email;
          $_SESSION['success'] = "You are now logged in";
          // added by Ryan to track session variable for user info
          $row = mysqli_fetch_array($results);

          $_SESSION['account_id'] = $row['account_id'];
          $_SESSION['account_password'] = $row['account_password'];
          $_SESSION['account_fname'] = $row['account_fname'];
          $_SESSION['account_lname'] = $row['account_lname'];
          $_SESSION['account_type'] = $row['account_type'];
          header('location: home.php');
          // end ryan
        } 
        else {
            $_SESSION['message'] = "Your password or email is incorrect";
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h1>Login</h1>
  </div>
	
  <form method="post" action="login.php">
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="account_email">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  </form>
</body>
</html>