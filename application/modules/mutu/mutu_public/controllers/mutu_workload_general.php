

<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Mutu_workload_general extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('mutu_general/mdl_mutu_general', 'mdl_1001');
        $this->load->model('mutu_general/mdl_mutu_general_workload', 'mdl_1001');

    }

    // function fauzi_tes(){
    // 	if (!isset($_FILES['file'])) {
    // 		echo 'max_execution_time = '.ini_get('max_execution_time').' second';
    // 		echo "<br>";
    // 		echo 'max_input_time = '.ini_get('max_input_time').' second';
    // 		echo "<br>";
    // 		echo 'max_input_vars = '.ini_get('max_input_vars').' var';
    // 		echo "<br>";
    // 		echo 'memory_limit = '.ini_get('memory_limit');
    // 		echo "<br>";
    // 		echo 'post_max_size = '.ini_get('post_max_size');
    // 		echo "<br>";
    // 		echo 'upload_max_filesize = '.ini_get('upload_max_filesize');
    // 		echo "<br>";
    // 		echo 'max_file_uploads = '.ini_get('max_file_uploads').' file';
    // 		echo "<form method='POST' enctype='multipart/form-data'>";
    // 		echo "<input name='file' type='file'>";
    // 		echo "<button type='submit'>Send<//button>";
    // 		echo "</form>";
    // 	}
    // 	else {
    // 		$file = $_FILES['file'];
    // 		echo strlen(file_get_contents($file['tmp_name']));
    // 		echo "<br>";
    // 		echo $file['size'];
    // 		echo "<br>";
    // 		$array = array('file' => base64_encode(file_get_contents($file['tmp_name'])));
    // 		print_r($array);
    // 	}
    // }

    public function get_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch ($kode) {
            case 1001: switch ($subkode) {
                default:
                case 1: $query = $this->mdl_1001->get_data($api_search[0]);
                    break;
                case 2: $query = $this->mdl_1001->get_data_v2($api_search[0]);
                    break;
                case 3: $query = $this->mdl_1001->get_data_v3($api_search[0]);
                    break;
                case 4: $query = $this->mdl_1001->get_data_v4($api_search[0], $api_search[1], $api_search[2]);
                    break;
                case 5: $query = $this->mdl_1001->get_data_v5($api_search[0], $api_search[1], $api_search[2]);
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
        switch ($kode) {
            case 1001: switch ($subkode) {
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
        switch ($kode) {
            case 1001: switch ($subkode) {
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
        switch ($kode) {
            case 1001: switch ($subkode) {
                default:
                case 1: $query = $this->mdl_1001->update_data($api_search[0]);
                    break; //table, array_data, array_where
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    // FAUZI COBA BUAT FUNGSI LAIN 19-07-18 START
    // function update_data_v2($format = 'json'){
    // 	$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
    // 	$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
    // 	$api_search = $this->input->post('api_search');
    // 	switch ($kode) {
    // 		case 1:
    // 			switch ($subkode) {
    // 				case 1:
    // 					$query = $this->mdl_1001->update_data_v2($api_search[0]);
    // 				break;
    // 			}
    // 		break;
    // 	}
    // 	$this->sia_api_lib_format->output($query, $format);
    // }
    // FAUZI COBA BUAT FUNGSI LAIN 19-07-18 END

    public function delete_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch ($kode) {
            case 1001: switch ($subkode) {
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
        switch ($kode) {
            case 1001: switch ($subkode) {
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

    public function user_by_nip($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch ($kode) {
            case 1001: switch ($subkode) {
                default:
                case 1: $query = $this->mdl_1001->user_by_nip($api_search[0]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function count_data($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch ($kode) {
            case 1001: switch ($subkode) {
                default:
                case 1: $query = $this->mdl_1001->count_data($api_search[0]);
                    break;
                case 2: $query = $this->mdl_1001->count_data_v2($api_search[0]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function delete_by_field_id($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch ($kode) {
            case 1001: switch ($subkode) {
                default:
                case 1: $query = $this->mdl_1001->delete_by_field_id($api_search[0], $api_search[1], $api_search[2]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }

    public function act_query($format = 'json')
    {
        $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
        $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
        $api_search = $this->input->post('api_search');
        switch ($kode) {
            case 1001: switch ($subkode) {
                default:
                case 1: $query = $this->mdl_1001->act_query($api_search[0]);
                    break;
                case 2: $query = $this->mdl_1001->act_query2($api_search[0]);
                    break;
            }
                break;
        }
        $this->sia_api_lib_format->output($query, $format);
    }
}
?>