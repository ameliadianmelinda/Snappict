function showDeleteConfirmationKomen(komentarid, fotoid) {
    var modal = document.getElementById("deleteConfirmationModal" + komentarid);
    modal.style.display = "block";
}

function closeModalKomen(komentarid) {
    var modal = document.getElementById("deleteConfirmationModal" + komentarid);
    modal.style.display = "none";
}

function deletePostKomen(komentarid) {
    console.log("Menghapus komentar dengan ID:", komentarid);
    closeModalKomen(komentarid); 
}
