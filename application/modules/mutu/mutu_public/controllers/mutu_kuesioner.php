<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_kuesioner extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_kuesioner/mdl_kuesioner', 'mdl_kuesioner');
	}
	
	/*function ksk_borang($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 2001: switch($subkode){
				default:
					case 1: $query = $this->mdl_2001->ksk_borang($api_search[0]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}*/

	function get_data($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1001: switch($subkode){
				default:
					// case 1: $query = $this->mdl_1001->get_data($api_search[0]); break;
					// case 2: $query = $this->mdl_1001->get_data_v2($api_search[0]); break;
					case 3: $query = $this->mdl_kuesioner->get_data_kuesioner($api_search[0]); break;
					// case 4: $query = $this->mdl_kuesioner->test(); break;


			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	//danang aji bimantoro 2020-11-17
	function get_status_isi_kuesioner($format = 'json'){
		$api_search = $this->input->post('api_search');
		$id_user = $api_search[0];
		$status = $api_search[1]; //4:mahasiswa;  2:dosen;  3:tendik;

		$result = array();
		$status_kuesioner = 0;
		$progres_pengisian = 0;
		$status_pengisian = 1;

		$kuesioner = $this->mdl_kuesioner->get_data_pelaksanaan_kuesioner_view($status);

		if(!empty($kuesioner)){
			$status_kuesioner = 1;
			foreach ($kuesioner as $key => $value) {
				$isian = $this->mdl_kuesioner->cek_pengisian_kuesioner_responden_view($id_user, $value['id_periode_pelaksanaan']);
				if(!empty($isian)){
					$progres_pengisian = 1;
				}else{
					$status_pengisian = 0;
				}
			}
		}

		$result = array(
			'id_user' => $id_user,
			'status_kuesioner' => $status_kuesioner,
			'progres_pengisian' => $progres_pengisian,
			'status_pengisian' => $status_pengisian
		);

		$this->sia_api_lib_format->output($result, $format);


	}
	//danang aji bimantoro [ end ]

	//danang aji bimanotoro 2023-02-27
	function get_data_nilai_akhir($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_nilai_akhir($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	
	function get_data_nilai_akhir_mahasiswa($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_nilai_akhir_mahasiswa($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}


	public function unit($format = 'json'){
		$query = $this->mdl_kuesioner->unit();
		$this->sia_api_lib_format->output($query, $format);
		
	}
	public function idpengaturan_susunan_soal($format='json')
	{
		$api_search= $this->input->post('api_search');

		$query=$this->mdl_kuesioner->idpengaturan_susunan_soal($api_search[0], $api_search[1], $api_search[2],$api_search[3], $api_search[1], $api_search[2],$api_search[2]);
		$this->sia_api_lib_format->output($query,$format);
	}
	public function testing(){
		echo "halo kak";
		
	}
	public function test_data($format = 'json'){
		$query = $this->mdl_kuesioner->test();
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_data_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_data_kuesioner($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_data_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_data_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_master_kuesioner($format = 'json'){
		$query = $this->mdl_kuesioner->get_master_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jenis_kuesioner($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_jenis_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_data_jenis_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_data_jenis_kuesioner($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_jenis_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_jenis_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_data_jenis_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_data_jenis_kuesioner($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_jenis_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_jenis_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_jenis_jawaban($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_jenis_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_pertanyaan($format='json'){
		$query = $this->mdl_kuesioner->get_data_pertanyaan();
		$this->sia_api_lib_format->output($query, $format);	
	}
	function tambah_data_pertanyaan($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_data_pertanyaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_pertanyaan($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_pertanyaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_data_pertanyaan($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_data_pertanyaan($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_pertanyaan($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_pertanyaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_jawaban($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jawaban($format='json'){
		$query = $this->mdl_kuesioner->get_data_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_data_jawaban($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_data_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_jawaban($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_data_jawaban($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_data_jawaban($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_input_pilihan($format = 'json'){
		$query = $this->mdl_kuesioner->get_input_pilihan();
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jenis_jawaban($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_jenis_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_data_jenis_jawaban($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_data_jenis_jawaban($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_jenis_jawaban($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_jenis_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_m_detail_jenis_jawaban_by_id_insert($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_m_detail_jenis_jawaban_by_id_insert($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_m_detail_jenis_jawaban_by_id($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_m_detail_jenis_jawaban_by_id($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_data_jenis_jawaban($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_data_jenis_jawaban($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_detail_jenis_jawaban($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_detail_jenis_jawaban($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_detail_jenis_jawaban($format='json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_detail_jenis_jawaban($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_detail_jenis_jawaban($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_detail_jenis_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_distinct_id_jenis_jawaban($format = 'json'){
		$query = $this->mdl_kuesioner->get_distinct_id_jenis_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_detail_jenis_jawaban($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_detail_jenis_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_nama_jenis_jawaban($format = 'json'){
		$query = $this->mdl_kuesioner->get_nama_jenis_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_detail_jenis_jawaban($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_detail_jenis_jawaban($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function kelompok_soal($format = 'json'){
		$query = $this->mdl_kuesioner->kelompok_soal();
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_data_kelompok_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_data_kelompok_soal($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_kelompok_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_kelompok_soal($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_data_kelompok_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_data_kelompok_soal($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function delete_data_kelompok_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->delete_data_kelompok_soal($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function getData($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->getData($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordCount($format = 'json'){
		$query = $this->mdl_kuesioner->getrecordCount();
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordPertanyaan($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1: switch($subkode){
				case 1: $query = $this->mdl_kuesioner->getrecordCountPertanyaan(); break;
				case 2: $query = $this->mdl_kuesioner->getDataPertanyaan($api_search[0], $api_search[1]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordKelompokSoal($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1: switch($subkode){
				case 1: $query = $this->mdl_kuesioner->getrecordCountKelompokSoal(); break;
				case 2: $query = $this->mdl_kuesioner->getDataKelompokSoal($api_search[0], $api_search[1]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordJawaban($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1: switch($subkode){
				case 1: $query = $this->mdl_kuesioner->getrecordCountJawaban(); break;
				case 2: $query = $this->mdl_kuesioner->getDataJawaban($api_search[0], $api_search[1]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordMKuesioner($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1: switch($subkode){
				case 1: $query = $this->mdl_kuesioner->getrecordCountMKuseioner(); break;
				case 2: $query = $this->mdl_kuesioner->getDataMKuesioner($api_search[0], $api_search[1]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordMJenisKuesioner($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1: switch($subkode){
				case 1: $query = $this->mdl_kuesioner->getrecordCountMJenisKuseioner(); break;
				case 2: $query = $this->mdl_kuesioner->getDataMJenisKuesioner($api_search[0], $api_search[1]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordJenisJawaban($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1: switch($subkode){
				case 1: $query = $this->mdl_kuesioner->getrecordCountJenisJawaban(); break;
				case 2: $query = $this->mdl_kuesioner->getDataJenisJawaban($api_search[0], $api_search[1]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function getrecordPelaksanaan($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch($kode){
			case 1: switch($subkode){
				case 1: $query = $this->mdl_kuesioner->getrecordCountPelaksanaan(); break;
				case 2: $query = $this->mdl_kuesioner->getDataPelaksanaan($api_search[0], $api_search[1]); break;
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_unit_by_id($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_unit_by_id($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_pengaturan_susunan_soal_by_id($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_pengaturan_susunan_soal_by_id($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_unit_by_id_susunan_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_unit_by_id_susunan_soal($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_pengaturan_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_pengaturan_soal($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function delete_relasi_soal_unit2($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->delete_relasi_soal_unit2($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_relasi_soal_unit($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_relasi_soal_unit($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_pengaturan_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_pengaturan_soal($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_pengaturan_soal_v2($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_pengaturan_soal_v2($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function cek_max_id_susunan_soal($format = 'json'){
		$query = $this->mdl_kuesioner->cek_max_id_susunan_soal();
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_pengaturan_susunan_soal($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_pengaturan_susunan_soal($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_pelaksanaan_kuesioner($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_pelaksanaan_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_edit_pelaksanaan_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_edit_pelaksanaan_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_data_pelaksanaan_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_data_pelaksanaan_kuesioner($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function update_data_pelaksanaan_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->update_data_pelaksanaan_kuesioner($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_hapus_pelaksanaan_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_hapus_pelaksanaan_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_pelaksanaan_kuesioner_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_pelaksanaan_kuesioner_view($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_pelaksanaan_kuesioner_unit_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_pelaksanaan_kuesioner_unit_view($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_susunan_soal_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_susunan_soal_view($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_rincian_pilihan_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rincian_pilihan_view($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_unit_terkait_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_unit_terkait_view($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_akses_kuesioner_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_akses_kuesioner_view($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function cek_pelaksanaan_kuesioner_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->cek_pelaksanaan_kuesioner_view($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function cek_pengisian_kuesioner_responden_view($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->cek_pengisian_kuesioner_responden_view($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function insert_jawaban_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->insert_jawaban_kuesioner($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_id_periode_pelaksanaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_id_periode_pelaksanaan($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jawab_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_jawab_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jawab_kuesioner_custom($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_jawab_kuesioner_custom($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jawab_kuesioner_per_nip($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_jawab_kuesioner_per_nip($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_pertanyaan_kuesioner_per_nip($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_pertanyaan_kuesioner_per_nip($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jenis_responden($format = 'json'){
		//$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_jenis_responden();
		$this->sia_api_lib_format->output($query, $format);
	}
	function cek_max_id_pelaksanaan_kuesioner($format = 'json'){
		//$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->cek_max_id_pelaksanaan_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_user_akses_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_user_akses_kuesioner($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_user_akses_kuesioner_by_id($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_user_akses_kuesioner_by_id($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jenis_responden_multiple_by_id_periode_pelaksanaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_jenis_responden_multiple_by_id_periode_pelaksanaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function delete_relasi_pelaksanaan_responden2($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->delete_relasi_pelaksanaan_responden2($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function tambah_relasi_pelaksanaan_responden($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->tambah_relasi_pelaksanaan_responden($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_id_jenis_kuesioner_from_tbl_pelaksanaan_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_id_jenis_kuesioner_from_tbl_pelaksanaan_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_id_jenis_responden_from_tbl_user_akses_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_id_jenis_responden_from_tbl_user_akses_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_id_jenis_kuesioner_by_id_periode_pelaksanaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_id_jenis_kuesioner_by_id_periode_pelaksanaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_total_pertanyaan_per_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_total_pertanyaan_per_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	function get_data_jenis_kuesioner_by_id_jenis_kuesioner($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_jenis_kuesioner_by_id_jenis_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_isian_kuesioner($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_isian_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_isian_kuesioner_tata_pamong($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_isian_kuesioner_tata_pamong();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_isian_kuesioner_sdm($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_isian_kuesioner_sdm();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_isian_kuesioner_keuangan($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_isian_kuesioner_keuangan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_isian_kuesioner_penelitian($format = 'json'){
		$query = $this->mdl_kuesioner->get_data_isian_kuesioner_penelitian();
		$this->sia_api_lib_format->output($query, $format);
	}



	//DANANG NAMBAG
	public function get_master_jenis_kuesioner_by_id_kuesioner($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_master_jenis_kuesioner_by_id_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_master_subjenis_kuesioner_by_id_jenis_kuesioner($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_master_subjenis_kuesioner_by_id_jenis_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function add_master_subjenis_kuesioner($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->add_master_subjenis_kuesioner($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function del_master_subjenis_kuesioner($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->del_master_subjenis_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}


	public function get_status_pengisian($format = 'json'){
		$api_search = $this->input->post('api_search');
		if(isset($api_search[5])){
			$query = $this->mdl_kuesioner->get_status_pengisian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		}else{
			$query = $this->mdl_kuesioner->get_status_pengisian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		}
		// $query = $api_search;
		$this->sia_api_lib_format->output($query, $format);
	}


	public function get_jenis_jawaban_rekap($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_jenis_jawaban_rekap($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_detail_jawaban_rekap($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_detail_jawaban_rekap($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}


	//danang aji bimantoro 2021/03/29
	public function get_data_rekap_kuesioner($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_rekap_kuesioner($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_data_rekap_kuesioner_by_id_user($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_rekap_kuesioner_by_id_user($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function add_data_rekap_kuesioner($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->add_data_rekap_kuesioner($api_search);
		$this->sia_api_lib_format->output($query, $format);
	}

	//ini info untuk get filter form :
	public function get_info_master_survey($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_info_master_survey($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_info_master_survey_mutu($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_info_master_survey_mutu($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_master_jawaban_survey($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_master_jawaban_survey($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_info_periode_pengisian_survey($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_info_periode_pengisian_survey($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_ori($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_ori($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_detail_univ($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_detail_univ($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey($api_search[0], $api_search[1], $api_search[2], $api_search[3],$api_search[4] );
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_univ($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_univ($api_search[0], $api_search[1], $api_search[2], $api_search[3] );
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_unit($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_unit($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}


	public function get_rekap_pengisian_survey_unitt($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_unitt($api_search[0], $api_search[1], $api_search[2], $api_search[3],$api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_fakultas($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_fakultas($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_prodi($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_prodi($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_prodi_laporan($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_prodi_laporan($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_rekap_pengisian_survey_prodi_lkps($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_rekap_pengisian_survey_prodi_lkps($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	//danang aji bimantoro [ end ]









	// nambah lucky

	public function jenis_kuesionerk($format='json')
	{
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->jenis_kuesionerk();
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_data_grfk_luc($format='json')
	{
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_data_grfk_luc($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_master_jawaban_survey_q($format='json')
	{
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_master_jawaban_survey_q($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_tahun_pelaksanaan($format='json')
	{
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_tahun_pelaksanaan();
		$this->sia_api_lib_format->output($query, $format);
	}

	public function dt_trend_grafik($format='json')
	{
		
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->grafik_trend($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function get_info_periode_pengisian_survey_br($format = 'json'){
		$api_search = $this->input->post('api_search');
		$query = $this->mdl_kuesioner->get_info_periode_pengisian_survey_br($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
}
?>