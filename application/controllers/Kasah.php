<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kasah extends CI_Controller {


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
		// instance object
        $crud = new grocery_CRUD();
		// pilih tabel yang akan digunakan
		// nama table = "tb_tabel" 
		// nama parameter tabel = tabel
		$crud->set_table("kasmasjid");
		$crud->set_subject('Laporan Kas Masjid Ali Hizaam');
		$crud->set_field_upload('file_lampiran','assets/uploads/keuangan');
		$crud->unset_fields('terlapor');
		$crud->unset_columns('terlapor', 'file_lampiran', 'keterangan');
		
		$crud->where('terlapor','0');

        // simpan hasilnya kedalam variabel output
        $output = $crud->render();
		// tampilkan di view 
		
        $this->load->view('kasah.php', $output);
	}
	
	public function total()
	{      
		// instance object
        $crud = new grocery_CRUD();
		// pilih tabel yang akan digunakan
		// nama table = "tb_tabel" 
		// nama parameter tabel = tabel
		$crud->set_table("kasmasjid");
		$crud->set_subject('Laporan Kas Masjid Ali Hizaam');
		$crud->set_field_upload('file_lampiran','assets/uploads/keuangan');

        // simpan hasilnya kedalam variabel output
        $output = $crud->render();
		// tampilkan di view 
		
        $this->load->view('kasah.php', $output);

	}

	public function tutupsaldo($saldo){
		$query = "UPDATE `kasmasjid` SET `terlapor` = '1' WHERE `kasmasjid`.`terlapor` = 0;";
		$this->db->query($query);
		$object = [
			'aktifitas_keuangan'  => 'Saldo tgl : '. date('l, d-m-Y'),
			'nominal_keuangan'  => $saldo,
			'jenis_keuangan'  => 'Saldo'
	    ];
		$this->db->insert('kasmasjid', $object);
		redirect(base_url('kasah'));
		
	}
}
