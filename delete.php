<?php
include "home.html";
session_start();
//Connect to DB
$connection = mysqli_connect("localhost", "root", "", "CS_310_final_project");

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = $_POST['id'];
$sql = "DELETE FROM account WHERE account_id = $id;";
mysqli_query($connection, $sql);



    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="home_style.css">
</head>
<body>

    <p>sorry to see you go, your account has been deleted.</p>

<a href="home.php">go home</a>
</body>
</html>