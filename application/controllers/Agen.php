<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$table = 'data_polis';
		$field = 'macam_asuransi';
		if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');                        
        };
	}

	public function index()
	{
		
		$id   = $this->session->userdata('idUser');
		$this->load->model('Model_admin');
		$data = array(
					  'id_session'	=> $this->session->userdata('idUser'),
					  'isi' 		=> 'backend/home/agen',
					  'user'		=>	$this->Model_admin->getdataID("agen",$id),
					  'data'		=> 	$this->Model_admin->get_all("transaksi",$id),
					  'id_trans'	=> 	$this->Model_admin->getKodeTransaksi(),
					  'data_agen'	=>	$this->Model_admin->getkeyAgen($id),
					  'data_nasabah'=>	$this->Model_admin->getkeyNasabah($id),	
					  'title'		=> 'Halaman Home',
					  'label'		=> 'Dashboard',
					  );
		$this->load->view('layout/wrapper',$data);
	}

		public function view_nasabah(){
		$this->load->model('Model_admin');
		$data = array(
					  'isi' 		=> 'backend/nasabah/view',
					  'title'		=> 'Halaman Nasabah',
					  'data'		=> 	$this->Model_admin->get_all("nasabah",$id),
					  'id_nasabah'	=>	$this->Model_admin->getKodeNasabah(),
					  'id_bayar'	=> 	$this->Model_admin->getBayar(),
					  'produk'		=>	$this->Model_admin->getProduk(),
					  'label'		=> 'List Nasabah'
					  );
		$this->load->view('layout/wrapper',$data);
	}

	public function existed_nasabah(){
		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(
					  'isi' 		=> 'backend/nasabah/existed',
					  'title'		=> 'Halaman List Nasabah',
					  'existed'		=> 	$this->Model_admin->getdataID("nasabah_existed",$id),
					  'id_nasabah'	=>	$this->Model_admin->getKodeNasabah(),
					  'id_bayar'	=> 	$this->Model_admin->getBayar(),
					  'produk'		=>	$this->Model_admin->getProduk(),
					  'label'		=> 'List Nasabah Lama'
					  );
		$this->load->view('layout/wrapper',$data);
	}


	public function nasabah_baru(){
		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(
					  'title_id'	=> 'ID Nasabah',
					  'isi' 		=> 'backend/nasabah/baru',
					  'title'		=> 'Halaman List Nasabah',
					  'data'		=> 	$this->Model_admin->get_all("baru",$id),
					  'id_nasabah'	=>	$this->Model_admin->getKodeNasabah(),
					  'id_bayar'	=> 	$this->Model_admin->getBayar(),
					  'produk'		=>	$this->Model_admin->getProduk(),
					  'label'		=> 'List Nasabah Baru'
					  );
		$this->load->view('layout/wrapper',$data);	
	}


	public function view_transaksi(){
		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(
					  'isi' 			=> 'backend/transaksi/view',
					  'title'			=> 'Halaman Transaksi',					  
					  'data'			=> 	$this->Model_admin->get_all("transaksi",$id),
					  'id_trans'		=> 	$this->Model_admin->getKodeTransaksi(),
					  'data_agen'		=>	$this->Model_admin->getkeyAgen($id),
					  'data_nasabah'	=>	$this->Model_admin->getkeyNasabah($id),	
					  'label'			=> 'List Transaksi'
					  );
		$this->load->view('layout/wrapper',$data);
	}

	 function get_detail_nasabah(){
	 	$this->load->model('Model_admin');
        $id_nasabah 	=$this->input->post('nasabah');
        $data 			= array(
            				'detail_nasabah'	=>	$this->Model_admin->getSelectedNasabah("detail",$id_nasabah),
            				'produk'			=> 	$this->Model_admin->getSelectedNasabah("produk",$id_nasabah)
        					);
        $this->load->view('backend/transaksi/ajax_detail_nasabah',$data);
    }

    public function detail_transaksi(){
    	$id= $this->uri->segment(3);
    	$this->load->model('Model_admin');
    	$data = array(
    					'isi' 			=> 'backend/transaksi/detail_transaksi' ,
    					'title'			=> 'Halaman Detail Transaksi',	
    					'label'			=> 'Detail Transaksi',
    					'data'			=> $this->Model_admin->getdataID("transaksi",$id)

    				 );
    	$this->load->view('layout/wrapper', $data);
    }

      public function print_transaksi(){
    	$id= $this->uri->segment(3);
    	$this->load->model('Model_admin');
    	$data = array(
    					'isi' 			=> 'backend/transaksi/print_transaksi' ,
    					'title'			=> 'Halaman Print Transaksi',	
    					'label'			=> 'Detail Transaksi',
    					'data'			=> $this->Model_admin->getdataID("transaksi",$id)

    				 );
    	$this->load->view('layout/wrapper', $data);
    }	

    public function report(){
    		$id   = $this->session->userdata('idUser');
    		$this->load->model('Model_admin');
			$data = array(
					  'isi' 			=> 'backend/nasabah/laporan',
					  'title'			=> 'Halaman Laporan Per Nasabah',
					  'label'			=> 'List Transaksi Nasabah',
					  'data_nasabah'	=>	$this->Model_admin->getkeyNasabah($id),	
					  );
		$this->load->view('layout/wrapper',$data);
    }

    public function cari(){

    	$this->load->model('Model_admin');
    	$tgl_awal	= date("Y-m-d",strtotime($this->input->post('tgl_mulai')));
        $tgl_akhir 	= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
        $id_nasabah = $this->input->post('nasabah');
        $sess_data=array(
            'tgl_awal'		=>$tgl_awal,
            'tgl_akhir'		=>$tgl_akhir,
            'id_nasabah'	=>$id_nasabah
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dt_result'	=> 	$this->Model_admin->laporan($tgl_awal,$tgl_akhir,$id_nasabah),
            'tgl_awal'	=>	date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
            'tgl_akhir'	=>	date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
            'isi'		=> 'backend/nasabah/hasil',
            'title'		=> 'Halaman Laporan Per Nasabah',
			'label'		=> 'List Transaksi Nasabah',
        );
        $this->load->view('backend/nasabah/hasil',$data);
    }


}

/* End of file Agen.php */
/* Location: ./application/controllers/Agen.php */