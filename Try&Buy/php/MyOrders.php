<!-- /*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php
session_start();
include "dbconnect.php";

if(isset($_GET["billId"])) {
  $billId = $_GET["billId"];
  error_log("Hello world");

  $queryBillDetails="SELECT CustomerShoppingInfo.Total, CustomerShoppingInfo.Date, CustomerShoppingInfo.ProductId, Products.ProductName, Products.Price,Products.src, CustomerShoppingInfo.Quantity
  FROM CustomerShoppingInfo
  JOIN Products on CustomerShoppingInfo.ProductId = Products.ProductId
  JOIN UserInfo on CustomerShoppingInfo.CustomerId=UserInfo.UserId
  WHERE CustomerShoppingInfo.BillId=$billId";
  $resultBillDetails =mysqli_query($conn, $queryBillDetails) or die(mysqli_error());
  ?>
  <span class="order-details"> Detailed Order </span>
  <table class="table-order">
    <tr>
      <th class="table-order-details">Image</th>
      <th class="table-order-details">ProductName</th>
      <th class="table-order-details">Quantity</th>
      <th class="table-order-details">Price</th>
    </tr>
  <?php
  while($details = $resultBillDetails->fetch_assoc()) {

    if($details['Quantity']>0){
      echo
            "<tr>
              <td class=\"order-td\"><img src =\"{$details['src']}\" width=\"70px\" height=\"50px\"/></td>
              <td class=\"order-td\">{$details['ProductName']}</td>
              <td class=\"order-td\">{$details['Quantity']}</td>
              <td class=\"order-td\">{$details['Price']}</td>
            </tr>\n";
    }
    else{
      echo
            "<tr>
              <td class=\"order-td\"><img src =\"{$details['src']}\" width=\"70px\" height=\"50px\"/></td>
              <td class=\"order-td\">{$details['ProductName']}</td>
              <td class=\"order-td\">Free Try</td>
              <td class=\"order-td\">Free</td>
            </tr>\n";
    }
          }

    ?>
  </table>
<?php
  mysqli_close($conn);
}
else {
  include("../html/header.html");
  include("../php/login-account-cart.php");
  include("../html/nav.html");
  include("../html/MyAccountMenu.html");


  $username = $_SESSION["name"];
  if ($username){
    // $sql = "SELECT UserId FROM UserInfo WHERE FirstName='$username'";
     $sql = "SELECT DISTINCT CustomerShoppingInfo.Total, CustomerShoppingInfo.Date,CustomerShoppingInfo.BillId, CustomerShoppingInfo.CustomerId FROM CustomerShoppingInfo INNER JOIN UserInfo on CustomerShoppingInfo.CustomerId = UserInfo.UserId WHERE UserInfo.FirstName='$username'";
     $result = mysqli_query($conn, $sql) or die(mysqli_error());
   }
  ?>
  <div class="my-account-order-body-section">
    <div class="order-page-heading">
      My Order Details
    </div>
    <span class="order-page-sub-heading">  Hi <?= $_SESSION["name"] ?></span>,
    <p class="my-order-text">  Click on "more details" for a detailed view of Order.</p>
    </span>
      <table class="myOrderTable">
        <tr><th class="table-headings">Date</th>
          <th class="table-headings">Bill Id </th>
          <th class="table-headings">Total </th>
          <th class="table-headings">More Details </th>
      </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo
              "<tr>
                <td class=\"order-\">{$row['Date']}</td>
                <td class=\"order-\">{$row['BillId']}</td>
                <td class=\"order-\">{$row['Total']}</td>
                <td><input id=\"more-details-btn\" type=\"button\" value=\"More Details\" onclick=getMoreDetails({$row['BillId']})></td>
              </tr>\n";
            }
          ?>
      </table>


      <div id="order-more-details" class="hide">

      </div>
  </div>
<?php
  include("../html/index-footer.html");
  echo "</body></html>";
  mysqli_close($conn);
}

?>
