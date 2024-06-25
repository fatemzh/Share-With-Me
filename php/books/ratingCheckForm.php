<?php

//Inclusion
include('../includes/Database.php');

session_start();

//Instanciation de la base de données
$db = new Database();

// Récupère les paramètres du formulaire
$idBook = $_POST["idBook"];
$idUser = $_POST["idUser"];
$rating = $_POST["rating"];

// Vérifier si l'utilisateur a déjà noté cet ouvrage
$checkResult = $db->checkUserRating($idBook, $idUser);

if (count($checkResult) > 0) {
    // L'utilisateur a déjà noté cet ouvrage, effectuer une mise à jour
    $db->updateBookRating($idBook, $idUser, $rating);
    header("Location: ../../src/pages/details.php?idBook=" . $idBook);
    die();
} else {
    // L'utilisateur n'a pas encore noté cet ouvrage, effectuer une insertion
    $db->addBookRating($idBook, $idUser, $rating);
    header("Location: ../../src/pages/details.php?idBook=" . $idBook);
    die();
}
