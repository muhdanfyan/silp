<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Invite extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        $this->db->join('users', 'users.id = tb_invite.user_invite', 'left');
        $this->db->join('tb_agenda', 'tb_agenda.id_agenda = tb_invite.agenda_invite', 'left');
        $user_invite = $this->get('user_invite');
        $agenda_invite = $this->get('agenda_invite');
        $notif = $this->get('notif');
        
        if ($id == '') { 
            if (isset($agenda_invite)){
                $this->db->where('agenda_invite', $agenda_invite);
            }
            elseif (isset($presence_invite)){
                $this->db->where('presence_invite', $presence_invite);
            }
            elseif (isset($notif)){
                $this->db->where('notif', $notif);
            }

            if (isset($user_invite))
                $this->db->where('user_invite', $user_invite);

            $this->db->where('status_agenda', 'undangan');
            $kontak = $this->db->get('tb_invite')->result();
        } else {
            $this->db->where('id_invite', $id);
            $kontak = $this->db->get('tb_invite')->result();
        }
        $this->response($kontak, 200);
    }

    function invite2_get($agenda) {
        // $id = $this->get('id');
        $this->db->join('users', 'users.id = tb_invite.user_invite', 'left');
        $this->db->join('tb_agenda', 'tb_agenda.id_agenda = tb_invite.agenda_invite', 'left');
        
        $this->db->where('agenda_invite', $agenda);
        $kontak = $this->db->get('tb_invite')->result();

        $this->response($kontak, 200);
    }

    function jumlah_get($agenda, $invite='') {
        // $this->db->where('agenda_invite', $agenda);

        if ($invite==''){
            $sql = "SELECT * FROM `tb_invite` WHERE agenda_invite='$agenda' AND presence_invite='1'";
            $inviteYa = $this->db->query($sql)->num_rows();
            $sql = "SELECT * FROM `tb_invite` WHERE agenda_invite='$agenda' AND presence_invite='0'";
            $inviteTidak = $this->db->query($sql)->num_rows();
            $sql = "SELECT * FROM `tb_invite` WHERE agenda_invite='$agenda' AND presence_invite=''";
            $inviteBelum = $this->db->query($sql)->num_rows();
            $data = array('Ya'=> $inviteYa, 'Tidak'=> $inviteTidak, 'Belum'=> $inviteBelum);
            $this->response($data, 200);

        }
        else {
            if ($invite == 'kosong')
                $invite ='';
            $this->db->where('agenda_invite', $agenda);
            $this->db->where('presence_invite', $invite);
            $kontak = $this->db->get('tb_invite');
            $this->response($kontak->num_rows(), 200);
        }
    }
    
    
    function peserta_get($agenda) {
        $this->db->where('agenda_invite', $agenda);
        $this->db->select('user_invite');
        $kontak = $this->db->get('tb_invite')->result();
        $this->response($kontak, 200);
    }

        
    function pesertafull_get($agenda, $presence_invite='') {
        $this->db->where('agenda_invite', $agenda);
        $this->db->join('users', 'tb_invite.user_invite = users.id', 'left');
        $this->db->where('presence_invite', $presence_invite);
        
        $kontak = $this->db->get('tb_invite')->result();
        $this->response($kontak, 200);
    }


    function index_post() {
        $data = array(
                'id_invite'   => '',
                'createdat_invite'   => '',
                'user_invite'   => $this->post('user_invite'),
                'agenda_invite' => $this->post('agenda_invite'),
                'presence_invite'   => $this->post('presence_invite'));

        $insert = $this->db->insert('tb_invite', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Memperbarui data kontak yang telah ada
    function index_put() {
        $user_invite = $this->put('user_invite');
        $agenda_invite = $this->put('agenda_invite');
        $notif = $this->put('notif');

        if (empty($notif)){
            $data = array(
                    'user_invite'     => $this->put('user_invite'),
                    'agenda_invite'   => $this->put('agenda_invite'),
                    'presence_invite' => $this->put('presence_invite'));
        }else{
            $data = array(
                    'user_invite'     => $this->put('user_invite'),
                    'agenda_invite'   => $this->put('agenda_invite'),
                    'notif' => $this->put('notif'));
        }
        $this->db->where('user_invite', $user_invite);
        $this->db->where('agenda_invite', $agenda_invite);
        $update = $this->db->update('tb_invite', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    
}
?>