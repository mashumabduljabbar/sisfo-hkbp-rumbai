  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Manajemen Tugas
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
				<?php if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='guru'){?> <div class="box-header">
					<h3 class="box-title">
					<label>
					<a class="btn-sm btn-primary" href="<?php echo base_url("$level/tugas_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</label>
					</h3>
				</div>
				<?php }?>
				<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Nama Tugas</th>
						<th>Kelas</th>
						<th>Mapel</th>
						<th>File</th>
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
			'order': [[0, 'asc']],
			"ajax": "<?php echo base_url($level.'/get_data_master_tugas/');?>" ,
			columnDefs: [{
				   targets: [3],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					var s = row[3];
					if (s.match(/.pdf/)) {
						return "<a href='<?php echo base_url();?>assets/dist/img/tugas/"+row[3]+"' target='_blank'><img height='40px' src='<?php echo base_url();?>assets/dist/img/pdf.png'></a>";
					}else{
						return "<a href='<?php echo base_url();?>assets/dist/img/tugas/"+row[3]+"' target='_blank'><img height='40px' src='<?php echo base_url();?>assets/dist/img/tugas/"+row[3]+"'></a>";
					}
				   }
				},{
				   targets: [4],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<?php if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='guru'){?> <a href='<?php echo base_url().$level;?>/tugas_ubah/"+row[4]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus user ini ?')\" href='<?php echo base_url().$level;?>/tugas_aksi_hapus/"+row[4]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a><?php }?>";
				   }
				},],
		});
</script>