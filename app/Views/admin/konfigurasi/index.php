<?= form_open(base_url('admin/konfigurasi'));
echo csrf_field();
?>

<h4>Informasi Dasar</h4>
<hr>
<div class="form-group row">
	<label class="col-3">Nama Website</label>
	<div class="col-9">
		<input type="text" name="namaweb" class="form-control" value="<?= $konfigurasi['namaweb'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Singkatan Website</label>
	<div class="col-9">
		<input type="text" name="singkatan" class="form-control" value="<?= $konfigurasi['singkatan'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Tagline Website</label>
	<div class="col-9">
		<input type="text" name="tagline" class="form-control" value="<?= $konfigurasi['tagline'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Alamat Website</label>
	<div class="col-9">
		<input type="text" name="website" class="form-control" value="<?= $konfigurasi['website'] ?>">
	</div>
</div>

<h4>Informasi Profil Website/Aplikasi</h4>
<hr>
<div class="form-group row">
	<label class="col-3">Tentang Website</label>
	<div class="col-9">
		<textarea name="tentang" class="form-control konten" rows="5"><?= $konfigurasi['tentang'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Deskripsi Ringkas</label>
	<div class="col-9">
		<textarea name="deskripsi" class="form-control"><?= $konfigurasi['deskripsi'] ?></textarea>
	</div>
</div>

<h4>Kontak dan Alamat</h4>
<hr>

<div class="form-group row">
	<label class="col-3">Official Email</label>
	<div class="col-9">
		<input type="text" name="email" class="form-control" value="<?= $konfigurasi['email'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Secondary Email</label>
	<div class="col-9">
		<input type="text" name="email_cadangan" class="form-control" value="<?= $konfigurasi['email_cadangan'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Telepon</label>
	<div class="col-9">
		<input type="text" name="telepon" class="form-control" value="<?= $konfigurasi['telepon'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">HP</label>
	<div class="col-9">
		<input type="text" name="hp" class="form-control" value="<?= $konfigurasi['hp'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Alamat</label>
	<div class="col-9">
		<textarea name="alamat" class="form-control summernote"><?= $konfigurasi['alamat'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Google Map</label>
	<div class="col-9">
		<textarea name="google_map" class="form-control"><?= $konfigurasi['google_map'] ?></textarea>
	</div>
</div>

<h4>Jejaring Sosial</h4>
<hr>

<div class="form-group row">
	<label class="col-3">Facebook <i class="fab fa-facebook"></i></label>
	<div class="col-3">
		<input type="text" name="nama_facebook" class="form-control" value="<?= $konfigurasi['nama_facebook'] ?>">
		<small class="text-secondary">Nama akun</small>
	</div>
	<div class="col-6">
		<input type="text" name="facebook" class="form-control" value="<?= $konfigurasi['facebook'] ?>">
		<small class="text-secondary">Alamat link akun</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Instagram <i class="fab fa-instagram"></i></label>
	<div class="col-3">
		<input type="text" name="nama_instagram" class="form-control" value="<?= $konfigurasi['nama_instagram'] ?>">
		<small class="text-secondary">Nama akun</small>
	</div>
	<div class="col-6">
		<input type="text" name="instagram" class="form-control" value="<?= $konfigurasi['instagram'] ?>">
		<small class="text-secondary">Alamat link akun</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Youtube <i class="fab fa-youtube"></i></label>
	<div class="col-3">
		<input type="text" name="nama_youtube" class="form-control" value="<?= $konfigurasi['nama_youtube'] ?>">
		<small class="text-secondary">Nama akun</small>
	</div>
	<div class="col-6">
		<input type="text" name="youtube" class="form-control" value="<?= $konfigurasi['youtube'] ?>">
		<small class="text-secondary">Alamat link akun</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>