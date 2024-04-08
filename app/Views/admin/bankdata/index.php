<p>
	<a href="<?= base_url('admin/bankdata/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="10%">File</th>
			<th width="30%">Judul</th>
			<th width="15%">Kategori</th>
			<th width="15%">Jenis</th>
			<th width="15%">Author</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($bankdata as $bankdata) { ?>
		<tr>
			<td><?= $no ?></td>
			<td>
				<?php if ($bankdata['gambar'] === '') {
    echo '-';
} else { ?>
					<a href="<?= base_url('admin/bankdata/unduh/' . $bankdata['id_bankdata']) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Unduh</a>
				<?php } ?>
			</td>
			<td><?= $bankdata['judul_bankdata'] ?>
				<small>
					<br><i class="fa fa-link"></i> <?= $bankdata['website'] ?>
				</small>
			</td>
			<td><?= $bankdata['nama_kategori_download'] ?></td>
			<td><?= $bankdata['jenis_bankdata'] ?></td>
			<td><?= $bankdata['nama'] ?></td>
			<td>

				<a href="<?= base_url('admin/bankdata/edit/' . $bankdata['id_bankdata']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/bankdata/delete/' . $bankdata['id_bankdata']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>