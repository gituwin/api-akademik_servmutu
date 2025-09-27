<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_mutu_dokumentasi extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}
	
	function insert_dokumen($data=''){
		$id_asdok_dokumen	= (!empty($data['id_asdok_dokumen']) ? $data['id_asdok_dokumen'] : '');
		$nm_file_dokumen		= (!empty($data['nm_file_dokumen']) ? $data['nm_file_dokumen'] : '');
		$tipe_file						= (!empty($data['tipe_file']) ? $data['tipe_file'] : '');
		$file_dokumen			= (!empty($data['file_dokumen']) ? $data['file_dokumen'] : '');
		$institusi						= (!empty($data['institusi']) ? $data['institusi'] : '');
		$kd_fak						= (!empty($data['kd_fak']) ? $data['kd_fak'] : '');
		$kd_prodi					= (!empty($data['kd_prodi']) ? $data['kd_prodi'] : '');
		$kd_pgw						= (!empty($data['kd_pgw']) ? $data['kd_pgw'] : '');
		$waktu_simpan			= (!empty($data['waktu_simpan']) ? $data['waktu_simpan'] : '');
		$sql = "INSERT INTO file_dokumen(id_asdok_dokumen, nm_file_dokumen, tipe_file, file_dokumen, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan)VALUES('".$id_asdok_dokumen."', '".$nm_file_dokumen."', '".$tipe_file."', '{$file_dokumen}', '".$institusi."', '".$kd_fak."', '".$kd_prodi."', '".$kd_pgw."', '".$waktu_simpan."')";
		$this->mutu->query($sql);
		if($this->mutu->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function count_cari_file_dokumen($data=''){
		$q = (!empty($data['q']) ? $data['q'] : '');
		$where1 = "";
		$where2 = "";
		if(!empty($data['id_dokumentasi'])){
			$arr_sql1[] = "id_dokumentasi = '".$data['id_dokumentasi']."'";
		}
		if(isset($data['status'])){
			$arr_sql1[] = "status = '".$data['status']."'";
		}
		if(isset($data['kd_fak'])){
			$arr_sql2[] = "kd_fak = '".$data['kd_fak']."'";
		}
		if(isset($data['institusi'])){
			$arr_sql2[] = "institusi = '".$data['institusi']."'";
		}
		if(isset($data['kd_prodi'])){
			$arr_sql2[] = "kd_prodi = '".$data['kd_prodi']."'";
		}
		if(!empty($arr_sql1)){
			$s_sql1	= implode(" AND ", $arr_sql1);
			$where1 = " AND ".$s_sql1;
		}
		if(!empty($arr_sql2)){
			$s_sql2	= implode(" AND ", $arr_sql2);
			$where2 = " AND ".$s_sql2;
		}
		$sql = "SELECT COUNT(DISTINCT(id_aspek_dokumentasi)) total FROM asdok_dokumen_v WHERE ((UPPER(nm_aspek) LIKE '%".strtoupper($q)."%' OR UPPER(nm_dokumen) LIKE '%".strtoupper($q)."%' OR UPPER(nm_jenis_dokumen) LIKE '%".strtoupper($q)."%' ) OR id_asdok_dokumen IN (SELECT DISTINCT(id_asdok_dokumen) FROM file_dokumen_v WHERE UPPER(nm_file_dokumen) LIKE '%".strtoupper($q)."%' ".$where2.")) ".$where1;
		$query = $this->mutu->query($sql)->row_array();
		return (!empty($query['total']) ? $query['total'] : 0);
	}
	
	function aspek_cari_file_dokumen($data=''){
		$q = (!empty($data['q']) ? $data['q'] : '');
		$where1 = "";
		$where2 = "";
		if(!empty($data['id_dokumentasi'])){
			$arr_sql1[] = "id_dokumentasi = '".$data['id_dokumentasi']."'";
		}
		if(isset($data['status'])){
			$arr_sql1[] = "status = '".$data['status']."'";
		}
		if(isset($data['kd_fak'])){
			$arr_sql2[] = "kd_fak = '".$data['kd_fak']."'";
		}
		if(isset($data['institusi'])){
			$arr_sql2[] = "institusi = '".$data['institusi']."'";
		}
		if(isset($data['kd_prodi'])){
			$arr_sql2[] = "kd_prodi = '".$data['kd_prodi']."'";
		}
		if(!empty($arr_sql1)){
			$s_sql1	= implode(" AND ", $arr_sql1);
			$where1 = " AND ".$s_sql1;
		}
		if(!empty($arr_sql2)){
			$s_sql2	= implode(" AND ", $arr_sql2);
			$where2 = " AND ".$s_sql2;
		}
		$sql = "SELECT DISTINCT(id_aspek_dokumentasi) id_aspek_dokumentasi FROM asdok_dokumen_v WHERE ((UPPER(nm_aspek) LIKE '%".strtoupper($q)."%' OR UPPER(nm_dokumen) LIKE '%".strtoupper($q)."%' OR UPPER(nm_jenis_dokumen) LIKE '%".strtoupper($q)."%' ) OR id_asdok_dokumen IN (SELECT DISTINCT(id_asdok_dokumen) FROM file_dokumen_v WHERE UPPER(nm_file_dokumen) LIKE '%".strtoupper($q)."%' ".$where2.")) ".$where1;
		$query = $this->mutu->query($sql)->result_array();
		return (!empty($query[0]) ? array_column($query, 'id_aspek_dokumentasi') : array());
	}
}
?>