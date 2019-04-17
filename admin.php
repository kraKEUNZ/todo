<?php
    session_name("Todo List");
    session_start();
    if($_SESSION['isConnected'] !== true ){
        header('Location: /connexion.php');
        exit;
    }
    $page = "admin";

    require "./requires/function.php";
    include "./includes/head.php";
    createHeader($page);
    createContent($page);
    include "./includes/footer.php";