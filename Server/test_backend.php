 <?php
$servername = "localhost"; //URL of the server which contains the database eg. Mercury, you will probably have to change this to get it working
$username = "root"; //change username and password as necessary, these will work with xampp by default
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

$sql = "USE idea_sharing_platform"; //
$result = mysqli_query($conn, $sql);

$sql = "SELECT Id FROM Users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["Id"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 