<div class="containerFoto">
  <?php foreach ($foto as $f) : ?>
    <div class="window">
      <img class="foto" src="/image_storage/<?= $f['Foto']; ?>">
      <div class="hover-zone" onclick="redirectToPage('/post/<?= $f['FotoID']; ?>')">
        <div class="top-bar">
        <div class="radius-ico">
          <?php if (session()->get('UserID') == $user['UserID']) : ?>
            <a href="/deletepost/<?= $f['FotoID'] ?>" class="deleteButton"><i class="fa-solid fa-trash fa-xl"></i></a>
            <a href="/editpost/<?= $f['FotoID'] ?>" class="editButton"><i class="fa-solid fa-pencil fa-xl"></i></a>
          <?php endif; ?>
        </div>
        </div>
        <div class="bottom-bar">
          <div class="radius-ico">
            <a href="/download/<?= $f['FotoID'] ?>" class="iconButton"><i class="fa-solid fa-download fa-xl"></i></a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

</div>