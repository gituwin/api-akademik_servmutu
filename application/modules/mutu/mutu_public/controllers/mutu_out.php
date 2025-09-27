<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Mutu_out extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
		$this->load->model('mutu_out/mdl_mutu_out', 'out');
    }
    

    public function dt_akreditasi($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1111:
				switch ($subkode) {
					case 99:
						$query = $this->out->akreditasi_dng($api_search[0]);//kode prodi
                        // $query = array('aaa' =>$api_search , );
						break;
						case 999:
							$query = $this->out->cek_sink_ter($api_search[0],$api_search[1],$api_search[2]);
							// $query = array('aaa' =>$api_search , );

						break;
						case 7:
							$query = $this->out->tampilkan_data_mhs_lulusan($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
						break;

						case 8:
							$query= $this->out->requestan_huda();
							break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function data_ipepa($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1201:
			switch($subkode){
				case 1:
					$query = $this->out->tampilkan_jumlah_mahasiswa_aktif($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 2:
					$query = $this->out->tampilkan_data_mhs_asing($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $tahun
				break;
				case 22:
					$query = $this->out->tampilkan_semua_data_mhs_asing($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $tahun
				break;
				case 3:
					$query = $this->out->tampilkan_data_dosen_tetap($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 31:
					$query = $this->out->tampilkan_semua_data_dosen_tetap($api_search[0], $api_search[1],$api_search[2],$api_search[3]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 32:
					$query = $this->out->tampilkan_matakuliah_dosen_tetap($api_search[0], $api_search[1], $api_search[2], $api_search[3]); //$id_prodi, $sia_pddikti, $ts, $nidn
				break;
				case 4:
					$query = $this->out->tampilkan_data_dosen_tidak_tetap($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 41:
					$query = $this->out->tampilkan_semua_data_dosen_tidak_tetap($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 42:
					$query = $this->out->tampilkan_matakuliah_dosen_tidak_tetap($api_search[0], $api_search[1], $api_search[2], $api_search[3]); //$id_prodi, $sia_pddikti, $ts, $nidn
				break;
				case 5:
					$query = $this->out->tampilkan_data_ipk_lulusan($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 51:
					$query = $this->out->tampilkan_semua_data_ipk_lulusan($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 52:
					$query = $this->out->tampilkan_detail_data_ipk_lulusan($api_search[0], $api_search[1], $api_search[2], $api_search[3]); //$id_prodi, $sia_pddikti, $ts, $ts_lulus
				break;
				case 6:
					$query = $this->out->tampilkan_data_kohort_lulusan_prodi($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 61:
					$query = $this->out->tampilkan_semua_data_kohort_lulusan_prodi($api_search[0], $api_search[1], $api_search[2] , $api_search[3]); //$id_prodi, $sia_pddikti, $ts
				break;
				case 62:
					$query = $this->out->tampilkan_data_total_mhs_lulusan($api_search[0], $api_search[1], $api_search[2]); //$id_prodi, $sia_pddikti, $ts
				break;
				
			
			}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

}

/* End of file Mutu_out.php */








?>