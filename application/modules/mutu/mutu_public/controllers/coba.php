<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';


class Cobad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}

	function index(){
		echo 'max_execution_time = '.ini_get('max_execution_time').' second';
		echo "<br>";
		echo 'max_input_time = '.ini_get('max_input_time').' second';
		echo "<br>";
		echo 'max_input_vars = '.ini_get('max_input_vars').' var';
		echo "<br>";
		echo 'memory_limit = '.ini_get('memory_limit');
		echo "<br>";
		echo 'post_max_size = '.ini_get('post_max_size');
		echo "<br>";
		echo 'upload_max_filesize = '.ini_get('upload_max_filesize');
		echo "<br>";
		echo 'max_file_uploads = '.ini_get('max_file_uploads').' file';
	}

	// function fauzi_tes(){
	// 	if (!isset($_FILES['file'])) {
			// echo 'max_execution_time = '.ini_get('max_execution_time').' second';
			// echo "<br>";
			// echo 'max_input_time = '.ini_get('max_input_time').' second';
			// echo "<br>";
			// echo 'max_input_vars = '.ini_get('max_input_vars').' var';
			// echo "<br>";
			// echo 'memory_limit = '.ini_get('memory_limit');
			// echo "<br>";
			// echo 'post_max_size = '.ini_get('post_max_size');
			// echo "<br>";
			// echo 'upload_max_filesize = '.ini_get('upload_max_filesize');
			// echo "<br>";
			// echo 'max_file_uploads = '.ini_get('max_file_uploads').' file';
		// 	echo "<form method='POST' enctype='multipart/form-data'>";
		// 	echo "<input name='file' type='file'>";
		// 	echo "<button type='submit'>Send</button>";
		// 	echo "</form>";
		// }
		// else {
			// $file = $_FILES['file'];
			// echo strlen(file_get_contents($file['tmp_name']));
			// echo "<br>";
			// echo $file['size'];
			// echo "<br>";
			// $array = array('file' => base64_encode(file_get_contents($file['tmp_name'])));
			// print_r($array);
	// 		$nama = $_FILES['file']['name'];
	// 		$dokumen = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
	// 		$tipe = $_FILES['file']['type'];
	// 		if (!empty($dokumen)) {
	// 			$query = $this->db->query("
	// 				INSERT INTO coba
	// 				(nama, dokumen, tipe)
	// 				VALUES
	// 				('".$nama."', '".$dokumen."', '".$tipe."')
	// 			");
	// 		}
	// 	}

	// 	$file = $this->mutu->query("
	// 		SELECT *
	// 		FROM coba
	// 	")->result_array();
	// 	echo "<table>";
	// 	echo "<tr>";
	// 	echo "<th>ID</th>";
	// 	echo "<th>NAMA</th>";
	// 	echo "<th>FILE</th>";
	// 	echo "</tr>";
	// 	foreach ($file as $key => $value) {
	// 	echo "<tr>";
	// 	echo "<td>".$value['id_coba']."</td>";
	// 	echo "<td>".$value['nama']."</td>";
	// 	echo "<td><a href='http://service.uin-suka.ac.id/servmutu/mutu_public/coba/fauzi_download/".$value['id_coba']."'>Download</a></td>";
	// 	echo "</tr>";
	// 	}
	// 	echo "</table>";
	// }

	// public function fauzi_download($id)
	// {
	// 	$get_file = $this->mutu->query("
	// 		SELECT *
	// 		FROM coba
	// 		WHERE id_coba = ".$id."
	// 	")->row_array();
	// 	if(!empty($get_file['dokumen'])){
	// 		header('Content-Type: '.$get_file['tipe']);
	// 		echo base64_decode($get_file['dokumen']);
	// 	}else{
	// 		redirect();
	// 	}
	// }

	// public function fauzi_querynya_toni()
	// {
	// 	$data = $this->mutu->query("
	// 		SELECT DISTINCT nm_sumber_dana
	// 		FROM realisasi_penerimaan_v
	// 	")->result_array();
	// 	foreach ($data as $key => $value) {
	// 		$data[$key]['jenis_dana'] = $this->mutu->query("
	// 			SELECT DISTINCT jenis_dana
	// 			FROM realisasi_penerimaan_v
	// 			WHERE nm_sumber_dana = '".$value['nm_sumber_dana']."'
	// 		")->result_array();
	// 		foreach ($data[$key]['jenis_dana'] as $key2 => $value2) {
	// 			$data[$key]['jenis_dana'][$key2]['data'] = $this->mutu->query("
	// 				SELECT id_realisasi_penerimaan, tahun, jml_dana
	// 				FROM realisasi_penerimaan_v
	// 				WHERE nm_sumber_dana = '".$value['nm_sumber_dana']."'
	// 				AND jenis_dana = '".$value2['jenis_dana']."'
	// 			")->result_array();
	// 		}
	// 	}
	// 	echo "<pre>";
	// 	print_r($data);
	// 	echo "</pre>";
	// }

	/*public function pemindahan(){
		$data_ = $this->mutu->query("
			SELECT *
			FROM tmp_keu_guna_dana_ppm_fauzi_publikasi
			WHERE nip = ''
			AND jenis = '5'
		")->result_array();
		if (!empty($data_)) {
			// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '' AND kd_karya_jenis = 3;<br>";
			// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '' AND kd_karya_jenis = 1;<br>";
			// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '' AND kd_karya_jenis = 18;<br>";
			// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '' AND kd_karya_jenis = 21;<br>";
			// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '' AND kd_karya_jenis = 24;<br>";
			// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '' AND kd_karya_jenis = 22;<br>";
			foreach ($data_ as $key => $value) {
				// INSERT INTO public.tmp_keu_guna_dana_ppm_fauzi(nip, nm_ppm, tgl_guna_ppm, jml_guna_ppm, kd_jenis_g, nm_karya_d, tgl_karya_d, kd_karya_jenis, kd_karya_penghargaan, tgl_karya_penghargaan, kd_tingkat, log_pgw, log_input, tahun, url, vol_no_tahun, jabatan_recog, lem_beri_penghargaan, penyelenggara, penerbit, isbn, judul_chapter, keterangan_recog, kd_jenis_recog, kd_jenis_haki) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
				// $kd = (!empty($value['jurnal_n_or_i']))? "'".$value['jurnal_n_or_i']."'" : "NULL";
				// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, nm_karya_d, vol_no_tahun, kd_tingkat, url, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '".$value['jurnal']."', '".$value['vol_no_th']."', ".$kd.", '".$value['url']."', '3');<br>";
				// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, penerbit, isbn, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['buku']."', '".$value['penerbit_2']."', '".$value['isbn_2']."', '1');<br>";
				// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, judul_chapter, penerbit, isbn, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '".$value['buku']."', '".$value['penerbit_2']."', '".$value['isbn_2']."', '18');<br>";
				// $kd = (!empty($value['seminar_n_or_i']))? "'".$value['seminar_n_or_i']."'" : "NULL";
				// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, nm_karya_d, penyelenggara, isbn, kd_tingkat, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '".$value['seminar']."', '".$value['penyelenggara']."', '".$value['isbn_3']."', ".$kd.", '21');<br>";
				// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, kd_jenis_haki, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '2', '24');<br>";
				// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, jenis, judul, jurnal, vol_no_th, jurnal_n_or_i, url, penerbit, isbn, buku, penerbit_2, isbn_2, seminar, penyelenggara, isbn_3, seminar_n_or_i, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['jenis']."', '".$value['judul']."', '".$value['jurnal']."', '".$value['vol_no_th']."', '".$value['jurnal_n_or_i']."', '".$value['url']."', '".$value['penerbit']."', '".$value['isbn']."', '".$value['buku']."', '".$value['penerbit_2']."', '".$value['isbn_2']."', '".$value['seminar']."', '".$value['penyelenggara']."', '".$value['isbn_3']."', '".$value['seminar_n_or_i']."', '22');<br>";
			}
		}
	}*/

	/*public function pemindahan(){
		$data = $this->mutu->query("
			SELECT DISTINCT nip
			FROM tmp_keu_guna_dana_ppm_fauzi_publikasi
		")->result_array();
		foreach ($data as $key => $value) {
			// 1 => 3 Jurnal
			// 2 => 1 Buku
			// 3 => 18 Chapter of Book
			// 4 => 21 Conference Papper
			// 5 => 24 HAKI
			// 6 => 22 Rekayasa Sosial
			$data_ = $this->mutu->query("
				SELECT *
				FROM tmp_keu_guna_dana_ppm_fauzi_publikasi
				WHERE nip = '".$value['nip']."'
				AND jenis = '5'
			")->result_array();
			if (!empty($data_)) {
				// echo "<pre>";
				// print_r($data_);
				// echo "</pre>";
				// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '".$value['nip']."' AND kd_karya_jenis = 3;<br>";
				// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '".$value['nip']."' AND kd_karya_jenis = 1;<br>";
				// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '".$value['nip']."' AND kd_karya_jenis = 18;<br>";
				// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '".$value['nip']."' AND kd_karya_jenis = 21;<br>";
				// echo "DELETE FROM public.tmp_keu_guna_dana_ppm WHERE nip = '".$value['nip']."' AND kd_karya_jenis = 24;<br>";
				// echo "DELETE FROM public.tmp_keu_guna_dana_ppm_fishum WHERE nip = '".$value['nip']."' AND kd_karya_jenis = 22;<br>";
				foreach ($data_ as $key => $value) {
					// INSERT INTO public.tmp_keu_guna_dana_ppm_fauzi(nip, nm_ppm, tgl_guna_ppm, jml_guna_ppm, kd_jenis_g, nm_karya_d, tgl_karya_d, kd_karya_jenis, kd_karya_penghargaan, tgl_karya_penghargaan, kd_tingkat, log_pgw, log_input, tahun, url, vol_no_tahun, jabatan_recog, lem_beri_penghargaan, penyelenggara, penerbit, isbn, judul_chapter, keterangan_recog, kd_jenis_recog, kd_jenis_haki) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
					// $kd = (!empty($value['jurnal_n_or_i']))? "'".$value['jurnal_n_or_i']."'" : "NULL";
					// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, nm_karya_d, vol_no_tahun, kd_tingkat, url, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '".$value['jurnal']."', '".$value['vol_no_th']."', ".$kd.", '".$value['url']."', '3');<br>";
					// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, penerbit, isbn, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['buku']."', '".$value['penerbit_2']."', '".$value['isbn_2']."', '1');<br>";
					// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, judul_chapter, penerbit, isbn, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '".$value['buku']."', '".$value['penerbit_2']."', '".$value['isbn_2']."', '18');<br>";
					// $kd = (!empty($value['seminar_n_or_i']))? "'".$value['seminar_n_or_i']."'" : "NULL";
					// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, nm_karya_d, penyelenggara, isbn, kd_tingkat, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '".$value['seminar']."', '".$value['penyelenggara']."', '".$value['isbn_3']."', ".$kd.", '21');<br>";
					// echo "INSERT INTO public.tmp_keu_guna_dana_ppm(nip, tahun, nm_ppm, kd_jenis_haki, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['judul']."', '2', '24');<br>";
					// echo "INSERT INTO public.tmp_keu_guna_dana_ppm_fishum(nip, tahun, jenis, judul, jurnal, vol_no_th, jurnal_n_or_i, url, penerbit, isbn, buku, penerbit_2, isbn_2, seminar, penyelenggara, isbn_3, seminar_n_or_i, kd_karya_jenis) VALUES ('".$value['nip']."', '".$value['tahun']."', '".$value['jenis']."', '".$value['judul']."', '".$value['jurnal']."', '".$value['vol_no_th']."', '".$value['jurnal_n_or_i']."', '".$value['url']."', '".$value['penerbit']."', '".$value['isbn']."', '".$value['buku']."', '".$value['penerbit_2']."', '".$value['isbn_2']."', '".$value['seminar']."', '".$value['penyelenggara']."', '".$value['isbn_3']."', '".$value['seminar_n_or_i']."', '22');<br>";
				}
			}
		}
	}*/

}