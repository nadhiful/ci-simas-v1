<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class En extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		
	}

	public function index()
	{
		if (!empty($this->session->userdata('idUser'))) {
        	$id 	= $this->session->userdata('idUser');
			$pecah 	= explode("-",$id);
			$hasil  = $pecah[0];
        	if ($hasil == "ADM") {
        		redirect('Admin');
        	}elseif ($hasil == "AGN") {
        		redirect('Agen');
        	}elseif ($hasil == "NSB") {
        		redirect('Nasabah');
        	}elseif ($hasil == "STF") {
        		redirect('Staff');
        	}elseif ($hasil == "MNG") {
        		redirect('Manajer');
        	}
        }

		$data = array(
						'title'		=> 'Halaman Login',
					 );
		$this->load->view('backend/login/login',$data);
	}

	public function check_user(){
			$this->load->model('Model_admin');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[8]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>','</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('backend/login/login');
			} else {
				
				$valid = $this->Model_admin->cek_user();
				if ($valid == FALSE)
				{
					$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade in" role="alert">
            		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            		</button>
            		<strong>Salah !</strong><br>Salah username atau password</div>');
				redirect('En');
				} else {
					$array = array(
						'idUser'		=> $valid->idUser,
						'namaUser' 		=> $valid->namaUser,
						'levelUser'	   	=> $valid->levelUser,
						'login_status'	=> TRUE
					);
					//echo "string";
					$this->session->set_userdata($array);
					switch ($valid->levelUser) {
						case admin:
							redirect('Admin');
							break;
						case nasabah:
							redirect('Nasabah');
							break;
						case agen:
							redirect('Agen');
							break;
						case staff:
							redirect('Staff');
							break;
						case manajer:
							redirect('Manajer');
							break;								
						default:
							# code...
							break;
					}
				}
				
			}

	}

	public function logout() {
        $this->session->unset_userdata('idUser');
        $this->session->unset_userdata('namaUser');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('levelUser');
        $this->session->unset_userdata('login_status');
        $this->session->sess_destroy();
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('En');
    }

}

/* End of file  */
/* Location: ./application/controllers/ */