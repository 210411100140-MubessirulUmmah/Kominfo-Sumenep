<?php use App\Models\Menu_model;

$menu    = new Menu_model();
$berita  = $menu->berita();
$profil  = $menu->profil();
$layanan = $menu->layanan();
$galeri  = $menu->galeri();
$video   = $menu->video();
?>

<!-- ======= Bagian Slider ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        <?php $noslide = 1;

foreach ($slider as $slider) {  ?>
        <div class="carousel-item<?php if ($noslide === 1) {
    echo ' active';
} ?>" style="background-image: url(<?= base_url('assets/upload/image/' . $slider['gambar']) ?>)">
        <?php if ($slider['status_text'] === 'Ya') {  ?>
        <div class="container" style="max-width: 70%; text-align: left; padding-left: 2%; padding-right: 2%;">
            <h2><?= $slider['judul_galeri'] ?></h2>
            <p><?= $slider['isi'] ?></p>
        </div>
          <?php } ?>
        </div>
        <?php $noslide++; } ?>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
      </div>
  </section>
<!-- End Slider -->

  <main id="main">

<!-- ======= Featured Profile Section ======= -->
<section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <?php
      $total_profil = count($profil);

      // Baris Pertama
      for ($i = 0; $i < min(3, $total_profil); $i++) { ?>
        <div class="col-md-6 col-lg-4 text-center d-flex align-items-stretch mb-4">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
            <div class="icon"><i class="<?= $profil[$i]['icon'] ?>"></i></div>
            <h4 class="title"><a href="<?= base_url('berita/profil/' . $profil[$i]['slug_berita']) ?>"><?= $profil[$i]['judul_berita'] ?></a></h4>
            <p class="description"><?= $profil[$i]['ringkasan'] ?></p>
          </div>
        </div>
      <?php } ?>

      <!-- Baris Kedua -->
      <?php for ($i = 3; $i < $total_profil; $i++) { ?>
        <div class="col-md-6 col-lg-6 text-center d-flex align-items-stretch mb-4">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
            <div class="icon"><i class="<?= $profil[$i]['icon'] ?>"></i></div>
            <h4 class="title"><a href="<?= base_url('berita/profil/' . $profil[$i]['slug_berita']) ?>"><?= $profil[$i]['judul_berita'] ?></a></h4>
            <p class="description"><?= $profil[$i]['ringkasan'] ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- End Featured Profile Section -->

<!-- ======= Cta Section ======= -->
    <section id="cta" class="cta" style="background-color:red !important;">
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
          <h3>Selamat datang di <?= $konfigurasi['namaweb'] ?></h3>
          <p><?= $konfigurasi['tagline'] ?></p>
        </div>
      </div>
    </section>
<!-- End Cta Section -->

<!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About <?= $konfigurasi['namaweb'] ?></h2>
         <?= $konfigurasi['deskripsi'] ?>
        </div>
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="<?= icon() ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <?= $konfigurasi['tentang'] ?>
          </div>
        </div>
      </div>
    </section>
<!-- End About Us Section -->

<!-- ======= Produk Hukum Section ======= -->
<section id="services" class="services services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Produk Hukum</h2>
          <p>Yuk gunakan informasi produk hukum yang ada di <?= namaweb() ?> untuk mendapatkan informasi penting</p>
        </div>
        <div class="row">
          <?php $ml = 1;
foreach ($layanan as $layanan) { ?>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="<?= $ml; ?>00">
            <div class="icon"><i class="<?= $layanan['icon'] ?>"></i></div>
            <h4 class="title"><a href="<?= base_url('berita/layanan/' . $layanan['slug_berita']) ?>"><?= $layanan['judul_berita'] ?></a></h4>
            <p class="description"><?= $layanan['ringkasan'] ?></p>
          </div>
          <?php $ml++; } ?>
        </div>
      </div>
</section>
<!-- End Produk Hukum Section -->
  
<!-- ======= Cta Section ======= -->
  <section id="cta" class="cta" style="background-color:red !important;">
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
          <h3>Selamat datang di Galeri & Berita Satpol PP Kabupaten Sumenep</h3>
          <p>Informasi Dalam Rekaman Lensa</p>
        </div>
      </div>
  </section>
<!-- End Cta Section -->

<!-- ======= Gallery Foto Section ======= -->
<section id="gallery" class="gallery">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Galeri Foto</h2>
      <p>Melalui galeri ini, saksikanlah kebahagiaan dan keceriaan yang terpancar dari setiap foto kegiatan kami.</p>
    </div>
    <div class="gallery-slider swiper-container">
      <div class="swiper-wrapper align-items-center">
        <?php foreach ($galeri as $galeri) { ?>
          <div class="swiper-slide">
            <a class="gallery-lightbox" href="<?= base_url('assets/upload/image/' . $galeri['gambar']) ?>">
              <img src="<?= base_url('assets/upload/image/' . $galeri['gambar']) ?>" class="img-fluid" alt="<?= $galeri['judul_galeri'] ?>">
            </a>
          </div>
          <?php } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
<!-- End Gallery Foto Section -->

<!-- ======= Gallery Video Section ======= -->
<section id="contact" class="contact">
    <div class="container">
      <div class="row mt-5">
        <div class="section-title">
          <h2>Galeri Video</h2>
          <p>Saksikan kehidupan setiap kegiatan melalui galeri video kami. Setiap momen, setiap cerita.</p>
        </div>
        <?php foreach ($video as $video) { ?>
         <div class="col-md-6">
           <div class="card" style="margin-bottom: 20px;">
            <div class="card-body">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 300px;"></iframe>
              </div>
              <hr>
              <h3><?= $video['judul'] ?></h3>
              <p class="card-text">
                <?= $video['keterangan'] ?>
              </p>
            </div>
          </div>
         </div>
       <?php } ?>
      </div>
    </div>
  </section>
<!-- End Gallery Video Section -->

<?php include 'berita.php'?>

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div>
        <style type="text/css" media="screen">
          iframe {
            min-height: 300px;
            width: 100%;
          }
        </style>
        <?= google_map() ?>
      </div>
    </section>
<!-- End Contact Section -->

</main><!-- End #main -->