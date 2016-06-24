<!-- Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick -->
<?php
include("../html/header.html");
?>
      <div id="main_block">

                <form class=address action="address.php" method="post" >
                <fieldset class=upload>
                <legend>Billing Address</legend>
                <span class="error">*</span> indicates required fields <br/>
                <label >Street: </label><input type="text" name="Street" ></br>
                <span class="error">* </span></br>
                <label >City: </label><input type="text" name="City" ></br>
                <span class="error">* </span></br>
                <label >State:</label>
                <input type="text" name="State" ></br>
                <span class="error">* </span></br>
                <label >Zip Code:</label>
                <input type="text" name="Zip" ></br>

                </fieldset>
              </form>

              <form class=address action="address.php" method="post" >
              <fieldset>
              <legend>Shipping Address</legend>
              <input type ="checkbox" name="same as billing" value=" Same As Billing"/>
              <span class="error">*</span> indicates required fields <br/>
              <label >Street: </label><input type="text" name="Street" ></br>
              <span class="error">* </span></br>
              <label >City: </label><input type="text" name="City" ></br>
              <span class="error">* </span></br>
              <label >State:</label>
              <input type="text" name="State" ></br>
              <span class="error">* </span></br>
              <label >Zip Code:</label>
              <input type="text" name="Zip" ></br>

              </fieldset>
            </form>

      </div>


          <?php
          include("../html/index-footer.html");
           ?>




    </body>
    </html>
