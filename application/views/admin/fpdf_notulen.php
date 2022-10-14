<?php


class RPDF extends FPDF
{
// Page header
function Header()
{
	// Logo
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
$this->myfpdf->AddPage();

$this->myfpdf->Ln(8);
$this->myfpdf->SetFont('Times','B',14);
$this->myfpdf->Cell(190,5,'NOTULEN',0,1,'C');

$this->myfpdf->SetFont('Times','',12);

$this->myfpdf->Ln(8);
$this->myfpdf->Cell(50,8,'Sidang / Rapat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['perihal'],0,1,'');

$this->myfpdf->Cell(50,8,'Waktu Acara',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['tgl_acara'].' - '.$surat['waktu_acara'].' WITA',0,1,'');

$this->myfpdf->Cell(50,8,'Tempat Acara',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['tempat'],0,1,'');

$this->myfpdf->Cell(50,8,'Hasil Rapat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
//$notulen = "Indonesia is categorized as one of tropical countries that have a high risk of snakebites. This surely may endanger rural citizens lives for there are still many snakes found in rural areas. The main cause of death from snakebite cases is by reason of the venom squirted from snakes canine teeth.  Others causes are errors in identifying the bite marks visually. There are anatomical differences between puncture wounds from venomous and non-venomous snakes. This study established a snakebite identification system using Active Contour Model and K Nearest Neighbor (KNN) methods.";
$this->myfpdf->MultiCell(100,8,$surat['notulensi'],0,'J');
//$this->myfpdf->MultiCell(130,8,$notulen,0,'J');

$this->myfpdf->SetXY(130,230);
$this->myfpdf->Cell(60,5,'Pimpinan Rapat',0,1,'C');
$this->myfpdf->SetXY(130,235);
$this->myfpdf->Cell(60,5,'Kepala Bagian Organisasi',0,1,'C');

$this->myfpdf->SetXY(130,265);
$this->myfpdf->Cell(60,5,'Anang Said, S.STP, M.AP',0,1,'C');
$this->myfpdf->SetXY(130,270);
$this->myfpdf->Cell(60,5,'NIP. 19770828 199511 1 001',0,1,'C');

$this->myfpdf->Ln(10);
$this->myfpdf->SetFont('Times','I',11);

$this->myfpdf->Output('D','Notulensi-'.$surat['tujuan'].'-'.$surat['no_surat'].'.pdf');
?>
