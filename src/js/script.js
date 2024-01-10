function confirmDelete(idBook) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce livre ?")) {
        window.location.href = "./deleteBook.php?idBook=" + idBook;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour gérer le clic sur une étoile
    function handleRating(event) {
        const star = event.target;

        if (star.tagName === 'INPUT' && star.type === 'radio') {
            // Mettez à jour la valeur du champ caché avec la note sélectionnée
            document.getElementById('ratingInput').value = star.value;

            // Soumettez automatiquement le formulaire
            document.getElementById('ratingForm').submit();
        }
    }

    // Ajoutez un gestionnaire d'événements pour chaque étoile
    const stars = document.querySelectorAll('.rating input[type="radio"]');
    stars.forEach(star => {
        star.addEventListener('click', handleRating);
    });
});


