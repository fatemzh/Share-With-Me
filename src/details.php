<?php 
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'ouvrage</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  </head>
  <body>
        <header>
            <?php include("./parts/nav.inc.php") ?>
        </header>
        <main>
            <div id="breadcrumb">
                <div><a href="./catalog.php">CATALOGUE</a> /</div>
                <div><a href="">ROMANCE</a> /</div>
                <p>Make it Happen : Surrender Your Fear. Take the Leap. Live on Purpose.</p>
            </div>
            <div class="title">
                <h1>Détails de l’ouvrage</h1>
                <span class="material-symbols-outlined">edit</span>
            </div>
            <div id="book-details">
                <div class="cover">
                    <img src="" alt="couverture du livre">
                </div>
                <div class="infos">
                    <div class="title-author">
                        <p class="book-title">Make it Happen : Surrender Your Fear. Take the Leap. Live on Purpose.</p>
                        <p class="author">Ajouté par</p>
                        <p class="author">XXXXXXXXX</p>
                    </div>
                    <div class="review">
                            <p>Moyenne des avis : 4</p>
                            <div class="stars">
                                <img class="star" src="img/star-12.svg" alt="étoile">
                                <img class="star" src="img/star-12.svg" alt="étoile">
                                <img class="star" src="img/star-12.svg" alt="étoile">
                                <img class="star" src="img/star-12.svg" alt="étoile">
                                <img class="star" src="img/star-11.svg" alt="étoile">
                            </div>
                    </div>
                    <p id="summary">
                        Lorem ipsum dolor sit amet consectetur. Sed ornare praesent enim elementum tincidunt viverra ipsum. Amet
                        orci volutpat in morbi senectus enim est consectetur sodales. Lacus amet orci elementum sed morbi elit
                        viverra risus. Et urna semper blandit et venenatis nulla adipiscing amet.
                    </p>
                    <div id="infos-1">
                        <div id="catgories-details">
                                <p>Auteur</p>
                                <p>Editeur</p>
                                <p>Année d’édition</p>
                                <p>Nombre de pages</p>
                                <p>Catégorie</p>
                        </div>
                        <div id="infos-2">
                                <p>XXXXXXXXXXX</p>
                                <p>XXXXXXXXX</p>
                                <p>2023</p>
                                <p>245</p>
                                <p>Fiction</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="evaluation">
                <p>Evaluez cet ouvrage</p>
                <div id="stars-2">
                    <img class="star" src="" alt="étoile">
                    <img class="star" src="" alt="étoile">
                    <img class="star" src="" alt="étoile">
                    <img class="star" src="" alt="étoile">
                    <img class="star" src="" alt="étoile">
                </div>
            </div>
        </main>
        <footer class="footer">
            <? include("./src/parts/footer.inc.php"); ?>
        </footer>
    </body>
</html>
