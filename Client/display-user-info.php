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
	$sql_count = "SELECT COUNT(Id) FROM posts WHERE OwnerId='$Id'";
    $result = mysqli_query($link, $sql);
	$result_count = mysqli_query($link, $sql_count);

    if ($result == false || $result_count == false) {
        echo "Connection false";
        exit();
    }

  
    if (mysqli_num_rows($result) > 0)
    {
		$row_count = mysqli_fetch_assoc($result_count);
        $row = mysqli_fetch_assoc($result);
        echo "<div id='user-card'>"
        .   "<div class='card-left'>"
        .       "<img class='avatar' src='./Resources/Images/blanckProfile.png' alt='dummy avatar'>"
        .   "</div>"
        .   "<div class='card-right'>"
        .       "<h2 id='username'>" . $row['Username'] . "</h2>"
        .       "<p>Email: <span id='email'>". $row['Email'] . "</span></p>"
        .       "<p>Joined Since: <span id='join-date'>" . date("d-m-Y", strtotime($row['Date_Joined'])) . "</span></p>"
        .       "<p>Number of articles: <span id='number-articles'>" . $row_count['COUNT(Id)'] .  "</span></p>"
        .       "<button id='read-button' onclick='goToProfileEdit()'>Edit</button>"
        .   "</div>"
        .   "</div>";
    }
?>