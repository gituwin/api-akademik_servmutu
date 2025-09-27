<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 *
 * @package		Revitalisasi SIA
 * @subpackage  SIA Staff
 * @category    Master data (3)
 * @creator     Wihikan Mawi Wijna
 * @created     22-11-2012
*/
 
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
class Mdl_pgw_staf extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->tabel_nama 			= 'tmp_pgw_staf';
		$this->tabel_kunci_primer 	= 'nip';
    }
	
	
	
	function _table_select_01(){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->get($this->tabel_nama)->result_array(); 
	}
	
	function _table_search_01($searching=''){
		$hasil = $this->db->query("SELECT * FROM ".$this->tabel_nama." WHERE ".$this->tabel_kunci_primer." = '".$searching."'")->result_array();
		return $hasil; }
			
	function _table_limit_01 ($mulai = 1, $jumlah = 1){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->limit($jumlah, $mulai)->get($this->tabel_nama)->result_array(); }
		
	function _table_count_01 (){ 
		$hasil = $this->db->query("SELECT COUNT(".$this->tabel_kunci_primer.") as total FROM ".$this->tabel_nama)->result_array();
		return $hasil[0]; }
		
	function _procedure003_01($datapost) {
		return $this->db->call_procedure('', $datapost); }
}
?>