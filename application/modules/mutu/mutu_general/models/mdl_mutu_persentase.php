<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_mutu_persentase extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}
	
	function total($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(id_item_borang) AS TOTAL
			FROM item_borang
			WHERE id_borang = ".$key['id_borang']."
			AND id_ksk = ".$key['id_ksk']."
		");
		return $data;
	}
	
	function terisi($key = array()){
		if (empty($key['id_periode'])) {
			$data = $this->mutu->query("
			SELECT COUNT(id_isi_borang) AS TERISI
			FROM isi_borang
			WHERE isi_borang != ''
			AND institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
		
            
			AND id_item_borang
			IN (
				SELECT id_item_borang
				FROM item_borang
				WHERE id_borang = ".$key['id_borang']."
				AND id_ksk = ".$key['id_ksk']."
			)
		");
		// $r='AND id_periode='".$key['id_periode']."'';
		}

		if (!empty($key['id_periode'])) {
			$data = $this->mutu->query("
			SELECT COUNT(id_isi_borang) AS TERISI
			FROM isi_borang
			WHERE isi_borang != ''
			AND institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
			AND id_periode='".$key['id_periode']."'
            
			AND id_item_borang
			IN (
				SELECT id_item_borang
				FROM item_borang
				WHERE id_borang = ".$key['id_borang']."
				AND id_ksk = ".$key['id_ksk']."
			)
		");
		}
		
		return $data;
	}
	
	function terisi_audit($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(a.id_isi_borang) AS TERISI
			FROM isi_borang a LEFT JOIN (SELECT * FROM tb_tindaklanjut_audit WHERE status_auditee = '1') b
			ON a.id_isi_borang = b.id_isi_borang
			WHERE
			(a.isi_borang != '' OR b.id_klasifikasi NOT IN (0) OR b.root_cause_analysis != '' OR b.correction != '' OR b.corrective_action != '')
			AND a.institusi = '".$key['institusi']."'
			AND a.kd_fak = '".$key['kd_fak']."'
			AND a.kd_prodi = '".$key['kd_prodi']."'
            AND a.id_periode='".$key['id_periode']."'
			AND a.id_item_borang
			IN (
				SELECT id_item_borang
				FROM item_borang
				WHERE id_borang = ".$key['id_borang']."
				AND id_ksk = ".$key['id_ksk']."
			)
		");
		return $data;
	}
	
	function total_dokumentasi($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(*) AS TOTAL
			FROM aspek_dokumentasi AS A
			LEFT JOIN asdok_dokumen AS B
			ON B.id_aspek_dokumentasi = A.id_aspek_dokumentasi
			WHERE A.id_dokumentasi = ".$key['id_dokumentasi']."
			AND A.no_standar = ".$key['no_standar']."
		");
		return $data;
	}
	
	function terisi_dokumentasi($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(DISTINCT id_asdok_dokumen) AS TERISI
			FROM file_dokumen
			WHERE institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
			AND id_asdok_dokumen
			IN (
				SELECT id_asdok_dokumen
				FROM aspek_dokumentasi AS A
				LEFT JOIN asdok_dokumen AS B
				ON B.id_aspek_dokumentasi = A.id_aspek_dokumentasi
				WHERE A.id_dokumentasi = ".$key['id_dokumentasi']."
				AND A.no_standar = ".$key['no_standar']."
			)
		");
		return $data;
	}
	
	function aspek_dokumentasi($key = array()){
		$data = $this->mutu->query("
			SELECT id_aspek_dokumentasi
			FROM aspek_dokumentasi
			WHERE id_dokumentasi = ".$key['id_dokumentasi']."
			AND no_standar = ".$key['no_standar']."
		");
		return $data;
	}

	



	
	function total_lkps($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(id_item_lkps) AS TOTAL
			FROM item_lkps
			WHERE id_lkps = ".$key['id_lkps']."
			AND id_ksk = ".$key['id_ksk']."
		");
		return $data;
	}
	
	function terisi_lkps($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(id_isi_lkps) AS TERISI
			FROM isi_lkps
			WHERE isi_lkps != ''
			AND institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
			AND id_item_lkps
			IN (
				SELECT id_item_lkps
				FROM item_lkps
				WHERE id_lkps = ".$key['id_lkps']."
				AND id_ksk = ".$key['id_ksk']."
			)
		");
		return $data;
	}
	
	function total_dokumentasi_lkps($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(*) AS TOTAL
			FROM aspek_dokumentasi AS A
			LEFT JOIN asdok_dokumen AS B
			ON B.id_aspek_dokumentasi = A.id_aspek_dokumentasi
			WHERE A.id_dokumentasi = ".$key['id_dokumentasi']."
			AND A.no_standar = ".$key['no_standar']."
		");
		return $data;
	}
	
	function terisi_dokumentasi_lkps($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(DISTINCT id_asdok_dokumen) AS TERISI
			FROM file_dokumen
			WHERE institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
			AND id_asdok_dokumen
			IN (
				SELECT id_asdok_dokumen
				FROM aspek_dokumentasi AS A
				LEFT JOIN asdok_dokumen AS B
				ON B.id_aspek_dokumentasi = A.id_aspek_dokumentasi
				WHERE A.id_dokumentasi = ".$key['id_dokumentasi']."
				AND A.no_standar = ".$key['no_standar']."
			)
		");
		return $data;
	}
	
	function aspek_dokumentasi_lkps($key = array()){
		$data = $this->mutu->query("
			SELECT id_aspek_dokumentasi
			FROM aspek_dokumentasi
			WHERE id_dokumentasi = ".$key['id_dokumentasi']."
			AND no_standar = ".$key['no_standar']."
		");
		return $data;
	}

	



	
	function total_ipepa($key = array()){
		$data = $this->mutu->query("
			SELECT COUNT(id_item_ipepa) AS TOTAL
			FROM item_ipepa
			WHERE id_ipepa = ".$key['id_ipepa']."
			AND id_ksk = ".$key['id_ksk']."
		");
		return $data;
	}
	
	function terisi_ipepa($key = array()){
		/*$data = $this->mutu->query("
			SELECT COUNT(id_isi_lkps) AS TERISI
			FROM isi_lkps
			WHERE isi_lkps != ''
			AND institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
			AND id_item_lkps
			IN (
				SELECT id_item_lkps
				FROM item_lkps
				WHERE id_lkps = ".$key['id_lkps']."
				AND id_ksk = ".$key['id_ksk']."
			)
		");
		return $data;*/
		return false;
	}
	
	function total_dokumentasi_ipepa($key = array()){
		/*$data = $this->mutu->query("
			SELECT COUNT(*) AS TOTAL
			FROM aspek_dokumentasi AS A
			LEFT JOIN asdok_dokumen AS B
			ON B.id_aspek_dokumentasi = A.id_aspek_dokumentasi
			WHERE A.id_dokumentasi = ".$key['id_dokumentasi']."
			AND A.no_standar = ".$key['no_standar']."
		");
		return $data;*/
		return false;
	}
	
	function terisi_dokumentasi_ipepa($key = array()){
		/*$data = $this->mutu->query("
			SELECT COUNT(DISTINCT id_asdok_dokumen) AS TERISI
			FROM file_dokumen
			WHERE institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
			AND id_asdok_dokumen
			IN (
				SELECT id_asdok_dokumen
				FROM aspek_dokumentasi AS A
				LEFT JOIN asdok_dokumen AS B
				ON B.id_aspek_dokumentasi = A.id_aspek_dokumentasi
				WHERE A.id_dokumentasi = ".$key['id_dokumentasi']."
				AND A.no_standar = ".$key['no_standar']."
			)
		");
		return $data;*/
		return false;
	}
	
	function aspek_dokumentasi_ipepa($key = array()){
		/*$data = $this->mutu->query("
			SELECT id_aspek_dokumentasi
			FROM aspek_dokumentasi
			WHERE id_dokumentasi = ".$key['id_dokumentasi']."
			AND no_standar = ".$key['no_standar']."
		");
		return $data;*/

		return false;
	}
}
?>