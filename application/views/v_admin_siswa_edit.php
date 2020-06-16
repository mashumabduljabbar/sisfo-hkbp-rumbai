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
				  <?php echo form_open_multipart("admin/siswa_aksi_ubah/".$tbl_siswa->siswa_id); ?>
					<div class="col-md-4">
					  
					  <div class="form-group">
						<label>User Name</label>
						<select data-placeholder="User Name" class="form-control select2" name="user_id">
							<option value="<?php echo $tbl_user_by->user_id;?>"><?php echo $tbl_user_by->user_name." - ".$tbl_user_by->user_namalengkap;?></option>
							<?php foreach($tbl_user as $user){ ?>
							<option value="<?php echo $user->user_id;?>"><?php echo $user->user_name." - ".$user->user_namalengkap;?></option>
							<?php } ?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="siswa_namalengkap" value="<?php echo set_value('siswa_namalengkap', $tbl_siswa->siswa_namalengkap); ?>">
					  </div>
					  <div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control"rows="1" name="siswa_alamat"><?php echo set_value('siswa_alamat', $tbl_siswa->siswa_alamat); ?></textarea>
					  </div>
					  <div class="form-group">
						<label>NISN</label>
						<input type="text" class="form-control" name="siswa_nisn" value="<?php echo set_value('siswa_nisn', $tbl_siswa->siswa_nisn); ?>">
					  </div>
					  <div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" name="siswa_tempatlahir" value="<?php echo set_value('siswa_tempatlahir', $tbl_siswa->siswa_tempatlahir); ?>">
					  </div>
					  <div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" name="siswa_tanggallahir" value="<?php echo set_value('siswa_tanggallahir', $tbl_siswa->siswa_tanggallahir); ?>">
					  </div>
						<div class="form-group">
							<label>NIS</label>
							<input type="text" class="form-control" name="siswa_nis" value="<?php echo set_value('siswa_nis', $tbl_siswa->siswa_nis); ?>">
						</div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Pekerjaan Orang Tua</label>
							<input type="text" class="form-control" name="siswa_pekerjaanorangtua" value="<?php echo set_value('siswa_pekerjaanorangtua', $tbl_siswa->siswa_pekerjaanorangtua); ?>">
						</div>
						<div class="form-group">
							<label>Nama Ayah</label>
							<input type="text" class="form-control" name="siswa_namaayah" value="<?php echo set_value('siswa_namaayah', $tbl_siswa->siswa_namaayah); ?>">
						</div>
						<div class="form-group">
							<label>Nama Ibu</label>
							<input type="text" class="form-control" name="siswa_namaibu" value="<?php echo set_value('siswa_namaibu', $tbl_siswa->siswa_namaibu); ?>">
						</div>
						<div class="form-group">
						<label>Jenis Kelamin</label>
						<select data-placeholder="Jenis Kelamin" class="form-control select2" name="siswa_jeniskelamin">
							<option value="<?php echo set_value('siswa_jeniskelamin', $tbl_siswa->siswa_jeniskelamin); ?>"><?php echo set_value('siswa_jeniskelamin', $tbl_siswa->siswa_jeniskelamin); ?></option>
							<option value="L">L</option>
							<option value="P">P</option>
						</select>
						</div>
						<div class="form-group">
							<label>Agama</label>
							<input type="text" class="form-control" name="siswa_agama" value="<?php echo set_value('siswa_agama', $tbl_siswa->siswa_agama); ?>">
						</div>
						<div class="form-group">
							<label>No. HP Orang Tua</label>
							<input type="text" class="form-control" name="siswa_nohporangtua" value="<?php echo set_value('siswa_nohporangtua', $tbl_siswa->siswa_nohporangtua); ?>">
						</div>
						<div class="form-group">
						<label>Kelas</label>
						<select data-placeholder="Kelas" class="form-control select2" name="kelas_id">
							<option value="<?php echo $tbl_kelas_by->kelas_id; ?>"><?php echo $tbl_kelas_by->kelas_nama; ?></option>
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