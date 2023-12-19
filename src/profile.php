<?php
    session_start();

    include './Database.php';

    $db = new Database();

    // Initialisez $isUserConnected et $idUser
    $isUserConnected = isset($_SESSION["user"]);
    $idUser = $isUserConnected ? $_SESSION["idUser"] : null;

    if ($isUserConnected) {
        $idUser = $_SESSION["idUser"]; 
        $infos = $db->getPersonalInfos($idUser); 
        $pseudo = $_SESSION["user"]['useLogin'];
        $inscription = $_SESSION["user"]['useRegisterDate'];
        $nbAppreciations = $db->getUserNumberOfReviews($idUser);
        $nbBooksPosted = $db->getUserNumberOfPosts($idUser);
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./css/styles.css" rel="stylesheet">
    <title>Mon profil</title>
</head>
<body>
    <?php include('./parts/nav.inc.php'); ?>
    <main>
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
        <div id="profile-booksTab">
            <div id="profile-tab-header">
                <h2>Mes ouvrages</h2>
                <button>Ajouter un ouvrage</button>
            </div>
            <table id="profile-booksTable">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Titre</th>
                        <th>Détails</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Auteur
                        </td>
                        <td>
                            Titre
                        </td>
                        <td class="profile-containerOptions">               
                            <a href="">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </td>
                        <td class="profile-containerOptions">               
                            <a href="">
                                <i class="fa-solid fa-marker"></i>
                            </a>
                        </td>
                        <td class="profile-containerOptions">
                            <a href="">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>               
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <?php include('./parts/footer.inc.php'); ?>
</body>
</html>