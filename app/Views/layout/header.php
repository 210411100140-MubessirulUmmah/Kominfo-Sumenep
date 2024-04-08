<?php use App\Models\Konfigurasi_model;
use App\Models\Menu_model;

$konfigurasi  = new Konfigurasi_model();
$menu         = new Menu_model();
$site         = $konfigurasi->listing();
$menu_berita  = $menu->berita();
$menu_profil  = $menu->profil();
$menu_layanan = $menu->layanan();
$menu_download = $menu->download();
?>
<!-- ======= Top Bar ======= -->
  <div id="topbar" style="background-color:red !important;" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="fa fa-home"></i> <?= tagline(); ?>
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> <?= telepon() ?>
      </div>
    </div>
  </div>

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="index.html" class="logo me-auto img-fluid"><img src="<?= base_url('assets/upload/image/' . $site['logo']) ?>" alt="<?= $site['namaweb'] ?>"></a>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="<?= base_url() ?>">Beranda</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('staff') ?>">Data Pegawai</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($menu_profil as $menu_profil) { ?>
              <li><a href="<?= base_url('berita/profil/' . $menu_profil['slug_berita']) ?>"><?= $menu_profil['judul_berita'] ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <li class="dropdown"><a href="<?= base_url('berita') ?>"><span>Publikasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($menu_berita as $menu_berita) { ?>
              <li><a href="<?= base_url('berita/kategori/' . $menu_berita['slug_kategori']) ?>"><?= $menu_berita['nama_kategori'] ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Produk Hukum</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($menu_layanan as $menu_layanan) { ?>
              <li><a href="<?= base_url('berita/layanan/' . $menu_layanan['slug_berita']) ?>"><?= $menu_layanan['judul_berita'] ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="<?= base_url('download') ?>">Download</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('kontak') ?>">Pengaduan</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('bankdata') ?>">Bank Data</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="<?= base_url('login') ?>" class="appointment-btn scrollto">
        Login <span class="d-none d-md-inline">Admin</span>
      </a>
    </div>
  </header>
<!-- End Header -->