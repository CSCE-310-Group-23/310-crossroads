<!-- PHP code to query account data -->
<?php 
	// connect
	$conn = mysqli_connect('localhost', 'root', '', 'CS_310_final_project');

	// handle session
	session_start();
	$_SESSION['is_admin'] = ($_SESSION['account_type']==0);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/x-icon? href="images/csce310-crossroads-o1-1.svg">
		<title>CR - Orders</title>
		<!-- CSS FOR STYLING THE PAGE -->
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!-- Include Navbar -->
		<?php include __DIR__.'../../navbar.html'; ?>
		
		<!-- Add Order -->
		<section>
			<h1>Add Orders</h1>
			<form action="http://localhost/crossroads/orders/functions/add_order.php" method="POST">
				<!-- Only show for admin, regular user's can only affect their own related orders -->
				<label for="buyerID" <?php if(!$_SESSION['is_admin']) {echo " style='display: none'";}?>>Buyer's Account ID:</label>
				<input type="number" name="buyerID" <?php if(!$_SESSION['is_admin']) {echo " style='display: none'";}?>>
				<!-- -->
				<label for="deliveryDate">Delivery Date:</label>
				<input type="date" name="deliveryDate" value="2023-05-30" min="2018-05-05">
				<label for="addressID">Address ID:</label>
				<input type="number" name="addressID">
				<button type="submit">Add</button>
			  </form>
		</section>

		<!-- -->
		<section>
			<table>
				<tbody>
					<?php include __DIR__.'/functions/access_orders.php'; ?>
				</tbody>
			</table>
		</section>

		<section>
			
			<footer>
				<p>Contributed by Ryan Kafka [<a href="mailto:rkafka@tamu.edu">rkafka@tamu.edu</a>]</p>
			</footer>
		</section>
	</body>
</html>