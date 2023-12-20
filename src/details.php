<?php
/**
 * ETML
 * Auteur: Salma Abdulkadir
 * Date: 13.12.2023
 * Description: Page de détails pour chaque livre.
 */

//Ouverture de la session de l'utilisateur connecté
session_start();

if (!isset($_SESSION["user"]) ) {
    $isUserConnected = false;
} else {
    $isUserConnected = true;
    $userName = $_SESSION["user"];
    $infos = $db->getPersonalInfos($idUser);
}

//Inclusion
include("Database.php");

//Instanciation de la base de données
$db = new Database();

//Récupération de l'identifiant du livre dans l'URL
$idBook = $_GET["idBook"];

//Récupération des information du professeur dans la base de données à partir de son identifiant
$book = $db->getOneBook($idBook);

//Récupération des information de l'utilisateur qui a publié l'ouvrage à partir de son identifiant
$user = $db->getOneUser($book["fkUser"]);

//Récupération des information de l'auteur de l'ouvrage à partir de son identifiant
$author = $db->getOneAuthor($book["fkAuthor"]);

//Récupération de la catégorie de l'ouvrage à partir de son identifiant
$category = $db->getCategory($book["fkCategory"]);
if($book["fkCategory"] === $category["idCategory"]){
    $catName = $category["catName"];
}

//Récupération de la moyenne des avis de l'ouvrage à partir de son identifiant
$ratings = $db->getBookRating($idBook);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'ouvrage</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  </head>
  <body>
        <header>
            <?php include("./parts/nav.inc.php") ?>
        </header>
        <main>
            <div id="breadcrumb">
                <div><a href="./catalog.php">CATALOGUE</a> /</div>
                <div><a href=""><?=$catName?></a> /</div>
                <p><?=$book["booTitle"]?></p>
            </div>
            <div id="title-detail">
                <h1>Détails de l’ouvrage</h1>
                <span class="material-symbols-outlined">edit</span>
            </div>
            <div id="book-details">
                <div id="cover">
                    <img src="" alt="couverture du livre">
                </div>
                <div id="infos">
                    <div id="title-author">
                        <p id="book-title"><?=$book["booTitle"]?></p>
                        <p class="author">Ajouté par</p>
                        <p class="author"><?=$user["useNickname"]?></p>
                    </div>
                    <div id="review">
                            <!-- TODO: logique pour afficher la moyenne evaluation de l'ouvrage -->
                            <p>Moyenne des avis : </p>
                            <div class="stars">
                            <?php for($i = 0, $i < round($rating["average"], 0), $i++){
                                echo "<span class=\"material-symbols-outlined etoile\">star</span>";
                            };?>
                            </div>
                    </div>
                    <p id="summary">
                    <?=$book["booSummary"]?>
                    </p>
                    <div id="infos-1">
                        <div id="catgories-details">
                                <p>Auteur :</p>
                                <p>Editeur :</p>
                                <p>Année d’édition :</p>
                                <p>Nombre de pages :</p>
                                <p>Catégorie :</p>
                        </div>
                        <div id="infos-2">
                                <p><?=$author["autFirstName"]. " " . $author["autLastName"]?></p>
                                <p><?=$book["booEditorName"]?></p>
                                <p><?=$book["booEditionYear"]?></p>
                                <p><?=$book["booNumberPages"]?></p>
                                <p><?=$catName?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="evaluation">
                <p>Evaluez cet ouvrage</p>
                <div id="stars-2">
                    <form action="bookRating.php">
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1"></label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2"></label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3"></label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4"></label>
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5"></label>
                    </form>
                
                
                
                
                
                </div>
            </div>
        </main>
        <footer class="footer">
            <? include("./src/parts/footer.inc.php"); ?>
        </footer>
    </body>
</html>
