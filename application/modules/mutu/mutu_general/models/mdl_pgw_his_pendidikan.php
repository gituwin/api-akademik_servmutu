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
class Mdl_pgw_his_pendidikan extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->tabel_nama 			= 'tmp_pgw_his_pendidikan';
		$this->tabel_kunci_primer 	= 'kd_hisp';
    }
	
	
	
	function _table_select_01(){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->get($this->tabel_nama)->result_array(); 
	}
	#untuk menampilkan history pendidikan terakhir 
	function _table_select_02(){ 
		return $this->db->query("select t1.* from tmp_pgw_his_pendidikan t1 right join(
																	select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) 
																	t2 ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis")->result_array(); 
	}
	#untuk menampilkan history pendidikan terakhir kd_jenis tertentu 
	
	function _table_search_01($searching=''){
		$hasil = $this->db->query("SELECT * FROM ".$this->tabel_nama." WHERE ".$this->tabel_kunci_primer." = '".$searching."'")->result_array();
		return $hasil; }
	function _table_search_02($searching=''){
		$hasil = $this->db->query("select t1.nip, coalesce(t1.jurusan,'-') as jurusan, t1.nm_univ, coalesce(t3.gelar_da,'') as gelar_da, coalesce(t3.gelar_dna,'') as gelar_dna
									, t3.nama, coalesce(t3.gelar_ba,'') as gelar_ba, coalesce(t3.gelar_bna,'') as gelar_bna 
										from tmp_pgw_his_pendidikan t1 
										right join(
											select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
										ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis 
										join tmp_pgw_staf t3 on t1.nip = t3.nip
										where t1.kd_jenis = '".$searching[0]."'and t1.thn_lulus = '".$searching[1]."'")->result_array();
		return $hasil; }
	function _table_search_03($searching=''){
		$kd_jenis = implode("','", $searching[2]);
		$kd_jenis = "".$kd_jenis."";
		$hasil = $this->db->query("select t1.nip, coalesce(t1.jurusan,'') as jurusan, coalesce(t1.nm_univ,'') as nm_univ, t1.no_ijazah, t1.tgl_lulus
									,t3.fullname
										from tmp_pgw_his_pendidikan t1 
										right join(
											select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
										ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis 
										join pgw_staf_v t3 on t1.nip = t3.nip
										join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
										where 
										t3.status in ('A','TB') and t3.kd_jenis ='".$searching[0]."' and
										t4.kd_gelara = '".$searching[1]."' and t1.kd_jenis in ('".$kd_jenis."') ")->result_array();
		return $hasil; }
	function _table_search_04($searching=''){
		$kd_jenis = implode("','", $searching[1]);
		$kd_jenis = "".$kd_jenis."";
		$hasil = $this->db->query("select t1.nip, coalesce(t1.jurusan,'') as jurusan, coalesce(t1.nm_univ,'') as nm_univ, t1.no_ijazah, t1.tgl_lulus
									,t3.fullname
										from tmp_pgw_his_pendidikan t1 
										right join(
											select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
										ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis 
										join pgw_staf_v t3 on t1.nip = t3.nip
										join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
										where 
										t3.status in ('A','TB') and  t3.kd_jenis ='".$searching[0]."' and t4.kd_gelara in ('FN000001','FN000002','FN000003','FN000004','FN000005') and
										t1.kd_jenis in ('".$kd_jenis."')")->result_array();
		return $hasil; }
	function _table_search_05($searching=''){
		$kd_fung = implode("','", $searching[0]);
		$kd_fung = "".$kd_fung."";
		$kd_jenis = implode("','", $searching[1]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select t1.nip, coalesce(t1.jurusan,'') as jurusan, coalesce(t1.nm_univ,'') as nm_univ, t1.no_ijazah, t1.tgl_lulus 
					,t3.fullname
							from tmp_pgw_his_pendidikan t1 
							right join(
								select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
							ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis 
							left join pgw_staf_v t3 on t1.nip = t3.nip
							left join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
							left join tmp_pgw_m_gelar_akademik t5 on t4.kd_gelara = t5.kd_gelara
							where 
							t3.status in('A','TB') and
							t5.kd_fung in ('".$kd_fung."') and t1.kd_jenis in ('".$kd_jenis."');";
		$hasil = $this->db->query($query)->result_array();
		return $hasil; }
	function _table_search_06($searching=''){
		$kd_fung = implode("','", $searching[0]);
		$kd_fung = "".$kd_fung."";
		$kd_jenis = implode("','", $searching[1]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select t1.nip, coalesce(t1.jurusan,'') as jurusan, coalesce(t1.nm_univ,'') as nm_univ, t1.no_ijazah, t1.tgl_lulus 
					,t3.fullname
							from tmp_pgw_his_pendidikan t1 
							right join(
								select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
							ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis 
							left join pgw_staf_v t3 on t1.nip = t3.nip
							left join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
							left join tmp_pgw_m_gelar_akademik t5 on t4.kd_gelara = t5.kd_gelara
							where 
							t3.status in ('A','TB') and
							t5.kd_fung not in ('".$kd_fung."') and t1.kd_jenis in ('".$kd_jenis."');";
		$hasil = $this->db->query($query)->result_array();
		return $hasil; }
		// return $searching; }

			
	
	function _table_limit_01 ($mulai = 1, $jumlah = 1){ 
		return $this->db->order_by($this->tabel_kunci_primer,'asc')->limit($jumlah, $mulai)->get($this->tabel_nama)->result_array(); }
		
	function _table_count_01 (){ 
		$hasil = $this->db->query("SELECT COUNT(".$this->tabel_kunci_primer.") as total FROM ".$this->tabel_nama)->result_array();
		return $hasil[0]; }
	function _table_count_02($searching=''){
		$hasil = $this->db->query("select count(t1.*) total from tmp_pgw_his_pendidikan t1 right join(
																	select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) 
																	t2 ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis
																	where t1.kd_jenis = '".$searching[0]."' and t1.thn_lulus = '".$searching[1]."'")->result_array();
		return $hasil[0]; }
	# data pgw
	function _table_count_03($searching=''){
		$kd_jenis = implode("','", $searching[2]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select count(t1.*) total from tmp_pgw_his_pendidikan t1 right join(
											select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
											ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis
										join tmp_pgw_staf t3 on t1.nip = t3.nip 
										join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
										where 
										t3.status in ('A','TB') and t3.kd_jenis = '".$searching[0]."' and
										t4.kd_gelara = '".$searching[1]."' and t1.kd_jenis in ('".$kd_jenis."') ";
		$hasil = $this->db->query($query)->result_array();
		// return $query;
		return $hasil[0];
		 }
	# total
	function _table_count_04($searching=''){
		$kd_jenis = implode("','", $searching[1]);
		$kd_jenis = "".$kd_jenis."";
		$query2 ="
select count(t1.*) total from tmp_pgw_staf t1 left join tmp_pgw_his_gelar_akademik t2 on t1.nip=t2.nip left join tmp_pgw_his_pendidikan t3 on t1.nip = t3.nip 
right join( select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t4  ON t3.nip = t4.nip and t3.kd_jenis = t4.jenis
where t1.status in ('A','TB') and t1.kd_jenis in('".$searching[0]."') and t3.kd_jenis in('".$kd_jenis."') and t2.kd_gelara in ('FN000001','FN000002','FN000003','FN000004','FN000005') 
";
		$query = "select count(t1.*) total from tmp_pgw_his_pendidikan t1 right join(
											select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
											ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis
										join tmp_pgw_staf t3 on t1.nip = t3.nip
										join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
										where
										t3.status in ('A','TB') and t3.kd_jenis = '".$searching[0]."' and t4.kd_gelara in ('FN000001','FN000002','FN000003','FN000004','FN000005') and
										 t1.kd_jenis in ('".$kd_jenis."')";
		$hasil = $this->db->query($query2)->result_array();
		return $hasil[0];
		// return $query;
		 }
	function _table_count_05($searching=''){
		$kd_fung = implode("','", $searching[0]);
		$kd_fung = "".$kd_fung."";
		$kd_jenis = implode("','", $searching[1]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select count(t1.*) as total
							from tmp_pgw_his_pendidikan t1 
							right join(
								select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
							ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis 
							left join tmp_pgw_staf t3 on t1.nip = t3.nip
							left join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
							left join tmp_pgw_m_gelar_akademik t5 on t4.kd_gelara = t5.kd_gelara
							where 
							t3.status in ('A','TB') and
							t5.kd_fung in ('".$kd_fung."') and t1.kd_jenis in ('".$kd_jenis."');";
		$hasil = $this->db->query($query)->result_array();
		return $hasil[0]; }
	function _table_count_06($searching=''){
		$kd_fung = implode("','", $searching[0]);
		$kd_fung = "".$kd_fung."";
		$kd_jenis = implode("','", $searching[1]);
		$kd_jenis = "".$kd_jenis."";
		$query ="select count(t1.*) as total
							from tmp_pgw_his_pendidikan t1 
							right join(
								select min(kd_jenis) jenis, nip from tmp_pgw_his_pendidikan group by nip) t2 
							ON t1.nip = t2.nip and t1.kd_jenis = t2.jenis 
							left join tmp_pgw_staf t3 on t1.nip = t3.nip
							left join tmp_pgw_his_gelar_akademik t4 on t1.nip = t4.nip
							left join tmp_pgw_m_gelar_akademik t5 on t4.kd_gelara = t5.kd_gelara
							where 
							t3.status in ('A','TB') and
							t5.kd_fung not in ('".$kd_fung."') and t1.kd_jenis in ('".$kd_jenis."');";
		$hasil = $this->db->query($query)->result_array();
		return $hasil[0]; }
		
	function _procedure003_01($datapost) {
		return $this->db->call_procedure('', $datapost); }
}
?>