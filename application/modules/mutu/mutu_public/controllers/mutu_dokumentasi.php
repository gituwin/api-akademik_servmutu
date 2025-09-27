<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_dokumentasi extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_dokumentasi/mdl_mutu_dokumentasi', 'mdl_3001');
	}
	
	function insert_dokumen($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 3001: switch($subkode){
				default:
					case 1: $query = $this->mdl_3001->insert_dokumen($api_search[0]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	
	function file_dokumen($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 3001: switch($subkode){
				default:
					case 1: $query = $this->mdl_3001->count_cari_file_dokumen($api_search[0]); break;
					case 2: $query = $this->mdl_3001->aspek_cari_file_dokumen($api_search[0]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
}
?>