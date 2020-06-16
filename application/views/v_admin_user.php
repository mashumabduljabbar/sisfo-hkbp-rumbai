  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Manajemen User
      </h3>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-header">
					<h3 class="box-title">
					<label>
					<a class="btn-sm btn-primary" href="<?php echo base_url("admin/user_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</label>
					
					<label>
					<select onchange="location = '<?php echo base_url();?>admin/user/'+this.value;" name="user_level" class="btn-sm btn-info" data-placeholder="Pilih Level">
							<option>Pilih Level</option>
							<?php foreach($tbl_user as $user){?>
							<option value="<?php echo $user->user_level;?>"><?php echo $user->user_level;?></option>
							<?php } ?>
					</select>
					</label>
					</h3>
				</div>
				<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Username</th>
						<th>Nama Lengkap</th>
						<th>Level</th>
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
<?php 
$user_level = $this->uri->segment(3);
?>
<script>
var myTable =  $('#datatable').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'order': [[1, 'desc']],
			"ajax": "<?php echo base_url('admin/get_data_master_user/'.$user_level);?>" ,
			columnDefs: [{
				   targets: [3],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<a href='<?php echo base_url();?>admin/user_ubah/"+row[3]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus user ini ?')\" href='<?php echo base_url();?>admin/user_aksi_hapus/"+row[3]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a>";
				   }
				},],
		});
</script>