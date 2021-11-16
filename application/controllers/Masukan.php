<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masukan extends CI_Controller {

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



	public function index($id=null, $action=null)
	{        
		// instance object
        $crud = new grocery_CRUD();

		$crud->set_table("tb_masukan");
		$masuk = $this->ion_auth->user()->row();
		$crud->set_subject('Masukan Santri ' . $masuk->first_name);
		$crud->set_relation('bidang','tb_jabatan','nama_jabatan', array('proker' => 1));
        $crud->unset_fields(array('created_at','updated_at'));
        $crud->unset_columns('masukan');
        $crud->unset_edit()->unset_clone();
        if (($id=="add") || ($id=="edit") || (empty($id)))
            $crud->set_relation('santri','tb_santri','nama_lengkap_santri');
        else if (($action=="success")||($id=="success"))
            redirect(base_url());
        else{
            $crud->where('santri', $id);
            $crud->field_type('santri', 'hidden', $id);
            $crud->add_fields('santri','masukan','bidang');
        }
        // simpan hasilnya kedalam variabel output
        $output = $crud->render();
		// tampilkan di view 
		
        $this->load->view('input.php', $output);
	}
}
