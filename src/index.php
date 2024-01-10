<?php
    /**
     * 
     * ETML
     * Auteur : Fatem Abid
     * Date : 05.12.23
     * Description : Page d'accueil du site présentant les 5 derniers livres ajoutés, l'utilité du site, ainsi que les catégories
     *               de livres présents sur le site
     */

    // Démarre la session
    session_start();
    
    // Au départ, aucun utilisateur n'est connecté
    if (!isset($_SESSION["isConnected"])) {
        $_SESSION["isConnected"] = false;
    }

    // Inclut le fichier Database.php et crée une instance
    include './Database.php';
    $db = new Database();
    
    // Vérifie si l'utilisateur est connecté
    $isUserConnected = isset($_SESSION["user"]);

    if (!$isUserConnected) {
        $isUserConnected = false;
    } else {
        $isUserConnected = true;
        $userName = $_SESSION["user"];
    }
    
    // Récupère l'id du livre à afficher
    $idBook = isset($_GET["idBook"]) ? $_GET["idBook"] : null;

    // Récupère les 5 derniers ouvrages rajoutés à la DB
    $newBooks = $db->getNewBooks();

    // Récupère la liste de toutes les catégories triées par ordre alphabétique
    $categories =  $db->getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <link href="./css/styles.css" rel="stylesheet">
    <title>Accueil</title>
    </head>
    <body>
        <!-- Barre de navigation -->
        <?php include('parts/nav.inc.php'); ?>
        <header id="home-catalog-hero">
            <!-- Carousel des 5 nouveautés -->
            <div class="carousel">
                <div class="carousel-inner">
                    <?php foreach ($newBooks as $index => $book): ?>
                        <!-- Slide individuel -->
                        <input class="carousel-open" type="radio" id="carousel-<?= $index + 1 ?>" name="carousel" checked="true" aria-hidden="true" hidden="">
                        <div class="carousel-item">
                            <div id="home-container-header">
                                <div id="home-left-part">
                                    <h1>
                                        <?= $book['booTitle'] ?>
                                    </h1>
                                    <p>
                                        <?= $book['booSummary'] ?>
                                    </p>
                                    <!-- Lien "voir plus" pour les utilisateurs connectés -->
                                    <?php if ($isUserConnected === true) : ?>                     
                                        <div id="home-see-more">
                                            <a href="./details.php?idBook=<?= $book["idBook"]; ?>">Voir plus</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div id="home-right-part">
                                    <img src="./img/covers/<?=$book['booImageURL'] ?>" alt="Couverture du livre <?= $book['booTitle'] ?>" id="home-cover-img">  
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
            <!-- Fleche de contrôles de la navigation du carousel 
                 Slide 1 -->
            <label for="carousel-5" class="carousel-control prev control-1">‹</label>
            <label for="carousel-2" class="carousel-control next control-1">›</label>
            <!-- Slide 2 -->
            <label for="carousel-1" class="carousel-control prev control-2">‹</label>
            <label for="carousel-3" class="carousel-control next control-2">›</label>
            <!-- Slide 3 -->
            <label for="carousel-2" class="carousel-control prev control-3">‹</label>
            <label for="carousel-4" class="carousel-control next control-3">›</label> 
            <!-- Slide 4 -->
            <label for="carousel-3" class="carousel-control prev control-4">‹</label>
            <label for="carousel-5" class="carousel-control next control-4">›</label>
            <!-- Slide 5 -->
            <label for="carousel-4" class="carousel-control prev control-5">‹</label>
            <label for="carousel-1" class="carousel-control next control-5">›</label>
                </div>
            </div>            
        </header>
        <main>
            <!-- Présentation du site -->
            <h1 id="home-title">Bienvenue sur Share With Me</h1>
            <div id="home-introduction">
                <div>
                    <p>Sur ce site vous trouverez les lectures, et appréciations de nos utilisateurs sur les livres qu'ils ont lu. De la romance, à la science-fiction en passant par la poésie, 8 genres de littératures sont couverts. Ce site est une plateforme pour ceux et celles qui lisent et qui aiment partager leurs lectures.</p>
                    <p>En tant qu'utilisateur vous pouvez ajouter un des livres que vous souhaitez partager en renseignant ses informations, vous pourrez également lui donner une évaluation, modifier ses informations, ou encore le supprimer, depuis votre page profile. En tant qu'utilisateur, et visiteur vous pouvez également consulter le catalogue des ouvrages publiés, pour vous informer et vous inspirer.</p>
                </div>
                <img id="home-introduction-img" src="./img/covers/introduction.png" alt="Image représentant une paire de lunette sur un livre ouvert ">
            </div>
            <!-- Affichage des nouveautés -->
            <div id="home-latestReleases">
                <h3 id="home-nouveautes-title">Nouveautés</h3>
                <div id="home-latest-bookcard">
                    <?php foreach ($newBooks as $book): ?>
                        <?php include('parts/bookCard.inc.php'); ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Affichage des catégories -->
            <div id="home-categories">
                <h3 id="home-categories-title">Catégories</h3>
                <div id="home-categories-name">
                    <?php foreach ($categories as $category): ?>
                    <div class="home-card-cat">
                        <a href="./catalog.php?idCategory=<?= $category["idCategory"]; ?>" class="home-catalog-card"><?= $category["catName"];?></a>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <?php include('parts/footer.inc.php'); ?>
    </body>
</html>