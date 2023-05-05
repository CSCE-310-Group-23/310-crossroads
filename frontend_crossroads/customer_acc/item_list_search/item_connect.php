<?php
$con=mysqli_connect('localhost', 'root', '','crossroads');
// Include Navbar
require_once('../../navbar.html');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$txtOrder = $_POST['txtOrder'];
$result = mysqli_query($con,"SELECT * FROM item_list WHERE order_id=$txtOrder");
$bg_color = '#ff0000';
echo "<table border='1'>
	<tr>
	<th>item_id</th>
	<th>item_price</th>
	<th>item_quantity</th>
	<th>list_price</th>
	</tr>";

while($row = mysqli_fetch_array($result))
{
	/*added by ryan
	$itemprice = mysqli_query($con,"SELECT item_price FROM item_list WHERE item_id=$row['item_id']");
	if($itemprice) {
		// RECOMMEND USING A JOIN TO ACCOMPLISH THIS
	/* end of ryan */
		echo "<tr>";
		// where is order_id?? - rjk
		echo "<td>" . $row['item_id'] . "</td>";
		echo "<td>" . /*$itemprice*/$row['list_price'] . "</td>";	// tweaked by ryan
		echo "<td>" . $row['item_quantity'] . "</td>";
		echo "<td>" . $row['list_price'] . "</td>";
		echo "</tr>";
	//}
}
echo "</table>";

mysqli_close($con);
?>
