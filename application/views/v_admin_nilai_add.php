  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Tambah Nilai
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
				  <?php echo form_open_multipart("$level/nilai_aksi_tambah"); ?>
					<div class="col-md-4">
					 
					  <div class="form-group">
						<label>Pilih Kelas</label>
						<select onchange="location = '<?php echo base_url("$level");?>/nilai_tambah/'+this.value;" class="form-control select2" data-placeholder="Pilih Kelas">
							<option><?php echo $kelas_nama;?></option>
							<?php foreach($tbl_kelas as $kelas){?>
							<option value="<?php echo $kelas->kelas_id;?>"><?php echo $kelas->kelas_nama;?></option>
							<?php } ?>
					</select>
					  </div>
					  <div class="form-group">
						<label>Nama Siswa</label>
						<select name="user_id" class="form-control select2" data-placeholder="Pilih Siswa">
							<option></option>
							<?php foreach($tbl_siswa as $siswa){?>
							<option value="<?php echo $siswa->user_id;?>"><?php echo $siswa->siswa_namalengkap;?></option>
							<?php } ?>
						</select>
					  </div>
					   <div class="form-group">
						<label>Nama Mapel</label>
						<select name="mapel_id" class="form-control select2" data-placeholder="Pilih Mapel">
							<option></option>
							<?php foreach($tbl_mapel as $mapel){?>
							<option value="<?php echo $mapel->mapel_id;?>"><?php echo $mapel->mapel_nama;?></option>
							<?php } ?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Semester</label>
						<input type="number" min="1" max="6" class="form-control" name="nilai_semester" placeholder="Semester">
					  </div>
					  <div class="form-group">
						<label>Nilai</label>
						<input step="0.01" type="number" min="0" max="100" class="form-control" name="nilai_value" placeholder="Nilai">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
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