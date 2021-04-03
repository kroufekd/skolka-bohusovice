<?php 
    session_start();
    include 'db.php';
    $text = $_POST["text"];
    $sql = "UPDATE text SET body='".$text."' WHERE id_text = '1';";
    echo $sql;
    $result = $conn -> query($sql);
?>