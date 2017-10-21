<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('form_validation');
	}
//========================================Validasi Data=====================================//
	public function validasi($trigger){
		if ($trigger == "polis") {
			$config = array(
                array(
                        'field' => 'tgl_mulai',
                        'label' => 'Tanggal Asuransi',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Tanggal Mulai harus diisi',),
                ),
                array(
                        'field' => 'tgl_habis',
                        'label' => 'Habis Kontrak',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Tanggal Kontrak harus diisi',)
                ),
                array(
                        'field' => 'jenis',
                        'label' => 'Jenis Asuransi',
                        'rules' => 'required',
                        'errors' => array( 'required' => 'Jenis Asuransi harus diisi',)
                )
             );
	   }
       $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE)
        {
            return false;
        }else{
            return true;
        }
    }
//========================================Data Control Polis=========================================///
    public function add_polis()
    {
         if ($this->validasi("polis") == TRUE) {
            $this->load->model('Model_admin');
            $this->Model_admin->insert_data("polis");
         }else{

            $this->load->model('Model_admin');
            $data = array(
                      'isi'             => 'backend/polis/add',
                      'title'           => 'Halaman Home',
                      'label'           => 'Tambah Data Polis',
                      'id_polis'        =>  $this->Model_admin->getKodePolis(),
                      'jenis'           =>  $this->Model_admin->getdataJenis()
                      );
            $this->load->view('layout/wrapper',$data);

        }
        
    }

  public function update_polis()
    {
      
      $this->load->model('Model_admin');
      $this->Model_admin->update_data("polis");
    }

  public function delete_polis($id)
  {
    $this->load->model('Model_admin');
    $this->Model_admin->delete_data("polis",$id);
  }
//========================================Data Control Polis=========================================///

//=========================================Data Control Agen=========================================///
  public function add_agen()
    {
       $this->load->model('Model_admin');
       $this->Model_admin->insert_data("agen");
        
    }

   public function update_agen($status)
    {
      if ($status == "admin_sess") {
        $this->load->model('Model_admin');
        $this->Model_admin->update_data("agen");
      }elseif ($status == "agen_sess") {
        $this->load->model('Model_admin');
        $this->Model_admin->update_data("agen_sess");
      }
      
    }

  public function delete_agen($id)
  {
    $this->load->model('Model_admin');
    $this->Model_admin->delete_data("agen",$id);
  }

//=========================================Data Control Agen=========================================///
//=========================================Data Control Nasabah=========================================///
  public function add_nasabah()
    {
       $this->load->model('Model_admin');
       $this->Model_admin->insert_data("nasabah");   
    }

   public function update_nasabah($role)
    {
      if ($role == "admin_sess") {
        $this->load->model('Model_admin');
        $this->Model_admin->update_data("nasabah");
      }elseif ($role == "nasabah_sess") {
        $this->load->model('Model_admin');
        $this->Model_admin->update_data("nasabah_sess");
      }
      
    }

  public function nasabah_saya($id)
  {
      $this->load->model('Model_admin');
      $this->Model_admin->update_nasabah("baru",$id);
  }

  public function delete_nasabah($id)
  {
    $this->load->model('Model_admin');
    $this->Model_admin->delete_data("nasabah",$id);
  }
  
//=========================================Data Control Nasabah=========================================///

//========================================Data Control Transaksi=====================================///
  public function add_transaksi()
  {
     $this->load->model('Model_admin');
     $this->Model_admin->insert_data("transaksi");

  }

  public function delete_transaksi($id){
    $this->load->model('Model_admin');
    $this->Model_admin->delete_data("transaksi",$id);
  }

  public function ekspor($trigger)
  {
    
    // var_dump($trigger);
    $this->load->model('Model_admin');
    $this->load->library('excel/Biffwriter');
    $this->load->library('excel/Format');
    $this->load->library('excel/OLEwriter');
    $this->load->library('excel/Parser');
    $this->load->library('excel/Workbook');
    $this->load->library('excel/Worksheet');

    if ($trigger == "manajer") {
      $res['data'] =  $this->Model_admin->eskpor_data("manajer");
    }elseif ($trigger == "biasa") {
      $res['data'] =  $this->Model_admin->eskpor_data("transaksi");
    } 
    $this->load->view('backend/output/excelfiles',$res);
   
  
  }

//========================================Data Control Produk========================================///
   public function add_produk()
    {
       $this->load->model('Model_admin');
       $this->Model_admin->insert_data("produk");   
    }

   public function update_produk()
    {
      
      $this->load->model('Model_admin');
      $this->Model_admin->update_data("produk");
    }

  public function delete_produk($id)
  {
    $this->load->model('Model_admin');
    $this->Model_admin->delete_data("produk",$id);
  }

//=========================================Data Control Nasabah=========================================///
  public function add_staf()
    {
       $this->load->model('Model_admin');
       $this->Model_admin->insert_data("staf");   
    }

   public function update_staf($role)
    {
        $this->load->model('Model_admin');
        $this->Model_admin->update_data("staf");
    }

 
  public function delete_staf($id)
  {
    $this->load->model('Model_admin');
    $this->Model_admin->delete_data("staf",$id);
  }
  
//=========================================Data Control Nasabah=========================================///

}