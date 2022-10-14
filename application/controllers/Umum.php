<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umum extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Umum_model');	
    }

    public function index(){
        $data['judul'] = 'Umum - Dashboard';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Umum_model->getSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('umum/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function surat(){
        $data['judul'] = 'Umum - Data Surat Undangan Rapat';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Umum_model->getAllSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('umum/dt_surat', $data);
        $this->load->view('templates/footer');
    }

    public function download($lmp){
        $path = './surat/notulensi/'.$lmp;
        force_download($path, NULL);
    }

    public function fpdf_notulen($no_surat){ //fpdf
        $this->load->library('myfpdf');
        $data['surat'] = $this->Umum_model->getSuratWhere($no_surat);
        $this->load->view('umum/fpdf_notulen', $data);
    }
}