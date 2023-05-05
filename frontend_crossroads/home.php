<?php
session_start();
include "home2.html";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="../home_style.css">
</head>
<body>
<?php  if (isset($_SESSION['account_email'])) : ?>
    <p>Welcome <strong><?php echo $_SESSION['account_email']; ?></strong></p>
<?php endif ?>
<a href="delete.html">delete account?</a>
</body>
</html>