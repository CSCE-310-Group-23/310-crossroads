<!-- PHP code to query account data -->
<?php 
session_start();

//Connect to DB
$connection = mysqli_connect("localhost", "root", "", "crossroads");
// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 
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
		<!-- Include Navbar -->
		<?php require_once(__DIR__.'/navbar.html'); ?>
    </head>
    <body>    
        <h1>Home</h1>

        <section>
            <?php echo $_SESSION['success'] ?>
            <p>
                Welcome 
                <?php echo $_SESSION['account_fname'] ?> 
                <?php echo $_SESSION['account_lname'] ?>
                !
            </p>
        </section>
    </body>
</html>