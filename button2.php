<?php
session_start();
include 'mysql_credentials.php';
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// define session variables
$nick = $_SESSION['nickname'];
$classnum = $_SESSION['student_classnum'];

//create table buzz(student_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, class INT NOT NULL, PRIMARY KEY(student_id));

$sql="INSERT INTO buzz (class, name)
VALUES ('$classnum', '$nick')";

if (!mysqli_query($con,$sql)) {
  echo('Error: ' . mysqli_error($con));
  header('Location: button.php');
}



header('Location: button.php');
echo "BUZZ!";

mysqli_close($con);
?>  
