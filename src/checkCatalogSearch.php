<?php

/**
 * 
 * ETML
 * Auteur : Kathleen Lu
 * Date : 05.01.24
 * Description : Page de vérification de la recherche effectuée dans la barre de recherche de la page catalog.php. Permet de rechercher la liste de tous les ouvrages contenants le(s) mot(s) recherchés dans le titre de l'ouvrage, le nom de l'auteur, ou le résumé de l'ouvrage. La recherche s'effectue parmi les ouvrages de la catégorie si l'utilisateur était sur une page de catégorie, sinon parmi tous les ouvrages de la BD. Le résultat est renvoyé sur la page catalog.php pour être affiché.
 */

include('Database.php');

// Création d'une instance de la classe Database
$db = new Database();


?>