<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_persentase extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_general/mdl_mutu_persentase', 'persentase');
	}
	
	function get_persentase($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->persentase->total($api_search)->result_array();
					break;
					case 2:
						$query = $this->persentase->terisi($api_search)->result_array();
					break;
					case 3:
						$query = $this->persentase->total_dokumentasi($api_search)->result_array();
					break;
					case 4:
						$query = $this->persentase->terisi_dokumentasi($api_search)->result_array();
					break;
					case 5:
						$query = $this->persentase->aspek_dokumentasi($api_search)->result_array();
					break;
					case 6:
						$query = $this->persentase->terisi_audit($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function get_persentase_lkps($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->persentase->total_lkps($api_search)->result_array();
					break;
					case 2:
						$query = $this->persentase->terisi_lkps($api_search)->result_array();
					break;
					case 3:
						$query = $this->persentase->total_dokumentasi_lkps($api_search)->result_array();
					break;
					case 4:
						$query = $this->persentase->terisi_dokumentasi_lkps($api_search)->result_array();
					break;
					case 5:
						$query = $this->persentase->aspek_dokumentasi_lkps($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function get_persentase_ipepa($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->persentase->total_ipepa($api_search)->result_array();
					break;
					case 2:
						// $query = $this->persentase->terisi_ipepa($api_search)->result_array();
						$query = array();
					break;
					case 3:
						// $query = $this->persentase->total_dokumentasi_ipepa($api_search)->result_array();
						$query = array();
					break;
					case 4:
						// $query = $this->persentase->terisi_dokumentasi_ipepa($api_search)->result_array();
						$query = array();
					break;
					case 5:
						// $query = $this->persentase->aspek_dokumentasi_ipepa($api_search)->result_array();
						$query = array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
}
?>