<?php

    /* ETML
    * Auteur : Fatem Abid
    * Date : 19.12.23
    * Description : Page de gestion de la déconnexion de l'utilisateur
    */

    session_start();
    session_destroy();
    header("Location: index.php");
    die();
?>
