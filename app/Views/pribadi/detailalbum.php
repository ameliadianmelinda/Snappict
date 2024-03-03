<?= $this->extend('templates/navbar'); ?>
<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Profil-Album</title>
<?= $this->endSection(); ?>
<!--  -->

<!-- nav active -->
<?= $this->section('active_nav1'); ?>
<li><a href="/beranda">Beranda</a></li>
<?= $this->endSection(); ?>

<?= $this->section('active_nav2'); ?>
<li><a href="/upload">Upload</a></li>
<?= $this->endSection(); ?>
<!--  -->


<?= $this->section('detailalbum'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/detailalbum.css">
<script src="https:/ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<div class="container-1">
    <?php foreach ($dataalbum as $al) : ?>
        <div class="header-album" style="justify-content: center;">
            <div class="edit-album" style="margin-bottom:15px;">
                <p style="font-size:20px;"><b><?= $al['nama_album']; ?></b></p>
                <i class="fa-solid fa-ellipsis" style="margin-left:20px; margin-top:7px;" onclick="toggleMenu3()"></i>
                <div class="sub-menu-wrap-komen" id="subMenu3">
                    <div class="sub-menu-komen">
                        <a href="/edit-album/<?= $al['albumid']; ?>" style="margin-bottom:15px;"><i class="fa-regular fa-pen-to-square" style="margin-right:10px;"></i>Edit</a>
                        <a href="#" onclick="showDeleteConfirmationalbum('<?= $al['albumid']; ?>')">
                            <i class="fa-solid fa-trash-can" style="margin-right:10px;"></i>Hapus
                        </a>

                        <!-- Modal -->
                        <div id="deleteConfirmationModalalbum<?= $al['albumid']; ?>" class="modal-album">
                            <div class="modal-content-album">
                                <span class="close" onclick="closeModalalbum('<?= $al['albumid']; ?>')">&times;</span>
                                <p>Apakah Anda yakin ingin menghapus album ini?</p>
                                <div class="button-container-album">
                                    <a href="/delete-album/<?= $al['albumid']; ?>" class="yes-button-album" style="margin-right:20px;">Ya</a>
                                    <a href="#" class="no-button-album" onclick="closeModalalbum('<?= $al['albumid']; ?>')">Tidak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <img src="/image_storage/<?= $al['cover_album']; ?>" alt="" class="cover-album-detail">
            <p style="font-size:15px; margin-top:10px;"><?= $al['deskripsi']; ?></p>

        </div>
    <?php endforeach; ?>
</div>

<div class="container">

    <div class="gridds">
        <?php foreach ($foto as $f) : ?>
            <div class="box">
                <a href="/galeri/<?= $f['fotoid']; ?>">
                    <img src="/image_storage/<?= $f['foto']; ?>" alt="">
                    <div class="hover-box">
                        <ul>
                            <li><i class="fa-solid fa-heart" style="color:red;"></i>&nbsp;&nbsp; 2,3rb suka</li>
                            <li style="margin-left:20px;"><i class="fa-regular fa-comment"></i>&nbsp; 45 komentar</li>
                        </ul>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="/js/klik3.js"></script>
<script src="/js/scriptalbum.js"></script>

<?= $this->endSection(); ?>