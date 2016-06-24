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
  <h2 class=header2 >My Bag</h2>
  <a href="javascript:history.go(-1);"><button class='back'>Continue Shopping</button></a>

<?php
    $quantity= $_POST["quantity"];
    $submitType= $_POST["submit"];
    $total=0;


    if(!isset($_SESSION['ProductId'])){
    $_SESSION['ProductId'] = array();
    }
    if(!isset($_SESSION['quantity'])){
    $_SESSION['quantity'] = array();
    }


    if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $check) {
                if(($_POST['delete']==1))
                {
                  $key = array_search($check,$_SESSION['ProductId']);
                  unset($_SESSION['ProductId'][$key]);
                  $_SESSION['ProductId'] = array_values($_SESSION['ProductId']);
                  unset($_SESSION['quantity'][$key]);
                  $_SESSION['quantity'] = array_values($_SESSION['quantity']);
                }
            }
    }

    if($quantity>= 1){
      if(($submitType=="Try")){
        if(in_array($_POST["ProductId"],$_SESSION['ProductId'])){
            echo "It is already in your Bag";
        }
        else{
          $count_result=mysqli_query($conn,"SELECT *
                                      FROM UserInfo
                                      WHERE email='$_SESSION[email]'") or die(mysqli_error());

          // echo $count_result;
          $count = mysqli_fetch_array($count_result);
          $_SESSION['trycount']=$count['RewardPoints'];
          if(($_SESSION['trycount']-$_SESSION['try']-$quantity)>=0)
          { $_SESSION['try']+=$quantity;
            array_push($_SESSION['ProductId'],$_POST["ProductId"]);
            array_push($_SESSION['quantity'],'0');
            echo "<p> The current TRY count you have is " . $count['RewardPoints'] . ".</p>";
            $_SESSION['trycount']=$count['RewardPoints']-$_SESSION['try'];
          }
          else{
            echo "<br><p> Oops! You don't have enough TRY count.</p>";
          }
        }


      }
  else{
      if(in_array($_POST["ProductId"],$_SESSION['ProductId'])){
          echo "It is already in your Bag";
      }else{
          array_push($_SESSION['ProductId'],$_POST["ProductId"]);
          array_push($_SESSION['quantity'],$quantity);
       }
     }
    }
    $num=count($_SESSION['ProductId']);
    if($num==0)
      {
        echo "<p>it is empty .</p> ";
      }
      else{
            // print_r ($_SESSION['ProductId']);
    for($i=0;$i<count($_SESSION['ProductId']);++$i){
    $ProductId=$_SESSION['ProductId'][$i];

            $row_results = mysqli_query($conn,"SELECT *
                                        FROM Products p
                                        WHERE ProductId='$ProductId'") or die(mysqli_error());


              ?>

                      <form  action="addToBag2.php" method="post">
                  <?php
              if(mysqli_num_rows($row_results) > 0) {
                  while($row = mysqli_fetch_array($row_results))
                 {
                   $title=$row['ProductName'];

                   $count= $_SESSION['quantity'][$i];

                   $price=$row['Price'];

                   $src=$row['src'];

                   ?>
                   <table id="tab">
                      <tr class="bag">
                      <td><input class="check" type="checkbox" name='check_list[]' value="<?=$ProductId?>"> </td>
                      <td> <img class=productImage src="<?=$src?>" alt=" "></td>
                      <td><p class="cartTittle"><?=$title?></p></td>
                      <td>

                      <p class=none>$<span class="price"><?=$price?></span></p>
                   <div class=quality>
                     <?php
                     if($count=='0')
                     {
                       ?>
                       <p> Type: </p>
                       <input class="text_box" name="" type="text" value="<?=$count?>" size="8" hidden='hidden'>
                       <p>Free Try!</p>
                       <td> Price：$ <span class="total"> <?=($price * $count)?></span></td></tr>
                       <br>
                       <?php
                     }
                     else{

                     ?>

                       <p> Quantity: </p>
                       <input class="sub" name="" type="button" value="-" >
                       <input class="text_box" name="" type="text" value="<?=$count?>" size="8">
                       <input class="add" name="" type="button" value="+" >
                       <td> Price：$ <span class="total"> <?=($price * $count)?></span></td></tr>
                       <br>
                       <?php } ?>
                   </div>
                    </td>

                  </table>
                 <?php
                    $total+=($price[$index] * $count[$index]);
                    }
                  }

                }

                 ?>

                 <p>Total : $<span class=allTotal> </span></p>
                 <table>
                 <tr><td><input type="checkbox" class="chk_boxes" label="check all" /></td>
                 <td>Select All</td>
                 <td><button class='mybag' name="delete" value="1">Delete</button></td>
                 <td><a href="payment_new.php"><button type="button" class='mybag' name="checkout">Checkout</button></a></td></tr>

               </table>

                 <?php  } ?>

                  </form>


                 </div>







<?php
mysqli_close($conn);
include("../html/index-footer.html");

 ?>
</body>
</html>
