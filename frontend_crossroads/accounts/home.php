<?php
  session_start();
  include "navbar.html";
  
  ?>
  <!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php  if (isset($_SESSION['account_email'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['account_email']; ?></strong></p>
    <?php endif ?>
</body>
</html>