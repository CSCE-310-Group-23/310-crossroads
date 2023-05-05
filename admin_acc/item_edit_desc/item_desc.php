<!DOCTYPE html>
<html>
<head>
    <title>Catherine</title>
    <link rel="stylesheet" href="../../home_style.css">
</head>
<body>
<nav class="nav-bar">
    <a href="http://localhost/CSCE310/310-crossroads/customer_acc/cust_home_page/cust_home_page.php">Go Home</a>
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
$txtItemTitle = $_POST['txtItemTitle'];
$txtItemDesc = $_POST['txtItemDesc'];
//$txtItemPrice= $_POST['txtItemPrice'];

// database insert SQL code
$sql = "UPDATE item SET item_title = '$txtItemTitle', item_desc = '$txtItemDesc' WHERE item_id = '$txtItem'";

echo $txtItem;
$rs = mysqli_query($con,$sql);

$result = mysqli_query($con,"SELECT * FROM item WHERE item_id = '$txtItem'");
$bg_color = '#ff0000';

echo "<form action='item_desc.html' method='post'>";
echo "<input type='hidden' name='edit_review_id' value='$txtItem'>";
echo "<input type='submit' value='Return'>";
echo "</form>";


echo "<table border='1' style='font-size: 24px'>
<tr>
<th>item_id</th>
<th>item_title</th>
<th>item_price</th>
<th>item_desc</th>
<th>account_ID</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['item_id'] . "</td>";
echo "<td>" . $row['item_title'] . "</td>";
echo "<td>" . $row['item_price'] . "</td>";
echo "<td>" . $row['item_desc'] . "</td>";
echo "<td>" . $row['account_ID'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>


