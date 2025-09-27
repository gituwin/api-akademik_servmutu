<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_grafik extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_general/mdl_mutu_grafik', 'grafik');
	}

	function index(){
		echo 'danang';
	}

	function get_grafik($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->grafik->get_grafik_audit($api_search); //cuma butuh parameter id_borang
					break;
					case 2:
						$query = $this->grafik->get_grafik_audit_unit($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 3:
						$query = $this->grafik->get_grafik_audit_unit_ikt($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 4:
						$query = $this->grafik->get_grafik_audit_unit_nt_ssw($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 5:
						$query = $this->grafik->get_grafik_audit_unit_nt_ssw_ikt($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 6:
						$query = $this->grafik->get_grafik_audit_unit_nt_ssw_iktt($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 7:
						$query = $this->grafik->get_grafik_audit_unit_nt_ssww($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 8:
						$query = $this->grafik->get_grafik_atl_unit_nt_ssw($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 9:
						$query = $this->grafik->get_grafik_atl_unit_nt_ssw_ikt($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 10:
						$query = $this->grafik->get_grafik_atl_unit_univ_iku($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;
					case 11:
						$query = $this->grafik->get_grafik_atl_unit_univ_ikt($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;

					case 12:
						$query = $this->grafik->temuan_iku_ami($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;


					case 13:
						$query = $this->grafik->temuan_ikt_ami($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;

					case 14:
						$query = $this->grafik->temuan_iku_atl($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;


					case 15:
						$query = $this->grafik->temuan_ikt_atl($api_search); //butuh parameter id_borang, institusi, kd_fak dan juga kd_prodi iku
					break;

					
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function get_unit($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->grafik->get_unit_audit($api_search); //cuma butuh parameter id_borang
					break;
					case 2:
						$query = $this->grafik->get_unit_atl($api_search); //cuma butuh parameter id_borang
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function get_item($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->grafik->get_item_audit($api_search); //cuma butuh parameter id_borang
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function dt_grfk($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->grafik->dt_grfk($api_search); //cuma butuh parameter id_borang
					break;
					case 2:
						$query = $this->grafik->dt_grfk_ikt($api_search); //cuma butuh parameter id_borang
					break;
					case 3:
						$query = $this->grafik->dt_grfka($api_search); //cuma butuh parameter id_borang
					break;
					case 4:
						$query = $this->grafik->dt_grfk_iktt($api_search); //cuma butuh parameter id_borang
					break;
					case 5:
						$query = $this->grafik->atl_grfk_iku($api_search); // id_borang, prodi, id_periode
					break;
					case 6:
						$query = $this->grafik->atl_grfk_ikt($api_search); // id_borang, prodi, id_periode
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function dt_item($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->grafik->dt_item($api_search); 
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function matrix($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						$query = $this->grafik->matrix($api_search); 
					break;
					case 2:
						$query = $this->grafik->matrix_ikuikt($api_search); 
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
}
	