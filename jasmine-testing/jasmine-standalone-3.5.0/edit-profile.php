<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Edit profile page"/>
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
    <link href="Styles/edit-profile.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./Scripts/readbutton.js"></script>
    <script src="./Scripts/edit-profile.js"></script>
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
        <h1>Edit Profile</h1>
        <form method='post' action='update-profile.php' id='update-form'>
            <?php 
                include 'display-edit-profile.php';
            ?>   
            <fieldset class="button">
                <button type='reset' id='edit-leave-button' name='profile' onclick='promptUser(this.name)'>Leave</button>
                <button type="submit" id='edit-save-button' name='signup'>Save</button> 
            </fieldset> 
        </form>
    </div>   
</body>
</html>