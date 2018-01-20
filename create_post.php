<?php
    session_start();

    require_once 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Correct" ;
        echo $_POST['eventName'];
        echo $_POST['states'];
        $sqlpostdetails = $pdo->prepare("INSERT INTO event(eventName, eventLocation, eventState, eventDate, eventDesc) VALUES(?, ?, ?, ?, ?)");
        $sqlpostdetails->execute(array( $_POST['eventName'], $_POST['location'], $_POST['states'], $_POST['date'], $_POST['description']));
        
    }else {
        echo "Wrong";
    }
    
    

?>