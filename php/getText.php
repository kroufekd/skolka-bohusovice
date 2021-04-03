<?php 
    session_start();
    include 'db.php';

    $sql = 'SELECT body FROM text WHERE id_text = "1";';
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
    echo $row["body"];



?>