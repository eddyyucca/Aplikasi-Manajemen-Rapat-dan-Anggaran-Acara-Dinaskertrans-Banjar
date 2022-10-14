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
$this->myfpdf->Cell(190,8,'DAFTAR PENERIMA HONOR KEGIATAN RAPAT',0,1,'C');
$this->myfpdf->Ln(5);

$this->myfpdf->SetFont('Times','',12);

$this->myfpdf->Cell(40,8,'Nomor Surat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$honor['no_surat'],0,1,'');

$this->myfpdf->Cell(40,8,'Nomor Honor',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$honor['no_honor'],0,1,'');

$this->myfpdf->Cell(40,8,'Tanggal Honor',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$tgl = date('d, F Y', strtotime($honor['tgl_honor']));
$this->myfpdf->Cell(100,8,$tgl,0,1,'');

$this->myfpdf->Cell(40,8,'Tempat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$honor['tempat'],0,1,'');

$this->myfpdf->Cell(40,8,'Perihal',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$honor['perihal'],0,1,'');

$this->myfpdf->Ln(5);
$this->myfpdf->SetFont('Times','B',12);
$this->myfpdf->Cell(10,7,'No.',1,0,'C');
$this->myfpdf->Cell(50,7,'Nama',1,0,'C');
$this->myfpdf->Cell(40,7,'SKPD / Jabatan',1,0,'C');
$this->myfpdf->Cell(40,7,'Rincian',1,0,'C');
$this->myfpdf->Cell(50,7,'Tanda Tangan',1,1,'C');

$this->myfpdf->SetFont('Times','',10);
for ($i=1; $i <= 14; $i++) { 
    $this->myfpdf->Cell(10,10,$i,1,0,'C');
    $this->myfpdf->Cell(50,10,'',1,0,'C');
    $this->myfpdf->Cell(40,10,'',1,0,'C');
    $this->myfpdf->Cell(40,10,' ',1,0,'C');
    if($i % 2 == 1){
        $this->myfpdf->Cell(50,10,$i.'.',1,1,'L');
    } else{
        $this->myfpdf->Cell(50,10,$i.'.',1,1,'C');
    }
    

}

$this->myfpdf->SetFont('Times','B',12);
$this->myfpdf->Cell(100,7,'JUMLAH',1,0,'C');
$this->myfpdf->Cell(40,7,'Rp. '.number_format($honor['nominal'], 2, ".", ","),1,0,'C');
$this->myfpdf->Cell(50,7,' ',1,1,'C');

$this->myfpdf->SetXY(130,225);
$this->myfpdf->Cell(60,5,'Kepala Dinas',0,1,'C');
$this->myfpdf->SetXY(130,230);
$this->myfpdf->Cell(60,5,'',0,1,'C');

$this->myfpdf->SetXY(130,260);
$this->myfpdf->SetFont('Times','U',12);
$this->myfpdf->Cell(60,5,'Safrin Noor, SH., MH',0,1,'C');
$this->myfpdf->SetFont('Times','',12);
$this->myfpdf->SetXY(130,265);
$this->myfpdf->Cell(60,5,'NIP. 19640909 199203 1 013',0,1,'C');

$this->myfpdf->Output('D','Daftar Honorarium-'.$honor['no_surat'].'.pdf');
?>
