<?php
session_start();
if(!isset($_SESSION['nickname'])){
   header("Location:index.html");
}
$classnum = $_SESSION['student_classnum'];
include 'mysql_credentials.php';
$nick = $_SESSION['nickname'];

echo '<div id="div1">
            <a href="Log_out.php" id="logout">Exit</a></br>';
echo "Welcome, $nick. You are in class $classnum.</br></br></br></br></div>";
?>
<html>
<head>
<style>
  div2{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
  }
</style>
<!--<meta http-equiv="refresh" content="1">-->
</head>
    <body>
        
	<div id="div2">
	    <a href="button2.php"> <img src="buzzer.png" alt="Buzzer" style="width:260px;height:229px;border:0"></a> 
        </div>
    </body>
</html>
<?php
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
/*$currentquestion = mysqli_query($con,"SELECT * FROM questions WHERE class=$classnum");
echo "<table border = '1'>
<tr>
<th>Question</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['question'] . "</td>";
  echo "</tr>";
}
echo "</table>";*/
?> 
