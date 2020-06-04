<script src="./Scripts/readbutton.js"></script>
<script src="./Scripts/profile.js"></script>
<?php
    require_once("settings.php");
	require_once("utils.php");
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
    //session_start();

    if (!isset($_SESSION["Id"])) {
        //header("location:http://localhost/idea-sharing-platform/Client/login.html");
        //echo "please log in";
        //exit();
    }

    $Id = $_SESSION["Id"];
    $sql = "SELECT * FROM posts where OwnerId = '$Id'";
    $sql_owner = "SELECT * FROM users where Id = '$Id'";
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        echo "Connection false";
        exit();
    }

  
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $result_owner = mysqli_query($link, $sql_owner);
            $row_owner = mysqli_fetch_assoc($result_owner);
            $index = $row["Id"];

            // display the draft message
            $isDraft = DisplayDraftMessage($row["Draft"]);
            $article_preview = $row['Content'];

            $article_preview = DisplayArticlePreview($article_preview, 500);

            $authorname = DisplayAuthor($row_owner['Username'], $row_owner['Email']);

            if ($row['image_url'] == null)
            {
                $imageUrl = "./Resources/Images/dummy-avatar.jpg";
            }
            else
            {
                $imageUrl = $row['image_url'];
            }

            echo "<div class='article-card'>"
            .    "<div class='card-left'>"
            .        "<img class='article-thumbnail' src='" . $imageUrl . "' alt='dummy avatar'>"
            .    "</div>"
            .    "<div class='card-right'>"
            .           "<p class='draft-message'>" . $isDraft . "</p>"
            .           "<p class='title'>" . $row['Title'] . "</p>"
            .           "<p class='author'>" . "By " . $authorname . "</p>"
            .           "<p class='short-content'>" . $article_preview . "</p>"
            .           "<button id='read-button' onclick='goToRead($Id, $index)'>Read more</button>"
            .           "<button class='.edit-button' onclick='goToEdit($index)'>Edit</button>"
            .           "<button class='.delete-button' onclick='delete($index)'>Delete</button>"
            .       "</div>"
            .    "</div>";
        }
    }
?>