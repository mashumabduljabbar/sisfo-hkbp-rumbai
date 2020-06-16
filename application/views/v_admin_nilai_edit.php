  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah nilai
      </h3>
    </section>
<?php 
$level = $this->uri->segment(1);
?>
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
				  <?php echo form_open_multipart("$level/nilai_aksi_ubah/".$tbl_nilai->nilai_id); ?>
					<div class="col-md-4">
					 
					  <div class="form-group">
						<label>Nama Siswa</label>
						<select name="user_id" class="form-control select2" data-placeholder="Pilih user">
							<option value="<?php echo $tbl_user_by->user_id;?>"><?php echo $tbl_user_by->siswa_namalengkap;?></option>
							<?php foreach($tbl_user as $user){?>
							<option value="<?php echo $user->user_id;?>"><?php echo $user->siswa_namalengkap;?></option>
							<?php } ?>
						</select>
					  </div>
					   <div class="form-group">
						<label>Nama Mapel</label>
						<select name="mapel_id" class="form-control select2" data-placeholder="Pilih Mapel">
							<option value="<?php echo $tbl_mapel_by->mapel_id;?>"><?php echo $tbl_mapel_by->mapel_nama;?></option>
							<?php foreach($tbl_mapel as $mapel){?>
							<option value="<?php echo $mapel->mapel_id;?>"><?php echo $mapel->mapel_nama;?></option>
							<?php } ?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Semester</label>
						<input type="text" class="form-control" name="nilai_semester" value="<?php echo set_value('nilai_semester', $tbl_nilai->nilai_semester); ?>">
					  </div>
					  <div class="form-group">
						<label>Nilai</label>
						<input type="text" class="form-control" name="nilai_value" value="<?php echo set_value('nilai_value', $tbl_nilai->nilai_value); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
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