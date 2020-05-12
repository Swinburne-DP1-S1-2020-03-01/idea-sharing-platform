<?php
    $host = "localhost";
	$user = "root";
    $password = "dp1-2020";
    $sql_db = "voces_db";
    $link = mysqli_connect($host, $user, $password, $sql_db);

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    if ($link == false)
    {
        echo "Unsuccessful connection.";
        exit();
    }
    else
    {


        $loginCheckQuery = "SELECT Id,Email,Password FROM USERS WHERE Email = '$email' AND password = '$pwd'";

        if ($existCheck = mysqli_query($link, $loginCheckQuery))
        {
            echo "Logged in successfully.";
            $loggedInUser = mysqli_fetch_object($existCheck);
            $loggedInUserId = $loggedInUser->Id;
            //send the credentials of the logged in user to the front-end
            $loggedInUserObject->Id = $loggedInUserId;
            $loggedInUserJSON = json_encode($loggedInUserObject);
            echo $loggedInUserJSON;
            session_start();
            $_SESSION["Id"] = $loggedInUserId; 
            header("Location: http://localhost/idea-sharing-platform/Client/home.php");
            exit();
        }
        else
        {
            echo "Incorrect username or password.";
            header("Location: http://localhost/idea-sharing-platform/Client/login.html");
            exit();
        }
    
    }  
?>