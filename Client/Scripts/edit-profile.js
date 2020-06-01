function checkUsername()
{
    var username = document.getElementById("username").value;
    var isUsernameValid = true;
    var usernameErrorText = ""; 
    
    // check username empty
    if (username === "")
    {
        var emptyUsernameError = "Username must not be empty. ";
        usernameErrorText += emptyUsernameError;
        isUsernameValid = false;
    }

    document.getElementById("username-error").innerHTML = usernameErrorText;
    return isUsernameValid;    
}

function checkEmail()
{
    var re = /\S+@\S+\.\S+/
    var email = document.getElementById("email").value;
    var isEmailValid = true;
    var emailErrorText = ""; 
    
    // check email empty
    if (email === "")
    {
        emailErrorText += "Email must not be empty. ";
        isEmailValid = false;
    }

    // check email valid
    if (!re.test(email))
    {
        emailErrorText += "This is not an valid email. ";  
        isEmailValid = false;
    }

    document.getElementById("email-error").innerHTML = emailErrorText;
    return isEmailValid;
}

function checkPassword()
{
   var password = document.getElementById("pwd").value;
   var isPasswordValid = true;
   var passwordErrorText = "";

   if (password === "")
   {
       var emptyPasswordError = "Password must not be empty. ";
       passwordErrorText += emptyPasswordError;
       isPasswordValid = false;
   }

   if (password.length < 8)
   {
       var shortPasswordError = "Password must contain at least 8 characters. ";
       passwordErrorText += shortPasswordError;
       isPasswordValid = false;
   }

   if (!/[a-z]/.test(password))
   {
       var noLowercaseError = "Password must contain at least one lowercase character. ";
       passwordErrorText += noLowercaseError;
       isPasswordValid = false;
   }

   if (!/[A-Z]/.test(password))
   {
       var noUppercaseError = "Password must contain at least one uppercase character. "
       passwordErrorText += noUppercaseError;
       isPasswordValid = false;
    }

    if (!/[0-9]/.test(password))
    {
        var noDigitError = "Password must contain at least one digit. ";
        passwordErrorText += noDigitError;
        isPasswordValid = false;
    }

    if (!/[\\\[\]\/\(\)\+\*\?`!@#$%\^&_=-]/.test(password))
    {
        var noSpecialSymbolError = "Password must contain at least one symbol: \[]/()+*?`!@#$%\^&_=-";
        passwordErrorText += noSpecialSymbolError;
        isPasswordValid = false;
    }

   document.getElementById("password-error").innerHTML = passwordErrorText; 
   return isPasswordValid;
}

function checkConfirmedPassword()
{
    var password = document.getElementById("pwd").value;
    var confirmedPassword = document.getElementById("confirmed-pwd").value;
    var isConfirmedPasswordValid = true; 
    var confirmedPasswordErrorText = "";

    if (password !== confirmedPassword)
    {
        confirmedPasswordErrorText += "Passwords do not match. ";
        isConfirmedPasswordValid = false;
    }
    document.getElementById("confirm-password-error").innerHTML = confirmedPasswordErrorText;
    return isConfirmedPasswordValid;
}

function checkLogin()
{
    document.getElementById("username-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";
    document.getElementById("confirm-password-error").innerHTML = "";
    return checkUsername() && checkEmail() && checkPassword() && checkConfirmedPassword();
}

function promptUserSave()
{
    if (confirm('Are you sure you want to make changes?'))
    {
        checkLogin();
    }
}

function promptUserLeave()
{
    if (confirm('Are you sure you want leave? Changes will not be saved'))
    {
        window.location.href = "profile.php";  
    }
}

function init()
{
    document.getElementById("update-form").onsubmit = promptUserSave;
    document.getElementById("edit-leave-button").onclick = promptUserLeave;
}

window.onload = init;