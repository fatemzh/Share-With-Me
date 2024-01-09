<?php

/**
 * 
 * ETML
 * Auteur : Anelisse Corozel
 * Date : 09.01.24
 * Description : Page de vérification pour le formulaire d'ajout ou de modification d'un ouvrage
 */

session_start();

// Est-ce que le formulaire a été bien rempli
$_SESSION["incorrect"] = "";

// Vérifie que le titre est bien renseigné
if (!isset($_POST["title"]) || empty($_POST["title"]) || !preg_match("/^[a-zA-ZÀ-ÿ0-9\s-]*$/", $_POST["title"])) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un titre !</p>";
}

// Vérifie qu'une catégorie a été sélectionnée
if (!isset($_POST["category"]) || $_POST["category"] == "") {
    $_SESSION["incorrect"] .= "<p>Vous devez sélectionner une catégorie !</p>";
}

// Vérifie que le nombre de page est bien renseigné
if (!isset($_POST["page-number"]) || empty($_POST["page-number"]) || !is_numeric($_POST["page-number"]) || $_POST["page-number"] <= 0) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un nombre de page (plus grand que 0) !</p>";
}

// Vérifie que le résumé est bien renseigné
if (!isset($_POST["summary"]) || empty($_POST["summary"]) || !preg_match("/^[a-zA-ZÀ-ÿ0-9\s-]*$/", $_POST["summary"])) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un résumé !</p>";
}

// Vérifie que le prénom de l'auteur est bien renseigné
if (!isset($_POST["authorFirstname"]) || empty($_POST["authorFirstname"]) || !preg_match("/^[a-zA-ZÀ-ÿ\s-]*$/", $_POST["authorFirstname"])) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un prénom pour l'autheur !</p>";
}

// Vérifie que le nom de famille de l'auteur est bien renseigné
if (!isset($_POST["authorLastname"]) || empty($_POST["authorLastname"]) || !preg_match("/^[a-zA-ZÀ-ÿ\s-]*$/", $_POST["authorLastname"])) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un nom de famille pour l'autheur !</p>";
}

// Vérifie que l'éditeur est bien renseigné
if (!isset($_POST["edithor"]) || empty($_POST["edithor"]) || !preg_match("/^[a-zA-ZÀ-ÿ\s-]*$/", $_POST["edithor"])) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un éditeur !</p>";
}

// Vérifie que l'année d'édition est bien renseignée
if (!isset($_POST["year"]) || empty($_POST["year"]) || !is_numeric($_POST["year"]) || $_POST["year"] < 1000 || $_POST["year"] > 2100) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner une année d'édition !</p>";
}

// Récupère le nom du fichier de l'extrait d'ouvrage et le sépare à chaque "." pour pouvoir vérifier l'extension après
$fileArray = explode('.', $_POST["book-link"]);

// Vérifie que l'URL est bien renseignée
if (!isset($_POST["book-link"]) || empty($_POST["book-link"]) || strtolower(end($fileArray)) != "pdf") {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un extrait PDF !</p>";
}

// Récupère le nom du fichier de l'image de couverture et le sépare à chaque "." pour pouvoir vérifier l'extension après
$coverArray = explode('.', $_POST["book-cover"]);

// Vérifie que l'image de couverture est bien téléchargée
if (!isset($_POST["book-cover"]) || empty($_POST["book-cover"]) || (strtolower(end($coverArray)) != "png" && strtolower(end($coverArray)) != "jpg" && strtolower(end($coverArray)) != "jpeg")) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner une image de couverture (png, jpeg ou jpg) !</p>";
}

// Récupère les données de l'ouvrage
if (isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["page-number"]) && isset($_POST["summary"]) && isset($_POST["authorFirstname"]) && isset($_POST["authorLastname"])&& isset($_POST["edithor"]) && isset($_POST["book-link"]) && isset($_POST["book-cover"])) {
    $_SESSION["title"] = $_POST["title"];
    $_SESSION["category"] = $_POST["category"];
    $_SESSION["nbPages"] = $_POST["page-number"];
    $_SESSION["summary"] = $_POST["summary"];
    $_SESSION["authorFirstname"] = $_POST["authorFirstname"];
    $_SESSION["authorLastname"] = $_POST["authorLastname"];
    $_SESSION["edithor"] = $_POST["edithor"];
    $_SESSION["editionYear"] = $_POST["year"];
    $_SESSION["excerptLink"] = $_POST["book-link"];
    $_SESSION["bookCover"] = $_POST["book-cover"];
}

header("Location: check" . ucfirst($_SESSION["currentPage"]));

?>