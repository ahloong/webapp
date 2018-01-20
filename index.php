<?php
    session_start();

    require_once 'config.php';
    $name=$pdo->query ('SELECT * FROM user');
    while ($mmm = $name->fetch()) {
       $dddd = $mmm['userName'];
    }
    $sql = 'SELECT eventName,
                eventLocation,
                eventState,
                eventDate,
                eventID
            FROM event
            ORDER BY eventDate';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

    

?>


<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event</title>
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
                echo'<a class="active bar_word right_button" href="/logout.php">Log Out</a>';
            }else {
                echo '<a class="active bar_word right_button" href="/login.php">Log In</a>';
            }
        ?>
    </div>
    <div>
    <?php if (isset($_SESSION['authenticated'])) {
                echo '<div class="right_button bar_word">Hello, ' . $dddd . '</div>';
            }
    ?>
    </div>
</div>
    <div>
        <h1 style="text-align:center">All Event</h1>
        
            <div class="event">
            
                <?php while ($row = $q->fetch()): ?>
                <?php echo '<a class="no_deco" href=/' . htmlspecialchars($row['eventID']) . '>' ?>
                    <div class="event_item">
                        <div class="event_title no_deco">
                            <?php echo htmlspecialchars($row['eventName']) ?>
                        </div>
                        <div class="event_detail">
                            <div class="event_location">
                                <?php echo htmlspecialchars($row['eventLocation']) ?>
                            </div>
                            <div class="event_state">
                                <?php echo htmlspecialchars($row['eventState']) ?>
                            </div>
                            <div class="event_date">
                                <?php echo htmlspecialchars($row['eventDate']) ?>
                            </div>
                        </div>
                    </div>
                <?php echo '</a>' ?>
                <?php endwhile; ?>
            </div>
    </div>
</body>
</html>