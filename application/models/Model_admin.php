<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_user(){
		$username = set_value('username');
		$password = set_value('password');
		$role 	  = set_value('role');

		$hasil = $this->db->where('idUser',$username)
						  ->where('password',$password)
						  ->where('levelUser',$role)
						  ->limit(1)
						  ->get('user');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	//=======================================Start Fungsi GET=================================//
	public function get_all($trigger,$id){
		if ($trigger == 'polis') {
			$hasil=	$this->db->select('a.*,b.*,c.*,d.*')
						 ->from("data_polis AS a")
						 ->join("kategori_asuransi AS b","b.id_produk = a.id_produk","inner")
						 ->join("data_nasabah AS c","c.id_nasabah = a.id_nasabah","inner")
						 ->join("jenis_bayar AS d","d.id_bayar = a.id_bayar","inner")
						 ->get();
		
			if($hasil->num_rows() > 0){
				$des = $hasil->result();
				return $des;
			}else{
				 return array();
			}
		}elseif ($trigger == 'transaksi') {
			$id_agen 	= $this->session->userdata('idUser');
			$pecah 	= explode("-",$id_agen);
			$hasil  = $pecah[0];
        	if ($hasil == "ADM" || $hasil == "STF" || $hasil == "MNG") {
        		$hasil		=	$this->db->select('a.id_pembayaran,c.nama,a.tgl_transaksi,b.*')
								 ->from("data_pembayaran AS a")
								 ->join("data_nasabah AS c","c.id_nasabah = a.id_nasabah","inner")
								 ->join("kategori_asuransi AS b","b.id_produk = c.id_produk","inner")
								 ->get();
				
			if($hasil->num_rows() > 0){
				$des = $hasil->result();
				return $des;
			}else{
				 return array();
				}
        	}elseif ($id_agen != 'ADM-001') {
				$hasil		=	$this->db->select('a.id_pembayaran,c.nama,a.tgl_transaksi,b.*')
								 ->from("data_pembayaran AS a")
								 ->join("data_nasabah AS c","c.id_nasabah = a.id_nasabah","inner")
								 ->join("kategori_asuransi AS b","b.id_produk = c.id_produk","inner")
								 ->where('c.id_agen =',$id_agen)
								 ->get();
			if($hasil->num_rows() > 0){
				$des = $hasil->result();
				return $des;
			}else{
				 return array();
				}
			}
			
		}elseif ($trigger == 'agen') {
			$id = $this->session->userdata('idUser');
			$var 	= 'ADM-001';
			$hasil = $this->db->select('a.*,a.nama AS nama_agen')
							  ->from('data_agen AS a')
							  ->where('a.id_agen!=', $var)
							  ->get('');
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return array();
			}

		}elseif ($trigger == 'nasabah') {
			$id = $this->session->userdata('idUser');
			$id 	= $this->session->userdata('idUser');
			$pecah 	= explode("-",$id);
			$hasil  = $pecah[0];
        	if ($hasil == "ADM" || $hasil == "STF" || $hasil == "MNG") {
        		$hasil = $this->db->select('a.*,b.id_produk,b.nama_produk,c.nama_bayar,d.nama AS nama_agen,e.password')
							  ->from("data_nasabah AS a")
							  ->join("kategori_asuransi AS b","b.id_produk = a.id_produk","inner")
							  ->join("jenis_bayar AS c","c.id_bayar = a.id_bayar","inner")
							  ->join("data_agen AS d","a.id_agen = d.id_agen","inner")
							  ->join("user as e","a.id_nasabah = e.idUser","inner")
							  ->get();
        	}elseif ($id !== 'ADM-001') {
				$hasil = $this->db->select('a.*,b.id_produk,b.nama_produk,c.nama_bayar')
							  ->from("data_nasabah AS a")
							  ->join("kategori_asuransi AS b","b.id_produk = a.id_produk","inner")
							  ->join("jenis_bayar AS c","c.id_bayar = a.id_bayar","inner")
							  ->join("user as d","a.id_nasabah = d.idUser","inner")
							  ->join("data_agen AS e","a.id_agen = e.id_agen","inner")
							  ->get();	
			}
			if ($hasil->num_rows() >0) {
			 	return $hasil->result();
			 }else{
			 	return array();
			 }
		}elseif ($trigger == "user") {
			$hasil 	=	$this->db->get('user');
			if ($hasil->num_rows() >0) {
				return $hasil->result();
			}else{
				return array();
			}
		}elseif ($trigger == "produk") {
			$hasil = $this->db->get('kategori_asuransi');
			if ($hasil->num_rows() > 0 ) {
				return $hasil->result();
			}else{
				return array();
			}
		}elseif ($trigger == "baru") {
			$var = "NotYet";
			$id   = $this->session->userdata('idUser');
			$hasil 	=  $this->db->select('a.*,b.id_produk,b.nama_produk,c.id_bayar,c.nama_bayar,d.password')
								->distinct()
								->from("data_nasabah AS a")
								->join("kategori_asuransi AS b","b.id_produk = a.id_produk","inner")
								->join("jenis_bayar AS c","c.id_bayar = a.id_bayar","inner")
								->join("user as d","a.id_nasabah = d.idUser","inner")
								->where('a.status_exist =', $var)
								->where('a.id_agen=',$id)
								->from('data_nasabah')
								->get();
			if ($hasil->num_rows() > 0) {
				return  $hasil->result();
			}else{
				return FALSE;
			}
		}elseif ($trigger == 'transaksi_nasabah') {
			$id_nasabah = $this->session->userdata('idUser');
			$hasil		=	$this->db->select('a.id_pembayaran,c.nama,a.tgl_transaksi,b.*')
								 ->from("data_pembayaran AS a")
								 ->join("data_nasabah AS c","c.id_nasabah = a.id_nasabah","inner")
								 ->join("kategori_asuransi AS b","b.id_produk = c.id_produk","inner")
								 ->where('a.id_nasabah',$id_nasabah)
								 ->get();
				
			if($hasil->num_rows() > 0){
				$des = $hasil->result();
				return $des;
			}else{
				 return array();
			}
		}else if ($trigger == 'transaksi_agen') {
			$var 	= 'ADM-001';
			$var2	= 'NotYet';
			$hasil = $this->db->select('a.id_agen,b.nama ')
							  ->distinct()
							  ->from('data_nasabah AS a')
							  ->join('data_agen AS b','a.id_agen = b.id_agen','inner')
							  ->where('a.status_exist !=',$var2)
							  ->where('a.id_agen!=', $var)
							  ->get('');
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return array();
			}
		}elseif ($trigger == "staf") {
				$hasil		=	$this->db->select('*')
									 ->from('data_staf')
									 ->get();

				if ($hasil->num_rows() > 0) {
					return $hasil->result();
				}else{
					return array();
				}
		}elseif ($trigger == "report") {
			$bulan 		= $this->input->post('bulan');
			$tahun		= $this->input->post('tahun');
			$hasil 		= $this->db->select('a.*,c.nama,b.*')
								   ->from('data_pembayaran AS a')
								   ->join("data_nasabah AS c","c.id_nasabah = a.id_nasabah","inner")
								   ->join("kategori_asuransi AS b","b.id_produk = c.id_produk","inner")
								   ->where('MONTH(a.tgl_transaksi)',$bulan)
								   ->where('YEAR(a.tgl_transaksi)',$tahun)
								   ->get();
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return FALSE;
			}

		}

	}
//============================================DATA ID=================================================//

	public function getdataID($trigger,$id){
		if ($trigger == "transaksi") {
			$hasil   = $this->db->select('a.*,b.*,c.*,d.nama AS nama_agen,b.nama AS nama_nasabah')
								->from('data_pembayaran AS a')
								->join("data_nasabah AS b","a.id_nasabah = b.id_nasabah","inner")
								->join("kategori_asuransi AS c","b.id_produk = c.id_produk","inner")
								->join("data_agen AS d","b.id_agen = d.id_agen","inner")
								->where("id_pembayaran",$id)
								->get();
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return array();
			}
		}elseif ($trigger == "polis") {
			$hasil=	$this->db->select('a.*,b.*,c.*,d.*,c.nama AS nama_nasabah,a.id_agen AS agen')
						 	 ->from("data_polis AS a")
						 	 ->join("kategori_asuransi AS b","b.id_produk = a.id_produk","inner")
						 	 ->join("data_nasabah AS c","c.id_nasabah = a.id_nasabah","inner")
						 	 ->join("jenis_bayar AS d","d.id_bayar = a.id_bayar","inner")
						 	 ->where('id_polis',$id)
						 	 ->get();		
			if($hasil->num_rows() > 0){
				$des = $hasil->result();
				return $des;
			}else{
				 return array();
			}
		}elseif ($trigger == "chain_polis") {
			$id_agen 	= 	$this->session->userdata('idUser');
			$hasil		= 	$this->db->select('a.id_agen,b.id_agen,b.nama AS nama_agen,b.alamat,b.tempat')
									 ->from('data_polis AS a')
									 ->join("data_agen AS b","b.id_agen = a.id_agen","inner")
									 ->where("id_polis",$id)
									 ->get();
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return FALSE;
			}
		}elseif ($trigger == "nasabah_existed") {
			$var1		=	"Added";
			$hasil = $this->db->select('a.*,b.id_produk,b.nama_produk,c.id_bayar,c.nama_bayar,d.password')
								  ->from("data_nasabah AS a")
								  ->join("kategori_asuransi AS b","b.id_produk = a.id_produk","inner")
								  ->join("jenis_bayar AS c","c.id_bayar = a.id_bayar","inner")
								  ->join("user as d","a.id_nasabah = d.idUser","inner")
								  ->where("status_exist =",$var1)
				  				  ->where("id_agen =",$id)
								  ->get();
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return FALSE;
			}
		}elseif ($trigger == "agen") {
			$id_agen 	= 	$this->session->userdata('idUser');
			$hasil		=	$this->db->select('*')
									 ->from('data_agen')
									 ->where('id_agen',$id)
									 ->get();
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return FALSE;
			}
		}elseif ($trigger == "nasabah_id") {
				$hasil		=  $this->db->select('a.*,b.nama_produk,c.nama AS nama_agen,d.nama_bayar,e.password')
										->from('data_nasabah AS a')
										->join('kategori_asuransi AS b','b.id_produk = a.id_produk','inner')
										->join('data_agen AS c','c.id_agen = a.id_agen','inner')
										->join('jenis_bayar AS d','d.id_bayar = a.id_bayar','inner')
										->join('user AS e','e.idUser = a.id_nasabah','inner')
										->where('a.id_nasabah',$id)
										->get();
				if ($hasil->num_rows() > 0) {
					return $hasil->result();
				}else{
					return FALSE;
				}
		}elseif ($trigger == "bayar") {
				$hasil 		=  $this->db->select('a.*,b.nama_bayar')
										->from('data_nasabah AS a')
										->join("jenis_bayar AS b","a.id_bayar = b.id_bayar","inner")
										->where("a.id_nasabah",$id)
										->get();
				if ($hasil->num_rows() > 0) {
					return $hasil->result();
				}else{
					return FALSE;
				}
		}elseif ($trigger == "staff") {
			$id_agen 	= 	$this->session->userdata('idUser');
			$hasil		=	$this->db->select('*')
									 ->from('data_staf')
									 ->where('id_staf',$id)
									 ->get();
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return FALSE;
			}
	}
}
	
//=====================================Polis==========================================================//
	public function getKodePolis()
    {
        $q = $this->db->query("select MAX(RIGHT(id_polis,3)) as kd_max from data_polis");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PL-".$kd;
    }
    
    public function getdataJenis(){
    	$hasil = $this->db->get('kategori_asuransi');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}
    }

    public function getdataPolis($trigger){
    	if ($trigger == "add") 
    	{
	    	$date1 = $this->input->post('tgl_mulai');
	    	$date2 = $this->input->post('tgl_habis');
			$data=array(
			            'id_polis'			=>$this->input->post('id_polis'),
			            'id_jenis'			=>$this->input->post('jenis'),
			            'tanggal_asuransi'	=>date("Y-m-d",strtotime($date1)),
			            'habis_kontrak'		=>date("Y-m-d",strtotime($date2))
	        );
			return $data;
			return true;
	    }elseif ($trigger == "update") {
	    	$date1 = $this->input->post('tgl_mulai2');
	    	$date2 = $this->input->post('tgl_habis2');
			$data=array(
			            'id_jenis'			=>$this->input->post('kd_jenis'),
			            'tanggal_asuransi'	=>date("Y-m-d",strtotime($date1)),
			            'habis_kontrak'		=>date("Y-m-d",strtotime($date2))
	        );
	        return $data;
	        return TRUE;
	    }
    	
	}
//====================================================================================================//

//=======================================Agen=========================================================//
public function getKodeAgen()
    {
        $q = $this->db->query("select MAX(RIGHT(id_agen,3)) as kd_max from data_agen");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "AGN-".$kd;
    }

public function getNasabah(){
	$var = 'Added';
	$hasil = $this->db->where('status_exist !=', $var)
					  ->get('data_nasabah');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}
}

public function getdataAgen($trigger){
    	if ($trigger == "add") 
    	{
	    	$date1 = $this->input->post('tgl_lahir');
			$data=array(
			            'id_agen'			=>$this->input->post('id_agen'),
			            // 'id_nasabah'		=>$this->input->post('nasabah'),
			            'nama'				=>$this->input->post('nama'),
			            'alamat'			=>$this->input->post('alamat'),
			            'tempat'			=>$this->input->post('tempat'),
			            'tanggal'			=>date("Y-m-d",strtotime($date1)),
			            'password'			=>$this->input->post('password')			            
	        );
			return $data;
			return true;
	    }elseif ($trigger == "update") {
	    	$date1 = $this->input->post('kd_lahir');
			$data=array(
			            'nama'				=>$this->input->post('kd_nama'),
			            'alamat'			=>$this->input->post('kd_alamat'),
			            'tempat'			=>$this->input->post('kd_tempat'),
			            'tanggal'			=>date("Y-m-d",strtotime($date1)),
			            'password'			=>$this->input->post('kd_password')
	        );
	        return $data;
	        return true;
	    }
    	
	}

//=======================================Agen=========================================================//

//=======================================Nasabah=======================================================//
public function getKodeNasabah()
    {
        $q = $this->db->query("select MAX(RIGHT(id_nasabah,3)) as kd_max from data_nasabah");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "NSB-".$kd;
    }

public function getBayar(){
	$hasil = $this->db->get('jenis_bayar');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}
}

public function getProduk(){
	$hasil = $this->db->get('kategori_asuransi');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			 return array();
		}
}

public function getdataNasabah($trigger){
    	if ($trigger == "add") 
    	{
    		//init tanggal
	    	$date1 			= $this->input->post('tgl_mulai');
	    	$date2 			= $this->input->post('tgl_akhir');
	    	//init kategori bayar
	    	$bayar 			= $this->input->post('j_bayar');
	    	//init produk 
	    	$input_produk 	= $this->input->post('j_produk');
	    	$pecah 			= explode("-",$input_produk);
	    	$output_produk	= $pecah[1];
	    	//init usia
	    	$usia 			= $this->input->post('usia');

	    	//init durasi
	    	$hasil  = $this->db->select('durasi,harga')
	    					   ->from('kategori_asuransi')
	    					   ->where('id_produk',$input_produk)
	    					   ->get();
	    	foreach ($hasil->result() as $key) {
	    		$waktu 	= $key->durasi;
	    		$harga  = $key->harga;
	    	}

	    	//init tanggal1
	    	$tanggal 	= date("Y-m-d");
	    	$var1   	= new DateTime(date("Y-m-d",strtotime($tanggal)));
	    	
	    	//init tanggal2
	    	$tempdate	= mktime(0,0,0,date("m"),date("d"),date("Y")+$waktu);
	    	$tanggal2	= date("Y-m-d",$tempdate);
	    	$var2 		= new DateTime($tanggal2);
	    	
	    	//init angsuran
	    	$dateInterval = $var2->diff($var1);
			$totalMonths = 12 * $dateInterval->y + $dateInterval->m;
			$totalBayar;
						
			if ($bayar == 1 && $output_produk == "001") {
				$totalBayar 		= $totalMonths;	
				$tempnominal  		= $harga*$totalBayar;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 2 && $output_produk == "001") {
				$totalBayar 		= $totalMonths / 3;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 3 && $output_produk == "001") {
				$totalBayar = $totalMonths / 6;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 4 && $output_produk == "001") {
				$totalBayar = $totalMonths / 12;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif($bayar == 1 && $output_produk == "002") {
				$totalBayar 		= $totalMonths;	
				$tempnominal  		= $harga*$totalBayar;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 2 && $output_produk == "002") {
				$totalBayar 		= $totalMonths / 3;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 3 && $output_produk == "002") {
				$totalBayar 		= $totalMonths / 6;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 4 && $output_produk == "002") {
				$totalBayar 		= $totalMonths / 12;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 1 && $output_produk == "003") {
				$totalBayar 		= $totalMonths;	
				$tempnominal  		= $harga*$totalBayar;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 2 && $output_produk == "003") {
				$totalBayar 		= $totalMonths / 3;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 3 && $output_produk == "003") {
				$totalBayar = $totalMonths / 6;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 4 && $output_produk == "003") {
				$totalBayar = $totalMonths / 12;
				$tempnominal  		= $harga*$totalMonths;
				$tempnominalakhir	= $tempnominal / $totalBayar;
			}elseif ($bayar == 1 && $output_produk == "004") {
				
				if ($usia <= 0) {
					$hitung1 			= 0;
					$hitung2 			= $totalMonths-$hitung1;
					$totalBayar 		= $hitung2;	
					$tempnominal  		= $harga*$totalBayar;
					$tempnominalakhir	= $tempnominal / $totalBayar;

				}elseif ($usia > 0) {
					$tempo				= $waktu-$usia;
					$hitung1 			= $usia * 12;
					$hitung2 			= $totalMonths - $hitung1;
					$totalBayar 		= $hitung2;	
					$tempnominal  		= $harga*$totalBayar;
					$tempnominalakhir	= $tempnominal / $totalBayar;
					$tempdate			= mktime(0,0,0,date("m"),date("d"),date("Y")+$tempo);
	    			$tanggal2			= date("Y-m-d",$tempdate);
				}

			}elseif ($bayar == 2 && $output_produk == "004") {
				if ($usia <= 0) {
					$hitung1 			= 0;
					$hitung2 			= $totalMonths-$hitung1;
					$totalBayar 		= $hitung2 / 3;
					$tempnominal  		= $harga*$totalMonths;
					$tempnominalakhir	= $tempnominal / $totalBayar;
				}elseif ($usia > 0) {
					$tempo				= $waktu-$usia;
					$hitung1 			= $usia * 12;
					$hitung2 			= $totalMonths - $hitung1;
					$totalBayar 		= $hitung2  / 3;
					$tempnominal  		= $harga*$totalMonths;
					$tempnominalakhir	= $tempnominal / $totalBayar;
					$tempdate			= mktime(0,0,0,date("m"),date("d"),date("Y")+$tempo);
	    			$tanggal2			= date("Y-m-d",$tempdate);
				}				
				
			}elseif ($bayar == 3 && $output_produk == "004") {
				if ($usia <= 0) {
					$hitung1 			= 0;
					$hitung2 			= $totalMonths-$hitung1;
					$totalBayar 		= $hitung2 / 6;
					$tempnominal  		= $harga*$totalMonths;
					$tempnominalakhir	= $tempnominal / $totalBayar;	
				}elseif ($usia > 0) {
					$tempo				= $waktu-$usia;
					$hitung1 			= $usia * 12;
					$hitung2 			= $totalMonths - $hitung1;
					$totalBayar 		= $hitung2 / 6;
					$tempnominal  		= $harga*$totalMonths;
					$tempnominalakhir	= $tempnominal / $totalBayar;
					$tempdate			= mktime(0,0,0,date("m"),date("d"),date("Y")+$tempo);
	    			$tanggal2			= date("Y-m-d",$tempdate);
				}
				
			}elseif ($bayar == 4 && $output_produk == "004") {
				if($usia <= 0) {
					$hitung1 			= 0;
					$hitung2 			= $totalMonths-$hitung1;
					$totalBayar 		= $hitung2 / 12;
					$tempnominal  		= $harga*$totalMonths;
					$tempnominalakhir	= $tempnominal / $totalBayar;	
				}elseif($usia > 0) {
					$tempo 				= $waktu-$usia;
					$hitung1 			= $usia * 12;
					$hitung2 			= $totalMonths - $hitung1;
					$totalBayar 		= $hitung2 / 12;
					$tempnominal  		= $harga*$totalMonths;
					$tempnominalakhir	= $tempnominal / $totalBayar;
					$tempdate			= mktime(0,0,0,date("m"),date("d"),date("Y")+$tempo);
	    			$tanggal2			= date("Y-m-d",$tempdate);
				}

			}
			
	    	$data=array(
			            'id_nasabah'		=>$this->input->post('id_nasabah'),
			            'nama'				=>$this->input->post('nama'),
			            'id_bayar'			=>$this->input->post('j_bayar'),
			            'id_produk'			=>$this->input->post('j_produk'),
			            'id_agen'			=>$this->input->post('j_agen'),
			            'alamat'			=>$this->input->post('alamat'),
			            'telepon'			=>$this->input->post('telepon'),
			            'email'				=>$this->input->post('mail'),
			            'angsuran' 			=>$totalBayar,
			            'tgl_mulai'			=>$tanggal,
			            'tgl_habis'			=>$tanggal2,
			            'nominal'			=>$tempnominalakhir,
			            'status_aktif'		=>'Aktif',
			            'status_exist'		=>'NotYet',
			            'gender'			=>$this->input->post('gender'),
			            'usia'				=>$this->input->post('usia'),
			            // 'usia1'				=>$hitung1,
			            // 'usia2'				=>$hitung2,
			            // 'total'				=> $totalMonths
	        );
			
			return $data;
			return true;

	    }elseif ($trigger == "update") {
	    	$date1 = $this->input->post('tgl_mulai1');
	    	$date2 = $this->input->post('tgl_akhir1');
	    	$bayar 	= $this->input->post('kd_bayar');

	    	$var1   = new DateTime($date1);
	    	$var2 	= new DateTime($date2);
	    	$dateInterval = $var2->diff($var1);
			$totalMonths = 12 * $dateInterval->y + $dateInterval->m;
			if ($bayar == 1) {
				$totalBayar = $totalMonths;
				$totalBayar;
			}elseif ($bayar == 2) {
				$totalBayar = $totalMonths / 3;
			}elseif ($bayar == 3) {
				$totalBayar = $totalMonths / 6;
			}elseif ($bayar == 4) {
				$totalBayar = $totalMonths / 12;
			}

			$data=array(
			            'nama'				=>$this->input->post('kd_nama'),
			            //'id_bayar'		=>$this->input->post('kd_bayar'),
			            //'id_produk'		=>$this->input->post('kd_produk'),
			            //'id_agen'			=>$this->input->post('kd_agen'),
			            'alamat'			=>$this->input->post('kd_alamat'),
			            'telepon'			=>$this->input->post('kd_telepon'),
			            'email'				=>$this->input->post('kd_mail'),
			            //'tgl_mulai'		=>date("Y-m-d",strtotime($date1)),
			            //'tgl_habis'		=>date("Y-m-d",strtotime($date2)),
			            //'angsuran'		=>$totalBayar,
			            //'nominal'			=>$this->input->post('kd_nominal')
			            //'status_aktif'	=>'Aktif',
			            //'status_exist'	=>'NotYet'

	        );
			return $data;
			return true;
	    }
    	
	}

//=======================================Agen=========================================================//

//=======================================Transaksi====================================================//
	public function getKodeTransaksi(){
		$q = $this->db->query("select MAX(RIGHT(id_pembayaran,3)) as kd_max from data_pembayaran");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "TRNS-".$kd;
	}

	public function getkeyPolis(){
    	$hasil=	$this->db->select('a.id_polis,a.tanggal_asuransi,a.habis_kontrak,b.nama,b.id_produk,c.id_nasabah,c.nama')
						 ->from("data_polis AS a")
						 ->join("kategori_asuransi AS b","b.id_jenis = a.id_jenis","inner")
						 ->join("data_nasabah AS c","c.id_nasabah = a.id_nasabah","inner")
						 ->get();
		
			if($hasil->num_rows() > 0){
				$des = $hasil->result();
				return $des;
			}else{
				 return array();
		}
    }

    public function getkeyAgen($id){
    	$hasil = $this->db->select('*')
    				      ->from('data_agen')
    				      ->where('id_agen',$id)
    				      ->get();
    	if ($hasil->num_rows() > 0) {
    		return $hasil->result();
    	}else{
    		return array();
    	}
    }

    public function getkeyNasabah($id){

    	$hasil = $this->db->where('id_agen', $id)
    					  ->from('data_nasabah')
    					  ->get();
    	if ($hasil->num_rows() > 0) {
    		return $hasil->result();
    	}else{
    		return array();
    	}
    }


    public function getSelectedNasabah($trigger,$id_nasabah){
    	if ($trigger == "detail") {
    		$hasil = $this->db->select('a.*,b.id_produk,b.nama_produk')
    						  ->from('data_nasabah AS a')
    						  ->join('kategori_asuransi AS b','a.id_produk = b.id_produk','inner')
    						  ->where('id_nasabah', $id_nasabah)
    					  	  ->get();
	    	if ($hasil->num_rows() > 0) {
	    		return $hasil->result();
	    	}else{
	    		return array();
	    		}
    	}elseif ($trigger == "nasabah") {
    		$hasil = $this->db->select('a.*')
    						  ->from('data_nasabah AS a')
    						  ->where('id_agen', $id_nasabah)
    					  	  ->get();
	    	if ($hasil->num_rows() > 0) {
	    		return $hasil->result();
	    	}else{
	    		return array();
	    		}
    	}
    }
    
    public function getdataTransaksi($trigger){
    	if ($trigger == "add") 
    	{
    		
    		$data=array(
			            'id_pembayaran'		=>$this->input->post('id_trans'),
			            'id_agen'			=>$this->input->post('agen'),
			            'id_nasabah'		=>$this->input->post('nasabah'),
			            'nominal'			=>$this->input->post('nominal'),
			            'tgl_transaksi'		=>date("Y-m-d"),
			            
	        );
	        return $data;
			return true;
		}
	}

	public function updatesaldo($trigger,$id){
		if ($trigger == "add") {
		$id_nasabah 	= $this->input->post('nasabah');
		$hasil 			= $this->db->where('id_nasabah', $id_nasabah)
						   		   ->get('data_nasabah');
		foreach ($hasil->result() as $key ) {
			$oldsaldo = $key->saldo;
		}
		$newsaldo = $this->input->post('nominal');
		$lastsaldo = $oldsaldo+$newsaldo;
		$data = array(
						'saldo' => $lastsaldo,
					 );
		$this->db->where('id_nasabah', $id_nasabah)
				 ->update('data_nasabah',$data);
		}elseif ($trigger == "delete") {
			$hasil 		= 	$this->db->where('id_pembayaran', $id)
									 ->from('data_pembayaran')
									 ->get();
			foreach ($hasil->result() as $key) {
				$nasabah 	= $key->id_nasabah;
				$nominal	= $key->nominal;
			}
			$akhir 		=	$this->db->where('id_nasabah', $nasabah)
									 ->from('data_nasabah')
									 ->get();
			foreach ($akhir->result() as $key2) {
				$saldo		= $key2->saldo;
			}
			$current = $saldo-$nominal;
			$data = array(
							'saldo' => $current,
						);
			$this->db->where('id_nasabah', $nasabah)
					 ->update('data_nasabah',$data);
		}
		
		
	}

	public function updateangsuran($trigger,$id)
	{
		if ($trigger == "add") {
			$id_nasabah 	= $this->input->post('nasabah');
			$hasil 			= $this->db->where('id_nasabah', $id_nasabah)
						   		   	   ->get('data_nasabah');
			foreach ($hasil->result() as $key) {
					$oldangsuran = $key->angsuran;	
			}
			$newangsuran = 1;
			$currentangsuran = $oldangsuran-$newangsuran;
			$data = array(
							'angsuran' => $currentangsuran
						 );
			$this->db->where('id_nasabah', $id_nasabah)
					 ->update('data_nasabah',$data);		
		}elseif ($trigger == "delete") {
			$hasil 		= 	$this->db->where('id_pembayaran', $id)
									 ->from('data_pembayaran')
									 ->get();
			foreach ($hasil->result() as $key) {
				$nasabah 	= $key->id_nasabah;
			}

			$hasil2 	=	$this->db->where('id_nasabah', $nasabah)
									 ->from('data_nasabah')
									 ->get();
			foreach ($hasil2->result() as $key) {
				$oldangsuran = $key->angsuran;
			}

			$currentangsuran = $oldangsuran + 1;
			$data = array(
							'angsuran' => $currentangsuran
						);
			$this->db->where('id_nasabah', $nasabah)
					 ->update('data_nasabah',$data);
		}
	}

	//=======================================Produk ========================================//

	public function getKodeProduk(){
		$q = $this->db->query("select MAX(RIGHT(id_produk,3)) as kd_max from kategori_asuransi");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PR-".$kd;
	}

	
	 public function getdataProduk($trigger){
    	if ($trigger == "add") 
    	{
			$data=array(
			            'id_produk'		=>$this->input->post('id_produk'),
			            'nama_produk'	=>$this->input->post('nama'),
			            'harga'			=>$this->input->post('harga'),
	        );
			return $data;
			return true;
		}elseif ($trigger == "update") {
			$data = array(
							'nama_produk' =>$this->input->post('kd_nama'), 
							'harga'		  =>$this->input->post('kd_harga')
						);
			return $data;
			return TRUE;
		}
	}

	
	//=======================================Produk=========================================//
	
	//=======================================End Fungsi GET=================================//
	//======================================Add,Delete,Edit=================================//
	
    public function insert_data($trigger)
	{
		if ($trigger == "polis") {
			$var = $this->getdataPolis("add");
			$this->db->insert('data_polis', $var);
			redirect('Admin/view_polis');
		}elseif ($trigger == "agen") {
			$var = $this->getdataAgen("add");
			$this->db->insert('data_agen', $var);
			$id_nasabah 	= $this->input->post('nasabah');
			$data = array(
							'idUser' 		=> $this->input->post('id_agen'),
							'namaUser' 		=> $this->input->post('nama'),
							'password'		=> $this->input->post('password'),
							'levelUser'		=> 'agen'
						);
			$data2 = array(
							'status_exist' 	=> 'Added'
						);
			$this->db->insert('user', $data);
			$this->db->where('id_nasabah', $id_nasabah)
					 ->update('data_nasabah',$data2);
			redirect('Admin/view_agen');
		}elseif ($trigger == "nasabah") {
			$var = $this->getdataNasabah("add");
			$data2 = array(
			 				'id_polis' 		=>$this->getKodePolis(),
			 				'id_nasabah'	=>$this->input->post('id_nasabah'),
			             	'id_bayar'		=>$this->input->post('j_bayar'),
			             	'id_produk'		=>$this->input->post('j_produk'),
			             	'id_agen'		=>'NotAdded'  
			             );			
			 $data = array(
			 				'idUser' 		=> $this->input->post('id_nasabah'),
			 				'namaUser' 		=> $this->input->post('nama'),
			 				'password'		=> $this->input->post('password'),
			 				'levelUser'		=> 'nasabah'
			 			);
			//var_dump($var);
			$this->db->insert('data_nasabah', $var);
			$this->db->insert('data_polis', $data2);
			$this->db->insert('user', $data);
			redirect('Admin/view_nasabah');
		}elseif ($trigger == "transaksi") {
			$var = $this->getdataTransaksi("add");
			$id  = $this->input->post("id_trans");
			$id_nasabah = $var['id_nasabah'];
			$money = $var['nominal'];
			$hasil = $this->db->select('email')
	         				  ->from('data_nasabah')
	         				  ->where('id_nasabah',$id_nasabah)
	         				  ->get();
	        $alpa = $hasil->result();

	        $this->db->insert('data_pembayaran', $var);
			$this->updateangsuran("add",$id);
			$this->updatesaldo("add",$id);			
	        
	        $hasil2 = $this->db->select('a.id_nasabah,a.nama AS nama_nasabah,a.angsuran,b.nama AS nama_agen')
	                           ->from('data_nasabah AS a')
	                           ->join('data_agen AS b','a.id_agen = b.id_agen','inner')
	                           ->where('a.id_nasabah',$id_nasabah)
	                           ->get();	  	
			$result2 = $hasil2->result();
			foreach ($result2 as $key ) {
				$id_nasabah = $key->id_nasabah;
				$nasabah 	= $key->nama_nasabah;
				$angsuran   = $key->angsuran;
				$agen 		= $key->nama_agen;
 			}
			$id_nasabah2 	= $id_nasabah;
			$nasabah2 		= $nasabah;
			$angsuran2 		= $angsuran;
			$agen2 			= $agen;
			$nominal 		= $money;
			$email 			= $alpa;

			//var_dump($email);
			
// ========================Kirim Email====================================================================//
			$this->load->library('email');
			
//================================Ganti Email Bila Diperlukan=============================================//
	       
	        $config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']= "ssl://smtp.googlemail.com";//pengaturan smtp
			$config['smtp_port']= "465";
			$config['smtp_timeout']= "400";
			$config['smtp_user']= "simnas1912@gmail.com"; // isi dengan email kamu
			$config['smtp_pass']= "simnasabah1912"; // isi dengan password kamu
			$config['crlf']="\r\n"; 
			$config['newline']="\r\n"; 
			$config['wordwrap'] = TRUE;

	  		$this->email->initialize($config);
			//konfigurasi pengiriman
			$this->email->from($config['smtp_user']);
			$this->email->to($this->input->post('email'));
			$this->email->subject("Pemberitahuan Pembayaran");
			$this->email->message(
				"Terimakasih telah melakukan pembayaran, berikut ini adalah detail pembayaran yang sudah dilakukan<br><br>
				 ID Transaksi    		 = "       	  .$id."<br><br>
				 ID Nasabah		 		 = "		  .$id_nasabah2."<br><br>
				 Nama Nasabah	 		 = "		  .$nasabah2."<br><br>
				 Nama Agen       		 = "       	  .$agen2."<br><br>
				 Nominal	 	 		 = "		  .$nominal."<br><br>
				 Sisa Angsuran 		 	 = " 		  .$angsuran2."<br><br>
			");     
	        $this->email->send();
//==================================Akhir Email====================================//
	        
	        //show_error($this->email->print_debugger());
			redirect('Admin/view_transaksi');
		}elseif ($trigger == "produk") {
			$var = $this->getdataProduk("add");
			$this->db->insert('kategori_asuransi', $var);
			redirect('Admin/view_produk');
		}elseif ($trigger = "staf") {
			$var = $this->getdataStaf("add");
			$data = array(
			 				'idUser' 		=> $this->input->post('id_staf'),
			 				'namaUser' 		=> $this->input->post('nama'),
			 				'password'		=> $this->input->post('password'),
			 				'levelUser'		=> 'staff'
			 			);
			$this->db->insert('data_staf', $var);
			$this->db->insert('user', $data);
			redirect('Admin/view_staff');
		}
	}

	 public function update_data($trigger)
	{
		if ($trigger == "polis") {
			$id = $this->input->post('kd_polis');
			$var = $this->getdataPolis("update");
			$this->db->where('id_polis', $id)
					 ->update('data_polis',$var);
			redirect('Admin/view_polis');
		}elseif ($trigger == "agen") {
			$id = $this->input->post('kd_agen');
			$data=array(
			            'namaUser'			=>$this->input->post('kd_nama'),
			            'password'			=>$this->input->post('kd_password')
	        );
			$var = $this->getdataAgen("update");
			$this->db->where('id_agen', $id)
					 ->update('data_agen',$var);
			$this->db->where('idUser', $id)
					 ->update('user',$data);
			redirect('En/logout');
		}elseif ($trigger == "agen_sess") {
			$id = $this->input->post('kd_agen');
			$data=array(
			            'namaUser'			=>$this->input->post('kd_nama'),
			            'password'			=>$this->input->post('kd_password')
	        );			
			$var = $this->getdataAgen("update");
			$this->db->where('id_agen', $id)
					 ->update('data_agen',$var);
			$this->db->where('idUser', $id)
					 ->update('user',$data);
			redirect('En/logout');
		
		}elseif ($trigger == "nasabah") {
			$id = $this->input->post('kd_nasabah');
			$data = array(
							'namaUser' 	=> $this->input->post('kd_nama'),
							'password'	=> $this->input->post('kd_password')
						);
			$var = $this->getdataNasabah("update");
			$this->db->where('id_nasabah', $id)
					 ->update('data_nasabah',$var);
			$this->db->where('idUser', $id)
					->update('user',$data);
			redirect('Admin/view_nasabah');

		}elseif ($trigger == "nasabah_sess") {
			$id = $this->input->post('kd_nasabah');
			$data = array(
							'namaUser' 	=> $this->input->post('kd_nama'),
							'password'	=> $this->input->post('kd_password')
						);
			$var = array(
							'nama'		=> $this->input->post('kd_nama'),
							'alamat'	=> $this->input->post('kd_alamat'),
							'email'		=> $this->input->post('kd_mail'),
							'telepon'	=> $this->input->post('kd_telepon')
						);
			$this->db->where('id_nasabah', $id)
					 ->update('data_nasabah',$var);
			$this->db->where('idUser', $id)
					->update('user',$data);
			redirect('En/logout');
			
		}elseif ($trigger == "produk") {
			$id 	=   $this->input->post('kd_produk');
			$var 	= 	$this->getdataProduk("update");
			$this->db->where('id_produk', $id)
					 ->update('kategori_asuransi',$var);
			redirect('Admin/view_produk');
		}elseif ($trigger == "staf") {
			$id 	=   $this->input->post('kd_staf');
			$var 	= 	$this->getdataStaf("update");
			$this->db->where('id_staf', $id)
			 		 ->update('data_staf',$var);
			 redirect('En/logout');
		}
	}

	public function delete_data($trigger,$id){
		if ($trigger == "polis") {
		$this->db->where('id_polis',$id)
				 ->delete('data_polis');
		redirect('Admin/view_polis');
		}elseif ($trigger == "agen") {
		$this->db->where('id_agen',$id)
				 ->delete('data_agen');
		$this->db->where('idUser', $id)
				 ->delete('user');		 
		redirect('Admin/view_agen');
		}elseif ($trigger == "nasabah") {
		$this->db->where('id_nasabah',$id)
				 ->delete('data_nasabah');
		$this->db->where('idUser', $id)
				 ->delete('user');
		$this->db->where('id_nasabah', $id)
				 ->delete('data_polis');
		$this->db->where('id_nasabah',$id)
				 ->delete('data_pembayaran');		 		 
		redirect('Admin/view_nasabah');
		}elseif ($trigger == "transaksi") {
			$this->updatesaldo("delete",$id);
			$this->updateangsuran("delete",$id);
			$this->db->where('id_pembayaran', $id)
				 	 ->delete("data_pembayaran");
		redirect('Admin/view_transaksi');
		}elseif ($trigger == "produk") {
			$this->db->where('id_produk', $id)
					 ->delete("kategori_asuransi");
			redirect('Admin/view_produk');
		}elseif ($trigger == "staf") {
			$this->db->where('id_staf', $id)
					 ->delete("data_staf");
			redirect('Admin/view_staff');
		}
	}

	public function eskpor_data($trigger)
	{
		if ($trigger == 'transaksi') {
			 $awal   = $this->input->post('tgl_pertama');
    		 $akhir  = $this->input->post('tgl_terakhir');

    		 $var1 = date('Y-m-d',strtotime($awal));
			 $var2 = date('Y-m-d',strtotime($akhir));

    		 $hasil = $this->db->select('a.id_pembayaran,a.nominal,b.nama AS nama_agen,c.nama AS nama_nasabah,c.telepon,c.alamat')
    		                   ->from('data_pembayaran AS a')
    		                   ->join('data_agen AS b','a.id_agen = b.id_agen','inner')
    		                   ->join('data_nasabah AS c','a.id_nasabah = c.id_nasabah','inner')
    		                   ->where('a.tgl_transaksi >=', $var1)
    		 				   ->where('a.tgl_transaksi <=',$var2)
    		 				   ->get();
    		 if ($hasil->num_rows() > 0) {
    		 	return $hasil->result();
    		 }else{
    		 	return array();
    		 }
		}elseif ($trigger == "manajer") {
			$bulan 		= $this->input->post('bulan');
			$tahun		= $this->input->post('tahun');
			$hasil 		= $this->db->select('a.id_pembayaran,a.nominal,b.nama AS nama_agen,c.nama AS nama_nasabah,c.telepon,c.alamat')
	    		                   ->from('data_pembayaran AS a')
	    		                   ->join('data_agen AS b','a.id_agen = b.id_agen','inner')
	    		                   ->join('data_nasabah AS c','a.id_nasabah = c.id_nasabah','inner')
								   ->where('MONTH(a.tgl_transaksi)',$bulan)
								   ->where('YEAR(a.tgl_transaksi)',$tahun)
								   ->get();
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			}else{
				return FALSE;
			}
		}
	}

	public function update_nasabah($trigger,$id){
		if ($trigger == "baru") {
			$id_agen 	=  $this->session->userdata('idUser');
			$data = array(
							'status_exist' 	=> 'Added',
							//'id_agen'		=>  $id_agen
						 );
			$data2 = array(
								'id_agen' => $id_agen,
						  );
			$this->db->where('id_nasabah', $id)
					 ->update('data_nasabah',$data);
			$this->db->where('id_nasabah', $id)
					 ->update('data_polis',$data2);
			redirect('Admin/nasabah_baru');
		}
	}
//============================================================================
	public function laporan($tgl_awal,$tgl_akhir,$id_nasabah){
		 return $this->db->query("SELECT *,sum(a.nominal) as total_all from data_pembayaran a
                left join data_nasabah b on a.id_nasabah=b.id_nasabah
                where a.tgl_transaksi between '$tgl_awal' and '$tgl_akhir' 
                ")->result();
	}
//============================================================================
	//=====================================Polis==========================================================//
	public function getKodeStaf()
    {
        $q = $this->db->query("select MAX(RIGHT(id_staf,3)) as kd_max from data_staf");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "STF-".$kd;
    }

    public function getdataStaf($trigger){
    	if ($trigger == "add") 
    	{
			$data=array(
			            'id_staf`'		=>$this->input->post('id_staf'),
			            'nama'			=>$this->input->post('nama'),
			            'alamat'		=>$this->input->post('alamat'),
			            'telepon'		=>$this->input->post('telepon'),
			            'email'			=>$this->input->post('email'),
			            'password'		=>$this->input->post('password'),
	        );
			return $data;
			return true;
		}elseif ($trigger == "update") {
			$data = array(
							'nama'			=>$this->input->post('kd_nama'),
				            'alamat'		=>$this->input->post('kd_alamat'),
				            'telepon'		=>$this->input->post('kd_telepon'),
				            'email'			=>$this->input->post('kd_email'),
				            'password'		=>$this->input->post('kd_password'),
						);
			return $data;
			return TRUE;
		}
	}
	function cek_bayar(){
       return $status = $this->db->query('select id_nasabah,count(id_nasabah) as bayar from data_pembayaran group by id_nasabah')->result_array();
    }
}

/* End of file  */
/* Location: ./application/models/ */
