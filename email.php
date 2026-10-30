<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
 
require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';
 
error_reporting(E_ALL);

ini_set('display_errors', 1);
 
$name       = isset($_POST['name']) ? trim($_POST['name']) : '';

$email      = isset($_POST['email']) ? trim($_POST['email']) : '';

$number     = isset($_POST['phone']) ? trim($_POST['phone']) : '';

$site_url   = isset($_POST['site_url']) ? trim($_POST['site_url']) : '';

$msg_subject= isset($_POST['msg_subject']) ? trim($_POST['msg_subject']) : '';
 
if ($name == '') {

    header("Location: index.php");

    exit();

}
 
// Email settings

$to       = 'info@creativeconverge.com';

$from     = 'jamesrobertllc706@gmail.com';

$fromName = 'creativeconverge.com';

$subject  = 'Request To Start Work Together';
 
// Email body

$htmlContent = '
<html>
<head>
<title>Request To Start Work Together</title>
</head>
<body>
<h1>Thanks you for joining with us!</h1>
<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Number</th>';
 
if($services != 'none'){

    $htmlContent .= '<th>Services</th>';

}
 
if($msg_subject != 'none'){

    $htmlContent .= '<th>Subject</th>';

}
 
$htmlContent .= '
<th>Site URL</th>
</tr>
</thead>
<tbody>
<tr>
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>'.$number.'</td>';
 
if($services != 'none'){

    $htmlContent .= '<td>'.$services.'</td>';

}
 
if($msg_subject != 'none'){

    $htmlContent .= '<td>'.$msg_subject.'</td>';

}
 
$htmlContent .= '
<td>'.$site_url.'</td>
</tr>
</tbody>
</table>
</body>
</html>';
 
 
// Send email using PHPMailer

$mail = new PHPMailer(true);
 
try {

    $mail->isSMTP();

    $mail->Host       = 'smtp.gmail.com';     // You can change for cPanel

    $mail->SMTPAuth   = true;

    $mail->Username   = 'jamesrobertllc706@gmail.com';     // CHANGE THIS

    $mail->Password   = 'ouqnsvfqeyhdunxr';        // CHANGE THIS

    $mail->SMTPSecure = 'tls';

    $mail->Port       = 587;
 
    $mail->setFrom($from, $fromName);

    $mail->addAddress($to);
 
    // CC emails

    // $mail->addCC('basharshah0@gmail.com');

    // $mail->addCC('digitalmarketing15544@gmail.com');

    // $mail->addCC('rafayshah2006@gmail.com');

    $mail->addCC('frontend4404@gmail.com');
    // $mail->addCC('basharshah0@gmail.com');
    // $mail->addCC('rafayshah2006@gmail.com');
    // $mail->addCC('junior.murray@stateofauthors.com');
    // $mail->addCC('jamesrobertllc706@gmail.com');
    // $mail->addCC('sean.stewart@creativeconverge.com');
    // $mail->addCC('george.valentino@creativeconverge.com');
    // $mail->addCC('jamesrobert21922@gmail.com');

 
    $mail->isHTML(true);

    $mail->Subject = $subject;

    $mail->Body    = $htmlContent;
 
    $mail->send();

    header("Location: thankYou");

    exit();
 
} catch (Exception $e) {

    echo "Mailer Error: " . $mail->ErrorInfo;

}

?>

 