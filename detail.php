<?php
    session_start();
    
    require_once 'config.php';

    $name=$pdo->query ('SELECT * FROM user');

    while ($mmm = $name->fetch()) {
        $dddd = $mmm['userName'];
     }
    // $getnum =$_SERVER['REQUEST_URI'];
    // $sql = 'SELECT eventName,
    //             eventLocation,
    //             eventState,
    //             eventDate,
    //             eventID
    //         FROM event
    //         where eventID = $getnum';
    // $pdo->prepare($sql);
    // $sql->execute;

    $eventID = trim($_SERVER['REQUEST_URI'], '/');
    $sql = $pdo->prepare('SELECT * FROM event WHERE eventID = ?');
    $sql->bindParam(1, $eventID, PDO::PARAM_INT);
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);  

    if(!$sql) {
        header("location: /index.php");  
    }
?>


<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body>
    <header>
        KKL dont want eat pokemon
    </header>
    <div class="bar">
    <div class="left_button">
        <a class="active bar_word" href="/">Home</a>
    </div>
    <div class="left_button">
        <a class="bar_word" href="/create">Create</a>    
    </div>
    <div class="empty"></div>
    <div>
        <?php if (isset($_SESSION['authenticated'])) {
                echo'<a class="active bar_word" href="/logout.php">Log Out</a>';
            }else {
                echo '<a class="active bar_word" href="/login.php">Log In</a>';
            }
        ?>
    </div>
    <div>
    <?php if (isset($_SESSION['authenticated'])) {
                echo '<div class="bar_word right_button">Hello, ' . $dddd . '</div>';
            }
    ?>
    </div>
</div>
    <div class='event_detail'>
        <div class='event_name_desc'>
            <h1><?php echo $sql['eventName'] ?></h1>
            <p><?php echo $sql['eventDesc'] ?></p>
        </div>
        <div class='event_loc_time'>
            <p><?php echo $sql['eventLocation'] . $sql['eventDate'] ?></p>
        </div>
    </div>
</body>
</html>