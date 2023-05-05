<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','CS_310_final_project');

// get the post records

$txtItem = $_POST['txtItem'];
$txtItemTitle = $_POST['txtItemTitle'];
$txtItemDesc = $_POST['txtItemDesc'];
$txtItemPrice= $_POST['txtItemPrice'];

// database insert SQL code
$sql = "UPDATE item_3 SET item_title = '$txtItemTitle', item_price = '$txtItemPrice', item_desc = '$txtItemDesc' WHERE item_id = '$txtItem'";

echo $txtItem;
$rs = mysqli_query($con,$sql);

$result = mysqli_query($con,"SELECT * FROM item_3 WHERE item_id = '$txtItem'");
$bg_color = '#ff0000';
echo "<table border='1'>
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