<?php

ob_start();
  // error_reporting(E_ALL);

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  include('connection.php');

  require 'vendor/autoload.php';
  use Dompdf\Dompdf;

  $dompdf = new Dompdf();
  
  $url = SITE_URL.'main-pdf.php?id='.$_GET['id'];
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
  $contents = curl_exec($ch);
  if (curl_errno($ch)) {
    echo curl_error($ch);
    echo "\n<br />";
    $contents = '';
  } else {
    curl_close($ch);
  }

  if (!is_string($contents) || !strlen($contents)) {
    echo "Failed to get contents.";
    $contents = '';
  }
  
  
  $dompdf->loadHtml($contents);

  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();

  $dompdf->stream("Investor Results.pdf", ["Attachment" => true]);    
  
  ob_end_flush();
  exit;
?>