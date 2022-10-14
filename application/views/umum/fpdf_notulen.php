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
$this->myfpdf->Cell(190,8,'NOTULENSI',0,1,'C');
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

$this->myfpdf->Ln(5);
$not = $surat['notulensi'];
$this->myfpdf->MultiCell(190,8,$not,0,'J','');

$this->myfpdf->Ln(10);
$this->myfpdf->SetX(15);
$this->myfpdf->SetFont('Times','',12);
$this->myfpdf->Cell(50,5,'Mengetahui,',0,1,'');

//ttd subbag
$this->myfpdf->SetX(15);
$this->myfpdf->Cell(65,5,'Kepala Bagian Organisasi',0,1,'L');
$this->myfpdf->SetXY(15,110);
$this->myfpdf->SetFont('Times','U',12);
$this->myfpdf->Cell(65,5,'H. Ahmad Fauzi, SE., M.Si',0,1,'L');

$this->myfpdf->SetX(15);
$this->myfpdf->SetFont('Times','',12);
$this->myfpdf->Cell(65,5,'NIP. 19840310 199003 1 018',0,1,'L');

//ttd pemohon
$this->myfpdf->SetXY(130,81);
$this->myfpdf->Cell(65,5,'Notulis,',0,1,'L');
$this->myfpdf->SetXY(130,110);
$this->myfpdf->SetFont('Times','U',12);
$this->myfpdf->Cell(65,5,'Hamdanah, S.STP',0,1,'L');

$this->myfpdf->SetXY(130,115);
$this->myfpdf->SetFont('Times','',12);
$this->myfpdf->Cell(65,5,'NIP. 19840805 200212 2 001',0,1,'L');

$this->myfpdf->Output('D','Notulensi-'.$surat['no_surat'].'.pdf');
?>
