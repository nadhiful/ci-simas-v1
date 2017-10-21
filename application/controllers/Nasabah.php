<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nasabah extends CI_Controller {

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

		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(
					  'id_session'	=> $this->session->userdata('idUser'),
					  'isi' 		=> 'backend/home/nasabah',
					  'user'		=>	$this->Model_admin->getdataID("nasabah_id",$id),
					  'data'		=> 	$this->Model_admin->get_all("transaksi_nasabah",$id),
					  'id_bayar'	=> 	$this->Model_admin->getdataID("bayar",$id),
					  'produk'		=>	$this->Model_admin->getdataID("produk",$id),
					  'title'		=> 'Halaman Home',
					  'label'		=> 'Dashboard',
					  );
		$this->load->view('layout/wrapper',$data);
	}

	public function view_transaksi(){
		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(
					  'isi' 			=> 'backend/transaksi/view',
					  'title'			=> 'Halaman Transaksi',					  
					  'data'			=> 	$this->Model_admin->get_all("transaksi_nasabah",$id),
					  'id_trans'		=> 	$this->Model_admin->getKodeTransaksi(),
					  'data_agen'		=>	$this->Model_admin->getkeyAgen($id),
					  'data_nasabah'	=>	$this->Model_admin->getkeyNasabah($id),	
					  'label'			=> 'List Transaksi',
                      'bayar'           =>  $this->Model_admin->cek_bayar($id)
                      
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

}

/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */