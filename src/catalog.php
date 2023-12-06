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
        <title>Bibliothèque | Catalogue</title>
    </head>

    <body>
        <?php
        include('parts/nav.inc.php');
        ?>
        <header id="catalog-hero">
            <h1>Trouve ton bonheur</h1>
            <form id="search" action="#" method="post">
                <div>
                    <label for="search"></label>
                    <input type="search" name="search" id="search" placeholder="Titre, Auteur, Mot-clé, ...">
                </div>
                <button type="submit" class="btn"><span class="material-symbols-outlined white-icon">search</span></button>
            </form>
        </header>
        
    </body>
</html>


<!DOCTYPE html>
<html>
  <body>
    <div class="catalogue">
      <div class="div">
        <div class="overlap">
          <div class="group"><div class="rectangle"></div></div>
          <div class="frame">
            <div class="div-wrapper"><div class="text-wrapper">Titre, Auteur, Mot-clé, ...</div></div>
            <img class="img" src="img/frame-79.svg" />
          </div>
          <div class="text-wrapper-2">Trouve ton bonheur</div>
        </div>
        <div class="text-wrapper-3">Catégories</div>
        <div class="product">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-2">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-3">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-4">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-5">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-6">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-7">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-8">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="overlap-group">
          <div class="frame-4">
            <div class="text-wrapper-7">Action</div>
            <div class="text-wrapper-6">Aventure</div>
            <div class="text-wrapper-6">Fantasy</div>
            <div class="text-wrapper-6">Historique</div>
            <div class="text-wrapper-6">Horreur</div>
            <div class="text-wrapper-6">Mystère</div>
            <div class="text-wrapper-6">Romance</div>
            <div class="text-wrapper-6">Science-Fiction</div>
          </div>
        </div>
        <div class="product-9">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-10">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-11">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-12">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-13">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-14">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-15">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-16">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-17">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-18">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-19">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-20">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-21">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-22">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-23">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-24">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-25">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-26">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-27">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-28">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-29">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-30">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-31">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-32">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-33">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-34">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-35">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-36">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-37">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-38">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-39">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-40">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-41">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-42">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-43">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-44">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="product-45">
          <div class="rectangle-2"></div>
          <div class="frame-wrapper">
            <div class="frame-2">
              <div class="frame-3">
                <div class="text-wrapper-4">Auteur</div>
                <div class="text-wrapper-5">Titre Xxxxx Xxxxxxx Xxxxx</div>
              </div>
              <div class="text-wrapper-6">Posté par : Pseudo</div>
            </div>
          </div>
        </div>
        <div class="nav-bar-dconnect">
          <div class="nav-gauche">
            <div class="text-wrapper-8">Share With Me</div>
            <div class="links">
              <div class="text-wrapper-9">ACCUEIL</div>
              <div class="text-wrapper-9">CATALOGUE</div>
            </div>
          </div>
          <div class="frame-5">
            <div class="frame-6"><div class="text-wrapper">Pseudo</div></div>
            <div class="frame-6"><div class="text-wrapper">Mot de passe</div></div>
            <div class="frame-7"><div class="text-wrapper-10">Se connecter</div></div>
          </div>
        </div>
        <footer class="footer">
          <div class="overlap-group-2">
            <div class="rectangle-3"></div>
            <div class="text-wrapper-11">Share With Me</div>
            <div class="text-wrapper-12">info@sharewithme.ch</div>
            <p class="p">© 2023 Share With Me. All rights reserved</p>
            <div class="frame-8">
              <div class="text-wrapper-10">ACCUEIL</div>
              <div class="text-wrapper-10">CATALOGUE</div>
              <div class="text-wrapper-10">AJOUTER</div>
            </div>
            <img class="line" src="img/line-2.svg" />
            <div class="text-wrapper-13">Back to top</div>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
