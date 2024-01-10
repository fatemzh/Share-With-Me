<?php

    /* ETML
    * Auteur : Fatem Abid
    * Date : 19.12.23
    * Description : Page de gestion de la connexion de l'utilisateur
    */

    // Démarre la session
    session_start();

    // Inclut le fichier Database.php et crée une instance
    include './Database.php';
    $db = new Database();

    // Récupère le login et mot de passe saisi par l'utilisateur dans le formulaire de connexion
    $useLogin = $_POST["useLogin"] ?? "";
    $usePassword = $_POST["usePassword"] ?? "";

    // Récupère les login et mots de passe utilisateurs de la DB
    $user = $db->login($useLogin); 

    // Vérifie que les données de l'utilisateur ont été récupérées
    if ($user) {
        // Vérifie que le mot de passe saisi et celui en DB correspondent
        if (password_verify($usePassword, $user['usePassword'])) {       
            $_SESSION["isConnected"] = true; 
            $_SESSION['user'] = $user;
            $_SESSION['idUser'] = $user['idUser']; 
            header("Location: ./index.php");
            exit();
        } else {
            echo "Mot de passe incorrect, veuillez saisir un mot de passe valide";
            die();
        }
    } else {
        $_SESSION["isConnected"] = false;
        echo ("Authentification incorrecte, veuillez saisir un login valide.");
        die();
    }

?>