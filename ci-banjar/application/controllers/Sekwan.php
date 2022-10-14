<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekwan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Sekwan_model');	
    }

    public function index(){
        $data['judul'] = 'Sekwan - Dashboard';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Sekwan_model->getSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('sekwan/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function surat(){
        $data['judul'] = 'Sekwan - Data Surat Undangan Rapat';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Sekwan_model->getAllSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('sekwan/dt_surat', $data);
        $this->load->view('templates/footer');
    }

    public function download($lmp){
        $path = './surat/notulensi/'.$lmp;
        force_download($path, NULL);
    }
}