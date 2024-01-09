<?php

/**
 * 
 * ETML
 * Auteur : Anelisse Corozel
 * Date : 09.01.24
 * Description : Page de vérification pour le formulaire d'ajout d'un ouvrage
 */

include('Database.php');

session_start();

// Création d'une instance de la classe Database
$db = new Database();

// Récupère les donnnées, crée l'autheur s'il n'existe pas et ajoute un nouvel ouvrage dans la BD et affiche la page de catalogue principale, sinon retourne sur la page du formulaire d'ajout pour afficher les erreurs
if (isset($_SESSION["incorrect"]) && $_SESSION["incorrect"] !== "") {
    header("Location: addBook.php");
} else {
    // Vérifie si l'autheur existe déjà, sinon le crée

    // Ajoute l'ouvrage dans la BD
    $db->addBook($_SESSION["title"], $_SESSION["nbPages"], $_SESSION["excerptLink"], $_SESSION["summary"], $_SESSION["editionYear"], $_SESSION["bookCover"], $_SESSION["edithor"],$_SESSION["idUser"]);

    header("Location: catalog.php");
}
?>