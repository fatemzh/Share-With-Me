<?php
    //phpinfo();
    session_start();

     if (!isset($_SESSION["user"]) ) {
         $isUserConnected = false;
     } else {
         $isUserConnected = true;
         $userName = $_SESSION["user"];
     }

    $idBook = isset($_GET["idBook"]) ? $_GET["idBook"] : null;

    // Inclure le fichier Database.php
    include './Database.php';

    // Créer une instance de la classe Database
    $db = new Database();

    //Récupération de l'identifiant du livre dans l'URL
    $idUser = $_GET["idUser"];
    // Récupérer la liste des enseignants depuis la base de données
    $books =  $db->getAllBooks();
    $infos = $db->getPersonalInfos($idUser);
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
    <title>Mon profil</title>
</head>
<body>
    <?php include('parts/nav.inc.php'); ?>
    <main>
        <h1>Mes informations personnelles</h1>
        <div id="profile-infos">
            <div class="profile-infos-container">
                <p>Pseudo : 
                    <?php
                        echo $infos["useNickname"];
                    ?>
                </p>
            </div>
            <!-- <div class="profile-infos-container">
                <label>Date d'entrée dans le site</label>
                <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>">
            </div>
            <div class="profile-infos-container">
                <label>Nombre d'ouvrages proposés</label>
                <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>">
            </div>
            <div class="profile-infos-container">
                <label>Nombre d'appréciations faites</label>
                <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>">
            </div> -->
        </div>
    </main>
    <?php include('parts/footer.inc.php'); ?>
</body>
</html>