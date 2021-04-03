<?php 
    session_start();
    include 'db.php';

    $month = date("m", strtotime($_POST["datum"]));
    
    $sql = 'INSERT INTO news(body, datum, autor, month) VALUES("'.$_POST["body"].'", "'.$_POST["datum"].'", "'.$_SESSION["id_user"].'", '.$month.')';
    
    $result = $conn->query($sql);
    header("Location: https://www.zsbohusovice.cz/ms/novinky.php");

?>