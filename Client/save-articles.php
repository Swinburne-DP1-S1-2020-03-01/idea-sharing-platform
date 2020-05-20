<?php
    
    $DEBUG = true;

    require_once("settings.php");

    $content = $_POST["content"];
    $title = $_POST["title"];
    $date = date("Y-m-d"); 
    
    session_start();
    $authorId = $_SESSION['Id'];

    if ($DEBUG) 
    {
        echo $_POST["content"];
        echo $_POST["title"];
        echo $authorId;
    }
    
    $sql = "INSERT INTO Posts (Title, Content, Date_posted, OwnerId, Draft)
    VALUES ('$title', '$content', '$date', '$authorId', true)";

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
    
    if ($result = mysqli_query($link, $sql)) {
        echo "Successful saved the posts";
    }
    else 
    {
        echo "Unsuccessful save. Please try again";
    }
?>