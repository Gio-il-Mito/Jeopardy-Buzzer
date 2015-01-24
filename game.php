<?php
  session_start();
  if(!isset($_SESSION['classnum'])){
    header('Location:index.html');
  }
  $classnum = $_SESSION['classnum'];
  include 'mysql_credentials.php';
  echo "Game Number: " . $classnum;
  
?>

<HTML>
 <head>
<meta http-equiv="refresh" content="1">
<title> Game </title>
<style>
.hidden{
  visibility:hidden;
  width:1px;
}
</style>
 </head>
 <body>
   
  </br><a href="destroy.php" id="return">End Game</a></br>
  <a href="reset.php" id="reset">Reset</a></br>
  </body>
</HTML>
<?php

  include 'mysql_credentials.php';
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 
}


$result = mysqli_query($con,"SELECT * FROM buzz WHERE class=$classnum");

echo "<table border='1'>
<tr>
<th>Students</th>
<th>Give Points</th>
</tr>";
unset($student);
$studnum=0;
while($row = mysqli_fetch_array($result)) {
  $student[$studnum]=$row['name'];
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo '<td><form action="givepts.php" method="post">
  <input type="text" name="student" value="' . $row['name'] . '"class="hidden" >
  <input type="submit" value="+1 Point"></form>
  <form action="takepts.php" method="post">
  <input type="text" name="student" value="' . $row['name'] . '"class="hidden" >
  <input type="submit" value="-1 Point"></form></td>';
  echo "</tr>";
  $studnum++;
}

echo "</table>";


$result = mysqli_query($con,"SELECT * FROM students WHERE class=$classnum ORDER BY points DESC");

echo "<table border='1'>
<tr>
<th>Leaderboard</th>
<th>Points</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['points'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
