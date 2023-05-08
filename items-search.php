<!-- 
	@author Ryan Kafka
	Before integration, used this to access the items search page with the navbar included.
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/x-icon? href="images/csce310-crossroads-o1-1.svg">
		<title>CR - Items</title>
		<!-- CSS FOR STYLING THE PAGE -->
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!-- Include Navbar -->
		<?php require_once(__DIR__.'../navbar.html'); ?>
		<!-- Include Item Search Page -->
		<?php require_once(__DIR__.'/customer_acc/item_list_search/item_search.html'); ?>
	</body>
</html>