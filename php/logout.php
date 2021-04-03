<?php 
session_start();
unset($_SESSION["id_user"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: https://www.zsbohusovice.cz/ms/index.php");


?>