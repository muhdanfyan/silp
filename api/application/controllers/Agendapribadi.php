<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Agendapribadi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get($user_kegiatan='') {
        if ($user_kegiatan <> ''){
            $this->db->where('user_kegiatan', $user_kegiatan);
        }
        
        $kontak = $this->db->get('tb_agendapribadi')->result();
        $this->response($kontak, 200);
    }

    function jumlah_get($user_kegiatan, $notif) {
        if (isset($user_kegiatan)){
            $this->db->where('notif', $notif);
            $this->db->where('user_kegiatan', $user_kegiatan);
        }
        
        $kontak = $this->db->get('tb_agendapribadi')->num_rows();
        $this->response($kontak, 200);
    }

    function peserta_get($id_kegiatan) {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->select('user_kegiatan');
        $kontak = $this->db->get('tb_agendapribadi')->row();
        $this->response($kontak->user_kegiatan, 200);
    }
    
    function index_post() {
        $data = array(
                'user_kegiatan'     => $this->post('user_kegiatan'),
                'nama_kegiatan'     => $this->post('nama_kegiatan'),
                'waktu_kegiatan'    => $this->post('waktu_kegiatan'),
                'tempat_kegiatan'   => $this->post('tempat_kegiatan'),
                'catatan'           => $this->post('catatan'),
                'hasil_kegiatan'    => $this->post('hasil_kegiatan'));

        $insert = $this->db->insert('tb_agendapribadi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    //Masukan function selanjutnya disini

    function index_put($id_kegiatan, $notif) {
        // $id_kegiatan = $this->put('id_kegiatan');
        // $notif = $this->put('notif');


        $data = array(
                'id_kegiatan' => $id_kegiatan,
                'notif'       => $notif);

        $this->db->where('id_kegiatan', $id_kegiatan);
        $update = $this->db->update('tb_agendapribadi', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>