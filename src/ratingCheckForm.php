<?php
/**
 * ETML
 * Auteur: Salma Abdulkadir
 * Date: 27.12.2023
 * Description: Ajoute la nouvelle note à la base de données avec l'id de l'utilisateur et du livre
 */

//Inclusion
include("Database.php");

//Instanciation de la base de données
$db = new Database();

// Traitement du formulaire) 
$idBook = $_POST["idBook"];
$idUser = $_POST["idUser"];
$rating = $_POST["rating"];

// Vérifier si l'utilisateur a déjà noté cet ouvrage
$checkResult = $db->checkUserRating($idBook, $idUser);

if (count($checkResult) > 0) {
    // L'utilisateur a déjà noté cet ouvrage, effectuer une mise à jour
    $db->updateBookRating($idBook, $idUser,$rating);
    header("Location: ./details.php?idBook=" . $idBook . "");
    die();
} else {
    // L'utilisateur n'a pas encore noté cet ouvrage, effectuer une insertion
    $db->addBookRating($idBook, $idUser, $rating);
    header("Location: ./details.php?idBook=" . $idBook . "");
    die();
}
?>