<?php
require('../recursos/fpdf184/fpdf.php');

class myPDF extends FPDF
{
    function header()
    {
        $this->SetFont('Arial', 'B', '14');
        $this->Cell(276, 5, 'Registro', 0, 0, 'C');
        $this->Ln();
        $this->Ln();
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', '8');
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function headerTable()
    {
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20, 10, 'ID ', 1, 0, 'C');
        $this->Cell(40, 10, 'Nombre ', 1, 0, 'C');
        $this->Cell(40, 10, 'Apellido ', 1, 0, 'C');
        $this->Cell(40, 10, 'Ciudad ', 1, 0, 'C');
        $this->Cell(60, 10, 'Fecha de Inscripcion ', 1, 0, 'C');
        $this->Cell(70, 10, 'Email ', 1, 0, 'C');
        $this->Ln();
    }

    function viewTable()
    {
        $this->SetFont('Times', '', 12);
        if (isset($_GET["buscar"])) {
            // require_once('../Laboratorio2/model/registro_modelo_imprimir.php');

            // $registro2 = new Registro_Modelo();
            // $matrizRegistro = $registro2->get_registros_imprimir_buscar($_GET["buscar"]);
            
            // require_once('../Laboratorio2/view/registro_vista_imprimir.php');
            require_once('..//controller/registro_controlador_imprimir_buscar.php');
        } else {
            require_once('../controller/registro_controlador_imprimir.php');
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
