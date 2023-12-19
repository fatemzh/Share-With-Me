<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un ouvrage</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  </head>
<body>
    <header>
        <?php include("./parts/nav.inc.php") ?>
    </header>
    <main>
        <nav id="add-nav">
            <a href="profile.php" class="grey">mon profil /</a>
            <a href="addBook.php"> ajouter</a>

        </nav>
        <h1>
            Ajouter un ouvrage
        </h1>
        <form action="checkBookForm.inc.php" method="post" id="book-form">
            <?php include("parts/form.inc.php");?>

            <p>
                <input type="submit" value="Ajouter">
                <button type="button" onclick="document.getElementById('book-form').reset();">Effacer</button>
            </p>
        </form>

    </main>
    
    <?php include("parts/footer.inc.php"); ?>
    
</body>
</html>