<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Guru extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "guru"){
			redirect(base_url("login"));
		}
		$this->load->model('m_general');
	}
	
	////////////////////////////////////
	
	public function index()
    {
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_user'] = $this->m_general->view_by("tbl_user", $where);
        $this->load->view("v_admin_header");
        $this->load->view("v_guru_index", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	
	public function profil()
    {
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_guru'] = $this->m_general->view_by("tbl_guru", $where);
		$this->load->view("v_admin_header");
        $this->load->view("v_guru_profil", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_materi()
	{
		$table = "
        (
            SELECT  tbl_materi.*, tbl_kelas.kelas_nama, tbl_mapel.mapel_nama FROM tbl_materi, tbl_kelas, tbl_mapel
WHERE tbl_materi.kelas_id=tbl_kelas.kelas_id
AND tbl_materi.mapel_id=tbl_mapel.mapel_id
        )temp";
		
        $primaryKey = 'materi_id';
        $columns = array(
        array( 'db' => 'materi_nama',     'dt' => 0 ),
        array( 'db' => 'kelas_nama',     'dt' => 1 ),
        array( 'db' => 'mapel_nama',     'dt' => 2 ),
        array( 'db' => 'materi_file',     'dt' => 3 ),
        array( 'db' => 'materi_id',     'dt' => 4 ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function materi()
    {
		$data['tbl_materi'] = $this->m_general->view("tbl_materi");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_materi", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function materi_tambah()
    {
		$data['tbl_kelas'] = $this->m_general->view("tbl_kelas");
		$data['tbl_mapel'] = $this->m_general->view("tbl_mapel");
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_materi_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function materi_ubah($materi_id)
	{
		$where = array("materi_id" => $materi_id);
		$data['tbl_materi'] = $this->m_general->view_by("tbl_materi",$where);
		$data['tbl_kelas'] = $this->m_general->view("tbl_kelas");
		$data['tbl_mapel'] = $this->m_general->view("tbl_mapel");
		
		$kelas_id = $data['tbl_materi']->kelas_id;
		$where2 = array("kelas_id" => $kelas_id);
		$mapel_id = $data['tbl_materi']->mapel_id;
		$where3 = array("mapel_id" => $mapel_id);
		$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas",$where2);
		$data['tbl_mapel_by'] = $this->m_general->view_by("tbl_mapel",$where3);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_materi_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function materi_aksi_tambah()
    {
			$folder = "materi";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = "";
					}
			
			$_POST['materi_file'] = $nama_fileupload;
			$primary_key = $this->m_general->bacaidterakhir("tbl_materi", "materi_id");
			$_POST['materi_id'] = $primary_key;		
			$this->m_general->add("tbl_materi", $_POST);
			redirect('guru/materi');
    }	
	public function materi_aksi_ubah($materi_id)
    {
			$folder = "materi";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = $this->input->post('materi_file');
					}
					
					$_POST['materi_file'] = $nama_fileupload;
			$where = array("materi_id" => $materi_id);
			$this->m_general->edit("tbl_materi", $where, $_POST);
			redirect('guru/materi');
    }	
	public function materi_aksi_hapus($materi_id){
			$where['materi_id'] = $materi_id;
			$this->m_general->hapus("tbl_materi", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('guru/materi');
	
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_tugas()
	{
		$table = "
        (
            SELECT  tbl_tugas.*, tbl_kelas.kelas_nama, tbl_mapel.mapel_nama FROM tbl_tugas, tbl_kelas, tbl_mapel
WHERE tbl_tugas.kelas_id=tbl_kelas.kelas_id
AND tbl_tugas.mapel_id=tbl_mapel.mapel_id
        )temp";
		
        $primaryKey = 'tugas_id';
        $columns = array(
        array( 'db' => 'tugas_nama',     'dt' => 0 ),
        array( 'db' => 'kelas_nama',     'dt' => 1 ),
        array( 'db' => 'mapel_nama',     'dt' => 2 ),
        array( 'db' => 'tugas_file',     'dt' => 3 ),
        array( 'db' => 'tugas_id',     'dt' => 4 ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function tugas()
    {
		$data['tbl_tugas'] = $this->m_general->view("tbl_tugas");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_tugas", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function tugas_tambah()
    {
		$data['tbl_kelas'] = $this->m_general->view("tbl_kelas");
		$data['tbl_mapel'] = $this->m_general->view("tbl_mapel");
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_tugas_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function tugas_ubah($tugas_id)
	{
		$where = array("tugas_id" => $tugas_id);
		$data['tbl_tugas'] = $this->m_general->view_by("tbl_tugas",$where);
		$data['tbl_kelas'] = $this->m_general->view("tbl_kelas");
		$data['tbl_mapel'] = $this->m_general->view("tbl_mapel");
		
		$kelas_id = $data['tbl_tugas']->kelas_id;
		$where2 = array("kelas_id" => $kelas_id);
		$mapel_id = $data['tbl_tugas']->mapel_id;
		$where3 = array("mapel_id" => $mapel_id);
		$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas",$where2);
		$data['tbl_mapel_by'] = $this->m_general->view_by("tbl_mapel",$where3);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_tugas_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function tugas_aksi_tambah()
    {
			$folder = "tugas";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = "";
					}
					
			$_POST['tugas_file'] = $nama_fileupload;
			$primary_key = $this->m_general->bacaidterakhir("tbl_tugas", "tugas_id");
			$_POST['tugas_id'] = $primary_key;		
			$this->m_general->add("tbl_tugas", $_POST);
			redirect('guru/tugas');
    }	
	public function tugas_aksi_ubah($tugas_id)
    {
			$folder = "tugas";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = $this->input->post('tugas_file');
					}
					
					$_POST['tugas_file'] = $nama_fileupload;
			$where = array("tugas_id" => $tugas_id);
			$this->m_general->edit("tbl_tugas", $where, $_POST);
			redirect('guru/tugas');
    }	
	public function tugas_aksi_hapus($tugas_id){
			$where['tugas_id'] = $tugas_id;
			$this->m_general->hapus("tbl_tugas", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('guru/tugas');
	
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_konsultasi()
	{
		$table = "
        (
            SELECT
                tbl_konsultasi.*, tbl_user.user_namalengkap
            FROM
                tbl_konsultasi, tbl_user
			WHERE tbl_konsultasi.user_id=tbl_user.user_id
			order by user_password ASC, konsultasi_created DESC
        )temp";
		
        $primaryKey = 'konsultasi_id';
        $columns = array(
        array( 'db' => 'user_namalengkap',     'dt' => 0 ),
        array( 'db' => 'konsultasi_pesan',     'dt' => 1 ),
        array( 'db' => 'konsultasi_created',     'dt' => 2 ),
        array( 'db' => 'konsultasi_id',     'dt' => 3 ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function konsultasi()
    {
		$data['tbl_konsultasi'] = $this->m_general->view("tbl_konsultasi");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_konsultasi", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function konsultasi_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_konsultasi_add");
		$this->load->view("v_admin_footer_form");
    }
	public function konsultasi_balas($konsultasi_id)
	{
		$where = array("konsultasi_id" => $konsultasi_id);
		$data['tbl_konsultasi'] = $this->m_general->view_by("tbl_konsultasi",$where);
		$where2 = array("user_id" => $data['tbl_konsultasi']->user_id);
		$data['tbl_user'] = $this->m_general->view_by("tbl_user",$where2);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_konsultasi_balas', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function konsultasi_aksi_tambah()
    {
			$date = date("Y-m-d H:i:s");
			$_POST['user_id'] = $this->session->userdata("userid");
			$_POST['konsultasi_created'] = $date;
			$_POST['konsultasi_key'] = md5($date);
			$primary_key = $this->m_general->bacaidterakhir("tbl_konsultasi", "konsultasi_id");
			$_POST['konsultasi_id'] = $primary_key;
			$this->m_general->add("tbl_konsultasi", $_POST);
			redirect('guru/konsultasi');
    }	
	public function konsultasi_aksi_balas($konsultasi_id)
    {	
			$where = array("konsultasi_id" => $konsultasi_id);
			$data['tbl_konsultasi'] = $this->m_general->view_by("tbl_konsultasi",$where);
			$date = date("Y-m-d H:i:s");
			$_POST['user_id'] = $this->session->userdata("userid");
			$_POST['konsultasi_created'] = $date;
			$_POST['konsultasi_key'] = $data['tbl_konsultasi']->konsultasi_key;	
			$primary_key = $this->m_general->bacaidterakhir("tbl_konsultasi", "konsultasi_id");
			$_POST['konsultasi_id'] = $primary_key;
			$this->m_general->add("tbl_konsultasi", $_POST);
			redirect('guru/konsultasi');
    }	
	public function konsultasi_aksi_hapus($konsultasi_id){
			$where['konsultasi_id'] = $konsultasi_id;
			$this->m_general->hapus("tbl_konsultasi", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('guru/konsultasi');
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_nilai($mapel_id="")
	{
		
		if($mapel_id==""){
			$where = "";
		}else{
			$where = "AND tbl_nilai.mapel_id='$mapel_id'";
		}
		
		$table = "
        (
SELECT  tbl_nilai.*, tbl_mapel.mapel_nama, tbl_siswa.siswa_namalengkap, tbl_siswa.siswa_nisn
FROM tbl_nilai, tbl_user, tbl_mapel, tbl_siswa
WHERE tbl_nilai.user_id=tbl_user.user_id
AND tbl_nilai.mapel_id=tbl_mapel.mapel_id
AND tbl_siswa.user_id=tbl_user.user_id $where
        )temp";
		
        $primaryKey = 'nilai_id';
        $columns = array(
         array( 'db' => 'siswa_nisn',     'dt' => 0 ),
        array( 'db' => 'siswa_namalengkap',     'dt' => 1 ),
        array( 'db' => 'mapel_nama',     'dt' => 2 ),
        array( 'db' => 'nilai_semester',     'dt' => 3 ),
        array( 'db' => 'nilai_value',     'dt' => 4 ),
        array( 'db' => 'nilai_id',     'dt' => 5 ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function nilai()
    {
		$data['tbl_mapel'] = $this->m_general->view("tbl_mapel");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_nilai", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function nilai_tambah($kelas_id = "")
    {
		$where0 = array("kelas_id" => $kelas_id);
		$where1 = array("mapel_id !=" => "0");
		$where2 = array("kelas_id !=" => "0");
		$where3 = array("kelas_id" => $kelas_id);
		$data['tbl_siswa'] = $this->m_general->view_where("tbl_siswa", $where0, $order ="siswa_namalengkap ASC");
		$data['tbl_mapel'] = $this->m_general->view_where("tbl_mapel", $where1, $order ="mapel_nama ASC");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where2, $order ="kelas_id ASC");
		$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas", $where3);
		
		if($kelas_id == ""){
			$data['kelas_nama'] = "";
		}else{
			$data['kelas_nama'] = $data['tbl_kelas_by']->kelas_nama;
		}
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_nilai_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function nilai_ubah($nilai_id)
	{
		$where = array("nilai_id" => $nilai_id);
		$data['tbl_nilai'] = $this->m_general->view_by("tbl_nilai",$where);
		$where1 = array("user_level" => "siswa");
		$data['tbl_user'] = $this->m_general->view_join1_order_where("tbl_user", "tbl_siswa", "user_id", $where1, $order ="siswa_namalengkap ASC");
		$data['tbl_mapel'] = $this->m_general->view("tbl_mapel");
		
		$user_id = $data['tbl_nilai']->user_id;
		$where2 = array("tbl_user.user_id" => $user_id);
		$mapel_id = $data['tbl_nilai']->mapel_id;
		$where3 = array("mapel_id" => $mapel_id);
		$data['tbl_user_by'] = $this->m_general->view_join1_by("tbl_user", "tbl_siswa", $where2, "user_id");
		$data['tbl_mapel_by'] = $this->m_general->view_by("tbl_mapel",$where3);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_nilai_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function nilai_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_nilai", "nilai_id");
			$_POST['nilai_id'] = $primary_key;
			$this->m_general->add("tbl_nilai", $_POST);
			redirect('guru/nilai');
    }	
	public function nilai_aksi_ubah($nilai_id)
    {
			$where = array("nilai_id" => $nilai_id);
			$this->m_general->edit("tbl_nilai", $where, $_POST);
			redirect('guru/nilai');
    }	
	public function nilai_aksi_hapus($nilai_id){
			$where['nilai_id'] = $nilai_id;
			$this->m_general->hapus("tbl_nilai", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('guru/nilai');
	
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_transkrip()
	{
		
		$table = "
        (
            SELECT  tbl_siswa.*, tbl_kelas.kelas_nama FROM tbl_siswa, tbl_kelas WHERE tbl_siswa.kelas_id=tbl_kelas.kelas_id
			order by siswa_namalengkap ASC
        )temp";
		
        $primaryKey = 'user_id';
        $columns = array(
        array( 'db' => 'siswa_nis',     'dt' => 0 ),
        array( 'db' => 'siswa_namalengkap',     'dt' => 1 ),
        array( 'db' => 'kelas_nama',     'dt' => 2 ),
        array( 'db' => 'user_id',     'dt' => 3 ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}
	
	public function transkrip()
    {
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_transkrip");
        $this->load->view("v_admin_footer_datatables");
    }

	public function transkripcetak($user_id)
	{
		$where = array("user_id" => $user_id);
		$data['tbl_siswa'] = $this->m_general->view_by("tbl_siswa",$where);
		
		$where1 = array("kelas_id" => $data['tbl_siswa']->kelas_id);
		$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas",$where1);
		
		$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8', 
		'format' => 'A4-P',
		'margin_left' => 12,
		'margin_right' => 12,
		'margin_top' => 5,
		'margin_bottom' => 10,
		'margin_header' => 3,
		'margin_footer' => 3,
		]); //L For Landscape , P for Portrait
        $mpdf->SetTitle("KHS");
		$data['user_id'] = $user_id;
		$halaman = $this->load->view('v_cetak_khs',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_jadwal($mapel_id="", $kelas_id="", $tahunajaran="")
	{
		
		if($mapel_id==0){
			$where = "";
		}else{
			$where = "AND tbl_jadwal.mapel_id='$mapel_id'";
		}
		
		if($kelas_id==0){
			$where2 = "";
		}else{
			$where2 = "AND tbl_jadwal.kelas_id='$kelas_id'";
		}
		
		if($tahunajaran==0){
			$where3 = "";
		}else{
			$where3 = "AND tbl_jadwal.jadwal_tahunajaran='$tahunajaran'";
		}
		
		$table = "
        (
            SELECT  tbl_jadwal.*, tbl_mapel.mapel_nama, tbl_kelas.kelas_nama
			FROM tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id $where $where2 $where3
order by jadwal_tahunajaran ASC, kelas_id ASC, jadwal_hari ASC, jadwal_jam ASC
        )temp";
		
        $primaryKey = 'jadwal_id';
        $columns = array(
        array( 'db' => 'kelas_nama',     'dt' => 0 ),
        array( 'db' => 'jadwal_jam',     'dt' => 1 ),
        array( 'db' => 'jadwal_hari',     'dt' => 2 ),
        array( 'db' => 'mapel_nama',     'dt' => 3 ),
        array( 'db' => 'jadwal_tahunajaran',     'dt' => 4 ),
        array( 'db' => 'jadwal_id',     'dt' => 5 ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function jadwal()
    {
		$where1 = array("mapel_id !=" => "0");
		$where2 = array("kelas_id !=" => "0");
		$data['tbl_mapel'] = $this->m_general->view_where("tbl_mapel", $where1, $order ="mapel_nama ASC");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where2, $order ="kelas_id ASC");
		$data['tbl_jadwal'] = $this->m_general->view_order_group_by("tbl_jadwal", $order ="jadwal_tahunajaran ASC", $group_by = "jadwal_tahunajaran");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_jadwal", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function jadwal_tambah()
    {
		$where1 = array("mapel_id !=" => "0");
		$where2 = array("kelas_id !=" => "0");
		$data['tbl_mapel'] = $this->m_general->view_where("tbl_mapel", $where1, $order ="mapel_nama ASC");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where2, $order ="kelas_id ASC");
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_jadwal_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function jadwal_ubah($jadwal_id)
	{
		$where = array("jadwal_id" => $jadwal_id);
		$data['tbl_jadwal'] = $this->m_general->view_by("tbl_jadwal",$where);
		$where1 = array("mapel_id !=" => "0");
		$where2 = array("kelas_id !=" => "0");
		$data['tbl_mapel'] = $this->m_general->view_where("tbl_mapel", $where1, $order ="mapel_nama ASC");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where2, $order ="kelas_id ASC");
		
		$kelas_id = $data['tbl_jadwal']->kelas_id;
		$where2 = array("kelas_id !=" => $kelas_id);
		$mapel_id = $data['tbl_jadwal']->mapel_id;
		$where3 = array("mapel_id" => $mapel_id);
		$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas",$where2);
		$data['tbl_mapel_by'] = $this->m_general->view_by("tbl_mapel",$where3);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_jadwal_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function jadwal_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_jadwal", "jadwal_id");
			$_POST['jadwal_id'] = $primary_key;
			$this->m_general->add("tbl_jadwal", $_POST);
			redirect('guru/jadwal');
    }	
	public function jadwal_aksi_ubah($jadwal_id)
    {
			$where = array("jadwal_id" => $jadwal_id);
			$this->m_general->edit("tbl_jadwal", $where, $_POST);
			redirect('guru/jadwal');
    }	
	public function jadwal_aksi_hapus($jadwal_id){
			$where['jadwal_id'] = $jadwal_id;
			$this->m_general->hapus("tbl_jadwal", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('guru/jadwal');
	
	}
	
	public function cetak_jadwal($mapel_id="", $kelas_id="", $tahunajaran="")
	{
		
		if($mapel_id==0){
			$data['where'] = "";
			$where = "";
		}else{
			$data['where'] = "AND tbl_jadwal.mapel_id='$mapel_id'";
			$where = "AND tbl_jadwal.mapel_id='$mapel_id'";
		}
		
		if($kelas_id==0){
			$data['where2'] = "";
			$where2 = "";
		}else{
			$data['where2'] = "AND tbl_jadwal.kelas_id='$kelas_id'";
			$where2 = "AND tbl_jadwal.kelas_id='$kelas_id'";
		}
		
	$tahunajaranmax = $this->db->query("select max(jadwal_tahunajaran) as jadwal_tahunajaran from tbl_jadwal, tbl_kelas, tbl_mapel WHERE tbl_jadwal.kelas_id=tbl_kelas.kelas_id
	AND tbl_jadwal.mapel_id=tbl_mapel.mapel_id $where $where2")->row();
		
		if($tahunajaran==0){
			$data['where3'] = "AND tbl_jadwal.jadwal_tahunajaran='$tahunajaranmax->jadwal_tahunajaran'";
		}else{
			$data['where3'] = "AND tbl_jadwal.jadwal_tahunajaran='$tahunajaran'";
		}
		
		$data['tbl_kelas'] = $this->m_general->view_join1_order("tbl_kelas", "tbl_jadwal", $order ="tbl_kelas.kelas_id ASC", "kelas_id", "tbl_jadwal.kelas_id");
		
		$data['tahunajaran'] = $tahunajaranmax->jadwal_tahunajaran;
		
		$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8', 
		'format' => 'A4-P',
		'margin_left' => 12,
		'margin_right' => 12,
		'margin_top' => 5,
		'margin_bottom' => 10,
		'margin_header' => 3,
		'margin_footer' => 3,
		]); //L For Landscape , P for Portrait
        $mpdf->SetTitle("Jadwal");
		$data['user_id'] = $user_id;
		$halaman = $this->load->view('v_cetak_jadwal',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
	////////////////////////////////////
	
	////////////////////////////////////
	
}