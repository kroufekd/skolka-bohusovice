<?php 
    include "db.php";

    $id_album = $_GET["q"];

    $sql = '
        DELETE FROM photos WHERE album = "'.$id_album.'"
    ';
    $sql2 = '
        DELETE FROM album WHERE id_album = "'.$id_album.'"
    ';
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    header("Location: https://www.zsbohusovice.cz/ms/fotogalerie.php");
?>