<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sinkronkan_m extends CI_Controller {

public function __construct()
	{
		parent::__construct();
			$this->load->model('m_akreditasi/m_sinkronkan', 'akrd');
			$this->mutu = $this->load->database('mutu');
	}


public function mah_dal_lim_th($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mah_dal_lim_th($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
public function mah_dal_lim_th_all($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mah_dal_lim_th_all($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function mah_dal_lim_th_tot($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mah_dal_lim_th_tot($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

	public function mah_dal_lim_th_tot_all($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mah_dal_lim_th_tot_all($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}


	public function mah_dal_lim_th_all_all($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mah_dal_lim_th_all_all();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function data_mah_dal_lim_th($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_1($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function url_3_1_5_detail_1_total($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_1_total($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

public function url_3_1_5_detail_2($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_2($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function prodi($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->prodi($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function jenis($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->jenis();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function jenjang($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->jenjang($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}

		public function semua_data_mah($format='json')
	{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->semua_data_mah();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	public function url_3_1_5_detail_1_total_all($format='json')
			{
				$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_1_total_all();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
			}
public function url_3_1_5_detail_2_total_all($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_2_total_all($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function tranfer($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tranfer($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}		
public function tot_transfer($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_transfer($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
public function mah_dal_lim_th_all_trf($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mah_dal_lim_th_all_trf();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
public function mah_dal_lim_th_tot_all_trf($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->mah_dal_lim_th_tot_all_trf();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);}


public function tot_mamba_reg($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_mamba_reg();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
public function tot_mamba_reg_sem($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_mamba_reg_sem();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function url_3_1_5_detail_1_trnsr($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_1_trnsr($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
	public function url_3_1_5_detail_1_trnsr_all($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_1_trnsr_all($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
		public function url_3_1_5_detail_2_trnsr($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->url_3_1_5_detail_2_trnsr($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
		public function dat_calon_mahasiswa($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dat_calon_mahasiswa($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

		public function dat_lulus_calon_mahasiswa($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dat_lulus_calon_mahasiswa($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

	public function dayatampung($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dayatampung($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function tot_lul_sel($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_lul_sel();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function tot_sel($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_sel();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function tot_dayatampung($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_dayatampung();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

	public function detail_llls_slksi($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->detail_llls_slksi($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function detail_slksi($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->detail_slksi($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function dy_tmpng($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dy_tmpng($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function dtl2_lls_slksi($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dtl2_lls_slksi($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function dtl2_ikt_slksi($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dtl2_ikt_slksi($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}					
public function all_ttl_dtl1_dy_tmpng($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->all_ttl_dtl1_dy_tmpng();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}	


public function all_ttl_dtl1_ikt_slsksi($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->all_ttl_dtl1_ikt_slsksi();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function all_ttl_dtl1_lls_slsksi($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->all_ttl_dtl1_lls_slsksi();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}


public function dtl2_all($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dtl2_all($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
public function all_lls_slksi2($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->all_lls_slksi2($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

					
public function data_sem_lima($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->data_sem_lima($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function total_semua($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->total_semua($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function total_total_ts($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->total_total_ts($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
public function cek_jenis($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->cek_jenis($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}
public function tott_mah($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tott_mah();
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function dtl_jml_jenis($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dtl_jml_jenis($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
					}

public function dtl_jml_jenis2($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->dtl_jml_jenis2($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}
public function tot_mh($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_mh($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}
public function tot_mh2($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->tot_mh2($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}
public function total_nm_jens($format='json')
					{
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 313:
				switch ($subkode) {
					case 354:
						$query = $this->akrd->total_nm_jens($api_search[0]);
						break;
				}
				break;
		}
		$this->sia_api_lib_format->output($query, $format);
}

}

/* End of file sinkronkan.php */
/* Location: ./application/controllers/sinkronkan.php */