<?php
require "config/DbPdo.php";

function getConnexion(){
    return DbPdo::pdoConnexion();
}

function getAllTodo(){
    $todos = [];

    $con = getConnexion();
    $query = $con->prepare("SELECT * FROM `todo`");
    $query->execute();

    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($todos, $row);
    }


    return $todos;
}

function createTodo($task, $target_file = null){
    $con = getConnexion();
    $query = $con->prepare("INSERT INTO todo (`id`,`task`,`done`,`imgPath`) VALUES (NULL, :task, false, :imgPath)");
    return $query->execute(array(':task'=>$task, ':imgPath'=> $target_file));
}

function getTodoById($id){
    $con = getConnexion();
    $query = $con->prepare("SELECT * FROM todo WHERE id = :id");
    $query->execute(array(":id"=>$id));
    $todo = $query->fetch(PDO::FETCH_ASSOC);
    return $todo;
}

function updateTodo($id, $task, $imgPath = null, $forceDelete = false){
    $con = getConnexion();
    $query = $con->prepare("UPDATE todo SET `task`= :task WHERE `id`= :id");
    $params = array(":id"=>$id, ":task"=>$task);
    if (!empty($imgPath) && !$forceDelete){
        $todo = getTodoById($id);
        if (!empty($todo['imgPath'])){
            deleteImg($todo['imgPath']);
        }
        $query = $con->prepare("UPDATE todo SET `task`= :task , `imgPath`= :imgPath WHERE `id`= :id");
        $params[":imgPath"] = $imgPath;
    }
    if (empty($imgPath) && $forceDelete){
        $todo = getTodoById($id);
        if (!empty($todo['imgPath'])){
            deleteImg($todo['imgPath']);
        }
        $query = $con->prepare("UPDATE todo SET `task`= :task , `imgPath`= :imgPath WHERE `id`= :id");
        $params[":imgPath"] = $imgPath;
    }

    $result = $query->execute($params);
    return $result;
}

function deleteImg($path){
    if(file_exists($path)){
        unlink($path);
    }
}

function deleteTodo($id){
    $todo = getTodoById($id);
    if (!empty($todo['imgPath'])){
        deleteImg($todo['imgPath']);
    }
    $con = getConnexion();
    $query = $con->prepare("DELETE FROM todo WHERE id = :id");
    $query->execute(array(":id"=>$id));
}

function toggleDone($id, $fait){ // creation de la fonction qui prend 2 params
    $con = getConnexion(); // on se connecete à la BDD
    $params[":id"] = $id; // 1er parametre avec la variable du parametre d'entrée
    $params[":fait"] = $fait; // 2eme voir au dessus
    $query = $con->prepare("UPDATE todo SET `done`= :fait WHERE `id`= :id"); // preparation de la requete

    // execution de la requete avec les parametres definis au dessus
    $result = $query->execute($params);
    return $result;
}















