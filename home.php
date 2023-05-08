<?php
// start/resume session
session_start();
// if not logged in, send user to login page automatically
if (!isset($_SESSION['account_type'])) {
    header("Location: login.php");
    exit();
}
// include home page
include "home.html";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="home_style.css">
</head>
<body>
    <?php  if (isset($_SESSION['account_email'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['account_email']; ?></strong></p>
    <?php endif ?>
    <!-- link to delete account -->
    <a href="delete.html">delete account?</a>
</body>
</html>