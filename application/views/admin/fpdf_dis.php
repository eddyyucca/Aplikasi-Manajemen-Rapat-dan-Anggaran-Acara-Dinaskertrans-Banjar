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
    $this->Cell(177,4,'Jalan A. Yani Km. 37,5 No. 119 Kel. Sungai Paring, Martapura 70611 Kalimantan Selatan`',0,0,'C');
    
    $this->Line(10.0, 35.0, 200.0, 35.0);
    $this->Ln(8);
}

}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage('P', 'A4', '0');

$this->myfpdf->Ln(10);
$this->myfpdf->SetFont('Times','B',20);
$this->myfpdf->Cell(190,8,'LAPORAN REKAP DISPOSISI',0,1,'C');

$this->myfpdf->Ln(3);
$this->myfpdf->SetFont('Times','B',11);
$this->myfpdf->Cell(10,7,'NO.',1,0,'C');
$this->myfpdf->Cell(40,7,'NIP',1,0,'C');
$this->myfpdf->Cell(60,7,'NAMA',1,0,'C');
$this->myfpdf->Cell(55,7,'BAGIAN',1,0,'C');
$this->myfpdf->Cell(25,7,'JUMLAH',1,1,'C');

$this->myfpdf->SetFont('Times','',10);
$no = 1;
foreach($dis as $s) { 
    $this->myfpdf->Cell(10,7,$no,1,0,'C');
    $this->myfpdf->Cell(40,7,$s['nip'],1,0,'');
    $this->myfpdf->Cell(60,7,$s['nama'],1,0,'');
    $this->myfpdf->Cell(55,7,$s['bagian'],1,0,'');
    $this->myfpdf->Cell(25,7,$s['jml'],1,1,'');

    $no++;
}

$this->myfpdf->Output('D','Rekap-Disposisi.pdf');
?>
