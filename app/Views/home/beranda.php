<?= $this->extend('templates/navbar'); ?>


<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Beranda</title>
<?= $this->endSection(); ?>
<!--  -->

<!-- nav active -->
<?= $this->section('active_nav1'); ?>
<li><a href="/beranda" class="active">Beranda</a></li>
<?= $this->endSection(); ?>

<?= $this->section('active_nav2'); ?>
<li><a href="/upload">Upload</a></li>
<?= $this->endSection(); ?>
<!--  -->

<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/beranda.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<?php

use App\Models\Usermodel;

$UserModel = new UserModel();

?>

<div class="container">

    <div class="gridds">
        <?php foreach ($foto as $f) : ?>
            <?php $user = $UserModel->where('userid', $f['userid'])->first(); ?>
            <div class="box">

                <div class="user_detail">
                    <img src="/profil_storage/<?= $user['foto_profil'] ?>" alt="pp" class="pp">&nbsp;&nbsp;&nbsp;
                    <p><?= $user['username'] ?></a></p>
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

    <!-- <div class="popup">

        <div class="popup_content">
            <form action="" class="popup_form">
                <div class="popup_header">
                    <p></p>
                    <p>Lengkapi data akun</p>
                    <div class="close" alt="close">
                    <i class="fa-solid fa-xmark close" alt="close"></i>
                    </div>
                </div>

                <div class="popup_body">
                    <label for="fname" style="margin-top:30px; margin-bottom:8px;">Email</label>
                    <input type="text" id="text" name="email" placeholder="Type your email">

                    <label for="fname" style="margin-top:20px; margin-bottom:8px;">Nama lengkap</label>
                    <input type="text" id="text" name="namalengkap" placeholder="Type your name">

                    <label for="fname" style="margin-top:20px; margin-bottom:8px;">Alamat</label>
                    <input type="text" id="text" name="alamat" placeholder="Type your alamat">
                </div>

                <div class="popup_footer">
                    <button type="button" class="popup__dismiss2" alt="dismiss2">Save</button>
                </div>
            </form>
        </div>
    </div> -->
</div>


<!-- <script src="/js/popup.js"></script> -->

<?= $this->endSection(); ?>