function showDeleteConfirmationalbum(albumid) {
    var modal = document.getElementById("deleteConfirmationModalalbum" + albumid);
    modal.style.display = "block";
    return false; 
}

function closeModalalbum(albumid) {
    var modal = document.getElementById("deleteConfirmationModalalbum" + albumid);
    modal.style.display = "none";
    return false; 
}

function deleteAlbum(albumid) {
    console.log("Menghapus album dengan ID:", albumid);
    closeModalalbum(albumid); 
}
