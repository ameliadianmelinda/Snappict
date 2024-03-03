<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/navbar.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?= $this->renderSection('title'); ?>
    <link rel="icon" type="image/png" href="<?= base_url(); ?>/images/s.svg" />
</head>

<body>
    <div class="fContainer">
        <nav class="wrapper">

            <ul class="nav-icon">
                <div class="icon">
                    <img src="<?= base_url(); ?>/images/snappict.svg" alt="logo" class="logo" style="width: 110px; height: 110px;">
                </div>
            </ul>
            <ul class="nav-icon2">
                <div class="icon2">
                    <img src="<?= base_url(); ?>/images/s.svg" alt="logo" class="logo">
                </div>
            </ul>

            <ul class="nav-beranda">
                <li>
                    <?= $this->renderSection('active_nav1'); ?>
                </li>
            </ul>
            <ul class="nav-upload">
                <li>
                    <?= $this->renderSection('active_nav2'); ?>
                </li>
            </ul>
            <ul class="bar">
                <i class="fa-solid fa-bars" onclick="toggleMenu2()"></i>
                <div class="sub-menu-wrap2" id="menuBars">
                <div class="sub-menu2">
                    <a href="/beranda" style="margin-bottom:10px;">Beranda</a>
                    <a href="/upload" style="margin-bottom:10px;">Upload</a>
                </div>
                </div>
            </ul>
            <ul class="nav-search">
                <li>
                    <form action="/search" method="post" class="search-bar">
                        <button type="submit" style="border:0; color:purple;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input autocomplete="off" class="search-input" type="text" placeholder="Search anything" name="keyword">
                    </form>
                </li>
            </ul>

            <ul class="nav-user" style="z-index:1080;">
                <img src="/profil_storage/<?= session()->get('foto'); ?>" alt="user" onclick="toggleMenu()">
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <a href="/profil-postingan/<?= session()->get('userid'); ?>" style="margin-bottom:10px;"><i class="fa-solid fa-user" style="margin-right:20px;"></i>Profil</a>
                        <a href="/setting-akun" style="margin-bottom:10px;"><i class="fa-solid fa-gear" style="margin-right:20px;"></i>Settings</a>
                        <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket" style="margin-right:20px;"></i>Log Out</a>
                    </div>
                </div>
            </ul>
        </nav>
    </div>
    <script src="/js/klik.js"></script>
    <script src="/js/klik2.js"></script>

    <?= $this->renderSection('content'); ?>
    <?= $this->renderSection('createalbum'); ?>
    <?= $this->renderSection('detailalbum'); ?>

</body>

</html>