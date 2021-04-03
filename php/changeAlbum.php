<?php 

    include "db.php";

    $id_album = $_POST["id"];
    $new_name = $_POST["new_name"];

    $sql = 'UPDATE album SET name = "'.$new_name.'" WHERE id_album = "'.$id_album.'"';
    $result = $conn->query($sql);
?>