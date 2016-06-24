<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php
include("../html/header.html");
include ("dbconnect.php");
include("../php/login-account-cart.php");
include("../html/nav.html");
session_start();
?>



<div class="search-section">
    <h1 class="checkout">Checkout</h1>

<div class="form_division">

  <?php
  /* Variables are created to store values of the fields entered
  */
 if(empty($_SESSION["email"])){
   echo "<p>Please Login before checkout.</p>";
   echo "<a href='register-login.php'><button class='mybag'>Login</button><a></div>
   </div>";
   include("../html/pages-footer.html");
   echo "   </body></html>";
   exit();
 }


$first_name = $last_name = $street_address=$phone_number = $city= $state= $pincode= $country= $name_card= $card_number= $cvv= "";



  /* Variables are created to store values of errors
  */
$first_nameError = $last_nameError = $phone_numberError = $cityError = $stateError= $pincodeError= $countryError= $name_cardError= $card_numberError= $cvvError=  "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["first_name"])) {              /* Checks if first name is empty*/
     $first_nameError = "First name is required";
   } else {
     $first_name = test_input($_POST["first_name"]); /* First name is passed to the test_input function*/
     /* checks to see if  first name only contains letters and whitespace */
     if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
       $first_nameError = "Only letters and white space allowed";
     }
   }
   if (empty($_POST["street_address"])) {              /* Checks if first name is empty*/
     $addressError = "Address is required";
   }
   else{
     $street_address=$_POST["street_address"];
   }
   if (empty($_POST["city"])) {              /* Checks if first name is empty*/
     $cityError = "City is required";
   }
   else{
     $city=$_POST["city"];
   }
   if (empty($_POST["state"])) {              /* Checks if first name is empty*/
     $stateError = "State  is required";
   }
   else{
     $state=$_POST["state"];
   }
   if (empty($_POST["pincode"])) {              /* Checks if first name is empty*/
     $pincodeError = "Pincode is required";
   }
   else{
     $pincode=$_POST["pincode"];
   }
   if (empty($_POST["country"])) {              /* Checks if first name is empty*/
     $countryError = "Country is required";
   }
   else{
     $country=$_POST["country"];
   }
   if (empty($_POST["name_card"])) {              /* Checks if first name is empty*/
     $name_cardError = "Name on card is required";
   }
   else {
    $name_card = test_input($_POST["name_card"]); /* First name is passed to the test_input function*/
    /* checks to see if  first name only contains letters and whitespace */
    if (!preg_match("/^[a-zA-Z ]*$/",$name_card)) {
      $name_cardError = "Only letters and white space allowed";
    }
  }
  //  if (strlen($POST["card_number"]) !='16') {              /* Checks if card number has 16 digits*/
  //    $card_numberError = "Card Number must be 16 digits";
  //  }
   if (empty($_POST["card_number"])) {              /* Checks if first name is empty*/
     $card_numberError = "Card Number is required";
   }
   else {
     $card_number=test_input($_POST["card_number"]);
     /* checks if phone number contains only numeric data*/
     if (!is_numeric($card_number)){
       $card_numberError = "Only numeric values are allowed";
     }
   }
   if (empty($_POST["cvv"])) {              /* Checks if first name is empty*/
     $cvvError = "CVV number is required";
   }
   if (empty($_POST["last_name"])) {          /* Checks if last name is empty*/
     $last_nameError = "Last name is required";
   } else {
     $last_name = test_input($_POST["last_name"]);     /* Last name is passed to the test_input function*/
     /* check to see if last name only contains letters and whitespace*/
     if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
       $last_nameError = "Only letters and white space allowed";
     }
   }

  if (empty($_POST["phone_number"])) {
     $phone_numberError= " Phone number is required";
   } else {
     $phone_number = test_input($_POST["phone_number"]);
     /* checks if phone number contains only numeric data*/
     if (!is_numeric($phone_number)){
       $phone_numberError = "Only numeric values are allowed";
     }
   }

   if (empty($_POST["email"])) {
     $emailError = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     /* checks to see if email is in a valid format*/
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailError = "Invalid email format";
     }
   }



   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }


//Checkout successfully
   if($name_cardError== ""&&
      $card_numberError==""&&
      $cvvError==""){
        $card=1;
      }
   if(isset($_POST['chk_add']))
   {
      $address=1;
   }
      if($first_nameError == ""&&
        $last_nameError == ""&&
        $phone_numberError== ""&&
        $cityError == ""&&
        $stateError== ""&&
        $pincodeError==""&&
         $countryError=="")
         {
           $address=1;
         }

    if($card==1&&$address==1)
  {

   echo "<p>Your order has been processed.</p>";
   echo "</div>";
   echo "</div>";

   $user_result=mysqli_query($conn,"SELECT *
                               FROM UserInfo
                               WHERE email='$_SESSION[email]'") or die(mysqli_error());

   // echo $count_result;
   $user = mysqli_fetch_array($user_result);
   $userId=$user['UserId'];

  //  echo $userId,count($_SESSION['ProductId']);
   include("../html/pages-footer.html");
   echo "   </body></html>";
   for($i=0;$i<count($_SESSION['ProductId']);++$i){

   $ProductId=$_SESSION['ProductId'][$i];
  //  echo $ProductId;
           $row_results = mysqli_query($conn,"SELECT *
                                       FROM Products
                                       WHERE ProductId='$ProductId'") or die(mysqli_error());
            while($row = mysqli_fetch_array($row_results))
            {
                    $ProductId=$row['ProductId'];
                    $count= $_SESSION['quantity'][$i];
                    $Total=$row['Price']*$count;
                    // echo $userId;
                    // echo $count;
                    // echo $Total.'<br>';
                    mysqli_query($conn, "INSERT INTO CustomerShoppingInfo (CustomerId,ProductId,Quantity,Total)
                    VALUES ('$userId', '$ProductId','$count','$Total')");
            }
            mysqli_query($conn, "UPDATE UserInfo
            SET RewardPoints='$_SESSION[trycount]'
            WHERE email='$_SESSION[email]'")or die(mysql_error());
               }
    unset($_SESSION['ProductId']);
    unset($_SESSION['quantity']);
  //  echo "new try count is".$_SESSION['trycount'];
   exit();
   }
}
/* This function take input data and trims it, deletes the backslashes and converts special characters into HTML entities*/
function test_input($datainput) {
   $data = trim($datainput);
   $data = stripslashes($datainput);
   $data = htmlspecialchars($datainput);
   return $datainput;

}


?>

<form  action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  id="form1">

<h3 class="form_heading">Shipping Address</h3>
  <input type="checkbox" name="chk_add" value='1'><span>It is same with the address in my account</span>
  <p><span class="error">*indicates required field.</span></p>
  First Name: <br>
  <input type="text" name="first_name" class="resizedTextBox" value="<?=$first_name?>">
  <span class="error">*<?php print $first_nameError;?></span>
  <br>
  Last Name: <br>
  <input type="text" name="last_name" class="resizedTextBox" value="<?=$last_name?>">
  <span class="error">*<?php print $last_nameError;?></span>
  <br>
  Phone Number: <br>
  <input type="text" name = "phone_number"  class="resizedTextBox" value="<?=$phone_number?>">
  <span class="error">*<?php print $phone_numberError;?></span>
  <br>
  Street Address: <br>
  <input type="text" name = "street_address"  class="resizedTextBox" value="<?=$street_address?>">
  <span class="error">*<?php print $addressError;?></span>
  <br>
  Street Address(2): <br>
  <input type="text" name="street_address2"  class="resizedTextBox">
  <br>
  City: <br>
  <input type="text" name = "city"  class="resizedTextBox" value="<?=$city?>">
  <span class="error">*<?php print $cityError;?></span>
  <br>
  State: <br>
  <input type="text" name = "state"  class="resizedTextBox" value="<?=$state?>">
  <span class="error">*<?php print $stateError;?></span>
  <br>
  Pincode: <br>
  <input type="text" name = "pincode"  class="resizedTextBox" value="<?=$pincode?>">
  <span class="error">*<?php print $pincodeError;?></span>
  <br>
  Country: <br>
  <input type="text" name = "country"  class="resizedTextBox" value="<?=$country?>">
  <span class="error">*<?php print $countryError;?></span>
  <br><br><br><br>
  <h3 class="form_heading">Card Details</h3>
  <br>
  Name on card:<br>
  <input type="text" name = "name_card"  class="resizedTextBox">
  <span class="error">*<?php print $name_cardError;?></span>
  <br>
  Card Number: <br>
  <input type="text" name = "card_number"  class="resizedTextBox" value="<?=$card_number?>">
  <span class="error">*<?php print $card_numberError;?></span>
  <br>
  CVV number: <br>
  <input type="text" name = "cvv"  class="resizedTextBox">
  <span class="error">*<?php print $cvvError;?></span>
  <br>
  Expiry Date: <br>
  <SELECT NAME="CCExpiresMonth" >
    <OPTION VALUE="" SELECTED>--Month--
    <OPTION VALUE="01">January (01)
    <OPTION VALUE="02">February (02)
    <OPTION VALUE="03">March (03)
    <OPTION VALUE="04">April (04)
    <OPTION VALUE="05">May (05)
    <OPTION VALUE="06">June (06)
    <OPTION VALUE="07">July (07)
    <OPTION VALUE="08">August (08)
    <OPTION VALUE="09">September (09)
    <OPTION VALUE="10">October (10)
    <OPTION VALUE="11">November (11)
    <OPTION VALUE="12">December (12)
  </SELECT> /
  <SELECT NAME="CCExpiresYear">
    <OPTION VALUE="" SELECTED>--Year--
    <OPTION VALUE="04">2015
    <OPTION VALUE="05">2016
    <OPTION VALUE="06">2017
    <OPTION VALUE="07">2018
    <OPTION VALUE="08">2019
    <OPTION VALUE="09">2020
    <OPTION VALUE="10">2021
    <OPTION VALUE="11">2022
    <OPTION VALUE="12">2023
    <OPTION VALUE="13">2024
    <OPTION VALUE="14">2025
    <OPTION VALUE="15">2026
  </SELECT>
  <br>
  <div>
    <p>Card we accpet:</p>
    <img class="card_image" src="../images/cc.jpg" alt="cc_image" id="cards">
  </div>


  <input type="submit" value="Submit">


</form>
</div>
</div>
<?php

include("../html/index-footer.html");

 ?>
</body>
</html>
