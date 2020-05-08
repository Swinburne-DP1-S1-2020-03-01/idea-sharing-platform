function checkEmail()
{
    var email = document.getElementById("email").value;
    var isEmailValid = true;
    var emailErrorText = ""; 
    
    // check email empty
    if (email === "")
    {
        emptyEmailError = "Email must not be empty.";
        emailErrorText += emptyEmailError;
        isEmailValid = false;
    }
    document.getElementById("email-error").innerHTML = emailErrorText;
    return isEmailValid;
}

function checkPassword()
{
   var password = document.getElementById("pwd").value;
   
   var isPasswordValid = true;

   passwordErrorText = "";
   if (password === "")
   {
       emptyPasswordError = "Password must not be empty";
       passwordErrorText += emptyPasswordError;
       isPasswordValid = false;
   }
   document.getElementById("password-error").innerHTML = passwordErrorText; 
   return isPasswordValid;
}

function checkLogin()
{
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";
    return checkEmail() && checkPassword();
}

function init()
{
    document.getElementById("login-form").onsubmit = checkLogin;
}

window.onload = init;