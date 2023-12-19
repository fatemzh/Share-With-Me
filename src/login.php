<?php
include './Database.php';

session_start();

//affecter à $useLogin la valeur de $_POST["useLogin"] s'il existe, sinon une chaîne vide.
$useLogin = $_POST["useLogin"] ?? "";
$usePassword = $_POST["usePassword"] ?? "";

$db = new Database();

// Enregistre le mdp haché dans la base de données
$user = $db->login($useLogin, $usePassword);

// Si le tableau 'user' n'est pas vide, cela signifie que l'utilisateur a bien été trouvé en DB
if ($user) {
    if ($user['usePassword'] === $usePassword) {        
        $_SESSION['user'] = $user;
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