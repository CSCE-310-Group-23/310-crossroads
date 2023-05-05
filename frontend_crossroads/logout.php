<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Come Back Soon!</title>
		<!-- CSS FOR STYLING THE PAGE -->
		<!-- <link rel="stylesheet" href="style.css"> -->
	</head>
	<body>
		<?php
			if ($_SESSION['account_type'] == 0)
				echo "Always sad to see an admin go...<br>";
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy();
		?>
		
		<p style="font-family:Verdana;">You have logged out!</p>

		<section>
			<input style="font-family:Verdana;" type=button 
				   onClick="location.href='login.php'" 
				   value='Return to Log-In'
			>
		</section>
	</body>
</html>