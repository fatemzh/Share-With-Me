<?php

include('../includes/Database.php');

session_start();

// Création d'une instance de la classe Database
$db = new Database();

// Si aucune erreur, met à jour les données de l'ouvrage dans la BD et affiche la page de détails de l'ouvrage, sinon retourne sur la page du formulaire de modification pour afficher les erreurs
if (isset($_SESSION["incorrect"]) && $_SESSION["incorrect"] !== "") {
    header("Location: ../../src/pages/modifyBook.php?idBook=" . $_SESSION["idBook"]);
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

    // Modifie l'ouvrage dans la BD
    $db->modifyBook($_SESSION["idBook"], $_SESSION["title"], $_SESSION["nbPages"], $_SESSION["excerptName"], $_SESSION["summary"], $_SESSION["editionYear"], $_SESSION["coverName"], $_SESSION["editor"], $_SESSION["idUser"], $idAuthor, $_SESSION["idCategory"]);

    header("Location: ../../src/pages/details.php?idBook=" . $_SESSION["idBook"]);
}
