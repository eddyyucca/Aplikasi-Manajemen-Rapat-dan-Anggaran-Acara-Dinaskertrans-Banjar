<?php


class RPDF extends FPDF
{
// Page header
function Header()
{

}

}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage('P', 'A4', '0');

$this->myfpdf->SetFont('Times','B',20);
$this->myfpdf->Cell(190,8,'LAPORAN DAFTAR HADIR',0,1,'C');
$this->myfpdf->Ln(3);

$this->myfpdf->SetFont('Times','',12);

$this->myfpdf->Cell(40,8,'Nomor Surat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['no_surat'],0,1,'');

$this->myfpdf->Cell(40,8,'Tanggal Surat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$tgl = date('d, F Y', strtotime($surat['tanggal']));
$this->myfpdf->Cell(100,8,$tgl,0,1,'');

$this->myfpdf->Cell(40,8,'Tempat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['tempat'],0,1,'');

$this->myfpdf->Cell(40,8,'Perihal',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['perihal'],0,1,'');

$this->myfpdf->Ln(3);
$this->myfpdf->SetFont('Times','B',12);
$this->myfpdf->Cell(10,7,'No.',1,0,'C');
$this->myfpdf->Cell(100,7,'SKPD / Jabatan',1,0,'C');
$this->myfpdf->Cell(80,7,'Tanda Tangan',1,1,'C');

$this->myfpdf->SetFont('Times','',12);
for ($i=1; $i < 51; $i++) { 
    $this->myfpdf->Cell(10,10,$i,1,0,'C');
    $this->myfpdf->Cell(100,10,'',1,0,'C');
    $this->myfpdf->Cell(80,10,'',1,1,'C');

}

$this->myfpdf->Output('D','Daftar Hadir-'.$surat['jenis_surat'].'-'.$surat['no_surat'].'.pdf');
?>
