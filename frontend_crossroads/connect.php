<!-- PHP code to establish connection with the localserver -->
<?php
  $user = 'root';
  $password = '';
  $database = 'crossroads';
  $servername='localhost:3306';
  $mysqli = new mysqli($servername, $user, $password, $database);
  
  // Check connection
  if ($mysqli->connect_error) {
      die('Connect Error (' .
      $mysqli->connect_errno . ') '.
      $mysqli->connect_error);
  }
?>