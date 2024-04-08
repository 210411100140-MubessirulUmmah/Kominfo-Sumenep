<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title ?></h2>
        <ol>
          <li><a href="<?= base_url() ?>">Home</a></li>
          <li><?= $title ?></li>
        </ol>
      </div>
    </div>
  </section><!-- End Breadcrumbs Section -->

  <!-- ======= Doctors Section ======= -->
  <section id="doctors" class="doctors section-bg">
  <div class="container" data-aos="fade-up">
    <div class="card">
      <div class="card-header">
        <h2><?= $title ?></h2>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Kategori Staff</th>
                <th>Gambar</th>
                <th>Status Staff</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($staffList as $staff) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $staff['nama'] ?></td>
                  <td><?= $staff['jabatan'] ?></td>
                  <td><?= $staff['nama_kategori_staff'] ?></td>
                  <td><img src="<?= base_url('assets/upload/staff/' . $staff['gambar']) ?>" alt="<?= $staff['nama'] ?>" style="width: 100px; height: 100px;"></td>
                  <td><?= $staff['status_staff'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Doctors Section -->
</main><!-- End #main -->
