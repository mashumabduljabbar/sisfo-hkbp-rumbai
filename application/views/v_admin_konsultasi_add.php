  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Tambah Konsultasi
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
				  <?php echo form_open_multipart("$level/konsultasi_aksi_tambah"); ?>
					<div class="col-md-4">
					  <div class="form-group">
							<label>Nama Pengirim</label>
							<input type="text" class="form-control" name="konsultasi_namapengirim" placeholder="Nama Pengirim">
						  </div>
						  <div class="form-group">
							<label>No. Telp</label>
							<input type="text" class="form-control" name="konsutasi_nopengirim" placeholder="Nama Pengirim">
						  </div>
						  <div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="konsultasi_alamatpengirim" placeholder="Alamat"></textarea>
						  </div>
						  <div class="form-group">
							<label>Isi Pesan</label>
							<textarea class="form-control" name="konsultasi_pesan" placeholder="Isi Pesan"></textarea>
						  </div>
						  <div class="form-group">
							<input onclick="return confirm('Yakin untuk mengirim konsultasi ini ?')" type="submit" value="Submit" class="btn btn-success">
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