<?= $this->extend('templates/navbar'); ?>


<!-- title -->
<?= $this->section('title'); ?>
<title>Snappict | Komentar</title>
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

<link rel="stylesheet" href="<?= base_url(); ?>/css/komentar.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


<!-- // ambil data foto tanggal unggah dan ubahlah menjadi tanggal -->
<?php
$date = $foto['tanggal_unggah'];
$date = date("d M Y", strtotime($date));
?>


<?php
$session = session();
$addalbum = $session->getFlashdata('addalbum');
$hpsfoto = $session->getFlashdata('hpsfoto');
?>

<div class="container">
    <row class="container_komen">
        <div class="col detail_imgs">
            <div class="back">
                <a href="/beranda">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>

            <div class="display_foto">
                <img src="/image_storage/<?= $foto['foto']; ?>" alt="">
            </div>
        </div>

        <div class="col detail_komens">

            <row>
                <div class="one">
                    <div class="one-user">
                        <div class="user">
                            <img src="/profil_storage/<?= $user['foto_profil'] ?>" alt="foto_profil" onclick="rediirectToPage('/profil-user/<?= $user['userid']; ?>')" style="cursor:pointer;">
                            <div class="user_detail">
                                <p class="user-username" onclick="rediirectToPage('/profil-user/<?= $user['userid']; ?>')" style="cursor:pointer;"><?= $user['username'] ?></p>
                                <p style="font-size:12px;"><?= $date ?></p>
                            </div>
                        </div>

                        <div class="deskripsi">
                            <p><?= $foto['deskripsi_foto'] ?></p>
                        </div>
                    </div>

                    <div class="one-elips" style="z-index:1050;">
                        <?php if ($foto['userid'] == session()->get('userid')) : ?>
                            <i class="fa-solid fa-ellipsis-h" onclick="toggleMenu3()"></i>
                            <div class="sub-menu-wrap-komen" id="subMenu3">
                                <div class="sub-menu-komen">
                                    <a href="/edit/<?= $foto['fotoid']; ?>" style="margin-bottom:15px;"><i class="fa-regular fa-pen-to-square" style="margin-right:20px;"></i>Edit</a>
                                    <a href="#" onclick="showDeleteConfirmation(<?= $foto['fotoid']; ?>); return false;" class="delete-button">
                                        <i class="fa-solid fa-trash-can" style="margin-right:20px;"></i>Hapus
                                    </a>

                                    <!-- Modal -->
                                    <div id="deleteConfirmationModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close" onclick="closeModal()">&times;</span>
                                            <p>Anda yakin ingin menghapus postingan ini?</p>
                                            <div class="button-container">
                                                <a href="/delete/<?= $foto['fotoid']; ?>" class="yes-button" style="margin-right:20px;">Ya</a>
                                                <a href="#" class="no-button" onclick="closeModal()">Tidak</a>
                                            </div>
                                        </div>
                                    </div>

                                    <button onclick="toggleMenuSubMenu4()" style="cursor: pointer;"><i class="fa-solid fa-plus" style="margin-right:20px; margin-left:-17px;"></i>Add to album</button>
                                    <div class="sub-submenus-wrap" id="subMenu4">
                                        <div class="submenus">
                                            <?php foreach ($album as $al) : ?>
                                                <a href="/add-foto-album/<?= $foto['fotoid'] ?>/<?= $al['albumid'] ?>" style="margin-bottom: 17px;"><?= $al['nama_album'] ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>


                                    <?php if ($foto['albumid'] > 1) : ?>
                                        <?php foreach ($album as $al) : ?>
                                            <?php if ($al['albumid'] == $foto['albumid']) : ?>
                                                <a href="/delete-foto-album/<?= $foto['fotoid'] ?>/<?= $al['albumid'] ?>" style="margin-bottom: 15px; margin-top:20px;">Hapus dari <?= $al['nama_album'] ?></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </row>

            <row>
                <div class="two">
                    <p class="m-b-13" style="font-size:18px;">Komentar</p>
                    <div class="www">
                        <?php foreach ($komen as $k) : ?>
                            <div class="komentar">
                                <?php foreach ($user_comment as $uc) :  if ($k['userid'] == $uc['userid']) : ?>
                                        <img src="/profil_storage/<?= $uc['foto_profil']; ?>" alt="foto_user" onclick="rediirectToPage('/profil-user/<?= $uc['userid']; ?>')" style="cursor:pointer;">
                                        <div class="detail_komentar" style="margin-right: 10px;">
                                            <p class="user-username" onclick="rediirectToPage('/profil-user/<?= $uc['userid']; ?>')" style="cursor:pointer;"><b><?= $uc['username'] ?></b>
                                            <p>
                                            <p style="font-size: 10px;"><?= $k['tgl_komentar'] ?></p>
                                        </div>
                                        <p style="font-size: 13px;"><?= $k['isi_komentar'] ?></p>
                                <?php endif;
                                endforeach; ?>


                                <div class="one-elips">
                                    <?php if ($k['userid'] == session()->get('userid')) : ?>
                                        <i class="fa-solid fa-trash" onclick="showDeleteConfirmationKomen('<?= $k['komentarid']; ?>', '<?= $k['fotoid']; ?>')"></i>
                                    <?php endif; ?>
                                </div>

                                <!-- Modal -->
                                <div id="deleteConfirmationModal<?= $k['komentarid']; ?>" class="modal-komen">
                                    <div class="modal-content-komen">
                                        <span class="closeKomen" onclick="closeModalKomen('<?= $k['komentarid']; ?>')">&times;</span>
                                        <p>Anda yakin ingin menghapus komentar ini?</p>
                                        <div class="button-container-komen">
                                            <a href="/komentar-delete/<?= $k['komentarid']; ?>/<?= $k['fotoid']; ?>" class="yes-button-komen" style="margin-right:20px;">Ya</a>
                                            <a href="#" class="no-button-komen" onclick="closeModalKomen('<?= $k['komentarid']; ?>')">Tidak</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </row>

            <row>
                <div class="three">
                    <div class="jumlah">

                        <?php if ($liked) : ?>
                            <a href="/unlike/<?= $foto['fotoid'] ?>" class="like" style="text-decoration:none; color:black;">
                                <i class="fa-solid fa-heart fa-xl" style="color: #ff0000; width: 20px; height:20px; margin-bottom:3px;"></i>
                                <p style="text-decoration:none;"><?= $jumlahlike ?> suka</p>
                            </a>
                        <?php else : ?>
                            <a href="/like/<?= $foto['fotoid'] ?>" class="like" style="text-decoration:none; color:black;">
                                <i class="fa-regular fa-heart fa-xl" style="width: 20px; height:20px; margin-bottom:3px"></i>
                                <p><?= $jumlahlike ?> suka</p>
                            </a>
                        <?php endif; ?>

                        <div class="comment">
                            <i class="fa-regular fa-comment" style="width: 20px; height:20px;"></i>
                            <p><?= $jumlahkomen ?> komentar</p>
                        </div>


                    </div>


                    <div class="form_komentar">
                        <form action="/komentar-save/<?= $foto['fotoid']; ?>" method="post">
                            <input type="text" name="isi_komentar" id="komentar" placeholder="Tulis komentar anda disini...">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </row>

        </div>

    </row>


    <!-- hidden -->
    <div class="hidden">
        <row class="hidden-one">
            <div class="back2">
                <a href="/beranda">
                    <i class="fa-solid fa-arrow-left arrow-back2" width="60px" height="60px"></i>
                </a>
            </div>

            <div class="user2">
                <img src="/profil_storage/<?= $user['foto_profil'] ?>" alt="foto_profil" onclick="rediirectToPage('/profil-user/<?= $user['userid']; ?>')" style="cursor:pointer;">
                <div class="user_detail2">
                    <p class="user-hide" onclick="rediirectToPage('/profil-user/<?= $user['userid']; ?>')" style="cursor:pointer;"><?= $user['username'] ?></p>
                    <p class="tgl-hide"><?= $date ?></p>
                </div>
            </div>



            <div class="one-elips-hidden" style="z-index:1050;">
                <?php if ($foto['userid'] == session()->get('userid')) : ?>
                    <i class="fa-solid fa-ellipsis-h elips-hidden" onclick="toggleMenu33()"></i>
                    <div class="sub-menu-wrap-komen33" id="subMenu33">
                        <div class="sub-menu-komen33">
                            <a href="/edit/<?= $foto['fotoid']; ?>" style="margin-bottom:15px;"><i class="fa-regular fa-pen-to-square" style="margin-right:20px;"></i>Edit</a>
                            <a href="#" onclick="showDeleteConfirmation2(<?= $foto['fotoid']; ?>); return false;" class="delete-button2">
                                <i class="fa-solid fa-trash-can" style="margin-right:20px;"></i>Hapus
                            </a>

                            <!-- Modal -->
                            <div id="deleteConfirmationModal2" class="modal2">
                                <div class="modal-content2">
                                    <span class="close" onclick="closeModal2()">&times;</span>
                                    <p>Anda yakin ingin menghapus postingan ini?</p>
                                    <div class="button-container2">
                                        <a href="/delete/<?= $foto['fotoid']; ?>" class="yes-button2" style="margin-right:20px;">Ya</a>
                                        <a href="#" class="no-button2" onclick="closeModal2()">Tidak</a>
                                    </div>
                                </div>
                            </div>
                            <button onclick="toggleMenu44()" style="cursor: pointer;"><i class="fa-solid fa-plus" style="margin-right:20px; margin-left:-17px;"></i>Add to album</button>
                            <div class="sub-submenus-wrap-44" id="subMenu44">
                                <div class="sub-submenus44">
                                    <?php foreach ($album as $al) : ?>
                                        <a href="/add-foto-album/<?= $foto['fotoid'] ?>/<?= $al['albumid'] ?>" style="margin-bottom: 17px;"><?= $al['nama_album'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                            <?php if ($foto['albumid'] > 1) : ?>
                                <?php foreach ($album as $al) : ?>
                                    <?php if ($al['albumid'] == $foto['albumid']) : ?>
                                        <a href="/delete-foto-album/<?= $foto['fotoid'] ?>/<?= $al['albumid'] ?>" style="margin-bottom: 15px; margin-top:20px;">Hapus dari <?= $al['nama_album'] ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </row>

        <row class="hidden-two">
            <div class="display_deskripsi2">
                <p><?= $foto['deskripsi_foto'] ?></p>
            </div>
            <div class="display_foto2">
                <img src="/image_storage/<?= $foto['foto']; ?>" alt="">

                <div class="jumlah2">

                    <?php if ($liked) : ?>
                        <a href="/unlike/<?= $foto['fotoid'] ?>" class="like2" style="text-decoration:none; color:black;">
                            <i class="fa-solid fa-heart fa-xl" style="color: #ff0000; width: 20px; height:20px; margin-bottom:3px;"></i>
                            <p style="text-decoration:none;"><?= $jumlahlike ?> suka</p>
                        </a>
                    <?php else : ?>
                        <a href="/like/<?= $foto['fotoid'] ?>" class="like2" style="text-decoration:none; color:black;">
                            <i class="fa-regular fa-heart fa-xl" style="width: 20px; height:20px; margin-bottom:3px"></i>
                            <p><?= $jumlahlike ?> suka</p>
                        </a>
                    <?php endif; ?>

                    <div class="komenss2">
                        <i class="fa-regular fa-comment koms"></i>
                        <p><?= $jumlahkomen ?> komentar</p>
                    </div>
                </div>
            </div>
        </row>

        <row class="batas2">
            <hr>
        </row>

        <row class="hidden-komentar">
            <div class="hidden-three">
                <p class="m-b-13 text-komentar">Komentar</p>
                <div class="www2">
                    <?php foreach ($komen as $k) : ?>
                        <div class="komentar2">
                            <?php foreach ($user_comment as $uc) :  if ($k['userid'] == $uc['userid']) : ?>
                                    <img src="/profil_storage/<?= $uc['foto_profil']; ?>" alt="foto_user" onclick="rediirectToPage('/profil-user/<?= $uc['userid']; ?>')" style="cursor:pointer;">
                                    <div class="detail_komentar2">
                                         <p class="komen2-username" onclick="rediirectToPage('/profil-user/<?= $uc['userid']; ?>')" style="cursor:pointer;"><b><?= $uc['username'] ?></b></p>

                                        <p class="komen2-komentar"><?= $k['tgl_komentar'] ?></p>
                                    </div>
                                    <p class="komen2-isi" style="margin-left:20px;"><?= $k['isi_komentar'] ?></p>
                            <?php endif;
                            endforeach; ?>

                            <div class="one-elips">
                                <?php if ($k['userid'] == session()->get('userid')) : ?>
                                    <i class="fa-solid fa-trash" onclick="showDeleteConfirmationKomen2('<?= $k['komentarid']; ?>', '<?= $k['fotoid']; ?>')"></i>
                                <?php endif; ?>
                            </div>

                            <!-- Modal -->
                            <div id="deleteConfirmationModal2<?= $k['komentarid']; ?>" class="modal-komen2">
                                <div class="modal-content-komen2">
                                    <span class="closeKomen2" onclick="closeModalKomen2('<?= $k['komentarid']; ?>')">&times;</span>
                                    <p>Anda yakin ingin menghapus komentar ini?</p>
                                    <div class="button-container-komen2">
                                        <a href="/komentar-delete/<?= $k['komentarid']; ?>/<?= $k['fotoid']; ?>" class="yes-button-komen2" style="margin-right:20px;">Ya</a>
                                        <a href="#" class="no-button-komen2" onclick="closeModalKomen2('<?= $k['komentarid']; ?>')">Tidak</a>
                                    </div>
                                </div>
                            </div>


                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </row>

        <row class="hidden-form-komentar">
            <div class="hidden-four">
                <div class="form_komentar2">
                    <form action="/komentar-save/<?= $foto['fotoid']; ?>" method="post">
                        <input type="text" name="isi_komentar" id="komentar" placeholder="Tulis komentar anda disini...">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </row>
    </div>

</div>

<!-- menampilkan pesan suskes -->
<?php if ($addalbum) : ?>
    <center>
        <p style="color:green; font-size:14px;"><?= $addalbum ?></p>
    </center>
<?php endif; ?>

<?php if ($hpsfoto) : ?>
    <center>
        <p style="color:red; font-size:14px;"><?= $hpsfoto ?></p>
    </center>
<?php endif; ?>


<script src="/js/script.js"></script>
<script src="/js/script2.js"></script>
<script src="/js/scriptkomen.js"></script>
<script src="/js/scriptkomen2.js"></script>
<script src="/js/klik3.js"></script>
<script src="/js/klik33.js"></script>
<script src="/js/klik4.js"></script>
<script src="/js/klik44.js"></script>
<script src="/js/link.js"></script>
<script src="/js/klikbawah.js"></script>


<?= $this->endSection(); ?>