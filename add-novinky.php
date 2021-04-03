<?php
    //$text =  $_POST['text1'];
    $month = $_POST['month'];
    $whole_news = "";

    for ($i=1; $i < 50; $i++) { 
        $tmp = $i + 1;
        if(isset($_POST['text'.$i])){
            if(isset($_POST['text'.$tmp])){
                $text .= "'" . $_POST['text'.$i] . "',";
            }else{
                $text .= "'" . $_POST['text'.$i] . "'";
            }
        }
    }


    $string = file_get_contents('assets/novinky/novinky.json'); //load data from json
    $json_data = json_decode($string, true); //parse text to json
    
    switch($month){
        case "1":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['leden'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;      
        case "2":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['unor'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "3":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['brezen'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "4":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['duben'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "5":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['kveten'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "6":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['cerven'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "7":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['cervenec'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "8":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['srpen'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "9":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['zari'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "10":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['rijen'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "11":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['listopad'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
        case "12":
            for ($i=1; $i < 50; $i++) { 
                $tmp = $i + 1;
                if(isset($_POST['text'.$i])){
                    array_push($json_data['prosinec'], $_POST['text'.$i]); //add new to json  
                }
            }
        break;
    }
    $json_data_string = json_encode($json_data); //parse json to stroing 
    file_put_contents('assets/novinky/novinky.json', $json_data_string);   
    header('Location: novinky.php');

?>