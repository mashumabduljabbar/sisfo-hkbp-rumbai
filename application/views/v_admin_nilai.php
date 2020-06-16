  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Manajemen nilai
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
					<a class="btn-sm btn-primary" href="<?php echo base_url("$level/nilai_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</label>
					
					<label>
					<select onchange="location = '<?php echo base_url("$level");?>/nilai/'+this.value;" name="mapel_id" class="btn-sm btn-info" data-placeholder="Pilih Mapel">
							<option>Pilih Mapel</option>
							<?php foreach($tbl_mapel as $mapel){?>
							<option value="<?php echo $mapel->mapel_id;?>"><?php echo $mapel->mapel_nama;?></option>
							<?php } ?>
					</select>
					</label>
					</h3>
				</div>
				<?php }?>
				<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>NISN</th>
						<th>Nama Siswa</th>
						<th>Nama Mapel</th>
						<th>Semester</th>
						<th>Nilai</th>
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
<?php 
$mapel_id = $this->uri->segment(3);
?>
<script>
var myTable =  $('#datatable').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'order': [[1, 'asc'], [2, 'asc'], [3, 'asc']],
			"ajax": "<?php echo base_url($level.'/get_data_master_nilai/'.$mapel_id);?>" ,
			columnDefs: [{
				   targets: [5],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<?php if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='guru'){?> <a href='<?php echo base_url().$level;?>/nilai_ubah/"+row[5]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus nilai ini ?')\" href='<?php echo base_url().$level;?>/nilai_aksi_hapus/"+row[5]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a><?php }?>";
				   }
				},],
		});
</script>