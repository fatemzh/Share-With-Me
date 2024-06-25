<?php

include('../includes/Database.php');

session_start();

// Création d'une instance de la classe Database
$db = new Database();

// Récupère les données, crée l'auteur s'il n'existe pas et ajoute un nouvel ouvrage dans la BD et affiche la page de catalogue principale, sinon retourne sur la page du formulaire d'ajout pour afficher les erreurs
if (isset($_SESSION["incorrect"]) && $_SESSION["incorrect"] !== "") {
    header("Location: ../../src/pages/addBook.php");
} else {
    // Récupère l'auteur
    $author = $db->getAuthor($_SESSION["authorLastname"], $_SESSION["authorFirstname"]);

    // Vérifie si l'auteur existe déjà et récupère son ID, sinon le crée et récupère son ID
    if (!empty($author)) {
        $idAuthor = $author["idAuthor"];
    } else {
        $db->addAuthor($_SESSION["authorLastname"], $_SESSION["authorFirstname"]);
        $newAuthor = $db->getAuthor($_SESSION["authorLastname"], $_SESSION["authorFirstname"]);
        $idAuthor = $newAuthor["idAuthor"];
    }

    // Ajoute l'ouvrage dans la BD
    $db->addBook($_SESSION["title"], $_SESSION["nbPages"], $_SESSION["excerptName"], $_SESSION["summary"], $_SESSION["editionYear"], $_SESSION["coverName"], $_SESSION["editor"], $_SESSION["idUser"], $idAuthor, $_SESSION["idCategory"]);

    header("Location: ../../src/pages/catalog.php");
}
