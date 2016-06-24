<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php

include "dbconnect.php";
if (isset($_POST['email']) && isset($_POST['password'])){
   $username = $_POST['email'];
	 $password = $_POST['password'];
   $sql = "SELECT * FROM UserInfo WHERE email='$username' and password='$password'";
   $result = mysqli_query($conn, $sql) or die(mysqli_error());
   $count = mysqli_num_rows($result);
   if ($count == 1){
	    $name= mysqli_fetch_assoc($result);
      //When login successful,start the Session
      session_start();
      $_SESSION["name"] = $name["FirstName"];
      $_SESSION["email"] = $username;
      $_SESSION['try']=0;
      //echo("Checkpoint..2 var_dump($name[\"FirstName\"])");
      //print("Checkpoint..2 {$_SESSION['name']}");
      header("Location: ./index.php");
	 }
   else {
      header("Location: ./register-login.php?error=1");
	 }
}
mysqli_close($conn);
?>
