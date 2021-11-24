<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hal extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

	}

	private function _init($template)
	{
		$this->output->set_template($template);

		$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}

	public function index($data=null)
	{
        
		$this->_init('ubold');
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
			$crud = new grocery_CRUD();

			$crud->set_subject('Data Halaqah');
			$crud->set_table('tb_halaqah');
			$crud->columns('murabbiyah','nama_halaqah', 'marhalah_halaqah');
			$crud->set_relation('marhalah_halaqah','tb_marhalah','nama_marhalah');
			$crud->set_relation('murabbiyah','tb_kader','nama_kader', array('murabbiyah' => 1));
			$crud->set_relation('naqib','tb_kader','nama_kader', array('amanah' => 'naqibah'));
			$crud->set_relation('bendahara','tb_kader','nama_kader', array('amanah' => 'bendahara'));
			$crud->set_relation('unit_halaqah','tb_unit',' {jenis_unit} - {nama_unit}');
			$crud->add_action("Lihat Kader halaqah", '', 'data/index/kader/halaqah','fe-users');
            $crud->unset_add();
			
			if ($data=="naqib"){
				$crud->columns('naqib','nama_halaqah', 'marhalah_halaqah');
			}
			elseif ($data=="bendahara"){
				$crud->columns('bendahara','nama_halaqah', 'marhalah_halaqah');
			} 

			$output = $crud->render();
			$this->load->view('data.php', $output);
		}
	}
}
