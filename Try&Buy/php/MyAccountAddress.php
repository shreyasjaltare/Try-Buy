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
//session_start();
   $username = $_SESSION["name"];
   if ($username){
   $sql = "SELECT FirstName, LastName, Street, City, State, Zip FROM UserInfo WHERE FirstName='$username'";
   $result = mysqli_query($conn, $sql) or die(mysqli_error());
}

?>

<div class="my-account-body-section">
  <div class="addNewAddress">
          <form action="AddAddress.php" method="post" >
          <p class="editAddress">  Edit Address Info</p>
              <span class="warning-message">   * All fields are required </span>
                 <?php
                 if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                  ?>
              <div class="editForm">
                FirstName:
                <input id="first" class="text-area" type="text" name="firstName" value="<?= $row['FirstName'] ?>"></br>
                LastName:
                <input id="second" class="text-area" type="text" name="lastName" value="<?= $row['LastName'] ?> "></br>
                Street:
                <input id="street" class="text-area" type="text" name="Street" value="<?= $row['Street'] ?>"></br>
                City:
                <input id="city" class="text-area" type="text" name="City" value="<?= $row['City'] ?>"></br>
                State:
                <input id="state" class="text-area" type="text" name="State" value="<?= $row['State'] ?>"></br>
                Zip Code:
                <input id="zip" class="text-area" type="text" name="Zip" value="<?= $row['Zip'] ?>">
              </div>
<?php
              }
          }
               ?>
                <input class="edit-address-button" type="submit" value="Edit Address">
<br>
        </form>
  </div>
</div>

<?php
include("../html/index-footer.html");
mysqli_close($conn);

?>

  </body>
</html>
