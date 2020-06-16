  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content">
		<div class="col-xs-12">
		<div class="imageContainer">Banner</div>
		</div>
		
		<div class="col-xs-6"><br>
		<b>Tentang Sekolah</b>
<table width="100%">
<tr>
	<td width="35%">Nama Sekolah</td>
	<td>:</td>
	<td width="60%">SMP DANIEL HKBP</td>
</tr>
<tr>
	<td width="35%">NPSN</td>
	<td>:</td>
	<td width="60%">10496501</td>
</tr>
<tr>
	<td width="35%">Alamat</td>
	<td>:</td>
	<td width="60%">Jl. Paus Komp. Gereja HKBP Rumbai</td>
</tr>
<tr>
	<td width="35%">Kodepos</td>
	<td>:</td>
	<td width="60%">28263</td>
</tr>
<tr>
	<td width="35%">Desa/kelurahan</td>
	<td>:</td>
	<td width="60%">Lembah Damai</td>
</tr>
<tr>
	<td width="35%">Kecamatan</td>
	<td>:</td>
	<td width="60%">Rumbai Pesisir</td>
</tr>
<tr>
	<td width="35%">Kabupaten/Kota</td>
	<td>:</td>
	<td width="60%">Kota Pekanbaru</td>
</tr>
<tr>
	<td width="35%">Provinsi</td>
	<td>:</td>
	<td width="60%">Riau</td>
</tr>
<tr>
	<td width="35%">Status Sekolah</td>
	<td>:</td>
	<td width="60%">SWASTA</td>
</tr>
<tr>
	<td width="35%">Akreditasi</td>
	<td>:</td>
	<td width="60%">B</td>
</tr>
</table>
		</div>
		<div class="col-xs-6"><br>
		<b>Informasi Sekolah</b><br>
			<?php 
					foreach($tbl_informasi as $informasi){?>
			<div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $informasi->informasi_created;?></span>

                <h5 class="timeline-header"><a href="#"> <?php echo $informasi->informasi_judul;?></a></h5>
		
                <div class="timeline-body">
                  <?php echo substr($informasi->informasi_keterangan,0,50);?>...
                  <a href="<?php echo base_url("beranda/informasi/$informasi->informasi_id");?>" class="btn btn-primary btn-xs">Read more</a>
                </div>
              </div><br>
			  <?php }?>
			  <div class="timeline-body">
                  <a href="<?php echo base_url("beranda/informasi");?>" class="btn btn-success btn-xs">More Info...</a>
                </div>
		</div>
      </section>
    </div>
  </div>
  <footer class="main-footer"  style="text-align:center;">
    <div class="pull-right hidden-xs">
    </div>
    <strong><small>Copyright &copy; 2019</small></strong> 
  </footer>