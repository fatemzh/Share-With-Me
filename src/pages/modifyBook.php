<?php

include('../../php/includes/Database.php');
include('../../php/includes/helper.php');

session_start();

// Vérifie si l'utilisateur a accès à cette page
IsUserAllowed();

// Crée une instance de la classe Database
$db = new Database();

// Est-ce qu'un utilisateur est connecté ?
if (!isset($_SESSION["user"])) {
    $isUserConnected = false;
} else {
    $isUserConnected = true;
    $userName = $_SESSION["user"];
}

// Récupère la page actuelle
$_SESSION["currentPage"] = "modifyBook.php";

// Récupère l'ID de l'ouvrage
if (isset($_GET["idBook"])) {
    $_SESSION["idBook"] = $_GET["idBook"];
}

// Récupère l'ouvrage sélectionné
$book = $db->getOneBook($_SESSION["idBook"]);

// Récupère l'auteur de l'ouvrage sélectionné
$author = $db->getOneAuthor($book["fkAuthor"]);

// Récupère la liste des catégories de la BD
$categories = $db->getAllCategories();

// Récupère les informations de l'ouvrage pour pouvoir les afficher dans le formulaire
$bookData = array(
    "title" => $book["booTitle"],
    "idCategory" => $book["fkCategory"],
    "nbPages" => $book["booNumberPages"],
    "summary" => $book["booSummary"],
    "authorFirstname" => $author["autFirstName"],
    "authorLastname" => $author["autLastName"],
    "editor" => $book["booEditorName"],
    "editionYear" => $book["booEditionYear"],
    "excerptName" => $book["booExcerpt"],
    "coverName" => $book["booImageURL"]
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Modifier un ouvrage</title>
</head>

<body>
    <header>
        <?php include("../../php/includes/nav.php") ?>
    </header>
    <main>
        <nav id="add-nav" class="breadcrumb">
            <div><a href="../../src/pages/profile.php" class="grey">Mon profil</a> /</div>
            <a href="modifyBook.php"> Modifier</a>
        </nav>
        <h1>Modifier un ouvrage</h1>
        <?php
        // Affiche si le formulaire a été mal rempli
        if (isset($_SESSION["incorrect"]) && $_SESSION["incorrect"] !== "") {
            echo $_SESSION["incorrect"];
            $_SESSION["incorrect"] = "";
        }
        ?>
        <form action="../../php/books/checkModifyBook.php" method="post" enctype="multipart/form-data" id="book-form">
            <?php include("../components/form.php"); ?>
            <p>
                <input type="submit" value="Modifier">
            </p>
        </form>
    </main>
    <?php include("../../php/includes/footer.php"); ?>
</body>

</html>