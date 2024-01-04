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
$userBook = $db->getOneUser($book["fkUser"]);

//Récupération des information de l'auteur de l'ouvrage à partir de son identifiant
$author = $db->getOneAuthor($book["fkAuthor"]);

//Récupération de la catégorie de l'ouvrage à partir de son identifiant
$category = $db->getOneCategory($book["fkCategory"]);
if($book["fkCategory"] === $category["idCategory"]){
    $catName = $category["catName"];
}

//Récupération de la moyenne des avis de l'ouvrage à partir de son identifiant
$ratings = $db->getBookRating($idBook);

//Récupération de la moyenne des avis de l'ouvrage à partir de l'identifiant de l'utilisateur connecté
if($isUserConnected === true){
    $user = $db->getOneUser($_SESSION["idUser"]);
}
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
    <script src="./js/script.js"></script>
  </head>
  <body>
        <header>
            <?php include("./parts/nav.inc.php") ?>
        </header>
        <main>
            <div id="breadcrumb">
                <div><a href="./catalog.php">CATALOGUE</a> /</div>
                <div><a href="./catalog.php?idCategory=<?=$book["fkCategory"];?>"><?=$catName?></a> /</div>
                <p><?=$book["booTitle"]?></p>
            </div>
            <div id="title-detail">
                <h1>Détails de l’ouvrage</h1>
                <?php if ($isUserConnected === true): ?>
                <a href="./modifyBook.php?idBook="<?=$book["idBook"]?>><span class="material-symbols-outlined">edit</span></a>
                <?php endif;?>
            </div>
            <div id="book-details">
                <div id="cover">
                    <img src="./img/covers/<?=$book["booImageURL"]?>" alt="couverture du livre">
                </div>
                <div id="infos">
                    <div id="title-author">
                        <p id="book-title"><?=$book["booTitle"]?></p>
                        <p class="author">Ajouté par</p>
                        <p class="author"><?=$userBook["useLogin"]?></p>
                    </div>
                    <div id="review">
                            <p>Moyenne des avis : </p>
                            <div class="stars">
                                <?php if ($ratings["average"] !== null):?>
                                    <?php for($i = 0; $i < round($ratings["average"], 0); $i++):?>
                                        <span class="material-symbols-outlined etoile">star</span>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <p>Cet ouvrage n'a pas encore été évalué !</p>
                                <?php endif; ?>
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
            <?php if ($isUserConnected === true): ?>
                <p>Evaluez cet ouvrage</p>
                <div id="stars-2">
                    <form action="ratingCheckForm.php" method="post" id="ratingForm">
                        <input type="hidden" name="idBook" value="<?=$book["idBook"]?>">
                        <input type="hidden" name="idUser" value="<?=$user["idUser"]?>">
                        <div class="rating">
                            <input type="radio" name="rating" value="1" id="star1" >
                            <label for="star1"><span class="material-symbols-outlined">star</span></label>

                            <input type="radio" name="rating" value="2" id="star2" >
                            <label for="star2"><span class="material-symbols-outlined">star</span></label>

                            <input type="radio" name="rating" value="3" id="star3" >
                            <label for="star3"><span class="material-symbols-outlined">star</span></label>

                            <input type="radio" name="rating" value="4" id="star4" >
                            <label for="star4"><span class="material-symbols-outlined">star</span></label>

                            <input type="radio" name="rating" value="5" id="star5" >
                            <label for="star5"><span class="material-symbols-outlined">star</span></label>

                            <input type="hidden" name="rating" id="ratingInput" value="">
                        </div>
                    </form>
                </div>
            <?php endif;?>
            </div>
        </main>
        <footer class="footer">
            <? include("./src/parts/footer.inc.php"); ?>
        </footer>
    </body>
</html>
