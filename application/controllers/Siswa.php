<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Siswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "siswa"){
			redirect(base_url("login"));
		}
		$this->load->model('m_general');
	}
	
	////////////////////////////////////
	
	public function index()
    {
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_user'] = $this->m_general->view_by("tbl_user", $where);
		$order = "informasi_created DESC";
		$data['tbl_informasi'] = $this->m_general->view_order("tbl_informasi", $order);
        $this->load->view("v_admin_header");
        $this->load->view("v_siswa_index", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	
	public function profil()
    {
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_siswa'] = $this->m_general->view_by("tbl_siswa", $where);
		
		$where1 = array("kelas_id" => $data['tbl_siswa']->kelas_id);
		$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas",$where1);
		
		$this->load->view("v_admin_header");
        $this->load->view("v_siswa_profil", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_materi()
	{
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_siswa'] = $this->m_general->view_by("tbl_siswa",$where);
		$kelas_id = $data['tbl_siswa']->kelas_id;

		$table = "
        (
            SELECT  tbl_materi.*, tbl_kelas.kelas_nama, tbl_mapel.mapel_nama FROM tbl_materi, tbl_kelas, tbl_mapel
WHERE tbl_materi.kelas_id=tbl_kelas.kelas_id
AND tbl_materi.mapel_id=tbl_mapel.mapel_id AND tbl_materi.kelas_id='$kelas_id'
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
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_tugas()
	{
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_siswa'] = $this->m_general->view_by("tbl_siswa",$where);
		$kelas_id = $data['tbl_siswa']->kelas_id;

		$table = "
        (
            SELECT  tbl_tugas.*, tbl_kelas.kelas_nama, tbl_mapel.mapel_nama FROM tbl_tugas, tbl_kelas, tbl_mapel
WHERE tbl_tugas.kelas_id=tbl_kelas.kelas_id
AND tbl_tugas.mapel_id=tbl_mapel.mapel_id AND tbl_tugas.kelas_id='$kelas_id'
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
			$this->m_general->add("tbl_konsultasi", $_POST);
			redirect('siswa/konsultasi');
    }	
	public function konsultasi_aksi_balas($konsultasi_id)
    {	
			$where = array("konsultasi_id" => $konsultasi_id);
			$data['tbl_konsultasi'] = $this->m_general->view_by("tbl_konsultasi",$where);
			$date = date("Y-m-d H:i:s");
			$_POST['user_id'] = $this->session->userdata("userid");
			$_POST['konsultasi_created'] = $date;
			$_POST['konsultasi_key'] = $data['tbl_konsultasi']->konsultasi_key;	
			$this->m_general->add("tbl_konsultasi", $_POST);
			redirect('siswa/konsultasi');
    }	
	
	public function jadwal()
    {
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_siswa'] = $this->m_general->view_by("tbl_siswa", $where);
		
		$where1 = array("kelas_id" => $data['tbl_siswa']->kelas_id);
		$data['tbl_kelas'] = $this->m_general->view_by("tbl_kelas", $where1);
		$this->load->view("v_admin_header");
        $this->load->view("v_siswa_jadwal", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	
	public function nilai()
    {
		$where = array("user_id" => $this->session->userdata('userid'));
		$data['tbl_siswa'] = $this->m_general->view_by("tbl_siswa", $where);
		
		$where1 = array("kelas_id" => $data['tbl_siswa']->kelas_id);
		$data['tbl_kelas'] = $this->m_general->view_by("tbl_kelas", $where1);
		$this->load->view("v_admin_header");
        $this->load->view("v_siswa_nilai", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	
	public function transkripcetak()
	{
		$where = array("user_id" => $this->session->userdata('userid'));
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
		$data['user_id'] = $this->session->userdata('userid');
		$halaman = $this->load->view('v_cetak_khs',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
	
	public function cetak_jadwal()
	{
		$where = array("user_id" => $this->session->userdata('userid'));
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
        $mpdf->SetTitle("Jadwal");
		$halaman = $this->load->view('v_cetak_jadwal_siswa',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
	
}