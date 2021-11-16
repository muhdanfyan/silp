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
            // instance object
            $crud = new grocery_CRUD();
            // pilih tabel yang akan digunakan
            // nama table = "tb_tabel" 
            // nama parameter tabel = tabel
            $crud->set_table("tb_" . $table);
            $crud->set_subject('Data '. $table);
            $crud->unset_fields(array('created_at','updated_at', 'priority'));
            $crud->unset_columns(array('priority'));
            $crud->display_as('nama_agenda', 'Tema');
            $crud->display_as('createdat_vote', 'Waktu Aktifitas');
            $crud->display_as('createdat_invite', 'Waktu Aktifitas');
            
            if ($table=="vote"){
                $crud->set_relation('agenda_vote','tb_agenda','nama_agenda');
                $crud->set_relation('user_vote','users','{first_name} {last_name}');
                $crud->unset_fields(array('createdat_vote'));
                $crud->unset_operations();
                $crud->order_by('createdat_vote','desc');
                $crud->field_type('is_vote','dropdown', array('1' => 'Vote Yes', '0' => 'Vote No', '' => 'Belum Vote'));
                $crud->unset_operations();

            }
            else if ($table=="invite"){
                $crud->set_relation('agenda_invite','tb_agenda','nama_agenda');
                $crud->set_relation('user_invite','users','{first_name} {last_name}');
                $crud->unset_fields(array('createdat_invite'));
                $crud->field_type('presence_invite','dropdown', array('1' => 'Siap Hadir', '' => 'Belum Jawab', '0' => 'Tidak Hadir'));
                $crud->order_by('createdat_invite','desc');
                $crud->unset_fields('priority');
                $crud->unset_operations();

            }
            else if ($table=="agenda"){
                $crud->unset_columns(array('updated_at','created_at','priority'));
                $crud->set_field_upload('draft_agenda','assets/uploads/draft');
                $crud->set_field_upload('hasil_agenda','assets/uploads/hasil');
                $crud->set_field_upload('img_agenda','assets/uploads/img_rapat');
                $crud->columns('nama_agenda','waktu_agenda', 'status_agenda', 'img_agenda');
                
                $crud->callback_after_insert(array($this, 'vote_user_after_insert'));
                $crud->callback_after_update(array($this, 'vote_user_after_insert'));

                if (isset($value)){
                    if ($value == 'vote'){
                        $crud->add_action("Lihat Vote", '', 'data/index/vote/agenda_vote','fe-heart-on');
                        $crud->set_relation_n_n('peserta_vote', 'tb_vote', 'users', 'agenda_vote','user_vote', 'first_name','priority');
                        $crud->unset_fields('hasil_agenda', 'created_at','updated_at', 'priority');

                    }
                    else if ($value == 'terjadwal'){
                        $crud->add_action("Lihat Partispant", '', 'data/index/invite/agenda_invite','fe-mail');
                        $crud->set_relation_n_n('peserta_invite', 'tb_invite', 'users', 'agenda_invite','user_invite', 'first_name','priority');
                        $crud->unset_fields('hasil_agenda', 'created_at','updated_at', 'priority');
                        $crud->callback_after_insert(array($this, 'invite_user_after_insert'));
                        $crud->callback_after_update(array($this, 'invite_user_after_insert'));
                    }
                    else if ($value == 'terjadwal'){
                        $crud->unset_fields('draft_agenda', 'created_at','updated_at', 'priority');
                    }
                    
                }

            }
            else if ($table=="agendapribadi"){
                $crud->set_field_upload('hasil_kegiatan','assets/uploads/hasil');
                $crud->set_relation('user_kegiatan','users','{first_name} {last_name}');
                $crud->columns('waktu_kegiatan', 'nama_kegiatan','user_kegiatan');

            }
            
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

    function vote_user_after_insert($post_array,$primary_key)
    {
        $curl = curl_init();

        $content=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/vote/peserta/". $primary_key);

        //mengubah standar encoding
        $content=utf8_encode($content);

        //mengubah data json menjadi data array asosiatif
        $result=json_decode($content,true);

        $object = new stdClass();
        foreach ($result as $key => $value)
        {
            $object->$key = $value;
        }

        $payload = array(
            'to' => 'ExponentPushToken[hKprxsNHDjIUkz9uHbJ5p1]',
            'title' => 'SIMLEG SULTENG',
            'body' => 'Anda dapat notif vote kegiatan',
            "data"=> $object
        );
        
        
        
        curl_setopt_array($curl, array(
                CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => array(
                        "Accept: application/json",
                        "Accept-Encoding: gzip, deflate",
                        "Content-Type: application/json",
                        "cache-control: no-cache",
                        "host: exp.host"
                        ),
            ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        return true;
    }

    function invite_user_after_insert($post_array,$primary_key)
    {
        $curl = curl_init();

        $content=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/peserta/". $primary_key);

        //mengubah standar encoding
        $content=utf8_encode($content);

        //mengubah data json menjadi data array asosiatif
        $result=json_decode($content,true);

        $object = new stdClass();
        foreach ($result as $key => $value)
        {
            $object->$key = $value;
        }

        $payload = array(
            'to' => 'ExponentPushToken[hKprxsNHDjIUkz9uHbJ5p1]',
            'title' => 'SIMLEG SULTENG',
            'body' => 'Anda dapat notif undangan untuk kegiatan',
            "data"=> $object
        );
        
        
        curl_setopt_array($curl, array(
                CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => array(
                        "Accept: application/json",
                        "Accept-Encoding: gzip, deflate",
                        "Content-Type: application/json",
                        "cache-control: no-cache",
                        "host: exp.host"
                        ),
            ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        return true;
    }

}
