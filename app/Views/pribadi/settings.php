<?= $this->extend('templates/navbar'); ?>


<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Setting akun</title>
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

<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/editprofil.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https:/ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<?php
	$session = session();
	$confirm = $session->getFlashdata('confirm');
	$pwnew = $session->getFlashdata('pwnew');
	$pwnow = $session->getFlashdata('pwnow');
	?>

<section>
    <div class="edit-profil">

        <div class="nav">
            <p class="nav-edit">Informasi akun</p>
            <p class="nav-info">Buat perubahan pada kata sandi Anda!</p>
        </div>

        <div class="detail">

            <form action="/setting-akun/save/<?= $user['userid'] ?>"  method="post" class="form">

                <div class="class2">
                   
                    <label for="fname" style="margin-bottom: 7px;">Kata sandi saat ini :</label>
                    <input type="password" id="text" name="pwnow" placeholder="Ketikkan kata sandi saat ini" required>
                    <?php if ($pwnow) { ?>
						<p style="color:red; font-size:13px;"><i class="fa-solid fa-circle-exclamation"></i>&nbsp; &nbsp;<?php echo $pwnow ?></p>
					<?php } ?>
                    
                    <label for="lname" style="margin-top: 30px;">Kata sandi baru :</label>
                    <input type="password" id="text" name="pwnew" placeholder="Ketikkan kata sandi baru">
                    <?php if ($pwnew) { ?>
						<p style="color:red; font-size:13px;"><i class="fa-solid fa-circle-exclamation"></i>&nbsp; &nbsp;<?php echo $pwnew ?></p>
					<?php } ?>

                    <label for="lname" style="margin-top: 30px;">konfirmasi kata sandi :</label>
                    <input type="password" id="text" name="confirm" placeholder="Ketikkan kembali kata sandi baru">
                    <?php if ($confirm) { ?>
						<p style="color:red; font-size:13px;"><i class="fa-solid fa-circle-exclamation"></i>&nbsp; &nbsp;<?php echo $confirm ?></p>
					<?php } ?>

                    <button type="submit" class="btn btn-primary submit"><a href="/upload-save"></a>Simpan</button>

                </div>

            </form>

        </div>

    </div>
</section>

<script src="/js/upload.js"></script>

<?= $this->endSection(); ?>