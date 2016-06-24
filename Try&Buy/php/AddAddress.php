<!-- Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick -->
<?php
include "dbconnect.php";
session_start();
if (isset($_POST['firstName']) && isset($_POST['lastName'])){

         $firstname = $_POST['firstName'];
         $lastname = $_POST['lastName'];
         $street = $_POST['Street'];
         $city = $_POST['City'];
         $state = $_POST['State'];
         $zip = $_POST['Zip'];
         $sql = "UPDATE UserInfo
         SET FirstName='$firstname', LastName='$lastname', Street='$street', City='$city', State='$state',Zip='$zip'
         WHERE FirstName='$firstname'";
         if (mysqli_query($conn, $sql)) {
           mysqli_query($conn, $sql);
           header("Location: ../php/MyAccount.php");

         } else {
           header("Location: ../php/MyAccount.php");
             echo "Error updating record: " . mysqli_error($conn);
         }
     }
     mysql_close($conn);
?>
