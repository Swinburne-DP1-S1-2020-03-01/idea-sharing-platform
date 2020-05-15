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
        $loginCheckQuery = "SELECT Id, Email, Username, Password FROM Users WHERE Email='$email' AND Password='$pwd'";

        
        if ($existCheck = mysqli_query($link, $loginCheckQuery))
        {
            echo "Logged in successfully.";
            $username1 = mysqli_fetch_assoc($existCheck);
            $loggedInUser = mysqli_fetch_object($existCheck);
            $loggedInUserId = $loggedInUser->Id;
            //send the credentials of the logged in user to the front-end
            $loggedInUserObject->Id = $loggedInUserId;
            $loggedInUserJSON = json_encode($loggedInUserObject);
            echo $loggedInUserJSON;
            session_start();
            $_SESSION["Id"] = $loggedInUserId;
            $_SESSION["username"] = $username1['Username'];  
            header("Location: https://mercury.swin.edu.au/cos10011/s101603196/softwareDev/idea-sharing-platform/Client/home.php");
            exit();
 
            
        }
        else
        {
            echo "Incorrect username or password.";
            header("Location: https://mercury.swin.edu.au/cos10011/s101603196/softwareDev/idea-sharing-platform/Client/login.html");
            exit();
        }
    
    }  
?>