<?php
$identifiant = (isset($_POST['identifiant']) && !empty($_POST['identifiant']) )? $_POST['identifiant']:'';
$password = (isset($_POST['password']) && !empty($_POST['password']) )? $_POST['password']:'';
$deconnexion = (isset($_POST['deconnexion']) && !empty($_POST['deconnexion']) )? $_POST['deconnexion']:null;

if($deconnexion == true && $_SESSION['isConnectec'] === true ){
    session_destroy();
    header('Location: /index.php');
    exit;
}
if($identifiant === 'dev' && $password === 'dev'){
    if ($_SESSION['isConnected'] !== true) {
        session_start([
            'cookie_lifetime' => 86400,
        ]);
        $_SESSION['user'] = $identifiant;
        $_SESSION['isConnected'] = true;
        $_SESSION['timeStamp'] = time();
        header('Location: /admin.php');
        exit;
    }
}

