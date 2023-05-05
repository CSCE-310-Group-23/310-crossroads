<?php
	session_start();
	//Connect to DB
	$connection = mysqli_connect("localhost", "root", "", "crossroads");

	// Check if the connection was successful
	if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	}

	//Query Account details
	$query = "SELECT account_fname, account_lname, account_email FROM account";
	$result = mysqli_query($connection, $query);
	if (isset($_POST['chg_fname'])) {
	$account_fname = mysqli_real_escape_string($connection, $_POST['account_fname']);
	$query = "UPDATE account SET account_fname='$account_fname' WHERE account_email='" . $_SESSION['account_email'] . "'";
	$result = mysqli_query($connection, $query);
	}
	if (isset($_POST['chg_lname'])) {
	$account_lname = mysqli_real_escape_string($connection, $_POST['account_lname']);
	$query = "UPDATE account SET account_lname='$account_lname' WHERE account_email='" . $_SESSION['account_email'] . "'";
	$result = mysqli_query($connection, $query);
	}

	if (isset($_POST['chg_email'])) {
	$account_email = mysqli_real_escape_string($connection, $_POST['account_email']);
	$query = "UPDATE account SET account_email='$account_fname' WHERE account_email='" . $_SESSION['account_email'] . "'";
	$result = mysqli_query($connection, $query);
	}

	if (isset($_POST['chg_password'])) {
	$account_password = mysqli_real_escape_string($connection, $_POST['account_password']);
	$query = "UPDATE account SET account_password='$account_fname' WHERE account_email='" . $_SESSION['account_email'] . "'";
	$result = mysqli_query($connection, $query);
	}


	mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/x-icon? href="images/csce310-crossroads-o1-1.svg">
		<title>CR - Account</title>
		<!-- Include Navbar -->
		<?php require_once(__DIR__.'/navbar.html'); ?>
		<!-- CSS FOR STYLING THE PAGE -->
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<section>
			<!-- ? -->
			<h1>My Account</h1>

			<!-- Include Alex' Account Page -->
			<form method="post" action="accounts/register.php">
				<div class="input-group">
					<label>First Name</label>
					<input type="text" name="account_fname" value="">
					<button type="submit" class="btn" name="chg_fname">Change</button>
				</div>
				<div class="input-group">
					<label>Last Name</label>
					<input type="text" name="account_lname">
					<button type="submit" class="btn" name="chg_lname">Change</button>
				</div>
				<div class="input-group">
					<label>Email</label>
					<input type="email" name="account_email">
					<button type="submit" class="btn" name="chg_email">Change</button>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password">
					<button type="submit" class="btn" name="chg_password">Change</button>
				</div>
			</form>
		</section>
	</body>
</html>