<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_info_publik extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_info_publik/mdl_mutu_info_publik', 'info_publik');
		// $this->mutu = $this->load->database('mutu');
	}
	
	// function publik_from_file(){
	// 	$data = $this->mutu->query("
	// 		SELECT id_file_dokumen, id_asdok_dokumen, institusi, kd_fak, kd_prodi, is_public
	// 		FROM file_dokumen
	// 		WHERE is_public = '1'
	// 	")->result_array();

	// 	foreach ($data as $key2 => $value) {
	// 		$data2 = $this->mutu->query("
	// 			SELECT id_asdok_dokumen, id_aspek_dokumentasi, id_dokumen
	// 			FROM asdok_dokumen
	// 			WHERE id_asdok_dokumen = ".$value['id_asdok_dokumen']."
	// 		")->result_array();

	// 		foreach ($data2 as $key3 => $value) {
	// 			$data3 = $this->mutu->query("
	// 				SELECT id_aspek_dokumentasi, id_dokumentasi, id_aspek
	// 				FROM aspek_dokumentasi
	// 				WHERE id_aspek_dokumentasi = ".$value['id_aspek_dokumentasi']."
	// 			")->result_array();

	// 			foreach ($data3 as $key4 => $value) {
	// 				$data4 = $this->mutu->query("
	// 					SELECT id_dokumentasi, id_versi_akreditasi, id_jenis_akreditasi, is_public
	// 					FROM dokumentasi
	// 					WHERE id_dokumentasi = ".$value['id_dokumentasi']."
	// 				")->result_array();

	// 				foreach ($data4 as $key5 => $value) {
	// 					$data5 = $this->mutu->query("
	// 						SELECT id_versi_akreditasi, id_lembaga_akreditasi, id_jenis_akreditasi, kd_jenjang
	// 						FROM versi_akreditasi
	// 						WHERE id_versi_akreditasi = ".$value['id_versi_akreditasi']."
	// 					")->result_array();
						
	// 					$data4[$key5]['id_versi_akreditasi'] = $data5[0];
	// 					$data3[$key4]['id_dokumentasi'] = $data4[0];
	// 					$data2[$key3]['id_aspek_dokumentasi'] = $data3[0];
	// 					$data[$key2]['id_asdok_dokumen'] = $data2[0];
	// 				}
	// 			}
	// 		}
	// 	}

	// 	echo "<pre>";
	// 	print_r($data);
	// 	echo "</pre>";
	// }
	
	// TABEL DOKUMENTASI START
	function get_dokumentasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI DOKUMENSI PUBLIK
						$query = $this->info_publik->dokumentasi_publik()->result_array();
					break;
					case 2:
						// CARI DOKUMENSI PUBLIK BY ID VERSI AKREDITASI DAN ID JENIS AKREDITASI
						$query = $this->info_publik->dokumentasi_publik_by_versi_and_jenis($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL DOKUMENTASI END
	
	// TABEL FILE_DOKUMEN START
	function get_file_dokumen($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI FILE_DOKUMEN PUBLIK BY ID DOKUMENTASI
						$query = $this->info_publik->file_dokumen_publik_by_id_dokumentasi($api_search)->result_array();
					break;
					case 2:
						// CARI KD_FAKULTAS DENGAN FILE_DOKUMEN DAN DOKUMENTASI PUBLIK
						$query = $this->info_publik->kd_fakultas_publik()->result_array();
					break;
					case 3:
						// CARI KD_PRODI DENGAN FILE_DOKUMEN DAN DOKUMENTASI PUBLIK
						$query = $this->info_publik->kd_prodi_publik()->result_array();
					break;
					case 4:
						// CARI FILE_DOKUMEN PUBLIK BY ID ASDOK_DOKUMEN
						$query = $this->info_publik->file_dokumen_publik_by_id_asdok_dokumen($api_search)->result_array();
					break;
					case 5:
						// CARI FILE_DOKUMEN PUBLIK BY ID FILE_DOKUMEN
						$query = $this->info_publik->file_dokumen_publik_by_id_file_dokumen($api_search)->result_array();
					break;
					case 6:
						// CARI FILE_DOKUMEN PUBLIK BY ID ASDOK_DOKUMEN DAN KODE
						$query = $this->info_publik->file_dokumen_publik_by_id_asdok_dokumen_and_kode($api_search)->result_array();
					break;
					case 7:
						// CARI FILE_DOKUMEN ASESOR BY ID FILE_DOKUMEN
						$query = $this->info_publik->file_dokumen_asesor_by_id_file_dokumen($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL FILE_DOKUMEN END
	
	// TABEL LEMBAGA START
	function get_lembaga($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI LEMBAGA BY ID DOKUMENTASI
						$query = $this->info_publik->lembaga_by_id_dokumentasi($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL LEMBAGA END
	
	// TABEL VERSI_AKREDITASI START
	function get_versi_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI VERSI_AKREDITASI BY ID LEMBAGA AKREDITASI DIMANA MEMILIKI FILE_DOKUMEN PUBLIK
						$query = $this->info_publik->versi_akreditasi_by_lembaga_akreditasi_on_file_dokumen_publik($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL VERSI_AKREDITASI END
	
	// TABEL JENIS_AKREDITASI START
	function get_jenis_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI JENIS_AKREDITASI BY ID VERSI AKREDITASI DIMANA MEMILIKI FILE_DOKUMEN PUBLIK
						$query = $this->info_publik->jenis_akreditasi_by_versi_akreditasi_on_file_dokumen_publik($api_search)->result_array();
					break;
					case 2:
						// CARI JENIS_AKREDITASI BY ID VERSI AKREDITASI DIMANA MEMILIKI FILE_DOKUMEN PUBLIK V2
						$query = $this->info_publik->jenis_akreditasi_by_versi_akreditasi_on_file_dokumen_publik_v2($api_search)->result_array();
					break;
					case 3:
						// CARI JENIS_AKREDITASI BY ID JENIS AKREDITASI
						$query = $this->info_publik->jenis_akreditasi_by_jenis_akreditasi($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JENIS_AKREDITASI END
	
	// TABEL ASPEK_DOKUMENTASI START
	function get_aspek_dokumentasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI DISTINC STANDAR BY ID DOKUMENTASI DAN BERSIFAT PUBLIK SESUAI KD_FAKULTAS-PRODI
						$query = $this->info_publik->standar_by_dokumentasi_on_publik_and_kode($api_search)->result_array();
					break;
					case 2:
						// CARI ASPEK_DOKUMENTASI BY ID DOKUMENTASI DAN BERSIFAT PUBLIK
						$query = $this->info_publik->aspek_dokumentasi_by_dokumentasi_on_publik($api_search)->result_array();
					break;
					case 3:
						// CARI DISTINC STANDAR BY ID DOKUMENTASI
						$query = $this->info_publik->standar_by_dokumentasi($api_search)->result_array();
					break;
					case 4:
						// CARI DISTINC STANDAR BY ID DOKUMENTASI DENGAN NO. URUT
						$query = $this->info_publik->standar_by_dokumentasi_no_urut($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL ASPEK_DOKUMENTASI END
	
	// TABEL ASDOK_DOKUMEN START
	function get_asdok_dokumen($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI ASDOK_DOKUMEN BY ID ASPEK_OKUMENTASI DAN BERSIFAT PUBLIK
						$query = $this->info_publik->asdok_dokumen_by_aspek_dokumen_on_publik($api_search)->result_array();
					break;
					case 2:
						// CARI ASDOK_DOKUMEN BY ID ASPEK_OKUMENTASI DAN KODE DAN BERSIFAT PUBLIK
						$query = $this->info_publik->asdok_dokumen_by_aspek_dokumen_and_kode_on_publik($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL ASDOK_DOKUMEN END
	
	// TABEL DOKUMENTASI_PUBLIK START
	function get_dokumentasi_publik($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CEK PUBLIK OR NOT BY ID DOKUMENTASI
						$query = $this->info_publik->dokumentasi_publik_true($api_search)->result_array();
					break;
					case 2:
						// CEK PUBLIK OR NOT BY ID DOKUMENTASI, INSTITUSI, FAKULTAS, PRODI
						$query = $this->info_publik->dokumentasi_publik_true2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL DOKUMENTASI_PUBLIK END
	
	// TABEL ASDOK_DOKUMEN_TEKS START
	function get_asdok_dokumen_teks($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1:
				switch ($subkode) {
					case 1:
						// CARI TEKS BERDASARKAN ID_ASDOK_DOKUMEN DAN KODE
						$query = $this->info_publik->teks_asdok_dokumen_by_id_asdok_dokumen_and_kode($api_search)->result_array();
					break;
					case 2:
						// CARI TEKS BERDASARKAN ID_ASDOK_DOKUMEN DAN KODE TIPE 2
						$query = $this->info_publik->teks_asdok_dokumen_by_id_asdok_dokumen_and_kode2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL ASDOK_DOKUMEN_TEKS END
}
?>