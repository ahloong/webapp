<?php
    session_start();

    require_once 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Correct" ;
        echo $_POST['eventName'];
        echo $_POST['states'];
        $eventID = trim($_SERVER['REQUEST_URI'], '/');
        $postexist = $pdo->prepare('SELECT * FROM event WHERE eventID=?');
        $postexist->bindParam(1, $eventID, PDO::PARAM_INT);
        $postexist->execute();
        $exist = $postexist->fetch(PDO::FETCH_ASSOC);
        if ($exist){
            $sqlpostdetails = $pdo->prepare("UPDATE event SET eventName = :eventName, 
                                                              eventLocation = :eventLocation,
                                                              eventState = :eventState,
                                                              eventDate = :eventDate,
                                                              eventDesc = :eventDesc
                                                              WHERE postid = :postid");
            $sqlpostdetails->execute(array(
                ':eventName' => $_POST['eventName'],
                ':eventLocation' => $_POST['eventLocation'],
                ':eventState' => $_POST['eventState'],
                'eventDate' => $_POST['eventDate'],
                ':eventDesc' => $_POST['eventDesc']
            )); 
        $sqlpostdetails = $pdo->prepare("INSERT INTO event(eventName, eventLocation, eventState, eventDate, eventDesc) VALUES(?, ?, ?, ?, ?)");
        $sqlpostdetails->execute();
        }
        
    }else {
        echo "Wrong";
    }
    
    

?>