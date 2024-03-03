<?= $this->extend('templates/navbar'); ?>

<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Create-Album</title>
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


<?= $this->section('nav-profil'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/createalbum.css">
<link rel="stylesheet" href="<?= base_url(); ?>/css/edit.css">

<div class="postingan">
    <ul>
        <li><a href="/profil-postingan"><i class="fa-solid fa-grip-vertical"></i>&nbsp; Postingan</a></li>
        <li style="margin-left:30px;" class="active"><a href="/profil-album"><i class="fa-regular fa-folder-open"></i>&nbsp; Album</a></li>
        <li style="margin-left: 30px;"><a href="/profil-suka/<?= session()->get('userid'); ?>"><i class="fa-solid fa-heart" style="color: red;"></i>&nbsp; Suka</a></li>
    </ul>
</div>

<hr>
<?= $this->endSection(); ?>



<?= $this->section('createalbum'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/createalbum.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<section>

    <div class="create-album">

        <div class="nav">
            <p class="nav-edit">Edit album</p>
            <p class="nav-info">Ubah dan sesuaikan album anda!</p>
        </div>

        <?php foreach ($dataalbum as $al) : ?>
            <div class="detail">
                <form action="/update-album/<?= $al['albumid']; ?>" enctype="multipart/form-data" method="post" class="form">

                    <div class="class1">
                        <label for="fname" class="class1-pp">Cover :</label>
                        <div class="image-upload-wrap">

                            <input type="file" name="cover_album" class="file-upload-input" onchange="readURL(this);" accept="image/*">
                            <img class="edit_coverfoto" src="/image_storage/<?= $al['cover_album']; ?>" alt="foto_profil" style="width:100%; height:100%;">

                        </div>

                        <div class="file-upload-content">
                            <img src="#" alt="image" class="file-upload-image">
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <div class="class2">

                        <label for="fname" style="margin-top: 50px; margin-bottom: 7px;">Nama album :</label>
                        <input type="text" id="text" name="nama_album" placeholder="Ketikkan nama album.." style="margin-bottom:30px;" value="<?= $al['nama_album']; ?>">


                        <label for="lname">Deskrpsi :</label>
                        <input type="text" id="text" name="deskripsi" placeholder="Ketikkan deskripsi album.." style="margin-bottom:30px;" value="<?= $al['deskripsi']; ?>">

                        <button type="submit" class="btn btn-primary submit"><a href="/upload-save"></a>Create</button>

                    </div>

                </form>
            <?php endforeach; ?>

            </div>

    </div>
</section>

<script src="/js/upload.js"></script>

<?= $this->endSection(); ?>