<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Mutu_laporan extends CI_Controller {
  
    function __construct(){
      parent::__construct();
      $this->load->model('mutu_laporan/mdl_mutu_laporan', 'laporan');
      // $this->load->model('mutu_laporan/mdl_mutu_template', 'template');
    }
    
    public function ambil_laporan($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 17: // Ambil file_pdf Laporan
              $query = $this->laporan->ambil_filePDF($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }

      $this->sia_api_lib_format->output($query, $format);
      // return $query;
    }


    public function ambil_laporan_v2($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 11: // Ambil file_pdf Laporan
              $query = $this->laporan->ambil_filePDFNew($api_search[0]);
              // echo $api_search[0];
              break;
            case 17: // Ambil file_pdf Laporan
              $query = $this->laporan->ambil_filePDF_v2($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }

      $this->sia_api_lib_format->output($query, $format);
      // return $query;
    }

    public function ambil_template_pdf($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 17: // Ambil file_pdf Laporan
              $query = $this->laporan->template_pdf($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }

      $this->sia_api_lib_format->output($query, $format);
      // return $query;
    }

    public function simpan_laporan($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 1: // Simpan template laporan
              $query = $this->laporan->insertTemplatePDF($api_search[0]);
              // echo $api_search[0];
              break;
            case 11: // Simpan template laporan
              $query = $this->laporan->simpanLaporan($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    }
    
    public function update_laporan($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 11:
              $query = $this->laporan->updateLaporan($api_search[0]);
              // echo $api_search[0];
              break;
            case 17: // Update file_pdf
              $query = $this->laporan->update_filePDF($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    }

    // Yang Digunakan
    public function ambilTemplate($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 1:
              // Ambil template tanpa binary bab2 dan bab4
              $query = $this->laporan->ambilTemplate($api_search[0]);
              // echo $api_search[0];
              break;
            case 11:
              // Ambil semua kolom dari template
              $query = $this->laporan->ambilTemplateFull($api_search[0]);
              // echo $api_search[0];
              break;
              case 12:
                // Ambil semua kolom dari template
                $query = $this->laporan->ambilTemplate_surveyFull($api_search[0]);
                // echo $api_search[0];
                break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    }

    public function ubahTemplate($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 1:
              // Ubah template tanpa bab2 dan bab4
              $query = $this->laporan->ubahTemplate($api_search[0]);
              // echo $api_search[0];
              break;
            case 11:
              // Ambil semua kolom dari template
              $query = $this->laporan->ubahTemplateFull($api_search[0]);
              // echo $api_search[0];
              break;
            case 12:
              // Ambil semua kolom dari template
              $query = $this->laporan->ubahTemplateForm($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    }

    public function simpanTemplate($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 1:
              // simpan template tanpa binary bab2 dan bab4
              $query = $this->template->simpanTemplate($api_search[0]);
              // echo $api_search[0];
              break;
            case 11:
              // simpan template tanpa binary bab2 dan bab4
              $query = $this->laporan->simpanTemplateFull($api_search[0]);
              // echo $api_search[0];
              break;
            case 12:
              // simpan template tanpa binary bab2 dan bab4
              $query = $this->laporan->simpanTemplateForm($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    }

    public function ambilDataTemplate($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 11:
              // Ambil semua kolom dari template
              $query = $this->laporan->ambilDataTemplate($api_search[0]);
              // echo $api_search[0];
              break;
              case 13:
                // Ambil semua kolom dari template
                $query = $this->laporan->ambilDataTemplatt_survey($api_search[0]);
                // echo $api_search[0];
                break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    }
  
    public function simpanHasilLaporan($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 11:
              $query = $this->laporan->simpanHasilLaporan($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    } 

    public function ambilHasilLaporan($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 11:
              $query = $this->laporan->ambilHasilLaporan($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }
      $this->sia_api_lib_format->output($query, $format);
    } 


    public function test($format='json')
    {
      $kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
      $subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
      $api_search = $this->input->post('api_search');
      switch ($kode) {
        case 1:
          switch ($subkode) {
            case 17: // Ambil file_pdf Laporan
              $query = $this->laporan->ambil_filePDF_v2($api_search[0]);
              // echo $api_search[0];
              break;
          }
          break;
      }

      $this->sia_api_lib_format->output($query, $format);
    }
  
  }
  
  /* End of file Mutu_laporan.php */
  
?>