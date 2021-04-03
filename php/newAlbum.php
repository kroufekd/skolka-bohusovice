<?php
    include "db.php";
    $sql = 'INSERT INTO `album` (`name`) VALUES ("'.$_POST['albumName'].'")';
    //echo $sql;
    $result = $conn->query($sql);
    
    header("Location: https://www.zsbohusovice.cz/ms/fotogalerie.php");
?>