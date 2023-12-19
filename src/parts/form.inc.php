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
                <option value="">Action</option>
                <option value="">Romance</option>
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
            <label for="author">Auteur-e </label>
            <input type="text" name="author" id="author" placeholder="Auteur-e">
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