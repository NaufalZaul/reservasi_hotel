<?php
include '../config/koneksi.php';
include '../../vendor/autoload.php';
include '../controller/HandlingTimeLaporan.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

// $dompdf->loadHtml(HTML());
$dompdf->loadHtml(file_get_contents('../views/cetak_pdf.php'));
$dompdf->setPaper('F4');
$dompdf->render();

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="example.pdf"');

echo $dompdf->output();

$pdf->loadView('my.pdf', compact('values'));
$dompdf->stream('my.pdf', array('Attachment' => 0));


function HTML()
{
  global $conn;
  $sql = mysqli_query($conn, "SELECT * FROM penyewaan");
  $key = 1;

  $html = '<div>';
  while ($row = mysqli_fetch_array($sql)) {
    if (handlingTimeLaporan($_GET['cetak'], $row['tanggal_mulai'])) {
      $html .= '
      <h2>Data Nomor ' . $key . '</h2>
      <table border="1" width="100%">';
      $html .=
        "<tr>
          <th>ID</th>
          <th>Judul Acara</th>
          <th>Nomor Gedung</th>
        </tr>" .
        "<tr>
          <td align='center'>" . $row['id_penyewaan'] . "</td>
          <td align='center'>" . $row['judul_acara'] . "</td>
          <td align='center'>" . $row['nomor_gedung'] . "</td>
        </tr>" .
        "<tr>
          <th>Penanggung Jawab</th>
          <th>Nomor Telepon</th>
          <th>Email</th>        
        </tr>" .
        "<tr>
        <td align='center'>" . $row['penanggung_jawab'] . "</td>
        <td align='center'>" . $row['no_telp'] . "</td>
        <td align='center'>" . $row['email'] . "</td>
        <tr>" .
        "<tr>
          <th>Tanggal Akhir</th>
          <th>Tanggal Akhir</th>
          <th>Surat Pengantar</th>
        </tr>" .
        "</tr>
        <td align='center'>" .  $row['tanggal_mulai'] . "</td>
        <td align='center'>" . $row['tanggal_akhir'] . "</td>
        <td align='center'>" . $row['surat_pengantar'] . "</td>
        <tr>" .
        "<tr>
          <th>Jumlah Orang</th>
          <th>Keperluan</th>
          <th>Status</th>
        </tr>" .
        "</tr>
          <td align='center'>" . $row['jumlah_orang'] . "</td>
          <td align='center'>" . $row['keperluan'] . "</td>
          <td align='center'>" . $row['status'] . "</td>
        </tr>";
      $html .= "</table>";
      $key++;
    }
  }
  $html .= "</div>";
  //   if (isset($_POST['cetak_bulanan']) && handlingTimeLaporan('bulanan', $row['tanggal_mulai'])) {
  //     $html .=
  //       "<tr>
  //         <td>" . $key . "</td>
  //         <td>" . $row['id_penyewaan'] . "</td>
  //         <td>" . $row['judul_acara'] . "</td>
  //         <td>" . $row['nomor_gedung'] . "</td>
  //         <td>" . $row['nama_penyewa'] . "</td>
  //         <td>" . $row['no_telp'] . "</td>
  //         <td>" . $row['email'] . "</td>
  //         <td>" .  $row['tanggal_mulai'] . "</td>
  //         <td>" . $row['tanggal_akhir'] . "</td>
  //         <td>Tidak ada</td>
  //         <td>" . $row['jumlah_orang'] . "</td>
  //         <td>" . $row['keperluan'] . "</td>
  //         <td>" . $row['status'] . "</td>
  //       </tr>";
  //     $key++;
  //   } else if (isset($_POST['cetak_tahunan']) && handlingTimeLaporan('tahunan', $row['tanggal_mulai'])) {
  //     $html .=
  //       "<tr>
  //           <td>" . $key . "</td>
  //           <td>" . $row['id_penyewaan'] . "</td>
  //           <td>" . $row['judul_acara'] . "</td>
  //           <td>" . $row['nomor_gedung'] . "</td>
  //           <td>" . $row['nama_penyewa'] . "</td>
  //           <td>" . $row['no_telp'] . "</td>
  //           <td>" . $row['email'] . "</td>
  //           <td>" .  $row['tanggal_mulai'] . "</td>
  //           <td>" . $row['tanggal_akhir'] . "</td>
  //           <td>Tidak ada</td>
  //           <td>" . $row['jumlah_orang'] . "</td>
  //           <td>" . $row['keperluan'] . "</td>
  //           <td>" . $row['status'] . "</td>
  //         </tr>";
  //     $key++;
  //   }
  // }


  return $html;
}
