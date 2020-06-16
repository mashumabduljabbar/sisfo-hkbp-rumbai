  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah Mapel
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
				  <?php echo form_open_multipart("admin/mapel_aksi_ubah/".$tbl_mapel->mapel_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama Mapel</label>
						<input type="text" class="form-control" name="mapel_nama" value="<?php echo set_value('mapel_nama', $tbl_mapel->mapel_nama); ?>">
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