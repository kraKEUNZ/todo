<?php

require "./requires/function.php";

// on récupère les données envoyés par l ajax
$id = $_POST['id'];
$fait = $_POST['fait'];

// appel de la fonction qui va modifier la BDD selon les parametres donnés
toggleDone($id, $fait);



