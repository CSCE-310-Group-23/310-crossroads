<!DOCTYPE html>
<html>
<head>
    <title>Catherine</title>
    <link rel="stylesheet" href="../../home_style.css">
</head>
<body>
<nav class="nav-bar">
    <a href="http://localhost/310-crossroads-main/home.php">Go Home</a>
    <a href="http://localhost/310-crossroads-main/admin_acc/home_page/home_page_main.php">Go To Admin Page</a>
    <a href="http://localhost/310-crossroads-main/customer_acc/cust_home_page/cust_home_page.php">Go To Customers' Selection</a>
    <a href="">Manage Account</a>
</nav>
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cs_310_final_project');

// get the post records

$txtItemTitle = $_POST['txtItemTitle'];
$txtItemDesc = $_POST['txtItemDesc'];
$txtItemPrice= $_POST['txtItemPrice'];
$txtID = $_POST['txtID'];

$max_id_query = mysqli_query($con, "SELECT max(item_id) FROM item");
$max_id = mysqli_fetch_array($max_id_query)[0];
$max_id++;

$sql = "INSERT INTO item (item_id, item_title, item_price, item_desc, account_id) VALUES ($max_id, '$txtItemTitle', $txtItemPrice, '$txtItemDesc', $txtID)";
mysqli_query($con, $sql);

echo "<form action='item_list.html' method='post'>";
echo "<input type='hidden' name='edit_review_id' value='$txtID'>";
echo "<input type='submit' value='Return'>";
echo "</form>";

echo "<table border='1' style='font-size: 24px'>
    <tr>
        <th>item_id</th>
		<th>item_title</th>
		<th>item_price</th>
		<th>item_desc</th>
		<th>account_id</th>
    </tr>";

$result = mysqli_query($con,"SELECT * FROM item WHERE account_id = '$txtID'");

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['item_id'] . "</td>";
	echo "<td>" . $row['item_title'] . "</td>";
	echo "<td>" . $row['item_price'] . "</td>";
	echo "<td>" . $row['item_desc'] . "</td>";
	echo "<td>" . $row['account_id'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
