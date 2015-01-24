<?php
session_start();

$classnum = rand(1,999999);

if(isset($_SESSION['classnum'])){
   $classnum = $_SESSION['classnum'];}
   
echo "<font size=36>Class Code: " . $classnum . "</font></br>";
//echo "<font size=24>Go to web.shschools.org/buzzer</font>";

include 'mysql_credentials.php';

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$_SESSION['classnum'] = $classnum;


?>
<HTML>
 <head>
  <title> Create Game - Teacher </title>
  <meta http-equiv="refresh" content="1">
 </head>
 <body>
  </br><a href="game.php" id="reorder">Start Game</a></br>
  <a href="destroy.php" id="end">End Game</a></br>
 </body>
</HTML> 

<?php

$result = mysqli_query($con,"SELECT * FROM students WHERE class=$classnum");

echo "<table border='1'>
<tr>
<th>Students</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "</tr>";
}

echo "</table>";
echo "DEBUG: </br>";
var_dump($_SESSION);
?>