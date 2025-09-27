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
class Mdl_pgw_his_tugas extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->tabel_nama 			= 'tmp_pgw_his_tugas';
		$this->tabel_kunci_primer 	= 'nip';
    }
	
	
	
	function _table_select_01(){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->get($this->tabel_nama)->result_array(); 
	}
	
	function _table_search_01($searching=''){
		$hasil = $this->db->query("SELECT * FROM ".$this->tabel_nama." WHERE ".$this->tabel_kunci_primer." = '".$searching."'")->result_array();
		return $hasil; }
	function _table_search_02($searching=''){
		$kd_jenis = implode("','", $searching[0]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select t1.nip, coalesce(t1.tpt_tugas,'') as tpt_tugas, to_char(t1.tgl_mulai,'DD Mon YYYY') as tgl_mulai, to_char(t1.tgl_selesai,'DD Mon YYYY') as tgl_selesai
						, t2.fullname
				 from ".$this->tabel_nama." t1
				 join pgw_staf_v t2 on t1.nip = t2.nip
				 where t1.kd_jenjang in ('".$kd_jenis."') and extract(YEAR from t1.tgl_mulai)='".$searching[1]."' and t1.status='1' ";
		$hasil = $this->db->query($query)->result_array();
		return $hasil; }
	function _table_search_03($searching=''){
		$kd_jenis = implode("','", $searching[0]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select t1.nip, coalesce(t1.tpt_tugas,'') as tpt_tugas, to_char(t1.tgl_mulai,'DD Mon YYYY') as tgl_mulai, to_char(t1.tgl_selesai,'DD Mon YYYY') as tgl_selesai
						, t2.fullname
				 from ".$this->tabel_nama." t1
				 join pgw_staf_v t2 on t1.nip = t2.nip
				 where t1.kd_jenjang in ('".$kd_jenis."') and t1.status='1' ";
		$hasil = $this->db->query($query)->result_array();
		return $hasil; }
		// return $searching; }
			
	function _table_limit_01 ($mulai = 1, $jumlah = 1){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->limit($jumlah, $mulai)->get($this->tabel_nama)->result_array(); }
		
	function _table_count_01 (){ 
		$hasil = $this->db->query("SELECT COUNT(".$this->tabel_kunci_primer.") as total FROM ".$this->tabel_nama)->result_array();
		return $hasil[0]; }	
	
	function _table_count_02 ($searching=''){ 
		$kd_jenis = implode("','", $searching[0]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select count(t1.*) as total
				 from ".$this->tabel_nama." t1
					-- join tmp_pgw_staf t2 on t1.nip = t2.nip
				 where kd_jenjang in ('".$kd_jenis."') and extract(YEAR from tgl_mulai)='".$searching[1]."' and t1.status='1' ";
		$hasil = $this->db->query($query)->result_array();
		return $hasil[0]; }
	function _table_count_03 ($searching=''){ 
		$kd_jenis = implode("','", $searching[0]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select count(t1.*) as total
				 from ".$this->tabel_nama." t1
					--join tmp_pgw_staf t2 on t1.nip = t2.nip
				 where kd_jenjang in ('".$kd_jenis."') and t1.status='1' ";
		$hasil = $this->db->query($query)->result_array();
		return $hasil[0]; }
		
	function _procedure001_01($datapost) {
		return $this->db->call_procedure('', $datapost); }
}
?>