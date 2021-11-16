<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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

	public function index()
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

			$crud->set_subject('Data User');
			$crud->set_table('users');


			$crud
			->columns('first_name', 'last_name','jabatan', 'dapil', 'fraksi')
			->fields('first_name', 'last_name', 'username' ,'email', 'phone', 'groups', 'active', 'alamat','agama','tempat_lahir','tanggal_lahir','fraksi','dapil','jabatan','riwayat')
			->display_as('change_password', 'Ganti Password?')
			->display_as('first_name', 'Nama Depan')
			->display_as('last_name', 'Nama Belakang')
			->display_as('email', 'Email')
			->display_as('phone', 'Telepon/Whatsapp')
			->display_as('groups', 'Grup')
			->display_as('active', 'Aktif')
			->field_type('active','dropdown', array('1' => 'aktif', '0' => 'tidak aktif'))
            // ->set_field_upload('photo','assets/uploads/users')
            ->set_relation('dapil','tb_dapil','nama_dapil')
            ->set_relation('fraksi','tb_fraksi','nama_fraksi')
            ->set_relation('jabatan','tb_jabatan','nama_jabatan')
            ->unset_read()
            // ->unset_clone()
			->set_relation_n_n('groups', 'users_groups', 'groups','user_id','group_id','description');
            $crud->change_field_type('password', 'password');
            $crud->add_action('Edit User', '', 'auth/edit_user', 'mdi mdi-account-edit');
			// $crud->callback_before_insert(array($this,'encrypt_password_callback'));

			$output = $crud->render();
			$this->load->view('data.php', $output);
		}
	}

	function encrypt_password_callback($post_array) {
		$this->load->library('encrypt');
		$key = 'super-secret-key';
		$post_array['password'] = $this->encrypt->encode($post_array['password'], $key);
	 
		return $post_array;
	} 
	function password($user) {
        
        $this->_init('ubolds');
        $data['userid'] =$user;

        $data['user'] = $this->db->query("SELECT * FROM users WHERE id=$user")->row();
        
        $this->load->view('password', $data);
        
    }
    function ganti_password($user){
        
        $data_password = $this->db->query("SELECT * FROM users WHERE id=$user")->row();
        $password_lama = $this->input->post("password_lama");
        $password_baru = $this->input->post("password_baru");
        $konfirmasi_password = $this->input->post("konfirmasi_password");

        // if(isset($password_lama)){
            if (password_hash($password_lama) == $data_password->password){
                if ($password_baru == $konfirmasi_password){
                    $this->db->update("users",array('password'=>password_hash($password_baru)),$user);
                    $message = "Password Sudah di Rubah";
                }
                else
                    $message = "Password Tidak sesuai";

            }
            else
                $message = "Password lama yang diinput tidak sesuai dengan database";
        // }
    }
}
