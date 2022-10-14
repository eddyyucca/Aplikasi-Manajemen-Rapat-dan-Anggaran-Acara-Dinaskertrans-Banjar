<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organ_model extends CI_Model {
    public function getSurat(){
        $nip = $this->session->userdata('nip');
        $tgl = date('Y-m-d',now());
        $query = "SELECT id_surat, no_surat, tanggal, perihal, catatan, lampiran, tujuan, jenis_surat FROM tb_surat JOIN tb_detil_surat USING (id_surat) WHERE tgl_acara = '$tgl' AND nip = '$nip' ORDER BY jenis_surat DESC";
        return $this->db->query($query)->result_array();
    }

    public function getAllSurat(){
        $nip = $this->session->userdata('nip');
        $query = "SELECT id_surat, no_surat, tanggal, perihal, catatan, lampiran, tujuan, jenis_surat, notulensi FROM tb_surat JOIN tb_detil_surat USING (id_surat) WHERE nip = '$nip'";
        return $this->db->query($query)->result_array();
    }
}