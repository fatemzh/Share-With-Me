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
        <?php include('parts/nav.inc.php'); ?>
        <header id="home-catalog-hero">
        <div class="carousel">
                <div class="carousel-inner">
                    <!-- First slide -->
                    <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                    <div class="carousel-item">
                        <div id="home-container-header">
                            <div id="home-left-part">
                                <h1>Twilight</h1>
                                <div id="home-stars-review">
                                    <h4>Avis</h4>
                                    <span class="material-symbols-outlined">star</span>
                                    <span class="material-symbols-outlined">star</span>
                                    <span class="material-symbols-outlined">star</span>
                                    <span class="material-symbols-outlined">star</span>
                                    <span class="material-symbols-outlined">star_half</span>
                                </div>
                                <p>
                                    Résumé Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. 
                                </p>
                                <div id="home-see-more">
                                    <a href="./details.php" >Voir plus</a>
                                </div>
                            </div>
                            <div id="home-right-part">
                                <img src="./img/covers/twilight.jpg" alt="Image représentant la couverture du livre" id="home-cover-img">  
                            </div>
                        </div>
                    </div>
                    <!-- Examples Slides -->
                    <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item">
                        <img src="http://fakeimg.pl/2000x800/DA5930/fff/?text=JavaScript">
                    </div>
                    <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item">
                        <img src="http://fakeimg.pl/2000x800/F90/fff/?text=Carousel">
                    </div>
                    <!-- Nav arrows -->
                    <label for="carousel-3" class="carousel-control prev control-1">‹</label>
                    <label for="carousel-2" class="carousel-control next control-1">›</label>
                    <label for="carousel-1" class="carousel-control prev control-2">‹</label>
                    <label for="carousel-3" class="carousel-control next control-2">›</label>
                    <label for="carousel-2" class="carousel-control prev control-3">‹</label>
                    <label for="carousel-1" class="carousel-control next control-3">›</label>
                    <!-- Nav bullets -->
                    <ol class="carousel-indicators">
                        <li>
                            <label for="carousel-1" class="carousel-bullet">•</label>
                        </li>
                        <li>
                            <label for="carousel-2" class="carousel-bullet">•</label>
                        </li>
                        <li>
                            <label for="carousel-3" class="carousel-bullet">•</label>
                        </li>
                    </ol>
                </div>
            </div>
            
        </header>
        <main>
            <h1 id="home-title">Bienvenue sur Share With Me</h1>
            <div id="home-introduction">
                <p>
                    Texte d’introduction et de présentation
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. 
                </p>
                <img id="home-introduction-img" src="./img/covers/introduction.png" alt="Image représentant une paire de lunette sur un livre ouvert ">
            </div>
            <div id="home-latestReleases">
                <h3 id="home-nouveautes-title">Nouveautés</h3>
                <div id="home-latest-bookcard">
                    <?php include('parts/bookCard.inc.php'); ?>
                    <?php include('parts/bookCard.inc.php'); ?>
                    <?php include('parts/bookCard.inc.php'); ?>
                    <?php include('parts/bookCard.inc.php'); ?>
                    <?php include('parts/bookCard.inc.php'); ?>
                </div>
            </div>
            <div id="home-categories">
                <h3 id="home-categories-title">Categories</h3>
                <div id="home-categories-name">
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div>
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div>                    
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div>
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div> 
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div>
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div> 
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div>
                    <div class="home-card-cat">
                        <a href="./catalog.php" class="home-catalog-card">Romance</a>
                    </div> 
                </div>
            </div>
        </main>
        <?php include('parts/footer.inc.php'); ?>
    </body>
</html>