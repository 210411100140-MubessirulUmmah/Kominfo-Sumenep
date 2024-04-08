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
      <div class="row mt-5">

         <table class="table table-bordered" id="example1">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="30%">Judul</th>
              <th width="30%">Keterangan</th>
              <th width="15%">Author</th>
              <th width="10%">File</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;

foreach ($bankdata as $bankdata) { ?>
            <tr>
              <td class="text-center"><?= $no ?></td>
              <td><?= $bankdata['judul_bankdata'] ?></td>
              <td><?= $bankdata['isi'] ?></td>
              <td><?= $bankdata['nama'] ?></td>
              <td>
                <?php if ($bankdata['gambar'] === '') {
    echo '-';
} else { ?>
                  <a href="<?= base_url('bankdata/unduh/' . $bankdata['id_bankdata']) ?>" class="btn btn-success btn-sm btn-block"><i class="fa fa-download"></i> Unduh</a>
                <?php } ?>
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
<!-- End Contact Section -->

</main><!-- End #main -->