document.addEventListener("DOMContentLoaded", () => {
  const likeButton = document.getElementById('likeButton');
  const heartIcon = likeButton.querySelector('i');
  const likeCount = document.getElementById('likeCount'); // Menemukan elemen <p> jumlah suka

  likeButton.addEventListener('click', () => {
    if (heartIcon.classList.contains('liked')) {
      // Jika tombol sudah disukai, maka hilangkan kelas 'liked'
      heartIcon.classList.remove('liked');
      // Kurangi jumlah suka
      decreaseLikeCount();
    } else {
      // Jika tombol belum disukai, maka tambahkan kelas 'liked'
      heartIcon.classList.add('liked');
      // Tambah jumlah suka
      increaseLikeCount();
    }
  });

  function increaseLikeCount() {
    likeCount.textContent = parseInt(likeCount.textContent) + 1 + ' suka';
  }

  function decreaseLikeCount() {
    likeCount.textContent = parseInt(likeCount.textContent) - 1 + ' suka';
  }
});
