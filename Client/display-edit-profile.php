<?php 
    require_once("settings.php");
		
    $link = @mysqli_connect(
        $host,
        $user,
        $password,
        $sql_db
    );
            
    if ($link == false)
    {
        echo "Unsuccessful connection.";
        exit();
    }
    session_start();
        
    if (!isset($_SESSION["Id"])) {
        //header("location:http://localhost/idea-sharing-platform/Client/login.html");
        //echo "please log in";
        //exit();
    }

    $Id = $_SESSION["Id"];
    $sql = "SELECT * FROM users where Id = '$Id'";
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        echo "Connection false";
        exit();
    }

    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        echo "<div class='reading-article-card'>"
        .     "<div class='reading-card'>"
        .       "<fieldset class='display-profile'>" 
        .         "<h2>Your Profile</h2>"
        .         "<img class='avatar' src='./Resources/Images/blanckProfile.png' alt='dummy avatar'>"
        .         "<br />"
        .         "<br />"
        .         "<button id='edit-change-button' name='home''>Change</button>"
        .         "<p>Username</p>"
        .         "<input type=\"text\" id='username' name=\"username\" value=\"". htmlspecialchars($row['Username']) . "\">"
        .         "<p id='username-error'></p>"
        .         "<p>Email</p>"
        .         "<input type=\"text\" id='email' name=\"email\" value=\"". htmlspecialchars($row['Email']) . "\"readonly>"
        .         "<p id='email-error'></p>"
        .         "<p>Password</p>"
        .         "<input type=\"password\" id='pwd' name=\"pwd\" value=\"". htmlspecialchars($row['Password']) . "\">"
        .         "<div id='password-error'></div>"
        .         "<p>Confirm Password</p>"
        .         "<input type=\"password\" id='confirmed-pwd' name=\"confirmed-pwd\" value=\"". htmlspecialchars($row['Password']) . "\">"
        .         "<div id='confirm-password-error'></div>"
        .         "<br />"
        .         "<br />"
        .     "</fieldset>"
        .   "</div>"
        .   "</div>";
    }
?>