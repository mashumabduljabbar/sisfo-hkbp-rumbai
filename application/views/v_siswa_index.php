  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Beranda
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<h1>Selamat Datang</h1>
					
					<hr>
					<h3>Informasi</h3>
					<?php 
					foreach($tbl_informasi as $informasi){?>
					<div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i><?php echo $informasi->informasi_created;?></span>
						<div class="timeline-body">
							<div class="col-xs-12">
								<div class="col-xs-8">
									<h4 class="timeline-header"><a href="#">Judul</a> <?php echo $informasi->informasi_judul;?></h4>

									<?php echo $informasi->informasi_keterangan;?>
								</div>
								<div class="col-xs-4">
									<img height='120px' src="<?php echo base_url();?>assets/dist/img/informasi/<?php echo $informasi->informasi_foto;?>">
								</div>
							</div>
						</div>
					</div>
					<div class="timeline-footer">
						<br><br>
					</div>
					<?php }?>
				</div>
				<!-- /.box-body -->
			  </div>
		</div>
      </div>
    </section>
  </div>