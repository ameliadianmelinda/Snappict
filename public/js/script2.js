function showDeleteConfirmation2(fotoid) {
  var modal = document.getElementById("deleteConfirmationModal2");
  modal.style.display = "block";
}

function closeModal2() {
  var modal = document.getElementById("deleteConfirmationModal2");
  modal.style.display = "none";
}

function deletePost2(fotoid) {
  console.log("Menghapus postingan dengan ID:", fotoid);
  closeModal2(); 
}
