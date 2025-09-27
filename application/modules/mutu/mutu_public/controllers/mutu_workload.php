<?php

if(!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Mutu_workload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mutu_workload/mdl_workload', 'mdl_workload');
        $this->load->model('mutu_general/mdl_mutu_general_workload', 'mdl_1001');
        $this->load->library('S00_lib_api');
    }

    public function index()
    {
        echo 'SERV WORKLOAD 2023';
    }


    public function get_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch($kode) {
            case 1001: switch($subkode) {
                default:
                case 1: $query = $this->mdl_1001->get_data($api_search[0]);
                    break;
                case 2: $query = $this->mdl_workload->get_m_soal();
                    break;
                case 3: $query = $this->mdl_1001->get_data_v3($api_search[0]);
                    break;

            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function insert_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch($kode) {
            case 1001: switch($subkode) {
                default:
                case 1: $query = $this->mdl_1001->insert_data($api_search[0]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }
    public function insert_data_last_dokumen($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch($kode) {
            case 1001: switch($subkode) {
                default:
                case 1: $query = $this->mdl_1001->insert_data_last_dokumen($api_search[0]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function update_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch($kode) {
            case 1001: switch($subkode) {
                default:
                case 1: $query = $this->mdl_1001->update_data($api_search[0]);
                    break; //table, array_data, array_where
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }



    public function delete_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch($kode) {
            case 1001: switch($subkode) {
                default:
                case 1: $query = $this->mdl_1001->delete_data($api_search[0]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function order_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch($kode) {
            case 1001: switch($subkode) {
                default:
                case 1: $query = $this->mdl_1001->order_data($api_search[0], $api_search[1], $api_search[2]);
                    break;
                case 2: $query = $this->mdl_1001->order_data_result($api_search[0], $api_search[1], $api_search[2]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }
    public function data_search($format = 'json')
    {
        $kode 			= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch($kode) {
            case 1000: switch($subkode) {
                default:
                case 1: $query = $this->mdl_workload->get_m_soal();
                    break;
                case 2: $query = $this->mdl_workload->get_jawaban($api_search[0], $api_search[1]);
                    break;
                case 3: $query = $this->cekMhs($api_search[0]);
                    break;
                case 4: $query = $this->cekWorkloadMhs1($api_search[0]);
                    break;
                case 5: $query = $this->mdl_workload->get_Alljawaban();
                    break;
                case 6: $query = $this->mdl_workload->getJawabanByprodi($api_search[0]);
                    break;
                case 7: $query = $this->mdl_workload->getkd_prodiJwb();
                    break;
                case 8: $query = $this->mdl_workload->getAllJawabanGroup($api_search[0]);
                    break;
                case 9: $query = $this->mdl_workload->getAllJawabGroup();
                    break;
                case 10: $query = $this->mdl_workload->getJawabByTaSmtProdi($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
                    break;
                case 11: $query = $this->mdl_workload->getKd_prodiM_jawaban($api_search[0], $api_search[1], $api_search[2]);
                    break;


            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function data_post($format = 'json')
    {
        $kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search 	= $this->input->post('api_search');
        $query 		= null;
        log_message('error', 'post: ' . json_encode($_POST));
        switch($kode) {
            case 1000: switch($subkode) {
                default:
                case 1: $query = $this->mdl_workload->post_jawab($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
                    break;
                    break;
                case 2: $query = $this->mdl_workload->updateJawabanWorkload($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8]);
                    break;
                    break;
                case 3: $query = $this->mdl_workload->updateKD_KURandKD_MK($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9], $api_search[10]);
                    break;
                    break;
                case 4: $query = $this->mdl_workload->post_jawabNewTb($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9]);
                    break;
                    break;
                case 5: $query = $this->inputJawaban();
                    break;
                    break;
                case 6: $query = $this->mdl_workload->postTbm_jawab($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9]);
                    break;
                    break;
                case 7: print_r($_POST);
                    break;
                    break;
            }
                break;
        }
    }

    public function cekMhs($nim)
    {
        $getjadwal = $this->s00_lib_api->get_api_json(
            'http://api-akademik.uin-suka.ac.id/servsiasuper/index.php/sia_public/sia_krs/data_search',
            'POST',
            array(
                'api_kode' => 64000,
                'api_subkode' => 16,
                'api_search' => array($nim),
            )
        );
        if($getjadwal) {
            if(!empty($getjadwal)) {
                $data = 0;

                foreach ($getjadwal as $key => $value) {
                    $status = $this->s00_lib_api->get_api_json(
                        'http://api-akademik.uin-suka.ac.id/servmutu/mutu_public/mutu_workload/data_search',
                        'POST',
                        array(
                            'api_kode' => 1000,
                            'api_subkode' => 2,
                            'api_search' => array($nim, $value['KD_KELAS'])
                        )
                    );

                }
                if(!empty($status)) {
                    return 'SUDAH';
                } else {
                    return 'BELUM';
                }

            }
        }

    }

    public function cekWorkloadMhs1($nim)
    {

        $getDetailMhs =  $this->s00_lib_api->get_api_json(
            'http://api-akademik.uin-suka.ac.id/servsiasuper/sia_public/sia_mahasiswa/data_search',
            'POST',
            array(
                'api_kode' => 26000,
                'api_subkode' => 10,
                'api_search' => array($nim),
            )
        );



        $getjadwal = $this->s00_lib_api->get_api_json(
            'http://api-akademik.uin-suka.ac.id/servsiasuper/index.php/sia_public/sia_krs/data_search',
            'POST',
            array(
                'api_kode' => 64000,
                'api_subkode' => 16,
                'api_search' => array($nim),
            )
        );

        if($getDetailMhs) {
            if(!empty($getDetailMhs)) {
                foreach($getDetailMhs as $key => $mhs) {
                    if($getjadwal) {
                        if(!empty($getjadwal)) {
                            foreach($getjadwal as $gj => $jdl) {

                                $cekWorkload = $this->s00_lib_api->get_api_json(
                                    'http://api-akademik.uin-suka.ac.id/servmutu/mutu_public/mutu_workload/data_search',
                                    'POST',
                                    array(
                                          'api_kode' => 1000,
                                          'api_subkode' => 2,
                                          'api_search' => array($nim, $jdl['KD_KELAS'])
                                      )
                                );

                                if(empty($cekWorkload)) {
                                    $status = $jdl['NM_MK'] . ':' . 'BELUM' . ',';
                                    $dataStatus = 'BELUM' . '/';
                                } else {
                                    $status = $jdl['NM_MK'] . ':' . 'SUDAH';
                                    $dataStatus = 'SUDAH' . '/';
                                }

                                $arr_kalimat = explode("/ ", $dataStatus);
                                $a[] = $status;
                                $b[] = $arr_kalimat;


                            }
                            $status = 'SUDAH';

                            foreach ($b as $innerArray) {
                                if (in_array('BELUM/', $innerArray)) {
                                    $status = 'BELUM';
                                    break;
                                }
                            }


                            $dtMhs = array(
                                'NIM' => $mhs['NIM'],
                                'NAMA' => $mhs['NAMA'],
                                'STATUS' => $status,
                                array($a)
                            );

                            return json_encode($dtMhs);


                        }
                    }
                }
            }
        }



    }

    public function inputJawaban()
    {

        $getkdprodi = $this->s00_lib_api->get_api_json(
            'http://api-akademik.uin-suka.ac.id/servmutu/mutu_public/mutu_workload/data_search',
            'POST',
            array(
                    'api_kode' => 1000,
                    'api_subkode' => 6,
                    'api_search' => array('22122')
            )
        );

        if($getkdprodi) {
            foreach($getkdprodi as $keyJwb => $valJwb) {
                $getDetailkelas = $this->s00_lib_api->get_api_json(
                    'http://api-akademik.uin-suka.ac.id/servsiasuper/index.php/sia_public/sia_penawaran/data_search',
                    'POST',
                    array(
                        'api_kode' => 58000,
                        'api_subkode' => 6,
                        'api_search' => array($valJwb['kd_kelas'])
                        )
                );

                if($getDetailkelas) {
                    foreach($getDetailkelas as $keykel => $valkel) {
                        $inputjawaban = $this->s00_lib_api->get_api_json(
                            'http://api-akademik.uin-suka.ac.id/servmutu/mutu_public/mutu_workload/data_post',
                            'POST',
                            array(
                                'api_kode' => 1000,
                                'api_subkode' => 4,
                                'api_search' => array(
                                $valJwb['id_soal'],
                                $valJwb['tanggal'],
                                $valJwb['kd_ta'],
                                $valJwb['kd_smt'],
                                $valJwb['kd_kelas'],
                                $valkel['KD_PRODI'],
                                $valJwb['nim'],
                                $valJwb['jawaban'],
                                $valkel['KD_KUR'],
                                $valkel['KD_MK'])
                                )
                        );
                    }
                }
            }
        }

        return $inputjawaban;


    }

    public function updateJawaban()
    {

        $getAllJawaban = $this->s00_lib_api->get_api_json(
            'http://api-akademik.uin-suka.ac.id/servmutu/mutu_public/mutu_workload/data_search',
            'POST',
            array(
                    'api_kode' => 1000,
                    'api_subkode' => 5,
                    'api_search' => array('')
            )
        );


        if($getAllJawaban) {
            if(!empty($getAllJawaban)) {
                foreach($getAllJawaban as $keyJwb => $valJwb) {

                    $getDetailkelas = $this->s00_lib_api->get_api_json(
                        'http://api-akademik.uin-suka.ac.id/servsiasuper/index.php/sia_public/sia_penawaran/data_search',
                        'POST',
                        array(
                            'api_kode' => 58000,
                            'api_subkode' => 6,
                            'api_search' => array($valJwb['kd_kelas'])
                            )
                    );

                    if($getDetailkelas) {
                        //if(!empty($getDetailkelas)){
                        foreach($getDetailkelas as $keyD => $valD) {

                            // if($valJwb['kd_kelas'] == $valD['kd_kelas']){
                            $updatekd_kur = $this->s00_lib_api->get_api_json(
                                'http://api-akademik.uin-suka.ac.id/servmutu/mutu_public/mutu_workload/data_post',
                                'POST',
                                array(
                                        'api_kode' => 1000,
                                        'api_subkode' => 4,
                                        'api_search' => array(
                                        $valJwb['id_soal'],
                                        $valJwb['tanggal'],
                                        $valJwb['kd_ta'],
                                        $valJwb['kd_smt'],
                                        $valJwb['kd_kelas'],
                                        $valD['KD_PRODI'],
                                        $valJwb['nim'],
                                        $valJwb['jawaban'],
                                        $valD['KD_KUR'],
                                        $valD['KD_MK'])
                                )
                            );
                            //}
                        }
                        //}
                    }
                }
            }
        }
    }


}
