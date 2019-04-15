<?php
require "./requires/function.php";

$id = (isset($_POST["id"]) && !empty($_POST["id"])) ? $_POST["id"] : null;

if ($id){
    deleteTodo($id);
}

header("Location: index.php");
exit();