<?php 
$user_id = $this->session->userdata("userid");?>
  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Manajemen Konsultasi
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
				<!-- /.box-header -->
				<div class="box-header">
					<h3 class="box-title">
					<label>
					<a class="btn-sm btn-primary" href="<?php echo base_url("$level/konsultasi_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</label>
					</h3>
				</div>
				<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Nama Pengirim</th>
						<th>Isi Pesan</th>
						<th>Balasan</th>
						<th>Created</th>
						<th>Replyed</th>
						<th width="140px">Action</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				  </table>
				</div>
				<!-- /.box-body -->
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
			columnDefs: [{
				   targets: [5],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<a href='<?php echo base_url().$level;?>/konsultasi_balas/"+row[5]+"'> <button type='button' class='btn btn-sm btn-success'><i class='fa fa-mail-reply-all'></i> Balas</button></a> <?php if($this->session->userdata('level')=='admin'){?><a onclick=\"return confirm('Yakin untuk menghapus user ini ?')\" href='<?php echo base_url().$level;?>/konsultasi_aksi_hapus/"+row[5]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a><?php } ?>";
				   }
				},],
		});
</script>