<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class History extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $this->db->join('users', 'users.id = tb_history.user_history', 'left');
        $this->db->join('tb_agenda', 'tb_agenda.id_agenda = tb_history.agenda_history', 'right');
        
        // $waktu_history = $this->get('waktu_history');
        // $nama_history = $this->get('nama_history');
        $user_history = $this->get('user_history');
    
        
        if (isset($user_history)) {
            $this->db->where('user_history', $user_history);
        }

        $kontak = $this->db->get('tb_history')->result();
        $this->response($kontak, 200);
    }

    function jumlah_get($agenda, $history='') {
        $this->db->where('agenda_history', $agenda);

        $this->db->where('viewed_history', $history);
        $kontak = $this->db->get('tb_history');
        $this->response($kontak->num_rows(), 200);
    }

    function peserta_get($agenda) {
        $this->db->where('agenda_history', $agenda);
        $this->db->select('user_history');
        $kontak = $this->db->get('tb_history')->result();
        $this->response($kontak, 200);
    }

    function index_post() {
        $data = array(
                'user_history'   => $this->post('user_history'),
                'agenda_history'   => $this->post('agenda_history'),
                'nama_history' => $this->post('nama_history'));

        $insert = $this->db->insert('tb_history', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Memperbarui data kontak yang telah ada
    function index_put() {
        $user_history = $this->put('user_history');
        $agenda_history = $this->put('agenda_history');
        $viewed_history = $this->put('viewed_history');
        $notif = $this->put('notif');

        if (isset($viewed_history)){
            $data = array(
                    'user_history'       => $this->put('user_history'),
                    'agenda_history'   => $this->put('agenda_history'),
                    'viewed_history'       => $this->put('viewed_history'));
        }elseif (isset($notif)){
            $data = array(
                    'user_history'       => $this->put('user_history'),
                    'agenda_history'   => $this->put('agenda_history'),
                    'notif'       => $this->put('notif'));
        }
        $this->db->where('user_history', $user_history);
        $this->db->where('agenda_history', $agenda_history);
        $update = $this->db->update('tb_history', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    
}
?>