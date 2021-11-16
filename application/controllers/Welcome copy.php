<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('ubolds');

		$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
		$this->load->model('comm_model');
	}

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if ($this->ion_auth->in_group('musyrif'))
		{
		  redirect('musyrif');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
            // show_error('You must be an administrator to view this page.');
            redirect('lapor','refresh');
            
		}
		else
		{

            // $this->db->join('tb_santri', 'tb_kepengelolaan.pejabat = tb_santri.id_santri', 'left');
            // $this->db->join('tb_jabatan', 'tb_kepengelolaan.jabatan = tb_jabatan.id_jabatan', 'left');
            // $this->db->where('nama_jabatan', 'Ketua Harian');
            // $data['ketua'] = $this->db->get('tb_kepengelolaan');
            // $sql = "SELECT * FROM `tb_kepengelolaan` 
            //         LEFT JOIN `tb_santri` ON `tb_kepengelolaan`.`pejabat` = `tb_santri`.`id_santri` 
            //         LEFT JOIN `tb_jabatan` ON `tb_kepengelolaan`.`jabatan` = `tb_jabatan`.`id_jabatan` ";
            
            // $queryketua = $this->db->query($sql . " WHERE nama_jabatan = 'Ketua Harian' and status='Aktif Menjabat'");
            // $data['santri'] = $this->db->get('tb_santri');
            
            // $data['jumlah_inventaris'] = $this->db->get('tb_inventaris')->num_rows();
            // $data['jumlah_keluhan'] = $this->comm_model->jumlah_baris('tb_masukan');
            $data['musyawarah'] = $this->db->get('tb_musyawarah');
            // $data['jumlah_relasi'] = $this->db->get('tb_relasi')->num_rows();
            
			// $sqlmeet = "SELECT * FROM `tb_musyawarah` 
			// 			INNER JOIN tb_jenis_musyawarah
			// 			ON tb_musyawarah.jenis_musyawarah = tb_jenis_musyawarah.id_jenis_musyawarah
			// 			INNER JOIN  tb_jabatan
						// ON tb_jabatan.id_jabatan = tb_musyawarah.pj_musyawarah LIMIT 8";

			// $data['meet'] = $this->db->query($sqlmeet);

			// $this->db->where('tgl_daily', date('Y-m-d'));
			// $data['daily'] = $this->db->get('tb_daily');

			// // $this->output->enable_profiler(TRUE);
            // date_default_timezone_set('Asia/Jakarta');
            // $this->db->where('tgl_tahfidz', date('Y-m-d'));
            // $this->db->join('tb_nilaitahfidz', 'tb_nilaitahfidz.id_nilaitahfidz = tb_tahfidz.nilai', 'left');
			// $data['tahfidz'] = $this->db->get('tb_tahfidz');

            // $row = $queryketua->row();

            // if (isset($row))
            // {
            //     $data['nama_ketua'] =  $row->nama_lengkap_santri;
            //     $data['foto_ketua'] =  $row->foto_santri;
            // }
			$this->load->view('welcome_message', $data);
		}
	}
	
}
