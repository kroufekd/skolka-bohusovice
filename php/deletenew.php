<?php 
    session_start();
    include 'db.php';

    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
        $result = $conn->query('
            DELETE FROM news WHERE id_new = '.$_GET["q"].'
        ');
        header("Location: https://www.zsbohusovice.cz/ms/novinky.php");
    } else{
        header("Location: https://www.zsbohusovice.cz/ms/novinky.php");
    }

?>