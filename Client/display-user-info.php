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
        echo "please log in";
        exit();
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
        echo "<div id='user-card'>"
        .   "<div class='card-left'>"
        .       "<img class='avatar' src='./Resources/Images/dummy-avatar.jpg' alt='dummy avatar'>"
        .   "</div>"
        .   "<div class='card-right'>"
        .       "<h2 id='username'>" . $row['Username'] . "</h2>"
        .       "<p>Email: <span id='email'>". $row['Email'] . "</span></p>"
        .       "<p>Joined Since: <span id='join-date'>" . date("d-m-Y", strtotime($row['Date_Joined'])) . "</span></p>"
        .       "<p>Number of articles: <span id='number-articles'>" . "</span></p>"
        .       "<button id='read-button'>Edit</button>"
        .   "</div>"
        .   "</div>";
    }
?>