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
		$this->load->model('kader_model');
	}

	public function index()
	{
        // $this->output->enable_profiler(TRUE);
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
                        // show_error('You must be an administrator to view this page.');
                        redirect('kader','refresh');
            
		}
		// else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		// {
		// 	// redirect them to the home page because they must be an administrator to view this
        //     // show_error('You must be an administrator to view this page.');
        //     redirect('lapor','refresh');
            
		// }
		else
		{

                        $this->load->view('welcome_message');
		}
	}	
}