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
?>

<div class="login-section">
  <div class="fbLogin">
    <span id="login-top"> Discovering beauty is even more exciting with friends!!    </span>
  <a href="https://www.facebook.com/TryBuycom-1638661689741531/?fref=ts">  <input type="image" id="connect-fb" src="../images/login-register/fb-connect.jpg" />
</a>  </div>
  <div class="login-body">
    <div id="userlogin">
      <p class="login-heading"> Customer Login </p>
      <form method="post" action="./login.php" name="login-form" onsubmit="return validateLoginForm()">
        <span class="error" id= "emailErr"></span>
        <span class="error" id= "passErr"></span>

        <?php
        if (isset($_GET["uperror"])){
        ?>
          <div class="error"> <span>Password Changed Successfully.Kindly login again.</span> </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET["error"])){
        ?>
          <div class="error"> <span>Incorrect Username or password</span> </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET["ForgetpasswordDeatils"])){
        ?>
          <div class="error"> <span> Username and password</span> </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET["ForgetpasswordMessage"])){
        ?>
          <div class="error"> <span>Please Enter Email Address to retrieve ForgotPassword </span> </div>
        <?php
        }
        ?>

      <input class="text" type="text" placeholder="Email Address" name="email" >
        <br>
        <input class="text" type="password" placeholder="Password" name="password">
        <br>
          <!-- <a href="forgetPassword.php?email" id="forget-password">Forgot Password? </a> -->
        </p>
        <br>
        <input id="login-button" type="submit" value="Log In"><br>
         <a href="index.php" class="returnLink">or  Return to store</a>
      </form>
        <br>
    </div>
  </div>

  <div class="register-section">
    <div id="userlogin">
      <p> Create Account </p>
        <form method= "post" action="./registration.php" name="Reg-Form" onsubmit="return validateRegForm()">
        <span class="error" id= "RegpassErr"></span>
        <span class="error" id= "RegemailErr"></span>
        <input class="text" type="text" placeholder="User Name" name="username">
        <br>
        <input class="text" type="text" placeholder="Email Address" name="Regemail">
        <br>
        <input class="text" type="password" placeholder="Password" name="Regpassword">
        <br>
        <!-- <input type="checkbox"/><span class="condition-info">Yes,I'd like to opt into the Rewards Points
        </span> -->
        <br>
        <input id="Reg-button" type="submit" value="Register">
        <br><br>
        <div class="para">
            By joining Try&Buy you’ll enjoy exclusive previews & e-mail offers.
            By clicking the button below, you agree to the Try&Buy Privacy Policy and Terms of Use.
        </div>
      </form>
        <br>
    </div>
 </div>

 <div class="information-section">
   <div class="info1">
  <span class="I1"> Sign up and enjoy </span>
  <span class="I2"> EXCLUSIVE BENEFITS </span>
  <hr>
  <hr>
  <dl>
    <dt> New Customers</dt>
    <dd>Free complimentary gifts when you registered</dd><br>
    <dt>Free Samples</dt>
    <dd>Discover and Try before buying</dd><br>
    <dt>Offers & news </dt>
    <dd> Receive offers on your beauty faves</dd><br>
    <!-- <dt> Rewards Points</dt>
    <dd> With every 100 points get 5 Try Items.</dd> -->
  </dl>
 </div>
 </div>
</div>

<?php
include("../html/pages-footer.html");
?>

  </body>
</html>
