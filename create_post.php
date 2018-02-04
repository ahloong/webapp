<?php
    session_start();

    require_once 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $sqlpostdetails = $pdo->prepare("INSERT INTO event(eventName, eventLocation, eventState, eventDate, eventDesc) VALUES(?, ?, ?, ?, ?)");
        $sqlpostdetails->execute(array( $_POST['eventName'], $_POST['location'], $_POST['states'], $_POST['date'], $_POST['description']));
        header("Location: /");
    }else {
        $wrong = "Wrong";
        $index = "/create";
        echo "
            <script type=\"text/javascript\">
                alert('$wrong');
                window.location.href='$index';
            </script>
        ";
    }
    
    

?>