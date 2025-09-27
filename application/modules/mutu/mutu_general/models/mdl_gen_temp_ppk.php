<?php

if(!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Mdl_gen_temp_ppk extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->mutu = $this->load->database('ppk');
    }

    public function get_data($par)
    {
        $table = (!empty($par['TABLE']) ? $par['TABLE'] : '');
        if(!empty($par['SELECT'])) {
            $this->mutu->select($par['SELECT']);
        }
        $this->mutu->from($table);
        if(!empty($par['WHERE_IN'])) {
            foreach($par['WHERE_IN'] as $key => $val) {
                $this->mutu->where_in($key, $val);
            }
        }
        if(!empty($par['WHERE_LIKE'])) {
            $n = 1;
            foreach($par['WHERE_LIKE'] as $key => $val) {
                if($n == 1) {
                    $this->mutu->like('UPPER(' . $key . ')', strtoupper($val));
                } else {
                    $this->mutu->or_like('UPPER(' . $key . ')', strtoupper($val));
                }
                $n++;
            }
        }
        if(!empty($par['WHERE'])) {
            $this->mutu->where($par['WHERE']);
        }
        if(!empty($par['ORDER'])) {
            $this->mutu->order_by($par['ORDER']);
        }
        if(!empty($par['LIMIT']) && !empty($par['INDEX'])) {
            $this->mutu->limit($par['LIMIT'], $par['INDEX']);
        } else {
            if(!empty($par['LIMIT'])) {
                $this->mutu->limit($par['LIMIT']);
            }
        }
        $data	= $this->mutu->get();
        return $data->result();
    }
    //get data versi 3 untuk ipepa kususnya by LAF
    public function get_data_v3($par)
    {
        $table = (!empty($par['TABLE']) ? $par['TABLE'] : '');
        if(!empty($par['SELECT'])) {
            $this->mutu->select($par['SELECT']);
        }
        if (!empty($par['distinct'])) {
            # code...
            if ($par['distinct'] == 1) {
                $this->mutu->distinct();
            }
        }
        $this->mutu->from($table);
        if(!empty($par['WHERE_IN'])) {
            foreach($par['WHERE_IN'] as $key => $val) {
                $this->mutu->where_in($key, $val);
            }
        }
        if(!empty($par['WHERE_LIKE'])) {
            $n = 1;
            foreach($par['WHERE_LIKE'] as $key => $val) {
                if($n == 1) {
                    $this->mutu->like('UPPER(' . $key . '::text)', strtoupper($val));
                } else {
                    $this->mutu->or_like('UPPER(' . $key . '::text)', strtoupper($val));
                }
                $n++;
            }
        }
        if(!empty($par['WHERE'])) {
            $this->mutu->where($par['WHERE']);
        }

        if (!empty($par['WHERE_DATE_ONLY']['NAME'])) {//where select date only

            $name = $par['WHERE_DATE_ONLY']['NAME'];
            $date = $par['WHERE_DATE_ONLY']['DATE'];

            $this->mutu->where($name . ' :: date=', $date);

        }
        if(!empty($par['ORDER'])) {
            $this->mutu->order_by($par['ORDER']);
        }
        if(!empty($par['LIMIT']) && !empty($par['INDEX'])) {
            $this->mutu->limit($par['LIMIT'], $par['INDEX']);
        } else {
            if(!empty($par['LIMIT'])) {
                $this->mutu->limit($par['LIMIT']);
            }
        }
        $data	= $this->mutu->get();
        return $data->result();
    }
    // ===========================end of it
    public function get_data_v2($par)
    {
        $table = (!empty($par['TABLE']) ? $par['TABLE'] : '');
        if(!empty($par['SELECT'])) {
            $this->mutu->select($par['SELECT']);
        }
        $this->mutu->from($table);
        if(!empty($par['WHERE_IN'])) {
            foreach($par['WHERE_IN'] as $key => $val) {
                $this->mutu->where_in($key, $val);
            }
        }
        if(!empty($par['WHERE_LIKE'])) {
            $n = 1;
            foreach($par['WHERE_LIKE'] as $key => $val) {
                if($n == 1) {
                    $this->mutu->like('UPPER(' . $key . ')', strtoupper($val));
                } else {
                    $this->mutu->or_like('UPPER(' . $key . ')', strtoupper($val));
                }
                $n++;
            }
        }
        if(!empty($par['WHERE'])) {
            $this->mutu->where($par['WHERE']);
        }
        if(!empty($par['ORDER'])) {
            $this->mutu->order_by($par['ORDER']);
        }
        if(!empty($par['LIMIT']) && !empty($par['INDEX'])) {
            $this->mutu->limit($par['LIMIT'], $par['INDEX']);
        } else {
            if(!empty($par['LIMIT'])) {
                $this->mutu->limit($par['LIMIT']);
            }
        }
        $data	= $this->mutu->get()->row_array();
        if (isset($data['file_dokumen'])) {
            $file = $data['file_dokumen'];
            $panjang = strlen($file);
            $pembagi = 5000000;
            $bagi = ceil($panjang / $pembagi);
            $array = array();
            for ($i = 0; $i < $bagi; $i++) {
                $start = $i * $pembagi;
                $tamp = substr($file, $start, $pembagi);
                $array[$i] = $tamp;
            }
            $data['file_dokumen'] = $array;
        }
        return $data;
    }

    public function get_data_by_field_array($table, $where)
    {
        $query = $this->mutu->get_where($table, $where);
        return $query->result();
    }

    public function insert_data($par)
    {
        $table			= (!empty($par['TABLE']) ? $par['TABLE'] : '');
        $data			= (!empty($par['DATA']) ? $par['DATA'] : '');
        if (isset($data['file_dokumen'])) {
            if (is_array($data['file_dokumen'])) {
                $data['file_dokumen'] = implode($data['file_dokumen']);
            }
        }
        $output_id	= (!empty($par['OUTPUT']) ? $par['OUTPUT'] : false);
        if($this->mutu->insert($table, $data)) {
            // return $data;
            if($output_id == true) {
                // return $output_id;
                $id = $this->mutu->insert_id();

                //danang aji bimantoro 2020-12-03
                //kalo memang banyak kebutuhan bisa diganti jadi switch case, insert_id tidak bekerja dengan baik di postgres
                // if($table == 'isi_borang'){
                // 	$sql = "SELECT CURRVAL('isi_borang_id_isi_borang_seq') AS id;";
                // 	$q = $this->mutu->query($sql)->row_array();

                // 	if(!empty($q)){
                // 		$id = $q['id'];
                // 	}
                // }
                //danang aji bimantoro [ end ]

                return $id ;
            } else {
                return true;
            }
        } else {
            return $this->mutu->last_query();
        }
    }

    public function insert_data_last_dokumen($par)
    {
        $table			= (!empty($par['TABLE']) ? $par['TABLE'] : '');
        $data			= (!empty($par['DATA']) ? $par['DATA'] : '');
        $output_id	= (!empty($par['OUTPUT']) ? $par['OUTPUT'] : false);
        // $columns = implode(", ",array_keys($data));
        // $escaped_values = array_map('mysql_real_escape_string', array_values($data));
        // $values  = implode(", ", $escaped_values);
        // $query="INSERT INTO aspek_dokumentasi (id_aspek,id_dokumentasi, kd_pgw, no_butir, no_urut, waktu_simpan) VALUES ('".$data['id_aspek']."','".$data['id_dokumentasi']."','".$data['kd_pgw']."','".$data['no_butir']."','".$data['no_urut']."','".$data['waktu_simpan']."') RETURNING ";
        // $kem="SELECT currval('aspek_dokumentasi_id_aspek_dokumentasi_seq')";
        // $kemb=$this->mutu->query($query);
        // $ret=$this->mutu->query($kem);
        return $this->mutu->insert($table, $data);
        foreach ($data as $key) {
            $key['id_dokumentasi'];
            $key['id_aspek'];
            $key['no_urut'];
            $key['no_butir'];
            $key['kd_pgw'];
            $key['waktu_simpan'];

        }
        // foreach ($data as $key ) {
        // 	 $fieldVal1 = mysql_real_escape_string($sata[$key]['id_dokumentasi']);
        // 	 $fieldVal2 = mysql_real_escape_string($sata[$key]['id_aspek']);
        // 	 $fieldVal3 = mysql_real_escape_string($sata[$key]['no_urut']);
        // 	 $fieldVal4 = mysql_real_escape_string($sata[$key]['no_butir']);
        // 	 $fieldVal5 = mysql_real_escape_string($sata[$key]['kd_pgw']);
        // 	 $fieldVal6 = mysql_real_escape_string($sata[$key]['waktu_simpan']);
        // 	 $query ="INSERT INTO aspek_dokumentasi (id_dokumentasi, id_aspek, no_urut,no_butir,kd_pgw,waktu_simpan) VALUES ( '". $fieldVal1."','".$fieldVal2."','".$fieldVal3."','".$fieldVal4."','".$fieldVal5.",'".$fieldVal6." )";
        // 	 $hasil=$this->mutu->query($query);
        // }


        // $query="INSERT INTO aspek_dokumentasi ('".$columns."')VALUES('".$values."')";
        // return $this->mutu->query($query);
        // $dataa['id_aspek_dokumentasi'] = $this->mutu->insert_id();
        // $query="SELECT currval('aspek_dokumentasi_id_aspek_dokumentasi_seq')";
        // return $this->mutu->query("SELECT currval('aspek_dokumentasi_id_aspek_dokumentasi_seq')");
        // return $sql;
        # code...
    }

    public function update_data($par)
    {
        $table			= (!empty($par['TABLE']) ? $par['TABLE'] : '');
        $data			= (!empty($par['DATA']) ? $par['DATA'] : null);
        $where		= (!empty($par['WHERE']) ? $par['WHERE'] : '');
        if($this->mutu->update($table, $data, $where)) {
            return true;
        } else {
            return false;
        }
    }

    // FAUZI COBA BUAT FUNGSI LAIN 19-07-18 START
    // function update_data_v2($par){
    // 	$table		= (!empty($par['TABLE']) ? $par['TABLE'] : '');
    // 	$data		= (!empty($par['DATA']) ? $par['DATA'] : '');
    // 	$where		= (!empty($par['WHERE']) ? $par['WHERE'] : '');
    // 	if ($table != '' && $where != '') {
    // 		$query = 'UPDATE '.$table;

    // 		$key = array_keys($data);
    // 		$count = count($key);
    // 		$set = array();
    // 		for ($i=0; $i < $count; $i++) {
    // 			$set[] = $key[$i]."='".$data[$key[$i]]."'";
    // 		}
    // 		$set = implode(", ", $set);
    // 		$query .= ' SET '.$set;

    // 		$key2 = array_keys($where);
    // 		$count2 = count($key2);
    // 		$set2 = array();
    // 		for ($i=0; $i < $count2; $i++) {
    // 			$set2[] = $key2[$i]."='".$where[$key2[$i]]."'";
    // 		}
    // 		$set2 = implode(" AND ", $set2);
    // 		$query .= ' WHERE '.$set2;

    // 		if ($this->mutu->query($query)) {
    // 			return TRUE;
    // 		}
    // 		else {
    // 			return FALSE;
    // 		}
    // 	}
    // 	else {
    // 		return FALSE;
    // 	}
    // }
    // FAUZI COBA BUAT FUNGSI LAIN 19-07-18 END

    public function delete_data($par)
    {
        $table			= (!empty($par['TABLE']) ? $par['TABLE'] : '');
        $where		= (!empty($par['WHERE']) ? $par['WHERE'] : '');
        $this->db->delete($table, $where);
        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_data_in($table, $field, $in)
    {
        $this->mutu->where_in($field, $in);
        $this->mutu->delete($table);
        if($this->mutu->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function order_data($table, $where, $order)
    {
        $this->mutu->from($table);
        $this->mutu->where($where);
        $this->mutu->order_by(key($order), $order[key($order)]);
        $query = $this->mutu->get();
        return $query->result();
    }

    public function order_data_result($table, $where, $order)
    {
        $this->mutu->from($table);
        $this->mutu->where($where);
        $this->mutu->order_by(key($order), $order[key($order)]);
        $query = $this->mutu->get();
        return $query->result();
    }

    public function get_data_by_field($table, $data)
    {
        $query = $this->mutu->get_where($table, $data);
        return $query->result();
    }

    public function get_data_by_field_like($table, $field, $value)
    {
        $sql = "SELECT * FROM " . $table . " WHERE UPPER(" . $field . ") LIKE UPPER('%" . $value . "%')";
        return $this->mutu->query($sql)->result();
    }

    public function get_data_by_field_in($table, $field, $value)
    {
        $this->mutu->where_in($field, $value);
        $this->mutu->from($table);
        return $this->mutu->get()->result();
    }

    public function get_data_by_field_not_in($table, $field, $value)
    {
        $this->mutu->where_not_in($field, $value);
        $this->mutu->from($table);
        return $this->mutu->get()->result();
    }

    public function count_data($par = '')
    {
        $table = (!empty($par['TABLE']) ? $par['TABLE'] : '');
        $this->mutu->from($table);
        if(!empty($par['WHERE'])) {
            $this->mutu->where($par['WHERE']);
        }
        if(!empty($par['WHERE_LIKE'])) {
            $n = 1;
            foreach($par['WHERE_LIKE'] as $key => $val) {
                if($n == 1) {
                    $this->mutu->like('UPPER(' . $key . ')', strtoupper($val));
                } else {
                    $this->mutu->or_like('UPPER(' . $key . ')', strtoupper($val));
                }
                $n++;
            }
        }
        return $this->mutu->count_all_results();
    }

    public function count_data_v2($par = '')
    {
        $table = (!empty($par['TABLE']) ? $par['TABLE'] : '');
        $this->mutu->from($table);
        if(!empty($par['WHERE'])) {
            $this->mutu->where($par['WHERE']);
        }
        if(!empty($par['WHERE_LIKE'])) {
            $n = 1;
            foreach($par['WHERE_LIKE'] as $key => $val) {
                if($n == 1) {
                    $this->mutu->like('UPPER(' . $key . '::text)', strtoupper($val));
                } else {
                    $this->mutu->or_like('UPPER(' . $key . '::text)', strtoupper($val));
                }
                $n++;
            }
        }
        return $this->mutu->count_all_results();
    }

    public function delete_by_field_id($table, $field, $value)
    {
        $data[$field] = $value;
        $this->mutu->delete($table, $data);
        if($this->mutu->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function act_query2($sql)
    {
        $this->mutu->query($sql);
        if($this->mutu->affected_rows() > 0) {
            $hasil[0]['result'] = "BERHASIL MEMPERBAHARUI <b>" . $this->mutu->affected_rows() . "</b> DATA";
            return $hasil;
        } else {
            $hasil[0]['result'] = "GAGAL MEMPERBAHARUI DATA";
            return $hasil;
        }
    }

}
