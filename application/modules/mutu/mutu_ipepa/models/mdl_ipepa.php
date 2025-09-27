
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Mdl_ipepa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->mutu = $this->load->database('mutu');
    }

    public function insert_sia_ipepa($key = array())
    {

        // $data = $this->mutu->query("
        // 	SELECT COUNT(*) AS TOTAL
        // 	FROM aspek_dokumentasi AS A
        // 	LEFT JOIN asdok_dokumen AS B
        // 	ON B.id_aspek_dokumentasi = A.id_aspek_dokumentasi
        // 	WHERE A.id_dokumentasi = ".$key['id_dokumentasi']."
        // 	AND A.no_standar = ".$key['no_standar']."
        // ");
        // return $data;


        $data = $this->mutu->query("
			INSERT INTO ".$key['tabel']."
( kd_krs, semester, kd_prodi, nim, kd_ta, kd_smt, nama, angkatan, nm_prodi, status, nm_status, kd_dosen_wali, nip, nm_dosen, nm_dosen_f, nm_dosen_p, ip_yl, ipk, sks_kum, jatah_sks, ambil_sks, krs_jam_mulai, krs_jam_selesai, status_revisi, status_cetak, keterangan, status_krs, mulai_krs, krs_jam_mulai_f, krs_jam_selesai_f, no_)
VALUES( 22207100276450, 10, '22207', '01361041', 2006, 1, 'NI MATUL LAILY', 2001, 'Perbandingan Mazhab', 'D', 'Drop Out', '195402011986031003', '195402011986031003', 'Fuad', 'Dr.  H. Fuad, M.A.', 'Dr.^H.^Fuad^M.A.^', 0, 3.34, 114, 16, 6, '28-AUG-06', '28-AUG-06', 0, 0, '', 0, 0, TO_TIMESTAMP('28-08-2006 13:08:09', 'DD-MM-YYYY HH24:MI:SS'), TO_TIMESTAMP('28-08-2006 13:08:09', 'DD-MM-YYYY HH24:MI:SS'), 0);

		");
        return $data;
    }
}
