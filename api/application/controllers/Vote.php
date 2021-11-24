<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Vote extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        $this->db->join('users', 'users.id = tb_vote.user_vote', 'left');
        $this->db->join('tb_agenda', 'tb_agenda.id_agenda = tb_vote.agenda_vote', 'left');
        $user_vote = $this->get('user_vote');
        $agenda_vote = $this->get('agenda_vote');
        $is_vote = $this->get('is_vote');
        $notif = $this->get('notif');
    
        
        if ($id == '') {
            // $kontak = $this->db->get('tb_vote')->result();
            if (isset($agenda_vote)){
                $this->db->where('agenda_vote', $agenda_vote);
            }
            elseif (isset($is_vote)){
                $this->db->where('is_vote', $is_vote);
            }
            elseif (isset($notif)){
                $this->db->where('notif', $notif);
            }
            $this->db->where('user_vote', $user_vote);
            $this->db->where('status_agenda', 'vote');

            $kontak = $this->db->get('tb_vote')->result();
    
        } else {
            $this->db->where('id_vote', $id);
            $kontak = $this->db->get('tb_vote')->result();
        }
        $this->response($kontak, 200);
    }

    function jumlah_get($agenda, $vote='') {

        if ($vote==''){
            $sql = "SELECT * FROM `tb_vote` WHERE agenda_vote='$agenda' AND is_vote='1'";
            $voteYa = $this->db->query($sql)->num_rows();
            $sql = "SELECT * FROM `tb_vote` WHERE agenda_vote='$agenda' AND is_vote='0'";
            $voteTidak = $this->db->query($sql)->num_rows();
            $sql = "SELECT * FROM `tb_vote` WHERE agenda_vote='$agenda' AND is_vote=''";
            $voteBelum = $this->db->query($sql)->num_rows();
            $data = array('Ya'=> $voteYa, 'Tidak'=> $voteTidak, 'Belum'=> $voteBelum);
            $this->response($data, 200);

        }
        else {
            if ($vote == 'kosong')
                $vote ='';
            $this->db->where('agenda_vote', $agenda);
            $this->db->where('is_vote', $vote);
            $kontak = $this->db->get('tb_vote');
            $this->response($kontak->num_rows(), 200);
        }
    }

    function peserta_get($agenda) {
        $this->db->where('agenda_vote', $agenda);
        $this->db->select('user_vote');
        $kontak = $this->db->get('tb_vote')->result();
        $this->response($kontak, 200);
    }

    function index_post() {
        $data = array(
                'id_vote'   => '',
                'createdat_vote'   => '',
                'user_vote'   => $this->post('user_vote'),
                'agenda_vote' => $this->post('agenda_vote'),
                'is_vote'   => $this->post('is_vote'));

        $insert = $this->db->insert('tb_vote', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Memperbarui data kontak yang telah ada
    function index_put() {
        $user_vote = $this->put('user_vote');
        $agenda_vote = $this->put('agenda_vote');
        $is_vote = $this->put('is_vote');
        $notif = $this->put('notif');

        if (isset($is_vote)){
            $data = array(
                    'user_vote'       => $this->put('user_vote'),
                    'agenda_vote'   => $this->put('agenda_vote'),
                    'is_vote'       => $this->put('is_vote'));
        }elseif (isset($notif)){
            $data = array(
                    'user_vote'       => $this->put('user_vote'),
                    'agenda_vote'   => $this->put('agenda_vote'),
                    'notif'       => $this->put('notif'));
        }
        $this->db->where('user_vote', $user_vote);
        $this->db->where('agenda_vote', $agenda_vote);
        $update = $this->db->update('tb_vote', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    
}
?>