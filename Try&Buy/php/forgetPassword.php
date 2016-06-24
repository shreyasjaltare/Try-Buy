<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php
session_start();
echo "trying to connect";
include "dbconnect.php"; //connects to the database
if (isset($_POST['email'])){
	$username = $_POST['username'];
	$query="SELECT * from UserInfo where email='$username'";
	$result = mysqli_query($conn, $query);
	$count= mysqli_num_rows($result);
	function redirect($url, $flash_message = NULL){
	  if (flash_message){
	    $_SESSION["flash"] =$flash_message;
	  }
	  header ("location: $url");
	  die;
	}
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		$rows= mysqli_fetch_assoc($result);
		$pass  =  $rows['password'];//FETCHING PASS
		$email = $rows['email'];
		$_SESSION["username"]= $email;
		$_SESSION["paswo"]= $pass;
			redirect("./register-login.php", "*");
		}

	else {
			if ($_POST ['email'] != "") {
			redirect("./register-login.php", "Please Enter Email Address to retrieve ForgotPassword ");
			}
	}

}
