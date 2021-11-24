<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

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

	public function index($table, $where=null, $value=null)
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
                
            $ci =& get_instance();
            // instance object
            $crud = new grocery_CRUD();
            // pilih tabel yang akan digunakan
            // nama table = "tb_tabel" 
            // nama parameter tabel = tabel
            $crud->set_table("tb_" . $table);
            $crud->set_subject('Data '. $table);
            $crud->unset_fields(array('created_at','updated_at', 'priority'));
            $crud->unset_columns(array('created_at','updated_at', 'priority'));
            
            if ($table == 'kader'){
                $crud->columns('nama_kader', 'halaqah');
                $crud->set_field_upload('foto','assets/uploads/foto');
                $crud->add_action("Detail Halaqah", '', 'redirect/index/halaqah','fe-info');
                $crud->add_action("Riwayat Tarbiyah", '', 'data/index/riwayat/kader','fe-info');
                if (($where=="halaqah") && (isset($value))){
                    
                    $ci->db->where('id_halaqah', $value);
                    $query = $ci->db->get('tb_halaqah');
                    foreach ($query->result() as $row)
                        $crud->set_subject('Kader Halaqah'. $row->nama_halaqah);

                    $crud->field_type('halaqah', 'hidden', $value);
                    $crud->unset_columns(array('halaqah','created_at','updated_at'));
                }
                else
                    $crud->set_relation('halaqah','tb_halaqah','nama_halaqah');
            }
            else if ($table == 'halaqah'){
                // $crud->columns('nama_halaqah', 'marhalah_halaqah', 'murabbiyah', 'naqib', 'bendahara');
                $crud->columns('nama_halaqah', 'marhalah_halaqah', 'murabbiyah', 'unit_halaqah', 'tahun_daurah');
                $crud->set_relation('marhalah_halaqah','tb_marhalah','nama_marhalah');
                $crud->set_relation('murabbiyah','tb_kader','nama_kader', array('murabbiyah' => 1));
                $crud->set_relation('naqib','tb_kader','nama_kader', array('amanah' => 'naqibah'));
                $crud->set_relation('bendahara','tb_kader','nama_kader', array('amanah' => 'bendahara'));
                $crud->set_relation('unit_halaqah','tb_unit',' {jenis_unit} - {nama_unit}');
                $crud->add_action("Lihat Kader halaqah", '', 'data/index/kader/halaqah','fe-users');

                // if(isset($where)){
                //     if($where == 'murabbiyah')
                //     $crud->unset_add();
                // }

            }
            else if ($table == 'laporan_polisi'){
                $crud->columns('waktu_kejadian', 'apa_yang_terjadi', 'tempat_kejadian', 'pelaku', 'korban');

            }
            // else if ($table == 'proker'){}
            // else if ($table == ''){}
            // else if ($table == ''){}


            if (isset($where)&& isset($value)){
                if ($where<>'success')
                $crud->where($where, $value);
            }
            // simpan hasilnya kedalam variabel output

            $output = $crud->render();
            // tampilkan di view 
            $this->load->view('data.php', $output);
        }
    }
}
