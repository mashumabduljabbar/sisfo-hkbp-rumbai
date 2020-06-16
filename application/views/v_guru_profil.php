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
							<tr><td width="25%">Nama Lengkap</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_namalengkap;?></td></tr>
							
							<tr><td width="25%">Tempat Lahir</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_tempatlahir;?></td></tr>
							<tr><td width="25%">Tanggal Lahir</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_tanggallahir;?></td></tr>
							<tr><td width="25%">NUPTK</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_nuptk;?></td></tr>
							<tr><td width="25%">NRG</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_nrg;?></td></tr>
							<tr><td width="25%">Jenis Kelamin</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_jeniskelamin;?></td></tr>
							<tr><td width="25%">Pendidikan Terakhir</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_pendidikanterakhir;?></td></tr>
							<tr><td width="25%">Tahun Pendidikan</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_tahunpendidikan;?></td></tr>
							<tr><td width="25%">Jurusan</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_jurusan;?></td></tr>
							<tr><td width="25%">Jabatan</td><td width="3%"> : </td><td><?php echo $tbl_guru->guru_jabatan;?></td></tr>
							
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