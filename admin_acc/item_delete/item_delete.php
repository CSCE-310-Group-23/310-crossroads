<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','CS_310_final_project');

// get the post records

$txtItem = $_POST['txtItem'];

// database insert SQL code
$sql = "DELETE FROM item WHERE item_id=$txtItem";
// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Item Deleted Succesfully!";
} else {
	echo "Error";
}

mysqli_close($con);

?>
