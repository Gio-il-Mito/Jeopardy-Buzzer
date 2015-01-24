<?php
include 'mysql_credentials.php';

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$classnum = $_POST['class_num'];
$nick = $_POST['name'];



//create table students(student_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(255) NOT NULL,class INT NOT NULL, points INT NOT NULL DEFAULT 0, PRIMARY KEY(student_id));

$sql="INSERT INTO students (name, class)
VALUES ('$nick', '$classnum')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
session_start();
$_SESSION['nickname'] = $nick;
$_SESSION['student_classnum'] = $classnum;
echo "Joined!";
header('Location: button.php');


mysqli_close($con);
?>   
