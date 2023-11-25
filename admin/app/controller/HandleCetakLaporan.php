<?php
include '../config/koneksi.php';
include '../../vendor/autoload.php';
include '../controller/HandlingTimeLaporan.php';
include '../views/cetak_pdf.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="example.pdf"');

$dompdf->loadHtml(HTML());
$dompdf->setPaper('F4', 'landscape');
$dompdf->render();

echo $dompdf->output();

$pdf->loadView('my.pdf', compact('values'));
$dompdf->stream('my.pdf', array('Attachment' => 0));