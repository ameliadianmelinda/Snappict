<?= $this->extend('templates/navbar'); ?>


<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Edit profil</title>
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

<section>
    <div class="edit-profil">

        <div class="nav">
            <p class="nav-edit">Edit profil</p>
            <p class="nav-info">Informasi yang Anda tambahkan di sini dapat dilihat oleh siapa pun yang dapat melihat profil Anda.</p>
        </div>

        <div class="detail">

            <form action="/editprofil-update/<?= $user['userid']; ?>" enctype="multipart/form-data" method="post" class="form">

                <div class="class1">
                    <label for="fname" class="class1-pp">Foto profil :</label>
                    <p class="change">*ubah foto profil</p>
                    <div class="image-upload-wrap">
                        <input type="file" name="foto_profil" class="file-upload-input" onchange="readURL(this);" accept="image/*">
                        <img class="edit_pp" src="/profil_storage/<?= session()->get('foto'); ?>" alt="foto_profil">
                    </div>

                    <div class="file-upload-content">
                        <img src="#" alt="image" class="file-upload-image">
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Hapus</button>
                        </div>
                    </div>
                </div>

                <div class="class2">

                    <label for="fname" style="margin-top: 30px; margin-bottom: 7px;">Username :</label>
                    <input type="text" id="text" name="username" placeholder="Username baru" style="margin-bottom:30px;" value="<?= $user['username'] ?>" required>


                    <label for="lname">Email :</label>
                    <input type="text" id="text" name="email" placeholder="Email" style="margin-bottom:30px;" value="<?= $user['email'] ?>">

                    <label for="lname">Nama Lengkap :</label>
                    <input type="text" id="text" name="namalengkap" placeholder="Nama lengkap" style="margin-bottom:30px;" value="<?= $user['namalengkap'] ?>">

                    <label for="lname">Alamat :</label>
                    <input type="text" id="text" name="alamat" placeholder="Alamat" style="margin-bottom:30px;" value="<?= $user['alamat'] ?>">

                    <button type="submit" class="btn btn-primary submit"><a href="/upload-save"></a>Publish</button>

                </div>

            </form>

        </div>

    </div>
</section>

<script src="/js/upload.js"></script>

<?= $this->endSection(); ?>