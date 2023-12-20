<?php
include './Database.php';

session_start();

$useLogin = $_POST["useLogin"] ?? "";
$usePassword = $_POST["usePassword"] ?? "";

$db = new Database();

$user = $db->login($useLogin, $usePassword);

if ($user) {
    if ($user['usePassword'] === $usePassword) {        
        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user['idUser']; 
        header("Location: index.php");
        exit();
    } else {
        echo "Mot de passe incorrect";
        die();
    }
} else {
    var_dump("Problème à l'authentification");
    die();
}

?>