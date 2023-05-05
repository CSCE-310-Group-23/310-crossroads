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
$sql = "UPDATE item_3 SET item_title=$txtItemTitle, item_price=$txtItemPrice, item_desc=$txtItemDesc WHERE item_id=$txtItem";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Item's Information Updated!";
} else {
	echo "Error";
}

$conn->close();

?>
