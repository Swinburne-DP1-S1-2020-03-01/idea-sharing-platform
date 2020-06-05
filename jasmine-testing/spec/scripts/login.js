function Login(){

}


Login.prototype.storeName = function(email){
    sessionStorage.email = email;
}

Login.prototype.checkEmail = function(email){
    //var email = document.getElementById("email").value;
    var isEmailValid = true;
    var emailErrorText = ""; 
    
    // check email empty
    if (email === "")
    {
        emptyEmailError = "Email must not be empty.";
        emailErrorText += emptyEmailError;
        isEmailValid = false;
    }
    //document.getElementById("email-error").innerHTML = emailErrorText;

    if (isEmailValid)
    {
        storeName(email); 
    }

    return isEmailValid;
}

Login.prototype.checkPassword = function(){
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

Login.prototype.checkLogin = function(){
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";
    return checkEmail() && checkPassword();
}

Login.prototype.init = function(){
    document.getElementById("login-form").onsubmit = checkLogin;
}

//window.onload = init;
module.exports = Login;