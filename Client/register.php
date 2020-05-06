<?php
    $host = "localhost";
	$user = "root";
	$password = "";
    $link = mysqli_connect($host, $user, $password);

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $date = date("Y-m-d");

    if ($link == false)
    {
        echo "Unsuccessful connection.";
    }
    else
    {
        $sql = "USE idea_sharing_platform";
        $result = mysqli_query($link, $sql);

        $sql = "INSERT INTO Users (Email, Username, Password, Date_Joined)
        VALUES ('$username', '$pwd', '$email', $date)";
        $result = mysqli_query($link, $sql);

        if ($result) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
    }  
?>