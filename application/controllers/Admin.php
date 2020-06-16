<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "admin"){
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
        $this->load->view("v_admin_index", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	
	
	////////////////////////////////////
	
	public function get_data_master_user($user_level = "")
	{
		if($user_level==""){
			$where = "";
		}else{
			$where = "WHERE user_level='$user_level'";
		}
		
		$table = "
        (
            SELECT
                *
            FROM
                tbl_user
			$where
        )temp";
		
        $primaryKey = 'user_id';
        $columns = array(
        array( 'db' => 'user_name',     'dt' => 0 ),
        array( 'db' => 'user_namalengkap',        'dt' => 1 ),
        array( 'db' => 'user_level',       'dt' => 2 ),
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
	
	public function user()
    {
		$data['tbl_user'] = $this->m_general->view_order("tbl_user", $order = "user_name ASC");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_user", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function user_tambah()
    {
		$where = array("kelas_id !=" => "0");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where, $order ="kelas_nama ASC");
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_user_add",$data);
		$this->load->view("v_admin_footer_form");
    }
	public function user_ubah($user_id)
	{
		$where = array("user_id" => $user_id);
		$data['tbl_user'] = $this->m_general->view_by("tbl_user",$where);
		//$where1 = array("kelas_id !=" => "0");
		//$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where1, $order ="kelas_nama ASC");
		//$kelas_id = $data['tbl_user']->kelas_id;
		//$where2 = array("kelas_id" => $kelas_id);
		//$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas",$where2);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_user_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function user_aksi_tambah()
    {
			$user_name = $this->input->post('user_name');
			$check_user = $this->db->query("SELECT * FROM tbl_user where user_name = '$user_name' ")->num_rows();
			if($check_user==0){
					$folder = "avatar";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = "";
					}
					
					$_POST['user_foto'] = $nama_fileupload;
					$_POST['user_password'] = md5($this->input->post('user_password'));
					$primary_key = $this->m_general->bacaidterakhir("tbl_user", "user_id");
					$_POST['user_id'] = $primary_key;
					$this->m_general->add("tbl_user", $_POST);
					redirect('admin/user');
			}else{
					redirect('admin/user_tambah/err');
			}
    }	
	public function user_aksi_ubah($user_id)
    {
			$user_name = $this->input->post('user_name')[0];
			$user_name_lama = $this->input->post('user_name')[1];
			$check_user = $this->db->query("SELECT * FROM tbl_user where user_name = '$user_name' and user_name!='$user_name_lama'")->num_rows();
			if($check_user==0){
					$folder = "avatar";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = $this->input->post('user_foto');
					}
					
					$_POST['user_foto'] = $nama_fileupload;
					if($this->input->post('user_password')[0]==$this->input->post('user_password')[1]){
						$_POST['user_password'] = $this->input->post('user_password')[0];
					}else{
						$_POST['user_password'] = md5($this->input->post('user_password')[0]);
					}
					$_POST['user_name'] = $this->input->post('user_name')[0];
					$where = array("user_id" => $user_id);
					$this->m_general->edit("tbl_user", $where, $_POST);
					redirect('admin/user');
			}else{
					redirect('admin/user_ubah/'.$user_id."/err");
			}
    }	
	public function user_aksi_hapus($user_id){
			$where['user_id'] = $user_id;
			$this->m_general->hapus("tbl_user", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/user');
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_guru()
	{
		
		$table = "
        (
            SELECT
                *
            FROM
                tbl_guru
        )temp";
		
        $primaryKey = 'guru_id';
        $columns = array(
        array( 'db' => 'guru_namalengkap',     'dt' => 0 ),
        array( 'db' => 'guru_tempatlahir',        'dt' => 1 ),
        array( 'db' => 'guru_tanggallahir',        'dt' => 2 ),
        array( 'db' => 'guru_nuptk',        'dt' => 3 ),
        array( 'db' => 'guru_nrg',        'dt' => 4 ),
        array( 'db' => 'guru_jeniskelamin',        'dt' => 5 ),
        array( 'db' => 'guru_pendidikanterakhir',        'dt' => 6 ),
        array( 'db' => 'guru_tahunpendidikan',        'dt' => 7 ),
        array( 'db' => 'guru_jurusan',       'dt' => 8 ),
        array( 'db' => 'guru_jabatan',       'dt' => 9 ),
        array( 'db' => 'guru_id',     'dt' => 10 ),
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
	
	public function guru()
    {
		$data['tbl_guru'] = $this->m_general->view_order("tbl_guru", $order = "guru_namalengkap ASC");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_guru", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function guru_tambah()
    {
		$where = array("kelas_id !=" => "0");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where, $order ="kelas_nama ASC");
		
		$where1 = array("user_level" => "guru");
		$data['tbl_user'] = $this->m_general->view_where("tbl_user",$where1);
		
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_guru_add",$data);
		$this->load->view("v_admin_footer_form");
    }
	public function guru_ubah($guru_id)
	{
		$where = array("guru_id" => $guru_id);
		$data['tbl_guru'] = $this->m_general->view_by("tbl_guru",$where);
		
		$where1 = array("user_level" => "guru");
		$data['tbl_user'] = $this->m_general->view_where("tbl_user",$where1);
		
		$where2 = array("user_id" => $data['tbl_guru']->user_id);
		$data['tbl_user_by'] = $this->m_general->view_by("tbl_user",$where2);
		
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_guru_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function guru_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_guru", "guru_id");
			$_POST['guru_id'] = $primary_key;
			
			$_POST['user_id'] = ($this->input->post('user_id')!= FALSE ? $this->input->post('user_id'): NULL);
			
			$this->m_general->add("tbl_guru", $_POST);
			redirect('admin/guru');
    }	
	public function guru_aksi_ubah($guru_id)
    {
			$where = array("guru_id" => $guru_id);
			$_POST['user_id'] = ($this->input->post('user_id')!= FALSE ? $this->input->post('user_id'): NULL);
			$this->m_general->edit("tbl_guru", $where, $_POST);
			redirect('admin/guru');
    }	
	public function guru_aksi_hapus($guru_id){
			$where['guru_id'] = $guru_id;
			$this->m_general->hapus("tbl_guru", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/guru');
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_siswa()
	{
		
		$table = "
        (
            SELECT
                tbl_siswa.*, tbl_kelas.kelas_nama
            FROM
                tbl_siswa, tbl_kelas
			WHERE tbl_siswa.kelas_id=tbl_kelas.kelas_id
        )temp";
		
        $primaryKey = 'siswa_id';
        $columns = array(
        array( 'db' => 'siswa_namalengkap',     'dt' => 0 ),
        array( 'db' => 'siswa_alamat',        'dt' => 1 ),
        array( 'db' => 'siswa_nisn',        'dt' => 2 ),
        array( 'db' => 'siswa_tempatlahir',        'dt' => 3 ),
        array( 'db' => 'siswa_tanggallahir',        'dt' => 4 ),
        array( 'db' => 'siswa_nis',        'dt' => 5 ),
        array( 'db' => 'siswa_pekerjaanorangtua',        'dt' => 6 ),
        array( 'db' => 'siswa_namaayah',        'dt' => 7 ),
        array( 'db' => 'siswa_namaibu',       'dt' => 8 ),
        array( 'db' => 'siswa_jeniskelamin',       'dt' => 9 ),
        array( 'db' => 'siswa_agama',       'dt' => 10 ),
        array( 'db' => 'siswa_nohporangtua',       'dt' => 11 ),
        array( 'db' => 'kelas_nama',       'dt' => 12 ),
        array( 'db' => 'siswa_id',     'dt' => 13 ),
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
	
	public function siswa()
    {
		$data['tbl_siswa'] = $this->m_general->view_order("tbl_siswa", $order = "siswa_namalengkap ASC");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_siswa", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function siswa_tambah()
    {
		$where = array("kelas_id !=" => "0");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where, $order ="kelas_nama ASC");
		
		$where1 = array("user_level" => "siswa");
		$data['tbl_user'] = $this->m_general->view_where("tbl_user",$where1);
		
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_siswa_add",$data);
		$this->load->view("v_admin_footer_form");
    }
	public function siswa_ubah($siswa_id)
	{
		$where = array("siswa_id" => $siswa_id);
		$data['tbl_siswa'] = $this->m_general->view_by("tbl_siswa",$where);
		
		$where1 = array("user_level" => "siswa");
		$data['tbl_user'] = $this->m_general->view_where("tbl_user",$where1);
		
		$where2 = array("user_id" => $data['tbl_siswa']->user_id);
		$data['tbl_user_by'] = $this->m_general->view_by("tbl_user",$where2);
		
		$where3 = array("kelas_id !=" => "0");
		$data['tbl_kelas'] = $this->m_general->view_where("tbl_kelas", $where3, $order ="kelas_nama ASC");
		
		
		$where4 = array("kelas_id" => $data['tbl_siswa']->kelas_id);
		$data['tbl_kelas_by'] = $this->m_general->view_by("tbl_kelas",$where4);
		
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_siswa_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function siswa_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_siswa", "siswa_id");
			$_POST['siswa_id'] = $primary_key;
			
			$_POST['user_id'] = ($this->input->post('user_id')!= FALSE ? $this->input->post('user_id'): NULL);
			
			$this->m_general->add("tbl_siswa", $_POST);
			redirect('admin/siswa');
    }	
	public function siswa_aksi_ubah($siswa_id)
    {
			$where = array("siswa_id" => $siswa_id);
			$_POST['user_id'] = ($this->input->post('user_id')!= FALSE ? $this->input->post('user_id'): NULL);
			$this->m_general->edit("tbl_siswa", $where, $_POST);
			redirect('admin/siswa');
    }	
	public function siswa_aksi_hapus($siswa_id){
			$where['siswa_id'] = $siswa_id;
			$this->m_general->hapus("tbl_siswa", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/siswa');
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	
	public function get_data_master_kategori()
	{
		$table = "
        (
            SELECT
                *
            FROM
                tbl_kategori
        )temp";
		
        $primaryKey = 'kategori_id';
        $columns = array(
        array( 'db' => 'kategori_nama',     'dt' => 0 ),
        array( 'db' => 'kategori_id',     'dt' => 1 ),
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
	
	public function kategori()
    {
		$data['tbl_kategori'] = $this->m_general->view("tbl_kategori");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_kategori", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function kategori_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_kategori_add");
		$this->load->view("v_admin_footer_form");
    }
	public function kategori_ubah($kategori_id)
	{
		$where = array("kategori_id" => $kategori_id);
		$data['tbl_kategori'] = $this->m_general->view_by("tbl_kategori",$where);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_kategori_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function kategori_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_kategori", "kategori_id");
			$_POST['kategori_id'] = $primary_key;
			$this->m_general->add("tbl_kategori", $_POST);
			redirect('admin/kategori');
    }	
	public function kategori_aksi_ubah($kategori_id)
    {
			$where = array("kategori_id" => $kategori_id);
			$this->m_general->edit("tbl_kategori", $where, $_POST);
			redirect('admin/kategori');
    }	
	public function kategori_aksi_hapus($kategori_id){
			$where['kategori_id'] = $kategori_id;
			$this->m_general->hapus("tbl_kategori", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/kategori');
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_informasi()
	{
		$table = "
        (
            SELECT
                tbl_informasi.*, tbl_kategori.kategori_nama
            FROM
                tbl_informasi, tbl_kategori
			WHERE tbl_informasi.kategori_id=tbl_kategori.kategori_id
        )temp";
		
        $primaryKey = 'informasi_id';
        $columns = array(
        array( 'db' => 'informasi_judul',     'dt' => 0 ),
        array( 'db' => 'kategori_nama',     'dt' => 1 ),
        array( 'db' => 'informasi_keterangan',     'dt' => 2 ),
        array( 'db' => 'informasi_foto',     'dt' => 3 ),
        array( 'db' => 'informasi_id',     'dt' => 4 ),
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
	
	public function informasi()
    {
		$data['tbl_informasi'] = $this->m_general->view("tbl_informasi");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_informasi", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function informasi_tambah()
    {
		$data['tbl_kategori'] = $this->m_general->view("tbl_kategori");
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_informasi_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function informasi_ubah($informasi_id)
	{
		$where = array("informasi_id" => $informasi_id);
		$data['tbl_informasi'] = $this->m_general->view_by("tbl_informasi",$where);
		$where2 = array("kategori_id" => $data['tbl_informasi']->kategori_id);
		$data['tbl_kategori_by'] = $this->m_general->view_by("tbl_kategori",$where2);
		$data['tbl_kategori'] = $this->m_general->view("tbl_kategori");
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_informasi_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function informasi_aksi_tambah()
    {
			$folder = "informasi";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = "";
					}
					
			$_POST['informasi_foto'] = $nama_fileupload;
			$primary_key = $this->m_general->bacaidterakhir("tbl_informasi", "informasi_id");
			$_POST['informasi_id'] = $primary_key;		
			$this->m_general->add("tbl_informasi", $_POST);
			redirect('admin/informasi');
    }	
	public function informasi_aksi_ubah($informasi_id)
    {
			$folder = "informasi";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = $this->input->post('informasi_foto');
					}
					
					$_POST['informasi_foto'] = $nama_fileupload;
			$where = array("informasi_id" => $informasi_id);
			$this->m_general->edit("tbl_informasi", $where, $_POST);
			redirect('admin/informasi');
    }	
	public function informasi_aksi_hapus($informasi_id){
			$where['informasi_id'] = $informasi_id;
			$this->m_general->hapus("tbl_informasi", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/informasi');
	
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_galeri()
	{
		$table = "
        (
            SELECT
                *
            FROM
                tbl_galeri
        )temp";
		
        $primaryKey = 'galeri_id';
        $columns = array(
        array( 'db' => 'galeri_judul',     'dt' => 0 ),
        array( 'db' => 'galeri_keterangan',     'dt' => 1 ),
        array( 'db' => 'galeri_foto',     'dt' => 2 ),
        array( 'db' => 'galeri_id',     'dt' => 3 ),
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
	
	public function galeri()
    {
		$data['tbl_galeri'] = $this->m_general->view("tbl_galeri");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_galeri", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function galeri_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_galeri_add");
		$this->load->view("v_admin_footer_form");
    }
	public function galeri_ubah($galeri_id)
	{
		$where = array("galeri_id" => $galeri_id);
		$data['tbl_galeri'] = $this->m_general->view_by("tbl_galeri",$where);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_galeri_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function galeri_aksi_tambah()
    {
			$folder = "galeri";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = "";
					}
					
			$_POST['galeri_foto'] = $nama_fileupload;
			$primary_key = $this->m_general->bacaidterakhir("tbl_galeri", "galeri_id");
			$_POST['galeri_id'] = $primary_key;				
			$this->m_general->add("tbl_galeri", $_POST);
			redirect('admin/galeri');
    }	
	public function galeri_aksi_ubah($galeri_id)
    {
			$folder = "galeri";
					$file_upload = $_FILES['userfiles'];
					$files = $file_upload;
					
					if($files['name'] != "" OR $files['name'] != NULL){
						$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
					}else{
						$nama_fileupload = $this->input->post('galeri_foto');
					}
					
					$_POST['galeri_foto'] = $nama_fileupload;
			$where = array("galeri_id" => $galeri_id);
			$this->m_general->edit("tbl_galeri", $where, $_POST);
			redirect('admin/galeri');
    }	
	public function galeri_aksi_hapus($galeri_id){
			$where['galeri_id'] = $galeri_id;
			$this->m_general->hapus("tbl_galeri", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/galeri');
	
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_kelas()
	{
		$table = "
        (
            SELECT
                *
            FROM
                tbl_kelas
        )temp";
		
        $primaryKey = 'kelas_id';
        $columns = array(
        array( 'db' => 'kelas_nama',     'dt' => 0 ),
        array( 'db' => 'kelas_id',     'dt' => 1 ),
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
	
	public function kelas()
    {
		$data['tbl_kelas'] = $this->m_general->view("tbl_kelas");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_kelas", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function kelas_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_kelas_add");
		$this->load->view("v_admin_footer_form");
    }
	public function kelas_ubah($kelas_id)
	{
		$where = array("kelas_id" => $kelas_id);
		$data['tbl_kelas'] = $this->m_general->view_by("tbl_kelas",$where);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_kelas_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function kelas_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_kelas", "kelas_id");
			$_POST['kelas_id'] = $primary_key;	
			$this->m_general->add("tbl_kelas", $_POST);
			redirect('admin/kelas');
    }	
	public function kelas_aksi_ubah($kelas_id)
    {
			$where = array("kelas_id" => $kelas_id);
			$this->m_general->edit("tbl_kelas", $where, $_POST);
			redirect('admin/kelas');
    }	
	public function kelas_aksi_hapus($kelas_id){
			$where['kelas_id'] = $kelas_id;
			$this->m_general->hapus("tbl_kelas", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/kelas');
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_mapel()
	{
		$table = "
        (
            SELECT
                *
            FROM
                tbl_mapel
        )temp";
		
        $primaryKey = 'mapel_id';
        $columns = array(
        array( 'db' => 'mapel_nama',     'dt' => 0 ),
        array( 'db' => 'mapel_id',     'dt' => 1 ),
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
	
	public function mapel()
    {
		$data['tbl_mapel'] = $this->m_general->view("tbl_mapel");
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_mapel", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function mapel_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_mapel_add");
		$this->load->view("v_admin_footer_form");
    }
	public function mapel_ubah($mapel_id)
	{
		$where = array("mapel_id" => $mapel_id);
		$data['tbl_mapel'] = $this->m_general->view_by("tbl_mapel",$where);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_mapel_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function mapel_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_mapel", "mapel_id");
			$_POST['mapel_id'] = $primary_key;
			$this->m_general->add("tbl_mapel", $_POST);
			redirect('admin/mapel');
    }	
	public function mapel_aksi_ubah($mapel_id)
    {
			$where = array("mapel_id" => $mapel_id);
			$this->m_general->edit("tbl_mapel", $where, $_POST);
			redirect('admin/mapel');
    }	
	public function mapel_aksi_hapus($mapel_id){
			$where['mapel_id'] = $mapel_id;
			$this->m_general->hapus("tbl_mapel", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/mapel');
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
			redirect('admin/materi');
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
			redirect('admin/materi');
    }	
	public function materi_aksi_hapus($materi_id){
			$where['materi_id'] = $materi_id;
			$this->m_general->hapus("tbl_materi", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/materi');
	
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
			redirect('admin/tugas');
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
			redirect('admin/tugas');
    }	
	public function tugas_aksi_hapus($tugas_id){
			$where['tugas_id'] = $tugas_id;
			$this->m_general->hapus("tbl_tugas", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/tugas');
	
	}
	
	////////////////////////////////////
	
	////////////////////////////////////
	
	public function get_data_master_konsultasi()
	{
		$table = "
        (
            SELECT
                *
            FROM tbl_konsultasi
        )temp";
		
        $primaryKey = 'konsultasi_id';
        $columns = array(
        array( 'db' => 'konsultasi_namapengirim',     'dt' => 0 ),
        array( 'db' => 'konsultasi_pesan',     'dt' => 1 ),
        array( 'db' => 'konsultasi_balasan',     'dt' => 2 ),
        array( 'db' => 'konsultasi_created',     'dt' => 3 ),
        array( 'db' => 'konsultasi_updated',     'dt' => 4 ),
        array( 'db' => 'konsultasi_id',     'dt' => 5 ),
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
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_konsultasi_balas', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function konsultasi_aksi_tambah()
    {
			$primary_key = $this->m_general->bacaidterakhir("tbl_konsultasi", "konsultasi_id");
			$_POST['konsultasi_id'] = $primary_key;	
			$this->m_general->add("tbl_konsultasi", $_POST);
			redirect('admin/konsultasi');
    }	
	public function konsultasi_aksi_balas($konsultasi_id)
    {	
			$where = array("konsultasi_id" => $konsultasi_id);
			$_POST['user_id'] = $this->session->userdata("userid");
			$this->m_general->edit("tbl_konsultasi", $where, $_POST);
			redirect('admin/konsultasi');
    }	
	public function konsultasi_aksi_hapus($konsultasi_id){
			$where['konsultasi_id'] = $konsultasi_id;
			$this->m_general->hapus("tbl_konsultasi", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/konsultasi');
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
			redirect('admin/nilai');
    }	
	public function nilai_aksi_ubah($nilai_id)
    {
			$where = array("nilai_id" => $nilai_id);
			$this->m_general->edit("tbl_nilai", $where, $_POST);
			redirect('admin/nilai');
    }	
	public function nilai_aksi_hapus($nilai_id){
			$where['nilai_id'] = $nilai_id;
			$this->m_general->hapus("tbl_nilai", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/nilai');
	
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
			redirect('admin/jadwal');
    }	
	public function jadwal_aksi_ubah($jadwal_id)
    {
			$where = array("jadwal_id" => $jadwal_id);
			$this->m_general->edit("tbl_jadwal", $where, $_POST);
			redirect('admin/jadwal');
    }	
	public function jadwal_aksi_hapus($jadwal_id){
			$where['jadwal_id'] = $jadwal_id;
			$this->m_general->hapus("tbl_jadwal", $where); // Panggil fungsi hapus() yang ada di m_general.php
			redirect('admin/jadwal');
	
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
			$data['where3'] = $tahunajaranmax->jadwal_tahunajaran;
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
		$halaman = $this->load->view('v_cetak_jadwal',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
	////////////////////////////////////
	
	////////////////////////////////////
}