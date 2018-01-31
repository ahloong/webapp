<?php 
    session_start();

    require_once 'config.php';

    if (!isset($_SESSION['authenticated'])){
        header("location: /login.php?login=no");   
    }

    $name=$pdo->query ('SELECT * FROM user');

    while ($mmm = $name->fetch()) {
       $dddd = $mmm['userName'];
    }

    $eventID = trim($_SERVER['REQUEST_URI'], '/edit/');
    $sql = $pdo->prepare('SELECT * FROM event WHERE eventID = ?');
    $sql->bindParam(1, $eventID, PDO::PARAM_INT);
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);

    echo $eventID;
?>



<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/main.css" />
    <script src="main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body>
    <header style="text-align:center">
        KKL dont want eat pokemon
    </header>
    <div class="bar">
    <div class="left_button">
        <a class= "bar_word" href="/">Home</a>
    </div>
    <div class="left_button">
        <a class="bar_word active" href="/create">Create</a>    
    </div>
    <div class="empty"></div>
    <div>
        <?php if (isset($_SESSION['authenticated'])) {
                echo'<a class="active bar_word" href="/logout.php">Log Out</a>';
            }else {
                echo '<a class="active bar_word right_button" href="/login.php">Log In</a>';
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

<form class="create_form" action="/edit_post.php" method="post">
        <h1>Edit An Event</h1>
        <label>
        Event Title
        <input type="text" name="eventName" placeholder="Enter the event name" value="<?php echo $sql['eventName'] ?> " autofocus>
        </label>
        <br>
        <br>
        <label>
        Location
        <input type="text" name="location" placeholder="Where is the event held?" value= "<?php echo $sql['eventLocation'] ?>" >
        </label>
        <br>
        <br>
        <label>
        State
        <select name="states" >
            <option value="Penang" <?php if ($sql['eventState'] == 'Penang') echo 'selected'; ?>>Penang</option>
            <option value="Selangor" <?php if ($sql['eventState'] == 'Selagor') echo 'selected'; ?>>Selangor</option>
            <option value="Johor" <?php if ($sql['eventState'] == 'Johor') echo 'selected'; ?>>Johor</option>
            <option value="Sabah" <?php if ($sql['eventState'] == 'Sabah') echo 'selected'; ?>>Sabah</option>
            <option value="Sarawak" <?php if ($sql['eventState'] == 'Sarawak') echo 'selected'; ?>>Sarawak</option>
            <option value="Melaka" <?php if ($sql['eventState'] == 'Melaka') echo 'selected'; ?>>Malacca</option>
            <option value="Perak" <?php if ($sql['eventState'] == 'Perak') echo 'selected'; ?>>Perak</option>
            <option value="Kedah" <?php if ($sql['eventState'] == 'Kedah') echo 'selected'; ?>>Kedah</option>
            <option value="Pahang" <?php if ($sql['eventState'] == 'Pahang') echo 'selected'; ?>>Pahang</option>
            <option value="Kelantan" <?php if ($sql['eventState'] == 'Kelantan') echo 'selected'; ?>>Kelantan</option>
            <option value="Terengganu" <?php if ($sql['eventState'] == 'Terengganu') echo 'selected'; ?>>Terengganu</option>
            <option value="Negeri Sembilan" <?php if ($sql['eventState'] == 'Negeri Sembilan') echo 'selected'; ?>>Negeri Sembilan</option>
            <option value="Perlis" <?php if ($sql['eventState'] == 'Perlis') echo 'selected'; ?>>Perlis</option>
            <option value="Kuala Lumpur" <?php if ($sql['eventState'] == 'Kuala Lumpur') echo 'selected'; ?>>Kuala Lumpur</option>
            <option value="Putrajaya" <?php if ($sql['eventState'] == 'Putrajaya') echo 'selected'; ?>>Putrajaya</option>
            <option value="Labuan" <?php if ($sql['eventState'] == 'Labuan') echo 'selected'; ?>>Labuan</option>
        </select>
        </label>
        <br>
        <br>
        <label>
        Date
        <input type="date" name="date" value= "<?php echo $sql['eventDate'] ?>">
        </label>    
        <br>
        <br>
        Description <br>
        <textarea rows="6" cols="50" name="description" placeholder="More about your event" ><?php echo $sql['eventDesc'] ?> </textarea>
        <br>
        <br>
        <br>
        <input type="submit" value="Edit!">
        <input type="reset" value="Clear">
    </form>
</body>

</html>