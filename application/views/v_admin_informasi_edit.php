  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah informasi
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
				  <?php echo form_open_multipart("admin/informasi_aksi_ubah/".$tbl_informasi->informasi_id); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="kategori_id">
						<option value="<?php echo $tbl_kategori_by->kategori_id;?>"><?php echo $tbl_kategori_by->kategori_nama;?></option>
						<?php foreach($tbl_kategori as $kategori){?>
						<option value="<?php echo $kategori->kategori_id;?>"><?php echo $kategori->kategori_nama;?></option>
						<?php } ?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Judul Informasi</label>
						<input type="text" class="form-control" name="informasi_judul" value="<?php echo set_value('informasi_judul', $tbl_informasi->informasi_judul); ?>">
					  </div>
					  <div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" name="informasi_keterangan"><?php echo set_value('informasi_keterangan', $tbl_informasi->informasi_keterangan); ?></textarea>
					  </div>
					  <div class="form-group">
						<label>Foto</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="informasi_foto" value="<?php echo set_value('informasi_foto', $tbl_informasi->informasi_foto); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah" src="<?php echo base_url();?>assets/dist/img/informasi/<?php echo $tbl_informasi->informasi_foto."?".strtotime("now");?>">
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