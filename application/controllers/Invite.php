<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invite extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('ubold');

		$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}

	public function index($id_agenda=null)
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
            // pilih tabel yang akan digunakan
            // nama table = "tb_tabel" 
            // nama parameter tabel = tabel
            $crud->set_table("tb_agenda");
            $crud->set_subject('Data Undangan');
            $crud->unset_fields(array('created_at','updated_at', 'priority'));
            // $crud->unset_columns(array('priority'));
            $crud->columns(array('nama_agenda', 'waktu_agenda', 'status_agenda'));
            $crud->display_as('nama_agenda', 'Nama Kegiatan');
            // $crud->display_as('createdat_invite', 'Waktu Aktifitas');
            // $crud->display_as('createdat_invite', 'Waktu Aktifitas');
            $crud->display_as('draft_agenda', 'Lampiran Undangan (pdf)');
            // $crud->display_as('img_agenda', 'Gambar Agenda');
            $crud->display_as('waktu_agenda', 'Waktu');
            $crud->display_as('deskripsi_agenda', 'Isi');
            // $crud->where('status_agenda', 'undangan');
            $crud->where("status_agenda <> 'vote'");
            $crud->field_type('status_agenda','dropdown', array('undangan' => 'Undangan', 'terlaksana' => 'Terlaksana'));
            
            $crud->set_subject('Data Undangan');
            // $crud->add_action("Lihat Hasil invite", '', 'invite/result','fe-pie-chart');
            $crud->add_action("Lihat Hasil invite", '', 'invite/index','fe-users');
            $crud->set_relation_n_n('peserta_invite', 'tb_invite', 'users', 'agenda_invite','user_invite', 'first_name','priority');
            $crud->unset_fields( 'hasil_agenda', 'created_at','updated_at', 'priority');
            // $crud->fields('nama_agenda','waktu_agenda', 'status_agenda', 'img_agenda');
            $crud->display_as('deskripsi_agenda', 'Catatan');
            $crud->display_as('draft_agenda', 'Lampiran Undangan (pdf)');

            // $content=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/agenda/imgrapat");
            // //mengubah standar encoding
            // $content=utf8_encode($content);
            // //mengubah data json menjadi data array asosiatif
            // $content=json_decode($content,true);
            // $crud->field_type('img_agenda', 'hidden', $content);
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();

            if (isset($id_agenda))
                $tes=0;

            // simpan hasilnya kedalam variabel output
            $output = $crud->render();
            // tampilkan di view 
            $this->load->view('data.php', $output);
        }
    }

    public function result($agenda){
        $this->db->where('id_agenda', $agenda);
        $data['agenda'] = $this->db->get('tb_agenda')->row();
        // $data['hadir'] = $this->db->get('tb_invite')->row();

        $this->load->view('result/invite', $data);
        
    }

}
