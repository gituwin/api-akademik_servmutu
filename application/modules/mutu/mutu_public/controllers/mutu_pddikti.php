<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_pddikti extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_general/mdl_mutu_pddikti', 'pddikti');
	}
	
	function get_mapping_prodi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1000:
				switch ($subkode) {
					case 1:
						$query = $this->pddikti->get_mapping_prodi($api_search[0]);
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
}
?>