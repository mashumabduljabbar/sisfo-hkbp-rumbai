  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Manajemen Siswa
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
					<a class="btn-sm btn-primary" href="<?php echo base_url("admin/siswa_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</label>
					</h3>
				</div>
				<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped " cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>NISN</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>NIS</th>
						<th>Pekerjaan Orang Tua</th>
						<th>Nama Ayah</th>
						<th>Nama Ibu</th>
						<th>Jenis Kelamin</th>
						<th>Agama</th>
						<th>No. HP Ortu</th>
						<th>Kelas</th>
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
			"scrollX": true,
			'order': [[0, 'asc']],
			"ajax": "<?php echo base_url('admin/get_data_master_siswa/');?>" ,
			columnDefs: [{
				   targets: [13],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<a href='<?php echo base_url();?>admin/siswa_ubah/"+row[13]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus siswa ini ?')\" href='<?php echo base_url();?>admin/siswa_aksi_hapus/"+row[13]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a>";
				   }
				},],
		});
</script>