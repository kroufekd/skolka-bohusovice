<?php 
    session_start();
    include 'db.php';

    if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
        $result = $conn->query('
            DELETE FROM files WHERE id_file = '.$_GET["q"].'
        ');
        header("Location: https://www.zsbohusovice.cz/ms/ke_stazeni.php");
    } else{
        //header("Location: http://localhost/skolka/ke_stazeni.php");
    }

?>