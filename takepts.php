<?php 
session_start();
  if(!isset($_SESSION['classnum'])){
    header('Location:index.html');
  }
  $classnum = $_SESSION['classnum'];
  
include 'mysql_credentials.php';
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//get name of student
$student = $_POST['student'];
$classnum = $_SESSION['classnum'];

/*$result = mysqli_query($con,"SELECT * FROM buzz WHERE class=$classnum and name=$student");


while($row = mysqli_fetch_array($result)) {
//$id = $row['student_id'];
$current_points = $row['points'];
}
$current_points=$current_points+1;
*/
$query = "UPDATE students SET points=points-1 WHERE name='$student' and class='$classnum'";

if(mysqli_query($con,$query)){
  header('Location: game.php');
}
else{
  echo("Failed to update points: " . mysqli_error($con));
  var_dump($row);
  echo "</br>".$current_points;
  echo "</br>".$classnum;
  echo "</br>".$student;
}

mysqli_close($con);
?>
 
