<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Mdl_mutu_laporan extends CI_Model {
  
    function __construct(){
      parent::__construct();
      $this->mutu = $this->load->database('mutu');
    }

    public function update_filePDF($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      // $dec_filePDF = base64_decode($file_pdf);
      $this->mutu->query("UPDATE public.tb_template_laporan_custom SET file_pdf='$file_pdf' WHERE id_tcustom=$id_tcustom;")->result_array();
      return 'OK';
    }

    // public function ambil_filePDF($data)
    // {
    //   foreach ($data as $key => $value) {
    //     $$key = $value;
    //   }
    //   return $this->mutu->query("SELECT file_pdf FROM public.tb_template_laporan_custom WHERE id_tcustom=$id_tcustom")->result_array();
    // }

    public function ambil_filePDF($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT ENCODE(file_pdf, 'base64') as hasil_laporan FROM public.tb_template_laporan_custom WHERE id_tcustom=$id_tcustom")->result_array();
    }

    public function ambil_filePDF_v2($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT ENCODE(file_pdf, 'base64') as hasil_laporan FROM public.tb_template_laporan_custom WHERE id_borang=$id_borang AND id_fak_prodi_unit='$id_fak_prodi_unit' AND id_periode=$id_periode")->result_array();
    }

    public function ambil_filePDFNew($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT ENCODE(hasil_laporan, 'base64') as hasil_laporan FROM public.tb_template_laporan_pdf WHERE id_borang=$id_borang AND id_fak_prodi_unit='$id_fak_prodi_unit' AND id_periode=$id_periode")->result_array();
    }

    public function template_pdf($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT id_tlpdf, versi_jenis, id_periode, id_fak_prodi_unit, id_borang, status_selesai, kd_pgw, waktu_simpan, waktu_penyelesaian, waktu_query_bab3, ENCODE(prabab3, 'base64') as prabab3, ENCODE(postbab3, 'base64') as postbab3, ENCODE(bab3, 'base64') as bab3, ENCODE(cover, 'base64') as cover, ENCODE(hasil_laporan, 'base64') as hasil_laporan FROM public.tb_template_laporan_pdf WHERE id_borang=$id_borang AND id_fak_prodi_unit='$kode_unit' AND id_periode=$id_periode")->result_array();
    }

    public function insertTemplatePDF($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("INSERT INTO public.tb_template_laporan_pdf(
        versi_jenis,
        id_periode,
        id_fak_prodi_unit,
        id_borang,
        bab3,
        status_selesai,
        waktu_simpan,
        type_bab3,
        cover,
        type_cover
      ) 
      VALUES(
        '$versi_jenis',
        $id_periode,
        '$id_fak_prodi_unit',
        $id_borang,
        '$bab3',
        $status_selesai,
        '$waktu_simpan',
        '$type_bab3',
        '$cover',
        '$type_cover'
      );");
    }

    public function simpanLaporan($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("INSERT INTO public.tb_template_laporan_pdf(
        versi_jenis,
        id_periode,
        id_fak_prodi_unit,
        id_borang,
        prabab3,
        postbab3,
        bab3,
        status_selesai,
        kd_pgw,
        waktu_simpan,
        waktu_penyelesaian,
        waktu_query_bab3,
        type_prabab3,
        type_bab3,
        type_postbab3,
        cover,
        type_cover,
        hasil_laporan
      ) 
      VALUES(
        '$versi_jenis',
        $id_periode,
        '$id_fak_prodi_unit',
        $id_borang,
        '$prabab3',
        '$postbab3',
        '$bab3',
        $status_selesai,
        '$kd_pgw',
        '$waktu_simpan',
        '$waktu_penyelesaian',
        '$waktu_query_bab3',
        '$type_prabab3',
        '$type_bab3',
        '$type_postbab3',
        '$cover',
        '$type_cover',
        '$hasil_laporan'
      );");
    }

    public function updateLaporan($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("UPDATE public.tb_template_laporan_pdf
      SET 
        prabab3='$prabab3', 
        postbab3='$postbab3',
        bab3='$bab3',
        status_selesai=$status_selesai,
        kd_pgw='$kd_pgw', 
        waktu_simpan='$waktu_simpan',
        waktu_penyelesaian='$waktu_penyelesaian',
        waktu_query_bab3='$waktu_query_bab3',
        type_prabab3='$type_prabab3',
        type_bab3='$type_bab3',
        type_postbab3='$type_postbab3',
        cover='$cover',
        type_cover='$type_cover',
        hasil_laporan='$hasil_laporan'
      WHERE
        id_tlpdf=$id_tlpdf
      ");
    }

    // Start of Template
    public function simpanTemplateFull($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("INSERT INTO public.tb_template_master(
                                  nama_template, versi_jenis, prabab3, postbab3, kd_pgw, waktu_simpan, tipe_postbab3
                                ) 
                                VALUES(
                                  '$nama_template', '$versi_jenis', '$prabab3', '$postbab3', '$kd_pgw', '$waktu_simpan', '$tipe_postbab3'
                                );"
              );
    }

    
    public function simpanTemplateForm($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("INSERT INTO public.tb_template_master(
                                  nama_template, versi_jenis, prabab3, postbab3_string, kd_pgw, waktu_simpan, tipe_postbab3
                                ) 
                                VALUES(
                                  '$nama_template', '$versi_jenis', '$prabab3', '$postbab3', '$kd_pgw', '$waktu_simpan', '$tipe_postbab3'
                                );"
              );
    }
    
    public function ambilTemplateFull($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT nama_template, versi_jenis, kd_pgw, waktu_simpan, postbab3_string, tipe_postbab3, ENCODE(prabab3, 'base64') as prabab3, ENCODE(postbab3, 'base64') as postbab3 FROM public.tb_template_master WHERE id_template=$id_template")->result_array();
    }
    public function ambilTemplate_surveyFull($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT nama_template, versi_jenis, kd_pgw, waktu_simpan, postbab3_string, tipe_postbab3, ENCODE(prabab3, 'base64') as prabab3, ENCODE(postbab3, 'base64') as postbab3,responden, survey, tahun_pelaksanaan, periode_pelaksanaan FROM public.tb_template_lprn_survey_mastera WHERE id_template=$id_template")->result_array();
    }
    public function ubahTemplateFull($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("UPDATE public.tb_template_master SET nama_template='$nama_template', versi_jenis='$versi_jenis', prabab3='$prabab3', postbab3='$postbab3', kd_pgw='$kd_pgw', waktu_simpan='$waktu_simpan' WHERE id_template=$id_template;");
    }

    public function ubahTemplateForm($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("UPDATE public.tb_template_master SET nama_template='$nama_template', versi_jenis='$versi_jenis', prabab3='$prabab3', postbab3_string='$postbab3', kd_pgw='$kd_pgw', waktu_simpan='$waktu_simpan' WHERE id_template=$id_template;");
    }
    // End of Template
  
    // Start of Data Template
    public function ambilDataTemplate($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT id_tp, id_template, id_versi_akreditasi, id_borang, id_periode, kd_pgw, waktu_simpan, nama_template, versi_jenis,  ENCODE(prabab3, 'base64') as prabab3, ENCODE(postbab3, 'base64') as postbab3 FROM public.template_laporan_v WHERE id_borang=$id_borang AND id_periode=$id_periode")->result_array();
    }
    // End of Data Template

    // Start of Hasil Laporan

    public function ambilDataTemplatt_survey($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT nama_template, versi_jenis,ENCODE(prabab3, 'base64') as prabab3, ENCODE(postbab3, 'base64') as postbab3, kd_pgw, waktu_simpan, postbab3_string, tipe_postbab3, responden, survey, tahun_pelaksanaan, periode_pelaksanaan, id_template
      FROM public.tb_template_lprn_survey_mastera where  responden =$responden and survey =$survey and tahun_pelaksanaan =$tahun_pelaksanaan and periode_pelaksanaan ='$periode_pelaksanaan'
      ")->result_array();
    }
    public function simpanHasilLaporan($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("INSERT INTO public.tb_laporan_isian(versi_jenis, id_periode, id_fak_prodi_unit, id_borang, kd_pgw, waktu_generate, file_laporan, id_template)
        VALUES ('$versi_jenis', $id_periode, '$id_fak_prodi_unit', $id_borang, '$kd_pgw', '$waktu_generate', '$file_laporan', $id_template);");
    }

    public function ambilHasilLaporan($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT id_laporan, versi_jenis, id_periode, id_fak_prodi_unit, id_borang, kd_pgw, waktu_generate, ENCODE(file_laporan, 'base64') as file_laporan FROM public.tb_laporan_isian WHERE id_borang=$id_borang AND id_periode=$id_periode AND id_fak_prodi_unit='$id_fak_prodi_unit'")->result_array();
    }
    // End of Hasil Laporan

    // Start of Test Zone
    public function test($data)
    {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
      return $this->mutu->query("SELECT ENCODE(file_pdf, 'base64') as file_pdf FROM public.tb_template_laporan_custom WHERE id_tcustom=$id_tcustom")->result_array();
    }
    // End of Test Zone
  }
  
  /* End of file Mdl_mutu_laporan.php */
  
?>