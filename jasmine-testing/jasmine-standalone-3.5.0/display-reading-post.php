<script src="./Scripts/readbutton.js"></script>
<?php
    require_once("settings.php");
		
    $link = @mysqli_connect(
        $host,
        $user,
        $password,
        $sql_db
    );
    session_start();
    $_SESSION["ReadId"] = $_COOKIE["idCookie"];
    $_SESSION["ReadRow"] = $_COOKIE["rowCookie"];
    

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

    $Id = $_SESSION["ReadId"];
    $rows = $_SESSION["ReadRow"];

    $sql = "SELECT * FROM posts where OwnerId = '$Id' AND Id = '$rows'";
    $sql_owner = "SELECT * FROM users where Id = '$Id'";
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        echo "Connection false";
        exit();
    }

    $index = 0;

    $row = mysqli_fetch_assoc($result);
    $result_owner = mysqli_query($link, $sql_owner);
    $row_owner = mysqli_fetch_assoc($result_owner);

    $article_preview = $row['Content'];

    if ($row_owner['Username'] == null)
    {
        $authorname = $row_owner['Email'];
    }
    else
    {
        $authorname = $row_owner['Username'];
    }

    if ($row['image_url'] == null)
    {
        $imageUrl = "./Resources/Images/dummy-avatar.jpg";
    }
    else
    {
        $imageUrl = $row['image_url'];
    }

    echo "<div class='reading-article-card'>"
    .       "<div class='reading-card'>"
    .           "<button id='reading-return-button' name='home' onclick='readButton(this.name)'>Back</button>"
    .           "<br />" // crude way of fixing the title align, button would move it across
    .           "<br />"
    .           "<br />"
    .           "<p class='title'>" . $row['Title'] . "</p>"
    .           "<p class='author'>" . "Posted by " . $authorname . "</p>"
    .           "<p><img class='article-thumbnail' src='" . $imageUrl . "' alt='dummy avatar'></p>" 
    .           "<p class='short-content'>" . $article_preview . "</p>"
    .       "</div>"
    .    "</div>";
?>