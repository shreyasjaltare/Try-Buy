<!-- 
/*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/ -->
<?php
include("../html/header.html");
include("../php/login-account-cart.php");
include("../html/nav.html");
session_start();
mysql_connect("localhost:8888", "root", "root") or die("Error connecting to database: ".mysql_error());
mysql_select_db("try&buy_db") or die(mysql_error());

?>

<div class="search-section">
  <div class="left-section">
     <table class=categories>
      <tr><th>Select a Catagory </th><tr>
      <tr><td><a href="../php/BathBodySkin.php">BathBody &amp; Skin Care</td></tr>
      <tr><td><a href="../php/fragrances.php">Fragrances</a></td></tr>
      <tr><td><a href="../php/makeup.php">Makeup</td></tr>
     </table>
   </div>

  <h2 class=header2 >Search Result</h2>
<br>
<br>
<?php
    $query = $_GET['query'];
    // gets value sent over search form

    $min_length = 1;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection

        $row_results = mysql_query("SELECT * FROM products
            WHERE (`ProductName` LIKE '%".$query."%') OR (`ProductType` LIKE '%".$query."%')") or die(mysql_error());


        if(mysql_num_rows($row_results) > 0){ // if one or more rows are returned do following


            while($results = mysql_fetch_array($row_results)){

            ?>
            <div class=productDisplay>
            <p id=addImage></p>
            <form name="tryandbuy" id="addToBag" action="addToBag2.php" method="post" >
               <a class=smallImg rel="<?=$results['src']?>">
                <img class=productImage src="<?=$results['src']?>" alt=" ">
              </a>
             <div class=discription>
              <p class=productName><?=$results['ProductName']?></p>
              <input name="ProductId" type="hidden" value="<?=$results['ProductId']?>">
              <p>$<?=$results['Price']?></p>
             </div>
            <div class=quality>
              <input class="sub" name="" type="button" value="-" >
              <input class="text_box" name="quantity" type="text" value="0" size="8">
              <input class="add" name="" type="button" value="+" >
              <br>
              <input class=trybuy name=submit type="image" src="../images/try.jpg" alt="Submit" value="Try" >
              <input class=trybuy name=submit type="image" src="../images/buy.jpg" alt="Submit" value="Buy">
              </form>
            </div>
          </div>

            <?php
            }

        }
        else{ // if there is no matching rows do following
            echo "No results founded.";
        }

    }
    else{ // if query length is less than minimum
        echo "Please type your keywords.";
    }
?>

</div>


<?php

include("../html/index-footer.html");

 ?>
</body>
</html>
