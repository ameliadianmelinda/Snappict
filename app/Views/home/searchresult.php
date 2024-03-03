<?= $this->extend('templates/navbar'); ?>

<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Result</title>
<?= $this->endSection(); ?>
<!--  -->

<!-- nav active -->
<?= $this->section('active_nav1'); ?>
<li><a href="/beranda">Beranda</a></li>
<?= $this->endSection(); ?>

<?= $this->section('active_nav2'); ?>
<li><a href="/upload" class="active">Upload</a></li>
<?= $this->endSection(); ?>
<!--  -->

<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/search.css">

<?php

use App\Models\Usermodel;

$UserModel = new UserModel();

?>

<div class="container">

    <?php if (empty($foto)) : ?>
        <div class="user-display">
            <?php foreach ($akun as $a) : ?>

                <div class="users">
                    <a href="/profil-user/<?= $a['userid']; ?>"><img src="/profil_storage/<?= $a['foto_profil'] ?>" alt="pp" class="pp"></a>&nbsp;&nbsp;&nbsp;
                    <div class="links">
                        <a href="/profil-user/<?= $a['userid']; ?>">
                            <p class="bold"><?= $a['username'] ?></p>
                        </a>
                        <?php if ($a['namalengkap'] == null) : ?>
                            <a href="/profil-user/<?= $a['userid']; ?>">
                            <p class="thin">@<?= $a['username'] ?></p>
                            </a>
                        <?php else : ?>
                            <p class="thin">@<?= $a['namalengkap'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>


        <div class="gridds">
            <?php foreach ($akun as $user) : ?>
                <?php foreach ($fotos as $foto) : ?>
                    <?php if ($foto['userid'] == $user['userid']) : ?>
                        <div class="box">
                            <div class="user_detail">
                                <img src="/profil_storage/<?= $user['foto_profil'] ?>" alt="pp" class="pp">&nbsp;&nbsp;&nbsp;
                                <p><?= $user['username'] ?></p>
                            </div>

                            <a href="/galeri/<?= $foto['fotoid']; ?>">
                                <img src="/image_storage/<?= $foto['foto']; ?>" alt="">

                                <div class="hover-box">
                                    <ul>
                                        <li><i class="fa-solid fa-heart" style="color:red;"></i>&nbsp;&nbsp; 2,3rb suka</li>
                                        <li style="margin-left:20px;"><i class="fa-regular fa-comment"></i>&nbsp; 45 komentar</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="gridds">
            <?php foreach ($foto as $f) : ?>
                <?php $user = $UserModel->where('userid', $f['userid'])->first(); ?>
                <div class="box">

                    <div class="user_detail">
                        <img src="/profil_storage/<?= $user['foto_profil'] ?>" alt="pp" class="pp">&nbsp;&nbsp;&nbsp;
                        <p><?= $user['username'] ?></p>
                    </div>

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
    <?php endif; ?>



</div>

<?= $this->endSection(); ?>