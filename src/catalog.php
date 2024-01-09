<?php

/**
 * 
 * ETML
 * Auteur : Kathleen Lu
 * Date : 05.12.23
 * Description : Page de catalogue du site avec la liste de tous les ouvrages filtrable par catégorie
 */

include('Database.php');

// Création d'une instance de la classe Database
$db = new Database();

// Vérifie si l'utilisateur est connecté
$isUserConnected = isset($_SESSION["user"]);

if (!$isUserConnected) {
    $isUserConnected = false;
} else {
    $isUserConnected = true;
    $userName = $_SESSION["user"];
}

// Récupère la liste de tous les livres
$allBooks = $db->getAllBooks();

// Récupère la liste de toutes les catégories
$allCategories = $db->getAllCategories();

// Vérifie s'il s'agit d'une page avec une catégorie spécifique, et récupère la catégorie actuelle ainsi que tous ses ouvrages
if (isset($_GET["idCategory"])) {
    $currentCategory = $db->getOneCategory($_GET["idCategory"]);
    $categoryBooks = $db->getCategoryBooks($_GET["idCategory"]);
}

// Si une recherche a été effectuée avec la barre de recherche, récupère les ouvrages correspondants et vérifie si la recherche doit être effectuée dans la catégorie sélectionnée.
// La recherche doit s'effectuer parmi les ouvrages de la catégorie
if (isset($_GET["idCategory"]) && isset($_POST["search"])) {
    $searchedBooks = $db->getSearchBooksInCategory($_POST["search"], $_GET["idCategory"]);
}
// La recherche doit s'effectuer parmi tous les ouvrages de la BD
else if (!isset($_GET["idCategory"]) && isset($_POST["search"])) {
    $searchedBooks = $db->getSearchBooks($_POST["search"]);
}
// Aucun résultat
else {
    $searchedBooks = array();
}

/* echo "<pre>";
var_dump($categoryBooks);
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
            <!-- Affiche la barre de navigation du catalogue s'il s'agit d'une page de catégorie -->
            <?php if (isset($_GET["idCategory"])): ?>
                <nav id="catalog-nav" class="breadcrumb">
                    <div><a href="catalog.php" class="grey">Catalogue</a> / </div>
                    <a href="catalog.php?idCategory=<?= $currentCategory["idCategory"]; ?>"><?= $currentCategory["catName"]; ?></a>
                </nav>
            <?php endif; ?>
            <section id="catalog-hero-main">
                <h1>Trouve ton bonheur</h1>
                <!-- Recherche d'un ouvrage parmi tous ou parmi la catégorie sélectionnée -->
                <?php if (isset($_GET["idCategory"])) : ?>
                <form id="search" action="catalog.php?idCategory=<?= $_GET["idCategory"]; ?>" method="post">
                <?php else : ?>
                <form id="search" action="catalog.php" method="post">
                <?php endif; ?>
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
                <h3>Catégories</h3>
                <ul>
                    <!-- Affiche toutes les catégories par ordre alphabétique -->
                    <?php foreach ($allCategories as $category): ?>
                        <!-- Souligne la catégorie actuelle s'il s'agit d'une page de catégorie -->
                        <li><a <?php if (isset($_GET["idCategory"]) && $category["idCategory"] == $_GET["idCategory"]): ?>
                            class="active-category"
                        <?php endif; ?>
                        href="catalog.php?idCategory=<?= $category["idCategory"] ;?>"><?= $category["catName"] ;?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <section id="catalog">
                <!-- Si une recherche a été effectuée, affiche un titre concernant la recherche, sinon affiche le nom de la catégorie sélectionnée, sinon affiche "Toutes les catégories" -->
                <?php
                if (isset($_POST["search"])) {
                    echo '<h2>Résultats pour la recherche "' . $_POST["search"] . '"';
                    
                    // Affiche la catégorie sélectionnée
                    if (isset($_GET["idCategory"])) {
                        echo ' dans la catégorie "' . $currentCategory["catName"] . '"';
                    }
                } elseif (isset($_GET["idCategory"])) {
                    echo '<h2 class="uppercase">' . $currentCategory["catName"];
                } else {
                    echo '<h2 class="uppercase">' . 'Toutes les catégories';
                }
                ?>    
                </h2>
                <div id="list-container">
                    <!-- S'il y a eu une recherche, affiche les ouvrages du résultat de recherche, sinon affiche les ouvrages de la catégorie sélectionnées, sinon affiche tous les ouvrages -->
                    <?php
                    if (isset($_POST["search"])) {
                        // Affiche les ouvrages de la recherche, sinon affiche qu'il n'y a pas de résultat pour la recherche
                        if (!empty($_POST["search"] && !empty($searchedBooks))) {
                            foreach ($searchedBooks as $bookKey => $book) {
                                include('parts/bookCard.inc.php');
                            }
                        } else {
                            echo "<p>Il n'y a pas de résultats pour cette recherche.</p>";
                        }
                    } elseif (isset($_GET["idCategory"])) {
                        // Affiche les ouvrages de la catégories, sinon affiche "Cette catégorie ne contient aucun ouvrage actuellement."
                        if (!empty($categoryBooks)) {
                            foreach ($categoryBooks as $bookKey => $book) {
                                include('parts/bookCard.inc.php');
                            }
                        } else {
                            echo "<p>Cette catégorie ne contient aucun ouvrage actuellement.</p>";
                        }
                    } else {
                        foreach ($allBooks as $bookKey => $book) {
                            include('parts/bookCard.inc.php');
                        }
                    }
                    ?>
                </div>
            </section>
        </main>

        <?php include('parts/footer.inc.php'); ?>
    </body>
</html>

