<form action="<?= base_url('admin/bankdata/tambah') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>

<div class="form-group row">
	<label class="col-md-2">Judul Bank Data</label>
	<div class="col-md-10">
		<input type="text" name="judul_bankdata" class="form-control" value="<?= set_value('judul_bankdata') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Upload File</label>
	<div class="col-md-10">
		<input type="file" name="gambar" class="form-control" value="<?= set_value('gambar') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Kategori, Jenis &amp; Status</label>
	<div class="col-md-3">
		<select name="id_kategori_download" class="form-control">
			<?php foreach ($kategori_download as $kategori_download) { ?>
			<option value="<?= $kategori_download['id_kategori_download'] ?>">
				<?= $kategori_download['nama_kategori_download'] ?>
			</option>
			<?php } ?>
		</select>
		<small class="text-secondary">Kategori</small>
	</div>
	<div class="col-md-3">
		<select name="jenis_bankdata" class="form-control">
			<option value="bankdata">Bank Data</option>
		</select>
		<small class="text-secondary">Jenis konten</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Isi Bank Data</label>
	<div class="col-md-10">
		<textarea name="isi" class="form-control konten"><?= set_value('isi') ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Link/URL</label>
	<div class="col-md-10">
		<input type="text" name="website" class="form-control" value="<?= set_value('website') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2"></label>
	<div class="col-md-10">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>