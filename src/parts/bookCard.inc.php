<div class="book-card">
    <img src="./img/covers/<?= $book["booImageURL"]; ?>" alt="image de couverture du livre">
    <div class="book-infos">
        <p class="author">
            <?php
            $author = $db->getOneAuthor($book["fkAuthor"]);
            echo $author["autFirstName"] . " " . $author["autLastName"];
            ?>    
        </p>
        <h3><a href=""><?= $book["booTitle"]; ?></a></h3>
        <p>Posté par : <a href="#">
            <?php
            $user = $db->getOneUser($book["fkUser"]);
            echo $user["useLogin"];
            ?>
        </a></p>
    </div>
</div>