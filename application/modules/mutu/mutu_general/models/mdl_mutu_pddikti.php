<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_mutu_pddikti extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}
	
	function get_mapping_prodi($kd_prodi_sia){
		return $q = $this->mutu->where('kd_prodi_sia', $kd_prodi_sia)->get('tb_mapping_prodi_pddikti')->result_array();
	}
}
?>