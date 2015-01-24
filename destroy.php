<?php
  session_start();
  $classnum = $_SESSION['classnum'];
  $sqldestroy="DELETE FROM buzz WHERE class=$classnum";
  $sqldestroy2="DELETE FROM students WHERE class=$classnum";
   include 'mysql_credentials.php';
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 
}
if(mysqli_query($con,$sqldestroy)){
  if(mysqli_query($con,$sqldestroy2)){
    session_destroy();
    header('Location: index.html');
  }
  else{
    die("Error: failed to delete students" . mysqli_error($con));
  }
}
else{
  die("Error: failed to delete buzz" . mysqli_error($con));
}
?>
<HTML>
 <head>
  <title> End Class </title>
 </head>
 <body>
   
 <a href="index.html" id="return">Return to Home</a></br>

 </body>
</HTML>

