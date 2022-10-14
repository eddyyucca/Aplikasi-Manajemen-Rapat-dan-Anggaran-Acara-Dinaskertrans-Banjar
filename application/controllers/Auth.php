<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');	
	}

	public function index()
	{
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE){
            $data['title'] = 'Halaman Login';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->login();
        }
    }
    
    public function register()
	{
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tb_pegawai.nip]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password_r]');
        $this->form_validation->set_rules('password_r', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE){
            $data['title'] = 'Halaman Registrasi';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->register();
            redirect('auth');
        }
	}

    public function logout()
	{
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
		redirect('auth');
	}
}
