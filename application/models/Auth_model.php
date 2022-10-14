<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function register(){
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama', true),
            'password' => password_hash(($this->input->post('password')), PASSWORD_DEFAULT),
            'role' => 'admin',
            'bagian' => 'Admin'
        ];

        $this->db->insert('tb_pegawai', $data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Akun anda berhasil didaftarkan. Silahkan login.</div>');
    }

    public function login(){

        $nip = ($this->input->post('nip', true));
        $pass = ($this->input->post('password', true));

        $user = $this->db->get_where('tb_pegawai',['nip' => $nip])->row_array();
		
		// jika usernya ada
		if( $user){
            if (password_verify($pass, $user['password'])){

                $data = [
                    'nip' => $user['nip'],
                    'role' => $user['role'],
                    'email' => $user['email']

                ];
                $this->session->set_userdata($data);


                if($user['role'] == 'admin'){
                    redirect('admin');
                } else if ($user['role'] == 'kadis'){
                    redirect('admin');
                } else if ($user['role'] == 'organ'){
                    redirect('organ');
                } else if ($user['role'] == 'hukum'){
                    redirect('hukum');
                } else {
                    redirect('sekwan');
                }
                
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">NIP tidak terdaftar!</div>');
			redirect('auth');
		}
    }
}
