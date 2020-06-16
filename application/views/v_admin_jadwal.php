  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Manajemen Jadwal
      </h3>
    </section>
<?php 
$level = $this->uri->segment(1);
$pilihmapel = $this->uri->segment(3);
$pilihkelas = $this->uri->segment(4);
$pilihta = $this->uri->segment(5);
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
					<a class="btn-sm btn-primary" href="<?php echo base_url("$level/jadwal_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</label>
					
					<label>
					<select onchange="location = '<?php echo base_url("$level");?>/jadwal/'+this.value+'/<?php echo $pilihkelas;?>/<?php echo $pilihta;?>';" name="mapel_id" class="btn-sm btn-info" data-placeholder="Pilih Mapel">
							<option value="0">Pilih Mapel</option>
							<?php foreach($tbl_mapel as $mapel){?>
							<option value="<?php echo $mapel->mapel_id;?>"><?php echo $mapel->mapel_nama;?></option>
							<?php } ?>
							<option value="0">Pilih Semua</option>
					</select>
					</label>
					
					<label>
					<select onchange="location = '<?php echo base_url("$level");?>/jadwal/<?php echo $pilihmapel;?>/'+this.value+'/<?php echo $pilihta;?>';" name="kelas_id" class="btn-sm btn-info" data-placeholder="Pilih Kelas">
							<option value="0">Pilih Kelas</option>
							<?php foreach($tbl_kelas as $kelas){?>
							<option value="<?php echo $kelas->kelas_id;?>"><?php echo $kelas->kelas_nama;?></option>
							<?php } ?>
							<option value="0">Pilih Semua</option>
					</select>
					</label>
					
					<label>
					<select onchange="location = '<?php echo base_url("$level");?>/jadwal/<?php echo $pilihmapel;?>/<?php echo $pilihkelas;?>/'+this.value;" name="jadwal_tahunajaran" class="btn-sm btn-info" data-placeholder="Pilih Kelas">
							<option value="0">Pilih Tahun Ajaran</option>
							<?php foreach($tbl_jadwal as $jadwal){?>
							<option value="<?php echo $jadwal->jadwal_tahunajaran;?>"><?php echo $jadwal->jadwal_tahunajaran;?></option>
							<?php } ?>
							<option value="0">Pilih Semua</option>
					</select>
					</label>
					
					<label>
					<a class="btn-sm btn-primary" target="_blank" href="<?php echo base_url("$level/cetak_jadwal/".$pilihmapel."/".$pilihkelas."/".$pilihta);?>"><i class="fa fa-print"></i> <span>Cetak Jadwal</span></a>
					</label>
					</h3>
				</div>
				<?php }?>
				<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Nama Kelas</th>
						<th>Jam Pelajaran</th>
						<th>Hari</th>
						<th>Nama Mapel</th>
						<th>Tahun Ajaran</th>
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
$kelas_id = $this->uri->segment(4);
$tahunajaran = $this->uri->segment(5);
?>
<script>
var myTable =  $('#datatable').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'order': [[0, "asc"]],
			"ajax": "<?php echo base_url($level.'/get_data_master_jadwal/'.$mapel_id.'/'.$kelas_id.'/'.$tahunajaran);?>" ,
			columnDefs: [{
				   targets: [2],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					var hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
					return hari[row[2]];
				   }
				},{
				   targets: [5],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<?php if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='guru'){?> <a href='<?php echo base_url().$level;?>/jadwal_ubah/"+row[5]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus jadwal ini ?')\" href='<?php echo base_url().$level;?>/jadwal_aksi_hapus/"+row[5]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a><?php }?>";
				   }
				},],
		});
</script>