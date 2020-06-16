  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah Materi
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
				  <?php echo form_open_multipart("$level/materi_aksi_ubah/".$tbl_materi->materi_id); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Nama Materi</label>
						<input type="text" class="form-control" name="materi_nama" value="<?php echo set_value('materi_nama', $tbl_materi->materi_nama); ?>">
					  </div>
					  <div class="form-group">
						<label>Nama Kelas</label>
						<select name="kelas_id" class="form-control select2" data-placeholder="Pilih Kelas">
							<option value="<?php echo $tbl_kelas_by->kelas_id;?>"><?php echo $tbl_kelas_by->kelas_nama;?></option>
							<?php foreach($tbl_kelas as $kelas){?>
							<option value="<?php echo $kelas->kelas_id;?>"><?php echo $kelas->kelas_nama;?></option>
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
						<label>File</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="materi_file" value="<?php echo set_value('materi_file', $tbl_materi->materi_file); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah" src="<?php echo base_url();?>assets/dist/img/materi/<?php echo $tbl_materi->materi_file."?".strtotime("now");?>">
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