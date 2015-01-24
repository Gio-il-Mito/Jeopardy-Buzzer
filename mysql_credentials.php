<?php
// replace this with your database name (Jeopardy Buzzer only)
$usedatabase="student";
//mySQL information
$mysql_location="localhost";
$mysql_user="root";
$mysql_password_edit="password";
//used in developer.php
$devcode = "355aqwdd";

//mysql connection functions below


//used pretty much everywhere
$con=mysqli_connect($mysql_location,$mysql_user,$mysql_password_edit,$usedatabase);
//used in login_create.php
$firsttime=mysqli_connect($mysql_location,$mysql_user,$mysql_password_edit);
//used in assassinlogin.php
$logincon=mysql_connect($mysql_location,$mysql_user,$mysql_password_edit);


?> 
