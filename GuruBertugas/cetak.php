<?php
require('config.php');
require('fpdf.php');

if(isset($_GET['id_janjitemu'])){
    $id_janjitemu = stripslashes($_GET['id_janjitemu']);
    $id_janjitemu = mysqli_real_escape_string($conn,$id_janjitemu);

    $queryView = "SELECT * FROM `janjitemu` WHERE `id_janjitemu`='".$id_janjitemu."'";//die($queryView);
    $resultView = mysqli_query($conn, $queryView);
    $rowsView = mysqli_num_rows($resultView);    
}

class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('images/logoremove.png',10,6,20);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,10,'Laporan pelajar',1,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
 
if($rowsView > 0){  
    while($row = mysqli_fetch_assoc($resultView)) {
	    $pdf->Cell(0,10,'No Pelajar: '. $row['nopelajar'],0,1);
        $pdf->Cell(0,10,'Nama Pelajar: '. $row['nama'],0,1);
        $pdf->Cell(0,10,'Telefon: '. $row['telefon'],0,1);
        $pdf->Cell(0,10,'Email: '. $row['email'],0,1);
    }
}
$pdf->Output();
?>
