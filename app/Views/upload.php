<?= $this->extend('templates/navbar'); ?>


<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Upload</title>
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

<link rel="stylesheet" href="<?= base_url(); ?>/css/upload.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="container">
    <row class="upload">

        <div class="nav">
            <p>Buat postingan baru</p>
        </div>

        <div class="detail_up">

            <form action="/upload-save" enctype="multipart/form-data" method="post" class="form">

                <div class="col class1">
                    <div class="image-upload-wrap">
                        <input type="file" name="foto" class="file-upload-input" onchange="readURL(this);" accept="image/*" required>
                        <div class="drag-text">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <p class="text-up1">Seret dan upload file disini!</p>
                            <button class="file-upload-add" type="buttton">Pilih dari perangkat</button>
                        </div>
                    </div>

                    <div class="file-upload-content">
                        <img src="#" alt="image" class="file-upload-image">
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Hapus</button>
                        </div>
                    </div>
                </div>

                <div class="col class2">
                    <label for="fname">Judul :</label>
                    <textarea type="textarea" id="textarea" name="judul_foto" placeholder="Berikan judul" style="margin-bottom:30px; margin-top:10px;" required></textarea>

                    <label for="lname">Deskripsi :</label>
                    <textarea type="textarea" id="textarea" name="deskripsi_foto" placeholder="Tambahkan deskripsi" style=" margin-top:10px;" required></textarea>

                    <button type="submit" class="btn btn-primary submit"><a href="/upload-save"></a>Publish</button>
                </div>
            </form>

        </div>

    </row>
    
</div>

<script src="/js/upload.js"></script>

<?= $this->endSection(); ?>