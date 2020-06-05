<!DOCTYPE html>
<html>
    <head>
        <title>Profile | VOCES</title>
    </head>
    <body>
        <h1>Profile</h1>
        <h2>User Details</h2>
        <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $link = mysqli_connect($host, $user, $password);
       
           /*if ($link == false)
           {
               echo "Unsuccessful connection.";
           }
           else
           {
               echo "Successful connection! ". mysqli_get_host_info($link);
           }*/

            $sql = "USE idea_sharing_platform";
            $result = mysqli_query($link, $sql);

            $sql = "SELECT * FROM Users"; //change this query to filter by the username/id of the currently logged in user
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Id: " . $row["Id"]. " - UserName: " . $row["Username"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        ?>
    </body>
</html> 