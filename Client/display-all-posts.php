<script src="./Scripts/readbutton.js"></script>
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
    //session_start();

    if (!isset($_SESSION["Id"])) {
        //header("location:http://localhost/idea-sharing-platform/Client/login.html");
        //echo "please log in";
        //exit();
    }

    $Id = $_SESSION["Id"];
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        echo "Connection false";
        exit();
    }

  
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $ownerId = $row['OwnerId'];

            $sql_owner = "SELECT * FROM users where Id = '$ownerId'";

            $result_owner = mysqli_query($link, $sql_owner);
            $row_owner = mysqli_fetch_assoc($result_owner);

            $article_preview = $row['Content'];

            if (strlen($article_preview) > 500) // if you want...
            {
                $maxLength = 500;
                $article_preview = substr($article_preview, 0, $maxLength);
                $article_preview .= "...";
            }

            $index = $row["Id"];
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

            echo "<div class='article-card'>"
            .    "<div class='card-left'>"
            .        "<img class='article-thumbnail' src='" . $imageUrl . "' alt='dummy avatar'>"
            .    "</div>"
            .    "<div class='card-right'>"
            .           "<p class='title'>" . $row['Title'] . "</p>"
            .           "<p class='author'>" . "By " . $authorname . "</p>"
            .           "<p class='short-content'>" . $article_preview . "</p>"
            .           "<button id='read-button' onclick='goToRead($ownerId, $index)'>Read more</button>"
            .       "</div>"
            .    "</div>";
        }
    }
?>