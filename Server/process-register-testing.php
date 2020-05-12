<?php    
    function sanitise_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data); //remove backslashes
		$data = htmlspecialchars($data);
		return $data; //
    }
    
    $host = "localhost";
	$user = "root";
	$pwd = "dp1-2020";
    $sql_db = "idea-sharing";

    $connection = mysqli_connect($host, $user, $pwd, $sql_db);
    if ($connection == false)
    {
        echo "<p>Fail</p>";
    }
    else 
    {
        echo "<p>Successful connection</p>". mysqli_get_host_info($connection);     
    }

    $username = sanitise_data($_POST['username']);
    $password1 = sanitise_data($_POST['pwd1']);
    $password2 = sanitise_data($_POST['pwd2']);
    $errMsg = "";

    if ($username == "")
    {
        $errMsg .= "Username is required.\n";
    }

    if ($password1 == "")		
    {
        $errMsg .= "Password is required.\n";
    }

    if ($password2 == "")
    {
        $errMsg .= "Password confirmation is required.\n";
    }

    if ($password1 != $password2)
    {
        $errMsg .= "Two passwords do not match!\n";
    }

    if ($errMsg == "")
    {
        echo "Checked!";
    }
    else
    {
        echo $errMsg;
    }
    if ($errMsg == "") //No error 
    {		
        $checkUserExistedQuery = "SELECT COUNT(*) as isExisted FROM users WHERE username = '$username'";
        
        if ($existCheck = mysqli_query($connection, $checkUserExistedQuery))
        {
            $count = mysqli_fetch_assoc($existCheck);

            $isExisted = $count['isExisted'];

            if ($isExisted > 0)
            {
                echo "<p>Username already existed. Please use different username. <a href=\"register.php\">Click here</a> to try again.</p>";
            }
            else
            {
                //$password1 = md5($password1);
                $registerNewAccount = "INSERT INTO users (username, password) VALUES('$username', '$password1')";
                $addNewAccount = mysqli_query($connection, $registerNewAccount);

                if ($addNewAccount)
                {
                    echo "<p>Register successfully. <a href=\"register.php\">Click here</a> to log in.</p>";
                }
                else
                {
                    echo "<p>Something go wrong. <a href=\"register.php\">Click here</a> to try again.</p>";
                }
            }
        }
    }
?>