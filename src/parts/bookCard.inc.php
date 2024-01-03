<div class="book-card">
    <img src="./img/covers/<?= $book["booImageURL"]; ?>" alt="image de couverture du livre">
    <div class="book-infos">
        <p class="author">
            <?php
            $author = $db->getOneAuthor($book["fkAuthor"]);
            echo $author["autFirstName"] . " " . $author["autLastName"];
            ?>    
        </p>
        <h3>
            <a href="./details.php?idBook=<?= $book["idBook"]; ?>"><?= $book["booTitle"]; ?></a>
        </h3>
        <!-- Pourquoi mettre un lien vers le profil utilisateur ?  -->
        <p>Posté par : <a href="./profile.php">
            <?php
            $user = $db->getOneUser($book["fkUser"]);
            echo $user["useLogin"];
            ?>
        </a></p>
    </div>
</div>