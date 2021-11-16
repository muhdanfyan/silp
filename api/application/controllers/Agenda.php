<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Agenda extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        $status_agenda = $this->get('status_agenda');
        $this->db->order_by('waktu_agenda', 'asc');
        

        // $this->db->join('Table', 'table.column = table.column', 'left');
        

        if (isset($status_agenda)){
            $this->db->where('status_agenda', $status_agenda);
            if ($status_agenda == 'vote'){
                $this->db->join('tb_vote', 'tb_vote.agenda_vote = tb_agenda.id_agenda', 'left');
                $user_vote = $this->get('user');
                $this->db->where('user_vote', $user_vote);
            }else if ($status_agenda == 'undangan'){
                $this->db->join('tb_invite', 'tb_invite.agenda_invite = tb_agenda.id_agenda', 'left');
                $user_invite = $this->get('user');
                $this->db->where('user_invite', $user_invite);
            }
        }

        if ($id == '') {
            $kontak = $this->db->get('tb_agenda')->result();
        } else {
            $this->db->where('id_agenda', $id);
            $kontak = $this->db->get('tb_agenda')->result();
        }
        $this->response($kontak, 200);
    }

    //Masukan function selanjutnya disini

    function imgrapat_get() {
        $kontak = $this->db->get('tb_bgevote')->row();
        $this->response($kontak->nama_bg, 200);
    }
}
?>