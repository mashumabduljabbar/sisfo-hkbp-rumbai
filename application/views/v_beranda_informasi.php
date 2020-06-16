  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
       <?php if($this->session->userdata('level')=='admin'){?> Manajemen Informasi<?php }else{?> Informasi Sekolah<?php }?>
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
				<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Judul Informasi</th>
						<th>Kategori</th>
						<th>Keterangan</th>
						<th>Foto</th>
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
			'order': [[0, 'asc']],
			"ajax": "<?php echo base_url($level.'/get_data_master_informasi/');?>" ,
			columnDefs: [{
				   targets: [3],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<img height='40px' src='<?php echo base_url();?>assets/dist/img/informasi/"+row[3]+"'>";
				   }
				}],
		});
</script>