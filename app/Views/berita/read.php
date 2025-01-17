<?php
use App\Models\Berita_model;

$m_berita = new Berita_model();
$sidebar  = $m_berita->sidebar();
?>

<main id="main">
  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title ?></h2>
      </div>
    </div>
  </section><!-- End Breadcrumbs Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-8">
          <div class="card" style="margin-bottom: 20px;">
            <img src="<?= base_url('assets/upload/image/' . $berita['gambar']) ?>">
            <div class="card-body">
              <h3><?= $berita['judul_berita'] ?></h3>
              
              <!-- Display the author name, post date, and view count -->
              <style>
    .post-details {
        display: flex;
        /* justify-content: space-between; */
        align-items: center;
        margin-bottom: 10px; /* Adjust the margin as needed */
    }
    
    .post-details p {
        margin-right: 20px; /* Remove default margin on paragraphs */
    }
</style>

<div class="post-details">
    <?php if (!empty($berita['nama'])): ?>
        <p><span class="fa fa-user">&nbsp;&nbsp;</span> <?= $berita['nama'] ?></p>
    <?php endif; ?>
    <?php if (!empty($berita['tanggal_post'])): ?>
        <p><span class="fa fa-calendar">&nbsp;&nbsp;</span> <?= date('F j, Y', strtotime($berita['tanggal_post'])) ?></p>
    <?php endif; ?>
    <?php if (!empty($berita['hits'])): ?>
        <p><span class="fa fa-eye">&nbsp;&nbsp;</span><?= $berita['hits']+1?> Kali Dilihat</p>
    <?php endif; ?>
</div>

<div style="text-align: justify;">
    <?= $berita['isi'] ?>
</div>

              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3>Berita Lainnya</h3>
            </div>
            <div class="card-body">
              <?php foreach ($sidebar as $sidebarItem) { ?>
                <div class="row">
                  <div class="col-3">
                    <?php if ($sidebarItem['gambar'] === '') { ?>
                      <img src="<?= icon() ?>" class="img img-thumbnail">
                    <?php } else { ?>
                      <img src="<?= base_url('assets/upload/image/thumbs/' . $sidebarItem['gambar']) ?>" class="img img-thumbnail">
                    <?php } ?>
                  </div>
                  <div class="col-9">
                    <h4 style="font-size: 18px;">
                      <a href="<?= base_url('berita/read/' . $sidebarItem['slug_berita']) ?>">
                        <?= $sidebarItem['judul_berita'] ?>
                      </a>
                    </h4>
                    <small class="text-gray-dark"><i class="fa fa-eye"></i> <?= $sidebarItem['hits'] ?> views</small>
                  </div>
                  <div class="clearfix">
                    <br>
                  </div>
                  <hr>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->
