<div class="book-card">
    <?php if ($isUserConnected === true) { ?>                     
        <a href="details.php?idBook=<?= $book["idBook"]; ?>"><img src="./img/covers/<?= $book["booImageURL"]; ?>" alt="image de couverture du livre"></a>
    <?php } else { ?>
        <img src="./img/covers/<?= $book["booImageURL"]; ?>" alt="image de couverture du livre">
    <?php } ?>
    <div class="book-infos">
        <p class="author">
            <?php
            $author = $db->getOneAuthor($book["fkAuthor"]);
            echo $author["autFirstName"] . " " . $author["autLastName"];
            ?>    
        </p>
        <h3>
            <?php if ($isUserConnected === true) { ?>                     
                <a href="./details.php?idBook=<?= $book["idBook"]; ?>"><?= $book["booTitle"]; ?></a>
            <?php } else { ?>
                <?= $book["booTitle"]; ?>
            <?php } ?>
        </h3>
        <p>Posté par : 
            <?php
            $user = $db->getOneUser($book["fkUser"]);
            echo $user["useLogin"];
            ?>
        </p>
    </div>
</div>