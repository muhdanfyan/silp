<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class File extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get($id=null) {
                
        if(isset($id))
            $this->db->where('agenda_file', $id);
        $kontak = $this->db->get('tb_file')->result();

        $this->response($kontak, 200);
    }
  //Masukan function selanjutnya disini
    
}
?>