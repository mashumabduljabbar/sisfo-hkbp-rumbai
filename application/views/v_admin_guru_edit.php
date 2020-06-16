  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah Guru
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
				  <?php echo form_open_multipart("admin/guru_aksi_ubah/".$tbl_guru->guru_id); ?>
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
						<input type="text" class="form-control" name="guru_namalengkap" value="<?php echo set_value('guru_namalengkap', $tbl_guru->guru_namalengkap); ?>">
					  </div>
					  <div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" name="guru_tempatlahir" value="<?php echo set_value('guru_tempatlahir', $tbl_guru->guru_tempatlahir); ?>">
					  </div>
					  <div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" name="guru_tanggallahir" value="<?php echo set_value('guru_tanggallahir', $tbl_guru->guru_tanggallahir); ?>">
					  </div>
					  <div class="form-group">
						<label>NUPTK</label>
						<input type="text" class="form-control" name="guru_nuptk" value="<?php echo set_value('guru_nuptk', $tbl_guru->guru_nuptk); ?>">
					  </div>
					  <div class="form-group">
						<label>NRG</label>
						<input type="text" class="form-control" name="guru_nrg" value="<?php echo set_value('guru_nrg', $tbl_guru->guru_nrg); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Jenis Kelamin</label>
						<select data-placeholder="Jenis Kelamin" class="form-control select2" name="guru_jeniskelamin">
							<option></option>
							<option value="<?php echo set_value('guru_jeniskelamin', $tbl_guru->guru_jeniskelamin); ?>"><?php echo set_value('guru_jeniskelamin', $tbl_guru->guru_jeniskelamin); ?></option>
							<option value="L">L</option>
							<option value="P">P</option>
						</select>
					  </div>
					  <div class="form-group">
							<label>Pendidikan Terakhir</label>
							<input type="text" class="form-control" name="guru_pendidikanterakhir" value="<?php echo set_value('guru_pendidikanterakhir', $tbl_guru->guru_pendidikanterakhir); ?>">
						</div>
						<div class="form-group">
							<label>Tahun Pendidikan</label>
							<input type="text" class="form-control" name="guru_tahunpendidikan" value="<?php echo set_value('guru_tahunpendidikan', $tbl_guru->guru_tahunpendidikan); ?>">
						</div>
						<div class="form-group">
							<label>Jurusan</label>
							<input type="text" class="form-control" name="guru_jurusan" value="<?php echo set_value('guru_jurusan', $tbl_guru->guru_jurusan); ?>">
						</div>
						<div class="form-group">
							<label>Jabatan</label>
							<input type="text" class="form-control" name="guru_jabatan" value="<?php echo set_value('guru_jabatan', $tbl_guru->guru_jabatan); ?>">
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