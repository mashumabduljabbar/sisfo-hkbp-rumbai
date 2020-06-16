<?php 
$user_id = $this->session->userdata("userid");
$user = $this->db->query("select * from tbl_user where user_id='$user_id'")->row();?>
  <header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"></span><b><img class="profile-img" src="<?php echo base_url();?>assets/dist/img/logo.png<?php echo "?".strtotime("now");?>" alt="" style="height:3vw;"></b>
    </a>
    <nav class="navbar navbar-static-top" >
      <div style="text-align:center;" class="col-xs-10">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div  style="padding-top: 15px;"><b>SISTEM INFORMASI SMP DANIEL HKBP RUMBAI</b></div>
		
      </div>
        <ul class="nav navbar-nav">
		  <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/dist/img/avatar/<?php echo $user->user_foto."?".strtotime("now");?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi, { <?php echo $user->user_namalengkap; ?> }</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
    </nav>
  </header>
  <?php
  $geturl = $this->uri->segment(2);
  $beranda = "";
  $user = "";
  $kategori = "";
  $informasi = "";
  $galeri = "";
  $kelas = "";
  $mapel = "";
  $jadwal = "";
  $nilai = "";
  $transkrip = "";
  $materi = "";
  $tugas = "";
  $konsultasi = "";
  $logout = "";
  $siswa = "";
  $guru = "";
  
  if($geturl=="" or strpos($geturl, "index")!== FALSE){
	  $beranda = "active";
  }
  if(strpos($geturl, "user")!== FALSE){
	  $user = "active";
  }
  if(strpos($geturl, "kategori")!== FALSE){
	  $kategori = "active";
  }
  if(strpos($geturl, "informasi")!== FALSE){
	  $informasi = "active";
  }
  if(strpos($geturl, "galeri")!== FALSE){
	  $galeri = "active";
  }
  if(strpos($geturl, "kelas")!== FALSE){
	  $kelas = "active";
  }
  if(strpos($geturl, "mapel")!== FALSE){
	  $mapel = "active";
  }
  if(strpos($geturl, "nilai")!== FALSE){
	  $nilai = "active";
  }
  if(strpos($geturl, "jadwal")!== FALSE){
	  $jadwal = "active";
  }
  if(strpos($geturl, "transkrip")!== FALSE){
	  $transkrip = "active";
  }
  if(strpos($geturl, "materi")!== FALSE){
	  $materi = "active";
  }
  if(strpos($geturl, "siswa")!== FALSE){
	  $siswa = "active";
  }
  if(strpos($geturl, "guru")!== FALSE){
	  $guru = "active";
  }
  if(strpos($geturl, "tugas")!== FALSE){
	  $tugas = "active";
  }
  if(strpos($geturl, "konsultasi")!== FALSE){
	  $konsultasi = "active";
  }
  
  ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="<?php echo $beranda;?>">
          <a href="<?php echo base_url(); ?>admin">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
		<li class="<?php echo $user;?>">
          <a href="<?php echo base_url(); ?>admin/user">
            <i class="fa fa-user"></i> <span>Manajemen User</span>
          </a>
        </li>
		<li class="<?php echo $guru;?>">
          <a href="<?php echo base_url(); ?>admin/guru">
            <i class="fa fa-user"></i> <span>Manajemen Guru</span>
          </a>
        </li>
		<li class="<?php echo $siswa;?>">
          <a href="<?php echo base_url(); ?>admin/siswa">
            <i class="fa fa-user"></i> <span>Manajemen Siswa</span>
          </a>
        </li>
		<li class="<?php echo $kategori;?>">
          <a href="<?php echo base_url(); ?>admin/kategori">
            <i class="fa fa-gears"></i> <span>Manajemen Kategori</span>
          </a>
        </li>
		<li class="<?php echo $informasi;?>">
          <a href="<?php echo base_url(); ?>admin/informasi">
            <i class="fa fa-info-circle"></i> <span>Manajemen Informasi</span>
          </a>
        </li>
		<li class="<?php echo $galeri;?>">
          <a href="<?php echo base_url(); ?>admin/galeri">
            <i class="fa fa-picture-o"></i> <span>Manajemen Galeri</span>
          </a>
        </li>
		<li class="<?php echo $kelas;?>">
          <a href="<?php echo base_url(); ?>admin/kelas">
            <i class="fa fa-building-o"></i> <span>Manajemen Kelas</span>
          </a>
        </li>
		<li class="<?php echo $mapel;?>">
          <a href="<?php echo base_url(); ?>admin/mapel">
            <i class="fa fa-book"></i> <span>Manajemen Mapel</span>
          </a>
        </li>
		<li class="<?php echo $jadwal;?>">
          <a href="<?php echo base_url(); ?>admin/jadwal/0/0/0">
            <i class="fa fa-calendar"></i> <span>Manajemen Jadwal</span>
          </a>
        </li>
		<li class="<?php echo $nilai;?>">
          <a href="<?php echo base_url(); ?>admin/nilai">
            <i class="fa  fa-check-circle-o"></i> <span>Manajemen Nilai</span>
          </a>
        </li>
		<li class="<?php echo $transkrip;?>">
          <a href="<?php echo base_url(); ?>admin/transkrip">
            <i class="fa fa-file-pdf-o"></i> <span>Transkrip Nilai</span>
          </a>
        </li>
		<li class="<?php echo $materi;?>">
          <a href="<?php echo base_url(); ?>admin/materi">
            <i class="fa fa-flask"></i> <span>Manajemen Materi</span>
          </a>
        </li>
		<li class="<?php echo $tugas;?>">
          <a href="<?php echo base_url(); ?>admin/tugas">
            <i class="fa fa-pencil"></i> <span>Manajemen Tugas</span>
          </a>
        </li>
		<li class="<?php echo $konsultasi;?>">
          <a href="<?php echo base_url(); ?>admin/konsultasi">
            <i class="fa fa-stethoscope"></i> <span>Manajemen Konsultasi</span>
          </a>
        </li>
		
		<li class="<?php echo $logout;?>">
          <a href="<?php echo base_url(); ?>login/logout">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>