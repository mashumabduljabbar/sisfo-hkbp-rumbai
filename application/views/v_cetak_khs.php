<!DOCTYPE html>
<html>
<head>
	<title>
		NILAI SEMESTER
	</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<style>
body {font-family: Times New Roman;
	font-size: 1em;
}

aside div.aside-title { width: 40%; border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
aside div.aside-title { border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; }

table { border-collapse: separate; border-spacing: 0px; }
th, td { border-radius: 2.25em; border-style: solid; }

table.items {
	border: 1px solid black;
}

.items td {
	border: 1px solid black;
	padding: 2px;
}

.items th {
	text-align: center;
	border: 1px solid black;
	padding: 2px;
}

table thead td th { 
	text-align: center;
	border: 1px solid black;
}
</style>
</head>
<body>
<h3 style="text-align:center;"><b><u>--- NILAI SEMESTER ---</u></b></h3>
<h4 style="text-align:center;"><b>SMP DANIEL HKBP RUMBAI</b></h4>
<br>
<table width='50%'>
<tr>
	<td>NIS</td>
	<td>:</td>
	<td><?php echo $tbl_siswa->siswa_nis;?></td>
</tr>
<tr>
	<td>Nama Siswa</td>
	<td>:</td>
	<td><?php echo $tbl_siswa->siswa_namalengkap;?></td>
</tr>
<tr>
	<td>Kelas</td>
	<td>:</td>
	<td><?php echo $tbl_kelas_by->kelas_nama;?></td>
</tr>
</table>
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
AND tbl_nilai.user_id = '$user_id'")->result();

$total_nilai = $this->db->query("select sum(nilai_value) as value
from tbl_mapel, tbl_nilai, tbl_user
where tbl_nilai.mapel_id=tbl_mapel.mapel_id AND tbl_nilai.user_id=tbl_user.user_id
AND nilai_semester = '$x'
AND tbl_nilai.user_id = '$user_id'")->row();

$jumlah_nilai = $this->db->query("select count(nilai_value) as value
from tbl_mapel, tbl_nilai, tbl_user
where tbl_nilai.mapel_id=tbl_mapel.mapel_id AND tbl_nilai.user_id=tbl_user.user_id
AND nilai_semester = '$x'
AND tbl_nilai.user_id = '$user_id'")->row();

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

<br>
<br>
<br>
<table width='100%'>
<tr>
	<td width='50%'></td>
	<td style="text-align:right; font-weight:bold;">___________________________</td>
</tr>
</table>
</body>
</html>