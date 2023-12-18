<?php
include '../Database.php';

//affecter à $useLogin la valeur de $_POST["useLogin"] s'il existe, sinon une chaîne vide.
$useLogin = $_POST["useLogin"] ?? "";
$usePassword = $_POST["usePassword"] ?? "";

$db = new Database();

/*
$hashedPassword = password_hash('user', PASSWORD_DEFAULT);
var_dump($hashedPassword);
die();
*/

// Enregistre le mdp haché dans la base de données
$user = $db->login($useLogin, $usePassword);

// Si le tableau 'user' n'est pas vide, cela signifie que l'utilisateur a bien été trouvé en DB
if ($user) {
    if (password_verify($usePassword, $user['usePassword'])) {
        
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