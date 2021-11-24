<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kader extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('ubolds');

		$this->load->css('assets/libs/datatables/dataTables.bootstrap4.css');
		$this->load->css('assets/libs/datatables/responsive.bootstrap4.css');
		$this->load->js('assets/js/vendor.min.js');
		$this->load->js('assets/libs/datatables/jquery.dataTables.min.js');
		// $this->load->js('assets/libs/datatables/dataTables.bootstrap4.js');
		// $this->load->js('assets/libs/datatables/dataTables.responsive.min.js');
		// $this->load->js('assets/libs/datatables/responsive.bootstrap4.min.js');
		$this->load->js('assets/js/pages/tickets.js');
		// $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		// $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
        $this->load->model('Kader_model');
        
	}

	public function index()
	{        
        // $this->output->enable_profiler(TRUE);
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		// else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		// {
		// 	// redirect them to the home page because they must be an administrator to view this
		// 	// show_error('You must be an administrator to view this page.');

		// }
		else{
			
            // redirect('welcome','refresh');
            // $this->db->join('tb_halaqah', 'tb_halaqah.id_halaqah = tb_kader.halaqah', 'left');
			// $this->db->join('tb_marhalah', 'tb_halaqah.marhalah_halaqah = tb_marhalah.id', 'left');
			// $this->db->join('tb_unit', 'tb_halaqah.unit_halaqah = tb_unit.id_unit', 'left');
            // $data['kader'] = $this->db->get('tb_kader');
     		$this->load->view('kader');

        }
    }

    public function crud($where=null, $value=null){
        
		$this->output->set_template('ubold');
        // $ci =& get_instance();
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        // nama table = "tb_tabel" 
        // nama parameter tabel = tabel
        $crud->set_table("tb_kader");
        $crud->set_subject('Data Kader');
        $crud->unset_fields(array('created_at','updated_at', 'priority'));
        $crud->unset_columns(array('created_at','updated_at', 'priority'));
        $crud->columns('nama_kader', 'halaqah');
        $crud->set_field_upload('foto','assets/uploads/foto');
        $crud->add_action("Detail Halaqah", '', 'redirect/index/halaqah','fe-info');
        $crud->add_action("Riwayat Tarbiyah", '', 'data/index/riwayat/kader','fe-info');
        $crud->set_relation('halaqah','tb_halaqah','{nama_halaqah}');
        $output = $crud->render();
        
        // tampilkan di view 
        $this->load->view('data.php', $output);
        if (empty($where)|| $where == 'success'){
            redirect(base_url('kader'),'refresh');
        }
    }

	public function inputkader(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else{
			
            $data['kader'] = $this->Kader_model->get_kader();
			$this->load->view('kader', $data);
        }
	}
    
}
