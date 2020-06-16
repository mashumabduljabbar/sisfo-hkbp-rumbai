  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Balas Konsultasi
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
				  <?php echo form_open_multipart("$level/konsultasi_aksi_balas/".$tbl_konsultasi->konsultasi_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Tanggal Posting</label>
						<input type="text" class="form-control" readonly value="<?php echo $tbl_konsultasi->konsultasi_created; ?>">
					  </div>
					  <div class="form-group">
						<label>Nama Pengirim</label>
						<input type="text" class="form-control" readonly value="<?php echo $tbl_konsultasi->konsultasi_namapengirim; ?>">
					  </div>
					  <div class="form-group">
						<label>Kontak Pengirim</label>
						<input type="text" class="form-control" readonly value="<?php echo $tbl_konsultasi->konsutasi_nopengirim; ?>">
					  </div>
					  <div class="form-group">
						<label>Alamat Pengirim</label>
						<input type="text" class="form-control" readonly value="<?php echo $tbl_konsultasi->konsultasi_alamatpengirim; ?>">
					  </div>
					  <div class="form-group">
						<label>Isi Pesan</label>
						<textarea class="form-control" readonly><?php echo $tbl_konsultasi->konsultasi_pesan; ?></textarea>
					  </div>
					  <div class="form-group">
						<label>Isi Balasan</label>
						<textarea class="form-control" name="konsultasi_balasan" placeholder="Isi Balasan"></textarea>
					  </div>
					  <div class="form-group">
						<input type="submit" value="Balas" class="btn btn-success">
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