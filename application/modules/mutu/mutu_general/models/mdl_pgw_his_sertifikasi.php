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
class Mdl_pgw_his_sertifikasi extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->tabel_nama 			= 'tmp_pgw_his_sertifikasi';
		$this->tabel_kunci_primer 	= 'nip';
    }
	
	
	
	function _table_select_01(){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->get($this->tabel_nama)->result_array(); 
	}
	
	function _table_search_01($searching=''){
		$hasil = $this->db->query("SELECT * FROM ".$this->tabel_nama." WHERE ".$this->tabel_kunci_primer." = '".$searching."'")->result_array();
		return $hasil; }
	function _table_search_02($searching=''){
		$kd_fung = implode("','", $searching[0]);
		$kd_fung = "".$kd_fung."";
		$query ="select t1.nip, COALESCE(t1.nm_sertifikasi,'') as nm_sertifikasi, t1.tgl_sertifikasi, 
					COALESCE(t1.no_sertifikasi,'') as no_sertifikasi, COALESCE(t1.pemberi_sertifikasi,'') as pemberi_sertifikasi 
							,t3.fullname
							from tmp_pgw_his_sertifikasi t1 
							left join pgw_staf_v t3 on t1.nip = t3.nip
							left join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
							left join tmp_pgw_m_gelar_akademik t5 on t4.kd_gelara = t5.kd_gelara
							where 
							--t3.status = 'A' and
							t5.kd_fung in ('".$kd_fung."') ;";
		$hasil = $this->db->query($query)->result_array();
		return $hasil; }
	function _table_limit_01 ($mulai = 1, $jumlah = 1){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->limit($jumlah, $mulai)->get($this->tabel_nama)->result_array(); }
		
	function _table_count_01 (){ 
		$hasil = $this->db->query("SELECT COUNT(".$this->tabel_kunci_primer.") as total FROM ".$this->tabel_nama)->result_array();
		return $hasil[0]; }
	function _table_count_02 ($searching=''){ 
		$kd_fung = implode("','", $searching[0]);
		$kd_fung = "".$kd_fung."";
		$query ="select count(t1.*) total
							from tmp_pgw_his_sertifikasi t1 
							left join pgw_staf_v t3 on t1.nip = t3.nip
							left join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
							left join tmp_pgw_m_gelar_akademik t5 on t4.kd_gelara = t5.kd_gelara
							where 
							--t3.status = 'A' and
							t5.kd_fung in ('".$kd_fung."') ;";
		$hasil = $this->db->query($query)->result_array();
		return $hasil[0]; }
		
	function _procedure003_01($datapost) {
		return $this->db->call_procedure('', $datapost); }
}
?>