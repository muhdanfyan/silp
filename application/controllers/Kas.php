<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kas extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('ubold2');

		$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}

	public function index()
	{   
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}
		else
            {
				// instance object
				$crud = new grocery_CRUD();

				$crud->set_table("tb_keuangan");
				$crud->set_subject('Laporan Keuangan Pondok');
				$crud->set_field_upload('file_lampiran','assets/uploads/keuangan');
				$crud->unset_fields('terlapor');
				$crud->unset_columns('terlapor', 'file_lampiran', 'keterangan');
				$crud->order_by('tgl_keuangan', 'desc');
				
				$crud->where('terlapor','0');
				// $crud->unset_operations();
				// simpan hasilnya kedalam variabel output
				$output = $crud->render();
				// tampilkan di view 
				
				$this->load->view('kas.php', $output);
		
			}
	}

	
	public function total()
	{      
		// instance object
		$crud = new grocery_CRUD();
		
		$crud->set_table("tb_keuangan");
		$crud->set_subject('Laporan Keuangan Pondok');
		$crud->set_field_upload('file_lampiran','assets/uploads/keuangan');
		$crud->unset_fields('terlapor');
		$crud->field_type('terlapor','dropdown', array('1' => '<i class="fa fa-check-circle" aria-hidden="true"></i>', '0' => '<i class="fa fa-window-close" aria-hidden="true"></i>'));
		$crud->unset_operations();
        // simpan hasilnya kedalam variabel output
        $output = $crud->render();
		// tampilkan di view 
		
        $this->load->view('kasah.php', $output);

	}

	public function tutupsaldo($saldo, $masuk, $keluar){

		$keuanganTerakhir = $this->db->query("select * from tb_keuangan where jenis_keuangan='Saldo' AND terlapor=0 ORDER BY tgl_keuangan desc");

		foreach($keuanganTerakhir->result_array() as $uang){
			$saldoTerakhir = $uang['nominal_keuangan'];
			$tglTerakhir = $uang['tgl_keuangan'];
		}
		
		$keterangansaldo = 'Saldo Terakhir tgl ' . date_format($tglTerakhir, 'l, d-m-Y') . 
							'<b>' . $saldoTerakhir . '</b><br>' . 'Dana Masuk     : <i>' . number_format($masuk, 2, ',' ,'.') .
							'</i><br>' . 'Dana Keluar    : <i>' . number_format($keluar, 2, ',' ,'.') . '</i><br>' .
							'Saldo Sekarang : <b>' . number_format($saldo, 2, ',' ,'.') . '</b>';

		$query = "UPDATE `tb_keuangan` SET `terlapor` = '1' WHERE `tb_keuangan`.`terlapor` = 0;";
		$this->db->query($query);
		$object = [
			'aktifitas_keuangan'  => 'Saldo tgl : '. date('l, d-m-Y'),
			'nominal_keuangan'  => $saldo,
			'jenis_keuangan'  => 'Saldo',
			'keterangan' => $keterangansaldo,
	    ];
		$this->db->insert('tb_keuangan', $object);
		redirect(base_url('kas'));
		
	}
}
