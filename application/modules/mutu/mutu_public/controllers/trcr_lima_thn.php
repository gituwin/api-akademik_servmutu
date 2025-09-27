<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trcr_lima_thn extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_akreditasi/tracer_5th_trahir', 'akrd');
			$this->mutu = $this->load->database('mutu');
	}

	public function data_tracer($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->data_tracer($api_search[0]);
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

	public function jum_sem ($format='json')
	{
		
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->jum_sem($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update($format='json')
	{
		
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->update($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function insert($format='json')
	{
		
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->insert($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function nam_unit($format='json')
	{
		
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->nam_unit($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function auto_nama_unit($format='json')
	{

		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->auto_nama_unit();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// public function kd_ta($format='json')
	// {
	// 	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	// 	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	// 	$api_search = $this->input->post('api_search');
	// 	switch ($kode) {
	// 		case 313:
	// 			switch ($subkode) {
	// 				case 354:
	// 					$query = $this->akrd->kd_ta($api_search[0]);
	// 					break;
	// 			}
	// 			break;
	// 	}
	// 	$this->sia_api_lib_format->output($query, $format);

	// }

	// public function jenis($format='json')
	// {
	// 	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	// 	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	// 	$api_search = $this->input->post('api_search');
	// 	switch ($kode) {
	// 		case 313:
	// 			switch ($subkode) {
	// 				case 354:
	// 					$query = $this->akrd->jenis();
	// 					break;
	// 			}
	// 			break;
	// 	}
	// 	$this->sia_api_lib_format->output($query, $format);
	// }

	// public function total_ts($format='json')
	// {
	// 	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	// 	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	// 	$api_search = $this->input->post('api_search');
	// 	switch ($kode) {
	// 		case 313:
	// 			switch ($subkode) {
	// 				case 354:
	// 					$query = $this->akrd->total_ts($api_search[0]);
	// 					break;
	// 			}
	// 			break;
	// 	}
	// 	$this->sia_api_lib_format->output($query, $format);

	// }

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
						$query =array('sssasaasdsfdgftrydrfgtfytrdfgtfy6wdssss');
						break;
				}
				break;
		}
		// $query =array('sssss');
		$this->sia_api_lib_format->output($query, $format);
	
	}

		public function prodi($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function pilih_fakultas($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->pilih_fakultas();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}



	public function pilih_unit($format='json')
		{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->pilih_unit($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
public function univ($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->univ();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}
public function tamil_edit($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tamil_edit($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}

public function fak($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->fak();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}

public function get_kd_fak($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->get_kd_fak($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}
public function update_tampilkan($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->update_tampilkan($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}

public function ambil_kd_akrd($format='json')
{
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->ambil_kd_akrd($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}
}
/* End of file  */
/* Location: ./application/controllers/ */