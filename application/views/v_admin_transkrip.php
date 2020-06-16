  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Transkrip Nilai
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
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Kelas</th>
						<?php if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='guru'){?><th width="140px"> Action</th><?php }else{ ?><th> </th><?php } ?>
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
			'order': [[0, 'asc'],[1, 'asc']],
			"ajax": "<?php echo base_url($level.'/get_data_master_transkrip/');?>" ,
			columnDefs: [{
				   targets: [3],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<?php if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='guru'){?> <a href='<?php echo base_url().$level;?>/transkripcetak/"+row[3]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-print'></i> Cetak</button></a><?php }?>";
				   }
				},],
		});
</script>