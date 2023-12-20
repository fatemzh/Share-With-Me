function confirmDelete(idBook) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ?")) {
        window.location.href = "./deleteTeacher.php?idTeacher=" + idTeacher;
    }
}
