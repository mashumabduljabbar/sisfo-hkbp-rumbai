  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Tambah siswa
      </h3>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<span>Silahkan melengkapi form berikut</span>
					</h3>
				</div>
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("admin/siswa_aksi_tambah"); ?>
					<div class="col-md-4">
					  
					  <div class="form-group">
						<label>User Name</label>
						<select data-placeholder="User Name" class="form-control select2" name="user_id">
							<option></option>
							<?php foreach($tbl_user as $user){ ?>
							<option value="<?php echo $user->user_id;?>"><?php echo $user->user_name." - ".$user->user_namalengkap;?></option>
							<?php } ?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="siswa_namalengkap" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control"rows="1" name="siswa_alamat" placeholder="Alamat"></textarea>
					  </div>
					  <div class="form-group">
						<label>NISN</label>
						<input type="text" class="form-control" name="siswa_nisn" placeholder="NISN">
					  </div>
					  <div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" name="siswa_tempatlahir" placeholder="Tempat Lahir">
					  </div>
					  <div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" name="siswa_tanggallahir" placeholder="Tanggal Lahir">
					  </div>
						<div class="form-group">
							<label>NIS</label>
							<input type="text" class="form-control" name="siswa_nis" placeholder="NIS">
						</div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Pekerjaan Orang Tua</label>
							<input type="text" class="form-control" name="siswa_pekerjaanorangtua" placeholder="Pekerjaan Orang Tua">
						</div>
						<div class="form-group">
							<label>Nama Ayah</label>
							<input type="text" class="form-control" name="siswa_namaayah" placeholder="Nama Ayah">
						</div>
						<div class="form-group">
							<label>Nama Ibu</label>
							<input type="text" class="form-control" name="siswa_namaibu" placeholder="Nama Ibu">
						</div>
						<div class="form-group">
						<label>Jenis Kelamin</label>
						<select data-placeholder="Jenis Kelamin" class="form-control select2" name="siswa_jeniskelamin">
							<option></option>
							<option value="L">L</option>
							<option value="P">P</option>
						</select>
						</div>
						<div class="form-group">
							<label>Agama</label>
							<input type="text" class="form-control" name="siswa_agama" placeholder="Agama">
						</div>
						<div class="form-group">
							<label>No. HP Orang Tua</label>
							<input type="text" class="form-control" name="siswa_nohporangtua" placeholder="No. HP Orang Tua">
						</div>
						<div class="form-group">
						<label>Kelas</label>
						<select data-placeholder="Kelas" class="form-control select2" name="kelas_id">
							<option></option>
							<?php foreach($tbl_kelas as $kelas){ ?>
							<option value="<?php echo $kelas->kelas_id;?>"><?php echo $kelas->kelas_nama;?></option>
							<?php } ?>
						</select>
					  </div>
					</div>
					<?php echo form_close(); ?>
				  </div>
				</div>
			</div>
		</div>
      </div>
    </section>
  </div>
 <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>