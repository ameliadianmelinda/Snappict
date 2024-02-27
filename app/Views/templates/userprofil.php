<?= $this->extend('templates/navbar'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/profil.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<?php
$date = $user['created_at'];
$date = date("d M Y", strtotime($date));
?>

<section class="profil-container">
    <row class="profil">
        <img class="foto_profil" src="/profil_storage/<?= $user['foto_profil'] ?>" alt="foto_profil">
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

        <?php if (session()->get('userid') == $user['userid']) : ?>
            <div class="edit">
                <a href="/edit-profil"><button type="button" class="btn btn-primary">Edit profil</button></a>
            </div>
        <?php endif; ?>
    </row>

    <row class="nav_profil">
        <?= $this->renderSection('nav-profil'); ?>
    </row>

    <row class="batas">
        <hr>
    </row>

    <row class="content_profil">
        <?= $this->renderSection('user-postingan'); ?>
        <?= $this->renderSection('user-album'); ?>
        <?= $this->renderSection('user-suka'); ?>
    </row>

</section>
<?= $this->endSection(); ?>