<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<div class="login">
<?php
session_start();
include "dbconnect.php";

$count_result=mysqli_query($conn,"SELECT *
                            FROM UserInfo
                            WHERE email='$_SESSION[email]'") or die(mysqli_error());
$count = mysqli_fetch_array($count_result);
if (isset($_SESSION["name"]))
{
?>
   <span>Hi (<?= $_SESSION["name"] ?>)</span>
   <a href="../php/logout.php">Logout</a>
   <!-- <p>Try count: </p> -->
<?php
}
else {
?>
    <a href="../php/register-login.php">SignIn Or Register</a>
    <?php
}
?>
</div>
<?php

?>
    <div id="my-account-zone">
      <a href="../php/MyAccount.php">My Account |</a><a href="../php/addToBag2.php">My Bag</a>
    </div>

<?php

?>
