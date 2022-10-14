<?php


class RPDF extends FPDF
{
// Page header
function Header()
{
    $this->Image(base_url().'assets/assets/images/kab_banjar.png',10,6,20);
	$this->SetY(8);
	$this->SetFont('Times','B',17);
	$this->Cell(22);
    $this->Cell(177,7,'PEMERINTAH KABUPATEN BANJAR',0,0,'C');
    $this->Ln(7);
    
    $this->SetFont('Times','',20);
    $this->Cell(22);
	$this->Cell(177,8,'DINAS TENAGA KERJA DAN TRANSMIGRASI',0,0,'C');
    $this->Ln(8);
    
    $this->SetFont('Times','B',10);
    $this->Cell(22);
    $this->Cell(177,4,'Jalan A. Yani Km. 37,5 No. 119 Kel. Sungai Paring, Martapura 70611 Kalimantan Selatan',0,0,'C');
    
    $this->Line(10.0, 35.0, 200.0, 35.0);
    $this->Ln(8);
}

}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage('P', 'A4', '0');

$this->myfpdf->Ln(10);
$this->myfpdf->SetFont('Times','B',16);
$this->myfpdf->Cell(190,8,'LAPORAN PENERIMA SURAT MASUK',0,1,'C');

$query = $this->db->query("SELECT nip, nama, bagian, count(nip) as jml FROM tb_pegawai JOIN tb_detil_surat USING (nip) WHERE nip = '$nip' GROUP BY nip, nama, bagian ORDER BY NIP ASC ")->row_array();

$this->myfpdf->Ln(8);
$this->myfpdf->SetFont('Times','',11);
$this->myfpdf->Cell(20,7,'NIP',0,0,'');
$this->myfpdf->Cell(5,7,':',0,0,'C');
$this->myfpdf->Cell(70,7,$query['nip'],0,1,'');

$this->myfpdf->Cell(20,7,'Nama',0,0,'');
$this->myfpdf->Cell(5,7,':',0,0,'C');
$this->myfpdf->Cell(70,7,$query['nama'],0,1,'');

$this->myfpdf->Cell(20,7,'Bagian',0,0,'');
$this->myfpdf->Cell(5,7,':',0,0,'C');
$this->myfpdf->Cell(70,7,$query['bagian'],0,1,'');

$this->myfpdf->Cell(20,7,'Jumlah',0,0,'');
$this->myfpdf->Cell(5,7,':',0,0,'C');
$this->myfpdf->Cell(70,7,$query['jml'],0,1,'');
$this->myfpdf->Ln(3);

$this->myfpdf->SetFont('Times','B',11);
$this->myfpdf->Cell(10,7,'NO.',1,0,'C');
$this->myfpdf->Cell(50,7,'NO SURAT',1,0,'C');
$this->myfpdf->Cell(70,7,'PERIHAL',1,0,'C');
$this->myfpdf->Cell(60,7,'TANGGAL',1,1,'C');

$this->myfpdf->SetFont('Times','',10);
$no = 1;
foreach($dispeg as $s) { 
    $this->myfpdf->Cell(10,7,$no,1,0,'C');
    $this->myfpdf->Cell(50,7,$s['no_surat'],1,0,'C');
    $this->myfpdf->Cell(70,7,$s['perihal'],1,0,'C');
    $this->myfpdf->Cell(60,7,$s['tanggal'],1,1,'C');

    $no++;
}

$this->myfpdf->SetFont('Times','',11);
$pos_y = $this->myfpdf->getY() + 20;
$this->myfpdf->SetY($pos_y);
$this->myfpdf->Cell(120,8,'',0,0,'C');
$this->myfpdf->Cell(70,8,'Penanggung Jawab',0,1,'C');

$this->myfpdf->Ln(15);

$this->myfpdf->SetFont('Times','BU',11);
$this->myfpdf->Cell(120,8,'',0,0,'C');
$this->myfpdf->Cell(70,8,'Safrin Noor, SH., MH',0,1,'C');

$this->myfpdf->SetFont('Times','',11);
$this->myfpdf->Cell(120,5,'',0,0,'C');
$this->myfpdf->Cell(70,5,'NIP. 19640909 199203 1 013',0,1,'C');

$this->myfpdf->Output('D','Penerima surat-'.$nip.'.pdf');
?>
