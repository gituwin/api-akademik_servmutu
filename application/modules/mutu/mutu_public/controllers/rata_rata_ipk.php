<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rata_rata_ipk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_akreditasi/rata_rata_ipk_mhs', 'akrd');
			$this->mutu = $this->load->database('mutu');
	}

	public function rata2_ipk_1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->rata2_ipk_1($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);

	}

		public function detail1($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->detail1($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
		
	}
		public function detail2($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->detail2($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);

	}

	public function kd_ta($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->kd_ta($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);

	}

	public function jenis($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->jenis();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function total_ts($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->total_ts($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);

	}

	public function test($format='json')
	{
			$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
					$a=array('a');
						$query =$this->akrd->test();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	
	}


}

/* End of file  */
/* Location: ./application/controllers/ */