function Edit(){
}

Edit.prototype.checkUsername = function(username)
{
    var isUsernameValid = true;
    var usernameErrorText = ""; 
    
    // check username empty
    if (username === "")
    {
        var emptyUsernameError = "Username must not be empty. ";
        usernameErrorText += emptyUsernameError;
        isUsernameValid = false;
    }

    //document.getElementById("username-error").innerHTML = usernameErrorText;
    return isUsernameValid;    
}

Edit.prototype.checkEmail = function(email)
{
    var re = /\S+@\S+\.\S+/
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

Edit.prototype.checkPassword = function(password)
{
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

   //document.getElementById("password-error").innerHTML = passwordErrorText; 
   return isPasswordValid;
}

Edit.prototype.checkConfirmedPassword = function(password, confirmedPassword)
{   
    var isConfirmedPasswordValid = true; 
    var confirmedPasswordErrorText = "";

    if (password !== confirmedPassword)
    {
        confirmedPasswordErrorText += "Passwords do not match. ";
        isConfirmedPasswordValid = false;
    }
    //document.getElementById("confirm-password-error").innerHTML = confirmedPasswordErrorText;
    return isConfirmedPasswordValid;
}

Edit.prototype.checkLogin = function()
{
    document.getElementById("username-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";
    document.getElementById("confirm-password-error").innerHTML = "";

    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("pwd").value;
    var confirmedPassword = document.getElementById("confirmed-pwd").value;
    return checkUsername(username) && checkEmail(email) && checkPassword(password) && checkConfirmedPassword(password, confirmedPassword);
}

Edit.prototype.promptUserSave = function()
{
    if (confirm('Are you sure you want to make changes?'))
    {
        checkLogin();
    }
}

Edit.prototype.promptUserLeave = function()
{
    if (confirm('Are you sure you want leave? Changes will not be saved'))
    {
        window.location.href = "profile.php";  
    }
}

Edit.prototype.init = function()
{
    document.getElementById("update-form").onsubmit = promptUserSave();
    document.getElementById("edit-leave-button").onclick = promptUserLeave();
}

//window.onload = init;
module.exports = Edit;