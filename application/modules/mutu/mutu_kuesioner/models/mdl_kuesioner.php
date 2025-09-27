


<?php
if(!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Mdl_kuesioner extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->kuesioner = $this->load->database('kuesioner');
    }

    public function test($par)
    {
        $query = "SELECT * FROM tbl_master_kuesioner";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
        // return 1;
    }
    // get data kuesioner
    public function get_data_kuesioner($par)
    {
        // $this->kuesioner = $this->load->database('kuesioner');

        $table = (!empty($par['TABLE']) ? $par['TABLE'] : '');
        if(!empty($par['SELECT'])) {
            $this->kuesioner->select($par['SELECT']);
        }
        $this->kuesioner->from($table);
        if(!empty($par['WHERE_IN'])) {
            foreach($par['WHERE_IN'] as $key => $val) {
                $this->kuesioner->where_in($key, $val);
            }
        }
        if(!empty($par['WHERE_LIKE'])) {
            $n = 1;
            foreach($par['WHERE_LIKE'] as $key => $val) {
                if($n == 1) {
                    $this->kuesioner->like('UPPER('.$key.')', strtoupper($val));
                } else {
                    $this->kuesioner->or_like('UPPER('.$key.')', strtoupper($val));
                }
                $n++;
            }
        }
        if(!empty($par['WHERE'])) {
            $this->kuesioner->where($par['WHERE']);
        }
        if(!empty($par['ORDER'])) {
            $this->kuesioner->order_by($par['ORDER']);
        }
        if(!empty($par['LIMIT']) && !empty($par['INDEX'])) {
            $this->kuesioner->limit($par['LIMIT'], $par['INDEX']);
        } else {
            if(!empty($par['LIMIT'])) {
                $this->kuesioner->limit($par['LIMIT']);
            }
        }
        // $this->kuesioner->from('akreditasi_master_unit');

        $data	= $this->kuesioner->get();
        return $data->result();
        // $query = "SELECT * FROM tb_transaksi_rekap_kuesioner";
        // $sql = $this->kuesioner->query($query);
        // return $sql->result_array();
    }
    public function get_edit_kuesioner($id_kuesioner)
    {
        $query = "SELECT * FROM tbl_master_kuesioner WHERE id_kuesioner='$id_kuesioner'";
        $sql = $this->kuesioner->query($query);
        return $sql->row_array();
    }
    public function update_data_kuesioner($id_kuesioner, $nama_kuesioner)
    {
        $query = "UPDATE tbl_master_kuesioner SET nama_kuesioner='$nama_kuesioner' WHERE id_kuesioner='$id_kuesioner'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function tambah_data_kuesioner($nama_kuesioner)
    {
        $query = "INSERT INTO tbl_master_kuesioner (nama_kuesioner) VALUES ('$nama_kuesioner')";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_hapus_kuesioner($id_kuesioner)
    {
        $query = "DELETE FROM tbl_master_kuesioner WHERE id_kuesioner= '$id_kuesioner'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_master_kuesioner()
    {
        $query = "SELECT * FROM tbl_master_kuesioner";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function get_data_jenis_kuesioner()
    {
        $query = "SELECT * FROM tbl_master_jenis_kuesioner a JOIN tbl_master_kuesioner b ON a.id_kuesioner = b.id_kuesioner ORDER BY a.id_jenis_kuesioner DESC";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function tambah_data_jenis_kuesioner($id_kuesioner, $nama_jenis_kuesioner, $petunjuk_pengisian)
    {
        $query = "INSERT INTO tbl_master_jenis_kuesioner (id_kuesioner, nama_jenis_kuesioner, petunjuk_pengisian) VALUES ('$id_kuesioner', '$nama_jenis_kuesioner', '$petunjuk_pengisian')";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_edit_jenis_kuesioner($id_jenis_kuesioner)
    {
        $query = "SELECT * FROM tbl_master_jenis_kuesioner a JOIN tbl_master_kuesioner b ON a.id_kuesioner = b.id_kuesioner WHERE a.id_jenis_kuesioner = '$id_jenis_kuesioner'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function update_data_jenis_kuesioner($id_jenis_kuesioner, $id_kuesioner, $nama_jenis_kuesioner, $petunjuk_pengisian)
    {
        $query = "UPDATE tbl_master_jenis_kuesioner SET id_kuesioner = '$id_kuesioner', nama_jenis_kuesioner='$nama_jenis_kuesioner', petunjuk_pengisian = '$petunjuk_pengisian' WHERE id_jenis_kuesioner = '$id_jenis_kuesioner'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_hapus_jenis_kuesioner($id_jenis_kuesioner)
    {
        $query = "DELETE FROM tbl_master_jenis_kuesioner WHERE id_jenis_kuesioner = '$id_jenis_kuesioner'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_hapus_jenis_jawaban($id_jenis_jawaban)
    {
        $query = "DELETE FROM tbl_master_jenis_jawaban WHERE id_jenis_jawaban = '$id_jenis_jawaban'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_data_pertanyaan()
    {
        $query = "SELECT * FROM tbl_master_pertanyaan ORDER BY id_pertanyaan DESC";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function tambah_data_pertanyaan($pertanyaan)
    {
        $query = "INSERT INTO tbl_master_pertanyaan (pertanyaan) VALUES ('$pertanyaan')";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_edit_pertanyaan($id_pertanyaan)
    {
        $query = "SELECT * FROM tbl_master_pertanyaan WHERE id_pertanyaan = '$id_pertanyaan'";
        $sql = $this->kuesioner->query($query);
        return $sql->row_array();
    }
    public function update_data_pertanyaan($id_pertanyaan, $pertanyaan)
    {
        $query = "UPDATE tbl_master_pertanyaan SET pertanyaan = '$pertanyaan' WHERE id_pertanyaan = '$id_pertanyaan'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_hapus_pertanyaan($id_pertanyaan)
    {
        $query = "DELETE FROM tbl_master_pertanyaan WHERE id_pertanyaan='$id_pertanyaan'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_hapus_jawaban($id_jawaban)
    {
        $query = "DELETE FROM tbl_master_jawaban WHERE id_jawaban='$id_jawaban'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_data_jawaban()
    {
        $query = "SELECT * FROM tbl_master_jawaban ORDER BY id_jawaban DESC";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function tambah_data_jawaban($jawaban)
    {
        $query = "INSERT INTO tbl_master_jawaban (jawaban) VALUES ('$jawaban')";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_edit_jawaban($id_jawaban)
    {
        $query = "SELECT * FROM tbl_master_jawaban WHERE id_jawaban = '$id_jawaban'";
        $sql = $this->kuesioner->query($query);
        return $sql->row_array();
    }
    public function update_data_jawaban($id_jawaban, $jawaban)
    {
        $query = "UPDATE tbl_master_jawaban SET jawaban = '$jawaban' WHERE id_jawaban = '$id_jawaban'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_input_pilihan()
    {
        $query = "SELECT * FROM tbl_input_pilihan ORDER BY id_input_pilihan ASC";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function get_data_jenis_jawaban()
    {
        $query = "SELECT * FROM tbl_master_jenis_jawaban a JOIN tbl_input_pilihan b ON a.id_input_pilihan = b.id_input_pilihan ORDER BY a.id_jenis_jawaban DESC";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function tambah_data_jenis_jawaban($nama_jenis_jawaban, $id_input_pilihan, $jumlah_pilihan)
    {
        $query = "INSERT INTO tbl_master_jenis_jawaban (nama_jenis_jawaban, id_input_pilihan, jumlah_pilihan) VALUES ('$nama_jenis_jawaban', '$id_input_pilihan', '$jumlah_pilihan')";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_edit_jenis_jawaban($id)
    {
        $query = "SELECT * FROM tbl_master_jenis_jawaban WHERE id_jenis_jawaban = '$id'";
        $sql = $this->kuesioner->query($query);
        return $sql->row_array();
    }
    public function get_data_m_detail_jenis_jawaban_by_id_insert($id_jenis_jawaban)
    {
        $query = "SELECT * from tbl_detail_jenis_jawaban a JOIN tbl_master_jawaban b ON a.id_jawaban = b.id_jawaban where a.id_jenis_jawaban = '$id_jenis_jawaban' ORDER BY a.bobot_jawaban DESC";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_data_m_detail_jenis_jawaban_by_id($id_jenis_jawaban, $id_susunan_soal)
    {
        //$query = "SELECT * from tbl_detail_jenis_jawaban a JOIN tbl_master_jawaban b ON a.id_jawaban = b.id_jawaban where a.id_jenis_jawaban = '$id_jenis_jawaban'";
        $query = "SELECT * from tbl_pengaturan_susunan_soal a JOIN tbl_detail_jenis_jawaban b ON a.id_jenis_jawaban = b.id_jenis_jawaban JOIN tbl_master_jawaban c ON b.id_jawaban = c.id_jawaban where a.id_jenis_jawaban ='$id_jenis_jawaban' AND a.id_susunan_soal ='$id_susunan_soal' ORDER BY b.bobot_jawaban DESC;";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function update_data_jenis_jawaban($id_jenis_jawaban, $nama_jenis_jawaban, $id_input_pilihan, $jumlah_pilihan)
    {
        $query = "UPDATE tbl_master_jenis_jawaban SET nama_jenis_jawaban = '$nama_jenis_jawaban', id_input_pilihan='$id_input_pilihan', jumlah_pilihan='$jumlah_pilihan' WHERE id_jenis_jawaban = '$id_jenis_jawaban'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function tambah_detail_jenis_jawaban($id_jenis_jawaban, $id_jawaban, $bobot_jawaban)
    {
        $query = "INSERT INTO tbl_detail_jenis_jawaban (id_jenis_jawaban, id_jawaban, bobot_jawaban) VALUES ('$id_jenis_jawaban', '$id_jawaban', '$bobot_jawaban')";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function update_detail_jenis_jawaban($id_jawaban, $bobot_jawaban, $id_detail_jenis_jawaban)
    {
        $query = "UPDATE tbl_detail_jenis_jawaban SET id_jawaban ='$id_jawaban', bobot_jawaban = '$bobot_jawaban' WHERE id_detail_jenis_jawaban = '$id_detail_jenis_jawaban'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_data_detail_jenis_jawaban($id_jenis_jawaban)
    {
        $query = "SELECT * FROM tbl_detail_jenis_jawaban a  JOIN tbl_master_jenis_jawaban b ON a.id_jenis_jawaban = b.id_jenis_jawaban JOIN tbl_master_jawaban c ON a.id_jawaban = c.id_jawaban WHERE a.id_jenis_jawaban = '$id_jenis_jawaban' ORDER BY a.id_detail_jenis_jawaban DESC";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function get_distinct_id_jenis_jawaban()
    {
        $query = "SELECT distinct a.id_jenis_jawaban, b.nama_jenis_jawaban from tbl_detail_jenis_jawaban a JOIN tbl_master_jenis_jawaban b ON a.id_jenis_jawaban = b.id_jenis_jawaban order by a.id_jenis_jawaban desc";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function get_edit_detail_jenis_jawaban($id)
    {
        $query = "SELECT * FROM tbl_detail_jenis_jawaban a JOIN tbl_master_jawaban b ON a.id_jawaban = b.id_jawaban WHERE a.id_jenis_jawaban = '$id'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function get_nama_jenis_jawaban()
    {
        $query = "SELECT id_jenis_jawaban, nama_jenis_jawaban from tbl_master_jenis_jawaban";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function get_hapus_detail_jenis_jawaban($id_jenis_jawaban)
    {
        $query = "DELETE FROM tbl_detail_jenis_jawaban WHERE id_jenis_jawaban='$id_jenis_jawaban'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function kelompok_soal()
    {
        $query = "SELECT * FROM tbl_master_kelompok_soal ORDER BY id_kelompok_soal DESC";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function tambah_data_kelompok_soal($nama_kelompok_soal)
    {
        $query = "INSERT INTO tbl_master_kelompok_soal (nama_kelompok_soal) VALUES('$nama_kelompok_soal')";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function get_edit_kelompok_soal($id_kelompok_soal)
    {
        $query = "SELECT * FROM tbl_master_kelompok_soal WHERE id_kelompok_soal = '$id_kelompok_soal'";
        $sql = $this->kuesioner->query($query);
        return $sql->row_array();
    }
    public function update_data_kelompok_soal($id_kelompok_soal, $nama_kelompok_soal)
    {
        $query = "UPDATE tbl_master_kelompok_soal SET nama_kelompok_soal = '$nama_kelompok_soal' WHERE id_kelompok_soal ='$id_kelompok_soal'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function delete_data_kelompok_soal($id_kelompok_soal)
    {
        $query = "DELETE FROM tbl_master_kelompok_soal WHERE id_kelompok_soal = '$id_kelompok_soal'";
        $sql = $this->kuesioner->query($query);
        return $sql;
    }
    public function getData($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_pengaturan_susunan_soal a JOIN tbl_master_pertanyaan b ON a.id_pertanyaan = b.id_pertanyaan JOIN tbl_master_jenis_jawaban c ON a.id_jenis_jawaban = c.id_jenis_jawaban JOIN tbl_master_kelompok_soal d ON a.id_kelompok_soal = d.id_kelompok_soal JOIN tbl_master_jenis_kuesioner e ON a.id_jenis_kuesioner = e.id_jenis_kuesioner LEFT JOIN tbl_master_subjenis_kuesioner f ON a.id_subjenis_kuesioner = f.id_subjenis_kuesioner  ORDER BY a.id_susunan_soal DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function getDataPertanyaan($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_master_pertanyaan ORDER BY id_pertanyaan DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function getDataJawaban($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_master_jawaban ORDER BY id_jawaban DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function getDataJenisJawaban($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_master_jenis_jawaban a JOIN tbl_input_pilihan b ON a.id_input_pilihan = b.id_input_pilihan ORDER BY a.id_jenis_jawaban DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function getDataMKuesioner($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_master_kuesioner ORDER BY id_kuesioner DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function getDataMJenisKuesioner($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_master_jenis_kuesioner a JOIN tbl_master_kuesioner b ON a.id_kuesioner = b.id_kuesioner ORDER BY a.id_jenis_kuesioner DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function getDataPelaksanaan($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_pelaksanaan_kuesioner a JOIN tbl_master_jenis_kuesioner b ON a.id_jenis_kuesioner = b.id_jenis_kuesioner order by a.id_periode_pelaksanaan DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function getDataKelompokSoal($rowno, $rowperpage)
    {
        $query = "SELECT * FROM tbl_master_kelompok_soal ORDER BY id_kelompok_soal DESC LIMIT '$rowperpage' OFFSET '$rowno'";
        $sql = $this->kuesioner->query($query);
        return $sql->result_array();
    }
    public function getrecordCountPelaksanaan()
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_pelaksanaan_kuesioner');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
    public function getrecordCountKelompokSoal()
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_master_kelompok_soal');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
    public function getrecordCount()
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_pengaturan_susunan_soal');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
    public function getrecordCountPertanyaan()
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_master_pertanyaan');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
    public function getrecordCountJawaban()
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_master_jawaban');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
    public function getrecordCountJenisJawaban()
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_master_jenis_jawaban');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function getrecordCountMKuseioner()
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_master_kuesioner');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }
    public function getrecordCountMJenisKuseioner()
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_master_jenis_kuesioner');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }
    public function get_data_unit_by_id($id_susunan_soal)
    {
        $query = "SELECT * FROM tbl_relasi_soal_dan_unit WHERE id_susunan_soal = '$id_susunan_soal'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_user_akses_kuesioner_by_id($id_periode_pelaksanaan)
    {
        $query = "SELECT * FROM tbl_user_akses_kuesioner WHERE id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_data_pengaturan_susunan_soal_by_id($id_susunan_soal)
    {
        $query = "SELECT * FROM tbl_pengaturan_susunan_soal a JOIN tbl_master_pertanyaan b ON a.id_pertanyaan = b.id_pertanyaan JOIN tbl_master_jenis_jawaban c ON a.id_jenis_jawaban = c.id_jenis_jawaban JOIN tbl_master_kelompok_soal d ON a.id_kelompok_soal = d.id_kelompok_soal JOIN tbl_master_jenis_kuesioner e ON a.id_jenis_kuesioner = e.id_jenis_kuesioner WHERE a.id_susunan_soal = '$id_susunan_soal'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function get_data_unit_by_id_susunan_soal($id_susunan_soal)
    {
        $query = "SELECT * FROM tbl_relasi_soal_dan_unit a JOIN tbl_unit b ON a.kode_unit = b.kode_unit WHERE a.id_susunan_soal = '$id_susunan_soal'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_data_jenis_responden_multiple_by_id_periode_pelaksanaan($id_periode_pelaksanaan)
    {
        $query = "SELECT * FROM tbl_user_akses_kuesioner a JOIN tbl_jenis_responden b ON a.id_jenis_responden = b.id_jenis_responden WHERE a.id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function update_pengaturan_soal($no_urut, $id_jenis_kuesioner, $id_pertanyaan, $id_jenis_jawaban, $id_kelompok_soal, $bobot_pertanyaan, $id_susunan_soal)
    {
        $query = "UPDATE tbl_pengaturan_susunan_soal SET no_urut = '$no_urut', id_jenis_kuesioner = '$id_jenis_kuesioner', id_pertanyaan='$id_pertanyaan', id_jenis_jawaban='$id_jenis_jawaban', id_kelompok_soal='$id_kelompok_soal', bobot_pertanyaan='$bobot_pertanyaan' WHERE id_susunan_soal='$id_susunan_soal'";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function delete_relasi_soal_unit2($id_susunan_soal)
    {
        $query = "DELETE FROM tbl_relasi_soal_dan_unit WHERE id_susunan_soal = '$id_susunan_soal'";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function delete_relasi_pelaksanaan_responden2($id_periode_pelaksanaan)
    {
        $query = "DELETE FROM tbl_user_akses_kuesioner WHERE id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function tambah_relasi_soal_unit($id_susunan_soal, $kode_unit)
    {
        $query = "INSERT INTO tbl_relasi_soal_dan_unit (id_susunan_soal, kode_unit) VALUES ('$id_susunan_soal', '$kode_unit')";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function tambah_pengaturan_soal($no_urut, $id_jenis_kuesioner, $id_pertanyaan, $id_jenis_jawaban, $id_kelompok_soal, $bobot_pertanyaan)
    {
        $query = "INSERT INTO tbl_pengaturan_susunan_soal (id_pertanyaan, id_jenis_jawaban, bobot_pertanyaan, id_kelompok_soal, id_jenis_kuesioner, no_urut) VALUES ('$id_pertanyaan', '$id_jenis_jawaban', '$bobot_pertanyaan', '$id_kelompok_soal', '$id_jenis_kuesioner', $no_urut)";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function tambah_pengaturan_soal_v2($no_urut, $id_jenis_kuesioner, $id_pertanyaan, $id_jenis_jawaban, $id_kelompok_soal, $bobot_pertanyaan, $id_subjenis_kuesioner)
    {
        $query = "INSERT INTO tbl_pengaturan_susunan_soal (id_pertanyaan, id_jenis_jawaban, bobot_pertanyaan, id_kelompok_soal, id_jenis_kuesioner, no_urut, id_subjenis_kuesioner) VALUES ('$id_pertanyaan', '$id_jenis_jawaban', '$bobot_pertanyaan', '$id_kelompok_soal', '$id_jenis_kuesioner', $no_urut, $id_subjenis_kuesioner)";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function cek_max_id_susunan_soal()
    {
        $query2 = "SELECT MAX(id_susunan_soal) as maksimal_id FROM tbl_pengaturan_susunan_soal";
        $sql = $this->db->query($query2);
        $data = $sql->row_array();
        $hasil = $data['maksimal_id'];
        return $hasil;
    }
    public function get_hapus_pengaturan_susunan_soal($id_susunan_soal)
    {
        $query = "DELETE FROM tbl_pengaturan_susunan_soal WHERE id_susunan_soal = '$id_susunan_soal'";
        $sql = $this->db->query($query);
        if($sql) {
            $query2 = "DELETE FROM tbl_relasi_soal_dan_unit WHERE id_susunan_soal = '$id_susunan_soal'";
            $sql2 = $this->db->query($query2);
            return $sql2;
        }
    }
    public function get_data_pelaksanaan_kuesioner()
    {
        $query = "SELECT * FROM tbl_pelaksanaan_kuesioner a JOIN tbl_master_jenis_kuesioner b ON a.id_jenis_kuesioner = b.id_jenis_kuesioner order by a.id_periode_pelaksanaan DESC";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_edit_pelaksanaan_kuesioner($id_periode_pelaksanaan)
    {
        $query = "SELECT * FROM tbl_pelaksanaan_kuesioner where id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function tambah_data_pelaksanaan_kuesioner($id_jenis_kuesioner, $tgl_mulai, $tgl_selesai, $status_penawaran, $tahun_pelaksanaan, $opsi_kuesioner = '', $kode_unit = '', $periode_pelaksanaan = '')
    {
        $query = "INSERT INTO tbl_pelaksanaan_kuesioner (id_jenis_kuesioner, tgl_mulai, tgl_selesai, status_penawaran, tahun_pelaksanaan, opsi_kuesioner, kode_unit, periode_pelaksanaan) VALUES ('$id_jenis_kuesioner', '$tgl_mulai', '$tgl_selesai', '$status_penawaran', '$tahun_pelaksanaan', '$opsi_kuesioner', '$kode_unit', '$periode_pelaksanaan')";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function update_data_pelaksanaan_kuesioner($id_periode_pelaksanaan, $id_jenis_kuesioner, $tgl_mulai, $tgl_selesai, $status_penawaran, $tahun_pelaksanaan)
    {
        $query = "UPDATE tbl_pelaksanaan_kuesioner SET id_jenis_kuesioner = '$id_jenis_kuesioner', tgl_mulai = '$tgl_mulai', tgl_selesai='$tgl_selesai', status_penawaran = '$status_penawaran', tahun_pelaksanaan = '$tahun_pelaksanaan' WHERE id_periode_pelaksanaan = '$id_periode_pelaksanaan'";

        $sql = $this->db->query($query);
        return $sql;
    }
    public function get_hapus_pelaksanaan_kuesioner($id_periode_pelaksanaan)
    {
        $query = "DELETE FROM tbl_pelaksanaan_kuesioner where id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        if($sql) {
            $query2 = "DELETE FROM tbl_user_akses_kuesioner where id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
            $sql2 = $this->db->query($query2);
            return $sql2;
        }

    }
    public function get_data_pelaksanaan_kuesioner_view($id_jenis_responden)
    {
        $query = "SELECT a.id_periode_pelaksanaan, a.id_jenis_kuesioner, a.tgl_mulai, a.tgl_selesai, a.status_penawaran, b.nama_jenis_kuesioner, b.id_kuesioner, d.nama_kuesioner from tbl_pelaksanaan_kuesioner a JOIN tbl_master_jenis_kuesioner b ON a.id_jenis_kuesioner = b.id_jenis_kuesioner JOIN tbl_user_akses_kuesioner c ON a.id_periode_pelaksanaan = c.id_periode_pelaksanaan JOIN tbl_master_kuesioner d ON b.id_kuesioner = d.id_kuesioner where (a.status_penawaran =1 and c.id_jenis_responden = '$id_jenis_responden') and (a.tgl_selesai >= now()::date and now()::date >= a.tgl_mulai) AND (a.opsi_kuesioner IS NULL OR a.opsi_kuesioner = 'PUBLIC')  ORDER BY a.id_periode_pelaksanaan DESC";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function get_data_pelaksanaan_kuesioner_unit_view($id_jenis_responden, $kode_unit = 'UN01010')
    {
        $query = "SELECT a.id_periode_pelaksanaan, a.id_jenis_kuesioner, a.tgl_mulai, a.tgl_selesai, a.status_penawaran, b.nama_jenis_kuesioner, b.id_kuesioner, d.nama_kuesioner from tbl_pelaksanaan_kuesioner a JOIN tbl_master_jenis_kuesioner b ON a.id_jenis_kuesioner = b.id_jenis_kuesioner JOIN tbl_user_akses_kuesioner c ON a.id_periode_pelaksanaan = c.id_periode_pelaksanaan JOIN tbl_master_kuesioner d ON b.id_kuesioner = d.id_kuesioner where (a.status_penawaran =1 and c.id_jenis_responden = '$id_jenis_responden') and (a.tgl_selesai >= now()::date and now()::date >= a.tgl_mulai) AND a.opsi_kuesioner = 'UNIT' AND a.kode_unit = '$kode_unit' ORDER BY a.id_periode_pelaksanaan DESC";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function get_susunan_soal_view($id)
    {
        $query = "SELECT * from tbl_pengaturan_susunan_soal a JOIN tbl_master_pertanyaan b ON a.id_pertanyaan = b.id_pertanyaan JOIN tbl_master_kelompok_soal c ON a.id_kelompok_soal = c.id_kelompok_soal JOIN tbl_master_jenis_kuesioner d ON a.id_jenis_kuesioner = d.id_jenis_kuesioner JOIN tbl_master_jenis_jawaban e ON a.id_jenis_jawaban = e.id_jenis_jawaban LEFT JOIN tbl_master_subjenis_kuesioner f ON a.id_subjenis_kuesioner = f.id_subjenis_kuesioner where a.id_jenis_kuesioner='$id' ORDER BY a.no_urut ASC";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_rincian_pilihan_view($id_jenis_jawaban)
    {
        $query = "SELECT * from tbl_detail_jenis_jawaban a JOIN tbl_master_jenis_jawaban b ON a.id_jenis_jawaban = b.id_jenis_jawaban JOIN tbl_master_jawaban c ON a.id_jawaban = c.id_jawaban where a.id_jenis_jawaban = '$id_jenis_jawaban' ORDER BY a.bobot_jawaban DESC";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_unit_terkait_view($id_susunan_soal)
    {
        $query = "SELECT * from tbl_pengaturan_susunan_soal a JOIN tbl_relasi_soal_dan_unit b ON a.id_susunan_soal = b.id_susunan_soal JOIN tbl_unit c ON b.kode_unit = c.kode_unit WHERE a.id_susunan_soal = '$id_susunan_soal'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_akses_kuesioner_view($id_jenis_kuesioner)
    {
        $query = "SELECT * FROM tbl_master_jenis_kuesioner WHERE id_jenis_kuesioner = '$id_jenis_kuesioner'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function cek_pelaksanaan_kuesioner_view($id_jenis_kuesioner)
    {
        $query = "SELECT * FROM tbl_pelaksanaan_kuesioner WHERE id_jenis_kuesioner = '$id_jenis_kuesioner' AND status_penawaran=1";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function cek_pengisian_kuesioner_responden_view($nomor_induk, $id_periode_pelaksanaan)
    {
        $query = "SELECT * FROM tbl_jawaban_kuesioner_responden WHERE nomor_induk = '$nomor_induk' AND id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function insert_jawaban_kuesioner($nomor_induk, $id_susunan_soal, $id_detail_jenis_jawaban, $id_periode_pelaksanaan, $keterangan)
    {
        $query = "INSERT INTO tbl_jawaban_kuesioner_responden (nomor_induk, id_susunan_soal, id_detail_jenis_jawaban, id_periode_pelaksanaan, keterangan) VALUES ('$nomor_induk', '$id_susunan_soal', '$id_detail_jenis_jawaban', '$id_periode_pelaksanaan', '$keterangan')";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function get_id_periode_pelaksanaan($id_jenis_kuesioner, $tahun)
    {
        $query = "SELECT id_periode_pelaksanaan FROM tbl_pelaksanaan_kuesioner WHERE id_jenis_kuesioner ='$id_jenis_kuesioner' AND tahun_pelaksanaan='$tahun'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function get_data_jawab_kuesioner($id_periode_pelaksanaan)
    {
        /*$query = "SELECT * FROM tbl_jawaban_kuesioner_responden a JOIN tbl_detail_jenis_jawaban b ON a.id_detail_jenis_jawaban = b.id_detail_jenis_jawaban WHERE a.id_periode_pelaksanaan ='$id_periode_pelaksanaan'";*/
        $query = "SELECT distinct a.nomor_induk, c.nama_jenis_kuesioner, c.id_jenis_kuesioner FROM tbl_jawaban_kuesioner_responden a JOIN tbl_pelaksanaan_kuesioner b ON a.id_periode_pelaksanaan = b.id_periode_pelaksanaan JOIN tbl_master_jenis_kuesioner c on b.id_jenis_kuesioner = c.id_jenis_kuesioner WHERE a.id_periode_pelaksanaan='$id_periode_pelaksanaan';";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function get_data_jawab_kuesioner_custom($id_periode_pelaksanaan)
    {
        /*$query = "SELECT * FROM tbl_jawaban_kuesioner_responden a JOIN tbl_detail_jenis_jawaban b ON a.id_detail_jenis_jawaban = b.id_detail_jenis_jawaban WHERE a.id_periode_pelaksanaan ='$id_periode_pelaksanaan'";*/
        $query = "SELECT distinct a.nomor_induk, c.nama_jenis_kuesioner, c.id_jenis_kuesioner FROM tbl_jawaban_kuesioner_responden a JOIN tbl_pelaksanaan_kuesioner b ON a.id_periode_pelaksanaan = b.id_periode_pelaksanaan JOIN tbl_master_jenis_kuesioner c on b.id_jenis_kuesioner = c.id_jenis_kuesioner WHERE a.id_periode_pelaksanaan='$id_periode_pelaksanaan' AND (substring(a.nomor_induk, 3, 5) = '10803' OR substring(a.nomor_induk, 3, 2) = '83' OR substring(a.nomor_induk, 3, 2) = '39');";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }


    public function get_data_jawab_kuesioner_per_nip($id_periode_pelaksanaan, $nip)
    {
        $query = "SELECT sum(b.bobot_jawaban) as nilai_total_jawaban FROM tbl_jawaban_kuesioner_responden a JOIN tbl_detail_jenis_jawaban b ON a.id_detail_jenis_jawaban = b.id_detail_jenis_jawaban WHERE a.id_periode_pelaksanaan ='$id_periode_pelaksanaan' and a.nomor_induk = '$nip'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function get_data_pertanyaan_kuesioner_per_nip($id_periode_pelaksanaan, $nip)
    {
        $query = "SELECT count(*) as jumlah_pertanyaan FROM tbl_jawaban_kuesioner_responden a JOIN tbl_detail_jenis_jawaban b ON a.id_detail_jenis_jawaban = b.id_detail_jenis_jawaban WHERE a.id_periode_pelaksanaan ='$id_periode_pelaksanaan' and a.nomor_induk = '$nip'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_data_jenis_responden()
    {
        $sql = $this->db->get_where('tbl_jenis_responden');
        return $sql->result_array();
    }
    public function cek_max_id_pelaksanaan_kuesioner()
    {
        $query2 = "SELECT MAX(id_periode_pelaksanaan) as maksimal_id FROM tbl_pelaksanaan_kuesioner";
        $sql = $this->db->query($query2);
        $data = $sql->row_array();
        $hasil = $data['maksimal_id'];
        return $hasil;
    }
    public function tambah_user_akses_kuesioner($id_periode_pelaksanaan, $id_jenis_responden)
    {
        $query = "INSERT INTO tbl_user_akses_kuesioner (id_periode_pelaksanaan, id_jenis_responden) VALUES ('$id_periode_pelaksanaan', '$id_jenis_responden')";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function tambah_relasi_pelaksanaan_responden($id_periode_pelaksanaan, $id_jenis_responden)
    {
        $query = "INSERT INTO tbl_user_akses_kuesioner (id_periode_pelaksanaan, id_jenis_responden) VALUES ('$id_periode_pelaksanaan', '$id_jenis_responden')";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function get_id_jenis_kuesioner_from_tbl_pelaksanaan_kuesioner($id_jenis_kuesioner)
    {
        $query = "SELECT id_periode_pelaksanaan FROM tbl_pelaksanaan_kuesioner WHERE id_jenis_kuesioner = '$id_jenis_kuesioner'";
        $sql = $this->db->query($query);
        $hasil = $sql->row_array();
        return $hasil['id_periode_pelaksanaan'];
    }
    public function get_id_jenis_responden_from_tbl_user_akses_kuesioner($id_periode_pelaksanaan)
    {
        $query = "SELECT id_jenis_responden FROM tbl_user_akses_kuesioner WHERE id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    public function get_data_id_jenis_kuesioner_by_id_periode_pelaksanaan($id_periode_pelaksanaan)
    {
        $query = "SELECT id_jenis_kuesioner from tbl_pelaksanaan_kuesioner where id_periode_pelaksanaan = '$id_periode_pelaksanaan'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function get_data_total_pertanyaan_per_kuesioner($id_jenis_kuesioner)
    {
        $query = "SELECT count(*) as jumlah_pertanyaan from tbl_pengaturan_susunan_soal where id_jenis_kuesioner = '$id_jenis_kuesioner'";
        $sql = $this->db->query($query);
        return $sql->row_array();
    }
    public function get_data_jenis_kuesioner_by_id_jenis_kuesioner($id_jenis_kuesioner)
    {
        $query = "SELECT b.id_kuesioner FROM tbl_master_jenis_kuesioner a JOIN tbl_master_kuesioner b ON a.id_kuesioner = b.id_kuesioner WHERE a.id_jenis_kuesioner = '$id_jenis_kuesioner' ORDER BY a.id_jenis_kuesioner DESC";
        $sql = $this->kuesioner->query($query);
        return $sql->row_array();
    }
    public function get_data_isian_kuesioner()
    {
        $this->kuesioner->select('p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19, p20, p21, p22');
        $this->kuesioner->from('tmp_bantu_visi_misi');
        $this->kuesioner->order_by('id', 'asc');
        $query = $this->kuesioner->get();
        return $query->result_array();
    }
    public function get_data_isian_kuesioner_tata_pamong()
    {
        $this->kuesioner->select('p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13');
        $this->kuesioner->from('tmp_bantu_tata_pamong');
        $this->kuesioner->order_by('id', 'asc');
        $query = $this->kuesioner->get();
        return $query->result_array();
    }
    public function get_data_isian_kuesioner_sdm()
    {
        $this->kuesioner->select('p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19');
        $this->kuesioner->from('tmp_bantu_sdm');
        $this->kuesioner->order_by('id', 'asc');
        $query = $this->kuesioner->get();
        return $query->result_array();
    }
    public function get_data_isian_kuesioner_keuangan()
    {
        $this->kuesioner->select('p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16');
        $this->kuesioner->from('tmp_bantu_keuangan');
        $this->kuesioner->order_by('id', 'asc');
        $query = $this->kuesioner->get();
        return $query->result_array();
    }
    public function get_data_isian_kuesioner_penelitian()
    {
        $this->kuesioner->select('p1, p2, p3, p4, p5, p6, p7, p8');
        $this->kuesioner->from('tmp_bantu_penelitian');
        $this->kuesioner->order_by('id', 'asc');
        $query = $this->kuesioner->get();
        return $query->result_array();
    }






    //DANANG NAMBAH
    public function get_master_jenis_kuesioner_by_id_kuesioner($id_kuesioner)
    {
        $sql 	= "SELECT id_jenis_kuesioner, id_kuesioner, nama_jenis_kuesioner FROM tbl_master_jenis_kuesioner WHERE id_kuesioner = $id_kuesioner";
        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_master_subjenis_kuesioner_by_id_jenis_kuesioner($id_jenis_kuesioner)
    {
        $sql 	= "SELECT t1.id_subjenis_kuesioner, t1.id_jenis_kuesioner, t1.nama_subjenis_kuesioner, t2.nama_jenis_kuesioner FROM tbl_master_subjenis_kuesioner t1 LEFT JOIN tbl_master_jenis_kuesioner t2 ON t1.id_jenis_kuesioner = t2.id_jenis_kuesioner WHERE t1.id_jenis_kuesioner = $id_jenis_kuesioner";
        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function add_master_subjenis_kuesioner($id_jenis_kuesioner, $nama_subjenis_kuesioner)
    {
        $data = array('id_jenis_kuesioner' => $id_jenis_kuesioner, 'nama_subjenis_kuesioner' => $nama_subjenis_kuesioner);
        return $q = $this->kuesioner->insert('tbl_master_subjenis_kuesioner', $data);
    }

    public function del_master_subjenis_kuesioner($id_subjenis_kuesioner)
    {
        $data = array('id_subjenis_kuesioner' => $id_subjenis_kuesioner);
        return $q = $this->kuesioner->where($data)->delete('tbl_master_subjenis_kuesioner');
    }

    public function get_status_pengisian($nomor_induk, $tahun, $semester = 1, $responden = 4, $status = 'PUBLIC', $kode_unit = 'UN01010')
    {
        if($status == 'UNIT') {
            $where = "(b.opsi_kuesioner = 'UNIT' AND b.kode_unit = '$kode_unit'";
        } else {
            $where = "(b.opsi_kuesioner = 'PUBLIC' OR b.opsi_kuesioner IS NULL)";
        }

        $sql = "SELECT a.id_jenis_responden, a.id_periode_pelaksanaan, b.id_jenis_kuesioner, COALESCE(c.nomor_induk, 'BELUM') AS status
				FROM tbl_user_akses_kuesioner a 
				LEFT JOIN
				tbl_pelaksanaan_kuesioner b ON a.id_periode_pelaksanaan = b.id_periode_pelaksanaan
				LEFT JOIN
					(SELECT nomor_induk, id_periode_pelaksanaan 
					 	FROM tbl_jawaban_kuesioner_responden 
					 	WHERE nomor_induk = '$nomor_induk' GROUP BY nomor_induk, id_periode_pelaksanaan) c
				ON a.id_periode_pelaksanaan = c.id_periode_pelaksanaan
				WHERE a.id_jenis_responden = '$responden' AND b.tahun_pelaksanaan = '$tahun' AND ".$where.";";

        return $q = $this->kuesioner->query($sql)->result_array();
        // return array($sql);

    }

    public function get_jenis_jawaban_rekap($id_jenis_kuesioner)
    {
        $sql = "SELECT a.id_jenis_jawaban, b.nama_jenis_jawaban 
				FROM tbl_pengaturan_susunan_soal a LEFT JOIN tbl_master_jenis_jawaban b ON a.id_jenis_jawaban = b.id_jenis_jawaban 
				WHERE a.id_jenis_kuesioner = '$id_jenis_kuesioner'
				GROUP BY a.id_jenis_jawaban, b.nama_jenis_jawaban";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    //danang aji bimantoro 2020-12-01
    public function get_detail_jawaban_rekap($id_periode_pelaksanaan, $nomor_induk)
    {
        $sql = "SELECT a.nomor_induk, a.id_susunan_soal, a.id_detail_jenis_jawaban, a.id_periode_pelaksanaan, b.id_subjenis_kuesioner FROM tbl_jawaban_kuesioner_responden a
				LEFT JOIN tbl_pengaturan_susunan_soal b ON a.id_susunan_soal = b.id_susunan_soal
				WHERE id_periode_pelaksanaan = '$id_periode_pelaksanaan' 
				AND nomor_induk = '$nomor_induk' GROUP BY a.nomor_induk, a.id_periode_pelaksanaan, b.id_subjenis_kuesioner, a.id_susunan_soal, a.id_detail_jenis_jawaban";

        //GROUP BY a.nomor_induk, a.id_susunan_soal, a.id_detail_jenis_jawaban, a.id_periode_pelaksanaan, b.id_subjenis_kuesioner

        return $q = $this->kuesioner->query($sql)->result_array();
    }
    //danang aji bimantoro [ end ]


    //danang aji bimantoro 2020/03/29
    //ini query untuk generate ke tabel rekapitulasi :
    public function get_data_rekap_kuesioner($id_periode_pelaksanaan)
    {
        $sql = "SELECT 
					A.id_periode_pelaksanaan,
					A.tahun_pelaksanaan,
					A.periode_pelaksanaan,
					C.nomor_induk,
					A.id_jenis_kuesioner,
					B.id_kuesioner,
					C.id_susunan_soal,	
					D.id_subjenis_kuesioner,
					D.id_pertanyaan,
					C.id_detail_jenis_jawaban,
					E.id_jenis_jawaban,
					E.id_jawaban,
					E.bobot_jawaban
				FROM
					tbl_pelaksanaan_kuesioner A
					JOIN tbl_master_jenis_kuesioner B ON A.id_jenis_kuesioner = B.id_jenis_kuesioner
					JOIN tbl_jawaban_kuesioner_responden C ON A.id_periode_pelaksanaan = C.id_periode_pelaksanaan
					JOIN tbl_pengaturan_susunan_soal D ON C.id_susunan_soal = D.id_susunan_soal
					JOIN tbl_detail_jenis_jawaban E ON C.id_detail_jenis_jawaban = E.id_detail_jenis_jawaban
				WHERE
					A.id_periode_pelaksanaan = $id_periode_pelaksanaan
				ORDER BY A.id_periode_pelaksanaan, C.nomor_induk, D.no_urut ASC
				LIMIT 49";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_data_rekap_kuesioner_by_id_user($id_periode_pelaksanaan, $nomor_induk)
    {
        $sql = "SELECT 
					A.id_periode_pelaksanaan,
					A.tahun_pelaksanaan,
					A.periode_pelaksanaan,
					C.nomor_induk,
					A.id_jenis_kuesioner,
					B.id_kuesioner,
					C.id_susunan_soal,	
					D.id_subjenis_kuesioner,
					D.id_pertanyaan,
					C.id_detail_jenis_jawaban,
					E.id_jenis_jawaban,
					E.id_jawaban,
					E.bobot_jawaban
				FROM
					tbl_pelaksanaan_kuesioner A
					JOIN tbl_master_jenis_kuesioner B ON A.id_jenis_kuesioner = B.id_jenis_kuesioner
					JOIN tbl_jawaban_kuesioner_responden C ON A.id_periode_pelaksanaan = C.id_periode_pelaksanaan
					JOIN tbl_pengaturan_susunan_soal D ON C.id_susunan_soal = D.id_susunan_soal
					JOIN tbl_detail_jenis_jawaban E ON C.id_detail_jenis_jawaban = E.id_detail_jenis_jawaban
				WHERE
					A.id_periode_pelaksanaan = $id_periode_pelaksanaan AND c.nomor_induk = '$nomor_induk'
				ORDER BY A.id_periode_pelaksanaan, C.nomor_induk, D.no_urut ASC
				";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function add_data_rekap_kuesioner($data)
    {
        return $q = $this->kuesioner->insert('tb_transaksi_rekap_kuesioner', $data);
    }

    //danang aji bimantoro 2023/02/27
    //fungsi untuk mengambil score akhir kuesioner
    public function get_data_nilai_akhir($kd_ta, $kd_smt)
    {
        if($kd_smt == '1') {
            $temp_kd_smt = 'S1';
        } else {
            $temp_kd_smt = 'S2';
        }

        $sql = "SELECT SUM(bobot_jawaban * jumlah_jawaban_responden) AS total_poin,
			SUM(jumlah_jawaban_responden) AS total_jawaban_responden,
			SUM(bobot_jawaban * jumlah_jawaban_responden) / SUM(jumlah_jawaban_responden)::FLOAT nilai_akhir
			FROM tb_transaksi_rekap_kuesioner
			WHERE tahun_pelaksanaan = '".$kd_ta."'
			AND periode_pelaksanaan = '".$temp_kd_smt."';";

        return $q = $this->kuesioner->query($sql)->row_array();
    }

    public function get_data_nilai_akhir_mahasiswa($kd_ta, $kd_smt)
    {
        if($kd_smt == '1') {
            $temp_kd_smt = 'S1';
        } else {
            $temp_kd_smt = 'S2';
        }

        $sql = "SELECT SUM(bobot_jawaban * jumlah_jawaban_responden) AS total_poin,
			SUM(jumlah_jawaban_responden) AS total_jawaban_responden,
			SUM(bobot_jawaban * jumlah_jawaban_responden) / SUM(jumlah_jawaban_responden)::FLOAT nilai_akhir
			FROM tb_transaksi_rekap_kuesioner
			WHERE tahun_pelaksanaan = '".$kd_ta."'
			AND periode_pelaksanaan = '".$temp_kd_smt."'
			AND id_jenis_responden = 4;"; // hanya responden mahasiswa

        return $q = $this->kuesioner->query($sql)->row_array();
    }


    //ini info untuk get filter form :
    public function get_info_master_survey($id_jenis_responden)
    {
        $sql = "SELECT DISTINCT A.id_kuesioner, B.nama_kuesioner FROM tb_transaksi_rekap_kuesioner A JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner WHERE A.id_jenis_responden = $id_jenis_responden";
        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_master_jawaban_survey($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan)
    {
        $sql = "
			SELECT
				A.id_jenis_responden,
				A.id_kuesioner,
				A.id_jawaban,
				A.bobot_jawaban,
				B.jawaban
			FROM tb_transaksi_rekap_kuesioner A
			JOIN tbl_master_jawaban B ON A.id_jawaban = B.id_jawaban
			WHERE
				A.id_jenis_responden = $id_jenis_responden AND
				A.id_kuesioner = $id_kuesioner AND
				A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
				A.periode_pelaksanaan = '$periode_pelaksanaan'
			GROUP BY
				A.id_jenis_responden,
				A.id_kuesioner,
				A.tahun_pelaksanaan,
				A.periode_pelaksanaan,
				A.id_jawaban,
				A.bobot_jawaban,
				B.jawaban
			ORDER BY
				A.id_jenis_responden,
				A.id_kuesioner,
				A.tahun_pelaksanaan,
				A.periode_pelaksanaan,
				A.id_jawaban,
				A.bobot_jawaban;
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_master_jawaban_survey_q($id_jenis_responden, $id_kuesioner, $kd_prodi)
    {
        $sql = "
			
	SELECT * FROM kuesioner.tbl_master_subjenis_kuesioner
	WHERE id_subjenis_kuesioner IN(	SELECT
   
				   DISTINCT(A.id_subjenis_kuesioner)
				   
			   
			   FROM tb_transaksi_rekap_kuesioner A
			   JOIN kuesioner.tbl_master_subjenis_kuesioner B ON A.id_subjenis_kuesioner = B.id_subjenis_kuesioner
			   
			   WHERE
				   
				   
			   A.id_jenis_responden = $id_jenis_responden AND
			   A.id_kuesioner = $id_kuesioner AND
			  
			   A.kd_prodi            = '$kd_prodi'
			   
			   GROUP BY
				   A.id_jenis_responden,
				   A.id_kuesioner,
				   A.tahun_pelaksanaan,
				   A.periode_pelaksanaan,
				   A.id_jawaban,
				   A.bobot_jawaban,
				   B.nama_subjenis_kuesioner,
				   A.id_subjenis_kuesioner
				   )
   
					
		
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }
    public function get_info_periode_pengisian_survey($id_jenis_responden, $id_kuesioner)
    {
        $sql = "SELECT id_kuesioner, tahun_pelaksanaan, periode_pelaksanaan FROM tb_transaksi_rekap_kuesioner WHERE id_jenis_responden = $id_jenis_responden AND id_kuesioner = $id_kuesioner GROUP BY id_kuesioner, tahun_pelaksanaan, periode_pelaksanaan ORDER BY tahun_pelaksanaan DESC, periode_pelaksanaan DESC";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    //ini fungsi awal LUCK, jadikan contoh, kalau ada perubahan dikasih keterangan, lebih aman lagi dibuat fungsi baru untuk prodi bikin ngacau fungsi yang sudah jalan kalau asal ngubah ubah
    // fungsi get_rekap_pengisian_survey ini jangan kamu rubah LUCK
    public function get_rekap_pengisian_survey_ori($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan)
    {
        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				A.total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				) A
				JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
				JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
				JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
				JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
				JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
				WHERE
					A.id_jenis_responden = $id_jenis_responden AND
					A.id_kuesioner = $id_kuesioner AND
					A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
					A.periode_pelaksanaan = '$periode_pelaksanaan'
				ORDER BY
					A.id_jenis_responden,
					A.id_kuesioner,
					A.id_jenis_kuesioner,
					A.id_subjenis_kuesioner,
					A.id_pertanyaan,
					A.id_jawaban,
					A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_data_grfk_luc($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan = array(), $kd_prodi)
    {
        $qwr = "
		SELECT 
		A.periode_pelaksanaan,
		A.tahun_pelaksanaan,
		A.id_jenis_responden,
		A.id_kuesioner,
		B.nama_kuesioner,
		A.id_jenis_kuesioner,
		C.nama_jenis_kuesioner,
		A.id_subjenis_kuesioner,
		D.nama_subjenis_kuesioner,
		A.id_pertanyaan,
		E.pertanyaan,
		A.id_jawaban,
		F.jawaban,
		A.bobot_jawaban,
		A.total_responden,
		A.kd_prodi
	FROM (
		SELECT
			id_jenis_responden,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban,
			kd_prodi,
			SUM(jumlah_jawaban_responden) AS total_responden
		FROM tb_transaksi_rekap_kuesioner
		GROUP BY 
			id_jenis_responden,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban,
			kd_prodi
		ORDER BY
			id_jenis_responden,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban,
			kd_prodi
		) A
		JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
		JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
		JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
		JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
		JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
		WHERE
			A.id_jenis_responden = $id_jenis_responden AND
			A.id_kuesioner = $id_kuesioner AND
			A.tahun_pelaksanaan IN($tahun_pelaksanaan)  AND
			A.periode_pelaksanaan IN('S1','S2') AND
			A.kd_prodi            = '$kd_prodi'
		ORDER BY
			A.id_jenis_responden,
			A.id_kuesioner,
			A.id_jenis_kuesioner,
			A.id_subjenis_kuesioner,
			A.id_pertanyaan,
			A.id_jawaban,
			A.bobot_jawaban
		";
        // return $qwr;
        return $q = $this->kuesioner->query($qwr)->result_array();

    }

    public function get_rekap_pengisian_survey_detail_univ($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan)
    {
        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.kd_unit,
				A.kd_fak,
				A.kd_prodi,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				A.total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					kd_unit,
					kd_fak,
					kd_prodi,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					kd_unit,
					kd_fak,
					kd_prodi,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					kd_unit,
					kd_fak,
					kd_prodi,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				) A
				JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
				JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
				JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
				JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
				JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
				WHERE
					A.id_jenis_responden = $id_jenis_responden AND
					A.id_kuesioner = $id_kuesioner AND
					A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
					A.periode_pelaksanaan = '$periode_pelaksanaan'
				ORDER BY
					A.id_jenis_responden,
					A.id_kuesioner,
					A.kd_unit,
					A.kd_fak,
					A.kd_prodi,
					A.id_jenis_kuesioner,
					A.id_subjenis_kuesioner,
					A.id_pertanyaan,
					A.id_jawaban,
					A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_rekap_pengisian_survey($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan, $id_prodi)
    {
        $kdd = "AND A.kd_prodi            = '$id_prodi'";
        // $kdd = "A.kd_unit            = '$id_prodi'";
        $prdd = "A.kd_prodi";
        $kd_prodi = "kd_prodi";
        if($id_jenis_responden == 3) {
            $kdd = "AND A.kd_unit            = '$id_prodi'";
            $prdd = "A.kd_unit";
            $kd_prodi = "kd_unit";
        }
        if($id_prodi=='UNIV'){
 $kdd ="";
        }
        $arrayName = array('id_jenis_responden' => $id_jenis_responden ,'id_kuesioner' => $id_kuesioner,'tahun_pelaksanaan' => $tahun_pelaksanaan,'periode_pelaksanaan' => $periode_pelaksanaan,'id_prodi' => $id_prodi);
        // return $arrayName;
        $sql = "
		SELECT 
		A.id_jenis_responden,
		A.id_kuesioner,
		B.nama_kuesioner,
		A.id_jenis_kuesioner,
		C.nama_jenis_kuesioner,
		A.id_subjenis_kuesioner,
		D.nama_subjenis_kuesioner,
		A.id_pertanyaan,
		E.pertanyaan,
		A.id_jawaban,
		F.jawaban,
		A.bobot_jawaban,
		A.total_responden,
		".$prdd."
	FROM (
		SELECT
			id_jenis_responden,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban,
			".$kd_prodi.",
			SUM(jumlah_jawaban_responden) AS total_responden
		FROM tb_transaksi_rekap_kuesioner
		GROUP BY 
			id_jenis_responden,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban,
			".$kd_prodi."
		ORDER BY
			id_jenis_responden,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban,
			".$kd_prodi."
		) A
		JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
		JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
		JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
		JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
		JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
		WHERE
			A.id_jenis_responden = $id_jenis_responden AND
			A.id_kuesioner = $id_kuesioner AND
			A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
			A.periode_pelaksanaan = '$periode_pelaksanaan'
			".$kdd."
			
		ORDER BY
			A.id_jenis_responden,
			A.id_kuesioner,
			A.id_jenis_kuesioner,
			A.id_subjenis_kuesioner,
			A.id_pertanyaan,
			A.id_jawaban,
			A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }


    /*public function get_rekap_pengisian_survey_univ($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan){
        $sql = "
        SELECT
        A.id_jenis_responden,
        A.id_kuesioner,
        B.nama_kuesioner,
        A.id_jenis_kuesioner,
        C.nama_jenis_kuesioner,
        A.id_subjenis_kuesioner,
        D.nama_subjenis_kuesioner,
        A.id_pertanyaan,
        E.pertanyaan,
        A.id_jawaban,
        F.jawaban,
        A.bobot_jawaban,
        A.total_responden,
        A.kd_prodi
    FROM (
        SELECT
            id_jenis_responden,
            tahun_pelaksanaan,
            periode_pelaksanaan,
            id_kuesioner,
            id_jenis_kuesioner,
            id_subjenis_kuesioner,
            id_pertanyaan,
            id_jawaban,
            bobot_jawaban,
            kd_prodi,
            SUM(jumlah_jawaban_responden) AS total_responden
        FROM tb_transaksi_rekap_kuesioner
        GROUP BY
            id_jenis_responden,
            tahun_pelaksanaan,
            periode_pelaksanaan,
            id_kuesioner,
            id_jenis_kuesioner,
            id_subjenis_kuesioner,
            id_pertanyaan,
            id_jawaban,
            bobot_jawaban,
            kd_prodi
        ORDER BY
            id_jenis_responden,
            tahun_pelaksanaan,
            periode_pelaksanaan,
            id_kuesioner,
            id_jenis_kuesioner,
            id_subjenis_kuesioner,
            id_pertanyaan,
            id_jawaban,
            bobot_jawaban,
            kd_prodi
        ) A
        JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
        JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
        JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
        JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
        JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
        WHERE
            A.id_jenis_responden = $id_jenis_responden AND
            A.id_kuesioner = $id_kuesioner AND
            A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
            A.periode_pelaksanaan = '$periode_pelaksanaan'

        ORDER BY
            A.id_jenis_responden,
            A.id_kuesioner,
            A.id_jenis_kuesioner,
            A.id_subjenis_kuesioner,
            A.id_pertanyaan,
            A.id_jawaban,
            A.bobot_jawaban
        ";

        return $q = $this->kuesioner->query($sql)->result_array();
    }*/

    public function get_rekap_pengisian_survey_univ($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan)
    {
        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				A.total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				) A
				JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
				JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
				JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
				JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
				JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
				WHERE
					A.id_jenis_responden = $id_jenis_responden AND
					A.id_kuesioner = $id_kuesioner AND
					A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
					A.periode_pelaksanaan = '$periode_pelaksanaan'
				ORDER BY
					A.id_jenis_responden,
					A.id_kuesioner,
					A.id_jenis_kuesioner,
					A.id_subjenis_kuesioner,
					A.id_pertanyaan,
					A.id_jawaban,
					A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_rekap_pengisian_survey_unit($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan)
    {
        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.kd_unit,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				A.total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				) A
				JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
				JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
				JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
				JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
				JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
				WHERE
					A.id_jenis_responden = $id_jenis_responden AND
					A.id_kuesioner = $id_kuesioner AND
					A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
					A.periode_pelaksanaan = '$periode_pelaksanaan'
				ORDER BY
					A.id_jenis_responden,
					A.kd_unit,
					A.id_kuesioner,
					A.id_jenis_kuesioner,
					A.id_subjenis_kuesioner,
					A.id_pertanyaan,
					A.id_jawaban,
					A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_rekap_pengisian_survey_unitt($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan, $unit)
    {
        $hhhh=" AND A.kd_unit = '$unit'";

                    if($unit=='UNIV'){
                        $hhhh="";
                    }

        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.kd_unit,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				A.total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				) A
				JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
				JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
				JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
				JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
				JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
				WHERE
					A.id_jenis_responden = $id_jenis_responden AND
					A.id_kuesioner = $id_kuesioner AND
					A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
					A.periode_pelaksanaan = '$periode_pelaksanaan'
					".$hhhh."
				ORDER BY
					A.id_jenis_responden,
					A.kd_unit,
					A.id_kuesioner,
					A.id_jenis_kuesioner,
					A.id_subjenis_kuesioner,
					A.id_pertanyaan,
					A.id_jawaban,
					A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_rekap_pengisian_survey_fakultas($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan)
    {
        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.kd_fak,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				A.total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_fak,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_fak,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_fak,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				) A
				JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
				JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
				JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
				JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
				JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
				WHERE
					A.id_jenis_responden = $id_jenis_responden AND
					A.id_kuesioner = $id_kuesioner AND
					A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
					A.periode_pelaksanaan = '$periode_pelaksanaan'
				ORDER BY
					A.id_jenis_responden,
					A.kd_fak,
					A.id_kuesioner,
					A.id_jenis_kuesioner,
					A.id_subjenis_kuesioner,
					A.id_pertanyaan,
					A.id_jawaban,
					A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_rekap_pengisian_survey_prodi($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan, $kd_fak)
    {
        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.kd_prodi,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				A.total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_fak,
					kd_prodi,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_fak,
					kd_prodi,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_fak,
					kd_prodi,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				) A
				JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
				JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
				JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
				JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
				JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
				WHERE
					A.id_jenis_responden = $id_jenis_responden AND
					A.id_kuesioner = $id_kuesioner AND
					A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
					A.periode_pelaksanaan = '$periode_pelaksanaan' AND
					A.kd_fak = '$kd_fak'
				ORDER BY
					A.id_jenis_responden,
					A.kd_prodi,
					A.id_kuesioner,
					A.id_jenis_kuesioner,
					A.id_subjenis_kuesioner,
					A.id_pertanyaan,
					A.id_jawaban,
					A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_rekap_pengisian_survey_prodi_laporan($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan, $id_prd)
    {
        $sql = "
		SELECT 
		A.id_jenis_responden,
		kd_prodi,
		A.id_kuesioner,
		B.nama_kuesioner,
		A.id_jenis_kuesioner,
		C.nama_jenis_kuesioner,
		A.id_subjenis_kuesioner,
		D.nama_subjenis_kuesioner,
		A.id_pertanyaan,
		E.pertanyaan,
		A.id_jawaban,
		F.jawaban,
		A.bobot_jawaban,
		A.total_responden
	FROM (
		SELECT
			id_jenis_responden,
			tahun_pelaksanaan,
			kd_prodi,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban,
			SUM(jumlah_jawaban_responden) AS total_responden
		FROM tb_transaksi_rekap_kuesioner
		GROUP BY 
			id_jenis_responden,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			kd_prodi,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban
		ORDER BY
			id_jenis_responden,
			kd_prodi,
			tahun_pelaksanaan,
			periode_pelaksanaan,
			id_kuesioner,
			id_jenis_kuesioner,
			id_subjenis_kuesioner,
			id_pertanyaan,
			id_jawaban,
			bobot_jawaban
		) A
		JOIN tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
		JOIN tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
		JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
		JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
		JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
		WHERE
			A.id_jenis_responden = $id_jenis_responden AND
			A.id_kuesioner = $id_kuesioner AND
			A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
			A.periode_pelaksanaan = '$periode_pelaksanaan'AND
			A.kd_prodi='$id_prd'
		ORDER BY
			A.id_jenis_responden,
			kd_prodi,
			A.id_kuesioner,
			A.id_jenis_kuesioner,
			A.id_subjenis_kuesioner,
			A.id_pertanyaan,
			A.id_jawaban,
			A.bobot_jawaban
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_rekap_pengisian_survey_prodi_lkps($id_jenis_responden, $kd_prodi, $str_arr_tahun_pelaksanaan, $str_arr_periode_pelaksanaan)
    {
        $sql = "
			SELECT 
				A.id_jenis_responden,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban,
				SUM(A.total_responden) AS total_responden
			FROM (
				SELECT
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					kd_fak,
					kd_prodi,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban,
					SUM(jumlah_jawaban_responden) AS total_responden
				FROM kuesioner.tb_transaksi_rekap_kuesioner
				GROUP BY 
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					kd_unit,
					kd_fak,
					kd_prodi,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
				ORDER BY
					id_jenis_responden,
					tahun_pelaksanaan,
					periode_pelaksanaan,
					id_kuesioner,
					id_jenis_kuesioner,
					id_subjenis_kuesioner,
					id_pertanyaan,
					id_jawaban,
					bobot_jawaban
			) A
			JOIN kuesioner.tbl_master_kuesioner B ON A.id_kuesioner = B.id_kuesioner
			JOIN kuesioner.tbl_master_jenis_kuesioner C ON A.id_jenis_kuesioner = C.id_jenis_kuesioner
			JOIN kuesioner.tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
			JOIN kuesioner.tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan
			JOIN kuesioner.tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
			WHERE
				A.id_jenis_responden = '$id_jenis_responden' AND
				A.kd_prodi = '$kd_prodi' AND
				A.tahun_pelaksanaan IN (".$str_arr_tahun_pelaksanaan.") AND
				A.periode_pelaksanaan IN (".$str_arr_periode_pelaksanaan.")
			GROUP BY
				A.id_jenis_responden,
				A.id_kuesioner,
				B.nama_kuesioner,
				A.id_jenis_kuesioner,
				C.nama_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				D.nama_subjenis_kuesioner,
				A.id_pertanyaan,
				E.pertanyaan,
				A.id_jawaban,
				F.jawaban,
				A.bobot_jawaban
			ORDER BY
				A.id_jenis_responden,
				A.id_kuesioner,
				A.id_jenis_kuesioner,
				A.id_subjenis_kuesioner,
				A.id_pertanyaan,
				A.id_jawaban,
				A.bobot_jawaban;
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    public function get_tahun_pelaksanaan()
    {
        $sql = "
		SELECT id_kuesioner, tahun_pelaksanaan, periode_pelaksanaan,A.id_subjenis_kuesioner,B.nama_subjenis_kuesioner 
		FROM tb_transaksi_rekap_kuesioner A
		 JOIN tbl_master_subjenis_kuesioner B ON A.id_subjenis_kuesioner= B.id_subjenis_kuesioner
		 
		WHERE id_jenis_responden = 4 AND id_kuesioner = 19 GROUP BY id_kuesioner, tahun_pelaksanaan, periode_pelaksanaan,A.id_subjenis_kuesioner 
		,B.nama_subjenis_kuesioner 
		";

        return $q = $this->kuesioner->query($sql)->result_array();
    }

    //danang aji bimantoro [ end ]































    // lucky nambah
    public function jenis_kuesionerk()
    {
        $sql = "SELECT id_jenis_kuesioner,nama_jenis_kuesioner FROM public.tbl_master_jenis_kuesioner";
        return $q = $this->kuesioner->query($sql)->result_array();
    }




    public function grafik_trend($id_jenis_responden, $id_kuesioner, $tahun_pelaksanaan, $periode_pelaksanaan, $kd_prodi)
    {

        if ($id_jenis_responden == 4) {
            $sql = "		
			SELECT tahun_pelaksanaan,periode_pelaksanaan,nama_subjenis_kuesioner, avg(ikm)AS rat_rat_ikm FROM(SELECT tahun_pelaksanaan,periode_pelaksanaan,nama_subjenis_kuesioner,id_pertanyaan,
			(ttl_rat_rata/total)*25 AS ikm FROM(SELECT ff.tahun_pelaksanaan,ff.periode_pelaksanaan,nama_subjenis_kuesioner,ff.id_pertanyaan,ff.pertanyaan, sum(rata_rata) AS ttl_rat_rata,total,ds.pertanyaan 
			from(SELECT tahun_pelaksanaan,periode_pelaksanaan,nama_subjenis_kuesioner,id_pertanyaan,jawaban,pertanyaan,avg(totalrespondent)AS rata_rata from(SELECT tahun_pelaksanaan,periode_pelaksanaan,
			D.nama_subjenis_kuesioner,F.jawaban,E.id_pertanyaan,E.pertanyaan,bobot_jawaban*jumlah_jawaban_responden AS totalrespondent
			FROM kuesioner.tb_transaksi_rekap_kuesioner AS A INNER  JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
			 INNER JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan INNER  JOIN tbl_master_subjenis_kuesioner D ON A.id_subjenis_kuesioner = D.id_subjenis_kuesioner
					WHERE 
						A.id_jenis_responden = $id_jenis_responden AND
						A.id_kuesioner = $id_kuesioner AND
						A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
						A.periode_pelaksanaan = '$periode_pelaksanaan'AND
						A.kd_prodi            = '$kd_prodi'	
						
						GROUP BY tahun_pelaksanaan,periode_pelaksanaan,D.nama_subjenis_kuesioner,F.jawaban,E.pertanyaan,E.id_pertanyaan, E.pertanyaan,totalrespondent) AS A
						GROUP by tahun_pelaksanaan,periode_pelaksanaan,nama_subjenis_kuesioner,jawaban,pertanyaan,id_pertanyaan) AS ff
						LEFT join ttl_samle_grafik_trend ds ON ff.id_pertanyaan=ds.id_pertanyaan
						WHERE ds.kd_prodi='$kd_prodi' AND ds.tahun_pelaksanaan = '$tahun_pelaksanaan' AND ds.periode_pelaksanaan = '$periode_pelaksanaan'AND
						ds.id_kuesioner = $id_kuesioner
						GROUP by ff.tahun_pelaksanaan,ff.periode_pelaksanaan,nama_subjenis_kuesioner,ff.pertanyaan,ff.id_pertanyaan,total,ds.pertanyaan)AS we
						
						GROUP by tahun_pelaksanaan,periode_pelaksanaan,nama_subjenis_kuesioner,id_pertanyaan,we.ttl_rat_rata,we.total) AS gt 
						GROUP by tahun_pelaksanaan,periode_pelaksanaan,nama_subjenis_kuesioner
					
					";

        } else {

            $sql = "		
			SELECT tahun_pelaksanaan,periode_pelaksanaan,nama_jenis_kuesioner, avg(ikm)AS rat_rat_ikm FROM(SELECT tahun_pelaksanaan,periode_pelaksanaan,nama_jenis_kuesioner,id_pertanyaan,
			(ttl_rat_rata/total)*25 AS ikm FROM(SELECT ff.tahun_pelaksanaan,ff.periode_pelaksanaan,nama_jenis_kuesioner,ff.id_pertanyaan,ff.pertanyaan, sum(rata_rata) AS ttl_rat_rata,total,
			ds.pertanyaan from(SELECT tahun_pelaksanaan,periode_pelaksanaan,nama_jenis_kuesioner,id_pertanyaan,jawaban,pertanyaan,avg(totalrespondent)AS rata_rata from
			(SELECT tahun_pelaksanaan,periode_pelaksanaan,D.nama_jenis_kuesioner,F.jawaban,E.id_pertanyaan,E.pertanyaan,bobot_jawaban*jumlah_jawaban_responden AS totalrespondent
			FROM kuesioner.tb_transaksi_rekap_kuesioner AS A INNER  JOIN tbl_master_jawaban F ON A.id_jawaban = F.id_jawaban
			INNER JOIN tbl_master_pertanyaan E ON A.id_pertanyaan = E.id_pertanyaan INNER  JOIN tbl_master_jenis_kuesioner D ON A.id_jenis_kuesioner = D.id_jenis_kuesioner
			WHERE 
			A.id_jenis_responden = $id_jenis_responden AND
			A.id_kuesioner = $id_kuesioner AND
			A.tahun_pelaksanaan = '$tahun_pelaksanaan' AND
			A.periode_pelaksanaan = '$periode_pelaksanaan'AND
			A.kd_prodi            = '$kd_prodi'	
			
			GROUP BY tahun_pelaksanaan,periode_pelaksanaan,D.nama_jenis_kuesioner,F.jawaban,E.pertanyaan,E.id_pertanyaan, E.pertanyaan,totalrespondent) AS A
			GROUP by tahun_pelaksanaan,periode_pelaksanaan,nama_jenis_kuesioner,jawaban,pertanyaan,id_pertanyaan) AS ff
			LEFT join ttl_samle_grafik_trend ds ON ff.id_pertanyaan=ds.id_pertanyaan
			WHERE ds.kd_prodi='$kd_prodi' AND ds.tahun_pelaksanaan = '$tahun_pelaksanaan' AND ds.periode_pelaksanaan = '$periode_pelaksanaan'AND
			ds.id_kuesioner = $id_kuesioner
			GROUP by ff.tahun_pelaksanaan,ff.periode_pelaksanaan,nama_jenis_kuesioner,ff.pertanyaan,ff.id_pertanyaan,total,ds.pertanyaan)AS we
			
			GROUP by tahun_pelaksanaan,periode_pelaksanaan,nama_jenis_kuesioner,id_pertanyaan,we.ttl_rat_rata,we.total) AS gt 
			GROUP by tahun_pelaksanaan,periode_pelaksanaan,nama_jenis_kuesioner
					
					";


        }

        return $q = $this->kuesioner->query($sql)->result_array();

    }

    public function get_info_periode_pengisian_survey_br($id_jenis_responden, $id_kuesioner)
    {
        $sql = "SELECT id_kuesioner, tahun_pelaksanaan, periode_pelaksanaan FROM tb_transaksi_rekap_kuesioner WHERE id_jenis_responden = $id_jenis_responden AND id_kuesioner = $id_kuesioner GROUP BY id_kuesioner, tahun_pelaksanaan, periode_pelaksanaan ORDER BY tahun_pelaksanaan ASC, periode_pelaksanaan ASC";

        return $q = $this->kuesioner->query($sql)->result_array();
    }


}
?>
