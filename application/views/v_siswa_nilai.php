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
        Nilai
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
					<a class="btn-sm btn-primary" target="_blank" href="<?php echo base_url("siswa/transkripcetak");?>"><i class="fa fa-print"></i> <span>Cetak Nilai Semester</span></a>
					</label>
					</h3>
				</div>
				
				<div class="box-body">
				
				
<br>
<?php
$jumlah_semester = $this->db->query("select nilai_semester from tbl_mapel, tbl_nilai, tbl_user
where tbl_nilai.mapel_id=tbl_mapel.mapel_id AND tbl_nilai.user_id=tbl_user.user_id order by nilai_semester DESC LIMIT 1")->row();
?>

<?php for($x = 1; $x <=$jumlah_semester->nilai_semester; $x++){?>
<table width='100%' class="items">
<tr>
	<th colspan="2">Semester <?php echo $x;?></th>
</tr>
<tr>
	<th>Nama Mata Pelajaran</th>
	<th>Nilai</th>
</tr>
<?php
$tbl_nilai = $this->db->query("select 
tbl_mapel.mapel_nama, tbl_nilai.nilai_semester, tbl_nilai.nilai_value
from tbl_mapel, tbl_nilai, tbl_user
where tbl_nilai.mapel_id=tbl_mapel.mapel_id AND tbl_nilai.user_id=tbl_user.user_id
AND nilai_semester = '$x'
AND tbl_nilai.user_id = '$tbl_siswa->user_id'")->result();

$total_nilai = $this->db->query("select sum(nilai_value) as value
from tbl_mapel, tbl_nilai, tbl_user
where tbl_nilai.mapel_id=tbl_mapel.mapel_id AND tbl_nilai.user_id=tbl_user.user_id
AND nilai_semester = '$x'
AND tbl_nilai.user_id = '$tbl_siswa->user_id'")->row();

$jumlah_nilai = $this->db->query("select count(nilai_value) as value
from tbl_mapel, tbl_nilai, tbl_user
where tbl_nilai.mapel_id=tbl_mapel.mapel_id AND tbl_nilai.user_id=tbl_user.user_id
AND nilai_semester = '$x'
AND tbl_nilai.user_id = '$tbl_siswa->user_id'")->row();

foreach($tbl_nilai as $nilai){
?>
<tr>
	<td><?php echo $nilai->mapel_nama; ?></td>
	<td style="text-align:center;"><?php echo $nilai->nilai_value; ?></td>
</tr>
<?php 

} ?>
<tr>
	<td style="text-align:right; font-weight:bold;">Total Nilai</td>
	<td style="text-align:center; font-weight:bold;"><?php echo $total_nilai->value; ?></td>
</tr>
<tr>
	<td style="text-align:right; font-weight:bold;">Rata-Rata Nilai</td>
	<td style="text-align:center; font-weight:bold;"><?php echo ROUND($total_nilai->value/$jumlah_nilai->value,2); ?></td>
</tr>
</table>
<br>
<?php }?>
				</div>
				<!-- /.box-body -->
			  </div>
		</div>
      </div>
    </section>
  </div>