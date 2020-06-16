<!DOCTYPE html>
<html>
<head>
	<title>
		JADWAL
	</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<style>
body {font-family: Times New Roman;
	font-size: 0.6em;
}

aside div.aside-title { width: 40%; border-width: 0.4px; padding: 1em; position: relative; text-align: left; }
aside div.aside-title { border-radius: 0.1em; border-style: solid; background: #EEE; border-color: #BBB; }

table { border-collapse: separate; border-spacing: 0px; }
th, td { border-radius: 1.1em; border-style: solid; }

table.items {
	border: 0.2px solid black;
}

.items td {
	border: 0.2px solid black;
	padding: 1em;
}

.items th {
	text-align: center;
	border: 0.2px solid black;
	padding: 1em;
}

table thead td th { 
	text-align: center;
	border: 0.2px solid black;
}
</style>
</head>
<body>
<h3 style="text-align:center;"><b>JADWAL PELAJARAN</b></h3>
<br>
<br>
<?php
$tahunajaranmax = $this->db->query("select max(jadwal_tahunajaran) as jadwal_tahunajaran from tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
	AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id")->row();
	
$jumlah_hari = $this->db->query("select max(jadwal_hari) as jadwal_hari from tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
	AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id AND tbl_jadwal.jadwal_tahunajaran='$tahunajaranmax->jadwal_tahunajaran' ")->row();

$hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
?>
<table width='100%' class="items">
<tr>
	<th colspan="<?php echo $jumlah_hari->jadwal_hari+1;?>" style="text-align:left;">Kelas <?php echo $tbl_kelas_by->kelas_nama;?></th>
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
</body>
</html>