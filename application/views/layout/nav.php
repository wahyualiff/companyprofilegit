<?php
// Site dari konfigurasi
$site_info = $this->konfigurasi_model->listing();

// Menu berita
$menu_berita = $this->konfigurasi_model->menu_berita();
$menu_layanan = $this->konfigurasi_model->menu_layanan();
$menu_profil = $this->konfigurasi_model->menu_profil();
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>"><?php echo $site_info->namaweb ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

                <!-- Home -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
                </li>

                <!-- Berita -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        News
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($menu_berita as $menu_berita) { ?>
                            <a class="dropdown-item" href="<?php echo base_url('berita/kategori/' . $menu_berita->slug_kategori) ?>"><?php echo $menu_berita->nama_kategori ?></a>
                        <?php } ?>

                        <a class="dropdown-item" href="<?php echo base_url('berita') ?>">Index News</a>
                    </div>
                </li>

                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($menu_layanan as $menu_layanan) { ?>
                            <a class="dropdown-item" href="<?php echo base_url('layanan/read/' . $menu_layanan->slug_layanan) ?>"><?php echo $menu_layanan->judul_layanan ?></a>
                        <?php } ?>

                        <a class="dropdown-item" href="<?php echo base_url('layanan') ?>">Index Services</a>
                    </div>
                </li>

                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($menu_profil as $menu_profil) { ?>
                            <a class="dropdown-item" href="<?php echo base_url('berita/read/' . $menu_profil->slug_berita) ?>"><?php echo $menu_profil->judul_berita ?></a>
                        <?php } ?>
                    </div>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('kontak') ?>">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>