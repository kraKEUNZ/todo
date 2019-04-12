<?php
include 'db.php'; // inclusion de notre fichier avec les elements de connexion
class DbPdo { // creation d'une class
    public static function pdoConnexion(){ // execution de notre method sans instancier la class
        $mysql = "mysql:host=".HOST.";port=".PORT.";dbname=".DBNAME.";"; //variable php avec les elements de connexion
        try{ //instruction regroupant
            $connexion = new PDO($mysql, USER, PWD);
            $connexion->exec("SET NAMES utf8");
        }catch(Exception $exception){ //d'autre instruction
            echo 'N° error :'.$exception->getCode().' - '; // a executer et definit une réponse si l'une des instructions
            echo 'Error :'.$exception->getMessage(); // provoque une exception
            die();
        }
        return $connexion;
    }
}
