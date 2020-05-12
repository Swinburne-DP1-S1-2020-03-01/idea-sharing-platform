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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <!-- CSS sheet-->
	<link href="Styles/main.css" rel="stylesheet"/>
    <link href="Styles/homepage.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Homepage | Idea Sharing</title>
</head>

<body>
    <div id="navbar" >   
        <p id="brand">VOCES</p>
        <div id="logo">
            <img src="./Resources/Images/smallLogo.png" alt="VOCES">
        </div>
        <nav class="nav" onload="hightlightMenu()">
            <a class="active" href="home.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="write.php">Write</a>
            <a href="login.html">Log out</a>
        </nav>
    </div>
    <div id="main">
    <div id="main-panel">    
        <div id="greet">
            <div id="welcome">Welcome, <span id="confirm_name"></span></div>    
            <p>Have you checked out these articles?</p>
        </div>
        <div id="top-articles">
            <!-- Below shows the structures of an article card -->
            <!-- <div id="article-card">
                <div id="card-left">
                    <div id="article-thumbnail"></div>
                </div id="card-right">
                    <div id="title"></div>
                    <div id="author"></div>
                    <div id="description"></div>
                    <button id="read-button"></button>
                </div>
            </div>-->

        </div>
        <div id="more-cards">
            <button id="more-card-button">See more posts</button>
        </div>
    </div>
    <div id="right-panel">
        <div id="search-panel">
        <p><input type="text" id="search-bar"><i class="fas fa-search"></i></p>
        </div>
        <p>What's On Your Mind?</p>
        <p>Write Now!</p>
        <div id="calendar"></div>
    </div>
</div>
    <script type = "module" src="./Scripts/homepage.js"></script>
    <div id="test">
        <button id="more-card-button">See more posts</button>
    </div>
    </div>
    <script>
        $(function() {
            $("#calendar").load("calendar.html");
        });
    </script>
</body>
</html>