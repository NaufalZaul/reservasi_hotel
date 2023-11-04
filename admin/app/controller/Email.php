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
    $mail->Username   = 'ghostroomintheworld@gmail.com';
    $mail->Password   = 'cdgb qsyf xcrx nlzs';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('ghostroomintheworld@gmail.com', 'Ghost Room');
    foreach ($data->email as $key => $value) {
      $mail->addAddress($value);
    }

    //Content
    $mail->isHTML(true);
    $html = '<h2>Penyewaan Gedung ';
    $html .= $data->status;
    $html .= '</h2><p>';
    $html .= $data->feedback;
    $html .= '</p>';

    $mail->Subject = 'Balasan Penyewaan Gedung';
    $mail->Body    =  $html;
    $mail->AltBody = strip_tags('Penyewaan Gedung ' . $data->status);

    if ($mail->send()) {
      echo 'Message has been sent';
      // var_dump(getallheaders());
      header('Location: /hotel/admin/?filename=data_penyewaan');
      exit;
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
header('Location: /hotel/admin/?filename=data_penyewaan');
