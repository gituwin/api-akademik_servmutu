<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_mutu_info_publik extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}
	
	// TABEL DOKUMENTASI START
	function dokumentasi_publik($key = array()){
		$data = $this->mutu->query("
			SELECT id_dokumentasi, nm_dokumentasi, id_versi_akreditasi, id_jenis_akreditasi, status, is_public
			FROM dokumentasi
			WHERE is_public = '1'
			AND status = 1
			AND id_dokumentasi
			IN (
				SELECT id_dokumentasi
				FROM dokumentasi_publik
			)
		");
		return $data;
	}

	function dokumentasi_publik_by_versi_and_jenis($key = array()){
		$data = $this->mutu->query("
			SELECT D.*, VA.nm_versi_akreditasi, VA.id_lembaga_akreditasi, VA.id_jenis_akreditasi, VA.kd_jenjang, JA.nm_jenis_akreditasi, LA.nm_lembaga_akreditasi
			FROM dokumentasi AS D
			LEFT JOIN versi_akreditasi AS VA
			ON VA.id_versi_akreditasi = D.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS JA
			ON JA.id_jenis_akreditasi = VA.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS LA
			ON LA.id_lembaga_akreditasi = VA.id_lembaga_akreditasi
			WHERE D.is_public = '1'
			AND D.status = 1
			AND VA.status = 1
			AND D.id_dokumentasi
			IN (
				SELECT id_dokumentasi
				FROM dokumentasi_publik
			)
			AND D.id_versi_akreditasi = '".$key['id_versi_akreditasi']."'
			AND D.id_jenis_akreditasi = '".$key['id_jenis_akreditasi']."'
		");
		return $data;
	}
	// TABEL DOKUMENTASI END
	
	// TABEL FILE_DOKUMEN START
	function file_dokumen_publik_by_id_dokumentasi($key = array()){
		$data = $this->mutu->query("
			SELECT FD.id_file_dokumen, FD.id_asdok_dokumen, FD.nm_file_dokumen, FD.institusi, FD.kd_fak, FD.kd_prodi, FD.is_public
			FROM file_dokumen AS FD
			JOIN asdok_dokumen AS AD ON AD.id_asdok_dokumen = FD.id_asdok_dokumen
			JOIN aspek_dokumentasi AS AD2 ON AD2.id_aspek_dokumentasi = AD.id_aspek_dokumentasi
			JOIN dokumentasi AS D ON D.id_dokumentasi = AD2.id_dokumentasi
			WHERE FD.is_public = '1'
			AND D.id_dokumentasi = '".$key['id_dokumentasi']."'
		");
		return $data;
	}

	function kd_fakultas_publik(){
		$data = $this->mutu->query("
			SELECT DISTINCT kd_fak
			FROM file_dokumen
			WHERE id_asdok_dokumen
			IN (
				SELECT id_asdok_dokumen
				FROM asdok_dokumen
				WHERE id_aspek_dokumentasi
				IN (
					SELECT id_aspek_dokumentasi
					FROM aspek_dokumentasi
					WHERE id_dokumentasi
					IN (
						SELECT id_dokumentasi
						FROM dokumentasi
						WHERE is_public = '1'
					)
				)
			)
			AND is_public = '1'
			AND kd_fak
			IN (
				SELECT kd_fak
				FROM dokumentasi_publik
				WHERE kd_fak != ''
			)
		");
		return $data;
	}

	function kd_prodi_publik(){
		$data = $this->mutu->query("
			SELECT DISTINCT kd_prodi
			FROM file_dokumen
			WHERE id_asdok_dokumen
			IN (
				SELECT id_asdok_dokumen
				FROM asdok_dokumen
				WHERE id_aspek_dokumentasi
				IN (
					SELECT id_aspek_dokumentasi
					FROM aspek_dokumentasi
					WHERE id_dokumentasi
					IN (
						SELECT id_dokumentasi
						FROM dokumentasi
						WHERE is_public = '1'
					)
				)
			)
			AND is_public = '1'
			AND kd_prodi
			IN (
				SELECT kd_prodi
				FROM dokumentasi_publik
				WHERE kd_prodi != ''
			)
		");
		return $data;
	}

	function file_dokumen_publik_by_id_asdok_dokumen($key = array()){
		$data = $this->mutu->query("
			SELECT *
			FROM file_dokumen
			WHERE is_public = '1'
			AND id_asdok_dokumen = '".$key['id_asdok_dokumen']."'
			ORDER BY id_file_dokumen ASC
		");
		return $data;
	}

	function file_dokumen_publik_by_id_file_dokumen($key = array()){
		// id_file_dokumen, id_asdok_dokumen, nm_file_dokumen, tipe_file, file_dokumen, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan, is_public, link_dokumen, nm_link_dokumen, link_video, nm_link_video, nm_file_gambar, file_gambar
		$data = $this->mutu->query("
			SELECT id_file_dokumen, id_asdok_dokumen, nm_file_dokumen, tipe_file, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan, is_public, link_dokumen, nm_link_dokumen, link_video, nm_link_video, nm_file_gambar, file_gambar, is_asesor
			FROM file_dokumen
			WHERE is_public = '1'
			AND id_file_dokumen = '".$key['id_file_dokumen']."'
		");
		return $data;
	}

	function file_dokumen_publik_by_id_asdok_dokumen_and_kode($key = array()){
		// id_file_dokumen, id_asdok_dokumen, nm_file_dokumen, tipe_file, file_dokumen, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan, is_public, link_dokumen, nm_link_dokumen, link_video, nm_link_video, nm_file_gambar, file_gambar
		$data = $this->mutu->query("
			SELECT id_file_dokumen, id_asdok_dokumen, nm_file_dokumen, tipe_file, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan, is_public, link_dokumen, nm_link_dokumen, link_video, nm_link_video, nm_file_gambar, file_gambar
			FROM file_dokumen
			WHERE is_public = '1'
			AND id_asdok_dokumen = '".$key['id_asdok_dokumen']."'
			AND (
				institusi = '".$key['kode']."'
				OR kd_fak = '".$key['kode']."'
				OR kd_prodi = '".$key['kode']."'
			)
			ORDER BY id_file_dokumen ASC
		");
		return $data;
	}

	function file_dokumen_asesor_by_id_file_dokumen($key = array()){
		// id_file_dokumen, id_asdok_dokumen, nm_file_dokumen, tipe_file, file_dokumen, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan, is_public, link_dokumen, nm_link_dokumen, link_video, nm_link_video, nm_file_gambar, file_gambar
		$data = $this->mutu->query("
			SELECT id_file_dokumen, id_asdok_dokumen, nm_file_dokumen, tipe_file, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan, is_public, link_dokumen, nm_link_dokumen, link_video, nm_link_video, nm_file_gambar, file_gambar, is_asesor
			FROM file_dokumen
			WHERE is_asesor = '1'
			AND id_file_dokumen = '".$key['id_file_dokumen']."'
		");
		return $data;
	}
	// TABEL FILE_DOKUMEN END
	
	// TABEL LEMBAGA START
	function lembaga_by_id_dokumentasi($key = array()){
		$data = $this->mutu->query("
			SELECT id_lembaga_akreditasi, nm_lembaga_akreditasi
			FROM lembaga_akreditasi
			WHERE id_lembaga_akreditasi
			IN (
				SELECT id_lembaga_akreditasi
				FROM versi_akreditasi
				WHERE id_versi_akreditasi
				IN (
					SELECT id_versi_akreditasi
					FROM dokumentasi
					WHERE id_dokumentasi
					IN (
						".$key['id_dokumentasi']."
					)
				)
			)
		");
		return $data;
	}
	// TABEL LEMBAGA END
	
	// TABEL VERSI_AKREDITASI START
	function versi_akreditasi_by_lembaga_akreditasi_on_file_dokumen_publik($key = array()){
		$data = $this->mutu->query("
			SELECT id_versi_akreditasi, nm_versi_akreditasi
			FROM versi_akreditasi
			WHERE id_versi_akreditasi
			IN (
				SELECT id_versi_akreditasi
				FROM dokumentasi
				WHERE id_dokumentasi
				IN (
					SELECT id_dokumentasi
					FROM dokumentasi_publik
				)
				AND id_dokumentasi
				IN (
					SELECT id_dokumentasi
					FROM aspek_dokumentasi
					WHERE id_aspek_dokumentasi
					IN (
						SELECT id_aspek_dokumentasi
						FROM asdok_dokumen
						WHERE id_asdok_dokumen
						IN (
							SELECT id_asdok_dokumen
							FROM file_dokumen
							WHERE is_public = '1'
						)
					)
				)
			)
			AND id_lembaga_akreditasi = '".$key['id_lembaga_akreditasi']."'
		");
		return $data;
	}
	// TABEL VERSI_AKREDITASI END
	
	// TABEL JENIS_AKREDITASI START
	function jenis_akreditasi_by_versi_akreditasi_on_file_dokumen_publik($key = array()){
		$data = $this->mutu->query("
			SELECT JA.id_jenis_akreditasi, JA.nm_jenis_akreditasi, VA.kd_jenjang
			FROM jenis_akreditasi AS JA
			JOIN versi_akreditasi AS VA ON VA.id_jenis_akreditasi = JA.id_jenis_akreditasi
			WHERE JA.id_jenis_akreditasi
			IN (
				SELECT id_jenis_akreditasi
				FROM dokumentasi
				WHERE id_dokumentasi
				IN (
					SELECT id_dokumentasi
					FROM dokumentasi_publik
				)
				AND id_dokumentasi
				IN (
					SELECT id_dokumentasi
					FROM aspek_dokumentasi
					WHERE id_aspek_dokumentasi
					IN (
						SELECT id_aspek_dokumentasi
						FROM asdok_dokumen
						WHERE id_asdok_dokumen
						IN (
							SELECT id_asdok_dokumen
							FROM file_dokumen
							WHERE is_public = '1'
						)
					)
				)
			)
			AND VA.id_versi_akreditasi = '".$key['id_versi_akreditasi']."'
		");
		return $data;
	}

	function jenis_akreditasi_by_versi_akreditasi_on_file_dokumen_publik_v2($key = array()){
		$data = $this->mutu->query("
			SELECT *
			FROM jenis_akreditasi
			WHERE id_jenis_akreditasi
			IN (
				SELECT id_jenis_akreditasi
				FROM dokumentasi
				WHERE id_dokumentasi
				IN (
					SELECT id_dokumentasi
					FROM dokumentasi_publik
				)
				AND id_dokumentasi
				IN (
					SELECT id_dokumentasi
					FROM aspek_dokumentasi
					WHERE id_aspek_dokumentasi
					IN (
						SELECT id_aspek_dokumentasi
						FROM asdok_dokumen
						WHERE id_asdok_dokumen
						IN (
							SELECT id_asdok_dokumen
							FROM file_dokumen
							WHERE is_public = '1'
						)
					)
				)
				AND id_versi_akreditasi = '".$key['id_versi_akreditasi']."'
			)
		");
		return $data;
	}

	function jenis_akreditasi_by_jenis_akreditasi($key = array()){
		$data = $this->mutu->query("
			SELECT *
			FROM jenis_akreditasi
			WHERE id_jenis_akreditasi = '".$key['id_jenis_akreditasi']."'
		");
		return $data;
	}
	// TABEL JENIS_AKREDITASI END
	
	// TABEL ASPEK_DOKUMENTASI START
	function standar_by_dokumentasi_on_publik_and_kode($key = array()){
		$data = $this->mutu->query("
			SELECT ROW_NUMBER() OVER (ORDER BY no_standar) AS no_urut, no_standar, nm_ksk
			FROM (
				SELECT DISTINCT AD.no_standar, K.nm_ksk
				FROM aspek_dokumentasi AS AD
				JOIN ksk AS K ON K.id_ksk = AD.no_standar
				WHERE id_aspek_dokumentasi
				IN (
					SELECT id_aspek_dokumentasi
					FROM asdok_dokumen
					WHERE id_asdok_dokumen
					IN (
						SELECT id_asdok_dokumen
						FROM file_dokumen
						WHERE is_public = '1'
						AND (
							institusi = '".$key['kd_fakultas_prodi']."'
							OR kd_fak = '".$key['kd_fakultas_prodi']."'
							OR kd_prodi = '".$key['kd_fakultas_prodi']."'
						)
					)
				)
				AND AD.id_dokumentasi = '".$key['id_dokumentasi']."'
				ORDER BY AD.no_standar ASC
			) AS ksk
		");
		return $data;
	}

	function aspek_dokumentasi_by_dokumentasi_on_publik($key = array()){
		$data = $this->mutu->query("
			SELECT AD.id_aspek_dokumentasi, AD.id_aspek, AD.no_butir, A.nm_aspek
			FROM aspek_dokumentasi AS AD
			JOIN aspek AS A ON A.id_aspek = AD.id_aspek
			WHERE AD.id_aspek_dokumentasi
			IN (
				SELECT id_aspek_dokumentasi
				FROM asdok_dokumen
				WHERE id_asdok_dokumen
				IN (
					SELECT id_asdok_dokumen
					FROM file_dokumen
					WHERE is_public = '1'
					AND (
						institusi = '".$key['kd_fakultas_prodi']."'
						OR kd_fak = '".$key['kd_fakultas_prodi']."'
						OR kd_prodi = '".$key['kd_fakultas_prodi']."'
					)
				)
			)
			AND AD.id_dokumentasi = '".$key['id_dokumentasi']."'
			AND AD.no_standar = '".$key['no_standar']."'
			ORDER BY AD.no_urut ASC, no_butir ASC
		");
		return $data;
	}

	function standar_by_dokumentasi($key = array()){
		$data = $this->mutu->query("
			SELECT DISTINCT AD.no_standar, K.nm_ksk
			FROM aspek_dokumentasi AS AD
			JOIN ksk AS K ON K.id_ksk = AD.no_standar
			WHERE AD.id_dokumentasi = '".$key['id_dokumentasi']."'
			ORDER BY AD.no_standar ASC
		");
		return $data;
	}

	function standar_by_dokumentasi_no_urut($key = array()){
		$data = $this->mutu->query("
			SELECT ROW_NUMBER() OVER (ORDER BY no_standar) AS no_urut, no_standar, nm_ksk
			FROM (
				SELECT DISTINCT AD.no_standar, K.nm_ksk
				FROM aspek_dokumentasi AS AD
				JOIN ksk AS K ON K.id_ksk = AD.no_standar
				WHERE AD.id_dokumentasi = '".$key['id_dokumentasi']."'
				ORDER BY AD.no_standar ASC
			) AS ksk
		");
		return $data;
	}
	// TABEL ASPEK_DOKUMENTASI END
	
	// TABEL ASDOK_DOKUMEN START
	function asdok_dokumen_by_aspek_dokumen_on_publik($key = array()){
		/*$data = $this->mutu->query("
			SELECT *
			FROM asdok_dokumen AS AD
			JOIN dokumen AS D ON D.id_dokumen = AD.id_dokumen
			JOIN jenis_dokumen AS JD ON JD.id_jenis_dokumen = AD.id_jenis_dokumen
			WHERE AD.id_asdok_dokumen
			IN (
				SELECT id_asdok_dokumen
				FROM file_dokumen
				WHERE is_public = '1'
			)
			AND AD.id_aspek_dokumentasi = '".$key['id_aspek_dokumentasi']."'
			ORDER BY no_grup ASC, no_urut ASC
		");*/
		$data = $this->mutu->query("
			SELECT AD.*, D.nm_dokumen, D.keterangan, D.kd_pgw, D.waktu_simpan, D.nm_dokumen_tampil, JD.nm_jenis_dokumen
			FROM asdok_dokumen AS AD
			JOIN dokumen AS D ON D.id_dokumen = AD.id_dokumen
			JOIN jenis_dokumen AS JD ON JD.id_jenis_dokumen = AD.id_jenis_dokumen
			WHERE AD.id_aspek_dokumentasi = '".$key['id_aspek_dokumentasi']."'
			ORDER BY no_grup ASC, no_urut ASC
		");
		return $data;
	}

	function asdok_dokumen_by_aspek_dokumen_and_kode_on_publik($key = array()){
		$data = $this->mutu->query("
			SELECT AD.*, D.nm_dokumen, D.keterangan, D.kd_pgw, D.waktu_simpan, D.nm_dokumen_tampil, JD.nm_jenis_dokumen
			FROM asdok_dokumen AS AD
			JOIN dokumen AS D ON D.id_dokumen = AD.id_dokumen
			JOIN jenis_dokumen AS JD ON JD.id_jenis_dokumen = AD.id_jenis_dokumen
			WHERE AD.id_asdok_dokumen
			IN (
				SELECT id_asdok_dokumen
				FROM file_dokumen
				WHERE is_public = '1'
				AND (
					institusi = '".$key['kode']."'
					OR kd_fak = '".$key['kode']."'
					OR kd_prodi = '".$key['kode']."'
				)
			)
			AND AD.id_aspek_dokumentasi = '".$key['id_aspek_dokumentasi']."'
			ORDER BY no_grup ASC, no_urut ASC
		");
		/*$data = $this->mutu->query("
			SELECT *
			FROM asdok_dokumen AS AD
			JOIN dokumen AS D ON D.id_dokumen = AD.id_dokumen
			JOIN jenis_dokumen AS JD ON JD.id_jenis_dokumen = AD.id_jenis_dokumen
			WHERE AD.id_aspek_dokumentasi = '".$key['id_aspek_dokumentasi']."'
			ORDER BY no_grup ASC, no_urut ASC
		");*/
		return $data;
	}
	// TABEL ASDOK_DOKUMEN END
	
	// TABEL DOKUMENTASI_PUBLIK START
	function dokumentasi_publik_true($key = array()){
		$data = $this->mutu->query("
			SELECT *
			FROM dokumentasi_publik
			WHERE id_dokumentasi = '".$key['id_dokumentasi']."'
			AND (
				institusi = '".$key['milik']."'
				OR kd_fak = '".$key['milik']."'
				OR kd_prodi = '".$key['milik']."'
			)
		");
		return $data;
	}

	function dokumentasi_publik_true2($key = array()){
		$data = $this->mutu->query("
			SELECT *
			FROM dokumentasi_publik
			WHERE id_dokumentasi = '".$key['id_dokumentasi']."'
			AND institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
		");
		return $data;
	}
	// TABEL DOKUMENTASI_PUBLIK END
	
	// TABEL ASDOK_DOKUMEN_TEKS START
	function teks_asdok_dokumen_by_id_asdok_dokumen_and_kode($key = array()){
		$data = $this->mutu->query("
			SELECT *
			FROM asdok_dokumen_teks
			WHERE id_asdok_dokumen = '".$key['id_asdok_dokumen']."'
			AND institusi = '".$key['institusi']."'
			AND kd_fak = '".$key['kd_fak']."'
			AND kd_prodi = '".$key['kd_prodi']."'
		");
		return $data;
	}

	function teks_asdok_dokumen_by_id_asdok_dokumen_and_kode2($key = array()){
		$data = $this->mutu->query("
			SELECT *
			FROM asdok_dokumen_teks
			WHERE id_asdok_dokumen = '".$key['id_asdok_dokumen']."'
			AND (
				institusi = '".$key['kode']."'
				OR kd_fak = '".$key['kode']."'
				OR kd_prodi = '".$key['kode']."'
			)
		");
		return $data;
	}
	// TABEL ASDOK_DOKUMEN_TEKS END
}
?>