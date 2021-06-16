<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html=file_get_contents("http://localhost/projectdbms2/userprintPDF.php");

$pdf = new Dompdf(); 
$pdf->setPaper("A4", "potrait");
$pdf->loadHtml(utf8_decode($html));
$pdf->render();
$pdf->loadHtml(ob_get_clean());
$pdf->stream('Report.pdf',array('Attachment'=>0));

?>