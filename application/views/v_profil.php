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
			<?php if($tbl_user->user_level=="guru"){ 
			$if=7;
			}elseif($tbl_user->user_level=="siswa"){ 
			$if=6;
			}
			?>
				<div class="box-body no-padding">
					<table class="table table-striped">
					<tr><td width="25%">Username</td><td width="3%"> : </td><td><?php echo $tbl_user->user_name;?></td>
					<td width="250" rowspan="<?php echo $if;?>"  style="text-align: center;">
						<img width="200" class="img" src="<?php echo base_url();?>assets/dist/img/avatar/<?php echo $tbl_user->user_foto."?".strtotime("now");?>">
					</td>
					<td width="5" rowspan="<?php echo $if;?>" style="text-align: right;" >
						<!--<a href="#" class="btn btn-success" title="Ubah Profile"><i class="fa fa-pencil"></i></a>-->
					</td>
					</tr>
					<tr><td width="25%">Nama Lengkap</td><td width="3%"> : </td><td><?php echo $tbl_user->user_namalengkap;?></td></tr>
					<tr><td width="25%">Alamat</td><td width="3%"> : </td><td><?php echo $tbl_user->user_alamat;?></td></tr>
					<tr><td width="25%">TTL</td><td width="3%"> : </td><td><?php echo $tbl_user->user_ttl;?></td></tr>
					
					<?php if($tbl_user->user_level=="siswa"){ ?>
					<tr><td width="25%">Kelas</td><td width="3%"> : </td><td><?php echo $tbl_kelas_by->kelas_nama;?></td></tr>
					<tr><td width="25%">Nama Wali Murid</td><td width="3%"> : </td><td><?php echo $tbl_user->user_namawalimurid;?></td></tr>
					<tr><td width="25%">Nomor HP Wali Murid</td><td width="3%"> : </td><td><?php echo $tbl_user->user_nohpwalimurid;?></td></tr>
					<?php } ?>
					
					<?php if($tbl_user->user_level=="guru"){ ?>
					<tr><td width="25%">Pendidikan Guru</td><td width="3%"> : </td><td><?php echo $tbl_user->user_pendidikanguru;?></td></tr>
					<tr><td width="25%">Nomor HP Guru</td><td width="3%"> : </td><td><?php echo $tbl_user->user_nohpguru;?></td></tr>
					<tr><td width="25%">Email Guru</td><td width="3%"> : </td><td><?php echo $tbl_user->user_emailguru;?></td></tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
      </div>
    </section>
  </div>