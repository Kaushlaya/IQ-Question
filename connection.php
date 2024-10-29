<?php

  // Server related constants ==================
  define('SITE_URL','your_site_url');
  define('ROOT_PATH_STEPS_PAGE', $_SERVER['DOCUMENT_ROOT'] . '/--/--/--');
  define('SIGNATURE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/--/--/--/--');
  define('PDF_PATH', $_SERVER['DOCUMENT_ROOT'] . '/--/--/--/--');



  
  // Email & SMTP related constants ==================
  define('SMTP_HOST', 'smtp.gmail.com');
  define('SMTP_USERNAME', 'xyz@gmail.com');
  define('SMTP_PASSWORD', '***');
  define('SMTP_PORT', '');
  define('SMTP_FROM_EMAIL', 'xyz@gmail.com');
  define('SMTP_FROM_EMAIL_NAME', 'Questionnaire');
  define('EMAIL_SUBJECT', 'New Questionnaire Submitted');
  define('EMAIL_BODY', 'New Questionnaire Submitted, please check the PDF attachment.');
  define('ADMIN_EMAIL', 'xyz@gmail.com');




  // Database connection ==================
  $con = mysqli_connect('localhost','username','password','database_name');

  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?> 
