<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_mutu_tmp extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}
	
	// TABEL TMP_PGW_M_FUNGSIONAL START
	function select_all_tpmf(){
		$data = $this->mutu->query("
			SELECT *
			FROM tmp_pgw_m_fungsional
		");
		return $data;
	}
	// TABEL TMP_PGW_M_FUNGSIONAL END
	
	// TABEL TMP_PGW_M_GELAR_AKAFEMIK START
	function select_all_tpmga(){
		$data = $this->mutu->query("
			SELECT *
			FROM tmp_pgw_m_gelar_akademik
		");
		return $data;
	}
	// TABEL TMP_PGW_M_GELAR_AKAFEMIK END
}
?>