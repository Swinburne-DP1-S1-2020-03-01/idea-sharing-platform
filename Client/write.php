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
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.0.0/quill.bubble.css" rel="stylesheet">
    <link href="Styles/main.css" rel="stylesheet"/>
    <link href="Styles/write.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <title>Create an article!</title>
</head>

<body>
    <div id="navbar" >   
        <p id="brand">VOCES</p>
        <div id="logo">
            <img src="./Resources/Images/smallLogo.png" alt="VOCES">
        </div>
        <nav class="nav" onload="hightlightMenu()">
            <a href="home.php">Home</a>
            <a href="profile.php">Profile</a>
            <a class="active" href="write.php">Write</a>
            <a href="login.html">Log out</a>
        </nav>
    </div>
    <div id="main">  
            <div id="greet">
                <p class="welcome">Create an article</p>    
                <p class="subwelcome">Put your idea here</p>
            </div>
            <div id="text-editor">
            </div>
            <div id="button-bar">
                <span> All articles will be saved as draft </span>
                <button id="save-button">Save</button>
                <button id="leave-button">Leave</button>
            </div>
        </div>
    </div>
</body>
<script src="./Scripts/write.js"></script>
</html>