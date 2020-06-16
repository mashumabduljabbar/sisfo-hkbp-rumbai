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
              <img src="<?php echo base_url();?>assets/dist/img/avatar/<?php echo $user->user_foto."?".strtotime("now");?>" class="user-image" alt="user Image">
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
  $menu_siswa = "";
  $profil = "";
  $materi = "";
  $jadwal = "";
  $tugas = "";
  $nilai = "";
  $konsultasi = "";
  $logout = "";
  
  if($geturl=="" or strpos($geturl, "index")!== FALSE){
	  $menu_siswa = "active";
  }
  if(strpos($geturl, "profil")!== FALSE){
	  $profil = "active";
  }
  if(strpos($geturl, "materi")!== FALSE){
	  $materi = "active";
  }
  if(strpos($geturl, "tugas")!== FALSE){
	  $tugas = "active";
  }
  if(strpos($geturl, "jadwal")!== FALSE){
	  $jadwal = "active";
  }
  if(strpos($geturl, "nilai")!== FALSE){
	  $nilai = "active";
  }
  if(strpos($geturl, "konsultasi")!== FALSE){
	  $konsultasi = "active";
  }
  
  ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="<?php echo $menu_siswa;?>">
          <a href="<?php echo base_url(); ?>siswa">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
		<li class="<?php echo $profil;?>">
          <a href="<?php echo base_url(); ?>siswa/profil">
            <i class="fa fa-user"></i> <span>Profil</span>
          </a>
        </li>
		<li class="<?php echo $materi;?>">
          <a href="<?php echo base_url(); ?>siswa/materi">
            <i class="fa fa-flask"></i> <span>Materi</span>
          </a>
        </li>
		<li class="<?php echo $tugas;?>">
          <a href="<?php echo base_url(); ?>siswa/tugas">
            <i class="fa fa-pencil"></i> <span>Tugas</span>
          </a>
        </li>
		<li class="<?php echo $jadwal;?>">
          <a href="<?php echo base_url(); ?>siswa/jadwal">
            <i class="fa fa-calendar"></i> <span>Jadwal Pelajaran</span>
          </a>
        </li>
		<li class="<?php echo $nilai;?>">
          <a href="<?php echo base_url(); ?>siswa/nilai">
            <i class="fa fa-check-circle-o"></i> <span>Nilai</span>
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