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
    $this->Cell(177,4,'Jl. Jend. A. Yani No. 2 Telepon (0511) 4721538 - 4721002 Martaputa 70611',0,0,'C');
    
    $this->Line(10.0, 35.0, 200.0, 35.0);
    $this->Ln(8);
}



}

// Instanciation of inherited class
$this->myfpdf = new RPDF();
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage();

$this->myfpdf->Ln(8);

$this->myfpdf->SetFont('Times','',12);

$this->myfpdf->Ln(8);
$this->myfpdf->Cell(40,8,'Nomor Surat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(50,8,$surat['no_surat'],0,0,'');

$time = strtotime($surat['tanggal']);

$tgl = date('d', $time);
$bln = date('f', $time);
$thn = date('Y', $time);

$nm_bln = $this->Admin_model->nama_bulan($bln);
$this->myfpdf->Cell(95,8,'Martapura, '.$tgl.' '.$nm_bln.' '.$thn,0,1,'R');

$this->myfpdf->Cell(40,8,'Perihal',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['perihal'],0,1,'');

$this->myfpdf->Ln(8);

$this->myfpdf->Cell(100,8,'Yth. Sekda Kabupaten Banjar',0,1,'');
$this->myfpdf->Cell(100,8,'- di Martapura',0,1,'');

$this->myfpdf->Ln(8);

$this->myfpdf->Cell(100,8,'Dengan Hormat,',0,1,'');

$this->myfpdf->Ln(3);

$this->myfpdf->MultiCell(190,5,'Sehubungan dengan akan diselenggarakan rapat kerja rutin, kami mengharapkan kehadiran Bapak/Ibu sekalian. Rapat tersebut akan dilaksanakan pada:',0,'J');

$this->myfpdf->Cell(10,8,' ',0,0,'');
$this->myfpdf->Cell(40,8,'Tanggal',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$time2 = strtotime($surat['tgl_acara']);

$tgl = date('d', $time2);
$bln = date('f', $time2);
$thn = date('Y', $time2);

$nm_bln = $this->Admin_model->nama_bulan($bln);
$this->myfpdf->Cell(100,8,$tgl.' '.$nm_bln.' '.$thn,0,1,'');

//

$this->myfpdf->Cell(10,8,' ',0,0,'');
$this->myfpdf->Cell(40,8,'Pukul',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['waktu_acara'].' WITA',0,1,'');

//

$this->myfpdf->Cell(10,8,' ',0,0,'');
$this->myfpdf->Cell(40,8,'Tempat',0,0,'');
$this->myfpdf->Cell(5,8,':',0,0,'');
$this->myfpdf->Cell(100,8,$surat['tempat'],0,1,'');

$this->myfpdf->MultiCell(190,5,'Demikian surat undangan rapat yang kami sampaikan, atas perhatian Bapak/Ibu kami ucapkan terimakasih.',0,'J');
//

$this->myfpdf->SetXY(130,200);
$this->myfpdf->Cell(60,5,'Kepala Dinas',0,1,'C');
$this->myfpdf->SetXY(130,205);
$this->myfpdf->Cell(60,5,'',0,1,'C');

$this->myfpdf->SetXY(130,235);
$this->myfpdf->SetFont('Times','U',12);
$this->myfpdf->Cell(60,5,'Safrin Noor, SH., MH',0,1,'C');
$this->myfpdf->SetFont('Times','',12);
$this->myfpdf->SetXY(130,240);
$this->myfpdf->Cell(60,5,'NIP. 19640909 199203 1 013',0,1,'C');

$this->myfpdf->Ln(10);
$this->myfpdf->SetFont('Times','I',11);

if (!empty($terus)){
    $this->myfpdf->Cell(40,8,'Tembusan',0,1,'');

    $i = 1;
    foreach($terus as $t){
        $this->myfpdf->Cell(4,8,$i.'. ',0,0,'');
        $this->myfpdf->Cell(100,8,$t['bagian'],0,1,'');
        
        $i++;
    }
}

// $this->myfpdf->Ln(25);
// $this->myfpdf->SetXY(115,125);
// $tgl = date("d-m-Y", now());
// $this->myfpdf->Cell(80,10,'Banjarbaru, '.$tgl,0,0,'C');

// $this->myfpdf->SetXY(145,133);
// $this->myfpdf->Cell(20,10,'Pemohon,',0,0,'c');

// $this->myfpdf->SetXY(130,165);
// $this->myfpdf->Cell(50,10,$surat['no_surat'],0,0,'C');

//$pdf->Cell(60,10,'Nama Pemohon',0,0);
//$pdf->Cell(5,10,':',0,0);

$this->myfpdf->Output('D','Surat-'.$surat['jenis_surat'].'-'.$surat['no_surat'].'.pdf');
?>
