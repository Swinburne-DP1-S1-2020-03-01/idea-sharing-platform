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
    <link href="Styles/profile.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type = "module" src="Scripts/profile.js"></script>
    <title>Profile | Idea Sharing</title>
</head>

<body>
    <div id="navbar" >
        <p id="brand">VOCES</p>
        <div id="logo">
            <img src="./Resources/Images/smallLogo.png" alt="VOCES">
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a class="active" href="profile.php">Profile</a>
            <a href="write.php">Write</a>
            <a href="login.html">Log out</a>
        </nav>
    </div>
    <div id="main">
    <div id="user-details">
        <h1>My Profile</h1>
        <!-- <div id="user-card">
        <div class="card-left">
            <img class="avatar" src="./Resources/Images/dummy-avatar.jpg" alt="dummy avatar">
        </div>
        <div class="card-right"> -->
        <!-- <h2 id="username">Dummy username</h2>
        <p>Email: <span id="email"></span></p>
        <p>Joined Since: <span id="join-date"></span></p>
        <p>Published Articles: <span id="num-articles"></span></p> -->
        <?php 
            include 'display-user-info.php';
        ?>
            
    </div>

    <div id="main-panel">    
        <h1>My Articles</h1>
        <div id="top-articles">
            <?php 
                include 'display-my-posts.php';
            ?>
        </div>
        <div id="more-cards">
            <button id="more-card-button">See more posts</button>
        </div>
    </div>
    </div>
    
</body>
</html>