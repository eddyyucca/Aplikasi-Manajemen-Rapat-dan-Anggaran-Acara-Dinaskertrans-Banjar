<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function addSurat(){
        $jenis = $this->input->post('jenis');
        $no_surat = $this->input->post('no_surat');

        //kode
        $this->db->select('RIGHT(tb_surat.id_surat,4) as kode', FALSE);
        $this->db->order_by('id_surat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_surat'); 
        if($query->num_rows() <> 0){        
            $data = $query->row();      
            $kode = intval($data->kode) + 1;    
        }
        else {          
            $kode = 1;    
        }
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = $kodemax;
        
        //kode//

        if ($jenis == "Masuk"){
            $tujuan = "-";

            $terus = $this->input->post('terus');
            $data = array();

            $index = 0;
            if(is_array($terus)){
                foreach($terus as $datanip) {
                    array_push($data, array(
                        'nip' => $datanip,
                        'id_surat' => $kodejadi,
                    ));
                    $index++;
                }
            }
            $this->db->insert_batch('tb_detil_surat', $data);

            $config['upload_path'] = './surat/Masuk/';
            $config['allowed_types'] = 'png|jpg|jpeg|pdf';
            $config['file_name'] = 'Masuk-'.$no_surat;
            $config['max_size'] = 1024;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            $this->upload->do_upload('lampiran');
            $result = $this->upload->data();

            $lampiran = $result['file_name'];
            $id_pengirim = $this->input->post('id_pengirim', true);
        } else {
            $tujuan = $this->input->post('tujuan');

            $lampiran = '';
            $id_pengirim = '';
        }

        $tgl_a = $this->input->post('tgl_acara', true);
        $wkt_a = $this->input->post('waktu_acara', true);

        $now = date('Y-m-d', now());
        $tgl = $this->input->post('tanggal', true);
        if ($tgl < $now){
            $tgl = $now;
        } else {
            $tgl = $this->input->post('tanggal', true);
        }

        if ($tgl_a < $now){
            $tgl_a = $tgl;
        } else {
            if ($tgl_a < $tgl){
                $tgl_a = $tgl;
            } else {
                $tgl_a = $this->input->post('tgl_acara', true);
            }
        }

        $dt = [
            'id_surat' => $kodejadi,
            'no_surat' => $this->input->post('no_surat', true),
            'tanggal' => $tgl,
            'perihal' => $this->input->post('perihal', true),
            'id_pengirim' => $id_pengirim,
            'tempat' => $this->input->post('tempat', true),
            'tgl_acara' => $tgl_a,
            'waktu_acara' => $wkt_a,
            'catatan' => $this->input->post('catatan', true),
            'lampiran' => $lampiran,
            'tujuan' => $tujuan,
            'jenis_surat' => $jenis,
            'notulensi' => ""
        ];

        $this->db->insert('tb_surat', $dt);
    }

    public function addPegawai(){
        $bagian = $this->input->post('bagian', true);
        if($bagian == "Kabag Umum"){
            $role = "umum";
        } else if($bagian == "Kabag Organisasi"){
            $role = "organ";
        } else if($bagian == "Kabag Hukum"){
            $role = "hukum";
        } else{
            $role = "staff";
        }

        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $role,
            'bagian' => $bagian
        ];

        $this->db->insert('tb_pegawai', $data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Akun telah berhasil didaftarkan.</div>');
    }

    public function getPegawai(){
        $query = "SELECT * FROM TB_PEGAWAI WHERE role <> 'admin'";
        return $this->db->query($query)->result_array();
    }

    public function getAllSurat(){
        return $this->db->get('tb_surat')->result_array();
    }

    public function getDiteruskan($no_surat){
        $query = "SELECT * FROM tb_pegawai JOIN tb_detil_surat USING (nip) JOIN tb_surat USING (id_surat) WHERE id_surat = '$no_surat'";
        return $this->db->query($query)->result_array();
    }

    public function getAllSuratMasuk(){
        $this->db->from('tb_surat a');
        $this->db->join('tb_pengirim b', 'a.id_pengirim = b.id_pengirim');
        $this->db->where('jenis_surat', 'Masuk');
        return $this->db->get()->result_array();
    }

    public function getAllSuratKeluar(){
        $this->db->from('tb_surat');
        $this->db->where('jenis_surat', 'Keluar');
        return $this->db->get()->result_array();
    }

    public function getSuratWhere($no_surat){
        $this->db->from('tb_surat');
        $this->db->where('id_surat', $no_surat);
        return $this->db->get()->row_array();
    }

    public function editMasuk($no_surat){
        $now = date('Y-m-d', now());
        $tgl = $this->input->post('tanggal', true);
        if ($tgl < $now){
            $tgl = $now;
        } else {
            $tgl = $this->input->post('tanggal', true);
        }
        
        $data = [
            'tanggal' => $tgl,
            'perihal' => $this->input->post('perihal', true),
            'tempat' => $this->input->post('tempat', true),
            'catatan' => $this->input->post('catatan', true),
        ];

        $this->db->where('id_surat', $no_surat);
        $this->db->update('tb_surat', $data);
    }

    public function hapus($no_surat){
        $query = $this->db->query("SELECT * FROM tb_surat WHERE id_surat = '$no_surat'")->row_array();
        $jns = $query['jenis_surat'];
        $lmp = $query['lampiran'];
        $notu = $query['notulensi'];
        
        $path = './surat/'.$jns.'/'.$lmp;
        unlink($path);

        $this->db->delete('tb_surat', ['id_surat' => $no_surat]);
        $this->db->delete('tb_detil_surat', ['id_surat' => $no_surat]);
    }

    public function getSurat(){
        $tgl = date('Y-m-d',now());
        $query = "SELECT * FROM tb_surat WHERE tgl_acara = '$tgl' ORDER BY jenis_surat DESC";
        return $this->db->query($query)->result_array();
    }

    public function notulensi($no_surat){
        $data = [
            'notulensi' => $this->input->post('notulensi', true)
        ];

        $this->db->where('id_surat', $no_surat);
        $this->db->update('tb_surat', $data);
    }

    public function getSMReport(){
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        $query = "SELECT * FROM tb_surat JOIN tb_pengirim USING (id_pengirim) WHERE jenis_surat = 'Masuk' AND tanggal BETWEEN '$awal' AND '$akhir' ORDER BY tanggal ASC";
        return $this->db->query($query)->result_array();
    }

    public function getSKReport(){
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');
        $tujuan = $this->input->post('tujuan');

        $query = "SELECT * FROM tb_surat WHERE jenis_surat = 'Keluar' AND tanggal BETWEEN '$awal' AND '$akhir' AND tujuan = '$tujuan' ORDER BY tanggal ASC";
        return $this->db->query($query)->result_array();
    }

    public function getJmlDis(){
        $query = "SELECT nip, nama, bagian, count(nip) as jml FROM tb_pegawai JOIN tb_detil_surat USING (nip) GROUP BY nip, nama, bagian ORDER BY NIP ASC";
        return $this->db->query($query)->result_array();
    }

    public function getDisPeg(){
        $nip = $this->input->post('nip');
        $query = "SELECT * FROM tb_surat JOIN tb_detil_surat USING (id_surat) JOIN tb_pegawai USING (nip) WHERE nip = '$nip' ORDER BY no_surat ASC";
        return $this->db->query($query)->result_array();
    }

    // honor

    public function getAllHonor(){
        $this->db->select('*');
        $this->db->from('tb_honor a');
        $this->db->join('tb_surat b', 'a.id_surat = b.id_surat');
        return $this->db->get()->result_array();
    }

    public function addHonor(){
        $data = [
            'id_surat' => $this->input->post('id_surat'),
            'no_honor' => $this->input->post('no_honor'),
            'tgl_honor' => $this->input->post('tgl_honor'),
            'nominal' => $this->input->post('nominal'),
            'jml_penerima' => $this->input->post('jml_penerima'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('tb_honor', $data);
    }

    public function cekHonor($id){
        $this->db->select('tanggal');
        $this->db->where('id_surat', $id);
        $query = $this->db->get('tb_surat')->row_array();

        $tgl_surat = strtotime($query['tanggal']);
        $tgl_now = date(now());

        /* if($tgl_now < $tgl_surat){
            return FALSE;
        } else{
            return TRUE;
        } */
        return TRUE;
    }

    public function hapus_honor($id){
        $this->db->where('id_honor', $id);
        $this->db->delete('tb_honor');
    }

    public function getHonorById($id){
        $this->db->select('a.id_honor, a.id_surat, b.no_surat, a.no_honor, a.tgl_honor, a.nominal, a.jml_penerima, a.keterangan, b.tanggal, b.perihal, b.tempat, (a.nominal / a.jml_penerima) as honor');
        $this->db->from('tb_honor a');
        $this->db->join('tb_surat b', 'a.id_surat = b.id_surat');
        $this->db->where('a.id_honor', $id);
        return $this->db->get('tb_honor')->row_array();
    }

    public function getHonorReport(){
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        $this->db->select('*');
        $this->db->from('tb_honor a');
        $this->db->join('tb_surat b', 'a.id_surat = b.id_surat');
        $this->db->where('tgl_honor >=', $awal);
        $this->db->where('tgl_honor <=', $akhir);
        return $this->db->get()->result_array();
    }

    public function edHonor($id){
        $data = [
            'no_honor' => $this->input->post('no_honor'),
            'tgl_honor' => $this->input->post('tgl_honor'),
            'nominal' => $this->input->post('nominal'),
            'jml_penerima' => $this->input->post('jml_penerima'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id_honor', $id);
        $this->db->update('tb_honor', $data);
    }

    public function nama_bulan($bln){
        $nm_bln = '';

        switch ($bln) {
            case '01':
                $nm_bln = 'Januari';
                break;
            case '02':
                $nm_bln = 'Februari';
                break;    
            case '03':
                $nm_bln = 'Maret';
                break;
            case '04':
                $nm_bln = 'April';
                break;
            case '05':
                $nm_bln = 'Mei';
                break;
            case '06':
                $nm_bln = 'Juni';
                break;
            case '07':
                $nm_bln = 'Juli';
                break;
            case '08':
                $nm_bln = 'Agustus';
                break;
            case '09':
                $nm_bln = 'September';
                break;
            case '10':
                $nm_bln = 'Oktober';
                break;
            case '11':
                $nm_bln = 'November';
                break;
            default:
                $nm_bln = 'Desember';
                break;
        }

        return $nm_bln;
    }

    //pengirim
     public function getAllPengirim(){
         return $this->db->get('tb_pengirim')->result_array();
     }

     public function addPengirim(){
         $data = [
             'nm_pengirim' => $this->input->post('nm_pengirim'),
             'alamat_pengirim' => $this->input->post('alamat_pengirim'),
             'notelp_pengirim' => $this->input->post('notelp_pengirim')
         ];

         $this->db->insert('tb_pengirim', $data);
     }

     public function getPengirimSurat($id_pengirim){
         $this->db->from('tb_pengirim a');
         $this->db->join('tb_surat b', 'a.id_pengirim = b.id_pengirim');
         $this->db->where('a.id_pengirim', $id_pengirim);
         return $this->db->get()->result_array();
     }

     public function getHadirReport(){
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        $query = "SELECT * FROM tb_surat WHERE jenis_surat = 'Keluar' AND tanggal BETWEEN '$awal' AND '$akhir' ORDER BY tanggal ASC";
        return $this->db->query($query)->result_array();
    }
    public function getNoticeReport(){
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        $query = "SELECT * FROM pesan join tb_surat on pesan.id_surat=tb_surat.id_surat WHERE  tgl BETWEEN '$awal' AND '$akhir' ORDER BY tanggal ASC";
        return $this->db->query($query)->result_array();
    }
      public function getBroadcastReport(){
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('tgl_akhir');

        $query = "SELECT * FROM broadcast WHERE  tgl BETWEEN '$awal' AND '$akhir' ORDER BY tgl ASC";
        return $this->db->query($query)->result_array();
    }
}