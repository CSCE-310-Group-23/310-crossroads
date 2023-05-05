
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','crossroads');

// get the post records

$txtItem = $_POST['txtItem'];
$txtOrder = $_POST['txtOrder'];
$txtItemPrice = mysqli_query($con,"select item_price from item where item_id='$txtItem'");
$txtItemQuantity = $_POST['txtItemQuantity'];
$txtlistprice = (int)$txtItemPrice * (int)$txtItemQuantity;
//$txtItemPrice= $_POST['txtItemPrice'];

// database insert SQL code

$sql = "INSERT INTO item_list (order_id, item_id, item_quantity, list_price) VALUES ('$txtOrder', '$txtItem', '$txtItemQuantity','$txtlistprice')";
$rs = mysqli_query($con,$sql);

$result = mysqli_query($con,"SELECT * FROM item_list");
$bg_color = '#ff0000';

echo "<form action='item_desc.html' method='post'>";
echo "<input type='hidden' name='edit_review_id' value='$txtItem'>";
echo "<input type='submit' value='Return'>";
echo "</form>";


echo "<table border='1' style='font-size: 24px'>
<tr>
<th>order_id</th>
<th>item_id</th>
<th>item_quantity</th>
<th>list_price</th>
</tr>";
echo "This is the result of the information you added:";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['order_id'] . "</td>";
echo "<td>" . $row['item_id'] . "</td>";
echo "<td>" . $row['item_quantity'] . "</td>";
echo "<td>" . $row['list_price'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>


