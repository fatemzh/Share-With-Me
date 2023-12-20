function confirmDelete(idBook) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce livre ?")) {
        window.location.href = "./deleteBook.php?idBook=" + idBook;
    }
}

