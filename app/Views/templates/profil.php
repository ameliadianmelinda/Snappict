<?= $this->extend('templates/navbar'); ?>


<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/profil.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<?php
// ambil data user created at dan ubahlah menjadi tanggal
$date = $user['created_at'];
$date = date("d M Y", strtotime($date));
?>

<section class="profil-container">
    <row class="profil">
        <img class="foto_profil" src="/profil_storage/<?= session()->get('foto'); ?>" alt="foto_profil">
        <div class="user">
            <ul>
                <li class="user-username">
                    <p><?= $user['username'] ?></p>
                </li>
                
                <?php if ($user['namalengkap'] == null) : ?>
                    <li class="user-email">@<?= $user['username'] ?></li>
                <?php else : ?>
                    <li class="user-email">@<?= $user['namalengkap'] ?></li>
                <?php endif; ?>

                <li class="user-tgl"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp; Bergabung <?= $date ?></li>
            </ul>
        </div>
        <div class="edit">
            <a href="/edit-profil"><button type="button" class="btn btn-primary">Edit profil</button></a>
        </div>
    </row>

    <row class="nav_profil">
        <?= $this->renderSection('nav-profil'); ?>
    </row>

    <row class="batas">
        <hr>
    </row>

    <row class="content_profil">
        <?= $this->renderSection('album'); ?>
        <?= $this->renderSection('post'); ?>
        <?= $this->renderSection('suka'); ?>
    </row>

</section>
<?= $this->endSection(); ?>