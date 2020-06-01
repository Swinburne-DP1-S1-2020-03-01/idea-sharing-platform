<?php
    
    $DEBUG = false;

    require_once("settings.php");

    $content = $_POST["content"];
    $title = $_POST["title"];
    $date = date("Y-m-d"); 
    $isNewArticle = $_POST["isNew"];

    session_start();
    $authorId = $_SESSION['Id'];
    
    if ($DEBUG) 
    {
        echo $_POST["content"];
        echo $_POST["title"];
        echo $authorId . " ";
        echo $_POST["articleId"] . " ";
        echo $isNewArticle;
    }
    
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

    if ($isNewArticle == 1) {
        $sql = "INSERT INTO Posts (Title, Content, Date_posted, OwnerId, Draft)
        VALUES ('$title', '$content', '$date', '$authorId', true)";

        if ($result = mysqli_query($link, $sql)) {
            echo "Successful created a new article";
        }
        else 
        {
            echo "Unsuccessful create. Please try again";
        }
    }
    else {
        $postId = $_POST['articleId'];
        echo $postId;
        $sql = "UPDATE posts
                SET Content = '$content',
                    Title = '$title'
                WHERE Id = '$postId'";
        if ($result = mysqli_query($link, $sql)) {
            echo "Successful edit the article";
        }
        else 
        {
            echo "Unsuccessful edited   . Please try again";
        }
    }
    
?>