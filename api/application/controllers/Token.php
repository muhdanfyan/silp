<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Token extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $nomor_token = $this->get('nomor_token');
        
        if (isset($nomor_token)){
            $this->db->where('nomor_token', $nomor_token);
        }
        
        $kontak = $this->db->get('tb_agenda')->result();
        $this->response($kontak, 200);
    }
    
    function index_post() {
        $id_token = $this->post('nomor_token');
        $data = array(
                'device_token'     => $this->post('device_token'),
                'nomor_token'     => $this->post('nomor_token'));
        
        $this->db->where('nomor_token', $id_token);
        $tes = $this->db->get('tb_token')->num_rows();
        
        if ($tes == 0 )
            $insert = $this->db->insert('tb_token', $data);
        else
            $insert = false;

        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini
}
?>