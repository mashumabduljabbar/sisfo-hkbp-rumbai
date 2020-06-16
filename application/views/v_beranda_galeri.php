  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
		<div class="col-xs-12">
				<h4 class="box-title">
					<span>GALERI</span>
				</h4>
		</div>
		<?php foreach($tbl_galeri as $row_galeri){?>
		<div class="col-xs-4">
			<?php if(strpos($row_galeri->galeri_foto, ".jpg")!== FALSE || strpos($row_galeri->galeri_foto, ".jpeg")!== FALSE){?>
			<img src="<?php echo base_url(); ?>assets/dist/img/galeri/<?php echo $row_galeri->galeri_foto;?>" class="img img-responsive" width="100%">
			<?php }?>
			<?php if(strpos($row_galeri->galeri_foto, ".mp4")!== FALSE || strpos($row_galeri->galeri_foto, ".avi")!== FALSE || strpos($row_galeri->galeri_foto, ".flv")!== FALSE){?>
			<video height="100%" width="" class="img img-responsive"  controls>
				<source src="<?php echo base_url();?>assets/dist/img/galeri/<?php echo $row_galeri->galeri_foto;?>" type="video/mp4">
				<source src="<?php echo base_url();?>assets/dist/img/galeri/<?php echo $row_galeri->galeri_foto;?>" type="video/ogg">
				Your browser does not support HTML5 video.
			</video>
			<?php }?>
		</div>
		<?php }?>
	</div>
  </div>
  <footer class="main-footer"  style="text-align:center;">
    <div class="pull-right hidden-xs">
    </div>
    <strong><small>Copyright &copy; 2019</small></strong> 
  </footer>