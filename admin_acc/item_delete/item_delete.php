<!DOCTYPE html>
<html>
<head>
    <title>Catherine</title>
    <link rel="stylesheet" href="../../home_style.css">
</head>
<body>
<nav class="nav-bar">
    <a href="http://localhost/CSCE310/310-crossroads/home.html">Go Home</a>
    <a href="http://localhost/CSCE310/310-crossroads/admin_acc/home_page/home_page_main.php">Go To Admin Page</a>
    <a href="http://localhost/CSCE310/310-crossroads/customer_acc/cust_home_page/cust_home_page.php">Go To Customers' Selection</a>
    <a href="">Manage Account</a>
</nav>
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','crossroads');

// get the post records

$txtItem = $_POST['txtItem'];

// database insert SQL code
$sql = "DELETE FROM item WHERE item_id=$txtItem";
// insert in database 
$rs = mysqli_query($con, $sql);

echo "<form action='item_delete.html' method='post'>";
echo "<input type='hidden' name='edit_review_id' value='$txtItem'>";
echo "<input type='submit' value='Return'>";
echo "</form>";


if($rs)
{
	echo "Item Deleted Succesfully!";
} else {
	echo "Error";
}

mysqli_close($con);

?>
