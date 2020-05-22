<script src="./Scripts/readbutton.js"></script>
<?php
    require_once("settings.php");
		
    $link = @mysqli_connect(
        $host,
        $user,
        $password,
        $sql_db
    );

    session_start();
    $Id = $_SESSION["Id"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    
    if ($link == false)
    {
        echo "Unsuccessful connection.";
        exit();
    }
    else
    {
        $updateQuery = "UPDATE users SET Username='$username', Password='$pwd'  WHERE Id='$Id'";
        if ($existCheck = mysqli_query($link, $updateQuery))
        {
            header("Location: profile.php");
        }
        else{
            header("Location: profile.php");
        }
        
    }
?>