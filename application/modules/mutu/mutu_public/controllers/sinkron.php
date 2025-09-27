<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sinkron extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->model('m_akreditasi/m_sinkron', 'akrd');
			$this->mutu = $this->load->database('mutu');
	}

	public function get_data_ipepa($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1111:
				switch ($subkode) {
					case 99:
						$query = $this->akrd->data_ipepa($api_search[0]);
						// $query = $this->akrd->data_ipepa();

						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function ms_slm_api($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1111:
				switch ($subkode) {
					case 99:
						$query = $this->akrd->ms_slm_api($api_search[0], $api_search[1]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function ms_slm_api_prd($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1111:
				switch ($subkode) {
					case 99:
						$query = $this->akrd->ms_slm_api_prd($api_search[0], $api_search[1]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

public function index( $format='json')
	{
	   //          <center>Hayo lo :)</center>
		$kode =  $this->input->post('api_kode');
		$subkode = $this->input->post('api_subkode');
		$coba = $this->input->post('api_search');
		switch ($kode) {
	case 313:
		
	switch ($subkode) {
		case 354:
			# code...
			
		// $alfa=$this->akrd->sinkron();
               // $this->response($alfa, 200);
              
		 $data[]=array('nama_prodi' => 'My title',
        'jenjang' => 'My Name',
        'jenis' => 'My date');
		  $this->sia_api_lib_format->output($data['0'], $format);
			# code...
			break;
	}
		break;

}
       
	}
public function data($format='json')
	{
		   //          <center>Hayo lo :)</center>
		$kode =  $this->input->post('api_kode');
		$subkode = $this->input->post('api_subkode');
		$coba = $this->input->post('api_search');
		switch ($kode) {
	case 313:
		
	switch ($subkode) {
		case 354:
			# code...
			
		// $alfa=$this->akrd->sinkron();
               // $this->response($alfa, 200);
               $this->sia_api_lib_format->output($coba['0'], $format);
		
			# code...
			break;
	}
		break;

}
	}
	public function coba($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1111:
				switch ($subkode) {
					case 99:
						$query = $this->akrd->abraham($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function coba_hapus($value='')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1111:
				switch ($subkode) {
					case 99:
						$query = $this->akrd->coba_hapus();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function index_get($format = 'json')
	{
		 // echo "

   //          <center>Hayo lo :)</center>
$kode =  $this->input->post('api_kode');
		$subkode = $this->input->post('api_subkode');
		$coba = $this->input->post('api_search');
switch ($kode) {
	case 2323:
		
	switch ($subkode) {
		case 3:
			# code...
			
		$alfa=$this->akrd->sinkron();
               // $this->response($alfa, 200);
               $this->sia_api_lib_format->output($alfa, $format);
		
			# code...
			break;
	}
		break;

}

   //    ";
		
	}
// 	public function test($format = 'json')
// 	{
		
// 		$query = $this->akrd->tes_dokumentasi();
// $this->sia_api_lib_format->output($query, $format);
// 	}

	public function akd_master_jenis($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->datath();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function akd_master_jenis_dwa($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->datath_dwa();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
		
		public function akd_master_jenis_semua($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->semua();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function data_url_3_1_5_api($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->data_url_3_1_5();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
		public function tot_akre_A($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akre_A();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function all_akre_A($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->all_akr_A();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
public function tot_akre_B($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akre_B();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	
	public function all_akre_B($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->all_akr_B();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akre_C($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akre_C();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function all_akr_C($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->all_akr_C();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akre_kadaluarsa($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akre_kadaluarsa();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function tot_all_akre_kadaluarsa($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_all_akre_kadaluarsa();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function mahasiswa_dan_lulusan($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mahasiswa_dan_lulusan();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
		public function semua_data_a($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->semua_data_a();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function semua_data_b($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->semua_data_b();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function semua_data_c($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->semua_data_c();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function terakreditasi_S3($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_S3();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function terakreditasi_S2($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_S2();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function terakreditasi_S1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_S1();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function terakreditasi_sp2($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_sp2();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function terakreditasi_sp1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_sp1();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function terakreditasi_d4($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_d4();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function terakreditasi_d3($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_d3();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function terakreditasi_d2($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_d2();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function terakreditasi_d1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->terakreditasi_d1();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function prodi_jenis_S3($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_S3();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function prodi_jenis_S2($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_S2();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function prodi_jenis_S1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_S1();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function prodi_jenis_sp2($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_sp2();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function prodi_jenis_sp1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_sp1();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function prodi_jenis_prof($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_prof();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function prodi_jenis_D4($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_D4();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function prodi_jenis_D3($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_D3();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function prodi_jenis_D1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi_jenis_D1();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function api_sem($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->api_sem();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	
	public function jen_fak($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->jen_fak();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

public function data_akrd_fak($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->data_akrd_fak();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function api_kadaluarsa($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->api_kadaluarsa();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function cari_blm_ter_akrd($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->cari_blm_ter_akrd();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

public function data_A_S3($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->data_A_S3();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akademik_kus($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akademik_kus_kad($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_kad($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
		public function tot_akademik_kus_kad_asli($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_kad_asli($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akademik_kus_blm_akrditasi($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_blm_akrditasi($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akademik_kus_sel_jen($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_sel_jen($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akademik_kus_nil($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_nil($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
		public function tot_akademik_kus_kad_all($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_kad_all();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tot_akademik_kus_blm_akrditasi_all($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_blm_akrditasi_all();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function tot_akademik_kus_all($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_akademik_kus_all();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function api_sem_bar($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->api_sem_bar();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	// =====================================api_permintaan_toni=====================================

		public function totala($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->totala();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function totalb($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->totalb();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function totalc($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->totalc();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
		public function belum_terakreditasi($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->belum_terakreditasi();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// ====================================================tanggal_acuan================================================

	public function tgl_acuan($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tgl_acuan($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tgl_acuana($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tgl_acuana();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function bese_64($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->bese_64($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function bese_64_sk($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->bese_64_sk($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function bese_64_check($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->bese_64_check();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function b_d3($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->b_d3();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
public function liat_acuan($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->liat_acuan();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function update_acuan($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->update_acuan($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tmpl_updte_acuan($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tmpl_updte_acuan($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function hapus_acuan($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->hapus_acuan($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function thead_baru($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->thead_baru($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function aktifkan_tabel($format='json')
	{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	switch ($kode) {
		case 313:
			switch ($subkode) {
				case 354:
					$query = $this->akrd->aktifkan_tabel($api_search[0]);
					break;
			}
			break;
	}
	$this->sia_api_lib_format->output($query, $format);
}
public function check_aktif($format='json')
{
$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
$api_search = $this->input->post('api_search');
switch ($kode) {
	case 313:
		switch ($subkode) {
			case 354:
				$query = $this->akrd->check_aktif();
				break;
		}
		break;
}
$this->sia_api_lib_format->output($query, $format);
}
	// 	public function mah_dal_lim_th($format='json')
	// {
	// 	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	// 	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	// 	$api_search = $this->input->post('api_search');
	// 	switch ($kode) {
	// 		case 313:
	// 			switch ($subkode) {
	// 				case 354:
	// 					$query = $this->akrd->mah_dal_lim_th($api_search[0]);
	// 					break;
	// 			}
	// 			break;
	// 	}
	// 	$this->sia_api_lib_format->output($query, $format);
	// }

public function data_toni($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->data_toni();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
} 
public function uniasdfav($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 353:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->data_toni();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}



}

/* End of file sinkron1.php */
/* Location: ./application/controllers/sinkron1.php */