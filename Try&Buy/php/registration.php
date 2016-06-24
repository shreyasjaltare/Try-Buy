<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php
include "dbconnect.php";
session_start();
if (isset($_POST['Regemail']) && isset($_POST['Regpassword'])){
         $username = $_POST['username'];
         $email = $_POST['Regemail'];
         $_SESSION["email"] = $_POST['Regemail'];
         $password = $_POST['Regpassword'];

         $result = mysqli_query($conn, "INSERT INTO UserInfo (FirstName, email, password)
         VALUES ('$username', '$email', '$password')")
         or Null;
         if($result){
           $_SESSION["name"]= $username;
           $_SESSION['try']=0;
           header("Location: ./index.php");
           exit;
         }
         else{
          //  header("Location: ./register-login.php");
           echo " An Accout is already created with this Email.";
           exit;
        }
     }
     mysqli_close($conn);
?>
