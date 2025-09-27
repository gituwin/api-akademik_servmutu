<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_something extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_something/mdl_mutu_something', 'smth');
	}
	


function cek_nilai_harkat_yang_sesuai ($format = 'json')
	{
		
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		// return '$api_search';
		// die();
		switch ($kode) {
			case 354: //READ
				switch ($subkode) {
					case 313: // NO_URUT, NM_KSK WHERE ID_BORANG
						$query = $this->smth->cek_nilai_harkat_yang_sesuai($api_search)->result_array();
					break;
					case 314: // NO_URUT, NM_KSK WHERE ID_BORANG
						$query = $this->smth->cek_nilai_harkat_yang_sesuai_tr($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
// istilah doumentasi

function istlah_doumentasi($format = 'json'){
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	
	switch ($kode) {
		case 354: //READ
			switch ($subkode) {
				case 313: // NO_URUT, NM_KSK WHERE ID_BORANG
					$query = $this->smth->istlah_standard_dokumentasi($api_search)->result_array();
				break;
			}
		break;
	}
	$this->sia_api_lib_format->output($query, $format);
}
function cek_kriteria ($format = 'json'){
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	switch ($kode) {
		case 354: //READ
			switch ($subkode) {
				case 313: // NO_URUT, NM_KSK WHERE ID_BORANG
					$query = $this->smth->cek_kriteria($api_search)->result_array();
					// $query= $api_search;

				break;
			}
		break;
	}
	$this->sia_api_lib_format->output($query, $format);
}
	
	// TABEL borang, istilah
	function istlah_standard($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 354: //READ
				switch ($subkode) {
					case 313: // NO_URUT, NM_KSK WHERE ID_BORANG
						$query = $this->smth->istlah_standard($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

// TABEL borang, istilah
function istlah_standard_lkps($format = 'json'){
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	switch ($kode) {
		case 354: //READ
			switch ($subkode) {
				case 313: // NO_URUT, NM_KSK WHERE ID_BORANG
					$query = $this->smth->istlah_standard_lkps($api_search)->result_array();
					// $query= $api_search;
				break;
			}
		break;
	}
	$this->sia_api_lib_format->output($query, $format);
}

function istlah_standard_ipepa($format = 'json'){
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	switch ($kode) {
		case 354: //READ
			switch ($subkode) {
				case 313: // NO_URUT, NM_KSK WHERE ID_BORANG
					$query = $this->smth->istlah_standard_ipepa($api_search)->result_array();
					// $query= $api_search;
				break;
			}
		break;
	}
	$this->sia_api_lib_format->output($query, $format);
}

	function istlah_penilaian($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 354: //READ
				switch ($subkode) {
					case 313: // NO_URUT, NM_KSK WHERE ID_BORANG
						$query = $this->smth->istlah_penilaian($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI START
	function get_join_borang_versi_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // LEMBAGA AKREDITASI WHERE JENIS_AKREDITASI
						$query = $this->smth->join_b_va_1($api_search)->result_array();
					break;
					case 2: // VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG
						$query = $this->smth->join_b_va_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI END
	

	// TABEL JOIN lkps, VERSI_AKREDITASI START
	function get_join_lkps_versi_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // LEMBAGA AKREDITASI WHERE JENIS_AKREDITASI
						$query = $this->smth->join_lkps_va_1($api_search)->result_array();
					break;
					case 2: // VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG
						$query = $this->smth->join_lkps_va_2($api_search)->result_array();
					break;
					case 3: // VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG ipepa
						$query = $this->smth->join_lkps_va_2_ipepa($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN lkps, VERSI_AKREDITASI END

	// TABEL LEMBAGA_AKREDITASI START
	function get_lembaga_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_LEMBAGA_AKREDITASI
						$query = $this->smth->la_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL LEMBAGA_AKREDITASI END
	
	// TABEL VERSI_AKREDITASI START
	function get_versi_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_VERSI_AKREDITASI
						$query = $this->smth->va_1($api_search)->result_array();
					break;
          case 2: // Hanya Monitoring
						$query = $this->smth->va_monitoring($api_search)->result_array();
					break;
          case 3: // Hanya AMI
						$query = $this->smth->va_ami($api_search)->result_array();
					break;
          case 4: // Hanya Evaluasi
						$query = $this->smth->va_evaluasi($api_search)->result_array();
					break;
          case 5: // Hanya ATL
						$query = $this->smth->va_atl($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL VERSI_AKREDITASI END
	
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI START
	function get_join_versi_akreditasi_jenis_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_VERSI_AKREDITASI
						$query = $this->smth->join_va_ja_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI END
	
	// TABEL BORANG START
	function get_borang($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
						$query = $this->smth->b_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL BORANG END
	
	// TABEL BORANG START
	function get_lkps($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
						$query = $this->smth->lkps_1($api_search)->result_array();
					break;
					case 2: // ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
						$query = $this->smth->ipepa_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL BORANG END

	// TABEL JENIS_AKREDITASI START
	function get_jenis_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_JENIS_AKREDITASI
						$query = $this->smth->ja_1($api_search)->result_array();
						case 2: // SEMUA WHERE ID_JENIS_AKREDITASI
							$query = $this->smth->ja_1aa($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JENIS_AKREDITASI END
	
	// TABEL JOIN BORANG, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function get_join_lkps_versi_akreditasi_jenis_akreditasi_lembaga_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
						$query = $this->smth->join_lkps_va_ja_la_1($api_search)->result_array();
					break;
					case 2: // SEMUA WHERE ID_BORANG
						$query = $this->smth->join_lkps_va_ja_la_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END

	// TABEL JOIN IPEPA, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function get_join_ipepa_versi_akreditasi_jenis_akreditasi_lembaga_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
						$query = $this->smth->join_ipepa_va_ja_la_1($api_search)->result_array();
					break;
					case 2: // SEMUA WHERE ID_IPEPA
						$query = $this->smth->join_ipepa_va_ja_la_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN IPEPA, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END

// TABEL JOIN BORANG, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
function get_join_borang_versi_akreditasi_jenis_akreditasi_lembaga_akreditasi($format = 'json'){
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	// return $api_search;
	// die();
	switch ($kode) {
		case 1: //READ
			switch ($subkode) {
				case 1: // SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
					$query = $this->smth->join_b_va_ja_la_1($api_search)->result_array();
				break;
				case 2: // SEMUA WHERE ID_BORANG
					$query = $this->smth->join_b_va_ja_la_2($api_search)->result_array();
				break;
				case 3: // SEMUA WHERE ID_BORANG
					$query = $this->smth->join_b_va_ja_la_1a($api_search)->result_array();
				break;
			}
		break;
	}
	$this->sia_api_lib_format->output($query, $format);
}
// TABEL JOIN BORANG, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END
	
	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI START
	function get_join_dokumentasi_versi_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // LEMBAGA AKREDITASI WHERE JENIS_AKREDITASI
						$query = $this->smth->join_dts_va_1($api_search)->result_array();
					break;
					case 2: // VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG
						$query = $this->smth->join_dts_va_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI END
	
	// TABEL DOKUMENTASI START
	function get_dokumentasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
						$query = $this->smth->dts_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL DOKUMENTASI END
	
	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function get_join_dokumentasi_versi_akreditasi_jenis_akreditasi_lembaga_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
						$query = $this->smth->join_dts_va_ja_la_1($api_search)->result_array();
					break;
					case 2: // SEMUA WHERE ID_DOKUMENTASI
						$query = $this->smth->join_dts_va_ja_la_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END
	
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function get_join_versi_akreditasi_jenis_akreditasi_lembaga_akreditasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_VERSI_AKREDITASI
						$query = $this->smth->join_va_ja_la_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END
	
	// TABEL T_ATUR_NM_TAMPILAN START
	function get_t_atur_nm_tampilan($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA WHERE ID_BORANG, INSTITUSI, KD_FAK, KD_PRODI
						$query = $this->smth->tant_1($api_search)->result_array();
					break;
					case 2: // SEMUA WHERE ID_BORANG, LOKASI_TAMPIL, INSTITUSI, KD_FAK, KD_PRODI
						$query = $this->smth->tant_2($api_search)->result_array();
					break;
					case 3: // SEMUA WHERE ID_DOKUMENTASI, INSTITUSI, KD_FAK, KD_PRODI
						$query = $this->smth->tant_3($api_search)->result_array();
					break;
					case 4: // SEMUA WHERE ID_DOKUMENTASI, LOKASI_TAMPIL, INSTITUSI, KD_FAK, KD_PRODI
						$query = $this->smth->tant_4($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL T_ATUR_NM_TAMPILAN END
	
	// TABEL JOIN ITEM_BORANG, KSK START
	function get_join_item_borang_ksk($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // NO_URUT, NM_KSK WHERE ID_BORANG
						$query = $this->smth->join_it_k_1($api_search)->result_array();
					case 2:
						$query = $this->smth->join_it_k_1_test($api_search)->result_array();
						$temp_query=array();
						$no_urut=1;

						if (!empty($query)) {
							foreach ($query as $key ) {
								if (!isset($temp_query[$key['id_ksk']])) {
								    $key['no_urut']=$no_urut;
									$temp_query[$key['id_ksk']]=$key;
									$no_urut++;
								}
								
								
							}

							$query=$temp_query;
						}
					break;

				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	function get_join_item_borang_ksk_a($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // NO_URUT, NM_KSK WHERE ID_BORANG
						$query = $this->smth->join_it_k_1($api_search)->result_array();
						break;
					case 2:
						$query = $this->smth->join_it_k_1_test($api_search)->result_array();
						// $temp_query=array();
						// $no_urut=1;

						// if (!empty($query)) {
						// 	foreach ($query as $key ) {
						// 		if (!isset($temp_query[$key['id_ksk']])) {
						// 		    $key['no_urut']=$no_urut;
						// 			$temp_query[$key['id_ksk']]=$key;
						// 			$no_urut++;
						// 		}
								
								
						// 	}

						// 	$query=$temp_query;
						// }
					break;

					
					case 3:
						$query = $this->smth->join_it_k_1_ami($api_search)->result_array();



						break;

				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN ITEM_BORANG, KSK END


		// TABEL JOIN ITEM_lkps, KSK START
		function get_join_item_lkps_ksk($format = 'json'){
			$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
			$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
			$api_search = $this->input->post('api_search');
			switch ($kode) {
				case 1: //READ
					switch ($subkode) {
						case 1: // NO_URUT, NM_KSK WHERE ID_lkps
							$query = $this->smth->lkps_join_it_k_1($api_search)->result_array();
						break;
						case 2:
							// NB : KALAU DATA NYA DUPLKAT, DI CONTROLLER API NYA DISAMAKAN SAMA KAYAK YANG BORANG (DI DISTINCT DI PHP NYA)
							$query = $this->smth->lkps_join_it_k_1_v2($api_search)->result_array();
						break;
					}
				break;
			}
			$this->sia_api_lib_format->output($query, $format);
		}
		// TABEL JOIN ITEM_lkps, KSK END

		// TABEL JOIN ITEM_ipepa, KSK START
		function get_join_item_ipepa_ksk($format = 'json'){
			$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
			$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
			$api_search = $this->input->post('api_search');
			switch ($kode) {
				case 1: //READ
					switch ($subkode) {
						case 1: // NO_URUT, NM_KSK WHERE ID_ipepa
							$query = $this->smth->ipepa_join_it_k_1($api_search)->result_array();
						break;
						case 2:
							// NB : KALAU DATA NYA DUPLKAT, DI CONTROLLER API NYA DISAMAKAN SAMA KAYAK YANG BORANG (DI DISTINCT DI PHP NYA)
							$query = $this->smth->ipepa_join_it_k_1_v2($api_search)->result_array();
						break;
					}
				break;
			}
			$this->sia_api_lib_format->output($query, $format);
		}
		// TABEL JOIN ITEM_lkps, KSK END
	
	// TABEL ITEM_BORANG
	function get_item_borang($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ID_ITEM_BORANG, ID_BORANG, NO_URUT WHERE ID_BORANG, NO_URUT <=
						$query = $this->smth->ib_1($api_search)->result_array();
					break;
					case 2: // ID_ITEM_BORANG, ID_BORANG, NO_URUT WHERE ID_BORANG, NO_URUT >=
						$query = $this->smth->ib_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL ITEM_BORANG
	

// TABEL ITEM_lkps
function get_item_lkps($format = 'json'){
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	switch ($kode) {
		case 1: //READ
			switch ($subkode) {
				case 1: // ID_ITEM_lkps, ID_lkps, NO_URUT WHERE ID_lkps, NO_URUT <=
					$query = $this->smth->ibb_1($api_search)->result_array();
				break;
				case 2: // ID_ITEM_lkps, ID_lkps, NO_URUT WHERE ID_lkps, NO_URUT >=
					$query = $this->smth->ibb_2($api_search)->result_array();
				break;
			}
		break;
	}
	$this->sia_api_lib_format->output($query, $format);
}
// TABEL ITEM_lkps

// TABEL ITEM_ipepa
function get_item_ipepa($format = 'json'){
	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
	$api_search = $this->input->post('api_search');
	switch ($kode) {
		case 1: //READ
			switch ($subkode) {
				case 1: // ID_ITEM_ipepa, ID_ipepa, NO_URUT WHERE ID_lkps, NO_URUT <=
					$query = $this->smth->item_ipepa_1($api_search)->result_array();
				break;
				case 2: // ID_ITEM_ipepa, ID_ipepa, NO_URUT WHERE ID_lkps, NO_URUT >=
					$query = $this->smth->item_ipepa_2($api_search)->result_array();
				break;
			}
		break;
	}
	$this->sia_api_lib_format->output($query, $format);
}
// TABEL ITEM_ipepa

	// TABEL ASPEK_PENILAIAN
	function get_aspek_penilaian($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ID_ASPEK_PENILAIAN, ID_PENILAIAN, NO_URUT WHERE ID_PENILAIAN, NO_URUT <=
						$query = $this->smth->ap_1($api_search)->result_array();
					break;
					case 2: // ID_ASPEK_PENILAIAN, ID_PENILAIAN, NO_URUT WHERE ID_PENILAIAN, NO_URUT >=
						$query = $this->smth->ap_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL ASPEK_PENILAIAN
	
	// TABEL ASPEK_DOKUMENTASI
	function get_aspek_dokuemntasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ID_ASPEK_DOKUMENTASI, ID_DOKUMENTASI, NO_URUT WHERE ID_DOKUMENTASI, NO_URUT <=
						$query = $this->smth->ad_1($api_search)->result_array();
					break;
					case 2: // ID_ASPEK_DOKUMENTASI, ID_DOKUMENTASI, NO_URUT WHERE ID_DOKUMENTASI, NO_URUT >=
						$query = $this->smth->ad_2($api_search)->result_array();
					break;
					case 3: // NO_URUT, NO_STANDAR, NM_KSK WHERE ID_DOKUMENTASI
						$query = $this->smth->ad_3($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL ASPEK_DOKUMENTASI
	
	// TABEL ASDOK_DOKUMEN
	function get_asdok_dokumen($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ID_ASDOK_DOKUMEN, ID_ASPEK_DOKUMENTASI, NO_URUT WHERE ID_ASPEK_DOKUMENTASI, NO_URUT <=
						$query = $this->smth->asd_1($api_search)->result_array();
					break;
					case 2: // ID_ASDOK_DOKUMEN, ID_ASPEK_DOKUMENTASI, NO_URUT WHERE ID_ASPEK_DOKUMENTASI, NO_URUT >=
						$query = $this->smth->asd_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL ASDOK_DOKUMEN
	
	// TABEL FILE_BORANG START
	function get_file_lkps($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA KECUALI FILE_BORANG WHERE ID_BORANG
						$query = $this->smth->flkps_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL FILE_BORANG END

	// TABEL FILE_BORANG START
	function get_file_ipepa($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // SEMUA KECUALI FILE_BORANG WHERE ID_BORANG
						// $query = $this->smth->flkps_1($api_search)->result_array();
						$query = array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL FILE_BORANG END
	
	// TABEL JOIN ASPEK_DOKUMENTASI, KSK START
	function get_join_aspek_dokumentasi_ksk($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // NO_URUT, NO_STANDAR, NM_KSK WHERE ID_DOKUMENTASI
						$query = $this->smth->join_ad_k_1($api_search)->result_array();
					break;
					case 2: // NO_URUT, NO_STANDAR, NM_KSK WHERE ID_DOKUMENTASI IN ASDOK_DOKUMEN
						$query = $this->smth->join_ad_k_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN ASPEK_DOKUMENTASI, KSK END
	
	// TABEL JOIN CARI_FILE_DOKUMENTASI START
	function get_cari_file_dokumentasi($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // FILE_DOKUMEN IN ASDOK_DOKUMEN IN ASPEK_DOKUMENTASI WHERE institusi, kd_fak, kd_prodi, id_dokumentasi, no_standar
						$query = $this->smth->cfd_1($api_search)->result_array();
					break;
					case 2: // COUNT FILE_DOKUMEN IN ASDOK_DOKUMEN IN ASPEK_DOKUMENTASI WHERE institusi, kd_fak, kd_prodi, id_dokumentasi, no_standar
						$query = $this->smth->cfd_2($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN CARI_FILE_DOKUMENTASI END
	
	// TABEL JOIN ASPEK_DOKUMENTASI_V START
	function get_aspek_dokumentasi_v($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ASPEK_DOKUMENTASI_V WHERE ID_DOKUMENTASI, NO_STANDAR IN ASDOK_DOKUMEN IN LINK_SAPTO
						$query = $this->smth->adv_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN ASPEK_DOKUMENTASI_V END
	
	// TABEL JOIN ASDOK_DOKUMEN_V START
	function get_asdok_dokumen_v($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //READ
				switch ($subkode) {
					case 1: // ASDOK_DOKUMEN_V WHERE ID_ASPEK_DOKUMENTASI IN LINK_SAPTO
						$query = $this->smth->asdv_1($api_search)->result_array();
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	// TABEL JOIN ASDOK_DOKUMEN_V END
}
?>