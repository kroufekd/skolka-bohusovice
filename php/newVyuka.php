<?php
    include "db.php";
    $sql = "INSERT INTO `dist_vyuka` (`file`, `name`, `text`) VALUES ('".$_POST["vyukaSoubor"]."', '".$_POST["vyukaName"]."', '".$_POST["vyukaText"]."')";
    //echo $sql;
    $result = $conn->query($sql);
    
    header("Location: https://www.zsbohusovice.cz/ms/distancni_vyuka.php");
?>