  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Profil
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
			<?php $if=6;?>
						<div class="box-body no-padding">
							<table class="table table-striped">
							<tr><td width="25%">Nama Lengkap</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_namalengkap;?></td></tr>
							<tr><td width="25%">Alamat</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_alamat;?></td></tr>
							<tr><td width="25%">NISN</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_nisn;?></td></tr>
							
							<tr><td width="25%">Tempat Lahir</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_tempatlahir;?></td></tr>
							<tr><td width="25%">Tanggal Lahir</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_tanggallahir;?></td></tr>
							<tr><td width="25%">NIS</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_nis;?></td></tr>
							<tr><td width="25%">Pekerjaan Orang Tua</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_pekerjaanorangtua;?></td></tr>
							<tr><td width="25%">Nama Ayah</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_namaayah;?></td></tr>
							<tr><td width="25%">Nama Ibu</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_namaibu;?></td></tr>
							<tr><td width="25%">Jenis Kelamin</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_jeniskelamin;?></td></tr>
							<tr><td width="25%">Agama</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_agama;?></td></tr>
							<tr><td width="25%">No. HP Orang Tua</td><td width="3%"> : </td><td><?php echo $tbl_siswa->siswa_nohporangtua;?></td></tr>
							
							<tr><td width="25%">Kelas</td><td width="3%"> : </td><td><?php echo $tbl_kelas_by->kelas_nama;?></td></tr>
							</table>
						</div>
					<div class="col-xs-6">
						<div class="box-body no-padding">
							<table class="table table-striped">
							
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
  </div>