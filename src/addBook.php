<?php

/**
 * 
 * ETML
 * Auteur : Anelisse Corozel
 * Date : 05.12.23
 * Description : Page d'ajout d'un ouvrage contenant un formulaire permettant d'ajouter un nouvel ouvrage dans la BD
 */

include('Database.php');
include('helper.php');

session_start();
    
// Vérifie si l'utilisateur a accès à cette page
IsUserAllowed();

// Crée une instance de la classe Database
$db = new Database();

// Est-ce qu'un utilisateur est connecté ?
if (!isset($_SESSION["user"])) {
    $isUserConnected = false;
    header('./index.php');
} else {
    $isUserConnected = true;
    $userName = $_SESSION["user"];
}

// Récupère la liste des catégories de la BD
$categories = $db->getAllCategories();

// Récupère la page actuelle
$_SESSION["currentPage"] = "addBook.php";

// Pour afficher un formulaire vide
$bookData = array(
    "title" => "",
    "idCategory" => "",
    "nbPages" => "m",
    "summary" => "",
    "authorFirstname" => "",
    "authorLastname" => "",
    "editor" => "",
    "editionYear" => "",
    "excerptName" => "",
    "coverName" => ""
);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/styles.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <title>Ajouter un ouvrage</title>
    </head>
    <body>
        <header>
            <?php include("./parts/nav.inc.php") ?>
        </header>
        <main>
            <nav id="add-nav" class="breadcrumb">
                <div><a href="profile.php" class="grey">Mon profil</a> /</div>
                <a href="addBook.php"> Ajouter</a>
            </nav>
            <h1>Ajouter un ouvrage</h1>
            <form action="checkBookForm.inc.php" method="post" enctype="multipart/form-data" id="book-form">
                <?php include("parts/form.inc.php");?>
                <p>
                    <input type="submit" value="Ajouter">
                    <button type="button" onclick="document.getElementById('book-form').reset();">Effacer</button>
                </p>
            </form>
            <?php
            // Affiche si le formulaire a été mal rempli
            if (isset($_SESSION["incorrect"]) && $_SESSION["incorrect"] !== "") {
                echo $_SESSION["incorrect"];
                $_SESSION["incorrect"] = "";
            }
            ?>
        </main>
        <?php include("parts/footer.inc.php"); ?>
    </body>
</html>