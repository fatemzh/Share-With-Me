<?php

/**
 * 
 * ETML
 * Auteur : Kathleen Lu
 * Date : 05.12.23
 * Description : Page de catalogue du site avec la liste de tous les livres filtrable par catégorie
 */

include('Database.php');

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
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Aventure</a></li>
                    <li><a href="#">Fantasy</a></li>
                    <li><a href="#">Historique</a></li>
                    <li><a href="#">Horreur</a></li>
                    <li><a href="#">Mystère</a></li>
                    <li><a href="#">Romance</a></li>
                    <li><a href="#">Science-Fiction</a></li>
                </ul>
            </nav>

            <section id="catalog">
                <h2>Toutes les catégories</h2>
                <div id="list-container">
                    <?php
                        for ($i = 0; $i < 11; $i++) {
                            include('parts/bookCard.inc.php');
                        }
                    ?>
                </div>
            </section>
        </main>

        <?php include('parts/footer.inc.php'); ?>
    </body>
</html>

