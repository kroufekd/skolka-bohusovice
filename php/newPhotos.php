<?php 
    include "db.php";

    /*$target_dir = "gallery/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $file_name = $_FILES["fileToUpload"]["name"];
    $file = $_FILES["fileToUpload"]["tmp_name"];
    
    
    if(move_uploaded_file($file, $target_file)){ 
        $sql = '
        INSERT INTO photos (album, path, name) VALUES ("'.$_POST["album"].'","php/'.$target_file.'","'.$file_name.'" )';
        $result = $conn->query($sql);
    }*/

    $file_name = $_FILES["fileToUpload"]["name"];
    $file_type = $_FILES["fileToUpload"]["type"];
    $temp_name = $_FILES["fileToUpload"]["tmp_name"];
    $file_size = $_FILES["fileToUpload"]["size"];
    $error = $_FILES["fileToUpload"]["error"];


    
    function compress_image($source_url, $destination_url, $quality){
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
        imagejpeg($image, $destination_url, $quality);
    }

    $sql = 'SELECT * FROM photos WHERE name = "'.$file_name.'"';
    $result = $conn->query($sql);
    
    if (file_exists("gallery/".basename($_FILES["fileToUpload"]["name"])) && mysqli_num_rows($result) == 0) { //pokud je img na serveru ale ne v databazi
        $sql = '
        INSERT INTO photos (album, path, name) VALUES ("'.$_POST["album"].'","php/gallery/'.$file_name.'","'.$file_name.'" )';
        $result = $conn->query($sql);
        header("Location: https://www.zsbohusovice.cz/ms/fotogalerie.php");
    }else if(file_exists("gallery/".basename($_FILES["fileToUpload"]["name"])) && mysqli_num_rows($result) != 0){ //soubor existuje i v databazi i na serveru
        echo "soubor je už jednou nahraný";
    }else if (($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/png") || ($file_type == "image/pjpeg")){
        $filename = compress_image($temp_name, "gallery/" . $file_name, 50);
        $sql = '
        INSERT INTO photos (album, path, name) VALUES ("'.$_POST["album"].'","php/gallery/'.$file_name.'","'.$file_name.'" )';
        $result = $conn->query($sql);
        header("Location: https://www.zsbohusovice.cz/ms/fotogalerie.php");
    }
?>