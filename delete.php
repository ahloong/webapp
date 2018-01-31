<?php
    session_start();

    require_once 'config.php';
        $eventID = trim($_SERVER['REQUEST_URI'], '/delete/');
        echo $eventID;
        $postexist = $pdo->prepare('SELECT * FROM event WHERE eventID=?');
        $postexist->bindParam(1, $eventID, PDO::PARAM_INT);
        $postexist->execute();
        $exist = $postexist->fetch(PDO::FETCH_ASSOC);
        if ($exist){
            $sqlpostdetails = $pdo->prepare("DELETE FROM event WHERE eventID = ?");
            $sqlpostdetails->bindParam(1, $eventID, PDO::PARAM_INT);
            $sqlpostdetails->execute();
            echo 'deleted';
        }
        else {
        echo 'no';
    }
?>