<?php 
    include "db.php";

    $id_vyuka = $_GET["q"];

    $sql = '
        DELETE FROM dist_vyuka WHERE id_vyuka = "'.$id_vyuka.'"
    ';
    
    $result = $conn->query($sql);
    
    header("Location: https://www.zsbohusovice.cz/ms/fotogalerie.php");
?>