<?php
    $host = "localhost";
	$user = "root";
    $password = "dp1-2020";
    $sql_db = "idea-sharing";
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
        // $sql = "USE idea_sharing_platform";
        // $result = mysqli_query($link, $sql);

        $emailExistQuery = "SELECT COUNT(*) as isExisted FROM Users WHERE Email = '$email' AND password = '$pwd'";

        
        // if ($existCheck = mysqli_query($link, $emailExistQuery))
        // {
        //     $count = mysqli_fetch_assoc($existCheck);
        //     $isExisted = $count['isExisted'];
            
        //     if ($isExisted > 0)
        //     {
        //         echo "Email already used. Please use a different email";
        //         exit();
        //     }
        //     else
        //     {
        //         $sql = "INSERT INTO Users (Email, Username, Password, Date_Joined)
        //         VALUES ('$email', '$username', '$pwd', '$date')";
        //         $result = mysqli_query($link, $sql);
        
        //         if ($result) 
        //         {
        //             echo "New record created successfully";
        //             exit();
        //         } 
        //         else 
        //         {
        //             echo "Error: " . $sql . "<br>" . mysqli_error($link);
        //         }
        //     }
        // }
    }  
?>