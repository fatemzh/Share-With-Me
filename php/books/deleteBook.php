<?php

session_start();

// Inclure le fichier Database.php
include('../includes/Database.php');

$db = new Database();

if (isset($_GET['idBook'])) {
    $idBook = $_GET['idBook'];
    $db->deleteBook($idBook);
    header("Location: ../../src/pages/profile.php");
} else {
    echo "Erreur : ID du livre non fourni.";
}
