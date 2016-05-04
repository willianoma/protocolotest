<?php


//setlocale(LC_ALL, 'pt_BR');
setlocale(LC_ALL, 'pt_BR', "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_get('America/Maceio');
require 'fpdf/fpdf.php';


$nomeFuncionario = $_POST['nomeFuncionario'];
$posto = $_POST['posto'];
$motivo = $_POST['motivo'];
$periodoInicio = $_POST['periodoInicio'];
$periodoFim = $_POST['periodoFim'];

$horaLocall = date('m/d/y');
$horaLocal = strftime("%d de %B de %Y", strtotime($horaLocall));


//$nomeFuncionario = $_SESSION['nomeFuncionario'];
//$posto = $_SESSION['posto'];
//$motivo = $_SESSION['motivo'];
//$periodoInicio = $_SESSION['periodoInicio'];
//$periodoFim = $_SESSION['periodoFim'];



class ComprovanteVisita extends FPDF {

// Page header
    function Header() {
// Logo
//        $this->Image('assets/logoMega.png', 10, 6, 45);
// Arial bold 15
//        $this->SetFont('Arial', 'B', 15);
//// Move to the right
//        $this->Ln(20);
//        $this->Cell(50);
//
//// Title
//        $this->Cell(90, 15, 'Comprovante', 0, 0, 'C');
//// Line break
//        $this->Ln(20);
    }

    function Footer() {

//        $this->SetY(-25);
//        $this->SetFont('Arial', 'I', 8);
//        $this->Cell(0, 0, 'Mega Empreendimentos e Serviços Gerais ltda. CNPJ-10458975/0001-11 ', 0, 0, 'C');
//        $this->Ln(3.5);
//        $this->Cell(0, 0, 'Matriz: Av. Governador Luiz Cavalcante, 63-A, Paripueira-AL, CEP-57935-000', 0, 0, 'C');
//        $this->Ln(3.5);
//        $this->Cell(0, 0, 'Escritório em Maceió: Av. Tomaz Espíndola Nº 326, Sala 109, Maceió-AL, CEP-57051-000', 0, 0, 'C');
//        $this->Ln(3.5);
//        $this->Cell(0, 0, 'contato@mempreendimentos.com.br / www.mempreendimentos.com.br', 0, 0, 'C');
//        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

// Instanciation of inherited class
$pdf = new ComprovanteVisita();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->Image('assets/justificativaFalta.png', 10, 20, 190);
$pdf->SetFont('Times', '', 10);

$pdf->SetXY(100, 25);
$pdf->Cell(0, 0, "1º Via", 0, 0, 'R');
$pdf->SetXY(125, 41);
$pdf->Cell(0, 0, $nomeFuncionario, 0, 0, 'C');
$pdf->SetXY(125, 48);
$pdf->Cell(0, 0, $posto, 0, 0, 'C');
$pdf->SetXY(12, 78);
$pdf->Cell(0, 0, $motivo, 0, 0, 'C');
$pdf->SetXY(12, 95);
$pdf->Cell(0, 0, $periodoInicio . "  a  " . $periodoFim, 0, 0, 'C');
$pdf->SetXY(145, 122);
$pdf->Cell(0, 0, $horaLocal, 0, 0, 'L');


$pdf->Image('assets/justificativaFalta.png', 10, 145, 190);
$pdf->SetFont('Times', '', 10);
$pdf->SetXY(100, 150);
$pdf->Cell(0, 0, "2º Via", 0, 0, 'R');
$pdf->SetXY(125, 166);
$pdf->Cell(0, 0, $nomeFuncionario, 0, 0, 'C');
$pdf->SetXY(125, 173);
$pdf->Cell(0, 0, $posto, 0, 0, 'C');
$pdf->SetXY(12, 203);
$pdf->Cell(0, 0, $motivo, 0, 0, 'C');
$pdf->SetXY(12, 220);
$pdf->Cell(0, 0, $periodoInicio . "  a  " . $periodoFim, 0, 0, 'C');
$pdf->SetXY(145, 247);
$pdf->Cell(0, 0, $horaLocal, 0, 0, 'L');


//$pdf->Ln(8);




ob_clean();
$pdf->Output();
?>



















//echo  $empresa;


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$empresa);
ob_clean();
$pdf->Output();






//var_dump($visita);
?>