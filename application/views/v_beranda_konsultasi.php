  <div class="content-wrapper" >
<?php 
$level = $this->uri->segment(1);
?>
    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("$level/konsultasi_aksi_tambah"); ?>
						<div class="col-md-4">
							<h4 class="box-title">
								<span>FORM KONSULTASI MASYARAKAT DAN WALIMURID</span>
							</h4>
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
						<div class="col-md-8">
							<h4 class="box-title">
								<span>KONSULTASI DAN TANYA JAWAB KE PIHAK SEKOLAH</span>
							</h4>
							<table id="datatable" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>Nama Pengirim</th>
								<th>Isi Pesan</th>
								<th>Balasan</th>
								<th>Dibuat</th>
								<th>Dibalas</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						  </table>
						</div>
				  </div>
				</div>
			</div>
		</div>
      </div>
    </section>
  </div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script>
var myTable =  $('#datatable').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'order': [[3, 'desc']],
			"ajax": "<?php echo base_url($level.'/get_data_master_konsultasi/');?>" ,
			columnDefs: [],
		});
</script>