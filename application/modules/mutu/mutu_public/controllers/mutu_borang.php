<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_borang extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_borang/mdl_mutu_borang', 'mdl_2001');
	}
	
	function ksk_borang($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 2001: switch($subkode){
				default:
					case 1: $query = $this->mdl_2001->ksk_borang($api_search[0]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	
	// Fauzi Service Start
	function komentar($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1100:
				switch ($subkode) {
					case 1:
						$query = $this->mdl_2001->create_komentar($api_search[0]);
						break;
				}
			case 1101:
				switch ($subkode) {
					case 1:
						$query = $this->mdl_2001->select_komentar_by_butir_and_kode($api_search[0]);
						break;
				}
				break;
			case 1102:
				switch ($subkode) {
					case 1:
						$query = $this->mdl_2001->delete_komentar($api_search[0]);
						break;
				}
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function popup($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1106:
				switch ($subkode) {
					case 11:
						$query = $this->mdl_2001->create_popup($api_search[0]);
						break;
					case 12:
						$query = $this->mdl_2001->create_atur_popup($api_search[0]);
						break;
				}
				break;
			case 1107:
				switch ($subkode) {
					case 11:
						$query = $this->mdl_2001->read_popup_by_borang_ksk_isiborang_butir($api_search[0]);
						break;
					case 12:
						$query = $this->mdl_2001->read_count_atur_by_borang_kode($api_search[0]);
						break;
					case 13:
						$query = $this->mdl_2001->read_popup_by_borang_v1($api_search[0]);
						break;
					case 14:
						$query = $this->mdl_2001->read_popup_by_id_join_borang($api_search[0]);
						break;
					case 15:
						$query = $this->mdl_2001->read_id_atur_by_borang_kode($api_search[0]);
						break;
					case 16:
						$query = $this->mdl_2001->read_atur_by_borang($api_search[0]);
						break;
					case 17:
						$query = $this->mdl_2001->read_popup_by_id($api_search[0]);
						break;
				}
				break;
			case 1108:
				switch ($subkode) {
					case 11:
						$query = $this->mdl_2001->update_popup($api_search[0], $api_search[1]);
						break;
					case 12:
						$query = $this->mdl_2001->update_atur_popup($api_search[0], $api_search[1]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// Fauzi Service End
}
?>