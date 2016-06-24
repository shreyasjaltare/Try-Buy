<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php
include("../html/header.html");
include("../php/login-account-cart.php");
include("../html/nav.html");
include("../html/MyAccountMenu.html");
?>

<?php
include "dbconnect.php";
session_start();
if (isset($_POST['oldPassword']) && isset($_POST['NewPassword'])){
	 $password = $_POST['oldPassword'];
   $newPassword= $_POST['NewPassword'];
   $username = $_SESSION["name"];
   $sql = "UPDATE UserInfo SET password='$newPassword' WHERE FirstName='$username' and password='$password'";
   $result = mysqli_query($conn, $sql) or die(mysqli_error());
   if ($result ==1){
	    header("Location: ../php/index.php");
		  session_unset();
		  session_destroy();
       ?>
			<div class="my-account-body-section">
			<p>You have changed your password. Please refresh the page and login again.</p>
		 </div>
			<?php
			include("../html/pages-footer.html");?>
			</body>
		  </html>
			<?php
			exit;
	 }
   else {
		  header("Location: ../php/MyAccount.php");
		//  header("Location: ./register-login.php?uperror=1");
      // echo("Kindly give coorect old pssword");
	 }
}
mysqli_close($conn);
?>

<div class="my-account-body-section">
  <form method="post" name="changePassword-form" onsubmit="return validateChangePassword()">
  <div id="changePassword">
    <span class="error" id= "changePass-Error"></span><br>
    <div class="changePassHeading"> Change Password</div>
      <dt class="PasswordPage"> Old Password</dt>
        <dd><input class="text-box" type="text" name="oldPassword"></dt>
      <dt class="PasswordPage"> New Password </dt>
        <dd><input class="text-box" type="text" name="NewPassword"></dt>
      <dt class="PasswordPage"> Confirm Password </dt>
        <dd><input class="text-box" type="text" name="ConfirmPassword"></dt><br><br><br>
      <input class="update-button" type="submit" value="Update Password">
  </div>
</form>
</div>
<?php
include("../html/pages-footer.html");
?>

  </body>
</html>
