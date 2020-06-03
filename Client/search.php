<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Topic page"/>
	<meta name="keywords" content="html, tags"/>
	<meta name="author" content="Team 1 - Development Tools & Practice"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    
    <!-- CSS sheet-->
	<link href="Styles/main.css" rel="stylesheet"/>
    <link href="Styles/homepage.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Search Results | VOCES</title>
</head>

<body>
    <div id="navbar" >   
        <p id="brand">VOCES</p>
        <div id="logo">
            <img src="./Resources/Images/smallLogo.png" alt="VOCES">
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="write.php">Write</a>
            <a href="login.html">Log out</a>
        </nav>
    </div>
    <div id="main">
    <div id="main-panel">    
        <div id="greet">
            <div id="welcome">
                <?php
                    require_once("settings.php");
		
                    $link = @mysqli_connect(
                        $host,
                        $user,
                        $password,
                        $sql_db
                    );
    
                    session_start();

                    //echo "Search criteria " . $_POST["searchCriteria"];
                ?>
                <p id="search-message"></p>
                <p id="search-content"></p>
            </div>    
        </div>
        <div id="search-results">
        </div>
    </div>
    <div id="right-panel">
        <div id="search-panel">
        <p><input type="text" id="search-bar"><i id="search-button" class="fas fa-search"></i></p>
        </div>
        <p>What's On Your Mind?</p>
        <p>Write Now!</p>
        <div id="calendar"></div>
    </div>
</div>
    </div>
    <script>
        $(function() {
            $("#calendar").load("calendar.html");
        });
    </script>
    <script src="./Scripts/readbutton.js"></script>
    <script src="./Scripts/search.js"></script>
</html>
</body>