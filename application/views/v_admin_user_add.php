  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Tambah User
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
					<?php if($this->uri->segment(3)=="err"){?>
						<p style="color:red;"><i>Username telah digunakan oleh akun lain.</i></p>
					<?php }?>
				</div>
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("admin/user_aksi_tambah"); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="user_name" placeholder="Username">
					  </div>
					  <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="user_password" placeholder="Password">
					  </div>
					  <div class="form-group">
						<label>Level</label>
						<select data-placeholder="Level" type="text" class="form-control select2" name="user_level">
							<option></option>
							<option value="admin">Admin</option>
							<option value="guru">Guru</option>
							<option value="siswa">Siswa</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="user_namalengkap" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Foto Profile</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
					  </div>
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah">
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