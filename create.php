<?php
    session_start();

    require_once 'config.php';

    $error = '';

    if (!isset($_SESSION['authenticated'])){
        header("location: /login.php?login=no");   
    }
    $name=$pdo->query ('SELECT * FROM user');
    while ($mmm = $name->fetch()) {
       $dddd = $mmm['userName'];
    }
?>
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body>
<header>
    <div class="backgroud_overlay"></div>
    <img src="Hamburger_icon.png" alt="Mcdonalds" class='hamburger' onclick="opensesame()">
    <h1 class="title">Event Management System</h1> 
</header>

<!-- drawer -->
<div class="drawer">
<div>
    <?php if (isset($_SESSION['authenticated'])) {
            echo '<div class="bar_word right_button">Hello, ' . $dddd . '</div>';
    }
    ?>
</div>
<a href="/" class="active">Home</a>
<a href="/create">Create</a>
<?php 
    if (isset($_SESSION['authenticated'])) {
        echo '<a href="/logout.php">Log Out</a>';
    } else {
        echo '<a href="/login.php">Log In</a>';
    }
?>
</div>
<div class='kosong' onclick="closesesame()"></div>

<!-- toolbar -->
<div class="bar">
<div class="left_button">
    <a class="active bar_word" href="/">Home</a>
</div>
<div class="left_button">
    <a class="bar_word" href="/create">Create</a>
</div>
<div class="empty"></div>
<div>
    <?php 
        if (isset($_SESSION['authenticated'])) {
            echo'<a class="active bar_word right_button" href="/logout.php">Log Out</a>';
        } else {
            echo '<a class="active bar_word right_button" href="/login.php">Log In</a>';
        }
    ?>
</div>
<div>
    <?php 
        if (isset($_SESSION['authenticated'])) {
            echo '<div class="right_button bar_word">Hello, ' . $dddd . '</div>';
        }
    ?>
</div>

<!-- content -->
</div>
    
    <form class="create_form" action="/create_post.php" method="post">
        <h1>Create An Event</h1>
        <label>
        Event Title
        <input type="text" name="eventName" placeholder="Enter the event name" autofocus>
        </label>
        <br>
        <br>
        <label>
        Location
        <input type="text" name="location" placeholder="Where is the event held?">
        </label>
        <br>
        <br>
        <label>
        State
        <select name="states">
            <option value="Penang" >Penang</option>
            <option value="Selangor" >Selangor</option>
            <option value="Johor">Johor</option>
            <option value="Sabah">Sabah</option>
            <option value="Sarawak">Sarawak</option>
            <option value="Melaka">Malacca</option>
            <option value="Perak">Perak</option>
            <option value="Kedah">Kedah</option>
            <option value="Pahang">Pahang</option>
            <option value="Kelantan">Kelantan</option>
            <option value="Terengganu">Terengganu</option>
            <option value="Negeri Sembilan">Negeri Sembilan</option>
            <option value="Perlis">Perlis</option>
            <option value="Kuala Lumpur">Kuala Lumpur</option>
            <option value="Putrajaya">Putrajaya</option>
            <option value="Labuan">Labuan</option>
        </select>
        </label>
        <br>
        <br>
        <label>
        Date
        <input type="date" name="date">
        </label>    
        <br>
        <br>
        Description <br>
        <textarea rows="6" cols="50" name="description" placeholder="More about your event"></textarea>
        <br>
        <br>
        <br>
        <input type="submit" value="Create!">
        <input type="reset" value="Clear">
    </form>
</body>
</html>