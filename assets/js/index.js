/*
 * ETML
 * Auteur: Salma Abdulkadir
 * Date: 10.1.2023
 * Description: Fonctions Javascript.
 */

//Fonction qui demande une confirmation avant de supprimer définitivement l'ouvrage
function confirmDelete(idBook) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce livre ?")) {
        window.location.href = "./deleteBook.php?idBook=" + idBook;
    }
}

//Script qui gère la soumission du formulaire d'évaluation au clique d'une étoile
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour gérer le clic sur une étoile
    function handleRating(event) {
        const star = event.target;

        if (star.tagName === 'INPUT' && star.type === 'radio') {
            // Met à jour la valeur du champ caché avec la note sélectionnée
            document.getElementById('ratingInput').value = star.value;

            // Soumet automatiquement le formulaire
            document.getElementById('ratingForm').submit();
        }
    }

    // Ajout d'un gestionnaire d'événements pour chaque étoile
    const stars = document.querySelectorAll('.rating input[type="radio"]');
    stars.forEach(star => {
        star.addEventListener('click', handleRating);
    });
});


