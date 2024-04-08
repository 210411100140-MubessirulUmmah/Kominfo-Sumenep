<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Logo</th>
			<th width="20%">Nama</th>
			<th width="20%">Jabatan</th>
			<th width="30%">Kontak</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
    <?php $no = 1; foreach ($staff as $item) : ?>
        <tr>
            <td><?= $no ?></td>
            <td><?php if ($item['gambar'] === '') {
                    echo '-';
                } else { ?>
                    <img src="<?= base_url('assets/upload/staff/thumbs/' . $item['gambar']) ?>" class="img img-thumbnail">
                <?php } ?>
            </td>
            <td><?= $item['nama'] ?>
                <small>
                    <br><i class="fa fa-sitemap"></i> Jenis: <?= $item['nama_kategori_staff'] ?>
                    <br><i class="fa fa-home"></i> Urut: <?= isset($item['urutan']) ? $item['urutan'] : 'N/A' ?>

                </small>
            </td>
            <td><?= $item['jabatan'] ?></td>
            <td><small><i class="fa fa-phone"></i> <?= $item['telepon'] ?>
                    <br><i class="fa fa-envelope"></i> <?= $item['email'] ?>
                    <br><i class="fa fa-globe"></i> <?= $item['website'] ?>
                    <br><i class="fa fa-map"></i> <?= $item['alamat'] ?>
                </small>
            </td>
            <td>
                <a href="<?= base_url('admin/staff/edit/' . $item['id_staff']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="<?= base_url('admin/staff/delete/' . $item['id_staff']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; endforeach; ?>
</tbody>

</table>