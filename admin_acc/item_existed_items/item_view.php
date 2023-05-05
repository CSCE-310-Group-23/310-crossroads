<?php
$con=mysqli_connect('localhost', 'root', '','CS_310_final_project');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$txtaccount = $_POST['txtaccount'];
$result = mysqli_query($con,"SELECT * FROM item WHERE account_ID = $txtaccount");
$bg_color = '#ff0000';


echo "<form action='item_view.html' method='post'>";
echo "<input type='hidden' value='$txtaccount'>";
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
