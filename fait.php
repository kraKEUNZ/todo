<?php

require "./requires/function.php";

$id = (isset($_POST["id"]) && !empty($_POST["id"])) ? $_POST["id"] : null;
$state = (isset($_POST["state"])) ? $_POST["state"] : null;
$data = array( "updated" => "error");

if ($id){
    $result = changeStateTodo($id,($state == 'true')? 1:0);
    if($result){
        $todo = getTodoById($id);
        $task_date_updated = $todo["updated_at"];
        $dateUpdated = new DateTime($task_date_updated);
        $todo["updated_at"] = $dateUpdated->format('H:i d/m/Y');
        $data["todo"] = $todo;
    }
    $data["updated"] = $result?"success":"error";
}

header('Content-Type: application/json');
echo json_encode($data);
exit;
// on récupère les données envoyés par l ajax
//$id = $_POST['id'];
//$fait = $_POST['fait'];
//
// appel de la fonction qui va modifier la BDD selon les parametres donnés
//toggleDone($id, $fait);



