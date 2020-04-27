<?php
    // This code tests the connection with MySQL database.
    // It checks if it is possible to establish a connection with the database, using username and password.
    $host = "localhost";
	$user = "root";
	$password = "dp1-2020";
    $link = mysqli_connect($host, $user, $password);

    if ($link == false)
    {
        echo "Unsuccessful connection.";
    }
    else
    {
        echo "Successful connection!". mysqli_get_host_info($link);
    }
?>