  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Tambah Guru
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
				  <?php echo form_open_multipart("admin/guru_aksi_tambah"); ?>
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
						<input type="text" class="form-control" name="guru_namalengkap" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" name="guru_tempatlahir" placeholder="Tempat Lahir">
					  </div>
					  <div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" name="guru_tanggallahir" placeholder="Tanggal Lahir">
					  </div>
					  <div class="form-group">
						<label>NUPTK</label>
						<input type="text" class="form-control" name="guru_nuptk" placeholder="NUPTK">
					  </div>
					  <div class="form-group">
						<label>NRG</label>
						<input type="text" class="form-control" name="guru_nrg" placeholder="NRG">
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
							<option value="L">L</option>
							<option value="P">P</option>
						</select>
					  </div>
					  <div class="form-group">
							<label>Pendidikan Terakhir</label>
							<input type="text" class="form-control" name="guru_pendidikanterakhir" placeholder="Pendidikan Terakhir">
						</div>
						<div class="form-group">
							<label>Tahun Pendidikan</label>
							<input type="text" class="form-control" name="guru_tahunpendidikan" placeholder="Tahun Pendidikan">
						</div>
						<div class="form-group">
							<label>Jurusan</label>
							<input type="text" class="form-control" name="guru_jurusan" placeholder="Jurusan">
						</div>
						<div class="form-group">
							<label>Jabatan</label>
							<input type="text" class="form-control" name="guru_jabatan" placeholder="Jabatan">
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