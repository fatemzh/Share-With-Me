<?php
// Démarre la session
session_start();

// Inclut le fichier Database.php et crée une instance
include('../../php/includes/Database.php');
include('../../php/includes/helper.php');
$db = new Database();

// Vérifie que l'utilisateur est connecté, et le renvoie à la page d'accueil s'il ne l'est pas
if (!isset($_SESSION["user"])) {
    header("Location: ../../index.php");
    exit();
}

// Vérifie si l'utilisateur a accès à cette page
IsUserAllowed();

// Récupère l'id, le pseudo et la date d'inscription de l'utilisateur
$idUser = $_SESSION["idUser"];
$pseudo = $_SESSION["user"]['useLogin'];
$inscription = $_SESSION["user"]['useRegisterDate'];

// Récupère les infos personnelles de l'utilisateur, le nombre d'appréciations et de livre qu'il a posté,
// et les livres qu'il a publié, depuis la BD
$infos = $db->getPersonalInfos($idUser);
$nbAppreciations = $db->getUserNumberOfReviews($idUser);
$nbBooksPosted = $db->getUserNumberOfPosts($idUser);
$usersBooks = $db->getUserBooks($idUser);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="../../assets/css/styles.css" rel="stylesheet">
    <title>Mon profil</title>
</head>

<body>
    <!-- Barre de navigation  -->
    <?php include('../../php/includes/nav.php'); ?>
    <main>
        <!-- Affichage des infos personnelles de l'utilisateur -->
        <h1 id="profile-h1-title">Mes informations personnelles</h1>
        <div id="profile-infos">
            <div class="profile-infos-container">
                <p class="profile-title-categories">Pseudo :</p>
                <p>
                    <?php echo $pseudo; ?>
                </p>
            </div>
            <div class="profile-infos-container">
                <p class="profile-title-categories">Date d'entrée sur le site :</p>
                <p>
                    <?php echo $inscription; ?>
                </p>
            </div>
            <div class="profile-infos-container">
                <p class="profile-title-categories">Nombre d'ouvrages proposés :</p>
                <p>
                    <?php echo $nbBooksPosted; ?>
                </p>
            </div>
            <div class="profile-infos-container">
                <p class="profile-title-categories">Nombre d'appréciations faites :</p>
                <p>
                    <?php echo $nbAppreciations; ?>
                </p>
            </div>
        </div>
        <!-- Affichage du tableau de livres qu'il a publiés -->
        <div id="profile-booksTab">
            <div id="profile-tab-header">
                <h2>Mes ouvrages</h2>
                <div id="profile-add-book-button">
                    <a href="../../src/pages/addBook.php">Ajouter un livre</a>
                </div>
            </div>
            <table id="profile-booksTable">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Titre</th>
                        <th class="profile-icons">Détails</th>
                        <th class="profile-icons">Modifier</th>
                        <th class="profile-icons">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usersBooks as $book) : ?>
                        <tr>
                            <td>
                                <?php echo $book['autFirstName'] . ' ' . $book['autLastName']; ?>
                            </td>
                            <td>
                                <?php echo $book['booTitle']; ?>
                            </td>
                            <td class="profile-containerOptions">
                                <a href="../../src/pages/details.php?idBook=<?= $book["idBook"]; ?>">
                                    <span class="material-symbols-outlined">info</span>
                                </a>
                            </td>
                            <td class="profile-containerOptions">
                                <a href="../../src/pages/modifyBook.php?idBook=<?= $book["idBook"]; ?>">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                            </td>
                            <td class="profile-containerOptions">
                                <a href="javascript:confirmDelete(<?= $book["idBook"]; ?>)">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- Footer -->
    <?php include('../../php/includes/footer.php'); ?>
    <script src="../../assets/js/script.js"></script>
</body>

</html>