<?php
require "datebase.php";
require('fpdf/fpdf.php');
if(!empty($_POST)){
$queFecha = mysqli_escape_string($db, $_POST['queFecha']);
$hora = mysqli_escape_string($db, $_POST['tecnico']);


$sql = "SELECT id, azienda, odl, cliente, evo, gdp, router, box, parabola, alimentador, tipo, creado, fecha FROM materiale";
$consulta = $db->query($sql);

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Times', 'B', 15);
        $this->Image('img/logo.png', 95, 10, 90); //imagen(archivo, png/jpg || x,y,tamaño)

        $this->Ln(30);
        $this->SetX(15);
        $this->SetFillColor(255, 51, 51);
        $this->Cell(266, 8, 'RAPPORTINO MATERIALE ENTRANTE', 1, 10, 'C', 1);
        $this->SetDrawColor(0, 0, 0); //color de linea  rgb

        $this->SetFont('Times', '', 12);
        $this->Ln(0.3);
        $this->SetX(15);
        $this->SetFillColor(146, 197, 245);
        $this->SetDrawColor(0, 0, 0); //color de linea  rgb
        $this->Cell(133, 6, ' Tecnico: ' . $_POST['tecnico'], 1, 0, 'L', 0);
        $this->Cell(133, 6,'Data: ' . $_POST['queFecha'], 1, 0, 'L', 0);

        $this->SetFont('Times', 'B', 13);
        $this->Ln();
        $this->SetX(15);
        $this->SetFillColor(87, 247, 227);
        $this->SetDrawColor(0, 0, 0); //color de linea  rgb
        $this->Cell(10, 9, 'N', 1, 0, 'C', 0);
        $this->Cell(25, 9, 'AZIENDA', 1, 0, 'C', 1);
        $this->Cell(28, 9, 'N. ODL', 1, 0, 'C', 1);
        $this->Cell(35, 9, 'CLIENTE', 1, 0, 'C', 1);
        $this->Cell(30, 9, 'R. OFF/EVO', 1, 0, 'C', 1);
        $this->Cell(30, 9, 'R. G/GDP', 1, 0, 'C', 1);
        $this->Cell(25, 9, 'ROUTER', 1, 0, 'C', 1);
        $this->Cell(25, 9, 'EOLOBOX', 1, 0, 'C', 1);
        $this->Cell(20, 9, 'PARAB.', 1, 0, 'C', 1);
        $this->Cell(18, 9, 'ALIM.', 1, 0, 'C', 1);
        $this->Cell(20, 9, 'TIPO', 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'B', 10);
        // Número de página
        //  $this->Cell(170,10,'Todos los derechos reservados STEEVE V.',0,0,'C',0);
        $this->Cell(280, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
// Creación del objeto de la clase heredada
$pdf = new PDF('L'); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico
$pdf->Ln(0.8);
$pdf->SetFillColor(197, 193, 193); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb
// $pdf->SetMargins(10, 10, 10);

$i = 0;
$pdf->SetFont('Arial', '', 11);
while($fila = $consulta->fetch_assoc()) {
    $i++;
    $pdf->SetX(15);
    $pdf->Cell(10, 9, $i, 1, 0, 'C', 1);
    $pdf->Cell(25, 9, $fila['azienda'], 1, 0, 'C', 0);
    $pdf->Cell(28, 9, $fila['odl'], 1, 0, 'C', 0);
    $pdf->Cell(35, 9, $fila['cliente'], 1, 0, 'C', 0);
    $pdf->Cell(30, 9, $fila['evo'], 1, 0, 'C', 0);
    $pdf->Cell(30, 9, $fila['gdp'], 1, 0, 'C', 0);
    $pdf->Cell(25, 9, $fila['router'], 1, 0, 'C', 0);
    $pdf->Cell(25, 9, $fila['box'], 1, 0, 'C', 0);
    $pdf->Cell(20, 9, $fila['parabola'], 1, 0, 'C', 0);
    $pdf->Cell(18, 9, $fila['alimentador'], 1, 0, 'C', 0);
    $pdf->Cell(20, 9, $fila['tipo'], 1, 1, 'C', 0);

}
$pdf->Output();
}