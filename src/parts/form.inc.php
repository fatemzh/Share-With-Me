<div id="book-form-container">
    <div id="form-left">
        <p class="space">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" placeholder="Titre" value="<?= $bookData["title"]; ?>">
        </p>
        <p class="space">
            <label for="category">Catégorie</label>
            <select name="category" id="category">
                <option value="">Catégorie</option>
                <?php foreach ($categories as $category) : ?>
                <option value="<?= $category["idCategory"]; ?>" <?php if ($category["idCategory"] === $bookData["idCategory"]) : ?>selected<?php endif; ?>><?= $category["catName"] ;?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p class="space">
            <label for="page-number">Nombre de pages</label>
            <input type="number" name="page-number" id="page-number" placeholder="Nombre de pages" min="1" max="" value="<?= $bookData["nbPages"]; ?>">
        </p>
        <p class="space">
            <label for="summary">Résumé</label>
            <textarea name="summary" id="summary" placeholder="Résumé" rows="5" cols="35"><?= $bookData["summary"]; ?></textarea>
        </p>
        <p class="space">
            <label for="authorFirstname">Prénom de l'auteur-e</label>
            <input type="text" name="authorFirstname" id="authorFirstname" placeholder="Prénom de l'auteur-e" value="<?= $bookData["authorFirstname"]; ?>">
        </p>
        <p class="space">
            <label for="authorLastname">Nom de l'auteur-e</label>
            <input type="text" name="authorLastname" id="authorLastname" placeholder="Nom de l'auteur-e" value="<?= $bookData["authorLastname"]; ?>">
        </p>
        <p class="space">
            <label for="editor">Editeur</label>
            <input type="text" name="editor" id="editor" placeholder="Editeur" value="<?= $bookData["editor"]; ?>">
        </p>
        <p class="space">
            <label for="year">Année d'édition</label>
            <input type="text" name="year" id="year" placeholder="Année d'édition" value="<?= $bookData["editionYear"]; ?>">
        </p>
        <p  class="space">
            <label for="excerptPDF">Lien d'extrait de l'ouvrage</label>
            <input type="file" id="excerptPDF" name="excerptPDF" value="Lien URL" accept="application/pdf" value="excerptPDF/<?= $bookData["excerptName"]; ?>">
        </p>
    </div>
    <div id="form-right">
        <div id="img-cover"></div>
        <p class="space">
            <label for="coverImg">Image de couverture</label>
            <input type="file" id="coverImg" name="coverImg" accept="image/png, image/jpeg, img/jpg" value="img/covers/<?= $bookData["coverName"]; ?>">
        </p>
    </div>
</div>