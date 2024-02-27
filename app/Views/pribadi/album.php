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


<?= $this->extend('templates/profil'); ?>


<?= $this->section('nav-profil'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/profil.css">
<div class="postingan">
    <ul>
        <li class="ac-post"><a href="/profil-postingan/<?= session()->get('userid'); ?>"><i class="fa-solid fa-grip-vertical"></i>&nbsp; Postingan</a></li>
        <li class="ac-album"><a href="/profil-album" class="active"><i class="fa-regular fa-folder-open"></i>&nbsp; Album</a></li>
        <li class="ac-like"><a href="/profil-suka/<?= session()->get('userid'); ?>"><i class="fa-solid fa-heart" style="color: red;"></i>&nbsp; Suka</a></li>
    </ul>
</div>
<?= $this->endSection(); ?>


<?= $this->section('album'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/album.css">

<row class="icon-add">
    <div class="add" onclick="redirectToPage('/beranda')">
        <a href="/profil-create-album">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>
</row>

<row>
    <div class="grids">
        <?php foreach ($album as $al) : ?>
            <div class="box">
            
                <a href="/galeri-album/<?= $al['albumid']; ?>" style="text-decoration:none; color:black;">
                    <div class="cover">
                        <img src="/image_storage/<?= $al['cover_album']; ?>" alt="">
                    </div>

                    <div class="deskripsi">
                        <p><?= $al['nama_album'] ?></p>
                    </div>

                    <div class="hover-box">
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</row>

<?= $this->endSection(); ?>