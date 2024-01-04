<?php

/**
 * 
 * ETML
 * Auteur : Kathleen Lu
 * Date : 05.12.23
 * Description : Page de catalogue du site avec la liste de tous les livres filtrable par catégorie
 */

include('Database.php');

// Création d'une instance de la classe Database
$db = new Database();

// Récupère la liste de tous les livres
$allBooks = $db->getAllBooks();

// Récupère la liste de toutes les catégories
$allCategories = $db->getAllCategories();

// Est-ce qu'un utilisateur est connecté ?
if (!isset($_SESSION["user"]) ) {
    $isUserConnected = false;
} else {
    $isUserConnected = true;
    $userName = $_SESSION["user"];
    $infos = $db->getPersonalInfos($idUser);
}

/* echo "<pre>";
var_dump($allBooks);
echo "</pre>"; */

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="./css/styles.css" rel="stylesheet">
        <title>Share With Me | Catalogue</title>
    </head>

    <body>
        <?php include('parts/nav.inc.php'); ?>
        <header id="catalog-hero">
            <nav id="catalog-nav">
                <a href="catalog.php" class="grey">Catalogue /</a>
                <a href="#"> Action</a>
            </nav>
            <section id="catalog-hero-main">
                <h1>Trouve ton bonheur</h1>
                <form id="search" action="#" method="post">
                    <div>
                        <label for="search"></label>
                        <input type="search" name="search" id="search" placeholder="Titre, Auteur, Mot-clé, ...">
                    </div>
                    <button type="submit" class="btn"><span class="material-symbols-outlined white-icon">search</span></button>
                </form>
            </section>
        </header>
        
        <main id="catalog-container">
            <nav id="filter">
                <h2>Catégories</h2>
                <ul>
                    <?php foreach ($allCategories as $category): ?>
                        <li><a href="catalog.php?idCategory=<?= $category["idCategory"] ;?>"><?= $category["catName"] ;?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <section id="catalog">
                <h2>Toutes les catégories</h2>
                <div id="list-container">
                    <?php
                        foreach ($allBooks as $bookKey => $book) {
                            include('parts/bookCard.inc.php');
                        }
                    ?>
                </div>
            </section>
        </main>

        <?php include('parts/footer.inc.php'); ?>
    </body>
</html>

