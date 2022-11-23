<?php
error_reporting(E_ERROR | E_PARSE);
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>