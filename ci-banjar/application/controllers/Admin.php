<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');	
	}
 public function send_msg()
    {
        date_default_timezone_set('Asia/Jakarta');

        $id_surat = $this->input->post('id_surat');
        $no_telepon = $this->input->post('no_telepon');
        $pesan = $this->input->post('pesan');

                $data = array(
                        'id_surat'                 => $id_surat,
                        'no_telepon'                  => $no_telepon,
                        'pesan'                   => $pesan
                       
                );

                $this->db->insert('pesan', $data);


                $email_api = urlencode("syrif.firdaus@gmail.com");
                $passkey_api = urlencode("Hm123123");
                $no_hp_tujuan = urlencode($no_telepon);
                $isi_pesan = urlencode($pesan);

                $url = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=".$email_api."&passkey=".$passkey_api."&no_tujuan=".$no_hp_tujuan."&pesan=".$isi_pesan;
                $result = file_get_contents($url);
                $data = explode("~~~", $result);

                if ($data[0]==1) {
                    redirect('admin/surat_keluar');
                }
    }


    public function index(){
        $data['judul'] = 'Admin - Dashboard';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Admin_model->getSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function surat(){
        $data['judul'] = 'Admin - Data Surat Undangan Rapat';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['masuk'] = $this->Admin_model->getAllSuratMasuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/dt_surat', $data);
        $this->load->view('templates/footer');
    }

    public function surat_keluar(){
        $data['judul'] = 'Admin - Data Surat Undangan Rapat';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['keluar'] = $this->Admin_model->getAllSuratKeluar();
        $data['tujuan'] = ['Kantor', 'Banjar', 'Provinsi'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/dt_surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat_m(){

        $this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim|is_unique[tb_surat.no_surat]',[
            'required' => 'Nomor Surat harus diisi!',
            'is_unique' => 'Nomor Surat sudah ada!'
        ]);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required',[
            'required' => 'Tanggal harus diisi!'
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required',[
            'required' => 'Perihal harus diisi!'
        ]);
        $this->form_validation->set_rules('id_pengirim', 'Pengirim', 'required',[
            'required' => 'Pengirim Surat harus dipilih!'
        ]);
        $this->form_validation->set_rules('tempat', 'Tempat Acara', 'required',[
            'required' => 'Tempat Acara harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_acara', 'Tanggal Acara', 'required',[
            'required' => 'Tanggal Acara harus diisi!'
        ]);
        $this->form_validation->set_rules('waktu_acara', 'Waktu Acara', 'required',[
            'required' => 'Waktu Acara harus diisi!'
        ]);
        if (empty($_FILES['lampiran']['name'])){
            $this->form_validation->set_rules('lampiran', 'Lampiran', 'required',[
                'required' => 'Lampiran harus diisi!'
            ]);
        }

        if ($this->form_validation->run() == FALSE){
            $data['pegawai'] = $this->Admin_model->getPegawai();
            $data['judul'] = 'Admin - Tambah Surat Undangan Rapat';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['pengirim'] = $this->Admin_model->getAllPengirim();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/th_surat_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->addSurat();
            //$this->Admin_model->do_upload();
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Surat masuk undangan rapat berhasil ditambahkan.</div>');
            redirect('admin/surat');
        }
    }

    public function tambah_surat_k(){

        $this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim|is_unique[tb_surat.no_surat]',[
            'required' => 'Nomor Surat harus diisi!',
            'is_unique' => 'Nomor Surat sudah ada!'
        ]);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required',[
            'required' => 'Tanggal harus diisi!'
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required',[
            'required' => 'Perihal harus diisi!'
        ]);
        $this->form_validation->set_rules('tempat', 'Tempat Acara', 'required',[
            'required' => 'Tempat Acara harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_acara', 'Tanggal Acara', 'required',[
            'required' => 'Tanggal Acara harus diisi!'
        ]);
        $this->form_validation->set_rules('waktu_acara', 'Waktu Acara', 'required',[
            'required' => 'Waktu Acara harus diisi!'
        ]);
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required',[
            'required' => 'Tujuan harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE){
            $data['tujuan'] = ['Kantor', 'Kab. Banjar', 'Provinsi'];
            $data['judul'] = 'Admin - Tambah Surat Undangan Rapat';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['pengirim'] = $this->Admin_model->getAllPengirim();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/th_surat_keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->addSurat();
            //$this->Admin_model->do_upload();
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Surat keluar undangan rapat berhasil ditambahkan.</div>');
            redirect('admin/surat_keluar');
        }
    }

    public function th_pengirim(){
        $this->form_validation->set_rules('nm_pengirim', 'Nama Pengirim', 'required',[
            'required' => 'Nama Pengirim harus diisi!'
        ]);
        $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required',[
            'required' => 'Alamat Pengirim harus diisi!'
        ]);
        $this->form_validation->set_rules('notelp_pengirim', 'No Telp Pengirim', 'required',[
            'required' => 'No Telp Pengirim harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Harap mengisi data pengirim dengan lengkap!</div>');
            redirect('admin/tambah_surat_m');
        } else {
            $this->Admin_model->addPengirim();
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Pengirim berhasil ditambahkan.</div>');
            redirect('admin/tambah_surat_m');
        }
    }

    public function th_pengirim_k(){
        $this->form_validation->set_rules('nm_pengirim', 'Nama Pengirim', 'required',[
            'required' => 'Nama Pengirim harus diisi!'
        ]);
        $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required',[
            'required' => 'Alamat Pengirim harus diisi!'
        ]);
        $this->form_validation->set_rules('notelp_pengirim', 'No Telp Pengirim', 'required',[
            'required' => 'No Telp Pengirim harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Harap mengisi data pengirim dengan lengkap!</div>');
            redirect('admin/tambah_surat_k');
        } else {
            $this->Admin_model->addPengirim();
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Pengirim berhasil ditambahkan.</div>');
            redirect('admin/tambah_surat_k');
        }
    }

    public function diteruskan($no_surat){
        $data['judul'] = 'Admin - Data Penerima Undangan';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['pegawai'] = $this->Admin_model->getDiteruskan($no_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/dt_diteruskan', $data);
        $this->load->view('templates/footer');
    }

    public function pegawai(){
        $data['judul'] = 'Admin - Data Pegawai';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['pegawai'] = $this->Admin_model->getPegawai();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/dt_pegawai', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pegawai(){
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tb_pegawai.nip]',[
            'required' => 'NIP harus diisi!',
            'is_unique' => 'NIP sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('bagian', 'Bagian', 'required',[
            'required' => 'Bagian harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password_r]',[
            'required' => 'Password harus diisi!',
            'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('password_r', 'Password', 'required|trim|matches[password]',[
            'required' => 'Password harus diisi!',
            'matches' => 'Password tidak sama!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Tambah Pegawai';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['bagian'] = ['Kabag Umum', 'Kabag Organisasi', 'Kabag Hukum', 'Staff'];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/th_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->addPegawai();
            redirect('admin/pegawai');
        }
    }

    public function view_surat($no_surat){ //ga dipake
        $data['judul'] = 'Admin - Lihat Lampiran';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        // $data['img'] = $this->Admin_model->getImg($no_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/view', $data);
        $this->load->view('templates/footer');
    }

    public function edit_masuk($no_surat){

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required',[
            'required' => 'Tanggal harus diisi!'
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required',[
            'required' => 'Perihal harus diisi!'
        ]);
        $this->form_validation->set_rules('tempat', 'Tempat Acara', 'required',[
            'required' => 'Tempat Acara harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Edit Surat';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['surat'] = $this->Admin_model->getSuratWhere($no_surat);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/ed_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->editMasuk($no_surat);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Surat undangan berhasil diperbaharui.</div>');
            redirect('admin/surat');
        }
    }

    public function edit_keluar($no_surat){
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required',[
            'required' => 'Tanggal harus diisi!'
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required',[
            'required' => 'Perihal harus diisi!'
        ]);
        $this->form_validation->set_rules('tempat', 'Tempat Acara', 'required',[
            'required' => 'Tempat Acara harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Edit Surat';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['surat'] = $this->Admin_model->getSuratWhere($no_surat);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/ed_keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->editMasuk($no_surat);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Surat undangan berhasil diperbaharui.</div>');
            redirect('admin/surat_keluar');
        }
    }

    public function hapus_surat($no_surat){
        $this->Admin_model->hapus($no_surat);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Surat undangan berhasil dihapus.</div>');
        redirect('admin/surat');
    }

    public function tambah_notulensi($no_surat){ //upload notulensi
        $data['judul'] = 'Admin - Upload Notulensi';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Admin_model->getSuratWhere($no_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/th_notulensi', $data);
        $this->load->view('templates/footer');
    }

    public function save_notulen(){ //upload notulensi
        $no_surat = $this->input->post('no_surat', true);

        $config['upload_path'] = './surat/Notulensi/';
        $config['allowed_types'] = 'png|jpg|jpeg|pdf';
        $config['file_name'] = 'Notulen-'.$no_surat;
        $config['max_size'] = 1024;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('notulensi');
        $result = $this->upload->data();
        
        if (empty($result['file_type'])){
            $notulensi = '';
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Harap upload notulensi dengan benar!</div>');
        } else {
            $notulensi = $result['file_name'];
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Notulensi berhasil diupload.</div>');
        }

        $query = "UPDATE tb_surat SET notulensi = '$notulensi' WHERE no_surat = '$no_surat'";
        $this->db->query($query);
        redirect('admin/surat');
    }

    public function tambah_ttd($no_surat){ //upload surat ttd
        $data['judul'] = 'Admin - Upload Surat';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Admin_model->getSuratWhere($no_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/th_ttd', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_hadir($no_surat){ //upload Daftar Hadir
        $data['judul'] = 'Admin - Upload Daftar Hadir';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['surat'] = $this->Admin_model->getSuratWhere($no_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/th_hadir', $data);
        $this->load->view('templates/footer');
    }

    public function save_ttd(){ //upload surat ttd
        $no_surat = $this->input->post('no_surat', true);

        $config['upload_path'] = './surat/Keluar/';
        $config['allowed_types'] = 'png|jpg|jpeg|pdf';
        $config['file_name'] = 'TTD-Keluar-'.$no_surat;
        $config['max_size'] = 1024;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('surat_ttd');
        $result = $this->upload->data();

        if (empty($result['file_type'])){
            $lamp = '';
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Harap upload surat dengan benar!</div>');
        } else {
            $lamp = $result['file_name'];
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Surat berhasil diupload.</div>');
            $query = "UPDATE tb_surat SET lampiran = '$lamp' WHERE no_surat = '$no_surat'";
            $this->db->query($query);
        }

        redirect('admin/surat_keluar');
    }

    public function save_hadir(){ //upload hadir
        $no_surat = $this->input->post('no_surat', true);

        $config['upload_path'] = './surat/Daftar-Hadir/';
        $config['allowed_types'] = 'png|jpg|jpeg|pdf';
        $config['file_name'] = 'Daftar Hadir-'.$no_surat;
        $config['max_size'] = 2048;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('hadir');
        $result = $this->upload->data();

        if (empty($result['file_type'])){
            $lamp = '';
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Harap upload daftar hadir dengan benar!</div>');
        } else {
            $lamp = $result['file_name'];
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Daftar hadir berhasil diupload.</div>');
            $query = "UPDATE tb_surat SET daftar_hadir = '$lamp' WHERE no_surat = '$no_surat'";
            $this->db->query($query);
        }

        redirect('admin/surat_keluar');
    }

    public function download($lmp){
        $path = './surat/Notulensi/'.$lmp;
        force_download($path, NULL);
    }

    public function fpdf($no_surat){ //fpdf
        $this->load->library('myfpdf');
        $data = [
            'surat' => $this->Admin_model->getSuratWhere($no_surat),
            'terus' =>  $this->Admin_model->getDiteruskan($no_surat)
        ];
        $this->load->view('admin/fpdf', $data);
    }

    public function fpdf_hadir($no_surat){ //fpdf
        $this->load->library('myfpdf');
        $data = [
            'surat' => $this->Admin_model->getSuratWhere($no_surat)
        ];
        $this->load->view('admin/fpdf_hadir', $data);
    }

    public function fpdf_notulen($no_surat){ //fpdf
        $this->load->library('myfpdf');
        $data = [
            'surat' => $this->Admin_model->getSuratWhere($no_surat)
        ];
        $this->load->view('admin/fpdf_notulen', $data);
    }

    public function notulen($no_surat){
        $this->form_validation->set_rules('notulensi', 'Notulensi', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Notulensi';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['surat'] = $this->Admin_model->getSuratWhere($no_surat);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/notulensi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->notulensi($no_surat);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Notulensi berhasil ditambahkan.</div>');
            redirect('admin/surat_keluar');
        }
    }
    public function kirim_pesan($no_surat){
        $this->form_validation->set_rules('notulensi', 'Notulensi', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Notulensi';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['surat'] = $this->Admin_model->getSuratWhere($no_surat);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/kirim_pesan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->notulensi($no_surat);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Notulensi berhasil ditambahkan.</div>');
            redirect('admin/surat_keluar');
        }
    }

    public function laporan_sm(){
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required',[
            'required' => 'Tanggal Awal harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required',[
            'required' => 'Tanggal Akhir harus diisi!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_sm', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $data = [
                'awal' => $this->input->post('tgl_awal'),
                'akhir' => $this->input->post('tgl_akhir'),
                'sm' => $this->Admin_model->getSMReport()
            ];
            $this->load->view('admin/fpdf_sm', $data);
        }
    }

    public function laporan_sk(){
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required',[
            'required' => 'Tanggal Awal harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required',[
            'required' => 'Tanggal Akhir harus diisi!'
        ]);
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required',[
            'required' => 'Tujuan harus diisi!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['tujuan'] = ['Kantor', 'Kab. Banjar', 'Provinsi'];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_sk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $data = [
                'awal' => $this->input->post('tgl_awal'),
                'akhir' => $this->input->post('tgl_akhir'),
                'tujuan' => $this->input->post('tujuan'),
                'sk' => $this->Admin_model->getSKReport()
            ];
            $this->load->view('admin/fpdf_sk', $data);
        }
    }

    public function laporan_dis(){
        $this->load->library('myfpdf');
        $data['dis'] = $this->Admin_model->getJmlDis();
        $this->load->view('admin/fpdf_dis', $data);
    }

    public function laporan_pegawai(){
        $this->load->library('myfpdf');
        $data['pegawai'] = $this->Admin_model->getPegawai();
        $this->load->view('admin/fpdf_pegawai', $data);
    }

    public function laporan_pengirim(){
        $this->form_validation->set_rules('id_pengirim', 'Nama Pengirim', 'required',[
            'required' => 'Nama Pengirim harus dipilih!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['pengirim'] = $this->Admin_model->getAllPengirim();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_pengirim', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $id_pengirim = $this->input->post('id_pengirim');
            $data = [
                'kirim' => $this->Admin_model->getPengirimSurat($id_pengirim)
            ];
            $this->load->view('admin/fpdf_pengirim', $data);
        }
    }

    public function laporan_dispeg(){
        $this->form_validation->set_rules('nip', 'Nama Pegawai', 'required',[
            'required' => 'Nama Pegawai harus diisi!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['pegawai'] = $this->Admin_model->getPegawai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_dispeg', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $data = [
                'nip' => $this->input->post('nip'),
                'dispeg' => $this->Admin_model->getDisPeg()
            ];
            $this->load->view('admin/fpdf_dispeg', $data);
        }
    }

    public function laporan_honor(){
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required',[
            'required' => 'Tanggal Awal harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required',[
            'required' => 'Tanggal Akhir harus diisi!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_honor', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $data = [
                'awal' => $this->input->post('tgl_awal'),
                'akhir' => $this->input->post('tgl_akhir'),
                'honor' => $this->Admin_model->getHonorReport()
            ];
            $this->load->view('admin/fpdf_rphonor', $data);
        }
    }

    public function laporan_hadir(){
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required',[
            'required' => 'Tanggal Awal harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required',[
            'required' => 'Tanggal Akhir harus diisi!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_hadir', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $data = [
                'awal' => $this->input->post('tgl_awal'),
                'akhir' => $this->input->post('tgl_akhir'),
                'hadir' => $this->Admin_model->getHadirReport()
            ];
            $this->load->view('admin/fpdf_rphadir', $data);
        }
    }
      public function laporan_notice(){
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required',[
            'required' => 'Tanggal Awal harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required',[
            'required' => 'Tanggal Akhir harus diisi!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_notice', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $data = [
                'awal' => $this->input->post('tgl_awal'),
                'akhir' => $this->input->post('tgl_akhir'),
                'notice' => $this->Admin_model->getNoticeReport()
            ];
            $this->load->view('admin/fpdf_rpnotice', $data);
        }
    }

    public function laporan_notulen(){
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required',[
            'required' => 'Tanggal Awal harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required',[
            'required' => 'Tanggal Akhir harus diisi!'
        ]);
        
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Cetak Laporan';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/rept_notulen', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('myfpdf');
            $data = [
                'awal' => $this->input->post('tgl_awal'),
                'akhir' => $this->input->post('tgl_akhir'),
                'notulen' => $this->Admin_model->getHadirReport()
            ];
            $this->load->view('admin/fpdf_rpnotulen', $data);
        }
    }

    public function honor(){
        $data['judul'] = 'Admin - Data Honorarium Rapat';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['honor'] = $this->Admin_model->getAllHonor();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/dt_honor', $data);
        $this->load->view('templates/footer');
    }

    public function th_honor(){

        $this->form_validation->set_rules('no_honor', '', 'required|trim|is_unique[tb_honor.no_honor]',[
            'required' => 'Nomor Honor harus diisi!',
            'is_unique' => 'Nomor Honor sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('id_surat', 'No Surat', 'required',[
            'required' => 'Nomor Surat harus dipilih!'
        ]);
        $this->form_validation->set_rules('tgl_honor', 'Tanggal', 'required',[
            'required' => 'Tanggal harus diisi!'
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric',[
            'required' => 'Nominal harus diisi!',
            'numeric' => 'Masukkan Nominal dengan benar!'
        ]);
        $this->form_validation->set_rules('jml_penerima', 'Jumlah Penerima', 'required|numeric',[
            'required' => 'Jumlah Penerima harus diisi!',
            'numeric' => 'Masukkan Jumlah Penerima dengan benar!'
        ]);

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Tambah Honorarium Rapat';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['surat'] = $this->Admin_model->getAllSurat();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/th_honor', $data);
            $this->load->view('templates/footer');
        } else {
            $id_surat = $this->input->post('id_surat');
            $honor = $this->Admin_model->cekHonor($id_surat);
            if (!$honor){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Honorarium rapat gagal ditambahkan. Harap perhatikan tanggal surat.</div>');
                redirect('admin/honor');
            } else {
                $this->Admin_model->addHonor();
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Honorarium rapat berhasil ditambahkan.</div>');
                redirect('admin/honor');
            }
        }
        
    }

    public function hapus_honor($id){
        $this->Admin_model->hapus_honor($id);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data honorarium berhasil dihapus.</div>');
        redirect('admin/honor');
    }

    public function edit_honor($id){

        $this->form_validation->set_rules('no_honor', 'No Honor', 'required|trim');
        $this->form_validation->set_rules('tgl_honor', 'Tanggal', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        $this->form_validation->set_rules('jml_penerima', 'Jumlah Penerima', 'required|numeric');

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'Admin - Edit Honorarium Rapat';
            $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['honor'] = $this->Admin_model->getHonorById($id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/ad_sidebar');
            $this->load->view('admin/ed_honor', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->edHonor($id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data honorarium rapat berhasil diperbarui.</div>');
            redirect('admin/honor');
            
        }
        
    }

    public function fpdf_honor($id){ //fpdf
        $this->load->library('myfpdf');
        $data = [
            'honor' => $this->Admin_model->getHonorById($id),
        ];
        $this->load->view('admin/fpdf_honor', $data);
    }

    public function tambah_bukti($id){ //upload surat ttd
        $data['judul'] = 'Admin - Upload BUkti';
        $data['user'] = $this->db->get_where('tb_pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['honor'] = $this->Admin_model->getHonorById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/ad_sidebar');
        $this->load->view('admin/th_buktihonor', $data);
        $this->load->view('templates/footer');
    }

    public function save_bukti(){ //upload surat ttd
        $id = $this->input->post('id_honor', true);

        $config['upload_path'] = './honor/';
        $config['allowed_types'] = 'png|jpg|jpeg|pdf';
        $config['file_name'] = 'Bukti Penerimaan Honor-'.$id;
        $config['max_size'] = 1024;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('bukti_honor');
        $result = $this->upload->data();

        if (empty($result['file_type'])){
            $lamp = '';
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Harap upload bukti dengan benar!</div>');
        } else {
            $lamp = $result['file_name'];
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Bukti Honor berhasil diupload.</div>');
            $query = "UPDATE tb_honor SET bukti = '$lamp' WHERE id_honor = '$id'";
            $this->db->query($query);
        }

        redirect('admin/honor');
    }
}