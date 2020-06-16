<style>
table.items {
	border: 0.2px solid black;
}

.items td {
	border: 0.2px solid black;
	padding: 0.3em;
}

.items th {
	text-align: center;
	border: 0.2px solid black;
	padding: 0.3em;
}
</style>
  <div class="content-wrapper ">
    <section class="content-header">
      <h3>
        Jadwal Pelajaran
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
					<a class="btn-sm btn-primary" target="_blank" href="<?php echo base_url("siswa/cetak_jadwal");?>"><i class="fa fa-print"></i> <span>Cetak Jadwal</span></a>
					</label>
					</h3>
				</div>
				<div class="box-body">
<?php
$tahunajaranmax = $this->db->query("select max(jadwal_tahunajaran) as jadwal_tahunajaran from tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
	AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id")->row();
	
$jumlah_hari = $this->db->query("select max(jadwal_hari) as jadwal_hari from tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
	AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id AND tbl_jadwal.jadwal_tahunajaran='$tahunajaranmax->jadwal_tahunajaran' ")->row();

$hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
?>
<table width='100%' class="items">
<tr>
	<th colspan="<?php echo $jumlah_hari->jadwal_hari+1;?>" style="text-align:left;">Kelas <?php echo $tbl_kelas->kelas_nama;?></th>
</tr>
	<tr>
<?php for($x = 0; $x <=2; $x++){?>
	<td>
	<?php
	$tbl_jadwal = $this->db->query("SELECT  tbl_jadwal.*, tbl_mapel.mapel_nama, tbl_kelas.kelas_nama
				FROM tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
	AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id AND tbl_jadwal.jadwal_tahunajaran='$tahunajaranmax->jadwal_tahunajaran' AND jadwal_hari='$x' AND tbl_jadwal.kelas_id='$tbl_siswa->kelas_id'
	order by jadwal_tahunajaran ASC, kelas_id ASC, jadwal_hari ASC, jadwal_jam ASC
			")->result();?>
	
	<table width='100%'>
		<tr>
			<th colspan="2" width='100%' style="text-align:left;"><?php echo $hari[$x]; ?></th>
		</tr>
	</table>
	
	<?php
	foreach($tbl_jadwal as $jadwal){
	?>

	<table width='100%'>
		<tr>
			<td width='10px' style="text-align:center;"><?php echo $jadwal->jadwal_jam; ?></td>
			<td ><?php echo $jadwal->mapel_nama; ?></td>
		</tr>
	</table>
	<?php  } ?>
	</td>
<?php  } ?>
	</tr>
		<tr>
<?php for($x = 3; $x <=5; $x++){?>
	<td>
	<?php
	$tbl_jadwal = $this->db->query("SELECT  tbl_jadwal.*, tbl_mapel.mapel_nama, tbl_kelas.kelas_nama
				FROM tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
	AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id AND tbl_jadwal.jadwal_tahunajaran='$tahunajaranmax->jadwal_tahunajaran' AND jadwal_hari='$x' AND tbl_jadwal.kelas_id='$tbl_siswa->kelas_id'
	order by jadwal_tahunajaran ASC, kelas_id ASC, jadwal_hari ASC, jadwal_jam ASC
			")->result();?>
	
	<table width='100%'>
		<tr>
			<th colspan="2" width='100%' style="text-align:left;"><?php echo $hari[$x]; ?></th>
		</tr>
	</table>
	
	<?php
	foreach($tbl_jadwal as $jadwal){
	?>

	<table width='100%'>
		<tr>
			<td width='10px' style="text-align:center;"><?php echo $jadwal->jadwal_jam; ?></td>
			<td ><?php echo $jadwal->mapel_nama; ?></td>
		</tr>
	</table>
	<?php  } ?>
	</td>
<?php  } ?>
	</tr>
</table>
<br>
				</div>
				<!-- /.box-body -->
			  </div>
		</div>
      </div>
    </section>
  </div>