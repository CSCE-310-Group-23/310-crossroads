<!-- PHP code to query account data -->
<?php 
    include 'connect.php';
    // Query Account Data from Database
    $sql = " SELECT * FROM account ORDER BY account_id DESC ";
    $result = $mysqli->query($sql);
    $mysqli->close(); 
?>
<?php
	function scheduleDelivery() {

	}

	class TableRows extends RecursiveIteratorIterator { 
		function __construct($it) { 
			parent::__construct($it, self::LEAVES_ONLY); 
		}
		function current() {
			return "<td style='width:150px;border:2px solid green;'>" 
					. parent::current() 
					. "</td>";
		}
		function beginChildren() { 
			echo "<tr>"; 
		} 
		function endChildren() { 
			echo '<td><input type="button" onclick="scheduleDelivery()" value="Schedule"/></td>';
			echo "</tr>" . "\n";
		} 
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/x-icon? href="images/csce310-crossroads-o1-1.svg">
		<title>CR - Scheduling</title>
		<!-- CSS FOR STYLING THE PAGE -->
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!-- Include Navbar -->
		<?php require_once(__DIR__.'/navbar.html'); ?>
		<section>
			<!--<?php
				try {
					$username = 'root';
					$password = '';
					$database = 'crossroads';
					$servername='localhost';
					$conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM orders"); 
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key=>$value) { 
						echo $value;
					}
				}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
				echo "</table>";
				echo "<br><br>";
			?>-->
		</section>
		<section>
			<h1>Scheduling</h1>
			<section>
				
			<section>
			<br>
			<footer>
				<p>Author: Ryan Kafka [<a href="mailto:rkafka@tamu.edu">rkafka@tamu.edu</a>]</p>
			</footer>
		</section>
	</body>
</html>