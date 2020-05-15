<?php
    require_once("settings.php");
		
    $link = @mysqli_connect(
        $host,
        $user,
        $password,
        $sql_db
    );

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $date = date("Y-m-d"); 
    
    if ($link == false)
    {
        echo "Unsuccessful connection.";
        exit();
    }
    else
    {
        // $sql = "USE idea_sharing_platform";
        // $result = mysqli_query($link, $sql);

        $emailExistQuery = "SELECT COUNT(*) as isExisted FROM Users WHERE Email = '$email'";
        
        if ($existCheck = mysqli_query($link, $emailExistQuery))
        {
            $count = mysqli_fetch_assoc($existCheck);
            $isExisted = $count['isExisted'];
            
            if ($isExisted > 0)
            {
                echo "Email already used. Please use a different email";
                header("Location: https://mercury.swin.edu.au/cos10011/s101603196/softwareDev/idea-sharing-platform/Client/register.html");
                exit();
            }
            else
            {
                if (strlen($pwd) <= 30)
                {
                    $sql = "INSERT INTO Users (Email, Username, Password, Date_Joined)
                    VALUES ('$email', '$username', '$pwd', '$date')";
                    $result = mysqli_query($link, $sql);
            
                    if ($result) 
                    {
                        echo "New record created successfully";
                        header("Location: https://mercury.swin.edu.au/cos10011/s101603196/softwareDev/idea-sharing-platform/Client/login.html");
                        exit();
                    } 
                    else 
                    {
                        echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    }
                }
                else
                {
                    echo "Password must be less than 30 characters";
                    header("Location: https://mercury.swin.edu.au/cos10011/s101603196/softwareDev/idea-sharing-platform/Client/register.html");
                    exit();
                }                
            }
        }
    }
?>