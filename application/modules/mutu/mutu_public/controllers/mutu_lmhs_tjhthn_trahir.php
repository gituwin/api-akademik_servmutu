<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutu_lmhs_tjhthn_trahir extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('m_akreditasi/mhs_per_ankatan', 'akrd');
			$this->mutu = $this->load->database('mutu');
	}

	public function url_3_2_1a($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_2_1a($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
			public function ts($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->ts($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

	public function total_lulusan_sampai_ts($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->total_lulusan_sampai_ts($api_search[0]);
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

	public function detail_semua($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->detail_semua($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function detail_2($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->detail_2($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
public function detail_2_lulus($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->detail_2_lulus($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
}

/* End of file mutu_lmhs_tjhthn_trahir.php */
/* Location: ./application/controllers/mutu_lmhs_tjhthn_trahir.php */
