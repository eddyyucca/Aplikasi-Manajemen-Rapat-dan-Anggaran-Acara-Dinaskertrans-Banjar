<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organ extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Organ_model');	
    }

    public function index(){
        $data['judul'] = 'Organisasi - Dashboard';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Organ_model->getSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('organ/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function surat(){
        $data['judul'] = 'Organisasi - Data Surat Undangan Rapat';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Organ_model->getAllSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('organ/dt_surat', $data);
        $this->load->view('templates/footer');
    }

    public function download($lmp){
        $path = './surat/notulensi/'.$lmp;
        force_download($path, NULL);
    }
}