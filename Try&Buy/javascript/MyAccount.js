/*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/
function validateChangePassword() {
  var oldP = document.forms["changePassword-form"]["oldPassword"].value;
  var newP = document.forms["changePassword-form"]["NewPassword"].value;
  var confirmP = document.forms["changePassword-form"]["ConfirmPassword"].value;
  if (oldP == null || oldP == "" || newP == null || newP == "" || confirmP == null || confirmP == "") {
    document.getElementById("changePass-Error").innerHTML = "*All Passwords are required";
      return false;
  }
  if (confirmP !== newP)
  {
    document.getElementById("changePass-Error").innerHTML = "* New and Confirm password should be same ";
    return false;
  }
  document.forms["changePassword-form"].action= "../php/changePassword.php";
  return true;
}



function getMoreDetails(billId){
  $.ajax({
    url: './MyOrders.php?billId=' + billId,
    type: 'GET',
    success: function(result){
      $("#order-more-details").html(result);
      $("#order-more-details").show();
    },
  });
}
