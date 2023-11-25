<?php

require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function Email($data)
{
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gilang_2005101102@mhs.unipma.ac.id';
    $mail->Password   = 'ozfz cbcs apbn amor';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('gilang_2005101102@mhs.unipma.ac.id', 'Gilang');
    $mail->addAddress($data->email, $data->penanggung_jawab);

    //Content
    $mail->isHTML(true);
    $html = '<h2>Penyewaan Gedung Untuk Acara ';
    $html .= $data->judul_acara;
    $html .= '</h2><h3>Status Penyewaan Gedung ';
    $html .= $data->status;
    $html .= '</h3><p>';
    $html .= $data->balasan;
    $html .= '</p>';

    $mail->Subject = 'Balasan Penyewaan Gedung';
    $mail->Body    =  $html;
    $mail->AltBody = strip_tags('Penyewaan Gedung ' . $data->status);

    if ($mail->send()) {
      echo 'Message has been sent';
      header('Location: /reservasi/admin/?filename=data_penyewaan');
      exit;
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
header('Location: /reservasi/admin/?filename=data_penyewaan');
