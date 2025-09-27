<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Mdl_mutu_template extends CI_Model {
  
    function __construct(){
      parent::__construct();
      $this->mutu = $this->load->database('mutu');
    }

    public function ambilTemplateFull($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT nama_template, versi_jenis, kd_pgw, waktu_simpan, ENCODE(prabab3, 'base64') as prabab3, ENCODE(postbab3, 'base64') as postbab3 FROM public.tb_template_master WHERE id_template=$id_template")->result_array();
    }

    public function ubahTemplateFull($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("UPDATE public.tb_template_master SET nama_template='$nama_template', versi_jenis='$versi_jenis', prabab3='$prabab3', postbab3='$postbab3', kd_pgw='$kd_pgw', waktu_simpan='$waktu_simpan' WHERE id_template=$id_template;");
    }

    public function simpanTemplateFull($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("INSERT INTO public.tb_template_master(
        nama_template, versi_jenis, prabab3, postbab3, kd_pgw, waktu_simpan
      ) 
      VALUES(
        '$nama_template', '$versi_jenis', '$prabab3', '$postbab3', '$kd_pgw', '$waktu_simpan'
      );");
    }

    public function hapusTemplate()
    {

    }
  }
  
  /* End of file Mdl_mutu_template.php */
  
?>