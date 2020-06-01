<?php
    require_once("settings.php");
		
    $link = @mysqli_connect(
        $host,
        $user,
        $password,
        $sql_db
    );
    session_start();

    if ($link == false)
    {
        echo "Unsuccessful connection.";
        exit();
    }

    if (!isset($_SESSION["Id"])) {
        //header("location:http://localhost/idea-sharing-platform/Client/login.html");
        echo "please log in";
        exit();
    }

    $articleId = $_POST["Id"];
    $sql = "SELECT * FROM posts where Id = '$articleId'";
    $result = mysqli_query($link, $sql);


    if (mysqli_num_rows($result) > 0)
    {

        $row = mysqli_fetch_assoc($result);
        $results = [
            "Title" => $row["Title"],
            "Content" => $row["Content"]
        ];
        echo json_encode($results);    
    }
    

?>