<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {

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
					  'isi' 		=> 'backend/home/staf',
					  'user'		=>	$this->Model_admin->getdataID("staff",$id),
					  'data'		=> 	$this->Model_admin->get_all("transaksi",$id),
					  'id_trans'	=> 	$this->Model_admin->getKodeTransaksi(),
					  'data_agen'	=>	$this->Model_admin->getkeyAgen($id),
					  'data_nasabah'=>	$this->Model_admin->getkeyNasabah($id),	
					  'title'		=> 'Halaman Home',
					  'label'		=> 'Dashboard',
					  );
		$this->load->view('layout/wrapper',$data);
	}

	public function view_transaksi(){
		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(

					  'title_id'		=> 'ID Transaksi',
					  'isi' 			=> 'backend/transaksi/view',
					  'title'			=> 'Halaman Transaksi',
					  'agen'			=>	$this->Model_admin->get_all("agen",$id),
					  'agen_transaksi'	=>	$this->Model_admin->get_all("transaksi_agen",$id),				  
					  'data'			=> 	$this->Model_admin->get_all("transaksi",$id),
					  'id_trans'		=> 	$this->Model_admin->getKodeTransaksi(),
					  'data_agen'		=>	$this->Model_admin->getkeyAgen($id),
					  'data_nasabah'	=>	$this->Model_admin->getkeyNasabah($id),	
					  'label'			=> 'List Transaksi'
					  );
		$this->load->view('layout/wrapper',$data);
	}

	function get_nasabah($id_agen){
			$var = 'NotYet';
		 	$query = $this->db->where('id_agen', $id_agen)
		 					  ->where('status_exist !=',$var)
		 					  ->from('data_nasabah')
		 					  ->get();
		    $data = "<option value='0'>- Select Nasabah -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id_nasabah."'>".$value->nama."</option>";
		    }
		    echo $data;
	}

	function get_nasabah_alamat($id_nasabah){
		 	$query = $this->db->get_where('data_nasabah',array('id_nasabah'=>$id_nasabah));
		 	$data = "";
		    foreach ($query->result() as $value) {
		        $data .= "<input name='alamat' class='form-control' type='text' value='".$value->alamat."' readonly=''>";
		    }
		    echo $data;
	}

	function get_nasabah_produk($id_nasabah){
		 	$query = $this->db->select('a.*,b.nama_produk,c.nama AS nama_agen,d.nama_bayar,e.password')
										->from('data_nasabah AS a')
										->join('kategori_asuransi AS b','b.id_produk = a.id_produk','inner')
										->join('data_agen AS c','c.id_agen = a.id_agen','inner')
										->join('jenis_bayar AS d','d.id_bayar = a.id_bayar','inner')
										->join('user AS e','e.idUser = a.id_nasabah','inner')
										->where('a.id_nasabah',$id_nasabah)
										->get();
		 	$data = "";
		    foreach ($query->result() as $value) {
		        $data .= "<input name='produk' class='form-control' type='text' value='".$value->nama_produk."' readonly=''>";
		    }
		    echo $data;
	}
	
	function get_nasabah_nominal($id_nasabah){
		 	$query = $this->db->get_where('data_nasabah',array('id_nasabah'=>$id_nasabah));
		 	$data = "";
		    foreach ($query->result() as $value) {
		        $data .= "<input name='nominal' class='form-control' type='text' readonly value='".$value->nominal."'>";
		    }
		    echo $data;
	}

	function get_nasabah_email($id_nasabah){
		 	$query = $this->db->get_where('data_nasabah',array('id_nasabah'=>$id_nasabah));
		 	$data = "";
		    foreach ($query->result() as $value) {
		        $data .= "<input name='email' class='form-control' type='text' value='".$value->email."' readonly>";
		    }
		    echo $data;
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