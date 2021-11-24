<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kader extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');

        // if ($id == '') {
        //     $kontak = $this->db->get('tb_agenda')->result();
        // } else {
        //     $this->db->where('id_agenda', $id);
            $kader = $this->db->get('tb_kader1')->result();
        // }
        $this->response($kader, 200);
    }

        //Masukan function selanjutnya disini
        function index_post() {
        
            $data = array(
                'id'            => $this->post('id'),
                'nama_kader'    => $this->post('nama_kader'),
                'kunniyah'      => $this->post('kunniyah'),
                'tempat_lahir'  => $this->post('tempat_lahir'),
                'tanggal_lahir' => $this->post('tanggal_lahir'),
                'nomor_hp'      => $this->post('nomor_hp'),
                'email'         => $this->post('email'),
                'alamat'        => $this->post('alamat'),
                'suku'          => $this->post('suku'),
                'status'        => $this->post('status'),
                'pekerjaan'     => $this->post('pekerjaan'),
                'daurah'        => $this->post('daurah'),
                'tanggal_daurah'=> $this->post('tanggal_daurah'),
                'halaqah'       => $this->post('halaqah'),
                'keaktifan'     => $this->post('keaktifan'),
                'murabbiyah'    => $this->post('murabbiyah'),
                'amanah'        => $this->post('amanah'),
                'maharat_kader' => $this->post('maharat_kader'),
                'pendidikan_kader'=> $this->post('pendidikan_kader'),
                'foto'          => $this->post('foto'));
    
            $insert = $this->db->insert('tb_kader1', $data);
            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

    //Masukan function selanjutnya disini
}
?>