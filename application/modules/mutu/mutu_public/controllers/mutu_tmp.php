<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_tmp extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_tmp/mdl_mutu_tmp', 'tmp');
	}
	
	// TABEL TMP_PGW_M_FUNGSIONAL START
	function get_tmp_pgw_m_fungsional($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1101: // SELECT
				switch ($subkode) {
					case 1: // ALL
						$query = $this->tmp->select_all_tpmf()->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL TMP_PGW_M_FUNGSIONAL END
	
	// TABEL TMP_PGW_M_GELAR_AKAFEMIK START
	function get_tmp_pgw_m_gelar_akademik($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1101: // SELECT
				switch ($subkode) {
					case 1: // ALL
						$query = $this->tmp->select_all_tpmga()->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL TMP_PGW_M_GELAR_AKAFEMIK END
}
?>