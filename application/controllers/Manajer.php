<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$table = 'data_polis';
		$field = 'macam_asuransi';
		$this->load->helper('currency_format_helper');
		if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');                        
        };

	}
//==============================================================================//
	public function index()
	{
		$this->load->model('Model_admin');
		$data = array(
					  'id_session'	=> $this->session->userdata('idUser'),
					  'isi' 		=> 'backend/home/manajer',
					  'title'		=> 'Halaman Manajer',
					  'label'		=> 'Dashboard',
					  );
		$this->load->view('layout/wrapper',$data);
	}
//==============================================================================//
	public function view_polis(){
		$this->load->model('Model_admin');
		$id = $this->session->userdata('idUser');
		$data = array(

					  'title_id'	=> 'ID Polis',		 
					  'isi' 		=> 'backend/polis/view',
					  'title'		=> 'Halaman Polis',
					  'data'		=> 	$this->Model_admin->get_all("polis",$id),
					  'id_polis'	=> 	$this->Model_admin->getKodePolis(),
					  'jenis'		=>	$this->Model_admin->getdataJenis(),
					  'label'		=> 'List Polis'
					  );
		$this->load->view('layout/wrapper',$data);		
	}
//==============================================================================//
	public function view_agen(){
		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(

					  'title_id'	=> 'ID Agen',
					  'isi' 		=> 'backend/agen/view',
					  'title'		=> 'Halaman Agen',
					  'data'		=> 	$this->Model_admin->get_all("agen",$id),
					  'id_agen'		=> 	$this->Model_admin->getKodeAgen(),
					  'nasabah'		=>	$this->Model_admin->getNasabah(),
					  'label'		=> 'List Agen',
					  'existed'		=> 	$this->Model_admin->getdataID("nasabah_existed",$id),
					  'id_nasabah'	=>	$this->Model_admin->getKodeNasabah(),
					  'id_bayar'	=> 	$this->Model_admin->getBayar(),
					  'produk'		=>	$this->Model_admin->getProduk(),
					  );
		$this->load->view('layout/wrapper',$data);
	}

//==============================================================================//
	public function view_nasabah(){
		$this->load->model('Model_admin');
		$id = $this->session->userdata('idUser');
		$data = array(

					  'title_id'	=> 'ID Nasabah',
					  'isi' 		=> 'backend/nasabah/view',
					  'title'		=> 'Halaman Nasabah',
					  'data'		=> 	$this->Model_admin->get_all('nasabah',$id),
					  'id_nasabah'	=>	$this->Model_admin->getKodeNasabah(),
					  'id_agen'		=>  $this->Model_admin->get_all('agen',$id),
					  'id_bayar'	=> 	$this->Model_admin->getBayar(),
					  'produk'		=>	$this->Model_admin->getProduk(),
					  'label'		=> 'List Nasabah',
					  'bayar'		=>	$this->Model_admin->cek_bayar()
					  );
		$this->load->view('layout/wrapper',$data);
	}
//==================================================================================//
	public function view_staff(){
		$this->load->model('Model_admin');
		$id = $this->session->userdata('idUser');
		$data = array(
					  'title_id'	=> 'ID Staff',
					  'isi' 		=> 'backend/staff/view',
					  'title'		=> 'Halaman Staff',
					  'data'		=> 	$this->Model_admin->get_all('staf',$id),
					  'id_staf'		=>	$this->Model_admin->getKodeStaf(),
					  'label'		=> 'List Staff'
					  );
		$this->load->view('layout/wrapper',$data);
	}

//==================================================================================//

	public function existed_nasabah(){
		$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(

					  'title_id'	=> 'ID Nasabah',
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
					  'agen'		=>  $this->Model_admin->get_all("agen",$id),
					  'label'		=> 'List Nasabah Baru'
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
					  'label'			=> 'List Transaksi',
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
		        $data .= "<input name='email' class='form-control' type='text' value='".$value->email."'>";
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

    public function view_user(){
    	$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(

					  'title_id'		=> 'ID User',
					  'isi' 			=> 'backend/user/view',
					  'title'			=> 'Halaman User',					  
					  'data'			=> 	$this->Model_admin->get_all("user",$id),
					  'id_trans'		=> 	$this->Model_admin->getKodeTransaksi(),
					  'data_agen'		=>	$this->Model_admin->getkeyAgen($id),
					  'data_nasabah'	=>	$this->Model_admin->getkeyNasabah($id),	
					  'label'			=> 'List User'
					  );
		$this->load->view('layout/wrapper',$data);

    }

    public function view_produk(){
    	$this->load->model('Model_admin');
		$id   = $this->session->userdata('idUser');
		$data = array(

					  'title_id'		=> 'ID Produk',
					  'isi' 			=> 'backend/produk/view',
					  'title'			=> 'Halaman produk',					  
					  'data'			=> 	$this->Model_admin->get_all("produk",$id),
					  'id_produk'		=>	$this->Model_admin->getKodeProduk(),
					  'label'			=> 'List Produk'
					  );
		$this->load->view('layout/wrapper',$data);

    }

    public function detail_polis(){
    	$id= $this->uri->segment(3);
    	$this->load->model('Model_admin');
    	$data = array(
    					'isi' 			=> 'backend/polis/detail_polis' ,
    					'title'			=> 'Halaman Detail Polis',	
    					'label'			=> 'Detail Polis',
    					'data'			=> $this->Model_admin->getdataID("polis",$id),
    					'agen'			=> $this->Model_admin->getdataID("chain_polis",$id)
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

    public function view_report()
    {
    	$this->load->model('Model_admin');
    	$id   = $this->session->userdata('idUser');
    	$pecah 	= explode("-",$id);
		$hasil  = $pecah[0];
        	if ($hasil == "MNG") {
       			$data = array(

					  'title_id'		=> 'ID Transaksi',
					  'isi' 			=> 'backend/transaksi/report',
					  'title'			=> 'Halaman Transaksi',
					  'agen'			=>	$this->Model_admin->get_all("agen",$id),
					  'agen_transaksi'	=>	$this->Model_admin->get_all("transaksi_agen",$id),				  
					  'data'			=> 	$this->Model_admin->get_all("report",$id),
					  'id_trans'		=> 	$this->Model_admin->getKodeTransaksi(),
					  'data_agen'		=>	$this->Model_admin->getkeyAgen($id),
					  'data_nasabah'	=>	$this->Model_admin->getkeyNasabah($id),	
					  'label'			=> 'List Transaksi',
					  );
		$this->load->view('layout/wrapper',$data); 		
        }else {
        	redirect('En/logout');
        }
		
    }
// ================================Fungsi Coba=================================================//  	

//=========================Controller Untuk View Bagi User Admin================================//
// =============================================================================================//


}

/* End of file  */
/* Location: ./applicatsion/controllers/ */