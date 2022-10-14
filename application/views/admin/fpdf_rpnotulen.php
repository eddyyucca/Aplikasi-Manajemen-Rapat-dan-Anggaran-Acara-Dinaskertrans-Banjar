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
    $this->Cell(235,7,'PEMERINTAH KABUPATEN BANJAR',0,1,'C');
    
    $this->SetFont('Times','',20);
    $this->Cell(22);
	$this->Cell(235,8,'DINAS TENAGA KERJA DAN TRANSMIGRASI',0,1,'C');
    
    $this->SetFont('Times','B',10);
    $this->Cell(22);
    $this->Cell(235,4,'Jalan A. Yani Km. 37,5 No. 119 Kel. Sungai Paring, Martapura 70611 Kalimantan Selatan',0,1,'C');
    
    $this->Line(10.0, 35.0, 285.0, 35.0);
    
}

}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage('L', 'A4', '0');

$this->myfpdf->Ln(10);
$this->myfpdf->SetFont('Times','B',20);
$this->myfpdf->Cell(275,8,'LAPORAN NOTULENSI',0,1,'C');
$this->myfpdf->Ln(3);

$this->myfpdf->SetFont('Times','',11);

$this->myfpdf->Cell(30,8,'Laporan tanggal',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$awal.' - '.$akhir,0,1,'');

$this->myfpdf->Ln(3);
$this->myfpdf->SetFont('Times','B',10);
$this->myfpdf->Cell(10,7,'No',1,0,'C');
$this->myfpdf->Cell(35,7,'No Surat',1,0,'C');
$this->myfpdf->Cell(40,7,'Perihal',1,0,'C');
$this->myfpdf->Cell(130,7,'Notulensi',1,0,'C');
$this->myfpdf->Cell(60,7,'File Notulensi',1,1,'C');

$no = 1;
foreach($notulen as $s) { 
    $this->myfpdf->SetFont('Times','',10);
    $this->myfpdf->Cell(10,7,$no,1,0,'C');
    $this->myfpdf->Cell(35,7,$s['no_surat'],1,0,'C');

    $perihal = substr($s['perihal'],0,25);
    $this->myfpdf->Cell(40,7,$perihal,1,0,'C');

    $not = substr($s['notulensi'],0,80);
    $this->myfpdf->Cell(130,7,'`'.$not.'`',1,0,'C');

    $this->myfpdf->SetFont('Times','',8);
    $this->myfpdf->Cell(60,7,'Notulensi-'.$s['tujuan'].'-'.$s['no_surat'].'.pdf',1,1,'C');

    $no++;
}

$this->myfpdf->SetFont('Times','',11);
$pos_y = $this->myfpdf->getY() + 10;
$this->myfpdf->SetY($pos_y);
$this->myfpdf->Cell(205,8,'',0,0,'C');
$this->myfpdf->Cell(70,8,'Penanggung Jawab',0,1,'C');

$this->myfpdf->Ln(15);

$this->myfpdf->SetFont('Times','BU',11);
$this->myfpdf->Cell(205,8,'',0,0,'C');
$this->myfpdf->Cell(70,8,'Safrin Noor, SH., MH',0,1,'C');

$this->myfpdf->SetFont('Times','',11);
$this->myfpdf->Cell(205,5,'',0,0,'C');
$this->myfpdf->Cell(70,5,'NIP. 19640909 199203 1 013',0,1,'C');

$this->myfpdf->Output('D','Laporan Notulensi.pdf');
?>
