<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mutu_ipepa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('mutu_general/mdl_mutu_general', 'mdl_1001');
        $this->load->model('mutu_ipepa/mdl_ipepa', 'ipepa');



    }

    public function dwnlt_dta_sia($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch ($kode) {
            case 1:
                switch ($subkode) {
                    case 1:
                        $query = $this->ipepa->insert_sia_ipepa($api_search)->result_array();
                        break;

                }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function index()
    {

    }

}

/* End of file Mutu_ipepa.php */
