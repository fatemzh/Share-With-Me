<?php

/**
 * 
 * ETML
 * Auteur : Kathleen Lu
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

// Vérifie que le nom de l'auteur est bien renseigné
if (!isset($_POST["authorLastname"]) || empty($_POST["authorLastname"]) || !preg_match("/^[a-zA-ZÀ-ÿ\s-]*$/", $_POST["authorLastname"])) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un nom pour l'autheur !</p>";
}

// Vérifie que l'éditeur est bien renseigné
if (!isset($_POST["editor"]) || empty($_POST["editor"]) || !preg_match("/^[a-zA-ZÀ-ÿ\s-]*$/", $_POST["editor"])) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un éditeur !</p>";
}

// Vérifie que l'année d'édition est bien renseignée
if (!isset($_POST["year"]) || empty($_POST["year"]) || !is_numeric($_POST["year"]) || $_POST["year"] < 1000 || $_POST["year"] > 2100) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner une année d'édition !</p>";
}

// Vérifie que l'URL est bien renseignée
if (!isset($_FILES["excerptPDF"]) || empty($_FILES["excerptPDF"]) || $_FILES["excerptPDF"]["type"] != "application/pdf") {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner un extrait PDF !</p>";
}

// Vérifie que l'image de couverture est bien téléchargée
if (!isset($_FILES["coverImg"]) || empty($_FILES["coverImg"]) || ($_FILES["coverImg"]["type"] != "image/png" && $_FILES["coverImg"]["type"] != "image/jpg" && $_FILES["coverImg"]["type"] != "image/jpeg")) {
    $_SESSION["incorrect"] .= "<p>Vous devez renseigner une image de couverture (png, jpeg ou jpg) !</p>";
}

$_SESSION["pdfExt"] = $_FILES["excerptPDF"]["type"];
$_SESSION["imgExt"] = $_FILES["coverImg"]["type"];

// Récupère les données de l'ouvrage et déplace l'extrait PDF ainsi que l'image de couverture dans le bon répertoire
if (isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["page-number"]) && isset($_POST["summary"]) && isset($_POST["authorFirstname"]) && isset($_POST["authorLastname"]) && isset($_POST["editor"]) && isset($_POST["year"]) && isset($_FILES["excerptPDF"]) && isset($_FILES["coverImg"])) {
    $_SESSION["title"] = $_POST["title"];
    $_SESSION["idCategory"] = $_POST["category"];
    $_SESSION["nbPages"] = $_POST["page-number"];
    $_SESSION["summary"] = $_POST["summary"];
    $_SESSION["authorFirstname"] = $_POST["authorFirstname"];
    $_SESSION["authorLastname"] = $_POST["authorLastname"];
    $_SESSION["editor"] = $_POST["editor"];
    $_SESSION["editionYear"] = $_POST["year"];
    $_SESSION["excerptName"] = $_FILES["excerptPDF"]["name"];
    $_SESSION["coverName"] = $_FILES["coverImg"]["name"];
    
    // Déplace l'extrait PDF
    $pdfSource = $_FILES["excerptPDF"]["tmp_name"];
    $pdfDestination = "excerptPDF/" . $_FILES["excerptPDF"]["name"];
    move_uploaded_file($pdfSource, $pdfDestination);

    // Déplace l'image de couverture
    $coverSource = $_FILES["coverImg"]["tmp_name"];
    $coverDestination = "img/covers/" . $_FILES["coverImg"]["name"];
    move_uploaded_file($coverSource, $coverDestination);
}

header("Location: check" . ucfirst($_SESSION["currentPage"]));

?>