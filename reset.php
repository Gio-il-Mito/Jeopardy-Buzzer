<?php 
session_start();
include 'mysql_credentials.php';
$classnum = $_SESSION['classnum'];
$tabledestroy = "DELETE from buzz WHERE class = $classnum";
if (mysqli_query($con,$tabledestroy)) {
  header('Location: game.php');
}
else {
  echo "<br>Error deleting from class table (ASK ANDREW): " . mysqli_error($con);
}
?>