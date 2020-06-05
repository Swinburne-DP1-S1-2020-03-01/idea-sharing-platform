<?php
    require_once("settings.php");
		
    $link = @mysqli_connect(
        $host,
        $user,
        $password,
        $sql_db
    );

    //$email = htmlspecialchars($_GET["email"]);
    //$pwd = htmlspecialchars($_GET["pwd"]);
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    if ($link == false)
    {
        echo "Unsuccessful connection.";
        exit();
    }
    else
    {
        $loginCheckQuery = "SELECT Id,Username,Email,Password FROM users WHERE Email = '$email' AND password = '$pwd'";

        if ($existCheck = mysqli_query($link, $loginCheckQuery))
        {
            // check if the user record returned is available and unique
            if (mysqli_num_rows($existCheck) != 1)
            {
                echo "Incorrect username or password.";
                header("Location: login.html");
                exit();            
            }
            echo "Logged in successfully.";
            $userRecord = mysqli_fetch_assoc($existCheck);
            session_start();
            $_SESSION["Id"] = $userRecord["Id"];
            $_SESSION["Username"] = $userRecord["Username"]; 
            header("Location: home.php");
            exit();
        }
        else 
        {
            echo "An unexpected issue happens. Please visit the page later.";
            header("Location: login.html");
            exit();
        }
    }  
?>