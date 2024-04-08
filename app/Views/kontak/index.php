<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title ?></h2>
        <ol>
          <li><a href="<?= base_url() ?>">Beranda</a></li>
          <li><?= $title ?></li>
        </ol>
      </div>
    </div>
  </section>
<!-- End Breadcrumbs Section -->

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Pengaduan Bisa Dilakukan Pada Kontak dibawah Ini</h2>
        </div>
      </div>

	<div class="container">
		<div class="section-title">
			<p>Hubungi kami jika ada kritik, masukan, dan saran!</p>
		</div>
		<div class="row">
			<div class="col-lg-12 mt-5 mt-lg-0">
      <form action="<?= base_url('kontak/simpan'); ?>" method="POST" data-aos="fade-left">
    <div class="row">
        <div class="col-md-6 form-group mt-0">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name" required>
        </div>
        <div class="col-md-6 form-group mt-0">
            <input type="text" name="email" class="form-control" id="email" placeholder="Your Email" required>
        </div>
    </div>
    <div class="form-group mt-0">
        <input type="text" name="nohp" class="form-control mt-2" id="nohp" placeholder="Your Telephone" required>
    </div>
    <div class="form-group mt-0">
        <textarea class="form-control mt-2" id="message" name="message" rows="5" style="resize: none;" placeholder="Message" required></textarea>
    </div>
    <div class="my-3">
        <p id="ulasan"></p>
    </div>
    <div class="text-center" >
    <button type="submit" class="appointment-btn scrollto" style="border:0px;">Send Message</button>
</div>

</form>

			</div>
		</div>
	</div>

<!-- ======= Previous Reviews Section ======= -->
<section id="previous-reviews" class="mt-5">
    <div class="container">
        <div class="section-title">
            <h2>FAQ</h2>
        </div>

        <!-- Display Previous Reviews and Responses with Toggle -->
        <div id="reviewsList">
            <?php foreach ($previousReviews as $index => $review): ?>
                <div class="review-item">
                    <div class="review-header-box">
                        <div class="review-header" data-toggle="collapse" data-target="#response<?= $index ?>" aria-expanded="true" aria-controls="response<?= $index ?>">
                        <h5 class="mb-0"><strong> <?= $review['message'] ?> <span class="fas toggle-icon fa-angle-right"></span></strong></h5>
                        </div>
                        <div id="response<?= $index ?>" class="collapse" data-parent="#reviewsList">
                        <?php if (!empty($review['balasan'])): ?>
                            
                                <div class="response-body">
                                    <p><strong>Admin Response:</strong> <?= $review['balasan'] ?></p>
                                </div>
                            
                        <?php endif; ?>
                    </div>
                    </div>

                    
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Add these lines to include jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- ... Your existing HTML code ... -->

<script>
    $(document).ready(function () {
        // Initialize Bootstrap components
        $('[data-toggle="collapse"]').collapse();

        // Add a click event listener to handle the icon toggle
        $('.review-header').on('click', function () {
            // Toggle the icon class
            $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
        });
    });
</script>


<style>
    .review-header-box {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .response-body-box {
        border: 1px solid #6c757d;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        background-color: #f8f9fa; /* Light gray background */
    }
</style>

<!-- Add these lines to include Bootstrap CSS and JS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
   $(document).ready(function(){
      // Initialize Bootstrap components
      $('[data-toggle="collapse"]').collapse();
   });
</script>




      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Alamat Kami:</h3>
                  <p><?= nl2br($konfigurasi['alamat']) ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Kami:</h3>
                  <p><?= nl2br($konfigurasi['email']) ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Telepon Kami:</h3>
                  <p><?= nl2br($konfigurasi['telepon']) ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <style type="text/css" media="screen">
              iframe {
                width: 100%;
                min-height: 400px;
              }
            </style>
            <?= $konfigurasi['google_map'] ?>
          </div>
        </div>
      </div>
    </section>
<!-- End Contact Section -->

</main><!-- End #main -->