<?php
session_start();

require_once 'config.php';

$error = '';

if (isset($_SESSION['authenticated'])) {
    header("location: /index.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];

        if ($myusername == $userName && $mypassword == $password) {
            $_SESSION['authenticated'] = true;
            header("location: /index.php");
        } else {
            $error = 'Oops. Something went wrong.';
        }
    }
}
?>

<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
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
    <a href="/" class="active">Home</a>
    <a href="/create">Create</a>
</div>

<div class='kosong' onclick="closesesame()"></div>

<!-- toolbar -->
<div class="bar">
    <div class="left_button">
        <a class="bar_word" href="/">Home</a>
    </div>
    <div class="left_button">
        <a class="bar_word" href="/create">Create</a>
    </div>
    <div class="empty"></div>
</div>

<!-- content -->
</div>
<p></p>
<form method="post" class="login_form">
    <p class="login_text">Login</p>
    Username
    <input type="text" name="username" autofocus>
    <br>
    <br>
    Password
    <input type="password" name="password">
    <br>
    <br>
    <br>
    <input type="submit" name="Login" class="button">
    <?php
    if ($error) {
        echo '<span>' . $error . '</span>';
    }
    ?>
</form>
</body>
<script>
    var url_string = window.location.href;
    var url = new URL(url_string);
    console.log(url.searchParams.get("login"));
    if (url.searchParams.get("login") === 'no') {
        window.alert("Please Log In");
    }
</script>
</html>