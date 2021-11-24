<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $email = $this->get('email');
        $password = $this->get('password');
        $this->db->join('tb_dapil', 'tb_dapil.id_dapil = users.dapil', 'left');
        $this->db->join('tb_fraksi', 'tb_fraksi.id_fraksi = users.fraksi', 'left');
        // $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = users.jabatan', 'left');
        $kontak = '';
        
        if ($email == '') {
            $kontak = $this->db->get('users')->result();
        } else {
            if ($this->ion_auth->login($email, $password, FALSE)){
                $this->db->where('email', $email);
                // $this->db->where('password', $password);
                
                $this->db->join('tb_dapil', 'tb_dapil.id_dapil = users.dapil', 'left');
                $this->db->join('tb_fraksi', 'tb_fraksi.id_fraksi = users.fraksi', 'left');
                // $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = users.jabatan', 'left');
                $kontak = $this->db->get('users')->result();
            }
        }
        $this->response($kontak, 200);
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $email = $this->put('email');
        $first_name = $this->put('first_name');
        $last_name = $this->put('last_name');
        $tempat_lahir = $this->put('tempat_lahir');
        $tanggal_lahir = $this->put('tanggal_lahir');
        $fraksi = $this->put('fraksi');
        $dapil = $this->put('dapil');
        $alamat = $this->put('alamat');
        $agama = $this->put('agama');
        $photo = $this->put('photo');

        $nama_dapil = file_get_contents("https://api.simleg-dprdsulteng.com/index.php/user/dapil/". $dapil);
        $nama_fraksi = file_get_contents("https://api.simleg-dprdsulteng.com/index.php/user/fraksi/". $fraksi);
        // $nama_jabatan = file_get_contents("https://api.simleg-dprdsulteng.com/index.php/user/jabatan/". $jabatan);

        $data = array(
            'email' => $this->put('email'),
            'first_name' => $this->put('first_name'),
            'last_name' => $this->put('last_name'),
            'tempat_lahir' => $this->put('tempat_lahir'),
            'tanggal_lahir' => $this->put('tanggal_lahir'),
            'fraksi' => $this->put('fraksi'),
            'dapil' => $this->put('dapil'),
            'riwayat' => $this->put('riwayat'),
            'jabatan' => $this->put('jabatan'),
            // 'nama_dapil' => $nama_dapil,
            'alamat' => $this->put('alamat'),
            'photo' => $this->put('photo'),
            'agama' => $this->put('agama'));

        $this->db->where('email', $email);
        $update = $this->db->update('users', $data);

        if ($update) {
            $this->db->join('tb_dapil', 'tb_dapil.id_dapil = users.dapil', 'left');
            $this->db->join('tb_fraksi', 'tb_fraksi.id_fraksi = users.fraksi', 'left');
            // $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = users.jabatan', 'left');
            
            array_push($data, $nama_dapil);
            array_push($data, $nama_fraksi);
            // array_push($data, $nama_jabatan);

            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini

        //Memperbarui data kontak yang telah ada
    function uploadimage_put() {
        $email = $this->put('email');
        // $link = $this->put('link');
        $photo = $_POST['photo'];

        $config['upload_path']     = 'https://simleg-dprdsulteng.com/assets/uploads/users/';
        $config['allowed_types']   = 'gif|jpg|png';
        $config['max_size']        = 1000;
        $config['max_width']       = 4024;
        $config['max_height']      = 368;

        $data = array(
            'email' => $email,
            'photo' => basename($photo));

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($photo))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->response(array('status' => $this->upload->display_errors(), 502));
        }
        else
        {      
            // $this->db->where('email', $email);
            // $update = $this->db->update('users', $data);
         
            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    function dapil_get($id=null) {
        
        if(isset($id)){
            $this->db->where('id_dapil', $id);
            $kontak = $this->db->get('tb_dapil')->row()->nama_dapil;
        }else
            $kontak = $this->db->get('tb_dapil')->result();

        $this->response($kontak, 200);
    }

    function fraksi_get($id=null) {
        
        if(isset($id)){
            $this->db->where('id_fraksi', $id);
            $kontak = $this->db->get('tb_fraksi')->row()->nama_fraksi;
        }else
            $kontak = $this->db->get('tb_fraksi')->result();

        $this->response($kontak, 200);
    }
    
    // function jabatan_get($id=null) {
        
    //     if(isset($id)){
    //         $this->db->where('id_jabatan', $id);
    //         $kontak = $this->db->get('tb_jabatan')->row()->nama_jabatan;
    //     }else
    //         $kontak = $this->db->get('tb_jabatan')->result();

    //     $this->response($kontak, 200);
    // }

    // function changepassword_put($email, $oldpassword, $newpassword){
    function changepassword_put(){
        
            // $identity = $this->session->userdata('identity');
            $email = $this->put('email');
            $oldpassword = $this->put('oldpassword');
            $newpassword = $this->put('newpassword');

            $change = $this->ion_auth->change_password($email, $oldpassword, $newpassword);

			if ($change)
			{
                $data = array(
                    'email' => $email,
                    'password' => $newpassword);
				//if the password was successfully changed
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
    }
}
?>