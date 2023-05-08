<!-- 
	PHP code to query account data 
	@AUTHOR Ryan Kafka
	acts as main page for viewing order-scheduling information from, utilizing
	the code in the  '/functions/' folder in this current directory to interact
	with and modify the database.
-->
<?php 
	// connect
	$conn = mysqli_connect('localhost', 'root', '', 'CS_310_final_project');

	// handle session
	session_start();
if(isset($_SESSION['account_type'])) {
	$_SESSION['is_admin'] = ($_SESSION['account_type'] == 0);
} else {
	$_SESSION['is_admin'] = false;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- favicon (does not work in XAMPP) -->
		<link rel="icon" type="image/x-icon? href="images/csce310-crossroads-o1-1.svg">
		<!-- page title to be see on Tab for this page -->
		<title>CR - Orders</title>
		<!-- CSS FOR STYLING THE PAGE -->
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!-- Include Navbar -->
		<?php include __DIR__.'../../navbar.html'; ?>
		<!-- Add Order -->
		<section>
		<fieldset>
			<h1>Add Orders</h1>
			<form action="http://localhost/310-crossroads-main/orders/functions/add_order.php" method="POST">
				<div>
				<!-- Only show for admin, regular user's can only affect their own related orders -->
				<label for="buyerID"<?php if (!$_SESSION['is_admin']) echo " style='display:none;'"; ?>>Buyer's Account ID:</label>
					<?php
					if ($_SESSION['is_admin']) {
						echo '<select name="buyerID">';
						$query = "SELECT account_id,account_email FROM account";
						$result3 = mysqli_query($conn, $query);
						while ($row3 = mysqli_fetch_assoc($result3)) {
							echo '<option value="' . $row3['account_id'] . '"';
							if ($row3['account_id'] == $_SESSION['account_id']) {
							echo ' selected';
							}
							echo '>' . $row3['account_id'] . ' - ' . $row3['account_email'] . '</option>';
						}
						echo '</select>';
					} else {
						echo '<input type="number" name="buyerID" style="display:none;">';
					}
					?>
				</div>
				<!-- Allow input for Delivery Date, through selecting a day off a calendar -->
				<div>
					<label for="deliveryDate">Delivery Date:</label>
					<input type="date" name="deliveryDate" value="2023-05-30" min="2018-05-05">
				</div>
				<!-- Allow selection of an address from dropdown of all options in database -->
				<!-- Limited to only the user's associated addresses IF user is not admin -->
				<div>
					<label for="addressID">Address ID:</label>
					<?php
					echo '<select name="addressID">';
					$query = "SELECT address.address_id as address_id,address_label.address_title as address_title, address_label.account_id AS account_id FROM address LEFT JOIN address_label on address.address_id = address_label.address_id ";
					if (!$_SESSION['is_admin']) {
						// non-admin's only see their own associated addresses
						$query = $query . ' WHERE account_id=' . $_SESSION['account_id']. ';';
					} else {
						$query = $query . ';';
					}
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<option value="' . $row['address_id'] . '">'. $row['address_id'] . ' - ' . $row['address_title'] . ' - '. $row['account_id'] . '</option>';
					}
					echo '</select>';
					?>
					<br>
					<button type="submit">Add</button>
				</div>
			</form>
		</fieldset>
		</section>

		<!-- -->
		<section>
			<!-- Create table of Order information -->
			<table>
				<tbody>
					<?php include __DIR__.'/functions/access_orders.php'; ?>
				</tbody>
			</table>
			<!-- Denote Ryan Kafka as creator of this portion of functionality -->
			<footer>
				<p>Contributed by Ryan Kafka [<a href="mailto:rkafka@tamu.edu">rkafka@tamu.edu</a>]</p>
			</footer>
		</section>
	</body>
</html>