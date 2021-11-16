<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Controller {

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
				$crud->unset_export();
				
				$crud->where('terlapor','0');
				// $crud->unset_operations();
				// simpan hasilnya kedalam variabel output
				$output = $crud->render();
				// tampilkan di view 
				
				$this->load->view('kas.php', $output);
		
			}
	}

	
	public function agenda($id_agenda, $id_user=1)
	{      
		// instance object
		$crud = new grocery_CRUD();
		
        $crud->set_table("tb_file");
        $crud->set_theme("tes");
        
		$crud->set_field_upload('link_file','assets/uploads/hasil');
		if(isset($id_agenda)){
			$crud->where('agenda_file', $id_agenda);
			$crud->field_type('agenda_file', 'hidden', $id_agenda);
            $crud->unset_columns('agenda_file');
            if (isset($id_user)){
    			$crud->where('user_file', $id_user);
                $crud->field_type('user_file', 'hidden', $id_user);
                $crud->unset_columns('agenda_file','user_file');
            }
		}else{
			$crud->set_relation('agenda_file','tb_agenda','nama_agenda');
		}
		$output = $crud->render();
        $this->load->view('data.php', $output);

	}

}
