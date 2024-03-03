function showDeleteConfirmation(fotoid) {
  var modal = document.getElementById("deleteConfirmationModal");
  modal.style.display = "block";
  return false; 
}

function closeModal() {
  var modal = document.getElementById("deleteConfirmationModal");
  modal.style.display = "none";
}

function deletePost(fotoid) {
  console.log("Deleting post with ID:", fotoid);
  closeModal(); 
}
