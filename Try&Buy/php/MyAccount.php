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
include "dbconnect.php";
session_start();
$username = $_SESSION["name"];

if ($username){

$sql = "SELECT FirstName, LastName, Street, City, State, Zip FROM UserInfo WHERE FirstName='$username'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
}
?>

<div id="myAccount-right-section">
    <div class="profile-heading">My Profile </div>
    <div class="profile-div">
    <?php
    if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
     ?>
 <div class="profile-form">
   FirstName: <span class="res"><?= $row['FirstName'] ?></span></br>
   LastName: <span class="res"><?= $row['LastName'] ?></span></br>
   Street: <span class="res"><?= $row['Street'] ?></span></br>
   City: <span class="res"><?= $row['City'] ?></span></br>
   State: <span class="res"><?= $row['State'] ?></span></br>
   Zip Code: <span class="res"><?= $row['Zip'] ?></span>
 </div>
 <span class="myorder-text-link"><a href="../php/MyAccountAddress.php" > Edit Address</a></span>
 <span class="myorder-change-link"><a href="../php/changePassword.php" > Change Password </a></span>
 <span class="myorder-order-link"><a href="../php/MyOrders.php" > View Previous Purchases </a></span>

 </div>
<?php
 }
}
  ?>
<br>
</div>

<?php
include("../html/index-footer.html");
 ?>
</body>
</html>
