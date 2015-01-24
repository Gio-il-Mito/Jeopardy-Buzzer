<?php
session_start();
if(!isset($_SESSION['devlogin'])){
header('Location: index.html');
}
?>
<HTML>
 <head>
  <title> Buzzer - Admin Page </title>
  <!--<meta http-equiv="refresh" content="1">-->
 </head>
 <body>
  <a href="Log_out.php" id="logout">Log Out</a></br>
  <form action="buzzquery.php" method="post">
    Execute mySQL Query: <input type="text" name="query">
    <input type="submit" name="sbutton">
  </form>
 </body>
</HTML>  
<?php
  include 'mysql_credentials.php';
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 
}



$result = mysqli_query($con,"SELECT * FROM buzz");
echo "Buzz table:";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Class</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['student_id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['class'] . "</td>";
  echo "</tr>";
}

echo "</table>";

$result = mysqli_query($con,"SELECT * FROM students");
echo "Students table:";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Class</th>
<th>Points</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['student_id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['class'] . "</td>";
  echo "<td>" . $row['points'] . "</td>";
  echo "</tr>";
}

echo "</table>";


mysqli_close($con);
?> 
