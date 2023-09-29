<?php
header("Content-type: text/html; charset=utf8");
date_default_timezone_set('America/Bogota');
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');
require('config.php');
$mens = null;

if (isset($_POST['generar'])) {
   
    $code = $conn->prepare('UPDATE asistente SET code=? WHERE documento=?');
    $cod = md5(uniqid(rand()));
    $code->bindParam(1, $cod);
    $code->bindParam(2, $_POST['documento']);
    $code->execute();

    $result = $conn->prepare('SELECT * FROM asistente WHERE documento=?');
    $result->bindParam(1, $_POST['documento']);
    $result->execute();

    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        class PDF extends FPDF
        {
            // Cabecera de página
            function Header()
            {
                // Logo
                $this->Image('../assets/img/logosp.png', 10, 8, 33);
                // Arial bold 15
                $this->SetFont('Arial', 'B', 15);
                // Movernos a la derecha
                $this->Cell(80);
                // Título
                $this->Cell(30, 10, 'Title', 1, 0, 'C');
                // Salto de línea
                $this->Ln(20);
            }

            // Pie de página
            function Footer()
            {
                // Posición: a 1,5 cm del final
                $this->SetY(-8);
                // Arial italic 8
                $this->SetFont('Arial', 'B', 10);
                // Fecha y marca
                $this->Cell(200, 10, 'Softparty ' . iconv("UTF-8", "ISO-8859-1", "©"));
                $this->Cell(90, 10, 'Generado el ' . date('d/m/Y h:i:s A'), 0, 0, 'C');

            }
        }

        // Creación del objeto de la clase heredada
        $pdf = new PDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->Image('img/softparty_certificado.png', 0, 0, 297, 210, 'PNG');
        $pdf->SetFont('Arial', 'B', 28);
        $pdf->Text(54, 111, $row['nombre'] . " " . $row['apellido']);

        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Text(54, 119, iconv("UTF-8", "ISO-8859-1", "Identificado con número de documento") . " " . $row['documento']);

        $pdf->SetFont('Arial', 'B', 28);
        $pdf->Text(130, 165, $row['participacion']); 

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Text(52, 165, $row['code']); 

        if (isset($_POST['generar'])) {
            $pdf->Output('I', 'Softparty23_' . $row['nombre'] . '_' . $row['apellido'] . '_' . $row['documento'] . '.pdf');
        }
    } else {
        $mens = array("No existe el documento en la base de datos", "danger");
    }
}
?>