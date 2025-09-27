<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aps extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('m_akreditasi/m_aps', 'aps');
	}
    function ps($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 2001: switch($subkode){
				default:
					case 1: $query = $this->aps->ps(); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

}

/* End of file Aps.php */



?>