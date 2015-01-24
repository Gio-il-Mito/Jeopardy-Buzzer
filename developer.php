<?php
  session_start();
  ?>
<HTML>
 <head>
  <title>Developer Login Page </title>
 </head>
 <body>
  Sign In</br></br> 
  <form name="login" id="login" method="post" action="developer.php">
   <table>
   <tr><td>Developer Code</td><td>:-</td><td><input type="password" name="pwd"></td></tr>
   <tr><td><input type="submit" name="sbutton" value="LOGIN"></td></tr>
   </table>
  </form>
 </body>
</HTML>
<?php
include 'mysql_credentials.php';

if($_POST["sbutton"] !=NULL){

  if(strcmp($_POST['pwd'], $devcode)==0){
    $_SESSION['devlogin'] = "true";
    header('Location: buzzadmin.php');
  }
  else{
    echo "Password incorrect!</br>";
  }
}
?> 
