<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/mail-config.php';

// Live site par errors screen par na dikhayein
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

/* ---------- Kahan wapas bhejna hai ---------- */
$thankYouPage = 'thankyou.php';
$backPage     = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

function cvg_back($url, $status)
{
    $sep = (strpos($url, '?') === false) ? '?' : '&';
    $url = preg_replace('/([?&])sent=[^&#]*/', '$1', $url);
    header('Location: ' . $url . $sep . 'sent=' . $status . '#cvg-consult');
    exit();
}

/* ---------- Sirf POST allow ---------- */
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: index.php');
    exit();
}

/* ---------- Spam bot check (honeypot) ---------- */
if (!empty($_POST['website'])) {
    // Bot ne hidden field bhara, chupchaap thank-you par bhej do
    header('Location: ' . $thankYouPage);
    exit();
}

/* ---------- Form data ---------- */
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$phone   = trim($_POST['phone']   ?? '');
$message = trim($_POST['message'] ?? '');

// Header injection se bachao
$name  = str_replace(["\r", "\n"], ' ', $name);
$email = str_replace(["\r", "\n"], '', $email);
$phone = str_replace(["\r", "\n"], ' ', $phone);

// Length limits
$name    = mb_substr($name, 0, 100);
$phone   = mb_substr($phone, 0, 40);
$message = mb_substr($message, 0, 5000);

/* ---------- Validation ---------- */
if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    cvg_back($backPage, 'invalid');
}

/* ---------- Email body (sab values escape ki hui) ---------- */
function e($v)
{
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

$pageUrl = e($backPage);
$sentAt  = date('d M Y, h:i A');

$row = function ($label, $value) {
    $value = ($value === '') ? '<span style="color:#999">Not provided</span>' : $value;
    return '
      <tr>
        <td style="padding:12px 16px;border-bottom:1px solid #e6ecea;width:140px;font-weight:600;color:#04342C;vertical-align:top">' . $label . '</td>
        <td style="padding:12px 16px;border-bottom:1px solid #e6ecea;color:#222">' . $value . '</td>
      </tr>';
};

$htmlContent = '
<html>
<head><meta charset="UTF-8"><title>New Contact Request</title></head>
<body style="margin:0;padding:24px;background:#f3f6f5;font-family:Arial,Helvetica,sans-serif">
  <table cellspacing="0" cellpadding="0" style="max-width:640px;width:100%;margin:0 auto;background:#fff;border-radius:12px;overflow:hidden;border:1px solid #e6ecea">
    <tr>
      <td colspan="2" style="background:#0A0A0A;padding:20px 24px;color:#00D4A3;font-size:20px;font-weight:700">
        New Contact Request
      </td>
    </tr>'
    . $row('Name',    e($name))
    . $row('Email',   '<a href="mailto:' . e($email) . '">' . e($email) . '</a>')
    . $row('Phone',   e($phone))
    . $row('Message', nl2br(e($message)))
    . $row('Page',    $pageUrl)
    . $row('Sent at', e($sentAt)) . '
  </table>
</body>
</html>';

$plainText = "New Contact Request\n\n"
    . "Name: $name\n"
    . "Email: $email\n"
    . "Phone: " . ($phone ?: 'Not provided') . "\n\n"
    . "Message:\n" . ($message ?: 'Not provided') . "\n\n"
    . "Page: $backPage\n"
    . "Sent at: $sentAt\n";

/* ---------- Send ---------- */
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = MAIL_SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = MAIL_SMTP_USER;
    $mail->Password   = MAIL_SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = MAIL_SMTP_PORT;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom(MAIL_SMTP_USER, MAIL_FROM_NAME);
    $mail->addAddress(MAIL_TO);
    foreach (MAIL_CC as $cc) {
        $mail->addCC($cc);
    }

    // "Reply" dabane par seedha customer ko jawab jaye
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Request from ' . $name;
    $mail->Body    = $htmlContent;
    $mail->AltBody = $plainText;

    $mail->send();

    header('Location: ' . $thankYouPage);
    exit();
} catch (Exception $ex) {
    error_log('Contact form mail error: ' . $mail->ErrorInfo);
    cvg_back($backPage, 'error');
}