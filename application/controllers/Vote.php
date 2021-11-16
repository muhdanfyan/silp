<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vote extends CI_Controller {

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
            // pilih tabel yang akan digunakan
            // nama table = "tb_tabel" 
            // nama parameter tabel = tabel
            $crud->set_table("tb_agenda");
            $crud->set_subject('Data Vote');
            $crud->unset_fields(array('created_at','updated_at', 'priority'));
            // $crud->unset_columns(array('priority'));
            $crud->columns(array('nama_agenda', 'waktu_agenda', 'status_agenda'));
            $crud->display_as('nama_agenda', 'Nama Kegiatan');
            $crud->display_as('createdat_vote', 'Waktu Aktifitas');
            $crud->display_as('createdat_invite', 'Waktu Aktifitas');
            $crud->display_as('draft_agenda', 'Lampiran Undangan (pdf)');
            // $crud->display_as('img_agenda', 'Gambar Agenda');
            $crud->display_as('waktu_agenda', 'Waktu');
            $crud->where('status_agenda', 'vote');
            $crud->display_as('deskripsi_agenda', 'Isi');
            
            $crud->set_subject('Data E-Vote');
            $crud->add_action("Lihat Hasil Vote", '', 'vote/result','fe-pie-chart');
            $crud->set_relation_n_n('peserta_vote', 'tb_vote', 'users', 'agenda_vote','user_vote', 'first_name','priority');
            $crud->unset_fields( 'hasil_agenda', 'created_at','updated_at', 'priority');
            // $crud->fields('nama_agenda','waktu_agenda', 'status_agenda', 'img_agenda');
            $crud->display_as('deskripsi_agenda', 'Catatan');
            $crud->display_as('draft_agenda', 'Lampiran E-Vote (pdf)');
            $crud->field_type('status_agenda','dropdown', array('vote' => 'E-Vote'));

            $content=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/agenda/imgrapat");
            //mengubah standar encoding
            $content=utf8_encode($content);
            //mengubah data json menjadi data array asosiatif
            $content=json_decode($content,true);
            $crud->field_type('img_agenda', 'hidden', $content);
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();

            // simpan hasilnya kedalam variabel output
            $output = $crud->render();
            // tampilkan di view 
            $this->load->view('data.php', $output);
        }
    }

    public function result($agenda){
        $this->db->where('id_agenda', $agenda);
        $data['agenda'] = $this->db->get('tb_agenda')->row();

        $this->load->view('result/vote', $data);
        
    }

}
