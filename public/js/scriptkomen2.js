function showDeleteConfirmationKomen2(komentarid, fotoid) {
    var modal = document.getElementById("deleteConfirmationModal2" + komentarid);
    modal.style.display = "block";
}

function closeModalKomen2(komentarid) {
    var modal = document.getElementById("deleteConfirmationModal2" + komentarid);
    modal.style.display = "none";
}

function deletePostKomen2(komentarid) {
    console.log("Menghapus komentar dengan ID:", komentarid);
    closeModalKomen2(komentarid); 
}
