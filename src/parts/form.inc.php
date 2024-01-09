<div id="book-form-container">
    <div id="form-left">
        <p class="space">
            <label for="title">Titre </label>
            <input type="text" name="title" id="title" placeholder="Titre">
        </p>
        <p class="space">
            <label for="category">Catégorie</label>
            <select name="category" id="category">
                <option value="">Catégorie</option>
                <?php foreach ($categories as $category) : ?>
                <option value="<?= $category["idCategory"] ;?>" <?php if ($category["idCategory"] === $bookData["category"]) : ?>selected<?php endif; ?>><?= $category["catName"] ;?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p class="space">
            <label for="page-number">Nombre de pages</label>
            <input type="number" name="page-number" id="page-number" placeholder="Nombre de pages" min="1" max="">
        </p>
        <p class="space">
            <label for="summary">Résumé</label>
            <textarea name="summary" id="summary" placeholder="Résumé" rows="5" cols="35"></textarea>
        </p>
        <p class="space">
            <label for="authorFirstname">Prénom de l'auteur-e</label>
            <input type="text" name="authorFirstname" id="authorFirstname" placeholder="Prénom de l'auteur-e">
        </p>
        <p class="space">
            <label for="authorLastname">Nom de famille de l'auteur-e</label>
            <input type="text" name="authorLastname" id="authorLastname" placeholder="Nom de famille de l'auteur-e">
        </p>
        <p class="space">
            <label for="edithor">Editeur  </label>
            <input type="text" name="edithor" id="edithor" placeholder="Editeur">
        </p>
        <p class="space">
            <label for="year">Année d'édition </label>
            <input type="text" name="year" id="year" placeholder="Année d'édition">
        </p>
        <p  class="space">
            <label for="book-link">Lien d'extrait de l'ouvrage</label>
            <input type="file" id="book-link" name="book-link" value="Lien URL" accept="application/pdf" />
        </p>
        
    </div>
    <div id="form-right">
        <div id="img-cover">

        </div>
        <p class="space">
            <label for="book-cover">Image de couverture</label>

            <input type="file" id="book-cover" name="book-cover" accept="image/png, image/jpeg, img/jpg" />
        </p>
    </div>
</div>