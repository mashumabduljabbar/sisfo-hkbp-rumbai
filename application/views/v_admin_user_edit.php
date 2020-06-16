  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah User
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
					<?php if($this->uri->segment(4)=="err"){?>
						<p style="color:red;"><i>Username telah digunakan oleh akun lain.</i></p>
					<?php }?>
				</div>
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("admin/user_aksi_ubah/".$tbl_user->user_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="user_name[]" value="<?php echo set_value('user_name', $tbl_user->user_name); ?>">
						<input type="hidden" class="form-control" name="user_name[]" value="<?php echo set_value('user_name', $tbl_user->user_name); ?>">
					  </div>
					  <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="user_password[]" value="<?php echo set_value('user_password', $tbl_user->user_password); ?>">
						<input type="hidden" class="form-control" name="user_password[]" value="<?php echo set_value('user_password', $tbl_user->user_password); ?>">
					  </div>
					  <div class="form-group">
						<label>Level</label>
						<select type="text" class="form-control select2" name="user_level">
							<option value="<?php echo set_value('user_level', $tbl_user->user_level); ?>"><?php echo ucfirst($tbl_user->user_level); ?></option>
							<option value="admin">Admin</option>
							<option value="guru">Guru</option>
							<option value="siswa">Siswa</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="user_namalengkap" value="<?php echo set_value('user_namalengkap', $tbl_user->user_namalengkap); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Foto Profile</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="user_foto" value="<?php echo set_value('user_foto', $tbl_user->user_foto); ?>">
					  </div>
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah" src="<?php echo base_url();?>assets/dist/img/avatar/<?php echo $tbl_user->user_foto."?".strtotime("now");?>">
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