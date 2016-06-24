/*Author:
COEN276 Fall 2015 Group1
Jingbo Bai
Prinal Khandelwal
Shreyas Jaltare
Jason Zadwick*/
function validateLoginForm() {
    var email = document.forms["login-form"]["email"].value;
    var password = document.forms["login-form"]["password"].value;
    if (email == null || email == "") {
      document.getElementById("emailErr").innerHTML = "* Email is required";
        return false;
    }else{
          var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
          if(!(re.test(email))){
            document.getElementById("emailErr").innerHTML = "* Incorrect Email format";
            return false;
          }
    }
    if (password == null || password == "") {
      document.getElementById("passErr").innerHTML = "* Password is required";
        return false;
    }
  }

function validateRegForm() {
  var email = document.forms["Reg-Form"]["Regemail"].value;
    var password = document.forms["Reg-Form"]["Regpassword"].value;
  if (email == null || email == "") {
    document.getElementById("RegemailErr").innerHTML = "* Email is required";
      return false;
  }else{
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(!(re.test(email))){
          document.getElementById("RegemailErr").innerHTML = "* Incorrect Email format";
          return false;
        }
  }
  if (password == null || password == "") {
    document.getElementById("RegpassErr").innerHTML = "* Password is required";
      return false;
  }
}
